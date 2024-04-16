

<head>
    <title>ERP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
    <style>
        body {
            margin-left: 0px;
            transition: margin-left 0.5s;
            background-color: #115571;

        }
        main{
            padding: 20px;
        }
        .navbar {
            background-color: #FFFFFF;
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
        .dropdown-toggle{
            color: black !important;
            background-color: grey !important;
        }



    </style>
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<div class="navbar" style="position: relative; z-index: 1;">
    <button class="openbtn" onclick="openNav()">☰ Menú</button>
    <form id="languageForm" method="POST" action="">
        @csrf
        <select id="idioma" name="idioma" onchange="cambiarIdioma()" style="margin-left: 1050px !important; margin-top: 10px !important">
        <option value="es" {{ session('idioma') === 'es' ? 'selected' : '' }}>🇪🇦 Español</option>
        <option value="en" {{ session('idioma') === 'en' ? 'selected' : '' }}>🇬🇧 English</option>
            <option value="ca" {{ session('idioma') === 'ca' ? 'selected' : '' }}>🇦🇩 Català</option>
        </select>
    </form>



    <div class="dropdown" style="margin-right: 10px; z-index: 100;">

<button class="btn btn-secondary dropdown-toggle" style="margin-right: 100px" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    {{ Auth::user()->name }}
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
<li><a class="dropdown-item" style="color: black;" href="{{ route('profile.edit') }}">{{ __('perfil.profile') }}</a></li>

    <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="dropdown-item" style="align-content: center" type="submit">{{ __('perfil.log_out') }}</button>
        </form>
    </li>
</ul>
</div>
</div>

    <div id="mySidenav" class="sidenav">
        <img src="media/gazepa-removebg-preview.png" alt="Logo" style="width: 80px; margin-top: -45;margin-left: 60px;">
        <a href="javascript:void(0)" style="margin-top: 11px;" class="closebtn" onclick="closeNav()">&times;</a>

        <a href="{{ route('indexPrincipal') }}">{{ __('master.dashboard') }}</a>
        <a href="{{ route('personal') }}">{{ __('master.personal') }}</a>
        <a href="{{ route('clientes.index') }}">{{ __('master.customers') }}</a>
        <a href="{{ route('ventas.index') }}">{{ __('master.sales') }}</a>
        <a href="{{ route('producte.index') }}">{{ __('master.products') }}</a>
        <a href="#">{{ __('master.budgets') }}</a>
        <a href="{{ route('compras.index') }}">{{ __('master.buys') }}</a>
        <a href="{{ route('venedors.index') }}">{{ __('master.seller') }}</a>

    </div>
    <main >


        @yield('content')
    </main>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.querySelector("main").style.marginLeft = "250px"; // Agrega un margen izquierdo al abrir el sidenav
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.querySelector("main").style.marginLeft = "0"; // Elimina el margen izquierdo al cerrar el sidenav
        }
        function cambiarIdioma() {
        var select = document.getElementById("idioma");
        var idioma = select.options[select.selectedIndex].value;
        document.getElementById("languageForm").action = "{{ route('cambiar-idioma', '') }}/" + idioma;
        document.getElementById("languageForm").submit();
    }

    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

</body>
</html>
