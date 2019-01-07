<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Nazev</a></li>
    <li class="breadcrumb-item"><?php echo anchor('tabulkaP/nazev/asc', 'Tabulka')?></li>
    <li class="breadcrumb-item active" aria-current="page">Uprava v tabulce</li>
  </ol>
</nav>
<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo heading('Úprava v tabulce', 1);

$attributes = array(
    'class' => 'form-horizontal'
);

echo form_open_multipart('edit-dokonci/'.$id, $attributes); //začatek formulaře (routa, která zpracovává data, proměná: třídy atd pro vzhled formulaře)

?> 
<div class="form-group">
    <label class="control-label col-sm-2">ID </label> <!-- popisek -->
    <div class="col-sm-10">
      <input type="number" class="form-control" value="<?php echo $aktStav->ID; ?>" disabled>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2">Název</label> 
    <div class="col-sm-10">
      <input name="nazev" class="form-control" id="nazev" value="<?php echo $aktStav->nazev; ?>">
    </div>
</div>
<!-- zeměpisná šířka-->
<div class="form-group">
    <label class="control-label col-sm-2">Počet</label>
    <div class="col-sm-10">
        <input name="pocet" type="number" class="form-control" id="vyska" value="<?php echo $aktStav->pocet; ?>">
    </div>
  </div>
<!-- zeměpisná délka-->
<div class="form-group">
    <label class="control-label col-sm-2">Obrázek </label>
    <div class="col-sm-10">
      <input name="userfile" value="<?php echo $aktStav->obrazek; ?>" type="file">
    </div>
  </div>
<div class="form-group">
    <label class="control-label col-sm-2" >Uživatel</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="uzivatel" value="<?php echo $aktStav->uzivatel; ?>"disabled>
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" value="upload" name="submit" class="btn btn-default">Odeslat </button>
    </div>
  </div>
<?php

echo form_close(); // konec formulaře

