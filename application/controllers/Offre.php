<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offre extends CI_Controller {

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
        $this->load->model('backend/Service_model', 'service');
        $this->load->model('backend/Partenaire_model', 'partenaire');
        $this->load->model('backend/Offre_model', 'offre');


        $this->load->helper('url');

        $this->load->helper('form');

        $this->load->helper('my');


    }
	public function index()
	{
	    // liste des nouvelles activités
        if($this->session->userdata('is_login') != 1){
            redirect(base_url('admin'));
        }

        $data = array();
        $data['offres'] = $this->offre->get_all_offres();
//        $data['s'] = $this->offre->get_all_offres();
        $data["pages"]="services/offres";
        $data['admin'] = $this->login->LoadProfil();

		$this->load->view('backend/offres/liste-offres',$data);
	}

	public function addoffre(){

        if($this->session->userdata('is_login') != 1 ){

            redirect(base_url('admin'));

        }

        if ($_POST) {

            $data = array(
                'service_id' => $_POST['service_id'],
                // 'chambre_id' => $_POST['chambre_id'],
                'new_prix' => $_POST['new_prix'],
                // 'date_debut' => $_POST['date_debut'],
                // 'date_fin' => $_POST['date_fin'],
                'pourcentage' => $_POST['pourcentage'],
                'status' => 1

            );

            //var_dump($data);die;

            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

            $inserted = $this->offre->insert_offre($data);

            if ($inserted) {
                $this->session->set_flashdata('msg_success', 'L\'offre à été ajouter avec succes !');
                redirect(base_url('offre/index'));
            }else{
                $this->session->set_flashdata('msg_error', 'Erreur d\'ajouter l\'offre !');
                redirect(base_url('offre/index'));
            }

        }

        $data = array();
        $data['offres'] = $this->offre->get_all_offres();
        $data['services'] = $this->service->get_all_services();
        $data['admin'] = $this->login->LoadProfil();
        $data['partenaires'] = $this->partenaire->get_all_partenaires();

        $data["pages"]="services/liste";
        $this->load->view('backend/offres/add-offre',$data);

    }

    public function editoffre($id){

        if($this->session->userdata('is_login') != 1 ){
            redirect(base_url('admin'));
        }

        if ($id =="")  redirect(base_url('offre/index'));


        if ($_POST) {

            $data = array(
                'service_id' => $_POST['service_id'],
                // 'chambre_id' => $_POST['chambre_id'],
                'new_prix' => $_POST['new_prix'],
                // 'date_debut' => $_POST['date_debut'],
                // 'date_fin' => $_POST['date_fin'],
                'pourcentage' => $_POST['pourcentage']

            );

            //var_dump($data);die;

            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

            $inserted = $this->offre->update_offre($data,$id);

            if ($inserted) {
                $this->session->set_flashdata('msg_success', 'L\'offre  à été modifier avec succes !');
                redirect(base_url('offre/index'));
            }else{
                $this->session->set_flashdata('msg_error', 'Erreur de modifier l\'offre !');
                redirect(base_url('offre/index'));
            }

        }

        $data = array();

        $data['offre'] = $this->offre->get_offre($id);

        $data['offres'] = $this->offre->get_all_offres();
        $data['services'] = $this->service->get_all_services();
        $data['partenaires'] = $this->partenaire->get_all_partenaires();
        $data['admin'] = $this->login->LoadProfil();

        $data["pages"]="services/liste";
        $this->load->view('backend/offres/edit-offre',$data);

    }

    public function details($id)
    {

        if($this->session->userdata('is_login') != 1 ){
            redirect(base_url('admin'));
        }

        if ($id =="")  redirect(base_url('service/index'));

        $data = array();
        $data['service'] = $this->service->get_service($id);
        $data['chambres'] = $this->service->get_all_chambres($id);
        $data['service_images'] = $this->service->get_service_images($id);
        $data["pages"]="services/liste";
        $data['admin'] = $this->login->LoadProfil();
        $data["active_tab"]="details";
        $this->load->view('backend/services/details-service',$data);

    }

    public function delete_offre($id)
    {
        if($this->session->userdata('is_login') != 1 ){
            redirect(base_url('admin'));
        }

        if($id == ""){
            redirect(base_url('offre/index'));
        }

        $deleted = $this->offre->delete_offre($id);

        if($deleted){
            $this->session->set_flashdata('msg_success', 'L\'offre à été supprimer avec succes !');

            redirect(base_url('offre/index'));

        }else{

            $this->session->set_flashdata('msg_error', 'Erreur !');

            redirect(base_url('offre/index'));

        }

    }


}
