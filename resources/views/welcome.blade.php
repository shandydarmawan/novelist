<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Novelist | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="/users/css/bootstrap.min.css">
    <link rel="stylesheet" href="/users/css/font-awesome.min.css">
    <link rel="stylesheet" href="/users/css/elegant-icons.css">
    <link rel="stylesheet" href="/users/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/users/css/slicknav.min.css">
    <link rel="stylesheet" href="/users/css/style.css">

    <style>
        body {
            background: #0b0c10;
            color: #fff;
        }
        .novel-card img {
            border-radius: 6px;
        }
        .novel-title {
            font-size: 0.85rem;
            margin-top: 6px;
            text-align: center;
        }
        .section-title h4 {
            color: #fff;
            font-weight: 600;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<header class="header bg-dark">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#">
                <img src="/users/img/logo.png" alt="logo" height="30">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Explore</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Genre</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Library</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<!-- HERO / BANNER -->
<section class="hero py-4">
    <div class="container">
        <div class="hero__items set-bg rounded"
             data-setbg="/users/img/hero/hero-1.jpg"
             style="height:260px;">
        </div>
    </div>
</section>

<!-- POPULAR NOVEL -->
<section class="product spad">
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="section-title">
                    <h4>Novel Populer</h4>
                </div>
            </div>
        </div>

        <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-3">

            <!-- CARD -->
            <div class="col">
                <div class="novel-card">
                    <a href="#">
                        <img src="/users/img/anime/anime-1.jpg" class="img-fluid">
                    </a>
                    <div class="novel-title">Dragon Quest</div>
                </div>
            </div>

          

        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="footer bg-dark py-4 mt-5">
    <div class="container text-center">
        <p class="mb-0 text-muted">
            © 2026 Novelist — Web Novel Platform
        </p>
    </div>
</footer>

<!-- JS -->
<script src="/users/js/jquery-3.3.1.min.js"></script>
<script src="/users/js/bootstrap.min.js"></script>
<script src="/users/js/jquery.slicknav.js"></script>
<script src="/users/js/owl.carousel.min.js"></script>
<script src="/users/js/main.js"></script>

</body>
</html>
