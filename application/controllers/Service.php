<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Login_model', 'login');
        $this->load->model('backend/Partenaire_model', 'partenaire');
        $this->load->model('backend/Service_model', 'service');
        $this->load->model('backend/Client_model', 'client');
        $this->load->model('backend/Offre_model', 'offre');
        $this->load->model('backend/Categorie_model', 'categorie');

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
        $data['services'] = $this->service->get_all_services();
        $data["pages"] = "services/liste";
        $data['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/services/liste-services', $data);
    }


    public function types()
    {
        // liste des nouvelles activités

        $data = array();
        $data['categories'] = $this->categorie->get_all_categories();
        $data['sous_categories'] = $this->categorie->get_all_sous_categories();
        $data["pages"] = "services/types";
        $data['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/services/types-services', $data);
    }

    public function add()
    {

        if ($this->session->userdata('is_login') != 1) {

            redirect(base_url('admin'));

        }

        if ($_POST) {

            $data = array(
                'partenaire_id' => $_POST['partenaire_id'],
                'categorie_id' => $_POST['categorie_id'],
                'sous_categorie_id' => $_POST['sous_categorie_id'],
                'lieu' => $_POST['lieu'],
                'lieu2' => $_POST['lieu2'],
                'disponibilite' => $_POST['disponibilite'],
                
                'statusDeForfait' => $_POST['statusDeForfait'],
                'prix' => $_POST['prix'],
                'prix_initial' => $_POST['initial_prix'],
                'percent' => $_POST['percent'],
                'titre' => $_POST['titre'],
                
                'Programme' => $_POST['Programme'],
                'titre_hotel' => $_POST['titre_hotel'],
                'titre_hotel_Medina' => $_POST['titre_hotel_Medina'],
                'image_hotel_makka' => $_POST['image_hotel_makka'],
                'image_hotel_medina' => $_POST['image_hotel_medina'],
                'desc_hotel' => $_POST['desc_hotel'],
                'doc_fournir' => $_POST['Programme'],
                'maps_x' => $_POST['maps_x'],
                'maps_y' => $_POST['maps_y'],
                'grand_desc' => $_POST['grand_desc'],
                'conditions' => $_POST['conditions'],
                'status' => $_POST['status']

            );
            if ($_FILES['image_hotel_makka']['name']) {

                $data['image_hotel_makka'] = $this->_upload_image2();

            }
            if ($_FILES['image_hotel_medina']['name']) {

                $data['image_hotel_medina'] = $this->_upload_image3();

            }

            //var_dump($data);die;

            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

            $inserted = $this->service->insert_service($data);

            if ($inserted) {
                $this->session->set_flashdata('msg_success', 'Le service à été ajouter avec succes !');
                redirect(base_url('service/index'));
            } else {
                $this->session->set_flashdata('msg_error', 'Erreur d\'ajouter le service !');
                redirect(base_url('service/index'));
            }

        }

        $data = array();
        $data['partenaires'] = $this->partenaire->get_all_partenaires();
        $data['categories'] = $this->categorie->get_all_categories();
        $data["pages"] = "services/liste";
        $data['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/services/add-service', $data);

    }

    public function edit($id)
    {

        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url('admin'));
        }

        if ($id == "") redirect(base_url('service/index'));


        if ($_POST) {

            $data = array(
                'partenaire_id' => $_POST['partenaire_id'],
                'categorie_id' => $_POST['categorie_id'],
                'sous_categorie_id' => $_POST['sous_categorie_id'],
                'lieu' => $_POST['lieu'],
                'lieu2' => $_POST['lieu2'],
                'disponibilite' => $_POST['disponibilite'],
                
                'statusDeForfait' => $_POST['statusDeForfait'],
                'prix' => $_POST['prix'],
                'prix_initial' => $_POST['initial_prix'],
                'percent' => $_POST['percent'],
                'titre' => $_POST['titre'],
                
                'Programme' => $_POST['Programme'],
                'titre_hotel' => $_POST['titre_hotel'],
                'titre_hotel_Medina' => $_POST['titre_hotel_Medina'],
                'image_hotel_makka' => $_POST['image_hotel_makka'],
                'image_hotel_medina' => $_POST['image_hotel_medina'],
                'desc_hotel' => $_POST['desc_hotel'],
                'doc_fournir' => $_POST['Programme'],
                'maps_x' => $_POST['maps_x'],
                'maps_y' => $_POST['maps_y'],
                'grand_desc' => $_POST['grand_desc'],
                'conditions' => $_POST['conditions'],
                'status' => $_POST['status']

            );
            if ($_FILES['image_hotel_makka']['name']) {

                $data['image_hotel_makka'] = $this->_upload_image2();

            }
            if ($_FILES['image_hotel_medina']['name']) {

                $data['image_hotel_medina'] = $this->_upload_image3();

            }
            //var_dump($data);die;

            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

            $inserted = $this->service->update_service($data,$id);

            if ($inserted) {
                $this->session->set_flashdata('msg_success', 'Le service à été modifier avec succes !');
                redirect(base_url('service/index'));
            } else {
                $this->session->set_flashdata('msg_error', 'Erreur de modifier le service !');
                redirect(base_url('service/index'));
            }

        }
        

        $data = array();

        $data['service'] = $this->service->get_service($id);
        $data['partenaires'] = $this->partenaire->get_all_partenaires();
        $data['categories'] = $this->categorie->get_all_categories();
        $data["pages"] = "services/liste";
        $data['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/services/edit-service', $data);

    }

    public function change_status_by_id() {



        // header('Content-Type: application/json');

        $id = $this->input->post('id');

        $promo = $this->offre->get_offre($id);

        $etat = 0;

        if ($promo->status == 1){

            $etat =0;

        }

        $data= array("status"=> $etat);

        $updated = $this->offre->update_promo_status($data,$id);

        //echo json_encode($devise);

        if ($updated){

            echo "Le status à été modifier avec success !";

        }else{

            echo "Erreur de modification !";

        }

        die();

    }

    public function details($id)
    {

        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url('admin'));
        }

        if ($id == "") redirect(base_url('service/index'));

        $data = array();
        $data['service'] = $this->service->get_service($id);
        $data['chambres'] = $this->service->get_all_chambres_by_serviceId($id);
        $data['service_images'] = $this->service->get_service_images($id);
        // var_dump($data['chambres'] = array(
        //     'type_chambre' => 'Chambre double',
          
        // ));
        // exit;
        $data["pages"] = "services/liste";
        $data['admin'] = $this->login->LoadProfil();
        $data["active_tab"] = "details";
        $this->load->view('backend/services/details-service', $data);

    }

    public function addimage($id)
    {

        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url('admin'));
        }

        if ($id == "") redirect(base_url('service/index'));

        if ($_POST) {
            $data = array();

            $data['service_id'] = $id;

            if ($_FILES['img1']['name']) {

                $data['image_url'] = $this->_upload_image1();

            }

            $data['status'] = 1;

            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

//            var_dump($data);die;
            $inserted = $this->service->insert_images($data);

            if ($inserted) {
                $this->session->set_flashdata('msg_success', 'L\'image de service à été ajouter avec succes !');
                redirect(base_url('service/details/' . $id));
            } else {
                $this->session->set_flashdata('msg_error', 'Erreur d\'ajouter l\'image de service !');
                redirect(base_url('service/details/' . $id));
            }
        }

        $dt = array();
