<?php

mysql_connect('localhost','root','admin')or die ('Ha fallado la conexión: '.mysql_error());

mysql_select_db('turnos_odon')or die ('Error al seleccionar la Base de Datos: '.mysql_error());
  

$usuario = htmlspecialchars($_POST["admin"]);   
$password = htmlspecialchars($_POST["password_usuario"]);
 

$result = mysql_query("SELECT * FROM usuario WHERE nick= '".mysql_real_escape_string($usuario)."'");
 

if($row = mysql_fetch_array($result))
{     

 if($row["password"] == $password)
 {

  session_start();  

  $_SESSION['usuario'] = $usuario;  

  header("Location: index.php");  
 }
 else
 {
 
  ?>
   <script languaje="javascript">
    alert("Usuario o Contraseña Incorrecta");
    location.href = "login.php";
   </script>
  <?php
             
 }
}
else
{

?>
 <script languaje="javascript">
  alert("Usuario o Contraseña Incorrecta");
  location.href = "login.php";
 </script>
<?php 
         
}
 

mysql_free_result($result);
 

mysql_close();
?>