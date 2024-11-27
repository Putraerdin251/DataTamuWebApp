<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title', $title)</title>
    <style>
        body{
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        
        .container{
            height: 80rem;
            flex: 1;
            
        }

        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 1rem;
        }
    </style>
</head>

<body>
<nav class=" navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand bg-light rounded text-primary p-2" href="{{ route('register') }}">DataTamu</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Registrasi</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <div class="container">
        @yield('content')
    </div>
<footer class="mt-5 text-light bg-primary text-center min-height font-monospace">
    Di Buat Oleh "pklsmkn2subang (Feri A,Ira N,Meysha A,M.Putra E.Tami Ayu A,Wafa Habibah H),Okt 2024"
</footer>
</body>

</html>