<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Group_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function save_group($data = array()) {

        if (!empty($data['id'])) {

            $updated = $this->db->where('id', $data['id'])->update('product_group', $data);
            return $data['id'];
        } else {            
            $inserted = $this->db->insert('product_group', $data);            
            return $this->db->insert_id();
        }
    }

    public function check_group($shop_id = '', $where = array()) {

        if (empty($shop_id))
            return false;

        $this->db->where('shop_id', $shop_id);
        $this->db->where($where);
        $query = $this->db->get('product_group');

        return $query->num_rows();
    }

    public function get_group($shop_id = '', $where = array()) {

        if (empty($shop_id))
            return false;

        $this->db->where('shop_id', $shop_id);
        $this->db->where($where);
        $query = $this->db->get('product_group');

        if (!empty($where) || !empty($where['id'])) {
            return $query->row();
        }
        return $query->result();
    }

    public function delete_group($id = '') {

        if (!empty($id)) {

            $this->db->where('id', $id);
            $query = $this->db->delete('product_group');

            $this->db->where('group_id', $id)->delete('group_pricing_level');
            return true;
        }
        return false;
    }

    public function save_group_level($data = array()) {

        $is_exist = $this->get_group_level(array('group_id' => $data['group_id']));

        if (!empty($is_exist)) {
            $updated = $this->db->where('group_id', $data['group_id'])->update('group_pricing_level', $data);
            return $is_exist->id;
        } else {
            $inserted = $this->db->insert('group_pricing_level', $data);
            return $this->db->insert_id();
        }
    }

    public function get_group_level($where = array()) {

        $this->db->where($where);
        $query = $this->db->get('group_pricing_level');

        if (!empty($where) && !empty($where['group_id'])) {
            return $query->row();
        }
        return $query->result();
    }
    
    
    public function get_all_product_group($shop_id = '', $limit, $offset, $search = '') {
        if (empty($shop_id))
            return false;
              
        $this->db->select('*');
        $this->db->where('shop_id', $shop_id);
        if($search != ''){
          $this->db->group_start();
          $this->db->or_like('calculation_type', $search);
          $this->db->or_like('group_name', $search); 
          $this->db->group_end();                
        }        
        $this->db->limit($offset, $limit);
        //  $this->db->where('shop_id', $shop_id);
        $this->db->from('product_group');        
        $query = $this->db->get();
        //pre($this->db->last_query());exit;
        return $query->result();
    }
    
    // for collection sync
    public function addupdatecollection($data = array()) {        

        $is_exist = $this->get_collection(array('collection_id' => $data['collection_id']));

        if (!empty($is_exist)) {
            $updated = $this->db->where('collection_id', $data['collection_id'])->update('collections', $data);
            return $is_exist->id;
        } else {
            $inserted = $this->db->insert('collections', $data);
            return $this->db->insert_id();
        }
    }

    public function get_collection($where = array()) {

        $this->db->where($where);
        $query = $this->db->get('collections');
        return $query->row();        
    }

    public function get_allcollection($store_id = ''){
        $this->db->select('*');
        $this->db->where('store_id', $store_id);
        $query = $this->db->get('collections');
        return $query->result_array();        
    }

    public function delete_allcollection($store_id = ''){
        $this->db->where('store_id', $store_id);
        $query = $this->db->delete('collections');      
    }

    public function del_collection($store_id = '',$collection_id = '') {

        if(!empty($store_id)){
            $this->db->where('store_id', $store_id);
        }
        if(!empty($collection_id)){
            $this->db->where('collection_id', $collection_id);
            $this->db->delete('collections');
        }        

        return true;        
    }

    public function create_table()
    {
      $sql = "ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";
      $query = $this->db->query($sql);
      return $query;
    } 

    public function check_table(){
        pre('check');
        pre($this->db->table_exists('collections'));
    }

}


