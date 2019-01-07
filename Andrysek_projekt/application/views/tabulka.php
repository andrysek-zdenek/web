<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Nazev</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tabulka</li>
  </ol>
</nav>
<?php

echo heading("Tabulka", 1);
$attributes = array(
    'class' => 'form-horizontal'
);
echo form_open('pridat', $attributes); //začatek formulaře (routa, která zpracovává data, proměná: třídy atd pro vzhled formulaře)
?>
<div class="form-group"> 
    <div class=" col-sm-10">
      <button type="submit" class="btn btn-default">Přidat do tabulky </button>
    </div>
  </div> 
<?php
echo form_close();
$nahoru = '<i class="fas fa-angle-up"></i>';
$dolu = '<i class="fas fa-angle-down"></i>';
$hlavicka = array(
    "Název ".anchor('tabulkaP/nazev/asc'," ".$dolu." ").anchor('tabulkaP/nazev/desc'," ".$nahoru." "),
    "Počet ".anchor('tabulkaP/pocet/asc'," ".$dolu." ").anchor('tabulkaP/pocet/desc'," ".$nahoru." "),
    "Obrázek ",
    "Přidal uživatel ".anchor('tabulkaP/uzivatel/asc'," ".$dolu." ").anchor('tabulkaP/uzivatel/desc'," ".$nahoru." "),
    "Upravit", "Smazat"
);
$this->table->set_heading($hlavicka);
       
foreach($seznam as $row){
    $dataButton = array(
        'type' => 'submit',
        'name' => 'delete',
        'content' => '<span class="glyphicon glyphicon-trash">',
        'class' => 'btn btn-danger'
    );
    $dataButton2 = array(
        'type' => 'submit',
        'name' => 'edit',
        'content' => '<span class="glyphicon glyphicon-pencil">',
        'class' => 'btn btn-warning'
    );
    $edit = form_open('edit/'.$row->ID).form_button($dataButton2).form_close();
    $delete = form_open('smaz/'.$row->ID).form_button($dataButton).form_close();
    $obrSet = array(
        'src'=>'obrazky/'.$row->obrazek,
        'width' => '480',
        'height' => '270'
        );
    $data = array(
        $row->nazev,
        $row->pocet,
        img($obrSet),
        $row->uzivatel,
        $edit,
        $delete
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
