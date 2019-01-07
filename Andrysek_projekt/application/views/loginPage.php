<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Nazev</a></li>
    <li class="breadcrumb-item active" aria-current="page">Přihlasit se</li>
  </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
            <h4>Přihlášení</h4>
            <?php
            ?>
            <p class="text-warning"><?php echo $this->session->message; ?></p>
            <?php
                echo form_open('login-finish');
            ?>
            <input name="username" type="text" id="userName" class="form-control input-sm chat-input" placeholder="Email" />
            </br>
            <input name="password" type="password" id="userPassword" class="form-control input-sm chat-input" placeholder="Heslo" />
            </br>
            <div class="wrapper">
                <button class="btn btn-primary" type="submit"> Přihlásit </button>
            </div>
            </form>
            </div>
            
        </div>
    </div>
</div>
    