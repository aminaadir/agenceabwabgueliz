<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Commande_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function get_last_id_inserted(){
        $this->db->select("max(id) as 'id' ");
        $this->db->from('reservations');
        return $this->db->get()->row()->id;
    }
    public function get_all_reservations_byclient($idclient){
        $this->db->select('C.*');
        $this->db->from('products_demande As PD');
        $this->db->join('reservations As C',"C.id_commande = PD.id_commande");
        $this->db->where('PD.id_client',$idclient);
        $this->db->group_by('C.id_commande');
        return $this->db->get()->result();
    }
    public function get_commande_by_idcommande($idcmd){
       // var_dump($idcmd);die;
        $this->db->select('*');
        $this->db->from('reservations');
        $this->db->where('id',$idcmd);
        return $this->db->get()->row();
    }
    public function get_infos_commande($idcmd,$idclient){
        $this->db->select('C.id as idcmd,C.date_demande,C.validation,C.parcours,C.remarque,PD.*');
        $this->db->from('products_demande As PD');
        $this->db->join('reservations As C',"C.id_commande = PD.id_commande");
        $this->db->where('PD.id_commande',$idcmd);
        $this->db->where('PD.id_client',$idclient);
        return $this->db->get()->result();
    }
    public function get_all_reservations(){

        $this->db->select('*');
        $this->db->from('reservations As D');
        $this->db->order_by('D.id ','ASC');
        return $this->db->get()->result();
    }
    //-----------------------Statistque --------------------------------------
    public function get_reservations_validation($val){
        $this->db->select('*');
        $this->db->from('reservations As D');
        $this->db->where('D.validation',$val);
        return $this->db->get()->result();
    }

    //--------------------------Ajouter--------------------------------------
    public function insert_commande($data){
        $this->db->insert('reservations',$data);
        return $this->db->insert_id();
    }

    public function insert_linecommande($data){
        $this->db->insert('products_demande',$data);
        return $this->db->insert_id();
    }
    //---------------------------Modifier-------------------------------------
     public function update_commande($data,$id){
        
        $index_array["id"] =$id;
        $query =$this->db->update('reservations',$data,$index_array);
        return $query;
    }

    //----------------------------------------------------------------
    public function set_afficher($id){
        $data_array["status"] =1;
        $index_array["id"] =$id;
        $this->db->update('cours',$data_array,$index_array);
        return true;
    }
    public function set_pas_afficher($id){
        $data_array["status"] =0;
        $index_array["id"] =$id;
        $this->db->update('cours',$data_array,$index_array);
        return true;
    }
    public function delete_devise($id){
        $this->db->where('id', $id);
        $this->db->delete('devises');
        return true;
    }
    
}