@extends('master')
@section ('body')
<style>
body {
  font-family: "Lato", sans-serif;
  background-color: #115571;
  overflow-x: hidden; /* Evita el desplazamiento horizontal */
}

/* Estilo para el sidebar */
.sidenav {
  height: 100%;
  width: 20%; /* Ancho del sidebar */
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #fff; /* Fondo semi-transparente */
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

/* Estilo para los enlaces del sidebar */
.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #000000; /* Color de texto blanco */
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #87CEFA;
}

/* Estilo para el contenido principal */
.content {
  margin-left: 20%; /* Ancho del sidebar */
  padding: 16px;
  background-color: #115571;
}

/* Estilo para el botón de abrir */
.openbtn {
  font-size: 30px;
  cursor: pointer;
}

/* Estilo para el fondo semi-transparente */
.overlay {
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
#itemsNav {
  display: flex;
  justify-content: center;
  margin-right: 30px;
}

#itemsNav a {
  font-size: 1.5rem !; /* Tamaño de fuente inicial */
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  color: #000000;
  display: flex;
  transition: 0.3s;
}


.closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
  cursor: pointer;
  color: #818181;
}
#logoGACELA{
  display:flex;
  justify-content:center;
  margin-right:30px;
}
</style>
@endsection

@section('content')
<div id="mySidenav" class="sidenav">
  <a id="logoGACELA">
    <img src="media/gazepa-removebg-preview.png" class="card-img-top" alt="Sol·licituds de personal">
  </a>
  <a href="#" id="itemsNav">DASHBOARD</a>
  <a href="#"  id="itemsNav">PERSONAL</a>
  <a href="#" id="itemsNav">CLIENT</a>
  <a href="#" id="itemsNav">VENTAS</a>
  <a href="#" id="itemsNav">PRODUCTES I SERVEIS</a>
  <a href="#" id="itemsNav">MANTENIMENT</a>
  <a href="#" id="itemsNav">PRESSUPOSTOS</a>
  <a href="#" id="itemsNav">STOCK I INVENTARI</a>
  <a href="#" id="itemsNav">NOTIFICACION</a>
  <a href="#" id="itemsNav">COMPRES</a>
</div>

<div class="content">
  <h1>Hola Mr. Blai</h1>
</div>

<div class="content">
  <section class="row mb-4">
    <div class="col-3 text-center">
      <div class="card border-secondary">
        <div class="card-body">
          <p>3</p>
          <p>Personal total</p>
        </div>
      </div>
    </div>
    <div class="col-3 text-center">
      <div class="card border-secondary">
        <div class="card-body">
          <p>9</p>
          <p>Productes totals</p>
        </div>
      </div>
    </div>
    <div class="col-3 text-center">
      <div class="card border-secondary">
        <div class="card-body">
          <p>5</p>
          <p>Projectes totals</p>
        </div>
      </div>
    </div>
    <div class="col-3 text-center">
      <div class="card border-secondary">
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
@endsection
