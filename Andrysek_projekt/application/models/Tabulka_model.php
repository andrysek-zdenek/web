<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tabulka_model
 *
 * @author zdend
 */
class Tabulka_model extends CI_Model {
    public function __construct() {
    parent::__construct();}
    
    public function getSeznam($podle, $jak)
    {
        $this->db->select('ID, nazev, pocet, obrazek, uzivatel');
        $this->db->from('tabulka');
        $this->db->where('zobrazit', 1);
        $this->db->order_by($podle, $jak);
        
        $data = $this->db->get()->result();
        return $data;
    }
    function getMaxID()
    {
        $this->db->select('Max(ID) as max', false);
        $this->db->from('tabulka');
        
        $data = $this->db->get()->result();
        return $data[0]->max; //vrátí rovnou to max čislo
        
    }
    function setDoTabulky($nazev,$pocet,$obrazek,$uzivatel)
    {
        $id = $this->getMaxID() + 1;
        $data = array(
         'ID' => $id,
        'nazev' => $nazev,
        'pocet' => $pocet,
        'obrazek' => $obrazek,
        'uzivatel' => $uzivatel,
        'zobrazit' => 1
    );
    $return = $this->db->insert('tabulka', $data);
    return $return;
    }
    function editTabulky($id)
    {
        $this->db->select('ID, nazev, pocet, obrazek, uzivatel');
        $this->db->from('tabulka');
        $this->db->where('ID', $id);
        $data = $this->db->get()->result();
        return $data[0];
    }
    function zmenaVTabulce($id,$nazev,$pocet,$obrazek)
    {
        $data = array(
            'ID' => $id,
            'nazev' => $nazev,
            'pocet' => $pocet,
            'obrazek' => $obrazek,
            'uzivatel' => $this->user->username,
            'zobrazit' => 1
        );
        $this->db->where('ID', $id);
        $return = $this->db->update('tabulka', $data);
    return $return;
    }
    function setSmazatRadek($id)
    {
        $data = array(
        'zobrazit' => 0
        );
        $this->db->where('ID', $id);
        $this->db->update('tabulka', $data);
    }
}
