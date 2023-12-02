<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sous_Categorie_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function get_all_categories_show(){

        $this->db->select('*');
        $this->db->from('sous_categorie As C');
        $this->db->where('status',1);

        $this->db->order_by('C.id ','ASC');
        return $this->db->get()->result();
    }

    public function get_all_categories(){

        $this->db->select('*');
        $this->db->from('sous_categorie As C');
        $this->db->where('status >',-1);
        $this->db->order_by('C.id ','ASC');
        return $this->db->get()->result();
    }
    
    public function get_sous_categorie($id){

        $this->db->select('*');
        $this->db->from('sous_categorie As C');
        $this->db->where('id',$id);

        return $this->db->get()->row();
    }

    public function get_souscat_by_id_cat($id){

        $this->db->select('*');
        $this->db->from('sous_categorie As C');
        $this->db->where('categorie_id',$id);
        $this->db->where('status',1);

        return $this->db->get()->result();
    }
    //--------------------------Ajouter--------------------------------------
    public function insert_sous_categorie($data){
        $this->db->insert('sous_categorie',$data);
        return $this->db->insert_id();
    }
     //---------------------------Modifier-------------------------------------
     public function update_sous_categorie($data,$id){
        
        $index_array["id"] =$id;
        $query =$this->db->update('sous_categorie',$data,$index_array);
        return $query;
    }
    

    //----------------------------------------------------------------
    public function set_afficher($id){
        $data_array["status"] =1;
        $index_array["id"] =$id;
        $this->db->update('sous_categorie',$data_array,$index_array);
        return true;
    }
    public function set_pas_afficher($id){
        $data_array["status"] =0;
        $index_array["id"] =$id;
        $this->db->update('sous_categorie',$data_array,$index_array);
        return true;
    }
    public function delete_sous_categorie($id){
        $data_array["status"] =-1;
        $index_array["id"] =$id;
        $this->db->update('sous_categorie',$data_array,$index_array);
        return true;
    }

    public function get_all_products_search($id_cat=null, $string=null, $limit =null, $limitstart=null){

        $this->db->select('*');
        $this->db->from('products As C');
//        if ($id_cat !=null){
//            $this->db->where('C.id',$id_cat);
//        }

        $this->db->where('status',1);
        $this->db->where('id_sous_cat',$id_cat);
        if ($string !=null){
            $this->db->like('C.title ', $string);
            $this->db->or_like('C.title_ar ', $string);
            $this->db->or_like('C.description ', $string);
            $this->db->or_like('C.description_ar ', $string);
        }
        if ($limit !="" && $limit !=null){
            $this->db->limit($limit,$limitstart);
        }
        $this->db->order_by('C.id ','DESC');
        return $this->db->get()->result();
    }

    public function get_all_products_bycat($id_cat=null, $limit=null, $limitstart=null){

        $this->db->select('P.*');
        $this->db->from('products As P');
        $this->db->join('products_sous_cat_rollements As C','P.id = C.id_product');
        $this->db->where('status',1);
//
        if ($id_cat !='' && $id_cat !=null && $id_cat !=0){
            $this->db->where('C.id_sous_cat',$id_cat);
        }
        if ($limit !="" && $limit !=null){
            $this->db->limit($limit,$limitstart);
        }
        $this->db->order_by('P.id ','DESC');
        return $this->db->get()->result();
    }

    public function get_all_products($id_sousc =null,$limit =null, $limitstart=null){

        $this->db->select('P.*');
        $this->db->from('products As P');
        $this->db->join('products_sous_cat_rollements As C','P.id = C.id_product');
        $this->db->where('status',1);
//
        $this->db->where('C.id_sous_cat',$id_sousc);
        if ($limit !=null && $limit !=""){
            $this->db->limit($limit,$limitstart);
        }
        $this->db->group_by('P.id');
        $this->db->order_by('P.id ','DESC');
        return $this->db->get()->result();
    }
    public function get_all_products_topv(){

        $this->db->select('*');
        $this->db->from('products_demande As C');

        $this->db->group_by('C.id_product');
        $this->db->limit(3);
        return $this->db->get()->result();
    }
}