//        $dt['service'] = $this->service->get_images_service($id);

        $dt["service_id"] = $id;
        $dt["pages"] = "services/liste";
        $dt['admin'] = $this->login->LoadProfil();
        $data["active_tab"] = "images";
        $this->load->view('backend/services/images-service', $dt);

    }

    public function editimage($id)
    {

        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url('admin'));
        }

        if ($id == "") redirect(base_url('service/index'));

        if ($_POST) {
            $data = array();

            $image = $this->service->get_image($id);
            $data['service_id'] = $image->service_id;

            if ($_FILES['img_' . $id]['name']) {

                $data['image_url'] = $this->_upload_image($id);

            }

            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

//            var_dump($data);die;
            $updated = $this->service->update_image($data, $id);

            if ($updated) {
                $this->session->set_flashdata('msg_success', 'L\'image de service à été modifier avec succes !');
                redirect(base_url('service/details/' . $image->service_id));
            } else {
                $this->session->set_flashdata('msg_error', 'Erreur de modifier l\'image de service !');
                redirect(base_url('service/details/' . $image->service_id));
            }
        }

        $dt = array();
//        $dt['service'] = $this->service->get_images_service($id);

        $dt["service_id"] = $id;
        $dt["pages"] = "services/liste";
        $dt['admin'] = $this->login->LoadProfil();
        $data["active_tab"] = "images";
        $this->load->view('backend/services/images-service', $dt);

    }

    public function delete_service($id)
    {
        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url('admin'));
        }

        if ($id == "") {
            redirect(base_url('service/index'));
        }

        $deleted = $this->service->delete_service($id);

        if ($deleted) {
            $this->session->set_flashdata('msg_success', 'Le service à été supprimer avec succes !');

            redirect(base_url('service/index'));

        } else {

            $this->session->set_flashdata('msg_error', 'Erreur !');

            redirect(base_url('service/index'));

        }

    }

    public function deleteimg($id, $id_service)
    {

        if ($this->session->userdata('is_login') != 1) {

            redirect(base_url('admin'));

        }

        if ($id == "") {

            redirect(base_url('product/index'));

        }

        $image = $this->service->get_image($id);

        $deleted = $this->service->delete_image($id);

        if ($deleted) {

            $destination = 'assets/backend/services/';

            if (file_exists($destination . '/images/services/' . $image->image_url)) {

                @unlink($destination . '/images/services/' . $image->image_url);
            }

            $this->session->set_flashdata('msg_success', 'L\'image à été Supprimer avec succes !');

            redirect(base_url('service/details/' . $id_service));

        } else {

            $this->session->set_flashdata('msg_error', 'Erreur !');

            redirect(base_url('service/details/' . $id_service));

        }

    }
    // function to upload image hotel makka
    // add image hotel a makka
    public function addimage2($id)
    {

        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url('admin'));
        }

        if ($id == "") redirect(base_url('service/index'));

        if ($_POST) {
            $data = array();

            $data['id'] = $id;

            if ($_FILES['image_hotel_makka']['name']) {

                $data['image_hotel_makka'] = $this->_upload_image2();

            }

            $data['status'] = 1;

            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

//            var_dump($data);die;
            $inserted = $this->service->insert_images($data);

            if ($inserted) {
                $this->session->set_flashdata('msg_success', 'L\'image de service à été ajouter avec succes !');
                redirect(base_url('service/details/' . $id));
            } else {
                $this->session->set_flashdata('msg_error', 'Erreur d\'ajouter l\'image de service !');
                redirect(base_url('service/details/' . $id));
            }
        }

        $dt = array();
