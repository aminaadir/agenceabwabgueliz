<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Partenaire_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_partenaires(){

        $this->db->select('*');
        $this->db->from('partenaires As C');
        $this->db->where('status !=', -1);
        $this->db->order_by('C.id ','DESC');
        return $this->db->get()->result();
    }


    public function get_partenaire($id){

        $this->db->select('*');
        $this->db->from('partenaires As C');
        $this->db->where('C.id ',$id);
        return $this->db->get()->row();
    }

    //--------------------------Ajouter--------------------------------------
    public function insert_partenaire($data){
        $this->db->insert('partenaires',$data);
        return $this->db->insert_id();
    }

    //---------------------------Modifier-------------------------------------
     public function update_partenaire($data,$id){
        
        $index_array["id"] =$id;
        $query =$this->db->update('partenaires',$data,$index_array);
        return $query;
    }
    //----------------------------------------------------------------

    public function delete_partenaire($id){
        $data_array["status"] =-1;
        $index_array["id"] =$id;
        $this->db->update('partenaires',$data_array,$index_array);
        return true;
    }

    
}