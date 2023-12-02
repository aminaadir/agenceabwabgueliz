<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function edit_option_md5($action, $id, $table){
        $this->db->where('md5(id)',$id);
        $this->db->update($table,$action);
        return;
    }

    public function edite_profil($data){
        $t=& get_instance();
                $id=$t->session->userdata('ids');
        $this->db->where('id',$id);
        $this->db->update('admin',$data);
        return;
    }


    public function insert_client($data){
        $this->db->insert('clients',$data);
        return $this->db->insert_id();
    }
    public function insert_mail($data){
        $this->db->insert('mailing',$data);
        return $this->db->insert_id();
    }

    public function update_client($data,$id){
        $index_array["id"] =$id;
        $query =$this->db->update('clients',$data,$index_array);
        return $query;
    }
    
    public function insert_blog($data,$table){
        $this->db->insert($table,$data);        
        return $this->db->insert_id();
    }

    public function insert_questions($data){
        $this->db->query($data);        
        return true;
    }
    public function insert_questionsaut($data){
        $this->db->query($data);        
        return true;
    }
    public function load_qst_compatible(){
        $this->db->select('*');
        $this->db->from('question');
        $query = $this->db->get();

        if($query-> num_rows() !=0)
        return  $query->result();
    return 0;
    }
     public function load_qst_compatible_cl($sexe){
        $this->db->select('*');
        $this->db->from('client');
        $this->db->where('sexe_ar !=',$sexe); 
        $query = $this->db->get();
         return  $query->result();
        return 0;
    }

    public function LoadProfil(){
        $t=& get_instance();
                $id=$t->session->userdata('id');
        $this->db->select('*');
        $this->db->from('admins');
        $this->db->where('id',$id); 
        return  $this->db->get()->row();
    }
    public function insert_crtiteressup($data){
        $this->db->insert('client_supinfo',$data);
       return $this->db->insert_id();
    }
    public function insert_crtiteres($data){
        $this->db->insert('criteres',$data);   
        return $this->db->insert_id();

    }
    public function  test_qeustions($id){
        $this->db->where('id_client',$id); 
        $this->db->limit(1);
         $query = $this->db->get('question');       
        if($query -> num_rows() == 1){                 
            return true;
        }
        else{
            return false;
        }
    }
    public function  exist_criteres(){
        $t=& get_instance();
                $pag=$t->session->userdata('id');
        $this->db->where('id_clt',7); 
        $this->db->limit(1);
         $query = $this->db->get('client_supinfo');       
        if($query -> num_rows() == 1){                 
            return true;
        }
        else{
            return false;
        }
    }

    public function get_questions(){
       
       
        $query = $this->db->get('questions');
       return  $query->result();
       
    }

//select liste des questions par client
    public function getqst_profil($uu){
        
        $this->db->select('*');
        $this->db->from('questions');
        $this->db->where('id_client',$uu);
        $this->db->join('question', 'question.id_questions = questions.id');
        
        $query = $this->db->get();
        return  $query->result();
    }
   
