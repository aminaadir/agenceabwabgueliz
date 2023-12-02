<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Souscategorie extends CI_Controller {



    public function __construct(){

        parent::__construct();

        $this->load->model('backend/Categorie_model','categorie');
        $this->load->model('Login_model','login');
        $this->load->model('backend/Sous_Categorie_model', 'sous_categorie');

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

        $data["pages"]="services/types";
        $data['admin'] = $this->login->LoadProfil();
        $data['categories'] = $this->sous_categorie->get_all_categories();

        $this->load->view('backend/categories/liste-sous-categories',$data);
    }



    public function add()

    {

        if($this->session->userdata('is_login') != 1 ){

            redirect(base_url('admin'));

        }

        if ($_POST) {



            $data = array(

                'nom' => $_POST['nom'],
                'categorie_id' => $_POST['categorie_id'],
                'status' => $_POST['status']


            );


            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

            $inserted = $this->sous_categorie->insert_sous_categorie($data);



            if ($inserted) {

                $this->session->set_flashdata('msg_success', 'Le type de service à été ajouter avec succes !');

                redirect(base_url('souscategorie/index'));



            }else{

                $this->session->set_flashdata('msg_error', 'Erreur d\'ajouter ce type de service !');

                redirect(base_url('souscategorie/index'));

            }



        }

        $dt =array();

        $dt['categories'] = $this->categorie->get_all_categories();
        //var_dump($data['categories']);die;
        $dt["pages"]="services/types";
        $dt['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/categories/add-sous-categorie',$dt);


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
                'categorie_id' => $_POST['categorie_id']

            );

            $this->load->helper('security');

            $data = $this->security->xss_clean($data);

            $inserted = $this->sous_categorie->update_sous_categorie($data,$id);



            if ($inserted) {

                $this->session->set_flashdata('msg_success', 'Le type de service à été modifier avec succes !');

                redirect(base_url('souscategorie/index'));

            }else{

                $this->session->set_flashdata('msg_error', 'Erreur de la modification du type de service !');

                redirect(base_url('souscategorie/index'));

            }

        }

        $data =array();

        $data['categorie'] = $this->sous_categorie->get_sous_categorie($id);

        $data['categories'] = $this->categorie->get_all_categories();
        $data["pages"]="services/types";
        $data['admin'] = $this->login->LoadProfil();

        $this->load->view('backend/categories/edit-sous-categorie',$data);

    }



    public function delete_sous_categorie($id)
    {

        if($this->session->userdata('is_login') != 1 ){

            redirect(base_url('admin'));

        }

        if($id == ""){

            redirect(base_url('souscategorie/index'));

        }

        $deleted = $this->sous_categorie->delete_sous_categorie($id);

        if($deleted){
            $this->session->set_flashdata('msg_success', 'Le type de service à été supprimer avec succes !');

             redirect(base_url('souscategorie/index'));

        }else{

            $this->session->set_flashdata('msg_error', 'Erreur !');

             redirect(base_url('souscategorie/index'));

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



                $destination = './assets/backend/souscategorie/';



                $file_type = explode(".", $cat_image);

                $extension = strtolower($file_type[count($file_type) - 1]);

                $cat_image_path = 'cat_image-sous-categorie' . time() . '.' . $extension;



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

    public function get_souscat_by_cat() {

        $cat_id = $this->input->post('cat_id');

        $sous_cats = $this->sous_categorie->get_souscat_by_id_cat($cat_id);

//        var_dump($sous_cats);die;

        $str = '<option value="">--Selectionnez--</option>';

      //  $select = 'selected="selected"';
        if(!empty($sous_cats)) {
            foreach ($sous_cats as $obj) {
//                $selected = $subject_id == $obj->id ? $select : '';
//                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';
                $str .= '<option value="' . $obj->id . '">' . $obj->nom . '</option>';
            }
        }

        echo $str;
    }

    public function get_souscat_by_cat2() {

        $cat_id = $this->input->post('cat_id');
        $souscat_id = $this->input->post('sous_id');
        $sous_cats = $this->sous_categorie->get_souscat_by_id_cat($cat_id);
        $str = '<option value="">--Selectionnez--</option>';
        $select = 'selected="selected"';
        if(!empty($sous_cats)) {
            foreach ($sous_cats as $obj) {
                $selected = $souscat_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->title . '</option>';
            }
        }
        echo $str;
    }
}

