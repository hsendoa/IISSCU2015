﻿<?php

session_start();
if(!isset($_SESSION['usuario'])) 
{
  header('Location: login.php'); 
  exit();
}

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- estilo para la tabla, contenidos -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/estilos.css" rel="stylesheet">
        <script src="js/responsive.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-1.2.6.js"></script>

        <title>Consultorio Odontológico ORE</title>
         <style>
            body{
                padding-top: 70px;
            }
        </style>
	<!-- mover div por sentencia class=center-block -->	
	<style type="text/css">
    .center-block {
    width:1000px;
    padding:80px;
    }
    </style>
    </head>
    <body>
    
<!-- inicio menu -->
    
     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Company</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Home</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="registros.php">Registros</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>
                        <li>
                            <a href="logout.php">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
<!-- fin  menu -->
   <div class="container">
            <h2 class="text-center">Consultorio Odontologico ORE</h2>
	    <hr>
   
          <table class="table table-hover table-bordered" align='center' width='50%'>
                        <thead>
                            <tr class="active">
                                <th>CI</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                
                                <th style="text-align: center">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <c:forEach items="${alumno}" var="alumno">
                                <tr ${alumno.facultad == "Marketing" ? 'class="warning"' : ''} ${alumno.facultad == "Analisis de Sistemas Informaticos" ? 'class="info"' : ''} ${alumno.facultad == "Administracion de Empresas" ? 'class="success"' : ''}>
                                    <td width=""></td>
                                    <td width=""></td>
                                    <td width=""></td>
                                    <td width="" align='center'>
					<a class="btn btn-default btn-sm" href="">
						<img src="imagen/editar.png" width=25; height=25;></a></a>
					<a class="btn btn-default btn-sm" href="">
						<img src="imagen/borrar.png" width=25; height=25;></a></a></td>
                                </tr>
                            </c:forEach> 
                        </tbody>
                    </table>
		    <span class="glyphicon glyphicon-pencil" ><a href="registros.php">volver<<</a>
			</div>
                            
                            </div>
                        </div>
   
                        </div>
                    </form>
                </div>
            </div>
                            
	    
	    
                            <div class="row" style="margin-bottom: 50px">
                                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 3px">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
        </div>
	<hr>
	    <div class="container">
            <h3 class="text-center">OdontoSyst © 2015</h3>
    </body>
</html>