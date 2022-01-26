<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Installation extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->library('session');
        $this->load->model('charges_model', 'charges');      
    }

    public function index() {
        if ($this->session->userdata('token') == FALSE) redirect('login');
        $data = array();
        if($this->input->get('success')) {
            $data['message'] = 'Your request has been sent successfully.';
        }
        // $res_msg = $this->session->userdata('res_message');
        $data['title'] = 'Installation | Easy Wishlist'; 
        $data['thisPage'] = 'Installation'; 
        $this->load->view('header', $data);
        $this->load->view('code_intallation', $data);
        $this->load->view('footer');
    }

    public function manual_install() {
        $data =array();
        // $data = file_get_contents(FCPATH.'assets/js/checkout_snippet.liquid.js');
        // $file_content = nl2br(htmlspecialchars($data));        
        $data['title'] = "Easy Wishlist | manual_install";
        $this->load->view('header');
        $this->load->view('installation_instructions', $data);
        // $this->load->view('installation_intructions', compact('file_content'));
        $this->load->view('footer');
    }

    public function gettheme() {

        $shop  = $this->session->userdata('shop');
        $token = $this->session->userdata('token');

        $errors = array();
        $params = array('shop_domain' => $shop, 'token' => $token, 'api_key' => API_KEY, 'secret' => SECRET);
        $this->load->library('shopifyapi', $params);

        $themes = $this->shopifyapi->call('GET', '/admin/themes.json');
        echo json_encode($themes);
    }

    public function automatic_install() {
        
        $theme_id = $this->input->post('theme_id'); 
        $theme = $this->input->post('theme'); 

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
            $themes = $this->shopifyapi->call('GET', '/admin/api/2021-04/themes.json');
            $index  = array_search('main', array_column($themes, 'role'));

            $current_theme_id = $themes[$index]['id'];
            $current_theme_name = $themes[$index]['name'];
        } catch (ShopifyApiException $e) {
            $errors['theme_error'] = $e->getMessage();
            exit;
        }

        /**
         * Update theme liquid file
         */
        try {

            $assets = $this->shopifyapi->call('GET', 'admin/api/2021-04/themes/'.$current_theme_id.'/assets.json', array('asset[key]' => 'layout/theme.liquid'));
    
            $file_folder  = FCPATH . 'uploads/'.$shop.'/'.$current_theme_name;
            // pre($file_folder);exit;
            $content = !empty($assets['value']) ? $assets['value'] : '';

            // Main file backup
            $attrs = array('shop' => $shop, 'theme' => $current_theme_name, 'file_folder' => $file_folder, 'file_name' => 'theme.liquid', 'file_content' => $content);
            upload_file($attrs);

            preg_match('/jquery(.*?).js/', $content, $match);

            $jquery_exist = !empty($match[0]) ? $match[0] : '';

            if ((strpos($content, 'jquery.js') > 0) || (strpos($content, 'jquery.min.js') > 0) || (strpos($content, $jquery_exist) > 0)) $exist = 1; 
            else $exist = 0;

            if( empty($exist) ) {

                $content = str_replace('<input type="hidden" name="ms_customer_id" id="ms_customer_id" value="{% if customer %}{{ customer.id}}{% else %}0{% endif %}" />', $content);
            }

            // $content = preg_replace('/[ \t\n]+/', ' ', $content);
            $find_text = "</html>";
            $replace_text = "</html>{% include 'checkout_snippet' %}";

            if ((strpos($content, $replace_text) > 0)) $exist = 1; 
            else if((strpos($content, $find_text) > 0)) $exist = 0;

            if( empty($exist) ) {
                $content = str_replace($find_text, $replace_text, $content);
            }

            // Create temporary file to update theme.liquid code
            $attrs = array('shop' => $shop, 'theme' => $current_theme_name, 'file_folder' => $file_folder, 'file_name' => 'theme.temp', 'file_content' => $content);
            echo "<pre>";
            print_r($attrs);
            exit;
            $file_result = upload_file($attrs);

            $post_params['asset'] = array(
                'key' => 'layout/theme.liquid',
                'src' => $file_result['file_url']
            );

            try {
                $update_file = $this->shopifyapi->call('PUT', '/admin/api/2021-04/themes/'.$current_theme_id.'/assets.json', $post_params);
                echo "<pre>";
                print_r($update_file);
                exit;
                unlink($file_folder.'/theme.temp'); // Remove temporary file

            } catch (ShopifyApiException $e) {
                echo "<pre>";
                print_r($e);
                exit;
                $errors['theme_liquid_update_error'] = $e->getMessage();
            }

        } catch (ShopifyApiException $e) {
            $errors['theme_liquid_error'] = $e->getMessage();
        }

        $file_errors = false;
        /**
         * Update product price liquid file
         */
        try {

            $product_price = $this->shopifyapi->call('GET', 'admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', array('asset[key]' => 'snippets/product-price.liquid'));

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

                $update_file = $this->shopifyapi->call('PUT', '/admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', $post_params);
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

        if(!empty($error) && $error['not_found'] && $error['file'] == 'product-price.liquid') {

            $file_errors = false;
            unset($errors['product_price_error']);
            /**
             * Update product-template file
             */
            try {

                $product_price = $this->shopifyapi->call('GET', 'admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', array('asset[key]' => 'snippets/price.liquid'));

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

                    $update_file = $this->shopifyapi->call('PUT', '/admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', $post_params);
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

                $product_price = $this->shopifyapi->call('GET', 'admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', array('asset[key]' => 'snippets/product-unit-price.liquid'));

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

                    $update_file = $this->shopifyapi->call('PUT', '/admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', $post_params);
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

            $product_price = $this->shopifyapi->call('GET', 'admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', array('asset[key]' => 'sections/product-template.liquid'));

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

                $update_file = $this->shopifyapi->call('PUT', '/admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', $post_params);
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

    public function automatic_install_new() {

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        if ($this->session->userdata('token') == FALSE) redirect('login');
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
            $themes = $this->shopifyapi->call('GET', '/admin/api/'.shopify_version.'/themes.json');
            $index  = array_search('main', array_column($themes, 'role'));

        print_r($index);
        die;

            $current_theme_id = $themes[$index]['id'];
            $current_theme_name = $themes[$index]['name'];
        } catch (ShopifyApiException $e) {
            $errors['theme_error'] = $e->getMessage();
            exit;
        }

        // Create snippet file for ajax call on checkout process
        $snippet_content['asset'] = array(
            'key' => 'snippets/checkout_snippet.liquid',
            'src' => base_url('assets/js/checkout_snippet.liquid.js')
        );


        try {
            //pre($current_theme_id);
            $update_file = $this->shopifyapi->call('PUT', '/admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', $snippet_content);
            //pre($update_file);exit;
        } catch (ShopifyApiException $e) {
            $errors['checkout_snippet_create_error'] = $e->getMessage();
            exit;
        }

        /**
         * Update theme liquid file
         */
        try {

            $assets = $this->shopifyapi->call('GET', 'admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', array('asset[key]' => 'layout/theme.liquid'));

            $file_folder  = FCPATH . 'uploads/'.$shop.'/'.$current_theme_name;
            //pre($file_folder);exit;
            $content = !empty($assets['value']) ? $assets['value'] : '';

            // Main file backup
            $attrs = array('shop' => $shop, 'file_folder' => $file_folder, 'file_name' => 'theme.liquid', 'file_content' => $content);
            upload_file($attrs);

            preg_match('/jquery(.*?).js/', $content, $match);

            $jquery_exist = !empty($match[0]) ? $match[0] : '';

            if ((strpos($content, 'jquery.js') > 0) || (strpos($content, 'jquery.min.js') > 0) || (strpos($content, $jquery_exist) > 0)) $exist = 1; 
            else $exist = 0;

            if( empty($exist) ) {

                $content = str_replace('</head>', '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script></head>', $content);
            }

            // $content = preg_replace('/[ \t\n]+/', ' ', $content);
            $find_text = "{% include 'ajax-cart-template' %}";
            $replace_text = "{% include 'ajax-cart-template' %}{% include 'checkout_snippet' %}";

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

                $update_file = $this->shopifyapi->call('PUT', '/admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', $post_params);
                unlink($file_folder.'/theme.temp'); // Remove temporary file

            } catch (ShopifyApiException $e) {
                $errors['theme_liquid_update_error'] = $e->getMessage();
            }

        } catch (ShopifyApiException $e) {
            $errors['theme_liquid_error'] = $e->getMessage();
        }

        /**
         * Update product price liquid file
         */
        try {

            $product_price = $this->shopifyapi->call('GET', 'admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', array('asset[key]' => 'snippets/product-price.liquid'));

            // Main file backup
            $attrs = array('shop' => $shop, 'file_folder' => $file_folder, 'file_name' => 'product-price.liquid', 'file_content' => $product_price['value']);
            upload_file($attrs);

            $price_content = !empty($product_price['value']) ? $product_price['value'] : '';

            $find_text = '<dl class="price{% if compare_at_price > price %} price--on-sale{% endif %}" data-price>';
            $replace_text = '<dl class="price{% if available and compare_at_price > price %} price--on-sale{% endif %}" data-price>';

            if ((strpos($price_content, $replace_text) > 0)) $exist = 1; 
            else $exist = 0;

            if( empty($exist) ) {

                if ((strpos($price_content, $find_text) <= 0)) {
                    $errors['content_not_found'] = 1;
                    goto end_install;
                }

                $price_content = str_replace($find_text, $replace_text, $price_content);
            }

            $find_text = '<div class="price__regular">';
            $replace_text = '<div class="price__regular" id="price_{{product.id}}" data-dyode-id="{{product.id}}" data-dyode-variant_id="{{ product.variants.first.id }}" data-dyode-product_price="{{ product.price | divided_by: 100.0 }}" data-dyode-handle="{{product.handle}}">';

            if ((strpos($price_content, $replace_text) > 0)) $exist = 1; 
            else $exist = 0;

            if( empty($exist) ) {

                $price_content = str_replace($find_text, $replace_text, $price_content);
            }

            $find_text = '{% if available %}';
            $replace_text = "{% if available %}{%- assign sale_avail = '' -%}";

            if ((strpos($price_content, $replace_text) > 0)) $exist = 1; 
            else $exist = 0;

            if( empty($exist) ) {

                $price_content = str_replace($find_text, $replace_text, $price_content);
            }

            $find_text = '{{ compare_at_price | money }}';
            $replace_text = $find_text . "{%- assign sale_avail = 'sale_avail' -%}";

            if ((strpos($price_content, $replace_text) > 0)) $exist = 1; 
            else $exist = 0;

            if( empty($exist) ) {

                $price_content = str_replace($find_text, $replace_text, $price_content);
            }
            // $price_content = preg_replace('/[ \t\n]+/', ' ', $price_content);

            $find_text = '<div class="price__sale">';
            $replace_text = '<div class="price__sale {{sale_avail}}" id="sprice_{{product.id}}">';

            if ((strpos($price_content, $replace_text) > 0)) $exist = 1; 
            else $exist = 0;

            if( empty($exist) ) {

                $price_content = str_replace($find_text, $replace_text, $price_content);
            }

            // $price_content = preg_replace( "/\r|\n/", '', $price_content );

            // Create temporary file to update product_price.liquid code
            $attrs = array('shop' => $shop, 'theme' => $current_theme_name, 'file_folder' => $file_folder, 'file_name' => 'product_price.temp', 'file_content' => $price_content);
            $file_result = upload_file($attrs);

            $post_params['asset'] = array(
                'key' => 'snippets/product-price.liquid',
                'src' => $file_result['file_url']
            );

            try {

                $update_file = $this->shopifyapi->call('PUT', '/admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', $post_params);
                unlink($file_folder.'/product_price.temp'); // Remove temporary file

            } catch (ShopifyApiException $e) {
                $errors['product_price_update_error'] = $e->getMessage();
            }

        } catch (ShopifyApiException $e) {
            $errors['product_price_error'] = $e->getMessage();
            $error['not_found'] = 1;
            $error['file'] = 'product-price.liquid';
        }

        // if product-price.liquid file not found, check other file
        if(!empty($error) && $error['not_found'] && $error['file'] == 'product-price.liquid') {

            unset($errors['product_price_error']);
            /**
             * Update price.liquid file
             */
            try {

                $product_price = $this->shopifyapi->call('GET', 'admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', array('asset[key]' => 'snippets/price.liquid'));

                // Main file backup
                $attrs = array('shop' => $shop, 'theme' => $current_theme_name, 'file_folder' => $file_folder, 'file_name' => 'price.liquid', 'file_content' => $product_price['value']);
                upload_file($attrs);

                $price_content = !empty($product_price['value']) ? $product_price['value'] : '';

                $find_text = '<small aria-hidden="true">{{ formatted_price }}</small>'.PHP_EOL.'<span class="visually-hidden">{{ price | money }}</span>';
                $replace_text = '<div class="price__regular" id="price_{{product.id}}" data-dyode-id="{{product.id}}" data-dyode-variant_id="{{ product.variants.first.id }}" data-dyode-product_price="{{ product.price | divided_by: 100.0 }}" data-dyode-handle="{{product.handle}}">'.PHP_EOL.'<small aria-hidden="true" class="price-item--regular">{{ formatted_price }}</small>'.PHP_EOL.'<span class="visually-hidden">{{ price | money }}</span>'.PHP_EOL.'</div>';

                if ((strpos($price_content, $replace_text) > 0)) $exist = 1; 
                else $exist = 0;

                if( empty($exist) ) {

                    if ((strpos($price_content, $find_text) <= 0)) {
                        $errors['content_not_found'] = 1;
                        goto end_install;
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

                    $update_file = $this->shopifyapi->call('PUT', '/admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', $post_params);
                    unlink($file_folder.'/price.temp'); // Remove temporary file

                } catch (ShopifyApiException $e) {
                    $errors['product_price_update_error'] = $e->getMessage();
                }

            } catch (ShopifyApiException $e) {

                $errors['product_price_error'] = $e->getMessage();
                $error['not_found'] = 1;
                $error['file'] = 'price.liquid';
                pre($e->getMessage());
            }

            /**
             * Update product-templete.liquid file
             */
            try {

                $product_price = $this->shopifyapi->call('GET', 'admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', array('asset[key]' => 'sections/product-template.liquid'));

                // Main file backup
                $attrs = array('shop' => $shop, 'theme' => $current_theme_name, 'file_folder' => $file_folder, 'file_name' => 'product-template.liquid', 'file_content' => $product_price['value']);
                upload_file($attrs);

                $price_content = !empty($product_price['value']) ? $product_price['value'] : '';

                $find_text = '<span id="productPrice-{{ section.id }}" class="h1">';
                $replace_text = '<span class="h1">';

                if ((strpos($price_content, $replace_text) > 0)) $exist = 1; 
                else $exist = 0;

                if( empty($exist) ) {

                    if ((strpos($price_content, $find_text) <= 0)) {
                        $errors['content_not_found'] = 1;
                        goto end_install;
                    }
                    $price_content = str_replace($find_text, $replace_text, $price_content);
                }

                // Create temporary file to update theme.liquid code
                $attrs = array('shop' => $shop, 'theme' => $current_theme_name, 'file_folder' => $file_folder, 'file_name' => 'price_template.temp', 'file_content' => $price_content);
                $file_result = upload_file($attrs);

                // $price_content = preg_replace('/[ \t\n]+/', ' ', $price_content);

                $post_params['asset'] = array(
                    'key' => 'sections/product-template.liquid',
                    'src' => $file_result['file_url']
                );

                try {

                    $update_file = $this->shopifyapi->call('PUT', '/admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', $post_params);
                    unlink($file_folder.'/price_template.temp'); // Remove temporary file

                } catch (ShopifyApiException $e) {
                    $errors['product_template_update_error'] = $e->getMessage();
                }

            } catch (ShopifyApiException $e) {
                $errors['product_template_error'] = $e->getMessage();
                $error['not_found'] = 1;
                $error['file'] = 'product-template.liquid';
            }
        }

        /**
         * Update cart liquid file
         */
        try {

            $cart_file = $this->shopifyapi->call('GET', 'admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', array('asset[key]' => 'sections/cart-template.liquid'));

            // Main file backup
            $attrs = array('shop' => $shop, 'file_folder' => $file_folder, 'file_name' => 'cart-template.liquid', 'file_content' => $cart_file['value']);
            upload_file($attrs);

            $cart_content = !empty($cart_file['value']) ? $cart_file['value'] : '';

            $find_text = "{{ item.price | money }}";
            $replace_text = '<span class="tp_product_price" id="p_{{item.id}}">{{ item.price | money }}</span>';

            if ((strpos($cart_content, $replace_text) > 0)) $exist = 1; 
            else $exist = 0;

            if( empty($exist) ) {

                if ((strpos($cart_content, $find_text) <= 0)) {
                    $errors['content_not_found'] = 1;
                    goto end_install;
                }
                $cart_content = str_replace($find_text, $replace_text, $cart_content);
            }

            $find_text = '{{ item.line_price | money }}';
            $replace_text = '<div class="tp_total_price" id="pt_{{item.id}}"> {{ item.line_price | money }} </div>';

            if ((strpos($cart_content, $replace_text) > 0)) $exist = 1; 
            else $exist = 0;

            if( empty($exist) ) {

                $cart_content = str_replace($find_text, $replace_text, $cart_content);
            }

            $find_text = '<div class="cart__shipping rte">{{ taxes_shipping_checkout }}</div>';
            $replace_text = '<div class="cart__shipping rte">{{ taxes_shipping_checkout }}</div><div class="offer_msg"></div>';

            if ((strpos($cart_content, $replace_text) > 0)) $exist = 1; 
            else $exist = 0;

            if( empty($exist) ) {

                $cart_content = str_replace($find_text, $replace_text, $cart_content);
            }

            $replace_text = "{% include 'checkout_snippet' %}";

            if ((strpos($cart_content, $replace_text) > 0)) $exist = 1; 
            else $exist = 0;

            if( empty($exist) ) {

                $cart_content .= "{% include 'checkout_snippet' %}";
            }

            // $cart_content = preg_replace('/[ \t\n]+/', ' ', $cart_content);

            // Create temporary file to update cart_template.liquid code
            $attrs = array('shop' => $shop, 'theme' => $current_theme_name, 'file_folder' => $file_folder, 'file_name' => 'cart_template.temp', 'file_content' => $cart_content);
            $file_result = upload_file($attrs);

            $post_params['asset'] = array(
                'key' => 'sections/cart-template.liquid',
                'src' => $file_result['file_url']
            );

            try {

                $update_file = $this->shopifyapi->call('PUT', '/admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', $post_params);
                unlink($file_folder.'/cart_template.temp'); // Remove temporary file

            } catch (ShopifyApiException $e) {
                $errors['cart_template_update_error'] = $e->getMessage();
            }

        } catch (ShopifyApiException $e) {
            $errors['cart_template_error'] = $e->getMessage();
            $error['not_found'] = 1;
            $error['file'] = 'cart-template.liquid';
        }

        // if cart-template.liquid file not found, check other file
        if(!empty($error) && $error['not_found'] && $error['file'] == 'cart-template.liquid') {

            unset($errors['cart_template_error']);

            /**
             * Update cart.liquid file
             */
            try {

                $cart_data = $this->shopifyapi->call('GET', 'admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', array('asset[key]' => 'templates/cart.liquid'));

                // Main file backup
                $attrs = array('shop' => $shop, 'file_folder' => $file_folder, 'file_name' => 'cart.liquid', 'file_content' => $cart_data['value']);
                upload_file($attrs);

                $cart_content = !empty($cart_data['value']) ? $cart_data['value'] : '';
                // $cart_content = preg_replace('/[ \t\n]+/', ' ', $cart_content);

                $find_text = "{% include 'price' with item.price %}";
                $replace_text = "<span class=\"tp_product_price\" id=\"p_{{item.id}}\"> {% include 'price' with item.price %} </span>";

                if ((strpos($cart_content, $replace_text) > 0)) $exist = 1; 
                else $exist = 0;

                if( empty($exist) ) {

                    if ((strpos($cart_content, $find_text) <= 0)) {
                        $errors['content_not_found'] = 1;
                        goto end_install;
                    }
                    $cart_content = str_replace($find_text, $replace_text, $cart_content);
                }

                $find_text = '<span class="h1 cart-subtotal--price">';
                $replace_text = '<span class="h1 cart-subtotal--price cart__subtotal">';

                if ((strpos($price_content, $replace_text) > 0)) $exist = 1; 
                else $exist = 0;

                if( empty($exist) ) {

                    $cart_content = str_replace($find_text, $replace_text, $cart_content);
                }

                $find_text = '{% if cart.total_discounts > 0 %}';
                $replace_text = '<div class="offer_msg"></div>{% if cart.total_discounts > 0 %}';

                if ((strpos($price_content, $replace_text) > 0)) $exist = 1; 
                else $exist = 0;

                if( empty($exist) ) {

                    $cart_content = str_replace($find_text, $replace_text, $cart_content);
                }

                $find_text = '<button type="submit" name="checkout" class="btn">';
                $replace_text = '<button type="submit" name="checkout" class="btn cart__submit">';

                if ((strpos($price_content, $replace_text) > 0)) $exist = 1; 
                else $exist = 0;

                if( empty($exist) ) {

                    $cart_content = str_replace($find_text, $replace_text, $cart_content);
                }

                $replace_text = "{% include 'checkout_snippet' %}";

                if ((strpos($cart_content, $replace_text) > 0)) $exist = 1; 
                else $exist = 0;

                if( empty($exist) ) {

                    $cart_content .= "{% include 'checkout_snippet' %}";
                }

                // Create temporary file to update cart.liquid code
                $attrs = array('shop' => $shop, 'theme' => $current_theme_name, 'file_folder' => $file_folder, 'file_name' => 'cart.temp', 'file_content' => $cart_content);
                $file_result = upload_file($attrs);

                $post_params['asset'] = array(
                    'key' => 'templates/cart.liquid',
                    'src' => $file_result['file_url']
                );

                try {

                    $update_file = $this->shopifyapi->call('PUT', '/admin/api/'.shopify_version.'/themes/'.$current_theme_id.'/assets.json', $post_params);
                    unlink($file_folder.'/cart.temp'); // Remove temporary file

                } catch (ShopifyApiException $e) {
                    $errors['cart_template_update_error'] = $e->getMessage();
                }

            } catch (ShopifyApiException $e) {
                $errors['cart_template_error'] = $e->getMessage();
                $error['not_found'] = 1;
                $error['file'] = 'cart.liquid';
            }
        }
        end_install:

        $success_msg['success'] = 'Automatic installation has been done successfully.';
        $error_msg['error']     = 'Something wrong, your theme content(s) or file(s) are mismatched. Please contact to us to install it.';

        //pre($success_msg); pre($error_msg)exit;


        $this->session->set_flashdata('success', $success_msg);
        $this->session->set_flashdata('error', $error_msg);
  
        $result = empty($errors) ? $success_msg : $error_msg;
        echo json_encode($result);
    }

    public function expert_install_old() {

        if ($this->session->userdata('token') == FALSE) redirect('login');
        $shop  = $this->session->userdata('shop');
        $token = $this->session->userdata('token');

        $errors = array();
        $params = array('shop_domain' => $shop, 'token' => $token, 'api_key' => API_KEY, 'secret' => SECRET);
        $this->load->library('shopifyapi', $params);

        $this->load->library('email');
        // $config = array ( 'mailtype' => 'html', 'charset' => 'utf-8', 'priority' => '1',"smtp_port" => '587' );


        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.yandex.com';
        $config['smtp_port'] = '587';
        $config['smtp_crypto'] = 'tls';
        $config['smtp_user'] = 'shopify@metizsoft.com';
        $config['smtp_pass'] = 'jernokoayydwyylj';
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';         

        $this->email->initialize($config);
        $this->email->from("shopify@metizsoft.com");
        $this->email->to('monika.patel@metizsoft.com');
        //$this->email->to('support@metizsoft.zohodesk.com');
        //$this->email->cc('metizsoft@gmail.com');
        $this->email->subject('Request to install tier price');
        $msg_body  = "";
        $msg_body .= "<b>Hello Team,</b>";
        $msg_body .= "<br><br>You have a request for install tier pricing app liquid file's code.";
        $msg_body .= "<br>Store details as below:";
        $msg_body .= "<br><b>Store:</b> ".$shop;
        $msg_body .= "<br><b>Country:</b> ".$shop_details['country'];
        $msg_body .= "<br><br><b>Thanks.</b>";
        $this->email->message($msg_body);

       // $sent = $this->email->send();

        if ($this->email->send()) {
           // echo 'Your Email has successfully been sent.';
        } else {
            pre($this->email->print_debugger());
        }

       
        // $message = 'Your request has been sent successfully.';

        $this->session->set_flashdata('res_message', $message);
       // $this->session->set_userdata('res_message', 'Your request has been sent successfully.');
        redirect("/installation?success=1");

        // try {

        //     $post_data['application_charge'] = array(

        //         'name'       => 'Expert support to install',
        //         'price'      => 25.0,
        //         'return_url' => base_url('installation/expert_charges'),
        //         'test'       => true
        //     );

        //     $charges = $this->shopifyapi->call('POST', '/admin/api/'.shopify_version.'/application_charges.json', $post_data);
        //     $this->charges->set_expert_charges($charges);

        //     redirect($charges['confirmation_url']);

        // } catch (ShopifyApiException $e) {
        //     pre($e->getMessage()); exit;
        // }
    }

    public function expert_install() {

        $note = $this->input->post('note');

        if(empty($note)){
             echo '0';
            exit;
        }else{

            if ($this->session->userdata('token') == FALSE) redirect('login');
            $shop  = $this->session->userdata('shop');
            $token = $this->session->userdata('token');

            $errors = array();
            $params = array('shop_domain' => $shop, 'token' => $token, 'api_key' => API_KEY, 'secret' => SECRET);
            $this->load->library('shopifyapi', $params);
            try {

                $shop_details = $this->shopifyapi->call('GET', '/admin/api/'.shopify_version.'/shop.json');

            } catch (ShopifyApiException $e) {
                pre($e->getResponse()); exit;
            }

            $this->load->library('email');
            // $config = array ( 'mailtype' => 'html', 'charset' => 'utf-8', 'priority' => '1',"smtp_port" => '587' );


            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'utf-8';
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'smtp.yandex.com';
            $config['smtp_port'] = '587';
            $config['smtp_crypto'] = 'tls';
            $config['smtp_user'] = 'shopify@metizsoft.com';
            $config['smtp_pass'] = 'jernokoayydwyylj';
            $config['newline'] = "\r\n";
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';            

            $this->email->initialize($config);
            $this->email->from("shopify@metizsoft.com");            
            // $this->email->to('monika.patel@metizsoft.com');            
            $this->email->to('support@metizsoft.zohodesk.com');
            //$this->email->cc('metizsoft@gmail.com');
            $this->email->subject('Request to install Wholesale Suite');
            $msg_body  = "";
            $msg_body .= "<b>Hello Team,</b>";
            $msg_body .= "<br><br>You have a request for install Wholesale Suite app liquid file's code.";
            $msg_body .= "<br>Store details as below:";
            $msg_body .= "<br><b>Store:</b> ".$shop;
            $msg_body .= "<br><b>Country:</b> ".$shop_details['country'];
            $msg_body .= "<br><b>Notes:</b> ".$note;
            $msg_body .= "<br><br><b>Thanks.</b>";
            $this->email->message($msg_body);

           // $sent = $this->email->send();

            if ($this->email->send()) {
                echo 'Your Email has successfully been sent.';
            } else {
                pre($this->email->print_debugger());
            }           
            // $message = 'Your request has been sent successfully.';

            $this->session->set_flashdata('res_message', $message);
           
            redirect("/installation?success=1");
        }

    }



    public function expert_installlll() {

            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
         
            $note = $this->input->post('note');

            if(empty($note)){
                 echo '0';
                exit;
            }else{
            if ($this->session->userdata('token') == FALSE) redirect('login');
            $shop  = $this->session->userdata('shop');
            $token = $this->session->userdata('token');

            $errors = array();
            $params = array('shop_domain' => $shop, 'token' => $token, 'api_key' => API_KEY, 'secret' => SECRET);
            $this->load->library('shopifyapi', $params);
           try {

                $shop_details = $this->shopifyapi->call('GET', '/admin/api/'.shopify_version.'/shop.json');

            } catch (ShopifyApiException $e) {
                pre($e->getResponse()); exit;
            }

            $this->load->library('email');
            $config = array ( 'mailtype' => 'html', 'charset' => 'utf-8', 'priority' => '1' );

            // $config['mailpath'] = '/usr/sbin/sendmail';
            // $config['charset'] = 'utf-8';
            // $config['protocol'] = 'smtp';
            // $config['smtp_host'] = 'smtp.yandex.com';
            // $config['smtp_port'] = '587';
            // $config['smtp_crypto'] = 'tls';
            // $config['smtp_user'] = 'shopify@metizsoft.com';
            // $config['smtp_pass'] = 'jernokoayydwyylj';
            // $config['newline'] = "\r\n";
            // $config['wordwrap'] = TRUE;
            // $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from($shop_details['email'], $shop_details['name']);
            //$this->email->from("shopify@metizsoft.com");
            $this->email->to('jenish.ghadiya@metizsoft.com');

            $this->email->subject('Request to install tier price');
            $msg_body  = "";
            $msg_body .= "<b>Hello Team,</b>";
            $msg_body .= "<br><br>You have a request for install tier pricing app liquid file's code.";
            $msg_body .= "<br>Store details as below:";
            $msg_body .= "<br><b>Store:</b> ".$shop;
            $msg_body .= "<br><b>Country:</b> ".$shop_details['country'];
            $msg_body .= "<br><br><b>Thanks.</b>";
            $this->email->message($msg_body);

          //  $sent = $this->email->send();
            // $sent = $this->email->send();
            if($this->email->sent()){
               echo 'Your Email has successfully been sent.';
            } else {
                pre($this->email->print_debugger());
            }

            exit;
         
            echo '1';
            exit;
           }
     
    }


    public function expert_charges() {

        

        if( isset($_GET['charge_id']) ) {

            $charge_id = $_GET['charge_id'];

            $shop   = $this->session->userdata('shop');
            $token  = $this->session->userdata('token');

            try {

                $params = array('shop_domain'=>$shop, 'token'=>$token, 'api_key'=>API_KEY, 'secret'=>SECRET);
                $this->load->library('shopifyapi', $params);

                $charges = $this->shopifyapi->call('GET', '/admin/api/'.shopify_version.'/application_charges/'.$charge_id.'.json');

                if($charges['status'] == 'declined') {

                    $this->charges->remove_expert_charge_data(getstore('id'), $charge_id);
                    redirect('https://'.$shop.'/admin/apps');

                } else if($charges['status'] == 'accepted') {

                    $this->charges->update_expert_charges($charges);

                    $data = array('application_charge' => $charges);

                    $activate = $this->shopifyapi->call('POST', '/admin/api/'.shopify_version.'/application_charges/'.$charge_id.'/activate.json', $data);
                    $this->charges->update_expert_charges($activate);

                } else if($charges['status'] == 'active') {

                    $this->charges->update_expert_charges($charges);

                    $data = array('application_charge' => $charges);
                    $activate = $this->shopifyapi->call('POST', '/admin/api/'.shopify_version.'/application_charges/'.$charge_id.'/activate.json', $data);

                    $this->charges->update_expert_charges($activate);
                }

            } catch (ShopifyApiException $e) {
                pre($e->getResponse()); exit;
            }
        }

        try {

            $shop_details = $this->shopifyapi->call('GET', '/admin/api/'.shopify_version.'/shop.json');

        } catch (ShopifyApiException $e) {
            pre($e->getResponse()); exit;
        }

        $this->load->library('email');
        $config = array ( 'mailtype' => 'html', 'charset' => 'utf-8', 'priority' => '1' );
        $this->email->initialize($config);
        $this->email->from($shop_details['email'], $shop_details['name']);
        $this->email->to('kaushik.parmar@metizsoft.com');

        $this->email->subject('Request to install tier price');
        $msg_body  = "";
        $msg_body .= "<b>Hello Team,</b>";
        $msg_body .= "<br><br>You have a request for install tier pricing app liquid file's code.";
        $msg_body .= "<br>Store details as below:";
        $msg_body .= "<br><b>Store:</b> ".$shop;
        $msg_body .= "<br><b>Country:</b> ".$shop_details['country'];
        $msg_body .= "<br><br><b>Thanks.</b>";
        $this->email->message($msg_body);

        $sent = $this->email->send();
        // $message = 'Your request has been sent successfully.';

        $this->session->set_flashdata('res_message', $message);
       // $this->session->set_userdata('res_message', 'Your request has been sent successfully.');
        redirect("/installation?success=1");
    }
}
