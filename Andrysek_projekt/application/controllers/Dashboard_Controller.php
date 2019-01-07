<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard_Controller
 *
 * @author andrysek_zdenek
 */
class Dashboard_Controller extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->layout->setLayout('layout/layout_main');
        $this->load->model('Tabulka_model');
    }
    function tabulka($sloupec, $jak){
        $data['title'] = 'Nevím';
        $data['main'] = "tabulka";
        $data['user'] = $this->user;
        $data['seznam'] = $this->Tabulka_model->getSeznam($sloupec,$jak);
        $this->layout->generate($data);
    }
    function pridej()
    {
        $data['title'] = 'Přidat';
        $data['main'] = "pridatDoTabulky";
        $data['user'] = $this->user;
        $this->layout->generate($data);
    }
    function pridejDokonci()
    {
                $config['upload_path']          = realpath('obrazky/');
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100000000000;
                $config['max_width']            = 1024000;
                $config['max_height']           = 7680000;
                echo $config['upload_path'];
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        //$this->load->view('pridatDoTabulky', $error);
                       redirect('pridat', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $jmeno = $this->upload->data();
                        
                
                $nazev = $this->input->post('nazev');
                $pocet = $this->input->post('pocet');
                $obrazek = $jmeno["file_name"];
                $uzivatel = $this->user->username;
                $this->Tabulka_model->setDoTabulky($nazev,$pocet,$obrazek,$uzivatel);
                redirect('tabulkaP/nazev/asc');
                }
        
          
    }
    function editTabulky($id)
    {
        $data['user'] = $this->user;
        $data['aktStav'] = $this->Tabulka_model->editTabulky($id);
        $data['id'] = $id;
        $data['title'] = "Edit";
        $data['main'] = "upravitVTabulce";
        $this->layout->generate($data);
    }
    function editTabulkyDokoncit($id)
    {
                $config['upload_path']          = realpath('obrazky/');
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100000000000;
                $config['max_width']            = 1024000;
                $config['max_height']           = 7680000;
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        //$this->load->view('pridatDoTabulky', $error);
                        $red = 'edit'.'/'.$id;
                        redirect($red, $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $jmeno = $this->upload->data();
                        
                        $nazev = $this->input->post('nazev');
                        $pocet = $this->input->post('pocet');
                        $obrazek = $jmeno["file_name"];
                        $this->Tabulka_model->zmenaVTabulce($id,$nazev,$pocet,$obrazek);
                        redirect('tabulkaP/nazev/asc');
                }
    }
    function smazRadek($id)
    {
        $this->Tabulka_model->setSmazatRadek($id);
        redirect('tabulkaP/nazev/acs');
    }
            
    function logout() {
        $this->ion_auth->logout();
        redirect('');
    }
}
