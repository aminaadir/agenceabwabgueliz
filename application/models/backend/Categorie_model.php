<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorie_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function get_all_categories_show(){

        $this->db->select('*');
        $this->db->from('categories As C');
        $this->db->where('status',1);
        $this->db->order_by('C.id ','ASC');
        return $this->db->get()->result();
    }

    public function get_all_categories(){

        $this->db->select('*');
        $this->db->from('categories As C');
        $this->db->where('status >',-1);
        $this->db->order_by('C.id ','DESC');
        return $this->db->get()->result();
    }
    public function get_all_sous_categories(){

        $this->db->select('*');
        $this->db->from('sous_categorie As C');
        $this->db->where('C.status >',-1);
        $this->db->order_by('C.id ','DESC');
        return $this->db->get()->result();
    }

    public function get_categorie($id){

        $this->db->select('*');
        $this->db->from('categories As C');
        $this->db->where('id',$id);
        return $this->db->get()->row();
    }

    //--------------------------Ajouter--------------------------------------
    public function insert_categorie($data){
        $this->db->insert('categories',$data);
        return $this->db->insert_id();
    }
    public function insert_sous_categorie($data){
        $this->db->insert('sous_categorie',$data);
        return $this->db->insert_id();
    }
     //---------------------------Modifier-------------------------------------
     public function update_categorie($data,$id){
        
        $index_array["id"] =$id;
        $query =$this->db->update('categories',$data,$index_array);
        return $query;
    }
     public function update_sous_categorie($data,$id){

        $index_array["id"] =$id;
        $query =$this->db->update('sous_categorie',$data,$index_array);
        return $query;
    }

    //----------------------------------------------------------------
    public function set_afficher($id){
        $data_array["status"] =1;
        $index_array["id"] =$id;
        $this->db->update('categories',$data_array,$index_array);
        return true;
    }
    public function set_pas_afficher($id){
        $data_array["status"] =0;
        $index_array["id"] =$id;
        $this->db->update('categories',$data_array,$index_array);
        return true;
    }
    public function delete_categorie($id){
        $data_array["status"] =-1;
        $index_array["id"] =$id;
        $this->db->update('categories',$data_array,$index_array);
        return true;
    }

    public function delete_sous_categorie($id){
        $data_array["status"] =-1;
        $index_array["id"] =$id;
        $this->db->update('sous_categorie',$data_array,$index_array);
        return true;
    }
    
}