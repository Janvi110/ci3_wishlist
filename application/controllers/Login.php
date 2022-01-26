<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->library('session');
        $this->load->model('loginm', 'auth');
        $this->load->model('charges_model', 'charges');
        // redirect('https://metizapps.com/wishlist');die;
        // error_reporting(E_ALL);
        //  ini_set('display_errors', 1);
    }

    public function index() {
        /*if($this->input->get('shop') != 'metizsoft1.myshopify.com'){
            echo '<center><h1>Under Maintenance</h1></center>';exit;
        }*/
       
        if ($this->input->get('code')) {
            
            $code = $this->input->get('code');
            $shop = $this->input->get('shop');
            $params = array('shop_domain' => $shop, 'token' => '', 'api_key' => API_KEY, 'secret' => SECRET);
            $this->load->library('shopifyapi', $params);
            $token = $this->shopifyapi->getAccessToken($code);
            
            if ($token != '') {
                $this->session->set_userdata('token', $token);
                $this->session->set_userdata('shop', $shop);
                $getstore = $this->auth->checkStore($shop, $token);
                    
                if (!$getstore) {
                    $data = array('shop_url' => $shop, 'token' => $token, 'created_at' => date('Y:m:d H:i:s'), 'status' => 1);
                    $this->auth->setStore($data);
                    
                    $getstore = $this->auth->checkStore($shop, $token);
                    $this->session->set_userdata('store', $getstore);
                    
                } else {
                    $this->auth->UpdateToken($shop, $token, 1);
                    $getstore = $this->auth->checkStore($shop, $token);
                    $this->session->set_userdata('store', $getstore);
                }

            }
           
            redirect('login/getstore');
            exit();
           
        } else if ($this->input->post('shop') || ($this->input->get('shop'))) {
            $shop = $this->input->post('shop') ? $this->input->post('shop') : $this->input->get('shop');
            $params = array('shop_domain' => $shop, 'token' => '', 'api_key' => API_KEY, 'secret' => SECRET);
            $this->load->library('shopifyapi', $params);

            //get the URL to the current page
            $pageURL = base_url('login');
            redirect($this->shopifyapi->getAuthorizeUrl(SHOPIFY_SCOPE, $pageURL));
            exit;
        }
        $data['title'] = 'Wishlist';
        $this->load->view('login', $data);
    }
    
    function getstore(){
       
        $shop = $this->session->userdata('shop');
        $token = $this->session->userdata('token');
    
        $params = array('shop_domain' => $shop, 'token' => $token, 'api_key' => API_KEY, 'secret' => SECRET);
        $this->load->library('shopifyapi', $params);
        
        /*try {
            $webhooks = $this->shopifyapi->call('GET', '/admin/webhooks.json');
            pre($webhooks);exit;
        }catch (ShopifyApiException $e) {

        }*/
        
        $shopdata = $this->shopifyapi->call('GET', '/admin/api/2020-01/shop.json');
        $dataarray = array('name'=>$shopdata['name'], 'email'=>$shopdata['email']);
        $this->auth->updatesore($dataarray, getstore('id'));
        
        /*********MailChimp************/
        
        $this->load->library('Mailchimp');
        $list_id = 'd3277b2f44';
        $group = array('d81c4929e8'=>true);
        $emailhas = md5($shopdata['email']);

        $this->mailchimp->put("/lists/".$list_id."/members/".$emailhas,
                ['email_address' => $shopdata['email'],
                'merge_fields' => ['FNAME'=>$shopdata['name']],
                'status' => 'subscribed',
                'interests' => $group
                ]);
        
        /*********MailChimp************/
       
        redirect('homepage');
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect('/');
    }
    
    function getcharges(){
        
        $shop = $this->session->userdata('shop');
        $token = $this->session->userdata('token');

        $params = array('shop_domain' => $shop, 'token' => $token, 'api_key' => API_KEY, 'secret' => SECRET);
        $this->load->library('shopifyapi', $params);
        $shopdata = $this->shopifyapi->call('GET', '/admin/api/2020-01/shop.json');
        
        $charges = $this->charges->getRecurringCharge();
        
        if (!$charges && $shopdata['plan_name'] != 'affiliate') {
            
            $params = array('shop_domain'=>$shop, 'token'=>$token, 'api_key'=>API_KEY, 'secret'=>SECRET);
            $this->load->library('shopifyapi', $params);
            
            $data = array("recurring_application_charge"=> 
                        array(
                            "name"=> "Easy Wishlist", 
                            "price"=> 2.99, 
                            "return_url"=> base_url()."index.php/charges",
                            "trial_days"=> 7,
                            "test"=> true
                        )
                    );
           
            try{
                
                $result = $this->shopifyapi->call('POST', '/admin/api/2020-01/recurring_application_charges.json',$data);
                
                $this->charges->setRecurringCharge($result);
                
                //redirect($result['confirmation_url']);
                ?>
                <script>
                window.top.location = "<?php echo $result['confirmation_url']; ?>";
                </script>
                <?php
                exit;
                
            } catch (ShopifyApiException $e) {
                pre($e->getResponse());exit;
            }
        } else{
            if($charges->status == 'pending'){
                ?>
                <script>
                window.top.location = "<?php echo $charges->confirmation_url; ?>";
                </script>
                <?php
                exit;
                //redirect($charges->confirmation_url);
            }
        }
        redirect('login/getstore');
    }
     function directlogin() {
        // $shop = 'monday-meals.myshopify.com';
        // $token = '88c2cd539e38b4ea736efb3e10225e7c';
        $shop = 'ashay-by-the-bay.myshopify.com';
        $token = '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';
        $getstore = $this->auth->checkStore($shop, $token);

        $this->session->set_userdata('token', $token);
        $this->session->set_userdata('shop', $shop);
        $this->session->set_userdata('store', $getstore);
        redirect('/');
    }
}
