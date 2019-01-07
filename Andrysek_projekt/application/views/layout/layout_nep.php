<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<title><?php echo $title ?></title>
<link href=<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?> rel="stylesheet" type="text/css"/>
<link href=<?php echo base_url('assets/bootstrap/css/bootstrap-theme.min.css');?> rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link href=<?php echo base_url('assets/css/myCSS.css');?> rel="stylesheet" type="text/css"/>
<script src=<?php echo base_url('assets/jquery/jquery-3.2.1.min.js');?></script>
<script src=<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?></script>


</head>
<body>
 <nav class="navbar navbar-static-top navbar-inverse">
                <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">Hlavní nadpis</a>
                </div>
               
        <?php
            $this->load->view('layout/menu_nep');
            
        ?>  
               
                  </div>
 </nav>
    <article>
        <div class="container">
                <?php
            echo $content;
                ?>
                
        </div>
 </article>
<script src='<?php echo base_url('resources/jquery/jquery.js');?>' type="text/javascript"></script>
<script src='<?php echo base_url('resources/boostrap/js/bootstrap.min.js');?>' type="text/javascript"></script>


</body>
</html>

        
        