//        $dt['service'] = $this->service->get_images_service($id);

        $dt["id"] = $id;
        $dt["pages"] = "services/liste";
        $dt['admin'] = $this->login->LoadProfil();
        $data["active_tab"] = "images";
        $this->load->view('backend/services/edit-service', $dt);

    }
    // edit image hotel a makka
    public function editimage2($id)
    {

        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url('admin'));
        }

        if ($id == "") redirect(base_url('service/index'));

        if ($_POST) {
            $data = array();

            $image = $this->service->get_image($id);
            $data['service_id'] = $image->service_id;

            if ($_FILES['img_' . $id]['name']) {

                $data['image_hotel_makka'] = $this->_upload_image2($id);

            }

            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

//            var_dump($data);die;
            $updated = $this->service->update_image($data, $id);

            if ($updated) {
                $this->session->set_flashdata('msg_success', 'L\'image de service à été modifier avec succes !');
                redirect(base_url('service/details/' . $image->service_id));
            } else {
                $this->session->set_flashdata('msg_error', 'Erreur de modifier l\'image de service !');
                redirect(base_url('service/details/' . $image->service_id));
            }
        }

        $dt = array();
//        $dt['service'] = $this->service->get_images_service($id);

        $dt["service_id"] = $id;
        $dt["pages"] = "services/liste";
        $dt['admin'] = $this->login->LoadProfil();
        $data["active_tab"] = "images";
        $this->load->view('backend/services/edit-service', $dt);

    }
