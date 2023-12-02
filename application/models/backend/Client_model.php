<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Client_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function get_all_clients(){

        $this->db->select('*');
        $this->db->from('clients As C');
        $this->db->where('C.status >',-1);
        $this->db->order_by('C.id ','Desc');
        return $this->db->get()->result();
    }
    public function get_client($id){

        $this->db->select('*');
        $this->db->from('clients As C');
        $this->db->where('C.id',$id);
        return $this->db->get()->row();
    }
    public function get_admin($id){

        $this->db->select('*');
        $this->db->from('admins As C');
        $this->db->where('C.id',$id);
        return $this->db->get()->row();
    }

    public function get_all_admins(){
        $this->db->select('*');
        $this->db->from('admins As C');
        return $this->db->get()->result();
    }

    public function get_all_emails(){

        $this->db->select('*');
        $this->db->from('mailing As C');
        $this->db->order_by('C.id ','ASC');
        return $this->db->get()->result();
    }
    //-----------------------Statistque --------------------------------------
    public function get_commandes_validation($val){
        $this->db->select('*');
        $this->db->from('commandes As D');
        $this->db->where('D.validation',$val);
        return $this->db->get()->result();
    }

    //--------------------------Ajouter--------------------------------------
    public function insert_client($data){
        $this->db->insert('clients',$data);
        return $this->db->insert_id();
    }
    public function insert_admin($data){
        $this->db->insert('admins',$data);
        return $this->db->insert_id();
    }

    public function insert_linecommande($data){
        $this->db->insert('products_demande',$data);
        return $this->db->insert_id();
    }
    //---------------------------Modifier-------------------------------------
    public function update_client($data,$id){

        $index_array["id"] =$id;
        $query =$this->db->update('clients',$data,$index_array);
        return $query;
    }
    public function update_admin($data,$id){

        $index_array["id"] =$id;
        $query =$this->db->update('admins',$data,$index_array);
        return $query;
    }

     public function update_commande($data,$id){
        
        $index_array["id"] =$id;
        $query =$this->db->update('commandes',$data,$index_array);
        return $query;
    }

    public function update_password($data,$id){

        $index_array["id"] =$id;
        $query =$this->db->update('clients',$data,$index_array);
        return $query;
    }
    public function update_password_admin($data,$id){

        $index_array["id"] =$id;
        $query =$this->db->update('admins',$data,$index_array);
        return $query;
    }
    //----------------------------------------------------------------
    public function set_afficher($id){
        $data_array["status"] =1;
        $index_array["id"] =$id;
        $this->db->update('clients',$data_array,$index_array);
        return true;
    }
    public function set_pas_afficher($id){
        $data_array["status"] =0;
        $index_array["id"] =$id;
        $this->db->update('clients',$data_array,$index_array);
        return true;
    }
    public function delete_client($id){
        $this->db->where('id', $id);
        $this->db->delete('clients');
        return true;
    }
    public function delete_user($id){
        $this->db->where('id', $id);
        $this->db->delete('admins');
        return true;
    }

    public function delete_cmd_byclient($id){
        $this->db->where('clt_id', $id);
        $this->db->delete('commandes');
        return true;
    }
    public function delete_cmd_products_byclient($id){
        $this->db->where('id_client', $id);
        $this->db->delete('products_demande');
        return true;
    }

    
}