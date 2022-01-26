<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Homepage extends CI_Controller {

    function __construct() {

        // ini_set('display_errors', 1);
        parent::__construct();
        $this->load->library('session');
        $this->load->model('loginm', 'auth');
        $this->load->model('homem', 'home');
        $this->load->model('charges_model', 'charges');
        if ($this->session->userdata('token') == FALSE)
            redirect('login');
    }

    public function index() {
        // $this->script_tag();
        $data['thisPage'] = 'dashboard';  

        $shop = $this->session->userdata('shop');
        $token = $this->session->userdata('token');
    
       $params = array('shop_domain' => $shop, 'token' => $token, 'api_key' => API_KEY, 'secret' => SECRET);

            $this->load->library('shopifyapi', $params); 

            $shop_details = $this->shopifyapi->call('GET', '/admin/api/2021-04/shop.json');
            $this->session->set_userdata('shop_owner', $shop_details['shop_owner']);
            $this->session->set_userdata('shop_email', $shop_details['email']);
        $this->load->view('header',$data);
        $this->load->view('index', $data);
        $this->load->view('footer');
    }

    //scrip tag for js load in shopify
    function script_tag() {

        $shop = $this->session->userdata('shop');
        $token = $this->session->userdata('token');
        $params = array('shop_domain' => $shop, 'token' => $token, 'api_key' => API_KEY, 'secret' => SECRET);
        $this->load->library('shopifyapi', $params);
        try {
            $src = base_url() . "assets/js/wish-btn.js";
            $tag = $this->shopifyapi->call('GET', '/admin/api/2020-01/script_tags.json?src=' . $src);
            if (empty($tag)) {
                $postdata['script_tag'] = array(
                    "event" => 'onload',
                    "src" => $src,
                );
                $tag = $this->shopifyapi->call('POST', '/admin/api/2020-01/script_tags.json', $postdata);
                
                $uninstall = base_url('uninstall');
                
                $webhook['webhook'] = array('topic' => 'app/uninstalled',
                    'address' => $uninstall,
                    'format' => 'json');
                try {
                    $this->shopifyapi->call('POST', '/admin/api/2020-01/webhooks.json', $webhook);
                }catch (ShopifyApiException $e) {
                    
                }
            }
        } catch (ShopifyApiException $e) {
            pre($e->getResponse());
            exit;
        }
    }

    //delete script tag
    function delete_script_tag() {
        $shop = $this->session->userdata('shop');
        $token = $this->session->userdata('token');
        $params = array('shop_domain' => $shop, 'token' => $token, 'api_key' => API_KEY, 'secret' => SECRET);
        $this->load->library('shopifyapi', $params);
        try {

            $tag = $this->shopifyapi->call('GET', '/admin/api/2020-01/script_tags.json');
            // $this->hopifyapi->call('DELETE', '/admin/script_tags/169159720996.json');

            print_R($tag);
        } catch (ShopifyApiException $e) {
            pre($e->getResponse());
            exit;
        }
    }

    function wishlisticon() {
        $data['title'] = 'Wishlist icon & tooltip';
        $data['thisPage'] = 'wishlist_icons';  
        $store = $this->session->userdata('store');
        $shop_id = $store->id;
        $data['setting'] = $this->home->get_wishlist_setting($shop_id);
        $this->load->view('header', $data);
        $this->load->view('wishlist_icons', $data);
        $this->load->view('footer');
    }

    function wishlistpage() {
        $data['title'] = 'wishlist Page';
        $data['thisPage'] = 'wishlist_page';  
        $store = $this->session->userdata('store');
        $shop_id = $store->id;
        $data['setting'] = $this->home->get_wishlist_setting($shop_id);

        // unset($_SESSION['message']);
        
        $this->load->view('header', $data);
        $this->load->view('wishlist_page', $data);
        $this->load->view('footer');
    }

    function wishlist_setting() {

        // $this->session->set_flashdata('message', 'nulll');
       
        $store = $this->session->userdata('store');
        $shop_id = $store->id;
        $return_url = $this->input->post('return_url');
        unset($_POST['return_url']);
        foreach ($_POST as $key => $val) {
            $data = array("shop" => $shop_id, "key" => $key, "value" => $val);
            $this->home->save_wishlist_setting($data);
            $this->session->set_flashdata('message', 'Wishlist setting Succesfully saved.');
        }
        
        redirect('homepage/' . $return_url);
    }
    public function other_apps(){
        
        $shop = $this->session->userdata('shop');
        $token = $this->session->userdata('token');     
        $data['title'] = 'Our Other Apps ';
        $data['thisPage'] = 'other_apps';   
             
        $this->load->view('header', $data);
        $this->load->view('other_apps', $data);
        $this->load->view('footer');
    }

    public function installation() {
        // error_reporting(E_ALL);
        // ini_set('display_errors', 1);
        $shop  = $this->session->userdata('shop');
        $token = $this->session->userdata('token');

        $errors = array();
        $params = array('shop_domain' => $shop, 'token' => $token, 'api_key' => API_KEY, 'secret' => SECRET);
        $this->load->library('shopifyapi', $params);
        /**
         * Get themes details
         */
        try {
            $themes = '';
            $themes = $this->shopifyapi->call('GET', '/admin/api/2020-01/themes.json');
            // echo '<pre>';
            // print_r($themes);
            // echo '</pre>';die;
            $index  = array_search('main', array_column($themes, 'role'));

            $current_theme_id = $themes[8]['id'];
            $current_theme_name = $themes[8]['name'];
        } catch (ShopifyApiException $e) {
            $errors['theme_error'] = $e->getMessage();
            echo '<pre>';
            print_r($errors);
            echo '</pre>';die;
            exit;
        }
// echo '<pre>';
// print_r($current_theme_id);
// print_r($current_theme_name);
// echo '</pre>';die;
        /**
         * Update theme liquid file
         */
        try {

            $assets = $this->shopifyapi->call('GET', 'admin/api/2020-01/themes/'.$current_theme_id.'/assets.json', array('asset[key]' => 'layout/theme.liquid'));
            $file_folder  = FCPATH . 'uploads/'.$shop.'/'.$current_theme_name;
            //pre($file_folder);exit;
            $content = !empty($assets['value']) ? $assets['value'] : '';

            // Main file backup
            $attrs = array('shop' => $shop, 'theme' => $current_theme_name, 'file_folder' => $file_folder, 'file_name' => 'theme.liquid', 'file_content' => $content);
            upload_file($attrs);

            preg_match('/jquery(.*?).js/', $content, $match);

            $jquery_exist = !empty($match[0]) ? $match[0] : '';

            if ((strpos($content, 'jquery.js') > 0) || (strpos($content, 'jquery.min.js') > 0) || (strpos($content, $jquery_exist) > 0)) $exist = 1; 
            else $exist = 0;

            if( empty($exist) ) {

                $content = str_replace('</head>', '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script></head>', $content);
            }

            $find_text = "</body>";
            $replace_text = '<input type="hidden" name="ms_customer_id" id="ms_customer_id" value="{% if customer %}{{ customer.id}}{% else %}0{% endif %}" /></body>';

            if ((strpos($content, $replace_text) > 0)) $exist = 1; 
            else if((strpos($content, $find_text) > 0)) $exist = 0;

            if( empty($exist) ) {

                $content = str_replace($find_text, $replace_text, $content);
            }

            // Create temporary file to update theme.liquid code
            $attrs = array('shop' => $shop, 'theme' => $current_theme_name, 'file_folder' => $file_folder, 'file_name' => 'theme.temp', 'file_content' => $content);
            $file_result = upload_file($attrs);

            $post_params['asset'] = array(
                'key' => 'layout/theme.liquid',
                'src' => $file_result['file_url']
            );

            try {

                $update_file = $this->shopifyapi->call('PUT', '/admin/api/2020-01/themes/'.$current_theme_id.'/assets.json', $post_params);
                unlink($file_folder.'/theme.temp'); // Remove temporary file

            } catch (ShopifyApiException $e) {
                $errors['theme_liquid_update_error'] = $e->getMessage();
            }

        } catch (ShopifyApiException $e) {
            $errors['theme_liquid_error'] = $e->getMessage();
        }
die;
        $file_errors = false;
        /**
         * Add code in product price liquid file
         */
        try {

            $product_price = $this->shopifyapi->call('GET', 'admin/api/2020-01/themes/'.$current_theme_id.'/assets.json', array('asset[key]' => 'snippets/product-price.liquid'));

            // Main file backup
            $attrs = array('shop' => $shop, 'file_folder' => $file_folder, 'file_name' => 'product-price.liquid', 'file_content' => $product_price['value']);
            upload_file($attrs);

            $price_content = !empty($product_price['value']) ? $product_price['value'] : '';

            if(!empty(strpos($price_content, '{{ money_price }}'))) {
            $find_text = '{{ money_price }}';
            } else if(!empty(strpos($price_content, '{{ current_variant.price | money }}'))) {
            $find_text = '{{ current_variant.price | money }}';
            } else if(!empty(strpos($price_content, '{{ variant.price | money }}'))) {
            $find_text = '{{ variant.price | money }}';
            } else if(!empty(strpos($price_content, '{{ formatted_price }}'))) {
            $find_text = '{{ formatted_price }}';
            }

            $replace_text = '<div class="price_{{product.id}}" data-ms-id="{{product.id}}" data-ms-variant_id="{{ product.variants.first.id }}" data-ms-product_price="{{ product.price | divided_by: 100.0 }}" data-ms-handle="{{product.handle}}">'.$find_text.'</div>';

            if ((strpos($price_content, $replace_text) > 0)) $exist = 1; 
            else $exist = 0;

            if( empty($exist) ) {

                $price_content = str_replace($find_text, $replace_text, $price_content);
            }

            // Create temporary file to update product_price.liquid code
            $attrs = array('shop' => $shop, 'theme' => $current_theme_name, 'file_folder' => $file_folder, 'file_name' => 'product_price.temp', 'file_content' => $price_content);
            $file_result = upload_file($attrs);

            $post_params['asset'] = array(
                'key' => 'snippets/product-price.liquid',
                'src' => $file_result['file_url']
            );

            try {

                $update_file = $this->shopifyapi->call('PUT', '/admin/api/2020-01/themes/'.$current_theme_id.'/assets.json', $post_params);
                unlink($file_folder.'/product_price.temp'); // Remove temporary file

            } catch (ShopifyApiException $e) {
                $errors['product_price_update_error'] = $e->getMessage();
            }

        } catch (ShopifyApiException $e) {
            $errors['product_price_error'] = $e->getMessage();
            $error['not_found'] = 1;
            $error['file'] = 'product-price.liquid';
            $file_errors = true;
        } catch (ShopifyCurlException $e) {
            $errors['product_price_error'] = $e->getMessage();
            $error['not_found'] = 1;
            $error['file'] = 'product-price.liquid';
            $file_errors = true;
        }
die;
        if(!empty($error) && $error['not_found'] && $error['file'] == 'product-price.liquid') {

            $file_errors = false;
            unset($errors['product_price_error']);
            /**
             * Update product-template file
             */
            try {

                $product_price = $this->shopifyapi->call('GET', 'admin/api/2020-01/themes/'.$current_theme_id.'/assets.json', array('asset[key]' => 'snippets/price.liquid'));

                // Main file backup
                $attrs = array('shop' => $shop, 'theme' => $current_theme_name, 'file_folder' => $file_folder, 'file_name' => 'product-template.liquid', 'file_content' => $product_price['value']);
                upload_file($attrs);

                $price_content = !empty($product_price['value']) ? $product_price['value'] : '';

                if(!empty(strpos($price_content, '{{ money_price }}'))) {
                $find_text = '{{ money_price }}';
                } else if(!empty(strpos($price_content, '{{ current_variant.price | money }}'))) {
                $find_text = '{{ current_variant.price | money }}';
                } else if(!empty(strpos($price_content, '{{ variant.price | money }}'))) {
                $find_text = '{{ variant.price | money }}';
                } else if(!empty(strpos($price_content, '{{ formatted_price }}'))) {
                $find_text = '{{ formatted_price }}';
                }

                $replace_text = '<div class="price_{{product.id}}" data-ms-id="{{product.id}}" data-ms-variant_id="{{ product.variants.first.id }}" data-ms-product_price="{{ product.price | divided_by: 100.0 }}" data-ms-handle="{{product.handle}}">'.$find_text.'</div>';

                if ((strpos($price_content, $replace_text) > 0)) $exist = 1; 
                else $exist = 0;

                if( empty($exist) ) {

                    if ((strpos($price_content, $find_text) <= 0)) {
                        $errors['content_not_found'] = 1;
                        // goto end_install;
                    }

                    $price_content = str_replace($find_text, $replace_text, $price_content);
                }

                // Create temporary file to update theme.liquid code
                $attrs = array('shop' => $shop, 'theme' => $current_theme_name, 'file_folder' => $file_folder, 'file_name' => 'price.temp', 'file_content' => $price_content);
                $file_result = upload_file($attrs);

                // $price_content = preg_replace('/[ \t\n]+/', ' ', $price_content);

                $post_params['asset'] = array(
                    'key' => 'snippets/price.liquid',
                    'src' => $file_result['file_url']
                );

                try {

                    $update_file = $this->shopifyapi->call('PUT', '/admin/api/2020-01/themes/'.$current_theme_id.'/assets.json', $post_params);
                    unlink($file_folder.'/price.temp'); // Remove temporary file

                } catch (ShopifyApiException $e) {
                    $errors['product_price_update_error'] = $e->getMessage();
                }

            } catch (ShopifyApiException $e) {

                $file_errors = true;
                $errors['product_price_error'] = $e->getMessage();
                $error['not_found'] = 1;
                $error['file'] = 'price.liquid';
                // pre($e->getMessage());
            } catch (ShopifyCurlException $e) {

                $file_errors = true;
                $errors['product_price_error'] = $e->getMessage();
                $error['not_found'] = 1;
                $error['file'] = 'price.liquid';
                // pre($e->getMessage());
            }
        }

        if(!empty($error) && $error['not_found'] && $error['file'] == 'price.liquid') {
            $file_errors = false;
            unset($errors['product_price_error']);
            /**
             * Update product-template file
             */
            try {

                $product_price = $this->shopifyapi->call('GET', 'admin/api/2020-01/themes/'.$current_theme_id.'/assets.json', array('asset[key]' => 'snippets/product-unit-price.liquid'));

                // Main file backup
                $attrs = array('shop' => $shop, 'theme' => $current_theme_name, 'file_folder' => $file_folder, 'file_name' => 'product-unit-price.liquid', 'file_content' => $product_price['value']);
                upload_file($attrs);

                $price_content = !empty($product_price['value']) ? $product_price['value'] : '';

                if(!empty(strpos($price_content, '{{ variant.unit_price | money }}'))) {
                $find_text = '{{ variant.unit_price | money }}';
                } else if(!empty(strpos($price_content, '{{ product_variant.unit_price | money }}'))) {
                $find_text = '{{ product_variant.unit_price | money }}';
                }

                $replace_text = '<div class="price_{{product.id}}" data-ms-id="{{product.id}}" data-ms-variant_id="{{ product.variants.first.id }}" data-ms-product_price="{{ product.price | divided_by: 100.0 }}" data-ms-handle="{{product.handle}}">'.$find_text.'</div>';

                if ((strpos($price_content, $replace_text) > 0)) $exist = 1; 
                else $exist = 0;

                if( empty($exist) ) {

                    if ((strpos($price_content, $find_text) <= 0)) {
                        $errors['content_not_found'] = 1;
                        // goto end_install;
                    }

                    $price_content = str_replace($find_text, $replace_text, $price_content);
                }

                // Create temporary file to update theme.liquid code
                $attrs = array('shop' => $shop, 'theme' => $current_theme_name, 'file_folder' => $file_folder, 'file_name' => 'product-unit-price.temp', 'file_content' => $price_content);
                $file_result = upload_file($attrs);

                // $price_content = preg_replace('/[ \t\n]+/', ' ', $price_content);

                $post_params['asset'] = array(
                    'key' => 'snippets/product-unit-price.liquid',
                    'src' => $file_result['file_url']
                );

                try {

                    $update_file = $this->shopifyapi->call('PUT', '/admin/api/2020-01/themes/'.$current_theme_id.'/assets.json', $post_params);
                    unlink($file_folder.'/product-unit-price.temp'); // Remove temporary file

                } catch (ShopifyApiException $e) {
                    $errors['product_price_update_error'] = $e->getMessage();
                }

            } catch (ShopifyApiException $e) {

                $file_errors = true;
                $errors['product_price_error'] = $e->getMessage();
                $error['not_found'] = 1;
                $error['file'] = 'product-unit-price.liquid';
                // pre($e->getMessage());
            } catch (ShopifyCurlException $e) {

                $file_errors = true;
                $errors['product_price_error'] = $e->getMessage();
                $error['not_found'] = 1;
                $error['file'] = 'product-unit-price.liquid';
                // pre($e->getMessage());
            }
        }

        $main_file_errors = false;
        /**
         * Update product-template file
         */
        try {

            $product_price = $this->shopifyapi->call('GET', 'admin/api/2020-01/themes/'.$current_theme_id.'/assets.json', array('asset[key]' => 'sections/product-template.liquid'));

            // Main file backup
            $attrs = array('shop' => $shop, 'theme' => $current_theme_name, 'file_folder' => $file_folder, 'file_name' => 'product-template.liquid', 'file_content' => $product_price['value']);
            upload_file($attrs);

            $price_content = !empty($product_price['value']) ? $product_price['value'] : '';

            if(!empty(strpos($price_content, '{{ money_price }}'))) {
            $find_text = '{{ money_price }}';
            } else if(!empty(strpos($price_content, '{{ current_variant.price | money }}'))) {
            $find_text = '{{ current_variant.price | money }}';
            } else if(!empty(strpos($price_content, '{{ variant.price | money }}'))) {
            $find_text = '{{ variant.price | money }}';
            } else if(!empty(strpos($price_content, '{{ formatted_price }}'))) {
            $find_text = '{{ formatted_price }}';
            } else if(!empty(strpos($price_content, '{{ product.price | money }}'))) {
            $find_text = '{{ product.price | money }}';
            } else if(!empty(strpos($price_content, "{{ 'products.general.now_price_html' | t: price: price }}"))) {
            $find_text = "{{ 'products.general.now_price_html' | t: price: price }}";
            } else if(!empty(strpos($price_content, "{{ price }}"))) {
            $find_text = "{{ price }}";
            }

            $replace_text = '<div class="price_{{product.id}}" data-ms-id="{{product.id}}" data-ms-variant_id="{{ product.variants.first.id }}" data-ms-product_price="{{ product.price | divided_by: 100.0 }}" data-ms-handle="{{product.handle}}">'.$find_text.'</div>';

            if ((strpos($price_content, $replace_text) > 0)) $exist = 1; 
            else $exist = 0;

            if( empty($exist) ) {

                if ((strpos($price_content, $find_text) <= 0)) {
                    // $errors['content_not_found'] = 1;
                    // goto end_install;
                }

                $price_content = str_replace($find_text, $replace_text, $price_content);
            }

            if(!empty(strpos($price_content, 'ProductPrice'))) {
                $find_text      = 'ProductPrice';
                $replace_text   = 'WSProductPrice';
            } else if(!empty(strpos($price_content, 'productPrice'))) {
                $find_text      = 'productPrice';
                $replace_text   = 'WSproductPrice';
            }

            if ((strpos($price_content, $replace_text) > 0)) $exist = 1; 
            else $exist = 0;

            if( empty($exist) ) {

                if ((strpos($price_content, $find_text) <= 0)) {
                    // $errors['content_not_found'] = 1;
                }
                $price_content = str_replace($find_text, $replace_text, $price_content);
            }

            // Create temporary file to update theme.liquid code
            $attrs = array('shop' => $shop, 'theme' => $current_theme_name, 'file_folder' => $file_folder, 'file_name' => 'product-template.temp', 'file_content' => $price_content);
            $file_result = upload_file($attrs);

            // $price_content = preg_replace('/[ \t\n]+/', ' ', $price_content);

            $post_params['asset'] = array(
                'key' => 'sections/product-template.liquid',
                'src' => $file_result['file_url']
            );

            try {

                $update_file = $this->shopifyapi->call('PUT', '/admin/api/2020-01/themes/'.$current_theme_id.'/assets.json', $post_params);
                unlink($file_folder.'/product-template.temp'); // Remove temporary file

            } catch (ShopifyApiException $e) {
                $errors['product_price_update_error'] = $e->getMessage();
            }

        } catch (ShopifyApiException $e) {

            $main_file_errors = true;
            $errors['product_price_error'] = $e->getMessage();
            $error['not_found'] = 1;
            $error['file'] = 'product-template.liquid';
            // pre($e->getMessage());
        } catch (ShopifyCurlException $e) {

            $main_file_errors = true;
            $errors['product_price_error'] = $e->getMessage();
            $error['not_found'] = 1;
            $error['file'] = 'product-template.liquid';
            // pre($e->getMessage());
        }

        end_install:

        $success_msg['success'] = 'Automatic installation has been done successfully.';
        $error_msg['error']     = 'Something wrong, your theme content(s) or file(s) are mismatched. Please contact to us to install it.';

        $this->session->set_flashdata('success', $success_msg);
        $this->session->set_flashdata('error', $error_msg);
  
        $result = ( (!empty($file_errors) && !empty($main_file_errors)) || !empty($cfile_errors) ) ? $error_msg : $success_msg;
        echo json_encode($result);
    }
}