// upload image hotel makka
    public function _upload_image2()
    {


        // $prev_img1 = $this->input->post('prev_img1');

        $img1 = $_FILES['image_hotel_makka']['name'];

        $img1_type = $_FILES['image_hotel_makka']['type'];

        $return_img1 = '';

        if ($img1 != "") {

            if (

                $img1_type == 'image/jpeg' || $img1_type == 'image/pjpeg' ||

                $img1_type == 'image/JPEG' || $img1_type == 'image/PJPEG' ||

                $img1_type == 'image/jpg' || $img1_type == 'image/png' ||

                $img1_type == 'image/JPG' || $img1_type == 'image/PNG' ||

                $img1_type == 'image/x-png' || $img1_type == 'image/gif' ||

                $img1_type == 'image/X-PNG' || $img1_type == 'image/GIF'

            ) {

                $destination = './assets/backend/services/';

                $file_type = explode(".", $img1);

                $extension = strtolower($file_type[count($file_type) - 1]);

                $img1_path = 'imgage-service' . time() . '.' . $extension;

                move_uploaded_file($_FILES['image_hotel_makka']['tmp_name'], $destination . $img1_path);

                // need to unlink previous img1

                // if ($prev_img1 != "") {

                //     if (file_exists($destination . $prev_img1)) {

                //         @unlink($destination . $prev_img1);

                //     }

                // }

                $return_img1 = $img1_path;

            }

        } 
        // else {

        //     $return_img1 = $prev_img1;

        // }


        return $return_img1;

    }
    // fin de cette function pour hotel makka

    public function addimage3($id)
    {

        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url('admin'));
        }

        if ($id == "") redirect(base_url('service/index'));

        if ($_POST) {
            $data = array();

            $data['id'] = $id;

            if ($_FILES['image_hotel_medina']['name']) {

                $data['image_hotel_medina'] = $this->_upload_image2();

            }

            $data['status'] = 1;

            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

//            var_dump($data);die;
            $inserted = $this->service->insert_images($data);

            if ($inserted) {
                $this->session->set_flashdata('msg_success', 'L\'image de service à été ajouter avec succes !');
                redirect(base_url('service/details/' . $id));
            } else {
                $this->session->set_flashdata('msg_error', 'Erreur d\'ajouter l\'image de service !');
                redirect(base_url('service/details/' . $id));
            }
        }

        $dt = array();
//        $dt['service'] = $this->service->get_images_service($id);

        $dt["id"] = $id;
        $dt["pages"] = "services/liste";
        $dt['admin'] = $this->login->LoadProfil();
        $data["active_tab"] = "images";
        $this->load->view('backend/services/edit-service', $dt);

    }
    // edit image medina
    public function editimage3($id)
    {

        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url('admin'));
        }

        if ($id == "") redirect(base_url('service/index'));

        if ($_POST) {
            $data = array();

            $image = $this->service->get_image($id);
            $data['service_id'] = $image->service_id;

            if ($_FILES['img_' . $id]['name']) {

                $data['image_hotel_medina'] = $this->_upload_image3($id);

            }

            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

//            var_dump($data);die;
            $updated = $this->service->update_image($data, $id);

            if ($updated) {
                $this->session->set_flashdata('msg_success', 'L\'image de service à été modifier avec succes !');
                redirect(base_url('service/details/' . $image->service_id));
            } else {
                $this->session->set_flashdata('msg_error', 'Erreur de modifier l\'image de service !');
                redirect(base_url('service/details/' . $image->service_id));
            }
        }

        $dt = array();
