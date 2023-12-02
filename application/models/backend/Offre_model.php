<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Offre_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function get_all_offres(){

        $this->db->select('*');
        $this->db->from('offres As C');
        $this->db->where('C.status >',-1);
        $this->db->order_by('C.id ','DESC');
        return $this->db->get()->result();
    }

    public function get_offre($id){

        $this->db->select('*');
        $this->db->from('offres As C');
        $this->db->where('C.id ',$id);
        return $this->db->get()->row();
    }

    public function insert_offre($data){
        $this->db->insert('offres',$data);
        return $this->db->insert_id();
    }

    //---------------------------Modifier-------------------------------------

    public function update_offre($data,$id){

        $index_array["id"] =$id;
        $query =$this->db->update('offres',$data,$index_array);
        return $query;
    }

    public function update_promo_status($data,$id){

        $index_array["id"] =$id;
        $query =$this->db->update('offres',$data,$index_array);
        return $query;
    }

    //----------------------------------------------------------------

    public function delete_offre($id){
        $data_array["status"] =-1;
        $index_array["id"] =$id;
        $this->db->update('offres',$data_array,$index_array);
        return true;
    }

}