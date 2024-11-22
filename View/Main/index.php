<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Landing Page</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=ASSETS?>/css/bootstrap.css">
    <style>
        /* Additional custom styles */
        .hero-carousel img {
            height: 700px;
            object-fit: cover;
        }
        .numbers-section {
            background: #f8f9fa;
            padding: 50px 0;
        }
        .numbers-section .number-card {
            text-align: center;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            transition: transform 0.2s;
        }
        .numbers-section .number-card:hover {
            transform: scale(1.05);
        }
        .application-section {
            background: #0073e6;
            color: white;
            padding: 50px;
            text-align: center;
        }
        .gallery img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        footer {
            background: #0073e6;
            color: white;
            padding: 50px;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="bg-primary text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3 text-white"><?=APP_NAME?></h1>
            <nav>
                <a href="/login" class="btn btn-light">Login</a>
            </nav>
        </div>
    </header>


<!-- Hero Section with Carousel -->
<div id="heroCarousel" class="carousel slide hero-carousel" data-ride="carousel" data-interval="3000">
    <div class="carousel-inner">
        <?php
        foreach ($slides as $index => $item) {
            $active = '';
            if ($index === 2) {  // Start index for the first slide after '.' and '..'
                $active = 'active';
            }

            if ($item !== '.' && $item !== '..') {
                $ext = strtolower(pathinfo($item, PATHINFO_EXTENSION));

                if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
                    echo '<div class="carousel-item ' . $active . '">';
                    echo '<img src="' . APP_URL . '/public/slides/' . $item . '" class="d-block w-100" alt="Slide Image">';
                    echo '</div>';
                }
            }
        }
        ?>
    </div>
    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


    <!-- Hero Section for Numbers -->
    <section class="numbers-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="number-card bg-white p-3">
                        <h2>50+</h2>
                        <p>Teachers</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="number-card bg-white p-3">
                        <h2>30+</h2>
                        <p>Classes</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="number-card bg-white p-3">
                        <h2>1000+</h2>
                        <p>Students</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="number-card bg-white p-3">
                        <h2>20+</h2>
                        <p>Subjects</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Announcements Section -->
    <section class="container my-5">
        <h2 class="text-center mb-5">Recent Announcements</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Sports Day</h5>
                        <p class="card-text">Our annual sports day is scheduled for next week. All students are encouraged to participate!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">New Library Books</h5>
                        <p class="card-text">We have added over 200 new books to our library collection. Visit the library to check them out!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Section -->
    <section class="application-section bg-primary">
        <h2 class="text-white">Want to Join Our School?</h2>
        <a href="/apply" class="btn btn-light btn-lg mt-4">Apply Now</a>
    </section>

    <!-- Gallery Section -->
    <section class="container my-5">
        <h2 class="text-center mb-5">Gallery</h2>
        <div class="row">
            <?php foreach($gallery as $item) :?>

                <?php if($item !== '.' && $item !== '..') : ?>
                    <div class="col-md-4 my-3">
                        <img src="<?=PUBLIC_URL.'/gallery/'.$item;?>" class="img-fluid">
                    </div>
                 <?php endif;?>
                
            <?php endforeach;?>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-primary">
        <div class="container">
            <h2 class="text-white">About Our School</h2>
            <p>We are committed to providing quality education to all our students. Contact us for more information.</p>
            <img src="https://via.placeholder.com/100.png?text=School+Logo" alt="School Logo" class="mt-3">
        </div>
    </footer>

    <!-- Bootstrap and jQuery JavaScript -->
    <script src="<?=ASSETS?>/vendors/jquery/jquery.min.js"></script>
    <script src="<?=ASSETS?>/js/bootstrap4.min.js"></script>
</body>
</html>
