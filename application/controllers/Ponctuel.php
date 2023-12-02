<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ponctuel extends CI_Controller {

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

//        if($this->session->userdata('site_lang') =="")
//            $this->session->set_userdata('site_lang', "french");
//
//        if ($this->session->userdata("id_session") ==""){
//            $session_id = session_id();
//            $this->session->set_userdata("id_session", $session_id);
//        }

        $this->load->model('Login_model','login');
        $this->load->model('backend/Partenaire_model', 'partenaire');
        $this->load->model('backend/Service_model', 'service');
        $this->load->model('backend/Categorie_model', 'categorie');
        $this->load->model('backend/Reservation_model', 'reservation');
        $this->load->model('backend/Client_model', 'client');
        $this->load->model('backend/Sous_Categorie_model', 'sous_categorie');
        $this->load->helper('url');

        $this->load->helper('form');

        $this->load->helper('my');

    }
	public function index()
	{

	    // liste des nouvelles activités

        $page_name = "Accueil";
        $content_keywords = "Voyages, Reservation , Hotels, Aactivity, Marrakech";
        $content_description = "Un site web de reservation en ligne.....";
        
        $hotels = $this->service->get_service_by_type(1);
        $voyages = $this->service->get_service_by_type(3);
        $activities = $this->service->get_last3service_by_type(2);
        $transports = $this->service->get_last_service_by_type(4);

        $this->load->view('index',array("page_name"=>$page_name, "activities"=>$activities, "hotels"=>$hotels,"voyages"=>$voyages,"transports"=>$transports,"content_keywords"=>$content_keywords,"content_description"=>$content_description));

	}

	public function chercher(){

        $page_name ="Chercher";

        $content_keywords = "Voyages, Reservation , Hotels, Aactivity, Marrakech";
        $content_description = "Un site web de reservation en ligne.....";

        if ($_POST){

            $designation = $this->input->post("destination");

            $this->session->unset_userdata('destination');
            $this->session->set_userdata('destination', $this->input->post("destination"));
            $this->session->unset_userdata('date_debut');
            $this->session->set_userdata('date_debut', $this->input->post("date_debut"));
            $this->session->unset_userdata('date_fin');
            $this->session->set_userdata('date_fin', $this->input->post("date_fin"));
            $this->session->unset_userdata('adults');
            $this->session->set_userdata('adults', $this->input->post("adults"));
            $this->session->unset_userdata('enfants');
            $this->session->set_userdata('enfants', $this->input->post("enfants"));
            $this->session->unset_userdata('chambres');
            $this->session->set_userdata('chambres', $this->input->post("chambres"));


            $activities = $this->service->get_service_whereDestination($designation);

            $this->load->library('Pagination_bootstrap');

            $this->pagination_bootstrap->offset(10);


//            if(count($activities->result_object()) > 0){
//                $activities = $this->pagination_bootstrap->config("/find/",$activities);
//            }

            $this->load->view('recherche',array("activities"=>$activities,
                "page_name"=>$page_name, "content_keywords"=>$content_keywords,
                "content_description"=>$content_description));

        }else{
            redirect("/");
        }



    }

    public function hotels()
    {
        // liste des nouvelles activités

        $page_name = "Deals Hotels";
        $content_keywords = "Voyages, Reservation , Hotels, Aactivity, Marrakech";
        $content_description = "Un site web de reservation en ligne.....";
        $hotels_smilaires = $this->service->get_last3service_by_type(1);
        $souscats = $this->sous_categorie->get_souscat_by_id_cat(1);
        $hotels = $this->service->get_service_by_type(1);
        $this->load->view('hotels',array("hotels"=>$hotels,"souscats"=>$souscats,
            "hotels_smilaires"=>$hotels_smilaires, "page_name"=>$page_name,
            "content_keywords"=>$content_keywords,"content_description"=>$content_description));
    }

    public function voyages()
    {

        $page_name = "Voyages organises";
        $content_keywords = "Voyages, Reservation , Hotels, Aactivity, Marrakech";
        $content_description = "Un site web de reservation en ligne.....";
        // liste des nouvelles activités
        $voyages_smilaires = $this->service->get_last3service_by_type(3);
        $souscats = $this->sous_categorie->get_souscat_by_id_cat(3);
        $voyages = $this->service->get_service_by_type(3);
        $this->load->view('voyages',array("voyages"=>$voyages ,
        "voyages_smilaires"=>$voyages_smilaires, "page_name"=>$page_name,"souscats"=>$souscats, "content_keywords"=>$content_keywords,"content_description"=>$content_description));

    }

    public function activities()
    {
        $page_name = "Activités";
        $content_keywords = "Voyages, Reservation , Hotels, Aactivity, Marrakech";
        $content_description = "Un site web de reservation en ligne.....";
        // liste des nouvelles activités
        $activities_smilaires = $this->service->get_last3service_by_type(2);
        $souscats = $this->sous_categorie->get_souscat_by_id_cat(2);
        $activities = $this->service->get_service_by_type(2);
//        var_dump($activities);die;
        $this->load->view('activities',array("activities"=>$activities ,"activities_smilaires"=> $activities_smilaires,
            "page_name"=>$page_name,"souscats"=>$souscats, "content_keywords"=>$content_keywords,"content_description"=>$content_description));

    }
    public function allservices()
    {
        $page_name = "allservices";
        $content_keywords = "Voyages, Reservation , Hotels, Aactivity, Marrakech";
        $content_description = "Un site web de reservation en ligne.....";
        $activities = $this->service->get_all_services2();
//        var_dump($activities);die;
        $this->load->view('allservices',array("activities"=>$activities,
            "page_name"=>$page_name,"content_keywords"=>$content_keywords,"content_description"=>$content_description));

    }

    public function transports()
    {

        $page_name = "Transport";
        $content_keywords = "Voyages, Reservation , Hotels, Aactivity, Marrakech";
        $content_description = "Un site web de reservation en ligne.....";
        // liste des nouvelles activités
        $transports_smilaires = $this->service->get_last3service_by_type(4);
        $souscats = $this->sous_categorie->get_souscat_by_id_cat(4);
        $transports = $this->service->get_service_by_type(4);
        $this->load->view('transport',array("transports"=>$transports,"souscats"=>$souscats,
        "transports_smilaires"=>$transports_smilaires,"page_name"=>$page_name, "content_keywords"=>$content_keywords,"content_description"=>$content_description));

    }

    public function detailshotel($url_with_id)
    {

        $url = explode("-",$url_with_id);
        //var_dump($url[0]);die();

        $id = end($url);

        $service = $this->service->get_service($id);
        $chambres = $this->service->get_all_chambres_by_serviceId($id);
        $service_images = $this->service->get_service_images($id);
        $hotels_smilaires = $this->service->get_last3service_by_type($service->categorie_id);
        // liste des nouvelles activités

        $page_name =  $service->titre;
        $content_keywords = "Voyages, Reservation , Hotels, Aactivity, Marrakech";
        $content_description = "Un site web de reservation en ligne.....";

        $this->load->view('details',array("page_name"=>$page_name, "content_keywords"=>$content_keywords,
            "content_description"=>$content_description,"service"=> $service, "chambres"=>$chambres,
            "service_images"=> $service_images,"hotels_smilaires"=>$hotels_smilaires));
    }

    public function reservation($id, $idchambre=null){

        if ($_POST) {

            if ($_POST['new_client'] == 1) {
                // Insert Client....
                $dataclient = array(
                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'tel1' => $_POST['tel1'],
                    // 'tel2' => $_POST['tel2'],
                    // 'pays' => $_POST['pays'],
                    // 'ville' => $_POST['ville'],
                    'message' => $_POST['message'],
                    'date' => $_POST['date'],
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
                    // 'date_debut_resa' => $_POST['date_debut_resa'],
                    // 'date_fin_resa' => $_POST['date_fin_resa'],
                    'validation' => 0,
                    'remarque' => "",
                    'status' => 0

                );

                //var_dump($data);die;

                $this->load->helper('security');

                $data = $this->security->xss_clean($data);

                $inserted = $this->reservation->insert_reservation($data);

                if ($inserted) {

                    $service_aide = $this->service->get_service($id);
                    $chambre_aide = $this->service->get_chambre($idchambre);

//                    var_dump($service_aide);
//                    echo "<br>";
//                    var_dump($chambre_aide);
//                    die;
                    $prix =0;
                    if ($service_aide->prix > 0) $prix = $service_aide->prix;
                    else {
                        if ($chambre_aide !="" && $chambre_aide !=null) $prix = $chambre_aide->prix;
                    }


                    // $your_date = strtotime($_POST['date_debut_resa']);
                    // $now_date = strtotime($_POST['date_fin_resa']);
                    // $datediff = $now_date - $your_date;

                    // $nbr_jours = round($datediff / (60 * 60 * 24));;
                    $datacmd = array(
                        'reservation_id' => $inserted,
                        'service_id' => $_POST['service_id'],
                        // 'chambre_id' => $_POST['chambre_id'],
                        'prix' => $prix,
                        // 'nbr_chambres' => $_POST['nbr_chambres'],
                        // 'nbr_adults' => $_POST['nbr_adults'],
                        // 'nbr_enfants' => $_POST['nbr_enfants'],
                        // 'soustotal' => (($prix * $_POST['nbr_chambres']) * $nbr_jours) * $_POST['nbr_adults'],
                        'status' => 1

                    );

                    $insertedcmd = $this->reservation->insert_services_reservation($datacmd);

                    if ($insertedcmd) {

                        $this->session->set_flashdata('msg_success', 'La reservation à été ajouter avec succes !');
                        redirect(base_url('remerciement'));

                    } else {
                        $this->session->set_flashdata('msg_error', 'Erreur d\'ajouter la reservation !');
                        redirect(base_url('remerciement'));
                    }
                }
            }

        }

        // liste des nouvelles activités
        $service = $this->service->get_service($id);
        $page_name = "Reservation";
        $content_keywords = "Voyages, Reservation , Hotels, Aactivity, Marrakech";
        $content_description = "Un site web de reservation en ligne.....";

        $this->load->view('reservation',array("page_name"=>$page_name,"service"=>$service,"content_keywords"=>$content_keywords,"content_description"=>$content_description));

    }

    public function contact()
    {

        // liste des nouvelles activités

        $page_name = "Contact";
        $content_keywords = "Voyages, Reservation , Hotels, Aactivity, Marrakech";
        $content_description = "Un site web de reservation en ligne.....";

        $this->load->view('contact',array("page_name"=>$page_name, "content_keywords"=>$content_keywords,"content_description"=>$content_description));
    }
    public function about()
    {

        // liste des nouvelles activités

        $page_name = "about";
        $content_keywords = "Voyages, Reservation , Hotels, Aactivity, Marrakech";
        $content_description = "Un site web de reservation en ligne.....";

        $this->load->view('about',array("page_name"=>$page_name, "content_keywords"=>$content_keywords,"content_description"=>$content_description));
    }
    
    public function login()
    {

        $data = array();

        $data["page_name"] = "Login";
        $data["content_keywords"] = "Voyages, Reservation , Hotels, Aactivity, Marrakech";
        $data["content_description"] = "Un site web de reservation en ligne.....";

        $this->load->view('login',$data);
    }

    public function loginadmin()
    {
        extract($_POST);

        if($_POST){

            $query=$this->login->get_user($email,$pass);
            //var_dump($query);die;
            //-- if valid
            if($query){
                foreach($query as $row){
                    $data = array(
                        'id' => $row->id,
                        'email' => $row->admin_email,
                        'is_login' => TRUE
                    );
                    $this->load->helper('security');
                    $data = $this->security->xss_clean($data);
                    $this->session->set_userdata($data);
                    
                    
                }
                redirect(base_url('backend'),$data);

            }else{

                $this->session->set_flashdata('msg_error', 'Erreur login ou mot de passe ');
                redirect(base_url('admin'));
            }

        }
    }

    public function loginclient()
    {

        $data = array();

        $data["page_name"] = "Login";
        $data["content_keywords"] = "Voyages, Reservation , Hotels, Aactivity, Marrakech";
        $data["content_description"] = "Un site web de réservation en ligne.....";

        $this->load->view('login-client',$data);
    }

    public function clientlogin()
    {

        if($_POST){

            $query = $this->login->get_client_user($this->input->post('email'),$this->input->post('pass'));
//            var_dump($query);die;
            //-- if valid
            if($query){
                foreach($query as $row){
                    $data = array(
                        'id' => $row->id,
                        'email' => $row->admin_email,
                        'is_login_c' => TRUE
                    );
                    $this->load->helper('security');
                    $data = $this->security->xss_clean($data);
                    $this->session->set_userdata($data);
                }
                redirect(base_url('mon-compte.html'));

            }else{

                $this->session->set_flashdata('msg_error', 'Erreur login ou mot de passe ');
                redirect(base_url('/'));
            }

        }
    }


    public function inscription()
    {
        $page_name = "inscription";
        $content_keywords = "Voyages, Reservation , Hotels, Aactivity, Marrakech";
        $content_description = "Un site web de reservation en ligne.....";

        $this->load->view('inscription',array("page_name"=>$page_name, "content_keywords"=>$content_keywords,"content_description"=>$content_description));
    }

    public function addclient()
    {
        if($this->session->userdata('is_login_c') == 1 ){
            redirect(base_url('mon-compte.html'));
        }else{
            if($_POST){

                $data = array(

                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'tel1' => $_POST['tel1'],
                    'tel2' => $_POST['tel1'],
                    'ville' => $_POST['ville'],
                    'message' => $_POST['message'],
                    'pays' => $_POST['pays'],
                    'email' => $_POST['email'],
                    'password' => md5($_POST['password']),
                    'status' => 1

                );


                $this->load->helper('security');

                $data = $this->security->xss_clean($data);

                $inserted = $this->client->insert_client($data);

                if ($inserted) {

                    $data = array(
                        'id' => $inserted,
                        'email' => $_POST['email'],
                        'is_login_c' => TRUE
                    );
                    $this->session->set_userdata($data);

                    redirect(base_url('mon-compte.html'));

                }else{

                    $this->session->set_flashdata('msg_error', 'Erreur d\'inscription !');
                    redirect(base_url('inscription.html'));

                }

            }
        }


    }

    public function addmail(){

        if($_POST) {
            $email = $this->input->post('email');
            $result = $this->login->check_email($email);
            if ($result)  $this->session->set_flashdata('msg_successNewsletter', 'Vous êtes déjà inscrit au newsletter!');
            else {
                $data = array('email' => $email, 'status'=>1 );
                //var_dump($data);die;
                $this->load->helper('security');
                $data = $this->security->xss_clean($data);
                $inserted = $this->login->insert_mail($data);
                if ($inserted) $this->session->set_flashdata('msg_successNewsletter', 'Vous êtes bien inscrit au newsletter!');
            }
        }
        redirect("accueil");
    }

    public function contactus(){
        if ($_POST){

            $dataDevis= array(

                "nom"=> $_POST["nom"].' '.$_POST["prenom"],
                "tel"=> $_POST["tel"],
                "email"=> $_POST["email"],
                "message"=> $_POST["message"]
            );

            $this->load->helper('security');
            $dataDevis = $this->security->xss_clean($dataDevis);
//            $inserted = $this->news->insert_devis($dataDevis);

//            if ($inserted) {

                $to  = "mohamedkarkouri2012@gmail.com";
                //var_dump($to);die;
                $headers ="from: ".$_POST['email']. "\r\n";

                $line =	'<table valign="center" style="width: 100%">';
                $line .='<tr><td>Nom</td><td>'.$_POST['nom'].' '.$_POST['prenom'].'</td></tr>';
                $line .='<tr><td>Téléphone</td><td>'.$_POST['tel'].'</td></tr>';
                $line .='<tr><td>Email</td><td>'.$_POST['email'].'</td></tr>';
                $line .='<tr><td>Message</td><td>'.$_POST['message'].'</td></tr>';
                $line .='</table>';

                $content ="<html>
								<head>
									<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
									<title>Contact du site Ponctuel voyages </title>
									<style type='text/css'>
											body {margin: 0; padding: 0; min-width: 100%!important;}
									.content {width: 100%; max-width: 600px;}  
									</style>
								</head>
								<body bgcolor='#f6f8f1'>
								$line
							</body></html>";

                $headers  .= 'MIME-Version: 1.0' . "\r\n";

                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                mail($to, "Page contact par le site ponctuel voyages", $content, $headers);
                $this->session->set_flashdata('msg_success', $this->lang->line('MESSAGE_ENVOYER'));
//                echo "<script>alert('Votre Message à été envoyer avec succes !')</script>";
                redirect(base_url('remerciement'));

//            }
//            redirect(base_url('remerciement'));
        }
    }
    public function remerciement(){

        $data = array();

        $data["page_name"] = "Remerciement";
        $data["content_keywords"] = "Voyages, Reservation , Hotels, Aactivity, Marrakech";
        $data["content_description"] = "Un site web de reservation en ligne.....";


        $this->load->view('remerciement',$data);

    }

    public function myaccount(){

        $data = array();

        $data["page_name"] = "Mon compte";
        $data["content_keywords"] = "Voyages, Reservation , Hotels, Aactivity, Marrakech";
        $data["content_description"] = "Un site web de reservation en ligne.....";


        $this->load->view('mon-compte',$data);

    }
}
