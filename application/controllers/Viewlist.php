<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Viewlist extends CI_Controller {

    function __construct() {
        // ini_set('display_errors', 1);
        parent::__construct();

        $this->load->model('Viewlist_model');
        $this->load->model('homem', 'home');
    }

    public function index() {
        // header("Content-Type: application/liquid");
        $shop_url   = 'qa-jignesh.myshopify.com';
        $secure_key = $this->input->get('key');
        $data['wishlist_token'] = !empty($secure_key) ? $secure_key : '';

        $shop_data = $this->Viewlist_model->getstorebyurl($shop_url);
        $shop_id = $shop_data->id;
        $data['shop'] = $shop_url;
        $data['setting'] = $this->home->get_wishlist_setting($shop_id);
        $this->load->view('wishlist', $data);
    }

    function wishlist() {
        $mswishlist = json_decode('{"items":[["9978633796",35965825924,1],["9978636228",35965862340,1],["9978636228",35965862468,1],["9978635396",35965851204,1],["9978635524",35965851716,1],["9978633220",35965820292,1],["9978634756",35965841092,1]]}');

        $shop = 'metiz-tier-price.myshopify.com';
         // if($shop == "qa-jignesh.myshopify.com"){
         //  pre($mswishlist);exit;
         //  } 
        $shop_data = $this->Viewlist_model->getstorebyurl($shop);
        $shop_id = $shop_data->id;
        $token = $shop_data->token;
        $params = array('shop_domain' => $shop, 'token' => $token, 'api_key' => API_KEY, 'secret' => SECRET);
        $this->load->library('shopifyapi', $params);
        $shopify_products = array();

        $sr = 0;
        if(isset($mswishlist->items)){
            foreach ($mswishlist->items as $product) {

                try {
                    $shopify_products[$sr] = $this->shopifyapi->call('GET', '/admin/api/2020-01/products/' . $product[0] . '.json');
                    $shopify_products[$sr]['wish_item'] = $product;
                    $sr++;
                } catch (ShopifyApiException $e) {
                    $data = array($e->getResponse());
                    //print_r($data);
                }
            }
        }
        $shop_money = $this->shopifyapi->call('GET', '/admin/api/2020-01/shop.json?fields=money_format');

        $data['shop'] = $shop;
        $data['money_format'] = $shop_money['money_format'];
        $data['products'] = $shopify_products;
        $data['setting'] = $this->home->get_wishlist_setting($shop_id);
        $data['ms_customer_id'] = 5416735812;
        $this->load->view('wishlist_product', $data);
    }

    function save_wishlist() {

        $shop_url = $this->input->post('shop_url');
        $shop_data = $this->Viewlist_model->getstorebyurl($shop_url);
        $shop_id = $shop_data->id;
        $mswishlist = $this->input->post('mswishlist');
        $ms_customer_id = $this->input->post('ms_customer_id');
        $wishlist_token = $this->input->post('wishlist_token');
        $data = array('shop_id' => $shop_id,
            'mswishlist' => $mswishlist,
            'ms_customer_id' => $ms_customer_id,
            'wishlist_token' => $wishlist_token);
        $this->Viewlist_model->save_wishlist($data);
    }

    function wishlist_get() {
       
        $shop_url = 'qa-jignesh.myshopify.com';
        $shop_data = $this->Viewlist_model->getstorebyurl($shop_url);
        $shop_id = $shop_data->id;
        $ms_customer_id = 5416735812;

        $mswishlist = json_decode('{"items":[["9978633796",35965825924,1],["9978636228",35965862340,1],["9978636228",35965862468,1],["9978635396",35965851204,1],["9978635524",35965851716,1],["9978633220",35965820292,1],["9978634756",35965841092,1]]}');
        //$mswishlist = json_decode('{"items":[["9978633796",35965825924,1],["9978633220",35965820292,1],["9978636228",35965862340,1],["9978636228",35965862468,1],["9978635396",35965851204,1],["9978634756",35965841092,1]]}');

        $list = $this->Viewlist_model->get_wishlist($shop_id, $ms_customer_id);
    
        if ($list != '') {
            $list = json_decode($list);
            if (is_array($list->items)) {
                $new_wishlist = array_unique(array_merge($mswishlist->items, $list->items), SORT_REGULAR);
                $items = array("items" => array());
               
                foreach ($new_wishlist as $val) {
                    array_push($items['items'], $val);
                }
                echo json_encode($items);
            }
        } else {
            echo $this->input->post('mswishlist');
        }
    }

    function wishlist_setting() {
        $shop_url = 'qa-jignesh.myshopify.com';
        $shop_data = $this->Viewlist_model->getstorebyurl($shop_url);
        $shop_id = $shop_data->id;

        $setting = $this->home->get_wishlist_setting($shop_id);
        if ($setting != '') {
            echo json_encode($setting);
        }
    }

    function wishlist_css() {
        $shop_url = 'qa-jignesh.myshopify.com';
        $shop_data = $this->Viewlist_model->getstorebyurl($shop_url);
        $shop_id = $shop_data->id;

        $data['setting'] = $this->home->get_wishlist_setting($shop_id);

        $this->load->view('wishlist_css', $data);
    }

    /**
     * Share wishlist
     */
    public function share_wishlist() {

        $customer_id = $this->input->post('customer_id');
        $action      = $this->input->post('action');
        $shop        = $this->input->post('shop');

        $shop_data   = $this->Viewlist_model->getstorebyurl($shop);

        $shop_id = $shop_data->id;
        $token   = $shop_data->token;

        if(!empty($action) && $action === 'share_wishlist') {

            // get wishlist token
            $attrs  = array('fields' => 'wishlist_token', 'where' => array('ms_customer_id' => $customer_id));
            $result = $this->Viewlist_model->get_customer_wishlist_data($shop_id, $attrs);

            $wishlist_token = !empty($result->wishlist_token) ? base64_encode($result->wishlist_token) : '';

            $wishlist_link = '?key=' . $wishlist_token;
            echo $wishlist_link; exit;
        }

        $wishlist_token = $this->input->post('wishlist_token');
        $wishlist_token = !empty($wishlist_token) ? base64_decode($wishlist_token) : '';

        $params = array('shop_domain' => $shop, 'token' => $token, 'api_key' => API_KEY, 'secret' => SECRET);
        $this->load->library('shopifyapi', $params);

        // get wishlist products
        $attrs  = array('fields' => 'mswishlist', 'where' => array('wishlist_token' => $wishlist_token));
        $result = $this->Viewlist_model->get_customer_wishlist_data($shop_id, $attrs);

        $wishlist = !empty($result) ? json_decode($result->mswishlist) : '';

        /***/
        $shopify_products = array();
        $sr = 0;

        if(isset($wishlist->items)){
            foreach ($wishlist->items as $product) {

                try {
                    $shopify_products[$sr] = $this->shopifyapi->call('GET', '/admin/api/2020-01/products/' . $product[0] . '.json');
                    $shopify_products[$sr]['wish_item'] = $product;
                    $sr++;

                } catch (ShopifyApiException $e) {
                    $data = array($e->getResponse());
                }
            }
        }

        $shop_money = $this->shopifyapi->call('GET', '/admin/api/2020-01/shop.json', array('fields' => 'money_format'));

        $data['money_format']   = $shop_money['money_format'];
        $data['products']       = $shopify_products;
        $data['wishlist_token'] = $wishlist_token;

        $this->load->view('wishlist_product', $data);
    }
}