//select liste des questions par client
    public function getqst_profilautre($uu){
        
        $this->db->select('*');
        $this->db->from('questions');
        $this->db->where('id_client',$uu);
        $this->db->join('questionautre', 'questionautre.id_questions = questions.id');
        
        $query = $this->db->get();
        if($query->num_rows() !=0)
        return  $query->result();
    return 0;
    }
    public function load_all_client_criteres($sexe,$id){
        $this->db->select('cl.*');
        $this->db->from('client_supinfo cr');
        $this->db->where('cr.sexe_ar !=',$sexe);
        $this->db->where('cl.id !=',$id);
        $this->db->join('client cl', 'cl.id = cr.id_clt');
        
        $query = $this->db->get();
        return  $query->result();


    }

    public function get_criteres($id){
        
        $this->db->select('*');
        $this->db->from('client_supinfo');
        $this->db->where('id_clt ',$id);
        $this->db->limit(1);
        $query = $this->db->get();
        return  $query->result();
    }
    public function get_all_criteres(){
        
        $this->db->select('*');
        $this->db->from('client_supinfo');
        $query = $this->db->get();
        return  $query->result();
    }
    public function get_criteresaut($id){
        
        $this->db->select('*');
        $this->db->from('criteres');
        $this->db->where('id_clt ',$id);
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() !=0){
        return  $query->result();
    } return 0;
    }
    // check valid user by id
    public function validate_id($id){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('md5(id)', $id); 
        $this->db->limit(1);
        $query = $this->db->get();
        if($query -> num_rows() == 1){                 
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function get_user($email,$password){

        $email=addslashes($email);$password=addslashes($password);
        $query=  $this->db->query("select * from admins where status='1' and admin_email='".$email."' and admin_pass=md5('".$password."') ");

        if($query -> num_rows() == 1){   

            return $query->result();
        }
        else{
            return false;
        }
    }

    public function get_client_user($email,$password){

        $email=addslashes($email);$password=addslashes($password);
        $query=  $this->db->query("select * from clients where status='1' and email='".$email."' and password=md5('".$password."') ");

        if($query -> num_rows() == 1){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function get_client_pass($email,$tel){

        $email=addslashes($email);
        $query=  $this->db->query("select * from clients where status='1' and email='".$email."' and tel='".$tel."'");

       // var_dump($query->result());die;
        if($query -> num_rows() == 1){
            return $query->row();
        }
        else{
            return false;
        }
    }
    public function check_email($email){

        $this->db->where('email', $email);
        $query = $this->db->get('mailing');
        if($query->num_rows() == 1) {                 
            return true;
        }else{
            return false;
        }
    }
    public function get_single(){
        $t=& get_instance();
                $pag=$t->session->userdata('id');
        $this->db->where('id', $pag); 
        $this->db->limit(1);
        $query = $this->db->get('client');

        if($query->num_rows() == 1) {                 
            return $query->result();
        }else{
            return false;
        }
    }
     public function get_client(){
       $t=& get_instance();
        $pag=$t->session->userdata('id');
        $this->db->where('id',$pag);
        $query = $this->db->get('client');
       return  $query->result();
       
    }

    public function get_client_by_etat($etat){
       
        $this->db->where('etat',$etat);
        $query = $this->db->get('client');
       return  $query->result();
       
    }
    public function get_client_by_etatdif($etat){
       
        $this->db->where('etat !=',$etat);
        $query = $this->db->get('client');
       return  $query->result();
       
    }

    public function get_client_by_id($id){
       
        $this->db->where('id',$id);
        $query = $this->db->get('client');
       return  $query->result();
       
    }
    public function get_blog_by_id($id,$table){
       
        $this->db->where('id',$id);
        $query = $this->db->get($table);
       return  $query->result();
       
    }

    public function get_blog_by_id_etat($id,$table,$etat){
       $this->db->where('actif',$etat);
        $this->db->where('id',$id);
        $query = $this->db->get($table);
       return  $query->result();
       
    }

    public function get_clients(){
      
        $query = $this->db->get('client');
       return  $query->result();
       
    }
     public function get_blogs($table){
        
        $query = $this->db->get($table);
       return  $query->result();
       
    }
    public function get_blogs_etat($table,$et){
      $this->db->where('actif', $et);
        $query = $this->db->get($table);
       return  $query->result();
       
    }

    function edit_profil($action){
         $t=& get_instance();
                $pag=$t->session->userdata('id');
        $this->db->where('id', $pag); 
        $this->db->update('client',$action);
        return;
    } 
    
    function change_etat_client($id){
        
        $this->db->where('tocken', $id); 
        $this->db->set('etat', 1);
        $o =$this->db->update('client');
        return $o;
    } 
    function update_blog($data,$table,$id){
        
        $this->db->where('id', $id); 
        $o =$this->db->update($table,$data);
        return $o;
    } 
    function delete($id,$table){
      
        $this->db->where('id', $id); 
        $this->db->delete($table);
        return;
    } 


    //-- check valid user
    function validate_user(){            
        
        $this->db->select('*');
        $this->db->from('client');
        $this->db->where('mail', $this->input->post('mail')); 
        $this->db->where('pass', md5($this->input->post('pass'))); 
        $this->db->limit(1);
        $query = $this->db->get();   
        
        

        if($query->num_rows() == 1){                 
           return $query->result();
        }
        else{
            return false;
        }
    }



}