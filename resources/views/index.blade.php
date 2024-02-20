@extends('master')

@section('content')
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
  background-color: #F0F8FF;
  overflow-x: hidden; /* Evita el desplazamiento horizontal */
}

/* Estilo para el sidebar */
.sidenav {
  height: 100%;
  width: 250px; /* Ancho del sidebar */
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgba(255, 127, 80, 0.9); /* Fondo semi-transparente */
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

/* Estilo para los enlaces del sidebar */
.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #fff; /* Color de texto blanco */
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

/* Estilo para el contenido principal */
.content {
  margin-left: 250px; /* Ancho del sidebar */
  padding: 16px;
}

/* Estilo para el botón de abrir */
.openbtn {
  font-size: 30px;
  cursor: pointer;
}

/* Estilo para el fondo semi-transparente */
.overlay {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 0;
  top: 0;
  left: 0;
  background-color: rgba(0, 0, 0, 0.5); /* Fondo semi-transparente */
  overflow-x: hidden;
  transition: 0.5s;
}

.overlay-content {
  position: relative;
  top: 25%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
}

/* Estilo para el botón de cerrar */
.closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
  cursor: pointer;
  color: #818181;
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="#">DASHBOARD</a>
  <a href="#">PERSONAL</a>
  <a href="#">CLIENT</a>
  <a href="#">VENTAS</a>
  <a href="#">PRODUCTES I SERVEIS</a>
  <a href="#">MANTENIMENT</a>
  <a href="#">PRESSUPOSTOS</a>
  <a href="#">STOCK I INVENTARI</a>
  <a href="#">NOTIFICACION</a>
  <a href="#">COMPRES</a>
</div>

<div class="content">
  <H1>Hola Mr. Blai</h1>
  
</div>


   
</body>
@endsection
