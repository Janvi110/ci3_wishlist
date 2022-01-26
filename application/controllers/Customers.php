<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(APPPATH . 'third_party/Paginator.php');

use wishlist\Paginator;

class Customers extends CI_Controller {

    public function __construct() {

        // ini_set('display_errors', 1);
        parent::__construct();
        $this->load->library('session');
        $this->load->model('viewlist_model', 'wishlist');
        

        if ($this->session->userdata('token') == FALSE)
            redirect('login');
    }

    public function index() {
        $post_data['thisPage'] = 'customers';   
        $post_data['title'] = 'Customers';   

        $this->load->library('pagination');

        $shop_id = getstore('id');
        $shop    = $this->session->userdata('shop');
        $token   = $this->session->userdata('token');
        $params  = array('shop_domain' => $shop, 'token' => $token, 'api_key' => API_KEY, 'secret' => SECRET);

        $this->load->library('shopifyapi', $params);

        $page       = !empty($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
        $limit      = 10;
        $offset     = !empty( $page ) ? ($page - 1) * $limit : 0;

        $parameters = array('fields' => 'ms_customer_id', 'totals_only' => true);
        $total_rows = count($this->wishlist->get_customer_wishlist_data($shop_id, $parameters));

        $post_data['pages'] = ceil($total_rows / $limit);
        $post_data['page']  = ($offset + 1);

        $params = array('fields' => 'ms_customer_id', 'limit' => $limit, 'offset' => $offset,'totals_only' => true);
        $data   = $this->wishlist->get_customer_wishlist_data($shop_id, $params);

        $get_customer = $this->shopifyapi->call('GET', '/admin/api/2021-04/customers.json?limit=10');
        $post_data['customers'] = $get_customer;
        /*** Set Pagination ***/
        $urlPattern     = base_url('customers/index/(:num)');
        $post_data['totalItems']     = $total_rows;
        $post_data['nextpage']   = $offset + 1;
        $post_data['previouspage'] = $offset - 1;
        $post_data['itemsPerPage']     = $limit;
        $post_data['currentPage']     = $page;
      
        $post_data['pagination'] = $paginator;
                $paginator = new Paginator($post_data['totalItems'], $post_data['itemsPerPage'], $post_data['currentPage'], $urlPattern);

        /*** //Set Pagination ***/
        $this->load->view('header',$post_data);
        $this->load->view('customer', $post_data);
        $this->load->view('footer');
    }
     function GetAllCustomerData(){
        $shop_id    = getstore('id');
        $shop  = $this->session->userdata('shop');
        $token = $this->session->userdata('token');
        $postArr = $this->input->post();
        if (! (isset($postArr['pageNumber']))) {
            $pageNumber = 1;
        } else {
            $pageNumber = $postArr['pageNumber'];
        }

        if (! (isset($postArr['perPageCount']))) {
            $perPageCount = 10;
        } else {
            $perPageCount = $postArr['perPageCount'];
        }

        if (! (isset($postArr['search']))) {
            $search = "";
        } else {
            $search = $postArr['search'];
        }

        $page       = !empty($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
        $limit      = 10;
        $offset     = !empty( $page ) ? ($page - 1) * $limit : 0;

        $parameters = array('fields' => 'ms_customer_id', 'totals_only' => true);
        $total_rows = count($this->wishlist->get_customer_wishlist_data($shop_id, $parameters));
        $pagesCount = ceil($total_rows / $perPageCount);
        $lowerLimit = ($pageNumber - 1) * $perPageCount; 
        $params  = array('shop_domain' => $shop, 'token' => $token, 'api_key' => API_KEY, 'secret' => SECRET);

        $this->load->library('shopifyapi', $params);
        $customer_details = $this->shopifyapi->call('GET', '/admin/api/2021-04/customers.json?limit=10');
        /*** Set Pagination ***/
        $urlPattern     = base_url('customers/index/(:num)');
        $data['customers']     = $customer_details;
        $data['totalItems']     = $total_rows;
        $data['nextpage']   = $offset + 1;
        $data['previouspage'] = $offset - 1;
        $data['itemsPerPage']     = $limit;
        $data['currentPage']     = $page;
      
        $data['pagination'] = $paginator;
                $paginator = new Paginator($data['totalItems'], $data['itemsPerPage'], $data['currentPage'], $urlPattern);

        /*** //Set Pagination ***/
        $result = $this->load->view('ajax_customer_wishlist', $data,true);
        echo $result;
    }

    public function get_wishlist_items() {

        $customer_id = !empty( $_REQUEST['customer_id'] ) ? $_REQUEST['customer_id'] : -1;

        $shop_id = getstore('id');
        $shop    = $this->session->userdata('shop');
        $token   = $this->session->userdata('token');
        $params  = array('shop_domain' => $shop, 'token' => $token, 'api_key' => API_KEY, 'secret' => SECRET);

        $this->load->library('shopifyapi', $params);

        $settings   = $this->shopifyapi->call('GET', '/admin/api/2020-01/shop.json', array('fields' => 'currency'));
        $currency   = $settings['currency'];

        $params     = array('fields' => 'mswishlist', 'where' => array('ms_customer_id' => $customer_id));
        $data       = $this->wishlist->get_customer_wishlist_data($shop_id, $params);

        $wishlist   = !empty($data) ? json_decode($data->mswishlist) : '';

        $wishlist_data = array();
        if( !empty($wishlist->items) ) {

            foreach ($wishlist->items as $key => $item) {

                $product_id = $item[0];
                $variant_id = $item[1];

                try {

                    $products = $this->shopifyapi->call('GET', '/admin/api/2020-01/products/'.$product_id.'.json', array('fields' => 'id, title'));

                    $wishlist_data[$key] = $products;

                } catch (ShopifyApiException $e) {}

                try {

                    $variants = $this->shopifyapi->call('GET', '/admin/api/2020-01/variants/'.$variant_id.'.json', array('fields' => 'id, title, price, sku, created_at'));

                    $wishlist_data[$key]['variant'] = $variants;

                } catch (ShopifyApiException $e) {}
            }
        }

        $this->load->view('ajax_customer_wishlist', compact('wishlist_data', 'currency'));
    }
}