<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTamuWebApp</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
    <style>
        /* Custom Styles */
        .container {
            background-color: #9075f;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
            box-shadow: 0px 4px 12px 12px rgba(0, 0, 0, 0.1);
            max-height: 100vh;
            overflow: hidden;
        }
        .table-wrapper {
            max-height: 400px;
            overflow-y: auto;
            margin-top: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th {
            background-color: #1A535C;
            color: #fff;
            text-align: center;
            padding: 10px;
        }
        .table td {
            padding: 10px;
            vertical-align: middle;
            text-align: center;
        }
        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table-hover tbody tr:hover {
            background-color: #ddd;
        }
        .btn-primary,
        .btn-warning,
        .btn-danger {
            margin-right: 5px;
        }
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .alert {
            margin-top: 20px;
            font-weight: bold;
        }
        .btn {
            padding: 5px 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand bg-light rounded text-primary p-2" href="{{ route('home') }}">DataTamu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('posts.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Logout</a>
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
