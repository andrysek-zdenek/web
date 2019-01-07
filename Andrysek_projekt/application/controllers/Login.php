<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author andrysek_zdenek
 */
class Login extends CI_Controller {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->library('validationclass');
        $this->load->model('Tabulka_model');
    }
    function tabulka_nepr($sloupec, $jak)
    {
        $data['title'] = 'Nevím';
        $data['main'] = "tabulkaNepr";
        $data['seznam'] = $this->Tabulka_model->getSeznam($sloupec,$jak);
        $this->layout->generate($data);
        
    }
    function login(){
        $data['title'] = 'Přihlášení';
        $data['main'] = "loginPage";
        $this->layout->generate($data);
    }
    
    function loginFinish()
    {
        $username = $this->input->post('username'); //uloží do $username, username z formulaře
        $password = $this->input->post('password');
        
        $return = $this->ion_auth ->login($username, $password); // v ion_auth je metoda login
        if($return)
        {
            redirect('tabulkaP/nazev/acs');
        }else{
            $data = array(
                        'message' => 'Špatné uživatelské jméno nebo heslo'
                            );
            $this->session->set_Flashdata($data);
            
            redirect('admin/login');
        }
    }
    
    function register(){
        $data['title'] = 'Registrace';
        $data['main'] = "registerPage";
        $this->layout->generate($data);
    }
    
    function registerFinish()
    {
       $tables = $this->config->item('tables', 'ion_auth'); //konfigurační proměnná. konfigurační soubor (v zakladu config.php)
       $password_min = $this->config->item('min_password_length', 'ion_auth');
       $password_max = $this->config->item('max_password_length', 'ion_auth');
       
       $username = $this->input->post('username');
       $email = $this->input->post('email');
       $password = $this->input->post('password');
       $passwordConf = $this->input->post('passwordConf');
        //podmínky
       $this->form_validation->set_rules('username','Jméno', 'required|is_unique['.$tables['users'].'.username]');
       $this->form_validation->set_rules('email','Email', 'required|valid_email|is_unique['.$tables['users'].'.email]');
       $this->form_validation->set_rules('password','Heslo', 'required|min_length['.$password_min.']|max_length['.$password_max.']|matches[passwordConf]');
       $this->form_validation->set_rules('passwordConf','Heslo znovu', 'required|min_length['.$password_min.']|max_length['.$password_max.']|matches[password]');
       
      $data = array(
          'username' => $username
      );
       
      $return = $this->form_validation->run();
      
      
      
       if(!$return) // return je true když to uživatel napiše dobře ! negace
       {
           $input = array("username","email","password","passwordConf");
           $value = array(
             'username' => $username,  
             'email' => $email
           );
           $poleChyb = $this->form_validation->error_array();
           $return = $this->validationclass->errorMessages($poleChyb,$input);
           $values = $this->validationclass->values($poleChyb,$value);
           $this->session->set_flashdata("message2", $return);
           $this->session->set_flashdata("message3", $values);
           redirect('register');
           
       }else{
           $this->ion_auth->register($username, $password, $email, $data);
           redirect('admin/login');
           
       }
    }
}
