<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Nazev</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tabulky</li>
  </ol>
</nav>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo heading("Tabulka", 1);
$nahoru = '<i class="fas fa-angle-up"></i>';
$dolu = '<i class="fas fa-angle-down"></i>';
$hlavicka = array(
    "Název ".anchor('tabulkaN/nazev/asc'," ".$dolu." ").anchor('tabulkaN/nazev/desc'," ".$nahoru." "),
    "Počet ".anchor('tabulkaN/pocet/arc'," ".$dolu." ").anchor('tabulkaN/pocet/desc'," ".$nahoru." "),
    "Obrázek ",
    "Přidal uživatel ".anchor('tabulkaN/uzivatel/asc'," ".$dolu." ").anchor('tabulkaN/uzivatel/desc'," ".$nahoru." "),
);

$this->table->set_heading($hlavicka);
        
foreach($seznam as $row){
    $obrSet = array(
        'src'=>'obrazky/'.$row->obrazek,
        'width' => '480',
        'height' => '270'
        );
    $data = array(
        $row->nazev,
        $row->pocet,
        img($obrSet),
        $row->uzivatel
    );
    $this->table->add_row($data);
}

$template = array(
        'table_open'            => '<table class="table table-bordered">',

        'thead_open'            => '<thead>',
        'thead_close'           => '</thead>',

        'heading_row_start'     => '<tr>',
        'heading_row_end'       => '</tr>',
        'heading_cell_start'    => '<th>',
        'heading_cell_end'      => '</th>',

        'tbody_open'            => '<tbody>',
        'tbody_close'           => '</tbody>',

        'row_start'             => '<tr>',
        'row_end'               => '</tr>',
        'cell_start'            => '<td>',
        'cell_end'              => '</td>',

        'row_alt_start'         => '<tr>',
        'row_alt_end'           => '</tr>',
        'cell_alt_start'        => '<td>',
        'cell_alt_end'          => '</td>',

        'table_close'           => '</table>'
);

$this->table->set_template($template);

echo $this->table->generate();


