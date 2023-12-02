<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Categorie extends CI_Controller {



    public function __construct(){

        parent::__construct();



        $this->load->model('backend/Categorie_model','categorie');
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

        $data["pages"]="services/categories";

        $data['categories'] = $this->categorie->get_all_categories();
        $data['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/categories/liste-categories',$data);
    }



    public function add()

    {

        if($this->session->userdata('is_login') != 1 ){

            redirect(base_url('admin'));

        }

        if ($_POST) {

            $data = array(
                'nom' => $_POST['nom'],
                'status' => $_POST['status']

            );


            //var_dump($data);die;

            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

            $inserted = $this->categorie->insert_categorie($data);

            if ($inserted) {
                $this->session->set_flashdata('msg_success', 'La categorie à été ajouter avec succes !');
                redirect(base_url('categorie/index'));
            }else{
                $this->session->set_flashdata('msg_error', 'Erreur d\'ajouter la categorie !');
                redirect(base_url('categorie/index'));
            }

        }

        $dt =array();

        $dt["pages"]="services/categories";
        $dt['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/categories/add-categorie',$dt);

    }

    public function edit($id)
    {
        if($this->session->userdata('is_login') != 1 ){
            redirect(base_url('admin'));
        }

        if ($id =="")  redirect(base_url('categorie/index'));

        if ($_POST) {

            $data = array(

                'nom' => $_POST['nom'],
                'status' => $_POST['status']

            );

            //var_dump($data);die;

            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

            $inserted = $this->categorie->update_categorie($data,$id);

            if ($inserted) {

                $this->session->set_flashdata('msg_success', 'La categorie à été modifier avec succes !');

                redirect(base_url('categorie/index'));

            }else{

                $this->session->set_flashdata('msg_error', 'Erreur de la modification du catégorie !');

                redirect(base_url('categorie/index'));

            }

        }

        $data =array();

        $data['categorie'] = $this->categorie->get_categorie($id);

        $data["pages"]="services/categories";
        $data['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/categories/edit-categorie',$data);

    }



    public function delete_categorie($id)
    {
        if($this->session->userdata('is_login') != 1 ){
            redirect(base_url('admin'));
        }

        if($id == ""){
            redirect(base_url('categorie/index'));
        }

        $deleted = $this->categorie->delete_categorie($id);

        if($deleted){

            $this->session->set_flashdata('msg_success', 'La categorie à été supprimer avec succes !');

             redirect(base_url('categorie/index'));

        }else{

            $this->session->set_flashdata('msg_error', 'Erreur !');

             redirect(base_url('categorie/index'));

        }

    }



    public function get_devise_by_id() {



        header('Content-Type: application/json');

        $id = $this->input->post('id');

        $devise = $this->devises->get_devise($id);

        echo json_encode($devise);

        die();

    }



    private function _upload_image() {



        $prev_cat_image = $this->input->post('prev_cat_image');

        $cat_image = $_FILES['cat_image']['name'];

        $cat_image_type = $_FILES['cat_image']['type'];

        $return_cat_image = '';

        if ($cat_image != "") {

            if (

                $cat_image_type == 'image/jpeg' || $cat_image_type == 'image/pjpeg' ||

                $cat_image_type == 'image/JPEG' || $cat_image_type == 'image/PJPEG' ||

                $cat_image_type == 'image/jpg' || $cat_image_type == 'image/png' ||

                $cat_image_type == 'image/JPG' || $cat_image_type == 'image/PNG' ||

                $cat_image_type == 'image/x-png' || $cat_image_type == 'image/gif' ||

                $cat_image_type == 'image/X-PNG' || $cat_image_type == 'image/GIF'

            ) {



                $destination = './assets/backend/categories/';



                $file_type = explode(".", $cat_image);

                $extension = strtolower($file_type[count($file_type) - 1]);

                $cat_image_path = 'cat_image-categorie' . time() . '.' . $extension;



                move_uploaded_file($_FILES['cat_image']['tmp_name'], $destination . $cat_image_path);



                // need to unlink previous cat_image

                if ($prev_cat_image != "") {

                    if (file_exists($destination . $prev_cat_image)) {

                        @unlink($destination . $prev_cat_image);

                    }

                }



                $return_cat_image = $cat_image_path;

            }

        } else {

            $return_cat_image = $prev_cat_image;

        }



        return $return_cat_image;

    }



}

