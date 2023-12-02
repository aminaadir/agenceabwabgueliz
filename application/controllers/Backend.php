<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
        $this->load->model('Login_model','login');
        $this->load->model('backend/Product_model','product');
        $this->load->model('backend/Categorie_model','categorie');
		$this->load->model('backend/Reservation_model','reservation');
        $this->load->model('backend/Partenaire_model', 'partenaire');
        $this->load->model('backend/Service_model', 'service');
        $this->load->model('backend/Client_model', 'client');
        $this->load->model('backend/Offre_model', 'offre');
		

        // $this->load->model('backend/News_model','news');
	   // $this->lang->load('information','arabic');
	  // $this->load->helper(array('url','form'));
	   $this->load->helper('url');
	   $this->load->helper('form');
	   $this->load->helper('my');

    }
	public function index()
	{
	    //var_dump($this->session->userdata('is_login_std'));die;
		if($this->session->userdata('is_login') != 1){
			redirect(base_url('admin'));
		}
		
		
		$data = array();
		
        $data['nbr_partenaires']  = count($this->partenaire->get_all_partenaires());
        $data['nbr_clients']      = count($this->client->get_all_clients());
        $data['nbr_hotels']       = count($this->service->get_services_by_cous_cat_id(1));
        $data['nbr_riads']        = count($this->service->get_services_by_cous_cat_id(2));
        $data['nbr_villas']       = count($this->service->get_services_by_cous_cat_id(3));
        $data['nbr_maisons']      = count($this->service->get_services_by_cous_cat_id(4));
        $data['nbr_emails']       = count($this->client->get_all_emails());
        $data['nbr_reservation']  = count($this->reservation->get_all_reservations());
        $data['nbr_reservation_valide']    = count($this->reservation->get_all_accept_reservations());
        $data['nbr_reservation_invalide']  = count($this->reservation->get_all_refuse_reservations());
        $data['nbr_offres']                = count($this->offre->get_all_offres());
        $data['nbr_admins']                = count($this->client->get_all_admins());
        $data['nbr_activites']                = count($this->service->get_services_by_cat_id(2));
        $data['nbr_tours']                = count($this->service->get_services_by_cous_cat_id(9));
        $data['nbr_circuits']                = count($this->service->get_services_by_cous_cat_id(8));
		$data['admin'] = $this->login->LoadProfil();
        $data["pages"]="dashboard/index";
//        $this->load->view('backend/headerscript',$data);
//		$this->load->view('backend/side-bare');
//		$this->load->view('backend/index',$data);
//		$this->load->view('backend/footerscript');
        $this->load->view('backend/index',$data);
	}


    public function admin()
    {
        if($this->session->userdata('is_login') == 1){
            redirect(base_url('backend/index'));
        }

        $data =array();
        $data["page"]="login_admin";
        if ($this->session->userdata("activedevise") !=""){
            $this->data['devises'] = $this->devises->get_all_devises($this->session->userdata("activedevise"));
        }else{
            $this->data['devises'] = $this->devises->get_all_devises(1);
        }
        $data['alldevises'] = $this->devises->get_all_devisesadmin();
        $data['infos'] = $this->store->get_all_infos();
		$admin['admin'] = $this->store->get_admin();

        $this->load->view('headerscript',$data);
        $this->load->view('admin');
        $this->load->view('footerscript');
    }

    public function get_devise_by_id() {

        header('Content-Type: application/json');
        $id = $this->input->post('id');
        //echo $id;
        $devise = $this->devises->get_devise($id);
        echo json_encode($devise);
        die();
    }

	public function login()
	{
		extract($_POST);
 
        if($_POST){ 
             
		   $query=$this->login->get_user($email,$password);
		   //var_dump($query);die;
            //-- if valid
            if($query){
                foreach($query as $row){
                    $data = array(
                        'id' => $row->id,
                        'email' => $row->email,
                        'is_login' => TRUE
					);
					$this->load->helper('security');
		   			$data = $this->security->xss_clean($data);
                  	$this->session->set_userdata($data);                   
                }
				redirect(base_url('backend'));

            }else{

             $this->session->set_flashdata('msg_error', 'Erreur login ou mot de passe ');
             redirect(base_url('admin'));
            }
            
        }
	}

	public function add_inscrit()
	{
        $dt =array();
        $dt['infos'] = $this->store->get_all_infos();
		if ($_POST) { 

				$data = array(
				'nom' => $_POST['nom'],
				'prenom' => $_POST['prenom'],
				'tel' => $_POST['tel'],
				'email' => $_POST['email'],
				'pass' => md5($_POST['pass']),
                'id_store' => 2
			);
		   $this->load->helper('security');
		   $data = $this->security->xss_clean($data);
		   $inserted = $this->login->insert_client($data);
		 
		   if ($inserted) {
                   $dta = array(
                       'id' => $inserted,
                       'email' => $_POST['email'],
                       'mypassword' => md5($_POST['pass']),
                       'is_loginc' => TRUE
                   );
                   $this->load->helper('security');
                   $dta = $this->security->xss_clean($dta);
                   $this->session->set_userdata($dta);

                   $result = $this->login->check_email($_POST['email']);
                   if (!$result) {
                       $dt = array('email' => $_POST['email']);
                       $this->login->insert_mail($dt);
                   }

				 $to  = $dt['infos'][1]->email;

				$subject = 'Nouvelle Inscription';

				$message = "
				<html>

				<head>

				<title>Nouvelle Inscription</title>

				</head>

				<body>
				<h1 style='text-align:center'>E-commerce </h1>
		
				<style>
				th{
					text-align:center;
					font-size:16px;
					color:#E95A3E ;
				}
				td{
					text-align:center;
					font-size:16px;
					color:#E95A3E ;
				}
				table, th, td {
				border: 1px solid #463e3e;
				}   
				</style>
				
				</body>

				</html>

				";

				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				// More headers
				$headers .= 'From: <'.$dt['infos'][1]->email.'>' . "\r\n";

				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


				mail($to, $subject, $message, $headers);
							$this->session->set_flashdata('msg_success', $this->lang->line('INSCRIPTION_REUSSITE'));
							redirect(base_url('account'));
						} else {
							$this->session->set_flashdata('msg_success',  $this->lang->line('INSCRIPTION_FAILURE'));
							redirect(base_url('login'));
						}
				
			}

		
	}

	public function news()
	{
		if($this->session->userdata('is_login') != 1 ){
			redirect(base_url('backend/login'));
		}

		$data = array();
		$data['infos'] = $this->store->get_all_infos();
	    $data['newses'] = $this->news->get_all_news();
		$data["pages"]="admin/articles";
        $this->load->view('backend/headerscript',$data);
		$this->load->view('backend/side-bare');
		$this->load->view('backend/news/list-news',$data);
		$this->load->view('backend/footerscript');
	}

	public function add_nouvelle()
	{
		if($this->session->userdata('is_login') != 1 ){
			redirect(base_url('backend/login'));
		}

		if ($_POST) {
			
			$config['upload_path'] = './assets/images/news/';
		   $config['allowed_types'] = 'jpeg|jpg|png';
		   $config['file_name'] = addslashes($_POST['title']);
		   $config['max_size'] = 2000;
		   $config['max_width'] = 2000;
		   $config['max_height'] = 2000;
   
		   $this->load->library('upload', $config);
		   if (!$this->upload->do_upload('image')) {
			    $error = array('error' => $this->upload->display_errors());
				$data = array(
				'title' => addslashes($_POST['title']),
				'title_fr' => addslashes($_POST['title_fr']),
				'description'=> addslashes($_POST['description']),
				'description_fr'=> addslashes($_POST['description_fr']),
				'status' 	  => addslashes($_POST['status']),
				'date_insc'    => addslashes($_POST['date_insc']),
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $this->session->userdata('id')
			 );
	
		   } else {
			 
			  	$datas = array('image_metadata' => $this->upload->data());
			   	$file_info = $this->upload->data();
			   	$file_info= $file_info['file_name'];
			   
				$data = array(
					'title' => addslashes($_POST['title']),
					'title_fr' => addslashes($_POST['title_fr']),
					'description'=> addslashes($_POST['description']),
					'description_fr'=> addslashes($_POST['description_fr']),
					'status' 	  => addslashes($_POST['status']),
					'date_insc'    => addslashes($_POST['date_insc']),
					'photo' 		=> $file_info,
					'created_at' => date('Y-m-d H:i:s'),
					'created_by' => $this->session->userdata('id')
					
				); 
			}
			$this->load->helper('security');
			$data = $this->security->xss_clean($data);
			$inserted = $this->news->insert_news($data);
		 
			if ($inserted) {
				   $this->session->set_flashdata('msg_success', 'La nouvelle à été ajouter avec succes !');
				    redirect(base_url('backend/news'));
			}else{
				$this->session->set_flashdata('msg_error', 'Erreur d\'ajouter la nouvelle !');
				redirect(base_url('backend/news'));
			}
			//$this->login_model->edit_profil($data);
		  // $er = $cl->insert_client($client);

		}
		$data = array();
		$data['infos'] = $this->store->get_all_infos();
		$data["pages"]="admin/articles";
        $this->load->view('backend/headerscript',$data);
		$this->load->view('backend/side-bare');
		$this->load->view('backend/news/add_nouvelle',$data);
		$this->load->view('backend/footerscript');
	}

	public function edit_nouvelle($id)
	{
		if($this->session->userdata('is_login') != 1 ){
			redirect(base_url('backend/login'));
		}

		if($id == ""){
			redirect(base_url('backend/news'));
		}		

		if ($_POST) {
			
			$nouvelle= $this->news->get_news($this->input->post('id'));
			
			$config['upload_path'] = './assets/images/news/';
		   $config['allowed_types'] = 'jpeg|jpg|png';
		   $config['file_name'] = addslashes($_POST['title']);
		   $config['max_size'] = 2000;
		   $config['max_width'] = 2000;
		   $config['max_height'] = 2000;
   			if($_POST['date_insc'] !=null){
				   $dateinsc = $_POST['date_insc'];
			   }else{
					$dateinsc = $nouvelle->date_insc;
			   }
		   $this->load->library('upload', $config);
		   if (!$this->upload->do_upload('image')) {
			    $error = array('error' => $this->upload->display_errors());
				$data = array(
				'title' => addslashes($_POST['title']),
				'title_fr' => addslashes($_POST['title_fr']),
				'description'=> addslashes($_POST['description']),
				'description_fr'=> addslashes($_POST['description_fr']),
				'status' 	  => addslashes($_POST['status']),
				'date_insc'    => addslashes($dateinsc),
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $this->session->userdata('id')
			 );
	
		   } else {
				 
				if ($nouvelle->image != "") {
					if (file_exists('assets/images/news/' . $nouvelle->image)) {
						@unlink('assets/images/news/' . $nouvelle->image);
					}
				}

			  	$datas = array('image_metadata' => $this->upload->data());
			   	$file_info = $this->upload->data();
			   	$file_info= $file_info['file_name'];
				   if($_POST['date_insc'] !=null){
					$dateinsc = $_POST['date_insc'];
				}else{
					 $dateinsc = $nouvelle->date_insc;
				}
				$data = array(
					'title' => addslashes($_POST['title']),
					'title_fr' => addslashes($_POST['title_fr']),
					'description'=> addslashes($_POST['description']),
					'description_fr'=> addslashes($_POST['description_fr']),
					'status' 	  => addslashes($_POST['status']),
					'date_insc'    => addslashes($date_insc),
					'photo' 		=> $file_info,
					'created_at' => date('Y-m-d H:i:s'),
					'created_by' => $this->session->userdata('id')
					
				); 
			}
			$this->load->helper('security');
			$data = $this->security->xss_clean($data);
			$updated = $this->news->update_news($data,$id);
		 
			if ($updated) {
				   $this->session->set_flashdata('msg_success', 'La nouvelle à été modifier avec succes !');
				    redirect(base_url('backend/news'));
			}else{
				$this->session->set_flashdata('msg_error', 'Erreur de modifier la nouvelle !');
				redirect(base_url('backend/news'));
			}
		}
		
		$td = array();
		$td['infos'] = $this->store->get_all_infos();
		$td['nouvelle'] = $this->news->get_news($id);
		$td["pages"]="admin/articles";
        $this->load->view('backend/headerscript',$td);
		$this->load->view('backend/side-bare');
		$this->load->view('backend/news/edit_nouvelle',$td);
		$this->load->view('backend/footerscript');
	
	}

	public function delete_nouvelle($id)
	{
		if($this->session->userdata('is_login') != 1 ){
			redirect(base_url('backend/login'));
		}
		if($id == ""){
			redirect(base_url('backend/news'));
		}
		$nouvelle= $this->news->get_news($id);
		$deleted = $this->news->delete_nouvelle($id);
		
		if($deleted){

			if ($nouvelle->photo != "") {
				if (file_exists('assets/images/news/' . $nouvelle->photo)) {
					@unlink('assets/images/news/' . $nouvelle->photo);
				}
			}

			$this->session->set_flashdata('msg_success', 'La nouvelle à été supprimer avec succes !');
			redirect(base_url('backend/news'));
		}else{
			$this->session->set_flashdata('msg_error', 'Erreur !');
			redirect(base_url('backend/news'));
		}
	}

	public function delete_themoignage($id)
	{
		if($this->session->userdata('is_login') != 1 ){
			redirect(base_url('backend/login'));
		}
		
		$themoignage= $this->themoignage->get_themoignage($id);

		if($id == ""){
			redirect(base_url('backend/list_themoignage'));
		}

		$deleted = $this->themoignage->delete_themoignage($id);
		
		if($deleted){
			

			if ($themoignage->image != "") {
				if (file_exists('assets/images/themoignage/' . $themoignage->image)) {
					@unlink('assets/images/themoignage/' . $themoignage->image);
				}
			}
			
			if ($themoignage->photo != "") {
				if (file_exists('assets/images/themoignage/' . $themoignage->photo)) {
					@unlink('assets/images/themoignage/' . $themoignage->photo);
				}
			}
			$this->session->set_flashdata('msg_success', 'Le thémoignage à été supprimer avec succes !');
			redirect(base_url('backend/list_themoignage'));
		}else{
			$this->session->set_flashdata('msg_error', 'Erreur !');
			redirect(base_url('backend/list_themoignage'));
		}
	}

	public function add_themoignage($visiteur=null)
	{
		
		if ($_POST) {
			$year=date('Y');
			$month=date('m');
			$day=date('d');
			$date=$day.$month.$year;
			$date=$_POST['auteur'].'-'.$date;
			$time=time();
			$d=$date.time();
			$config['upload_path'] = './assets/images/themoignage/';
		   	$config['allowed_types'] = 'jpg|png';
		   $config['file_name'] = $d;
		   $config['max_size'] = 2000;
		   $config['max_width'] = 2000;
		   $config['max_height'] = 2000;
   
		   $this->load->library('upload', $config);
		   
		   $file_info_photo="";
		   $file_info ="";
			if($this->upload->do_upload('image')){
				$datas = array('image_metadata' => $this->upload->data());
				$file_info = $this->upload->data();
				$file_info= $file_info['file_name'];
			}
			$this->load->library('upload', $config);
			if($this->upload->do_upload('photo')){
				$datas = array('image_metadata' => $this->upload->data());
				$file_info_photo = $this->upload->data();
				$file_info_photo= $file_info_photo['file_name'];
			}
			$statut = 0;
			$valider = 0;
			if ($visiteur !="visiteur"){
				$statut  = $_POST['status'];
				$valider = $_POST['valider'];
			}

			$data = array(
				'auteur' => $_POST['auteur'],
				'etat'=> $_POST['etat'],
				'status'=> $statut,
				'message' 	  => addslashes($_POST['message']),
				'valider'    => $valider,
				'photo' 		=> $file_info_photo,
				'image' 		=> $file_info,
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $this->session->userdata('id')
				
			); 

			$this->load->helper('security');
			$data = $this->security->xss_clean($data);
			$inserted = $this->themoignage->insert_themoignage($data);
		 
			if ($inserted) {
				if ($visiteur =="visiteur"){
					$this->session->set_flashdata('msg_success', 'Le thémoignage à été ajouter avec succes !');
					redirect(base_url('Welcome/remerciement'));
				}else{
					
					$this->session->set_flashdata('msg_success', 'Le thémoignage à été ajouter avec succes !');
				    redirect(base_url('backend/list_themoignage'));	
				} 
			}else{
				$this->session->set_flashdata('msg_error', 'Erreur d\'ajouter le thémoignage !');
				redirect(base_url('backend/list_themoignage'));
			}
			//$this->login_model->edit_profil($data);
		  // $er = $cl->insert_client($client);

		}
		$this->load->view('backend/header');
		$this->load->view('backend/side-bare');
		$this->load->view('backend/add_themoignage');
		$this->load->view('backend/footer');
	}

	public function list_themoignage()
	{
		if($this->session->userdata('is_login') != 1 ){
			redirect(base_url('backend/login'));
		}

		$data = array();
	    $data['themoignages'] = $this->themoignage->get_all_themoignage();

		$this->load->view('backend/header');
		$this->load->view('backend/side-bare');
		$this->load->view('backend/list_themoignage',$data);
		$this->load->view('backend/footer');
	}
	public function newsdetails($id)
	{
		if($this->session->userdata('is_login') != 1 ){
			redirect(base_url('backend/login'));
		}

		if($id == ""){
			redirect(base_url('backend/list_nouvelle'));
		}

		$data = array();
	    $data['news'] = $this->news->get_news($id);

		$this->load->view('backend/header');
		$this->load->view('backend/side-bare');
		$this->load->view('backend/details-news',$data);
		$this->load->view('backend/footer');
	}

	public function details_themoignage($id)
	{
		if($this->session->userdata('is_login') != 1 ){
			redirect(base_url('backend/login'));
		}

		if($id == ""){
			redirect(base_url('backend/list_themoignage'));
		}

		$data = array();
	    $data['themoignage'] = $this->themoignage->get_themoignage($id);

		$this->load->view('backend/header');
		$this->load->view('backend/side-bare');
		$this->load->view('backend/details-themoignage',$data);
		$this->load->view('backend/footer');
	}

	public function themoignage_accepte($id)
	{
		if($this->session->userdata('is_login') != 1 ){
			redirect(base_url('backend/login'));
		}

		if($id == ""){
			redirect(base_url('backend/list_themoignage'));
		}

		$updated = $this->themoignage->set_accepter($id);
		
		if($updated){
			$this->session->set_flashdata('msg_success', 'Thémoignage à été accepter avec succes !');
			redirect(base_url('backend/list_themoignage'));
		}else{
			$this->session->set_flashdata('msg_error', 'Erreur !');
			redirect(base_url('backend/list_themoignage'));
		}
	}

	public function themoignage_refuse($id)
	{
		if($this->session->userdata('is_login') != 1 ){
			redirect(base_url('backend/login'));
		}

		if($id == ""){
			redirect(base_url('backend/list_themoignage'));
		}

		$updated = $this->themoignage->set_refuser($id);
		
		if($updated){
			$this->session->set_flashdata('msg_success', 'Thémoignage à été refuser avec succes !');
			redirect(base_url('backend/list_themoignage'));
		}else{
			$this->session->set_flashdata('msg_error', 'Erreur !');
			redirect(base_url('backend/list_themoignage'));
		}
	}

	public function edit_themoignage($id)
	{
		if($this->session->userdata('is_login') != 1 ){
			redirect(base_url('backend/login'));
		}

		if($id=='') redirect('backend');
		
		if ($_POST) {
			
			$themoignage= $this->themoignage->get_themoignage($this->input->post('id'));
			$year=date('Y');
			$month=date('m');
			$day=date('d');
			$date=$day.$month.$year;
			$date= addslashes($_POST['auteur']).'-'.$date;
			$time=time();
			$d=$date.time();
			$config['upload_path'] = './assets/images/themoignage/';
		   	$config['allowed_types'] = 'jpg|png';
		   $config['file_name'] = $d;
		   $config['max_size'] = 2000;
		   $config['max_width'] = 2000;
		   $config['max_height'] = 2000;
   
		   $this->load->library('upload', $config);
			//var_dump($_FILES['image']['file_name']);die;
			$file_info_photo="";
			$file_info="";
			if($this->upload->do_upload('image')){
				if($this->input->post('file_img') !=""){
					if ($themoignage->image != "") {
						if (file_exists('assets/images/themoignage/' . $themoignage->image)) {
							@unlink('assets/images/themoignage/' . $themoignage->image);
						}
					}
				}
			}

			if($this->upload->do_upload('image')){
				$datas = array('image_metadata' => $this->upload->data());
				$file_info = $this->upload->data();
				$file_info= $file_info['file_name'];
			}

			//$this->load->library('upload', $config);
			if($this->upload->do_upload('photo')){
				if($this->input->post('file_photo')){
					if ($themoignage->photo != "") {
						if (file_exists('assets/images/themoignage/' . $themoignage->photo)) {
							@unlink('assets/images/themoignage/' . $themoignage->photo);
						}
					}
				}
			}

			$this->load->library('upload', $config);
			if($this->upload->do_upload('photo')){
				$datas = array('image_metadata' => $this->upload->data());
				$file_info_photo = $this->upload->data();
				$file_info_photo= $file_info_photo['file_name'];
			}

			$data = array(
				'auteur' => addslashes($_POST['auteur']),
				'etat'=> $_POST['etat'],
				'status'=> $_POST['status'],
				'message' 	  => addslashes($_POST['message']),
				'valider'    => $_POST['valider'],
				'photo' 		=> $file_info_photo,
				'image' 		=> $file_info,
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $this->session->userdata('id')
				
			); 

			$this->load->helper('security');
			$data = $this->security->xss_clean($data);
			$inserted = $this->themoignage->update_themoignage($data,$id);
		 
			if ($inserted) {
				   $this->session->set_flashdata('msg_success', 'Le thémoignage à été modifier avec succes !');
				    redirect(base_url('backend/list_themoignage'));
			}else{
				$this->session->set_flashdata('msg_error', 'Erreur de modification du thémoignage !');
				redirect(base_url('backend/list_themoignage'));
			}
			//$this->login_model->edit_profil($data);
		  // $er = $cl->insert_client($client);

		}
		
		$data['themoignage'] = $this->themoignage->get_themoignage($id);
		$this->load->view('backend/header');
		$this->load->view('backend/side-bare');
		$this->load->view('backend/edit_themoignage',$data);
		$this->load->view('backend/footer');
	}
	public function logout()
	{
	    //$this->product->clear_panier($this->session->userdata('id'));
        session_destroy();
		redirect('/admin', 'refresh');
	}

}
