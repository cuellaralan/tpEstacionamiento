
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">
<?php 
session_start();
if(isset($_SESSION['registrado'])){  ?>
    <div class="container">

      <form class="form-ingreso" onsubmit="GuardarCD();return false">
        <h2 class="form-ingreso-heading">CD</h2>
        <label for="titulo" class="sr-only">Titulo</label>
        <input type="text"  minlength="6"  id="patente" name="patente" title="Se necesita una patente"  class="form-control" placeholder="ingrese patente" required="" autofocus="">
       <input readonly   type="hidden"    id="idCD" class="form-control" >
       
        <button  class="btn btn-lg btn-success btn-block" type="submit"><span class="glyphicon glyphicon-floppy-save">&nbsp;&nbsp;</span>Guardar </button>
     
      </form>

      

    </div> <!-- /container -->

  <?php }else{    echo"<h3>usted no esta logeado. </h3>";?>         
   
  <?php  }  ?>
    
  
