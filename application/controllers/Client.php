<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

    public function __construct(){
        parent::__construct();


        $this->load->model('backend/Reservation_model','reservation');
        $this->load->model('backend/Client_model','client');
        $this->load->model('Login_model','login');
        // $this->lang->load('information','arabic');
        // $this->load->helper(array('url','form'));
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('my');

    }

    public function index()
    {
        if($this->session->userdata('is_login') != 1 ){
            redirect(base_url('admin'));
        }

        $data = array();
        $data['clients'] = $this->client->get_all_clients();
        $data['pages'] = "clients/index";
        $data['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/clients/index',$data);

    }
    public function listeusers()
    {
        if($this->session->userdata('is_login') != 1 ){
            redirect(base_url('admin'));
        }

        $data = array();
        $data['admins'] = $this->client->get_all_admins();
        $data['pages'] = "users/liste-users";
        $data['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/users/list-users',$data);

    }

    public function commades($id_clt)
    {
        if($this->session->userdata('is_login') != 1 ){
            redirect(base_url('admin'));
        }

        $data = array();
        $data['commandes'] = $this->reservation->get_all_commandes_byclient($id_clt);
        $data['client'] = get_infos_client_by_id($id_clt);
        $data['pages'] = "clients/index";
        $data['admin'] = $this->login->LoadProfil();
        $this->load->view('backend/clients/list-commandes',$data);
    }

    public function changepassword($id_clt)
    {
        if($this->session->userdata('is_login') != 1 ){
            redirect(base_url('admin'));
        }

        if ($_POST){

            $pass = $this->input->post('password');

            $updated = $this->client->update_password(array("pass"=>md5($pass)),$id_clt);

            if ($updated) {
                $this->session->set_flashdata('msg_success', 'Le mot de passe à été modifier avec succes !');
                redirect(base_url('client/index'));

            }else{
                $this->session->set_flashdata('msg_error', 'Erreur de modification du mot de passe !');
                redirect(base_url('client/index'));
            }
        }

        $data = array();
        $data['client'] = get_infos_client_by_id($id_clt);
        $data['pages'] = "clients/index";
        $data['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/client/change-pass',$data);
    }

    public function changepasswordadmin($id_admin)
    {
        if($this->session->userdata('is_login') != 1 ){
            redirect(base_url('admin'));
        }
        $data['admin'] = $this->login->LoadProfil();

        if ($_POST){

            $admin_pass = $this->input->post('admin_pass');
            $admin_nom = $this->input->post('admin_nom');
            $admin_nomacncien = $this->input->post('admin_passancien');
            $admin_passverifie = $this->input->post('admin_pass_verifier');

            if($data['admin']->admin_pass != md5($admin_nomacncien)){
                $this->session->set_flashdata('msg_error', "L'ancien code que vous avez entré est incorrect");
                redirect(base_url('backend/index'));
                redirect(base_url('admin'));
            }
            if($admin_pass  != $admin_passverifie){
                $this->session->set_flashdata('msg_error', "Le mot de pass de  confirmation est n'pas correct");
                redirect(base_url('admin'));
            }

            $updated = $this->client->update_password_admin(array("admin_pass"=>md5($admin_pass)),$id_admin);
            $updated = $this->client->update_nom_admin(array("nom" =>$admin_nom),$id_admin);

            if ($updated) {
                $this->session->set_flashdata('msg_success', 'Le mot de passe à été modifier avec succes !');
                redirect(base_url('backend/index'));

            }else{
                $this->session->set_flashdata('msg_error', 'Erreur de modification du mot de passe !');
                redirect(base_url('backend/index'));
            }
        }

        $data = array();
        $data['admin'] = get_infos_admin_by_id($id_admin);
        $data['pages'] = "userspass/index";

        $this->load->view('backend/clients/change-pass',$data);
    }

    public function active($id){

        if($this->session->userdata('is_login') != 1 ){redirect(base_url('admin'));}

        $updated = $this->client->set_afficher($id);

        if ($updated) {
            $this->session->set_flashdata('msg_success', 'Bien à été modifier avec succes !');
            redirect(base_url('client/index'));

        }else{
            $this->session->set_flashdata('msg_error', 'Erreur de modification !');
            redirect(base_url('client/index'));
        }

    }

    public function bloque($id){

        if($this->session->userdata('is_login') != 1 ){redirect(base_url('admin'));}

        $updated = $this->client->set_pas_afficher($id);

        if ($updated) {
            $this->session->set_flashdata('msg_success', 'Bien à été modifier avec succes !');
            redirect(base_url('client/index'));

        }else{
            $this->session->set_flashdata('msg_error', 'Erreur de modification !');
            redirect(base_url('client/index'));
        }

    }

    public function delete_client($id){

        if($this->session->userdata('is_login') != 1 ){redirect(base_url('admin'));}

        $deleted = $this->client->delete_client($id);

        if ($deleted) {

            $deletedcmd = $this->client->delete_cmd_byclient($id);
            if ($deletedcmd){
                $this->client->delete_cmd_products_byclient($id);
            }

            $this->session->set_flashdata('msg_success', 'Le client à été supprimer avec succes !');
            redirect(base_url('client/index'));

        }else{
            $this->session->set_flashdata('msg_error', 'Erreur de supprission !');
            redirect(base_url('client/index'));
        }

    }
    public function deleteuser($id){

        if($this->session->userdata('is_login') != 1 ){redirect(base_url('admin'));}

        $deleted = $this->client->delete_user($id);

        if ($deleted) {
            $this->session->set_flashdata('msg_success', 'User à été supprimer avec succes !');
            redirect(base_url('client/index'));

        }else{
            $this->session->set_flashdata('msg_error', 'Erreur de supprission !');
            redirect(base_url('client/index'));
        }

    }

    public function mailing(){
        if($this->session->userdata('is_login') != 1 ){
            redirect(base_url('admin'));
        }

        $data = array();
        $data['emails'] = $this->client->get_all_emails();
        $data['pages'] = "mailing/index";
        $data['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/mailing/liste-emails',$data);

    }

    public function users(){
        if($this->session->userdata('is_login') != 1 ){
            redirect(base_url('admin'));
        }
        $data['admin'] = $this->login->LoadProfil();
        if($data['admin']->id != 1){
            redirect(base_url('backend/index'));
        }
        $data = array();
        $data['admins'] = $this->client->get_all_admins();
        $data['pages'] = "users/index";
        $data['admin'] = $this->login->LoadProfil();
        
        $this->load->view('backend/users/liste-users',$data);

    }
    public function usersdettails($id){
        if($this->session->userdata('is_login') != 1 ){
            redirect(base_url('admin'));
        }
        $data['admin'] = $this->login->LoadProfil();
        if($data['admin']->id != 1){
            redirect(base_url('backend/index'));
        }
        $data = array();
        $data['user'] = $this->client->get_admin($id);
        $data['pages'] = "users/index";
        $data['admin'] = $this->login->LoadProfil();
        
        $this->load->view('backend/users/dettail-users',$data);

    }

    public function add()

    {

        if($this->session->userdata('is_login') != 1 ){

            redirect(base_url('admin'));

        }

        if ($_POST) {

            $data = array(

                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'tel1' => $_POST['tel1'],
                'date' => $_POST['date'],
                'message' => $_POST['message'],
                // 'adresse' => $_POST['adresse'],
                // 'pays' => $_POST['pays'],
                // 'date' => $_POST['date'],
                // 'password' => md5($_POST['password']),
                'status' => 1

            );


            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

            $inserted = $this->client->insert_client($data);

            if ($inserted) {

                $this->session->set_flashdata('msg_success', 'Le client à été ajouter avec succes !');

                redirect(base_url('client/index'));

            }else{

                $this->session->set_flashdata('msg_error', 'Erreur d\'ajouter le client !');
                redirect(base_url('client/index'));

            }

        }

        $dt =array();
        //var_dump($data['categories']);die;
        $dt["pages"]="clients/index";
        $dt['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/clients/add-client',$dt);


    }
    public function addadmin()

    {

        if($this->session->userdata('is_login') != 1 ){

            redirect(base_url('admin'));

        }

        if ($_POST) {

            $data = array(

                'nom' => $_POST['nom'],
                'adresse' => $_POST['adresse'],
                'telephone' => $_POST['telephone'],
                'admin_email' => $_POST['email'],
                'admin_pass' => md5($_POST['password']),
                'role' => 2,
                'status' => 1

            );


            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

            $inserted = $this->client->insert_admin($data);

            if ($inserted) {

                $this->session->set_flashdata('msg_success', 'admin à été ajouter avec succes !');

                redirect(base_url('client/users'));

            }else{

                $this->session->set_flashdata('msg_error', 'Erreur d\'ajouter admin !');
                redirect(base_url('client/users'));

            }

        }

        $dt =array();
        //var_dump($data['categories']);die;
        $dt["pages"]="clients/index";
        $dt['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/users/add-users',$dt);


    }
    public function modifieadmin()

    {
        if($this->session->userdata('is_login') != 1 ){

            redirect(base_url('admin'));

        }
        $id = $_POST['idadmin'];
        if ($id =="")  redirect(base_url('backend/index'));

        $data =array();
        $data['admin'] = $this->client->get_admin($id);

        if ($_POST) {
            if ($_POST['password'] != null && $_POST['password'] !="") {
                $password = md5($_POST['password']);
            }else{
                $password = $data['admin']->password ;
            }
            $data = array(

                'nom' => $_POST['nom'],
                'telephone' => $_POST['telephone'],
                'adresse' => $_POST['adresse'],
                'admin_email' => $_POST['email'],
                'admin_pass' => $password
            );

            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

            $inserted = $this->client->update_admin($data,$id);



            if ($inserted) {

                $this->session->set_flashdata('msg_success', "L'admin à été modifier avec succes !");

                redirect(base_url('backend/index'));

            }else{

                $this->session->set_flashdata('msg_error', 'Erreur de la modification du client !');

                redirect(base_url('backend/index'));

            }

        }




        $data["pages"]="clients/index";
        $data['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/clients/edit-client',$data);
    }

    public function edit($id)
    {

        if($this->session->userdata('is_login') != 1 ){

            redirect(base_url('admin'));

        }

        if ($id =="")  redirect(base_url('client/index'));

        $data =array();
        $data['client'] = $this->client->get_client($id);

        if ($_POST) {
            if ($_POST['password'] != null && $_POST['password'] !="") {
                $password = md5($_POST['password']);
            }else{
                $password = $data['client']->password ;
            }
            $data = array(

                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'tel1' => $_POST['tel1'],
                'date' => $_POST['date'],
                'message' => $_POST['message'],
                // 'adresse' => $_POST['adresse'],
                // 'message' => $_POST['message'],
                // 'date' => $_POST['date'],
                // 'password' => $password,
                'status' =>$_POST['status']

            );

            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

            $inserted = $this->client->update_client($data,$id);



            if ($inserted) {

                $this->session->set_flashdata('msg_success', 'Le client à été modifier avec succes !');

                redirect(base_url('client/index'));

            }else{

                $this->session->set_flashdata('msg_error', 'Erreur de la modification du client !');

                redirect(base_url('client/index'));

            }

        }




        $data["pages"]="clients/index";
        $data['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/clients/edit-client',$data);

    }

}
