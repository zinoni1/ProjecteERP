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
  width: 250px; /* Ancho del sidebar */
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
  color: #f1f1f1;
}

/* Estilo para el contenido principal */
.content {
  margin-left: 250px; /* Ancho del sidebar */
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

/* Estilo para el botón de cerrar */
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
  <a id="logoGACELA"><img src="media/gazepa-removebg-preview.png" class="card-img-top" alt="Sol·licituds de personal">
</a>
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
<div class="content" > <section class="row mb-4">
      <div class="col-12">
        <h2>Gazepa</h2>
        <h3>Sistema ERP</h3>
      </div>
    </section>
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
    <section class="row">
      <div class="col-md-4 col-sm-6 col-12 mb-3">
        <a href="#">
          <div class="card border-primary">
            <img src="img/personal.svg" class="card-img-top" alt="Personal">
            <div class="card-body">
              <h3>Personal</h3>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 col-sm-6 col-12 mb-3">
        <a href="#">
          <div class="card border-info">
            <img src="img/nominas.svg" class="card-img-top" alt="Nòmines">
            <div class="card-body">
              <h3>Nòmines</h3>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 col-sm-6 col-12 mb-3">
        <a href="#">
          <div class="card border-warning">
            <img src="media/solicitudes.svg" class="card-img-top" alt="Sol·licituds de personal">
            <div class="card-body">
              <h3>Sol·licituds de personal</h3>
            </div>
          </div>
        </a>
      </div>
      <div class="card border-dark mb-3" style="max-width: 18rem;">
  <div class="card-header">Personal total</div>
  <div class="card-body text-dark">
    <h4 class="card-title">3</h4>
    <p class="card-text">Personal total</p>
  </div>
</div>
<div class="card border-dark mb-3" style="max-width: 18rem;">
<div class="card-header">Productes totals</div>
  <div class="card-body text-dark">
    <h4 class="card-title">9</h4>
    <p class="card-text">Productes totals</p>
  </div>
</div>
<div class="card border-dark mb-3" style="max-width: 18rem;">
<div class="card-header">Projectes totals</div>
  <div class="card-body text-dark">
    <h4 class="card-title">9</h4>
    <p class="card-text">Projectes totals</p>
  </div>
</div>

@endsection
