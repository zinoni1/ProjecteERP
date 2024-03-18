<!DOCTYPE html>
<html lang="en">

<head>
    <title>ERP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
        <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .navbar {
        background-color: #FFFFFF;
        overflow: hidden;
    }

    .navbar a {
        float: left;
        display: block;
        color: #FFFFFF;
        text-align: center;
        padding: 14px 20px;
        text-decoration: none;
    }

    .openbtn {
        font-size: 20px;
        cursor: pointer;
        background-color: #FFFFFF;
        color: black;
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
        background-color: #FFFFFF;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenav a {
        padding: 10px 15px;
        text-decoration: none;
        font-size: 18px;
        color: #000000;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #115571;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    main {
        margin-left: 0px;
        transition: margin-left 0.5s;
        background-color: #115571;
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }
</style>
</head>
<div id="mySidenav" class="sidenav">
    <img src="media/gazepa-removebg-preview.png" alt="Logo" style="width: 80px; margin-top: -45;margin-left: 60px;">
    <a href="javascript:void(0)" style="margin-top: 11px;" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">DASHBOARD</a>
    <a href="#">PERSONAL</a>
    <a href="#">CLIENT</a>
    <a href="#">VENTAS</a>
    <a href="#">PRODUCTES I SERVEIS</a>
    <a href="#">MANTENIMENT</a>
    <a href="#">PRESSUPOSTOS</a>
    <a href="#">STOCK I INVENTARI</a>
    <a href="#">NOTIFICACIÓ</a>
    <a href="#">COMPRES</a>
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

<body>
    @yield('body')

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>
