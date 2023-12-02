<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reservation_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function get_all_reservations(){

        $this->db->select('*');
        $this->db->from('reservations As C');
        $this->db->where('C.status >',-1);
        $this->db->order_by('C.id ','DESC');
        return $this->db->get()->result();
    }

    public function get_all_accept_reservations(){

        $this->db->select('*');
        $this->db->from('reservations As C');
        $this->db->where('C.validation',1);
        $this->db->order_by('C.id ','DESC');
        return $this->db->get()->result();
    }

    public function get_all_refuse_reservations(){

        $this->db->select('*');
        $this->db->from('reservations As C');
        $this->db->where('C.validation ',2);
        $this->db->order_by('C.id ','DESC');
        return $this->db->get()->result();
    }

    public function get_reservation($id){

        $this->db->select('*');
        $this->db->from('reservations As C');
        $this->db->where('C.id ',$id);
        return $this->db->get()->row();
    }

    public function get_all_services_reservation($id_resa){
        $this->db->select('*');
        $this->db->from('services_reservation As C');
        $this->db->where('C.reservation_id ',$id_resa);
        return $this->db->get()->result();
    }

    public function get_reservations_by_id_partenaire($idpartenaire){

        $this->db->select('*');
        $this->db->from('reservations As C');
        $this->db->where('C.partenaire_id ',$idpartenaire);
        return $this->db->get()->result();
    }
  public function get_all_commandes_byclient($idclient){

        $this->db->select('*');
        $this->db->from('services_reservation As C');
        $this->db->where('C.client_id ',$idclient);
        return $this->db->get()->result();
    }

    //--------------------------Ajouter--------------------------------------
    public function insert_reservation($data){
        $this->db->insert('reservations',$data);
        return $this->db->insert_id();
    }

    public function insert_client($data){
        $this->db->insert('clients',$data);
        return $this->db->insert_id();
    }
    public function insert_services_reservation($data){
        $this->db->insert('services_reservation',$data);
        return $this->db->insert_id();
    }

    //---------------------------Modifier-------------------------------------
    public function update_reservation($data,$id){

        $index_array["id"] =$id;
        $query =$this->db->update('reservations',$data,$index_array);
        return $query;
    }

    //----------------------------------------------------------------

    public function delete_reservation($id){
        $data_array["status"] =-1;
        $index_array["id"] =$id;
        $this->db->update('reservations',$data_array,$index_array);
        return true;
    }

    //----------------------------------------------------------------
//    public function set_afficher($id){
//        $data_array["status"] =1;
//        $index_array["id"] =$id;
//        $this->db->update('reservations',$data_array,$index_array);
//        return true;
//    }
//    public function set_pas_afficher($id){
//        $data_array["status"] =0;
//        $index_array["id"] =$id;
//        $this->db->update('reservations',$data_array,$index_array);
//        return true;
//    }


    
}