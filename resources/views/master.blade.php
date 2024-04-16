

<head>
    <title>ERP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

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
            background-color: white !important;
        }
        .dropdown-menu-lang{
           border-radius: 7px !important;
           height: 46px !important;
           margin-top: 15px !important;
        }


    </style>
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<div class="navbar" style="position: relative; z-index: 1;">
    <button class="openbtn" onclick="openNav()">☰ Menú</button>
    <form id="languageForm" method="POST"  action="">
        @csrf
        <select id="idioma" name="idioma" class="dropdown-menu-lang" onchange="cambiarIdioma()" style="margin-left: 1050px !important; margin-top: 15px !important">
        <option value="es" {{ session('idioma') === 'es' ? 'selected' : '' }}>🇪🇦 Español</option>
        <option value="en" {{ session('idioma') === 'en' ? 'selected' : '' }}>🇬🇧 English</option>
            <option value="ca" {{ session('idioma') === 'ca' ? 'selected' : '' }}>🇦🇩 Català</option>
        </select>
    </form>


    <div class="dropdown" style="margin-right: 10px; z-index: 100;">
    @php
    $user = Auth::user();
@endphp

<button class="btn btn-secondary dropdown-toggle" style="margin-right: 80px" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    <div style="display: inline-flex; align-items: center;">
        @if($user->ruta)
        <img src="{{ asset('Media/' . $user->ruta) }}" width="26" height="26" style="margin-right: 5px; border-radius: 50%;" />

        @else
            <span>{{ __('productes.Noimage') }}</span>
        @endif
        <span style="margin-left: 5px">{{ $user->name }}</span>
    </div>
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


<div id="mySidenav" hidden>
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-68 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
        <img src="media/gazepa-removebg-preview.png" alt="Logo" style="width: 80px; margin-top: -45;margin-left: 90px;">
        <br>
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
         <li>
            <a style="text-decoration: none;" href="{{ route('indexPrincipal') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
               </svg>
               <span class="ms-3">{{ __('master.dashboard') }}</span>
            </a>
         </li>
         <li>
            <a style="text-decoration: none;" href="{{ route('personal') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                  <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">{{ __('master.personal') }}</span>
               <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-green-800 bg-green-100 rounded-full dark:bg-green-900 dark:text-green-300">1</span>

                    </a>
         </li>
         <li>
            <a style="text-decoration: none;" href="{{ route('clientes.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                   <path d="M16 0H4a2 2 0 0 0-2 2v1H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4.5a3 3 0 1 1 0 6 3 3 0 0 1 0-6ZM13.929 17H7.071a.5.5 0 0 1-.5-.5 3.935 3.935 0 1 1 7.858 0 .5.5 0 0 1-.5.5Z"/>
            </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">{{ __('master.customers') }}</span>
               </a>
         </li>
         <li>
            <a style="text-decoration: none;" href="{{ route('ventas.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                  <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                  <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">{{ __('master.sales') }}</span>
            </a>
         </li>
         <li>
            <a style="text-decoration: none;" href="{{ route('producte.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                  <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">{{ __('master.products') }}</span>
            </a>
         </li>
         <li>
            <a style="text-decoration: none;" href="{{ route('invoices.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                 <path d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z"/>
            </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">{{ __('master.budgets') }}</span>
            </a>
         </li>
         <li>
            <a style="text-decoration: none;" href="{{ route('compras.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                  <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                  <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
               </svg>

               <span class="flex-1 ms-3 whitespace-nowrap">{{ __('master.buys') }}</span>
            </a>
         </li>
         <li>
            <a style="text-decoration: none;" href="{{ route('venedors.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                  <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">{{ __('master.seller') }}</span>
            </a>
         </li>
        <li>
            <a style="text-decoration: none;" href="javascript:void(0)"  onclick="closeNav()"  class="closebtn flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
</svg>


               <span  class="flex-1 ms-3 whitespace-nowrap">{{ __('master.close') }}</span>
            </a>
         </li>
         </ul>
        </div>
    </aside>
</div>

    <!-- <div id="mySidenav" class="sidenav">
        <img src="media/gazepa-removebg-preview.png" alt="Logo" style="width: 80px; margin-top: -45;margin-left: 60px;">
        <a href="javascript:void(0)" style="margin-top: 11px;" class="closebtn" onclick="closeNav()">&times;</a>

        <a href="{{ route('indexPrincipal') }}">{{ __('master.dashboard') }}</a>
        <a href="{{ route('personal') }}">{{ __('master.personal') }}</a>
        <a href="{{ route('clientes.index') }}">{{ __('master.customers') }}</a>
        <a href="{{ route('ventas.index') }}">{{ __('master.sales') }}</a>
        <a href="{{ route('producte.index') }}">{{ __('master.products') }}</a>
        <a href="{{ route('invoices.index') }}">{{ __('master.budgets') }}</a>
        <a href="{{ route('compras.index') }}">{{ __('master.buys') }}<i class="fi fi-rr-shopping-cart"></i></a>
        <a href="{{ route('venedors.index') }}">{{ __('master.seller') }}</a>

    </div> -->
    <main >


        @yield('content')
    </main>

    <script>
        function openNav() {
            document.getElementById("mySidenav").removeAttribute("hidden");

            document.querySelector("main").style.marginLeft = "260px"; // Agrega un margen izquierdo al abrir el sidenav
        }

        function closeNav() {
            document.getElementById("mySidenav").setAttribute("hidden", true);
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
