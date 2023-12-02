<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_name_categorie_by_id'))
{
    function get_name_categorie_by_id($id){
        $ci=& get_instance();
        $ci->load->database(); 

        $ci->db->select('nom');
        $ci->db->from('categories');
        $ci->db->where('id', $id);
        return $ci->db->get()->row()->nom;
    } 
}

if ( ! function_exists('get_name_of_partenaire_id'))
{
    function get_name_of_partenaire_id($id){
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('nom');
        $ci->db->from('partenaires');
        $ci->db->where('id', $id);
        return $ci->db->get()->row()->nom;
    }
}

if ( ! function_exists('get_one_image_byServiceId'))
{
    function get_one_image_byServiceId($id){
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('image_url');
        $ci->db->from('service_images');
        $ci->db->where('service_id', $id);
        $ci->db->limit(1);
        return $ci->db->get()->row()->image_url;
    }
}

if ( ! function_exists('get_min_offre_byServiceId'))
{
    function get_min_offre_byServiceId($id){
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('*');
        $ci->db->from('offres');
        $ci->db->where('service_id', $id);
        $ci->db->where('status', 1);
        $ci->db->order_by('offres.new_prix', "Asc");
        $ci->db->limit(1);
        $offre = $ci->db->get()->row();
        return $offre;
    }
}

if ( ! function_exists('get_min_offre_bychambreId'))
{
    function get_min_offre_bychambreId($id){
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('*');
        $ci->db->from('offres');
        $ci->db->where('chambre_id', $id);
        $ci->db->where('status', 1);
        $ci->db->order_by('offres.new_prix', "Asc");
        $ci->db->limit(1);
        $offre = $ci->db->get()->row();
        return $offre;
    }
}
if ( ! function_exists('get_offre_byServiceId'))
{
    function get_offre_byServiceId($id){
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('*');
        $ci->db->from('offres');
        $ci->db->where('service_id', $id);
        $ci->db->where('status', 1);
        $ci->db->order_by('offres.new_prix', "Asc");
        $ci->db->limit(1);
        $offre = $ci->db->get()->row();
        return $offre;
    }
}

if ( ! function_exists('get_min_priceofchambres_byServiceId'))
{
    function get_min_priceofchambres_byServiceId($id){
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('min(prix) as min');
        $ci->db->from('chambres');
        $ci->db->where('service_id', $id);
        $ci->db->limit(1);
        return $ci->db->get()->row()->min;
    }
}

if ( ! function_exists('get_name_of_service_id'))
{
    function get_name_of_service_id($id){
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('*');
        $ci->db->from('services');
        $ci->db->where('id', $id);
        return $ci->db->get()->row();
    }
}

if ( ! function_exists('get_client_byid'))
{
    function get_client_byid($id){
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('*');
        $ci->db->from('clients');
        $ci->db->where('id', $id);
        return $ci->db->get()->row();
    }
}
if ( ! function_exists('get_admin_byid'))
{
    function get_admin_byid($id){
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('*');
        $ci->db->from('admins');
        $ci->db->where('id', $id);
        return $ci->db->get()->row();
    }
}

if ( ! function_exists('get_serviceByid'))
{
    function get_serviceByid($id){
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('*');
        $ci->db->from('services');
        $ci->db->where('id', $id);
        return $ci->db->get()->row();
    }
}
if ( ! function_exists('get_chambreByid'))
{
    function get_chambreByid($id){
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('*');
        $ci->db->from('chambres');
        $ci->db->where('id', $id);
        return $ci->db->get()->row();
    }
}
if ( ! function_exists('get_chambre_byserviceid'))
{
    function get_chambre_byserviceid($id){
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('*');
        $ci->db->from('chambres');
        $ci->db->where('service_id', $id);
        return $ci->db->get()->result();
    }
}

if ( ! function_exists('get_name_of_city_id'))
{
    function get_name_of_city_id($id){
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('*');
        $ci->db->from('categories');
        $ci->db->where('id', $id);
        return $ci->db->get()->row();
    }
}

