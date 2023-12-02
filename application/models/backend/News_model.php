<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function get_all_news(){

        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('status', 1);
        $this->db->order_by('id', "DESC");
        return $this->db->get()->result();
    }
    
    public function get_all_recent_news(){

        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('status', 1);
        $this->db->order_by('id', "DESC");
        $this->db->limit(6);
        return $this->db->get()->result();
    }

    public function get_news($id){

        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function get_show_news(){

        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('status',1); 
        return $this->db->get()->result();
    }

    public function get_hide_news(){

        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('status',0); 
        return $this->db->get()->result();
    }

    //--------------------------Ajouter--------------------------------------
    public function insert_news($data){
        $this->db->insert('news',$data);        
        return $this->db->insert_id();
    }
    //---------------------------Modifier-------------------------------------
    public function update_news($data,$id){
            
        $index_array["id"] =$id;
        $query =$this->db->update('news',$data,$index_array);
        return $query;
    }


    //----------------------------------------------------------------
    public function set_afficher($id){
        $data_array["status"] =1;
        $index_array["id"] =$id;
        $this->db->update('news',$data_array,$index_array);
        return true;
    }
    public function set_pas_afficher($id){
        $data_array["status"] =0;
        $index_array["id"] =$id;
        $this->db->update('news',$data_array,$index_array);
        return true;
    }
    public function delete_nouvelle($id){
        $this->db->where('id', $id);
        $this->db->delete('news');
        return true;
    }
    
    
}