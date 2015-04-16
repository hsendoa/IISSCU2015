<?php

mysql_connect('localhost','root','')or die ('Ha fallado la conexión: '.mysql_error());

mysql_select_db('reserva_turno')or die ('Error al seleccionar la Base de Datos: '.mysql_error());
  

$usuario = $_POST["admin"];   
$password = $_POST["password_usuario"];
 

$result = mysql_query("SELECT * FROM administradores WHERE nombre_administrador = '$usuario'");
 

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
    alert("Contraseña Incorrecta");
    location.href = "login.php";
   </script>
  <?php
             
 }
}
else
{

?>
 <script languaje="javascript">
  alert("El nombre de usuario es incorrecto!");
  location.href = "login.php";
 </script>
<?php 
         
}
 

mysql_free_result($result);
 

mysql_close();
?>