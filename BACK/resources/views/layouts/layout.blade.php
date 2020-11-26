<html>
<head lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta charset='utf-8' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='../assets/lib/main.css' rel='stylesheet' />
    <link href='../assets/css/style.css' rel='stylesheet' />
    <link rel="stylesheet" href="../css/app.css"/>
    <link rel="stylesheet" href="../css/index.css"/>
    <link href='../assets/datatables/dataTables.bootstrap4.min.css' rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body id="fundo">
<div>
    <div id="container-fluid">
       @include('templates.navbar')
        @yield('content')
    </div>
</div>


<script src='/js/jquery.dataTables.min.js'></script>
<script src='/js/dataTables.bootstrap4.min.js'></script>
<script src='/js/datatables-demo.js'></script>
<script src='../assets/lib/main.js'></script>
<script src='../assets/js/script.js'></script>
<script src='../assets/js/callendar.js'></script>
<script src='../assets/lib/locales-all.js'></script>
</body>
</html>
