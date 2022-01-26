<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uninstall extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        if (!isset($_SERVER['HTTP_X_SHOPIFY_HMAC_SHA256'])) {
            echo 'Unauthorized';
            exit;
        }
        $headers = apache_request_headers();
        $this->load->model('charges_model', 'charges');
        $this->load->model('loginm', 'auth');
        $this->load->model('email_auth');
        
        $shop = $headers['X-Shopify-Shop-Domain'];
        
        $storedata = $this->auth->checkStore($shop);
        
        $shopowner = json_decode(file_get_contents('php://input'), true);
        
        if (isset($shopowner['id']) && !empty($shopowner['email'])) {
            $nameArr = explode(' ', $shopowner['name']);
            $fname = isset($nameArr[0]) ? $nameArr[0] : '';
            $lname = isset($nameArr[1]) ? $nameArr[1] : '';
            
            $data['subject']    = 'Please Help us Improve!';
            $data['firstname']  = $fname;
            $data['lastname']   = $lname;
            $data['fullname']   = $shopowner['name'];
            
            $recipients = $shopowner['email'];

            $this->email_auth->_send_email($recipients, $data, 'uninstall');
        }
        
        $result = $this->charges->uninstall($storedata->id);
    }
    
    public function setwebhooks() {
        
        $this->load->model('loginm', 'auth');
        $allstores = $this->auth->getAllStore();
        
        $uninstall = base_url('uninstall');
        
        foreach ($allstores as $k=>$store):
            if($k >= 400 && $k < 500){
                //pre($store);exit;
                $this->load->library('shopifyapi');
                
                $webhook['webhook'] = array(
                    'topic' => 'app/uninstalled',
                    'address' => $uninstall,
                    'format' => 'json');
                $webhooks = $this->shopifyapi->directRequest($store->shop_url,$store->token, 'POST', '/admin/api/2020-01/webhooks.json', $webhook);
                pre($webhooks);
            }
        endforeach;
    }
    
    public function checkemail() {
        ini_set('display_errors', 1);
        $this->load->model('email_auth');
        
        $nameArr = explode(' ', 'Jaydip Kansagra');
        $FNAME = isset($nameArr[0]) ? $nameArr[0] : '';
        $LNAME = isset($nameArr[1]) ? $nameArr[1] : '';

        $data['subject']    = 'Please Help us Improve!';
        $data['firstname']  = $FNAME;
        $data['lastname']   = $LNAME;
        $data['fullname']   = 'Jaydip Kansagra';

        $recipients = 'kanasagraj@gmail.com';

        $this->email_auth->_send_email($recipients, $data, 'uninstall');
        echo $this->email->print_debugger();
    }
    
    public function setmailchimp($start){
        $this->load->model('loginm', 'auth');
        $allstores = $this->auth->getAllStore();
        //pre($allstores);exit;
        $start = $start;
        $stop = $start+25;
        foreach ($allstores as $key=>$store){
            
            if($key > $start && $key < $stop && $store->name != ''){
                //pre($store);
                $this->load->library('Mailchimp');
                $list_id = 'd3277b2f44';
                $group = array('d81c4929e8'=>true);
                $email = $store->email;
                $name = $store->name;
                $emailhas = md5($email);

                $result = $this->mailchimp->put("/lists/".$list_id."/members/".$emailhas,
                        ['email_address' => $email,
                        'merge_fields' => ['FNAME'=>$name],
                        'status' => 'subscribed',
                        'interests' => $group
                        ]);
                pre($result);
                                  
            }
        }
    }
    
    
}
