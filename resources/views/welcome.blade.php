<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My E-commerce Website</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #007bff;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <a class="navbar-brand text-white" href="#">E-Shopping</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('login')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('register')}}">Register</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container d-flex align-items-center justify-content-center" style="height: 80vh;">
        <div class="row align-items-center">
            <div class="col-md-6 text-center">
                <img src="{{ asset('shop.png') }}" alt="Welcome Image" class="img-fluid">
            </div>
            <div class="col-md-6 text-center">
                <h1>Selamat datang di E-Shopping</h1>
                <p>Tempat terbaik untuk memilih tempat belanja online</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center py-3">
        <div class="container">
            <p>&copy; 2024 Semua hak cipta dilindungi.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