if ( ! function_exists('get_namear_categorie_by_id'))
{
    function get_namear_categorie_by_id($id){
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('title_ar');
        $ci->db->from('categories');
        $ci->db->where('id', $id);
        return $ci->db->get()->row()->title_ar;
    }
}

if ( ! function_exists('get_name_souscategorie_by_id'))
{
    function get_name_souscategorie_by_id($id){
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('nom');
        $ci->db->from('sous_categorie');
        $ci->db->where('id', $id);
        return $ci->db->get()->row()->nom;
    }
}

if ( ! function_exists('get_namear_souscategorie_by_id'))
{
    function get_namear_souscategorie_by_id($id){
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('title_ar');
        $ci->db->from('sous_categorie');
        $ci->db->where('id', $id);
        return $ci->db->get()->row()->title_ar;
    }
}

if (!function_exists('get_product_by_id')) {

    function get_product_by_id($id) {
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('title');
        $ci->db->from('products');
        $ci->db->where('id', $id);
        return $ci->db->get()->row()->title;
    }

}
if (!function_exists('get_productar_by_id')) {

    function get_productar_by_id($id) {
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('title_ar');
        $ci->db->from('products');
        $ci->db->where('id', $id);
        return $ci->db->get()->row()->title_ar;
    }

}

if (!function_exists('get_infos_product_by_id')) {

    function get_infos_product_by_id($id) {
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('*');
        $ci->db->from('products');
        $ci->db->where('id', $id);
        return $ci->db->get()->row();
    }

}
if (!function_exists('get_infos_client_by_id')) {

    function get_infos_client_by_id($id) {
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('*');
        $ci->db->from('clients');
        $ci->db->where('id', $id);
        return $ci->db->get()->row();
    }

}
if (!function_exists('get_infos_admin_by_id')) {

    function get_infos_admin_by_id($id) {
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('*');
        $ci->db->from('admins');
        $ci->db->where('id', $id);
        return $ci->db->get()->row();
    }

}

if (!function_exists('get_infos_cmd_by_id')) {

    function get_infos_cmd_by_id($id) {
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('*');
        $ci->db->from('commandes');
        $ci->db->where('id_commande', $id);
        return $ci->db->get()->row();
    }

}

if (!function_exists('get_mescommande_by_idcmd')) {

    function get_mescommande_by_idcmd($idcmd) {
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('*');
        $ci->db->from('products_demande');
        $ci->db->where('id_commande', $idcmd);
        return $ci->db->get()->result();
    }

}

if (!function_exists('get_infos_promo_by_product_id')) {

    function get_infos_promo_by_product_id($idp) {
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('*');
        $ci->db->from('promotions As P');
        $ci->db->where('P.id_product', $idp);
        return $ci->db->get()->row();
    }

}

if (!function_exists('get_infos_client_by_id')) {

    function get_infos_client_by_id($id) {
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('*');
        $ci->db->from('clients');
        $ci->db->where('id', $id);
        return $ci->db->get()->row();
    }

}

if (!function_exists('get_infos_admin_by_id')) {

    function get_infos_admin_by_id($id) {
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('*');
        $ci->db->from('admins');
        $ci->db->where('id', $id);
        return $ci->db->get()->row();
    }

}

if (!function_exists('get_product_in_promo_by_id')) {

    function get_product_in_promo_by_id($id) {
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('*');
        $ci->db->from('promotions');
        $ci->db->where('id_product', $id);
        return $ci->db->get()->result();
    }

}
if (!function_exists('get_nbr_fav')) {

    function get_nbr_fav() {
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('count(*) as nbr');
        $ci->db->from('favotites');
        $ci->db->where('id_client', $ci->session->userdata('id'));
        return $ci->db->get()->row()->nbr;
    }

}
if (!function_exists('get_nbr_cart')) {

    function get_nbr_cart() {
        $ci=& get_instance();
        $ci->load->database();

        $ci->db->select('count(*) as nbr');
        $ci->db->from('panier');
        $ci->db->where('id_client', $ci->session->userdata('id_session'));
        return $ci->db->get()->row()->nbr;
    }

}
