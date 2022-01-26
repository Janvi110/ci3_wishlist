<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Email_auth extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    function _send_email($recipients, $data, $template = false) {               
        
        $subject = $data['subject'];
        
        $this->load->library('email');
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['smtp_host'] = 'smtp.yandex.com';
        $config['smtp_port'] = 465;
        $config['smtp_crypto'] = 'ssl';
        $config['smtp_user'] = 'shopify@metizsoft.com';
        $config['smtp_pass'] = 'abc@123_4';

        $this->email->initialize($config);
        
        $this->email->from('shopify@metizsoft.com', 'Easy Wishlist by Metizsoft');
        
        $this->email->to($recipients); 
        
        $this->email->subject($subject);
        
        if($template){
            $message = $this->load->view('email/'.$template.'.php', $data, true);
        } else {
            $message = $data['message'];
        }
        
        $this->email->message($message);
        
        return $this->email->send();
    }
        
}