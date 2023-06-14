<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Astraeus</title>

	<!-- External CSS link -->
	<link rel="stylesheet" href="style.css">
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

	<footer class="footer-widget">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="main-heading text-center mb-5">
                   Contact Us <br>
                    <span>Today</span>
                </h2>
                <!-- <div class="d-grid gap-2 col-6 mx-auto">
                    <a href="./sigup.html">
                        <button type="button" class="btn btn-warning btn-lg text-dark" >Sign up now</button>
                    </a>
                </div> -->
            </div>
			
            <div class="col-lg-6 mt-5">
              
			<form class="row g-3" id="contactForm">
                    <div class="col-md-6">
                        <label class="visually-hidden" for="inputName">Nom</label>
                        <input class="form-control form-livedoc-control bg-dark text-white border border-0" id="inputName" type="text" placeholder="Name" name="name" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label visually-hidden" for="inputEmail">Email</label>
                        <input class="form-control form-livedoc-control bg-dark text-white border-0" id="inputEmail" type="email" placeholder="Email" name="email" />
                    </div>
                    <div class="col-md-12">
                        <label class="form-label visually-hidden" for="validationTextarea">Message</label>
                        <textarea class="form-control form-livedoc-control bg-dark text-white border-0" id="validationTextarea" placeholder="Message" style="height: 250px;" required="required" name="message"></textarea>
                    </div>
                    <div class="col-12">
                        <div class="d-grid">
                            <button class="btn rounded-pill" style="font-weight: 900; font-style: italic; text-transform: uppercase; --bs-btn-font-size: 2rem; background-color: #f9ef23; transition: .5s; border: none;"type="submit">Send</button>
                        </div>
                    </div>
                </form>

				<div id="S8KoU8KlwrvDrDbDuFfDocK7w595w6nDnzh7w7PDiWHCsA==" class="mytuner-widget" data-target="484142" data-requires_initialization="true" data-autoplay="false" data-hidehistory="true" style="width: 100%; max-width: 100%; overflow: hidden; max-height: 500px; border-radius: 6px;"><style type="text/css"> .mytuner-widget { all: initial; display: block; color: #ffffff; } .mytuner-widget, .mytuner-widget * { box-sizing: border-box; font-family: sans-serif; } .main-play-button { padding: 5px; border-radius: 20px; width: 40px; height: 40px; float: left; margin-left: 10px; margin-right: 15px; margin-top: 12.5px; cursor: pointer; background-color: #FFF; box-shadow: 1px 2px 6px -3px black; display: inline-block; } .main-play-button:hover { background-color: #EEE; } .main-play-button.disabled { filter: grayscale(1); cursor: not-allowed; } .main-play-button div { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Play/BT_Play@2x.png") no-repeat center; background-size: 16px; width: 28px; height: 28px; margin-left: 3px; } .main-play-button.loading div { background: url("https://static2.mytuner.mobi/static/images/sprite-loading.gif") no-repeat center; filter: grayscale(1); background-size: 28px; margin-left: 2px; } .main-play-button.playing div { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Pause/BT_Pause@2x.png") no-repeat center; background-size: 16px; margin-left: 2px; } .main-play-button.error div { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Error/erro@2x.png") no-repeat center; background-size: 16px; margin-left: 0; } .play-button { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Play/BT_Play.png") no-repeat center; width: 40px; height: 40px; cursor: pointer; display: inline-flex; align-items: center; margin: auto 4px auto 19px; /* align with radio logo */ } .play-button.loading { background: url("https://static2.mytuner.mobi/static/images/sprite-loading.gif") no-repeat center; filter: grayscale(1); background-size: 28px; } .play-button.playing { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Pause/BT_Pause.png") no-repeat center; } .play-button.error { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Error/erro.png") no-repeat center; background-size: 15px; } .play-button.disabled { opacity: 0.3; } .play-button.disabled:hover { cursor: not-allowed; } input[type=range][orient=vertical] { writing-mode: bt-lr; /* IE */ -webkit-appearance: slider-vertical; /* WebKit */ width: 8px; padding: 0 5px; } .volume-controls { width: 35px; height: 35px; display: inline-block; position: absolute; margin-left: 5px; margin-top: 14px; padding-top: 0; border-radius: 20px; box-sizing: content-box !important; z-index: 10; /* animation */ border: 1px solid transparent; transition: background 0.5s, padding 0.5s, margin 0.5s, border 0.5s; overflow: hidden; } .volume-controls:hover { padding-top: 140px; /* add original margin */ margin-top: -126px; background-color: #F2F2F2; border: 1px solid grey; transition: background 0.5s, padding 0.5s, margin 0.5s; } .volume-controls:hover > .volume-control { display: block; } .volume-controls .volume-control { opacity: 0; margin-top: -126px; margin-left: 13px; position: absolute; transition: 0.5s all; } .volume-controls:hover .volume-control { opacity: 1; } .volume-controls .volume-indicator { cursor: pointer; display: block; } .player-radio-link { width: calc(100% - 65px - 84px - 37px - 12px); } .player-radio-name { width: calc(100% - 74px - 10px); } .player-mytuner-logo { margin-left: 47px; } @media (max-width: 480px) { .player-radio-link { width: calc(100% - 65px - 84px - 12px); } .player-mytuner-logo { margin-left: 10px; } .volume-controls { display: none; } } </style><div id="S8KoU8KlwrvDrDbDuFfDocK7w595w6nDnzh7w7PDiWHCsA==top-bar" style="background: rgb(52, 58, 64); height: 75px; width: 100%; display: block; padding: 5px; line-height: 65px;"><div id="S8KoU8KlwrvDrDbDuFfDocK7w595w6nDnzh7w7PDiWHCsA==play-button" class="main-play-button disabled" data-id="S8KoU8KlwrvDrDbDuFfDocK7w595w6nDnzh7w7PDiWHCsA=="><div class="play-image"></div></div><a class="player-radio-link" href="http://mytuner-radio.com/radio/fitness-radio-484142/?utm_source=widget&amp;utm_medium=player" rel="noopener" style="height: 100%; display: inline-block; line-height: 65px; cursor: pointer;"><img src="https://static2.mytuner.mobi/media/tvos_radios/MFKWkdWjLr.png" alt="Fitness Radio" style="float: left; height: 74px; margin-top: -5px; box-shadow: black 0px 0px 3px -1px;"><span class="player-radio-name" style="margin-left: 10px; color: rgb(249, 239, 35); font-weight: bold; font-size: 20px; float: left; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">Fitness Radio</span></a><div class="volume-controls"><input id="S8KoU8KlwrvDrDbDuFfDocK7w595w6nDnzh7w7PDiWHCsA==volume-control" class="volume-control slider" max="100" min="1" orient="vertical" type="range" value="100"><svg id="S8KoU8KlwrvDrDbDuFfDocK7w595w6nDnzh7w7PDiWHCsA==volume-indicator" class="volume-indicator" height="30" width="30" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="fill: grey; margin: 2px;"><path d="M3 10v4c0 .55.45 1 1 1h3l3.29 3.29c.63.63 1.71.18 1.71-.71V6.41c0-.89-1.08-1.34-1.71-.71L7 9H4c-.55 0-1 .45-1 1zm13.5 2c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 4.45v.2c0 .38.25.71.6.85C17.18 6.53 19 9.06 19 12s-1.82 5.47-4.4 6.5c-.36.14-.6.47-.6.85v.2c0 .63.63 1.07 1.21.85C18.6 19.11 21 15.84 21 12s-2.4-7.11-5.79-8.4c-.58-.23-1.21.22-1.21.85z"></path></svg></div><a class="player-mytuner-logo" href="https://mytuner-radio.com?utm_source=widget&amp;utm_medium=player" rel="noopener" style="display: inline-block; vertical-align: top;"><img src="https://mytuner-radio.com/static/icons/widgets/MyTuner_Logo/MyTunerLogo_Normal.png" alt="Listen on myTuner radio!" style="height: 36px; width: 84px; vertical-align: middle;"></a></div><ul id="S8KoU8KlwrvDrDbDuFfDocK7w595w6nDnzh7w7PDiWHCsA==song-history" data-border="0" data-bordercolor="#817f80" style="width: 100%; background-color: rgb(238, 238, 238); max-height: calc(415px); padding: 0px; margin: 0px; overflow-y: scroll;"></ul><script>
    // var widget_id = widget_id || "S8KoU8KlwrvDrDbDuFfDocK7w595w6nDnzh7w7PDiWHCsA==";
    var mytuner_scripts = mytuner_scripts || {};
    mytuner_scripts["player-v1.js_queue"] = mytuner_scripts["player-v1.js_queue"] || [];
    if (mytuner_scripts["player-v1.js-imported"] == undefined) {
        mytuner_scripts["player-v1.js-imported"] = false;
        mytuner_scripts["player-v1.js"] = function(){};
        var s = document.createElement("script");
        s.type = "text/javascript";
        s.src = "https://mytuner-radio.com/static/js/widgets/player-v1.js";
        s.defer = true;
        if (s.readyState){  //IE
            s.onreadystatechange = function(){
                if (s.readyState == "loaded" || s.readyState == "complete"){
                    s.onreadystatechange = null;
                    runQueue();
                }
            };
        } else {  //Others
            s.onload = function(){ runQueue(); };
        }
        document.getElementsByTagName('head')[0].appendChild(s);

        function runQueue() {
            mytuner_scripts["player-v1.js_queue"].forEach(function(func) {
                func();
            });
        }
        mytuner_scripts["player-v1.js_queue"].push(function(){mytuner_scripts["player-v1.js"]("S8KoU8KlwrvDrDbDuFfDocK7w595w6nDnzh7w7PDiWHCsA==")});
    } else {
        let widget = document.getElementById("S8KoU8KlwrvDrDbDuFfDocK7w595w6nDnzh7w7PDiWHCsA==");
        if (widget && widget.dataset.requires_initialization === "true") {
            if (mytuner_scripts["player-v1.js-imported"]) {
                mytuner_scripts["player-v1.js"]("S8KoU8KlwrvDrDbDuFfDocK7w595w6nDnzh7w7PDiWHCsA==");
                widget.dataset.requires_initialization = "false";
            } else {
                mytuner_scripts["player-v1.js_queue"].push(function(){
                    mytuner_scripts["player-v1.js"]("S8KoU8KlwrvDrDbDuFfDocK7w595w6nDnzh7w7PDiWHCsA==");
                    widget.dataset.requires_initialization = "false";
                });
            }
        }
    }</script><script>
    var mytuner_scripts = mytuner_scripts || {};
    if (mytuner_scripts["widget-player-v1.js-imported"] == undefined) {
        mytuner_scripts["widget-player-v1.js-imported"] = false;
        var s = document.createElement("script");
        s.type = "text/javascript";
        s.src = "https://mytuner-radio.com/static/js/widgets/widget-player-v1.js";
        s.defer = true;
        document.getElementsByTagName('head')[0].appendChild(s);
    }</script></div>
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
</body>
</html>