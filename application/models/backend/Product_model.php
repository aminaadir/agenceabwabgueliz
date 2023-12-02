<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function get_all_services($limit =null, $limitstart=null){

        $this->db->select('*');
        $this->db->from('services As C');
        $this->db->where('statut',1);
        if ($limit !=null && $limit !=""){
            $this->db->limit($limit,$limitstart);
        }
        $this->db->order_by('C.id ','DESC');
        return $this->db->get()->result();
    }

    public function get_all_services_admin(){

        $this->db->select('*');
        $this->db->from('services As C');
        $this->db->order_by('C.id ','DESC');
        return $this->db->get()->result();
    }

    public function get_all_services_topv(){

        $this->db->select('*');
        $this->db->from('services_demande As C');
        $this->db->group_by('C.id_product');
        $this->db->limit(3);
        return $this->db->get()->result();
    }

    public function get_all_top_vendu_services(){

        $this->db->select('*');
        $this->db->from('services_demande As C');
        $this->db->group_by('C.id_product');
        return $this->db->get()->result();
    }
    public function get_all_last3_services_products(){

        $this->db->select('*');
        $this->db->from('services As C');
        $this->db->limit(3);
        $this->db->where('statut',1);
        $this->db->where('C.id_sous_cat',2);
        $this->db->order_by('C.id', "DESC");
        return $this->db->get()->result();
    }

    public function get_all_srvices_products($id){
        // Par Designation
        $this->db->select('*');
        $this->db->from('services As S');
        $this->db->where('statut',1);
        $this->db->where('S.id_sous_cat',$id);
        $this->db->order_by('S.id',"DESC");

        return $this->db->get()->result();
    }

    public function get_all_srvices_actif(){
        // Par Designation
        $this->db->select('*');
        $this->db->from('services As S');
        $this->db->where('statut',1);
        $this->db->order_by('S.id',"DESC");

        return $this->db->get()->result();
    }

    public function get_all_srvices_city_products($id ,$id_des =null){
        // Par Ville (categorie)
        $this->db->select('*');
        $this->db->from('services As S');
        $this->db->where('statut',1);
        $this->db->where('S.id_cat',$id);
        if ($id_des !="") {
            $this->db->where('S.id_sous_cat',$id_des);
        }
        return $this->db->get()->result();
    }

    public function get_all_services_bycat($id_cat=null, $limit=null, $limitstart=null){

        $this->db->select('*');
        $this->db->from('services As C');
        $this->db->where('statut',1);
        if ($id_cat !='' && $id_cat !=null && $id_cat!=0){
            $this->db->where('id_categorie',$id_cat);
        }
        if ($limit !="" && $limit !=null){
            $this->db->limit($limit,$limitstart);
        }
        $this->db->order_by('C.id ','DESC');
        return $this->db->get()->result();
    }
    public function get_all_services_search($id_cat=null, $string=null, $limit =null, $limitstart=null){

        $this->db->select('*');
        $this->db->from('services As C');
//        if ($id_cat !=null){
//            $this->db->where('C.id',$id_cat);
//        }
        $this->db->where('statut',1);
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

    public function get_all_new_services(){

        $this->db->select('*');
        $this->db->from('services As C');
        $this->db->where('statut',1);
        $this->db->where('is_new',1);
        $this->db->order_by('C.id ','DESC');
        return $this->db->get()->result();
    }

    public function get_top_services(){

        $this->db->select('*');
        $this->db->from('top_three_services As C');
        $this->db->order_by('C.id ','ASC');
        return $this->db->get()->result();
    }
    
    public function get_product($id){

        $this->db->select('*');
        $this->db->from('Service');
        $this->db->where('id',$id);
        //$this->add_count($id);
        return $this->db->get()->row();
    }

    public function get_service($id){

        $this->db->select('*');
        $this->db->from('Service');
        $this->db->where('id',$id);
        //$this->add_count($id);
        return $this->db->get()->row();
    }
    //-------------------------------- aide count visiteurs --------------------------------
//    function add_count($slug)
//    {
//        // load cookie helper
//                $this->load->helper('cookie');
//        // this line will return the cookie which has slug name
//                $check_visitor = $this->input->cookie(urldecode($slug), FALSE);
//        // this line will return the visitor ip address
//                $ip = $this->input->ip_address();
//        // if the visitor visit this article for first time then //
//                //set new cookie and update article_views column  ..
//        //you might be notice we used slug for cookie name and ip
//        //address for value to distinguish between articles  views
//        if ($check_visitor == false) {
//            $cookie = array(
//                "name"   => urldecode($slug),
//                "value"  => "$ip",
//                "expire" =>  time() + 7200,
//                "secure" => false
//            );
//            $this->input->set_cookie($cookie);
//            $this->update_counter(urldecode($slug));
//        }
//    }
//    function update_counter($slug) {
//// return current article views
//        $this->db->where('id', urldecode($slug));
//        $this->db->select('article_views');
//        $count = $this->db->get('services')->row();
//// then increase by one
//        $this->db->where('id', urldecode($slug));
//        $this->db->set('article_views', ($count->article_views + 1));
//        $this->db->update('services');
//    }
    //------------------------------------------------------------------------------------
    public function get_services_of_cat($idcat){

        $this->db->select('*');
        $this->db->from('Service');
        $this->db->where('id_categorie',$idcat);
        return $this->db->get()->result();
    }
    public function get_top_product($id){

        $this->db->select('*');
        $this->db->from('top_three_services');
        $this->db->where('id',$id);
        return $this->db->get()->row();
    }

    //--------------------------Ajouter--------------------------------------
    public function insert_product($data){
        $this->db->insert('Service',$data);
        return $this->db->insert_id();
    }
    public function insert_reservation($data){
        $this->db->insert('reservations',$data);
        return $this->db->insert_id();
    }

    public function insert_top_product($data){
        $this->db->insert('top_three_services',$data);
        return $this->db->insert_id();
    }
     //---------------------------Modifier-------------------------------------
     public function update_product($data,$id){
        
        $index_array["id"] =$id;
        $query =$this->db->update('Service',$data,$index_array);
        return $query;
    }

    public function update_top_product($data,$id){

        $index_array["id"] =$id;
        $query =$this->db->update('top_three_services',$data,$index_array);
        return $query;
    }
    //---------------------------------------------------------------
    public function set_top_afficher($id){
        $data_array["statut"] =1;
        $index_array["id"] =$id;
        $this->db->update('top_three_services',$data_array,$index_array);
        return true;
    }
    public function set_top_pas_afficher($id){
        $data_array["statut"] =0;
        $index_array["id"] =$id;
        $this->db->update('top_three_services',$data_array,$index_array);
        return true;
    }
    //----------------------------------------------------------------
    public function set_afficher($id){
        $data_array["statut"] =1;
        $index_array["id"] =$id;
        $this->db->update('Service',$data_array,$index_array);
        return true;
    }
    public function set_pas_afficher($id){
        $data_array["statut"] =0;
        $index_array["id"] =$id;
        $this->db->update('Service',$data_array,$index_array);
        return true;
    }
    public function delete_product($id){
        $this->db->where('id', $id);
        $this->db->delete('Service');
        return true;
    }

    public function delete_top_product($id){
        $this->db->where('id', $id);
        $this->db->delete('top_three_services');
        return true;
    }

    //------------------------------------Gerer les promotion------------------------------------------------
    public function get_all_promo_services(){

        $this->db->select('*');
        $this->db->from('promotions As C');
        $this->db->order_by('C.id ','ASC');
        return $this->db->get()->result();
    }

    public function get_promo_services(){

        $this->db->select('*');
        $this->db->from('promotions As C');
        $this->db->where('statut',1);
        $this->db->order_by('C.id ','ASC');
        return $this->db->get()->result();
    }

    public function insert_promo_product($data){

        $this->db->insert('promotions',$data);
        return $this->db->insert_id();
    }
    public function update_promo_product($data,$id){
        $index_array["id"] =$id;
        $query =$this->db->update('promotions',$data,$index_array);
        return $query;
    }

    public function update_promo_status($data,$id){

        $index_array["id"] =$id;
        $query =$this->db->update('promotions',$data,$index_array);
        return $query;
    }
    public function get_promo($id){

        $this->db->select('*,DATE_FORMAT(date_fin, "%d-%m-%YT%H:%i") as custom_date');
        $this->db->from('promotions');
        $this->db->where('id',$id);
        return $this->db->get()->row();
    }

    public function delete_promo($id){
        $this->db->where('id', $id);
        $this->db->delete('promotions');
        return true;
    }
    //--------------------------Favoris-------------------------------+

    public function get_all_services_favoris($idclient){

        $this->db->select('F.id as "id_fav",F.id_client,F.id_product,P.*');
        $this->db->from('favotites As F');
        $this->db->join('services As P','P.id=F.id_product');
        $this->db->where('id_client',$idclient);
        $this->db->order_by('F.id ','ASC');
        return $this->db->get()->result();
    }

    public function insert_favoris($data){
        $this->db->insert('favotites',$data);
        return $this->db->insert_id();
    }

    public function delete_favoris($id){
        $this->db->where('id', $id);
        $this->db->delete('favotites');
        return true;
    }
    //--------------------------Panier ---------------------------
    public function get_all_services_panier($idclient){

        $this->db->select('F.id as "id_cart",F.id_client,F.id_product,F.quantite,F.autre,P.*');
        $this->db->from('panier As F');
        $this->db->join('services As P','P.id=F.id_product');
        $this->db->where('id_client',$idclient);
        $this->db->order_by('F.id ','ASC');
        return $this->db->get()->result();
    }

    public function insert_panier($data){
        $this->db->insert('panier',$data);
        return $this->db->insert_id();
    }

    public function update_panier($data,$id){
        $index_array["id"] =$id;
        $query =$this->db->update('panier',$data,$index_array);
        return $query;
    }

    public function delete_panier($id){
        $this->db->where('id', $id);
        $this->db->delete('panier');
        return true;
    }

    public function clear_panier($id){
        $this->db->where('id_client', $id);
        $this->db->delete('panier');
        return true;
    }

    public function check_services_panier($iclient,$id_product){

        $query=  $this->db->query("select * from panier where id_client='".$iclient."' and id_product='".$id_product."' ");

        if($query -> num_rows() == 1){
            return true;
        }
        else{
            return false;
        }
    }

    public function check_services_favoris($iclient,$id_product){

        $query=  $this->db->query("select * from favotites where id_client='".$iclient."' and id_product='".$id_product."'");

        if($query -> num_rows() == 1){
            return true;
        }
        else{
            return false;
        }
    }



}