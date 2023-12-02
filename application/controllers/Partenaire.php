<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partenaire extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct(){
        parent::__construct();

        $this->load->model('Login_model','login');
        $this->load->model('backend/Partenaire_model','partenaire');

        $this->load->helper('url');

        $this->load->helper('form');

        $this->load->helper('my');


    }
	public function index()
	{
        if($this->session->userdata('is_login') != 1){
            redirect(base_url('admin'));
        }
	    // liste des nouvelles activités

        $data = array();
        $data['partenaires'] = $this->partenaire->get_all_partenaires();
        $data["pages"]="admin/partenaires";
        $data['admin'] = $this->login->LoadProfil();

		$this->load->view('backend/partenaires/index',$data);
	}

    public function add()

    {

        if($this->session->userdata('is_login') != 1 ){

            redirect(base_url('admin'));

        }

        if ($_POST) {

            $data = array(

                'nom' => $_POST['nom'],
                // 'responsable' => $_POST['responsable'],
                'tel1' => $_POST['tel1'],
                'tel2' => $_POST['tel2'],
                'ville' => $_POST['ville'],
                'adresse' => $_POST['adresse'],
                'email' => $_POST['email'],
                'status' => $_POST['status']

            );


            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

            $inserted = $this->partenaire->insert_partenaire($data);

            if ($inserted) {

                $this->session->set_flashdata('msg_success', 'Le partenaire à été ajouter avec succes !');

                redirect(base_url('partenaire/index'));

            }else{

                $this->session->set_flashdata('msg_error', 'Erreur d\'ajouter le partenaire !');
                redirect(base_url('partenaire/index'));

            }

        }

        $dt =array();

        $data['partenaires'] = $this->partenaire->get_all_partenaires();
        //var_dump($data['categories']);die;
        $dt["pages"]="partenaire/index";
        $dt['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/partenaires/add-partenaire',$dt);


    }

    public function edit($id)

    {

        if($this->session->userdata('is_login') != 1 ){

            redirect(base_url('admin'));

        }

        if ($id =="")  redirect(base_url('souscategorie/index'));

        if ($_POST) {

            $data = array(

                'nom' => $_POST['nom'],
                // 'responsable' => $_POST['responsable'],
                'tel1' => $_POST['tel1'],
                'tel2' => $_POST['tel2'],
                'ville' => $_POST['ville'],
                'adresse' => $_POST['adresse'],
                'email' => $_POST['email'],
                'status' => $_POST['status']

            );

            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

            $inserted = $this->partenaire->update_partenaire($data,$id);



            if ($inserted) {

                $this->session->set_flashdata('msg_success', 'Le partenaire à été modifier avec succes !');

                redirect(base_url('partenaire/index'));

            }else{

                $this->session->set_flashdata('msg_error', 'Erreur de la modification du partenaire !');

                redirect(base_url('partenaire/index'));

            }

        }

        $data =array();

        $data['partenaire'] = $this->partenaire->get_partenaire($id);
        $data["pages"]="sous_categorie/index";
        $data['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/partenaires/edit-partenaire',$data);

    }

    public function delete_partenaire($id)
    {
        if($this->session->userdata('is_login') != 1 ){
            redirect(base_url('admin'));
        }

        if($id == ""){
            redirect(base_url('partenaire/index'));
        }

        $deleted = $this->partenaire->delete_partenaire($id);

        if($deleted){
            $this->session->set_flashdata('msg_success', 'Le partenaire à été supprimer avec succes !');

            redirect(base_url('partenaire/index'));

        }else{

            $this->session->set_flashdata('msg_error', 'Erreur !');

            redirect(base_url('partenaire/index'));

        }

    }


}
