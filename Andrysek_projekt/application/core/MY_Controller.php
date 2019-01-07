<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Controller
 *
 * @author andrysek_zdenek
 */
class Admin_Controller extends CI_Controller {
    //put your code here
    function __construct() {
        parent::__construct();
        if(!$this->ion_auth->logged_in()) {

      redirect('admin/login');

    } else {
          $this->user = $this->ion_auth->user()->row();
          //zjištění id uživatele, pak lze lehce zjistit další věci jako skupiny, 
          //práva apod - viz v části ACL
          //$this->user = $row->id;
        }

 }
    }
