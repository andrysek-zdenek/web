<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Nazev</a></li>
    <li class="breadcrumb-item"><?php echo anchor('tabulkaP/nazev/asc', 'Tabulka')?></li>
    <li class="breadcrumb-item active" aria-current="page">Přidat do tabulky</li>
  </ol>
</nav>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo heading('Přidat do tabulky', 1);

$attributes = array(
    'class' => 'form-horizontal'
);
$error='';
echo $error;
echo form_open_multipart('pridat-Dokonci', $attributes);
?> 
 

<div class="form-group"> <!--name tam se uklada proměna, type- typ tlačitka -->
    <label class="control-label col-sm-2">Název </label> <!-- popisek -->
    <div class="col-sm-10">
      <input name="nazev" type="text" class="form-control">
    </div>
  </div>

<div class="form-group">
    <label class="control-label col-sm-2">Počet</label>
    <div class="col-sm-10">
      <input name="pocet" type="number" class="form-control">
         
    </div>
  </div>
<!-- obrázek-->
<div class="form-group">
    <label class="control-label col-sm-2 ">obrázek </label>
    <div class="col-sm-10">
            <input name="userfile" type="file" >
    </div> 
</div>


 <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
        <button name="submit" value="upload" type="submit" class="btn btn-default">Dokončit </button>
    </div>
  </div>

<?php

echo form_close(); // konec formulaře
