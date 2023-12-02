<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function get_all_themes(){

        $this->db->select('*');
        $this->db->from('themes As C');
        $this->db->order_by('C.id ','ASC');
        return $this->db->get()->result();
    }



    //--------------------------Ajouter--------------------------------------
//    public function insert_commande($data){
//        $this->db->insert('commandes',$data);
//        return $this->db->insert_id();
//    }
//
//    //---------------------------Modifier-------------------------------------
//     public function update_commande($data,$id){
//
//        $index_array["id"] =$id;
//        $query =$this->db->update('commandes',$data,$index_array);
//        return $query;
//    }

    //----------------------------------------------------------------
    public function set_color_active($color_id,$id){
        $data_array["color_id"] =$color_id;
        $index_array["id"] =$id;
        $this->db->update('store_infos',$data_array,$index_array);
        return true;
    }

    public function delete_theme($id){
        $this->db->where('id', $id);
        $this->db->delete('themes');
        return true;
    }

}