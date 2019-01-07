


<ul class="nav navbar-nav">
<?php
echo '<li>'. anchor('tabulkaP/nazev/acs', 'Tabulka');
?>
</ul>

<ul class="nav navbar-nav navbar-right">
  <?php      
echo '<li>'.anchor('logout', 'Odhlásit');
?>
</ul>

<ul class="nav navbar-nav navbar-right navbar-text">
<?php
echo '<li>'." Vaše uživatelské jméno: ".$user->username."";?> </ul>