//        $dt['service'] = $this->service->get_images_service($id);

        $dt["service_id"] = $id;
        $dt["pages"] = "services/liste";
        $dt['admin'] = $this->login->LoadProfil();
        $data["active_tab"] = "images";
        $this->load->view('backend/services/edit-service', $dt);

    }
    public function _upload_image3()
    {


        // $prev_img1 = $this->input->post('prev_img1');

        $img1 = $_FILES['image_hotel_medina']['name'];

        $img1_type = $_FILES['image_hotel_medina']['type'];

        $return_img1 = '';

        if ($img1 != "") {

            if (

                $img1_type == 'image/jpeg' || $img1_type == 'image/pjpeg' ||

                $img1_type == 'image/JPEG' || $img1_type == 'image/PJPEG' ||

                $img1_type == 'image/jpg' || $img1_type == 'image/png' ||

                $img1_type == 'image/JPG' || $img1_type == 'image/PNG' ||

                $img1_type == 'image/x-png' || $img1_type == 'image/gif' ||

                $img1_type == 'image/X-PNG' || $img1_type == 'image/GIF'

            ) {

                $destination = './assets/backend/services/';

                $file_type = explode(".", $img1);

                $extension = strtolower($file_type[count($file_type) - 1]);

                $img1_path = 'imgage-service' . time() . '.' . $extension;

                move_uploaded_file($_FILES['image_hotel_medina']['tmp_name'], $destination . $img1_path);

                // need to unlink previous img1

                // if ($prev_img1 != "") {

                //     if (file_exists($destination . $prev_img1)) {

                //         @unlink($destination . $prev_img1);

                //     }

                // }

                $return_img1 = $img1_path;

            }

        } 
        // else {

        //     $return_img1 = $prev_img1;

        // }


        return $return_img1;

    }
    

    public function _upload_image1()
    {


        $prev_img1 = $this->input->post('prev_img1');

        $img1 = $_FILES['img1']['name'];

        $img1_type = $_FILES['img1']['type'];

        $return_img1 = '';

        if ($img1 != "") {

            if (

                $img1_type == 'image/jpeg' || $img1_type == 'image/pjpeg' ||

                $img1_type == 'image/JPEG' || $img1_type == 'image/PJPEG' ||

                $img1_type == 'image/jpg' || $img1_type == 'image/png' ||

                $img1_type == 'image/JPG' || $img1_type == 'image/PNG' ||

                $img1_type == 'image/x-png' || $img1_type == 'image/gif' ||

                $img1_type == 'image/X-PNG' || $img1_type == 'image/GIF'

            ) {

                $destination = './assets/backend/services/';

                $file_type = explode(".", $img1);

                $extension = strtolower($file_type[count($file_type) - 1]);

                $img1_path = 'imgage-service' . time() . '.' . $extension;

                move_uploaded_file($_FILES['img1']['tmp_name'], $destination . $img1_path);

                // need to unlink previous img1

                if ($prev_img1 != "") {

                    if (file_exists($destination . $prev_img1)) {

                        @unlink($destination . $prev_img1);

                    }

                }

                $return_img1 = $img1_path;

            }

        } else {

            $return_img1 = $prev_img1;

        }


        return $return_img1;

    }

    public function _upload_image($id)
    {

        $prev_img = $this->input->post('prev_img_' . $id);

        $img = $_FILES['img_' . $id]['name'];

        $img_type = $_FILES['img_' . $id]['type'];

        $return_img = '';

        if ($img != "") {

            if (

                $img_type == 'image/jpeg' || $img_type == 'image/pjpeg' ||

                $img_type == 'image/JPEG' || $img_type == 'image/PJPEG' ||

                $img_type == 'image/jpg' || $img_type == 'image/png' ||

                $img_type == 'image/JPG' || $img_type == 'image/PNG' ||

                $img_type == 'image/x-png' || $img_type == 'image/gif' ||

                $img_type == 'image/X-PNG' || $img_type == 'image/GIF'

            ) {

                $destination = './assets/backend/services/';

                $file_type = explode(".", $img);

                $extension = strtolower($file_type[count($file_type) - 1]);

                $img_path = 'imgage-service' . time() . '.' . $extension;

                move_uploaded_file($_FILES['img_' . $id]['tmp_name'], $destination . $img_path);

                // need to unlink previous img

                if ($prev_img != "") {

                    if (file_exists($destination . $prev_img)) {

                        @unlink($destination . $prev_img);

                    }

                }

                $return_img = $img_path;

            }

        } else {

            $return_img = $prev_img;

        }


        return $return_img;

    }

    public function addchambre()
    {

        if ($this->session->userdata('is_login') != 1) {

            redirect(base_url('admin'));

        }

        if ($_POST) {

            $data = array(
                'type_chambre' => $_POST['type_chambre'],
                'service_id' => $_POST['service_id'],
                'prix' => $_POST['prix'],
                'prix_initial' => $_POST['initial_prix'],
                'percent' => $_POST['percent'],
                'description' => $_POST['description'],
                'disponibility' => $_POST['disponibility'],
                'status' => 1

            );

            //var_dump($data);die;

            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

            $inserted = $this->service->insert_chambre($data);

            if ($inserted) {
                $this->session->set_flashdata('msg_success', 'La chambre à été ajouter avec succes !');
                redirect(base_url('service/details/' . $_POST['service_id']));
            } else {
                $this->session->set_flashdata('msg_error', 'Erreur d\'ajouter la chambre !');
                redirect(base_url('service/details/' . $_POST['service_id']));
            }

        }

    }

    public function editchambre($id)
    {

        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url('admin'));
        }

        if ($id == "") redirect(base_url('service/index'));


        if ($_POST) {

            $data = array(
                'type_chambre' => $_POST['type_chambre'],
                'service_id' => $_POST['service_id'],
                'prix' => $_POST['prix'],
                'prix_initial' => $_POST['initial_prix'],
                'percent' => $_POST['percent'],
                'description' => $_POST['description'],
                'disponibility' => $_POST['disponibility']

            );

            //var_dump($data);die;

            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

            $updated = $this->service->update_chambre($data, $id);

            if ($updated) {
                $this->session->set_flashdata('msg_success', 'La chambre à été modifier avec succes !');
                redirect(base_url('service/details/' . $_POST['service_id']));
            } else {
                $this->session->set_flashdata('msg_error', 'Erreur de modifier la chambre !');
                redirect(base_url('service/details/' . $_POST['service_id']));
            }

        }

    }


    public function get_services_by_partenaire()
    {

        $partenaire_id = $this->input->post('partenaire_id');

        $services = $this->service->get_services_by_id_partenaire($partenaire_id);

//        var_dump($services);die;

        $str = '<option value="">--Selectionnez--</option>';

        //  $select = 'selected="selected"';
        if (!empty($services)) {
            foreach ($services as $obj) {
//                $selected = $subject_id == $obj->id ? $select : '';
//                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';
                $str .= '<option value="' . $obj->id . '">' . $obj->titre . '</option>';
            }
        }

        echo $str;
    }

    public function get_services_by_souscat()
    {

        $sous_cat_id = $this->input->post('sous_cat_id');

        $services = $this->service->get_services_by_cous_cat_id($sous_cat_id);

//        var_dump($services);die;

        $str = '<option value="">--Selectionnez--</option>';

        //  $select = 'selected="selected"';
        if (!empty($services)) {
            foreach ($services as $obj) {
//                $selected = $subject_id == $obj->id ? $select : '';
//                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';
                $str .= '<option value="' . $obj->id . '">' . $obj->titre . '</option>';
            }
        }

        echo $str;
    }

    public function get_chambres_by_service()
    {

        $service_id = $this->input->post('service_id');

        $chambres = $this->service->get_chambres_by_service($service_id);

        //        var_dump($chambres);die;

        $str = '<option value="">--Selectionnez--</option>';

        //  $select = 'selected="selected"';
        if (!empty($chambres)) {

            foreach ($chambres as $obj) {
                if ($obj->disponibility != 1) {
                    $str .= '<option disabled value="' . $obj->id . '">' . $obj->type_chambre . ' prix : ' . $obj->prix . 'Dh/nuit (Non disponible)  </option>';

                } else {
                    // $selected = $subject_id == $obj->id ? $select : '';
//                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';
                    $str .= '<option value="' . $obj->id . '">' . $obj->type_chambre . ' prix : ' . $obj->prix . 'Dh/nuit</option>';

                }
//                console.log("chambre : ", $obj->type_chambre);
            }
        }

        echo $str;

    }

    public function get_client_by_id()
    {
        $id = $this->input->post('client_id');
        $client = $this->client->get_client($id);
//        echo $id;
        $data =array( "nom" => $client->nom, "prenom" =>$client->prenom,
            "tel1" => $client->tel1, "tel2" =>$client->tel2,
            "email" => $client->email, "ville" =>$client->ville,
            "pays" => $client->pays, "adresse" =>$client->adresse);
        echo json_encode($data);
    }


    public function get_activities(){

        $where = $this->input->post("condition");
        $sql = $this->db->query('SELECT * FROM services '.$where.' ORDER BY id ASC');
        $data = array("voyages"=>$sql->result());
        $data['admin'] = $this->login->LoadProfil();



        return $this->load->view('backend/services/get_view_result', $data);

//            $valeur = "okkk";
//        echo  $valeur;
    }
}
