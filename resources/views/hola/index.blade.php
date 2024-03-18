@extends('master')
@section ('body')
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .navbar {
        background-color: #333;
        overflow: hidden;
    }

    .navbar a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 20px;
        text-decoration: none;
    }

    .openbtn {
        font-size: 20px;
        cursor: pointer;
        background-color: #333;
        color: white;
        padding: 10px 15px;
        border: none;
    }

    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenav a {
        padding: 10px 15px;
        text-decoration: none;
        font-size: 18px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    main {
        margin-left: 250px; /* Agrega un margen izquierdo igual al ancho del sidenav */
        transition: margin-left 0.5s; /* Agrega una transición suave al abrir/cerrar el sidenav */
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }
</style>
</head>
<body>

<div class="navbar">
    <button class="openbtn" onclick="openNav()">☰ Menú</button>
</div>
<main>

<div class="content">
  <section class="row mb-4">
    <div class="col-3 text-center">
      <div class="card border-secondary "style="margin-top: 10">
        <div class="card-body" >
          <h3>3</h3>
          <p>Personal total</p>
        </div>
      </div>
    </div>
    <div class="col-3 text-center">
      <div class="card border-secondary" style="margin-top: 10">
        <div class="card-body">
          <p>9</p>
          <p>Productes totals</p>
        </div>
      </div>
    </div>
    <div class="col-3 text-center">
      <div class="card border-secondary" style="margin-top: 10">
        <div class="card-body">
          <p>5</p>
          <p>Projectes totals</p>
        </div>
      </div>
    </div>
    <div class="col-3 text-center">
      <div class="card border-secondary" style="margin-top: 10">
        <div class="card-body">
          <p>10</p>
          <p>Departaments totals</p>
        </div>
      </div>
    </div>
  </section>

  <section class="row mb-4">
  <div class="col-md-6">
  <a href="#">
    <div class="card border-primary">
      <img src="img/personal.svg" class="card-img-top" alt="Personal">
      <div class="card-body">
        <h3>Notes</h3>
        <div class="overflow-auto" style="max-height: 220px;">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Título de la Nota</th>
                <th>Enviado por</th>
                <th>Enviado a</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <!-- Agrega más filas según sea necesario -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </a>
</div>


    <div class="col-md-6">
    <a href="#">
    <div class="card border-primary">
      <img src="img/personal.svg" class="card-img-top" alt="Personal">
      <div class="card-body">
        <h3>Nomines</h3>
        <div class="overflow-auto" style="max-height: 220px;">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Título de la Nota</th>
                <th>Enviado por</th>
                <th>Enviado a</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <!-- Agrega más filas según sea necesario -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </a>
    </div>
  </section>

  <section class="row mb-4">
    <div class="col-md-6">
    <a href="#">
    <div class="card border-primary">
      <img src="img/personal.svg" class="card-img-top" alt="Personal">
      <div class="card-body">
        <h3>Notes</h3>
        <div class="overflow-auto" style="max-height: 220px;">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Título de la Nota</th>
                <th>Enviado por</th>
                <th>Enviado a</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <!-- Agrega más filas según sea necesario -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </a>
    </div>
    <div class="col-md-6">
    <a href="#">
    <div class="card border-primary">
      <img src="img/personal.svg" class="card-img-top" alt="Personal">
      <div class="card-body">
        <h3>Notes</h3>
        <div class="overflow-auto" style="max-height: 220px;">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Título de la Nota</th>
                <th>Enviado por</th>
                <th>Enviado a</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <tr>
                <td>123</td>
                <td>Título de la nota</td>
                <td>Nombre del remitente</td>
                <td>Nombre del destinatario</td>
                <td>Pendiente</td>
              </tr>
              <!-- Agrega más filas según sea necesario -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </a>
    </div>
  </section>
</div>
</main>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">Enlace 1</a>
    <a href="#">Enlace 2</a>
    <a href="#">Enlace 3</a>
</div>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.querySelector("main").style.marginLeft = "250px"; // Agrega un margen izquierdo al abrir el sidenav
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.querySelector("main").style.marginLeft = "0"; // Elimina el margen izquierdo al cerrar el sidenav
    }
</script>

</body>
</html>

