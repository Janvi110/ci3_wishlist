<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Tier_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function save_tier($data = array()) {
       if (!empty($data['id'])) {
              $updated = $this->db->where('id', $data['id'])->update('tiers', $data);
        } else {
            unset($data['id']);
             $this->db->insert('tiers', $data);
            return $this->db->insert_id();
        }
    }

    public function check_tier($shop_id = '', $where = array()) {

        if (empty($shop_id))
            return false;

        $this->db->where('shop_id', $shop_id);
        $this->db->where($where);
        $query = $this->db->get('tiers');
        return $query->num_rows();
    }

    public function get_tiers($shop_id = '', $where = array()) {

        if (empty($shop_id))
            return false;

        $this->db->where('shop_id', $shop_id);
        $this->db->where($where);
        $query = $this->db->get('tiers');
        return $query->result();
    }
    public function get_tiers_dash($shop_id = '', $where = array()) {

        if (empty($shop_id))
            return false;

        $this->db->where('shop_id', $shop_id);
        $this->db->where($where);
        $query = $this->db->get('tiers');
        
        return $query->result_array();
    }
    public function get_tiers_listing($shop_id = '', $limit ,$offset,$search = '') {
        if (empty($shop_id))
            return false;   
        $this->db->where('shop_id', $shop_id);      
        if($search != ''){
          $this->db->group_start();
          $this->db->or_like('tier_name', $search);
          $this->db->or_like('tier_discount', $search);     
          $this->db->group_end();             
        } 
        $this->db->limit($offset,$limit);
        //$this->db->where('shop_id', $shop_id);
        $query = $this->db->get('tiers');          
        return $query->result();
    }

    public function delete_tier($id = '') {

        if (!empty($id)) {

            $this->db->where('id', $id);
            $query = $this->db->delete('tiers');
            return true;
        }
        return false;
    }

    public function get_tiername($tier_id = '') {

        if (empty($tier_id))
            return false;

        $this->db->select('tier_name');
        $this->db->where('id', $tier_id);
        $query = $this->db->get('tiers');
        return $query->row();
    }

    public function get_tiers_count($shop_id = '', $where = array()) {
   
        // if (empty($shop_id))
        //     return false;
        // $this->db->select('tier, count(tier) AS num_of_time');       
        // $this->db->group_by('tier'); 
        // $this->db->where('shop_id', $shop_id);
        // $this->db->get('customers',10);
        // return $query->result();

        $query = $this->db
              ->select('tier, count(tier) AS total')
              ->group_by('tier')
              ->order_by('total', 'desc')
              ->where('shop_id',$shop_id)
              ->get('customers', 10);  
             
        return $query->result();
    }

}
