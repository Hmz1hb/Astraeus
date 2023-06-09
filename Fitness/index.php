<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Astraeus</title>

	<!-- External CSS link -->
	<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	

	<!-- Ionicons icon -->
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>
<body>
	<div class="hero-bg"></div>
	<section class="hero">
		<div class="container">		
			<nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong">
				<div class="container-fluid">
					<div class="logo me-5">WITH <span>Astraeus</span></div>
					<button
					class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fas fa-bars"></i>
					</button>
					<div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link logo active " aria-current="page" href="#OUR FITNESS COMPANION">OUR FITNESS COMPANION</a>
						</li>
						<li class="nav-item">
							<a class="nav-link logo active " aria-current="page" href="#WHAT WE OFFER">WHAT WE OFFER</a>
						</li>
						<li class="nav-item">
							<a class="nav-link logo active " aria-current="page" href="#">WHAT WE OFFER</a>
						</li>
						</ul>
					</div>
				</div>
			</nav>
			<video autoplay loop muted>
				<source src="./img/Untitled video - Made with Clipchamp.mp4" type="video/mp4">
				Your browser does not support the video tag.
			</video>
			<div class="content">
				<h2 class="main-heading text-center">Be your <span>best</span></h2>
				<h4 class="para-line white text-center"> Astraeus: Empowering your fitness journey. Customized tools, workout plans, tutorials, and recipes for a healthier lifestyle. </h4>
				<div class="d-grid gap-2 mx-auto">
					<a href="./sigup.php">
					<button type="button" class="btn btn-warning btn-lg text-dark mt-5" style= " font-weight: 900; font-style: italic;
					text-transform: uppercase;  --bs-btn-font-size: 2rem; background-color: #f9ef23; transition: .5s; border: none;">Sign up now</button></a>
				</div>
			</div>
		</div>
	</section>

	<section class="about bg-black">
		<div class="container" id="OUR FITNESS COMPANION">
			<div class="row">
				<div class="col about-content">
					<h2 class="heading text-center">Your Fitness Companion</h2>
						<p class="para-line white text-center"> Discover Astraeus, your ultimate fitness companion. Our website offers personalized services including calorie and macros calculators, tailored workout plans, informative tutorials, and nutritious meal recipes. Start your fitness journey with us today. </p>
					<div class="d-grid gap-2 col-6 mx-auto">
						<button type="button" class="btn btn-warning btn-lg text-dark" style= " font-weight: 900; font-style: italic;
						text-transform: uppercase;  --bs-btn-font-size: 2rem; background-color: #f9ef23; transition: .5s; border: none;">Learn more</button>
					</div>
				</div>
				<div class="col-lg-7 col-md-12 about-img">
					<img src="img/about.png" alt="About image" class="aboutImg">
				</div>
			</div>
		</div>
	</section>

	<section class="offer bg-dark">
		<div class="container-lg" id="WHAT WE OFFER">
			<h2 class="heading">What we offer</h2>
			<p class="sub-heading white">
				We're committed to bringing you the best workout experience.
			</p>

			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="offer-card offer-tour">
						<h2 class="offer-name">
							All the Workouts <br> in One Place
						</h2>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="offer-card offer-classes">
						<h2 class="offer-name">
							Bulking Recipes & Tips <br>
							With one Click
						</h2>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="offer-card offer-training">
						<h2 class="offer-name">
							Your Complete <br>
							Fitness Profile
						</h2>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="testimonial bg-dark">
		<div class="container-lg">
			<h2 class="heading text-center">
				What they say
			</h2>

			<div class="row">
				<div class=" col-lg-4 col-md-6 ">
					<div class="review-card">
						<div class="author-pic author-pic-a"></div>
						<div class="review-content">
							<p class="review para-line">
								Astraeus has been a game-changer in my fitness journey. With their personalized workout plans and comprehensive tools, I've achieved remarkable results. Highly recommended!
							</p>
							<p class="author-name">Donna Bleaker, 31</p>
						</div>
					</div>
				</div>
				<div class=" col-lg-4 col-md-6">
					<div class="review-card">
						<div class="author-pic author-pic-b"></div>
						<div class="review-content">
							<p class="review para-line">
								I can't thank Astraeus enough for their calorie and macros calculators. It's made tracking my nutrition effortless and helped me reach my weight loss goals. Thank you!
							</p>
							<p class="author-name">Lauren Cross, 28</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="review-card">
						<div class="author-pic author-pic-c"></div>
						<div class="review-content">
							<p class="review para-line">
								The personal space feature on Astraeus is a game-changer. It allows me to easily track my progress, store my workout plans, and access all my fitness data in one place. It's been an invaluable tool in my fitness journey.
							</p>
							<p class="author-name">Thomas Xue, 44</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="footer-widget">
	<div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="main-heading text-center mb-5">
                    Contact Us <br>
                    <span>Today</span>
                </h2>
            </div>
            <div class="col-lg-6 mt-5">
				<form id="contactForm" >      
					<input name="name" id="inputEmail" type="text" id="inputName" class="feedback-input" placeholder="Name" />   
					<input name="email" type="text" class="feedback-input" placeholder="Email" />
					<textarea name="message" id="validationTextarea" class="feedback-input" placeholder="Comment"></textarea>
					<button class="btn rounded-pill" style="font-weight: 900; font-style: italic; text-transform: uppercase; --bs-btn-font-size: 2rem; background-color: #f9ef23; transition: .5s; border: none;"type="submit">Send</button>
				</form>
            </div>
        </div>
    </div>

	<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="myModalLabel">Message Status</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
</section>
	<footer class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="address">
						<h2 class="contact-heading">
							Mailing address
						</h2>
						<p class="contact-para-line">
							somewhere
						</p>
					</div>
				</div>
				<div class="col">
					<div class="mail">
						<h2 class="contact-heading">
							Email address
						</h2>
						<p class="contact-para-line">
							contact-us@Astraeus.com
						</p>
					</div>
				</div>
				<div class="col">
					<div class="number">
						<h2 class="contact-heading">
							Phone number
						</h2>
						<p class="contact-para-line">
							(+212)690 012 136
						</p>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<script>

$(document).ready(function() {
            $("#contactForm").submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: 'mail.php', // Change this to your PHP script URL
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        // Fill the modal body with the response
                        $('#myModal .modal-body').html(response);

                        // Show the modal
                        $('#myModal').modal('show');
                    }
                });
            });
        });

</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
</body>
</html>