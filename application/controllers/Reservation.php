<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller
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
        $this->load->model('backend/Categorie_model', 'categorie');
        $this->load->model('backend/Reservation_model', 'reservation');
        $this->load->model('backend/Client_model', 'client');

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
        $data['reservations'] = $this->reservation->get_all_reservations();
        $data["pages"] = "reservations/liste";
        $data['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/reservations/liste-reservations', $data);
    }


    public function add()
    {

        if ($this->session->userdata('is_login') != 1) {

            redirect(base_url('admin'));

        }

        if ($_POST) {

            if ($_POST['new_client'] == 1) {
                // Insert Client....
                $dataclient = array(
                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'tel1' => $_POST['tel1'],
                    'tel2' => $_POST['tel2'],
                    'pays' => $_POST['pays'],
                    'ville' => $_POST['ville'],
                    'adresse' => $_POST['adresse'],
                    'email' => $_POST['email'],
                    'password' => md5('@@@@'),
                    'status' => 1

                );

                $inserted_client_id = $this->client->insert_client($dataclient);
            } else {
                $inserted_client_id = $_POST['client_id'];
            }

            if ($inserted_client_id) {

                $data = array(
                    'client_id' => $inserted_client_id,
                    'date_debut_resa' => $_POST['date_debut_resa'],
                    'date_fin_resa' => $_POST['date_fin_resa'],
                    'validation' => 0,
                    'remarque' => "",
                    'status' => 0

                );

                //var_dump($data);die;

                $this->load->helper('security');

                $data = $this->security->xss_clean($data);

                $inserted = $this->reservation->insert_reservation($data);

                if ($inserted) {

                    $service_aide = $this->service->get_service($_POST['service_id']);
                    $chambre_aide = $this->service->get_chambre($_POST['chambre_id']);

//                    var_dump($service_aide);
//                    echo "<br>";
//                    var_dump($chambre_aide);
//                    die;
                    if($service_aide->categorie_id == 1){
                        $prix = $chambre_aide->prix;
                    }else{
                        $prix = $service_aide->prix;
                    }


                    $your_date = strtotime($_POST['date_debut_resa']);
                    $now_date = strtotime($_POST['date_fin_resa']);
                    $datediff = $now_date - $your_date;

                    $nbr_jours = round($datediff / (60 * 60 * 24));;
                    $datacmd = array(
                        'reservation_id' => $inserted,
                        'service_id' => $_POST['service_id'],
                        'chambre_id' => $_POST['chambre_id'],
                        'prix' => $prix,
                        'nbr_chambres' => $_POST['nbr_chambres'],
                        'nbr_adults' => $_POST['nbr_adults'],
                        'nbr_enfants' => $_POST['nbr_enfants'],
                        'soustotal' => (($prix * $_POST['nbr_chambres']) * $nbr_jours) * $_POST['nbr_adults'],
                        'status' => 1

                    );

                    $insertedcmd = $this->reservation->insert_services_reservation($datacmd);

                    if ($insertedcmd) {

                        $this->session->set_flashdata('msg_success', 'La reservation à été ajouter avec succes !');
                        redirect(base_url('reservation/index'));

                    } else {
                        $this->session->set_flashdata('msg_error', 'Erreur d\'ajouter la reservation !');
                        redirect(base_url('reservation/index'));
                    }
                }
            }

        }

        $data = array();
        $data['partenaires'] = $this->partenaire->get_all_partenaires();
        $data['categories'] = $this->categorie->get_all_categories();
        $data['clients'] = $this->client->get_all_clients();
        $data["pages"] = "reservations/liste";
        
        $data['admin'] = $this->login->LoadProfil();
        $this->load->view('backend/reservations/add-reservation', $data);

    }

    public function edit($id)
    {

        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url('admin'));
        }

        if ($id == "") redirect(base_url('service/index'));


        if ($_POST) {

            $data = array(
                'client_id' => $inserted_client_id,
                'date_resa' => $_POST['date_resa'],
                'validation' => $_POST['validation'],
                'remarque' => "",
                'status' => 0
            );

            //var_dump($data);die;

            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

            $updated = $this->reservation->insert_reservation($data);

            if ($updated) {

                $datacmd = array(
                    'reservation_id' => $inserted,
                    'service_id' => $_POST['service_id'],
                    'prix' => $_POST['prix'],
                    'quantity' => $_POST['quantity'],
                    'soustotal' => $_POST['soustotal'],
                    'status' => 1

                );

                $insertedcmd = $this->reservation->insert_services_reservation($datacmd);

                if ($insertedcmd) {

                    $this->session->set_flashdata('msg_success', 'La reservation à été ajouter avec succes !');
                    redirect(base_url('reservation/index'));

                } else {
                    $this->session->set_flashdata('msg_error', 'Erreur d\'ajouter la reservation !');
                    redirect(base_url('reservation/index'));
                }
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

    public function commande($id)
    {

        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url('admin'));
        }

        if ($id == "") redirect(base_url('reservation/index'));

        $data = array();
        $data['reservation'] = $this->reservation->get_reservation($id);
        $data['client'] = $this->client->get_client($data['reservation']->client_id);
        $data['services_reservation'] = $this->reservation->get_all_services_reservation($id);
        $data["pages"] = "reservations/index";
        
        $data['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/reservations/details-commande', $data);

    }

    public function editcommand($id)
    {
        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url('admin'));
        }

        if ($id == "") redirect(base_url('reservation/index'));

        if ($_POST) {

            $data = array( 
                'client_id' => $_POST['clientid'], 
                'adminvalidated' => $_POST['adminnome'], 
                'validation' => $_POST['validation'],
                'remarque' => $_POST['remarque']
            );
 

            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

            $updated = $this->reservation->update_reservation($data,$id);

            if ($updated) { 

                    $this->session->set_flashdata('msg_success', 'La reservation à été modifie avec succes !');
                    redirect(base_url('reservation/index'));
 
            }
            else {
                $this->session->set_flashdata('msg_error', 'Erreur modification de  la reservation !');
                redirect(base_url('reservation/index'));
            }

        }
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
        $data["active_tab"] = "images";
        $dt['admin'] = $this->login->LoadProfil();
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
        $data["active_tab"] = "images";
        $data['dt'] = $this->login->LoadProfil();
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

    public function get_chambres_by_service()
    {

        $service_id = $this->input->post('service_id');

        $chambres = $this->service->get_chambres_by_service($service_id);

//        var_dump($chambres);die;

        $str = '<option value="">--Selectionnez--</option>';

        //  $select = 'selected="selected"';
        if (!empty($chambres)) {
            foreach ($chambres as $obj) {
//                $selected = $subject_id == $obj->id ? $select : '';
//                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';
                $str .= '<option value="' . $obj->id . '">' . $obj->type_chambre . '</option>';
            }
        }

        echo $str;
    }
}
