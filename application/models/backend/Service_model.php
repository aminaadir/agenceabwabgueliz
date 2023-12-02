<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Service_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function get_all_services(){

        $this->db->select('*');
        $this->db->from('services As C');
        $this->db->where('C.status >',-1);
        
        $this->db->order_by('C.id ','DESC');
        return $this->db->get()->result();
    }
    public function get_all_services2(){

        $this->db->select('*');
        $this->db->from('services As C');
        $this->db->where('C.status >',-1);
        $this->db->where('C.categorie_id =',2);
        $this->db->order_by('C.id ','DESC');
        return $this->db->get()->result();
    }
    public function get_service_by_type($id_categorie){

        $this->db->select('*');
        $this->db->from('services As C');
        $this->db->where('C.status >',-1);
        $this->db->where('C.categorie_id ',$id_categorie);
        $this->db->order_by('C.id ','DESC');
        return $this->db->get()->result();
    }
    public function get_last_service_by_type($id_categorie){

        $this->db->select('*');
        $this->db->from('services As C');
        $this->db->where('C.status >',-1);
        $this->db->where('C.categorie_id ',$id_categorie);
        $this->db->order_by('C.id ','DESC');
        $this->db->limit(1);
        return $this->db->get()->result();
    }

    public function get_last3service_by_type($id_categorie){

        $this->db->select('*');
        $this->db->from('services As C');
        $this->db->where('C.status >',-1);
        $this->db->where('C.categorie_id ',$id_categorie);
        $this->db->order_by('C.id ','DESC');
        $this->db->limit(3);
        return $this->db->get()->result();
    }

    public function get_all_chambres(){

        $this->db->select('*');
        $this->db->from('chambres As C');
        $this->db->where('C.status >',-1);
        $this->db->order_by('C.id ','DESC');
        return $this->db->get()->result();
    }

    public function get_all_chambres_by_serviceId($id){

        $this->db->select('*');
        $this->db->from('chambres As C');
        $this->db->where('C.status >',-1);
        $this->db->where('C.service_id ',$id);
        $this->db->order_by('C.id ','DESC');
        return $this->db->get()->result();
    }

    public function get_service($id){

        $this->db->select('*');
        $this->db->from('services As C');
        $this->db->where('C.id ',$id);
        return $this->db->get()->row();
    }

    public function get_chambre($id){

        $this->db->select('*');
        $this->db->from('chambres As C');
        $this->db->where('C.id ',$id);
        return $this->db->get()->row();
    }

    public function get_services_by_cous_cat_id($sous_cat_id){

        $this->db->select('*');
        $this->db->from('services As C');
        $this->db->where('C.sous_categorie_id ',$sous_cat_id);
        return $this->db->get()->result();
    }

    public function get_services_by_cat_id($cat_id){

        $this->db->select('*');
        $this->db->from('services As C');
        $this->db->where('C.categorie_id ',$cat_id);
        return $this->db->get()->result();
    }

    public function get_service_whereDestination($designation){

        $this->db->select('*');
        $this->db->from('services As C');
        $this->db->like('C.lieu ', $designation);
        $this->db->or_like('C.titre ', $designation);
        $this->db->or_like('C.petit_desc ', $designation);
        $this->db->where('C.status !=',-1);
        return $this->db->get()->result();
    }

    public function get_services_by_id_partenaire($idpartenaire){

        $this->db->select('*');
        $this->db->from('services As C');
        $this->db->where('C.partenaire_id ',$idpartenaire);
        return $this->db->get()->result();
    }

    public function get_chambres_by_service($idservice){

        $this->db->select('*');
        $this->db->from('chambres As C');
        $this->db->where('C.service_id ',$idservice);
        return $this->db->get()->result();
    }

    public function get_service_images($id){

        $this->db->select('*');
        $this->db->from('service_images As C');
        $this->db->where('C.service_id ',$id);
        return $this->db->get()->result();
    }
    public function get_image($id){

        $this->db->select('*');
        $this->db->from('service_images As C');
        $this->db->where('C.id ',$id);
        return $this->db->get()->row();
    }

    //--------------------------Ajouter--------------------------------------
    public function insert_service($data){
        $this->db->insert('services',$data);
        return $this->db->insert_id();
    }

    public function insert_images($data){
        $this->db->insert('service_images',$data);
        return $this->db->insert_id();
    }
    public function insert_chambre($data){
        $this->db->insert('chambres',$data);
        return $this->db->insert_id();
    }

    public function insert_offre($data){
        $this->db->insert('offres',$data);
        return $this->db->insert_id();
    }

    //---------------------------Modifier-------------------------------------
    public function update_service($data,$id){

        $index_array["id"] =$id;
        $query =$this->db->update('services',$data,$index_array);
        return $query;
    }
    public function update_image($data,$id){

        $index_array["id"] =$id;
        $query =$this->db->update('service_images',$data,$index_array);
        return $query;
    }
    public function update_chambre($data,$id){

        $index_array["id"] =$id;
        $query =$this->db->update('chambres',$data,$index_array);
        return $query;
    }
    public function update_offre($data,$id){

        $index_array["id"] =$id;
        $query =$this->db->update('offres',$data,$index_array);
        return $query;
    }
    //----------------------------------------------------------------

    public function delete_service($id){
        $data_array["status"] =-1;
        $index_array["id"] =$id;
        $this->db->update('services',$data_array,$index_array);
        return true;
    }
    public function delete_offre($id){
        $data_array["status"] =-1;
        $index_array["id"] =$id;
        $this->db->update('offres',$data_array,$index_array);
        return true;
    }
    public function delete_image($id){
        $this->db->where('id', $id);
        $this->db->delete('service_images');
        return true;
    }
    //----------------------------------------------------------------
    public function set_afficher($id){
        $data_array["status"] =1;
        $index_array["id"] =$id;
        $this->db->update('services',$data_array,$index_array);
        return true;
    }
    public function set_pas_afficher($id){
        $data_array["status"] =0;
        $index_array["id"] =$id;
        $this->db->update('services',$data_array,$index_array);
        return true;
    }


    
}