<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Nazev</a></li>
    <li class="breadcrumb-item active" aria-current="page">Registrace</li>
  </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            
            <?php
                echo form_open('register-finish');
            ?>
  <fieldset>
    <div id="legend">
      <legend class="">Registrace</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Jméno</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="" class="input-xlarge" value="<?php echo $this->session->message3['username']; ?>">
        <p class="text-warning"> <?php echo $this->session->message2['username'];?> </p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge" value="<?php echo $this->session->message3['email']; ?>">
        <p class="text-warning"><?php echo $this->session->message2['email']; ?></p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Heslo</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
        <p class="text-warning"><?php echo $this->session->message2['password']; ?></p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="password_confirm">Heslo znovu</label>
      <div class="controls">
        <input type="password" id="passwordConf" name="passwordConf" placeholder="" class="input-xlarge">
        
        <p class="text-warning"><?php echo $this->session->message2['password']; ?></p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Registrovat</button>
      </div>
    </div>
  </fieldset>
</form>
</div>
</div>
</div>