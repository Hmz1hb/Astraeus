<?php
session_start();


if (!isset($_SESSION['user_id'])) {
  // Redirect to login page
  header('Location: ./login.php');
  exit(); // Important: stop executing the rest of the script
}

$userId = $_SESSION['user_id']; 


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Live radio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="./dashboard.css" rel="stylesheet">
  </head>
  <body class="bg-dark text-light">
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="text-center logo navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"><span>Astraeus</span></a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search" disabled>
      <div class="navbar-nav">
        <div class="nav-item text-nowrap">
          <a class="nav-link px-3" href="./signout.php">Sign out</a>
        </div>
      </div>
    </header>

    <div class="container-fluid">  
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
          <div class="position-sticky pt-3 sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./UserInt.php">
                  <span data-feather="home" class="align-text-bottom"></span>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./PersonalSpace.php">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  Personal Wellbeing
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="./BFP.php">
                  <i class="fa fa-calculator" aria-hidden="true"></i>
                  Body Fat Percentage
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./Exercises.php">
                  <i class="fas fa-light fa-dumbbell align-text-bottom"></i>
                  Exercise Tutorials
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="./radio.php">
                  <i class="fa fa-music" aria-hidden="true"></i>
                  Live Radio
                </a>
              </li>
            </ul>

          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Live 24h Fitness Music</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
          </div>
          <div id="S8KoU8KlwrvDrDbDuFfDocK7w595w6nDnzh7w7PDiWHCsA==" class="mytuner-widget mt-5" data-target="484142" data-requires_initialization="true" data-autoplay="false" data-hidehistory="true" style="width: 100%; max-width: 100%; overflow: hidden; max-height: 500px; border-radius: 6px;">
    <style type="text/css">
        .mytuner-widget { all: initial; display: block; color: #ffffff; } .mytuner-widget, .mytuner-widget * { box-sizing: border-box; font-family: sans-serif; } .main-play-button { padding: 5px; border-radius: 20px; width: 40px; height: 40px; float: left; margin-left: 10px; margin-right: 15px; margin-top: 12.5px; cursor: pointer; background-color: #FFF; box-shadow: 1px 2px 6px -3px black; display: inline-block; } .main-play-button:hover { background-color: #EEE; } .main-play-button.disabled { filter: grayscale(1); cursor: not-allowed; } .main-play-button div { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Play/BT_Play@2x.png") no-repeat center; background-size: 16px; width: 28px; height: 28px; margin-left: 3px; } .main-play-button.loading div { background: url("https://static2.mytuner.mobi/static/images/sprite-loading.gif") no-repeat center; filter: grayscale(1); background-size: 28px; margin-left: 2px; } .main-play-button.playing div { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Pause/BT_Pause@2x.png") no-repeat center; background-size: 16px; margin-left: 2px; } .main-play-button.error div { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Error/erro@2x.png") no-repeat center; background-size: 16px; margin-left: 0; } .play-button { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Play/BT_Play.png") no-repeat center; width: 40px; height: 40px; cursor: pointer; display: inline-flex; align-items: center; margin: auto 4px auto 19px; /* align with radio logo */ } .play-button.loading { background: url("https://static2.mytuner.mobi/static/images/sprite-loading.gif") no-repeat center; filter: grayscale(1); background-size: 28px; } .play-button.playing { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Pause/BT_Pause.png") no-repeat center; } .play-button.error { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Error/erro.png") no-repeat center; background-size: 15px; } .play-button.disabled { opacity: 0.3; } .play-button.disabled:hover { cursor: not-allowed; } input[type=range][orient=vertical] { writing-mode: bt-lr; /* IE */ -webkit-appearance: slider-vertical; /* WebKit */ width: 8px; padding: 0 5px; } .volume-controls { width: 35px; height: 35px; display: inline-block; position: absolute; margin-left: 5px; margin-top: 14px; padding-top: 0; border-radius: 20px; box-sizing: content-box !important; z-index: 10; /* animation */ border: 1px solid transparent; transition: background 0.5s, padding 0.5s, margin 0.5s, border 0.5s; overflow: hidden; } .volume-controls:hover { padding-top: 140px; /* add original margin */ margin-top: -126px; background-color: #F2F2F2; border: 1px solid grey; transition: background 0.5s, padding 0.5s, margin 0.5s; } .volume-controls:hover > .volume-control { display: block; } .volume-controls .volume-control { opacity: 0; margin-top: -126px; margin-left: 13px; position: absolute; transition: 0.5s all; } .volume-controls:hover .volume-control { opacity: 1; } .volume-controls .volume-indicator { cursor: pointer; display: block; } .player-radio-link { width: calc(100% - 65px - 84px - 37px - 12px); } .player-radio-name { width: calc(100% - 74px - 10px); } .player-mytuner-logo { margin-left: 47px; } @media (max-width: 480px) { .player-radio-link { width: calc(100% - 65px - 84px - 12px); } .player-mytuner-logo { margin-left: 10px; } .volume-controls { display: none; } } 
    </style>
    <div id="S8KoU8KlwrvDrDbDuFfDocK7w595w6nDnzh7w7PDiWHCsA==top-bar" style="background: rgb(52, 58, 64); height: 75px; width: 100%; display: block; padding: 5px; line-height: 65px;">
        <div id="S8KoU8KlwrvDrDbDuFfDocK7w595w6nDnzh7w7PDiWHCsA==play-button" class="main-play-button disabled" data-id="S8KoU8KlwrvDrDbDuFfDocK7w595w6nDnzh7w7PDiWHCsA==">
            <div class="play-image"></div>
        </div><a class="player-radio-link" href="http://mytuner-radio.com/radio/fitness-radio-484142/?utm_source=widget&amp;utm_medium=player" rel="noopener" style="height: 100%; display: inline-block; line-height: 65px; cursor: pointer;"><img src="https://static2.mytuner.mobi/media/tvos_radios/MFKWkdWjLr.png" alt="Fitness Radio" style="float: left; height: 74px; margin-top: -5px; box-shadow: black 0px 0px 3px -1px;"><span class="player-radio-name" style="margin-left: 10px; color: rgb(249, 239, 35); font-weight: bold; font-size: 20px; float: left; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">Fitness Radio</span></a>
        <div class="volume-controls"><input id="S8KoU8KlwrvDrDbDuFfDocK7w595w6nDnzh7w7PDiWHCsA==volume-control" class="volume-control slider" max="100" min="1" orient="vertical" type="range" value="100"><svg id="S8KoU8KlwrvDrDbDuFfDocK7w595w6nDnzh7w7PDiWHCsA==volume-indicator" class="volume-indicator" height="30" width="30" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="fill: grey; margin: 2px;">
                <path d="M3 10v4c0 .55.45 1 1 1h3l3.29 3.29c.63.63 1.71.18 1.71-.71V6.41c0-.89-1.08-1.34-1.71-.71L7 9H4c-.55 0-1 .45-1 1zm13.5 2c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 4.45v.2c0 .38.25.71.6.85C17.18 6.53 19 9.06 19 12s-1.82 5.47-4.4 6.5c-.36.14-.6.47-.6.85v.2c0 .63.63 1.07 1.21.85C18.6 19.11 21 15.84 21 12s-2.4-7.11-5.79-8.4c-.58-.23-1.21.22-1.21.85z"></path>
            </svg></div>
    </div>
    <ul id="S8KoU8KlwrvDrDbDuFfDocK7w595w6nDnzh7w7PDiWHCsA==song-history" data-border="0" data-bordercolor="#817f80" style="width: 100%; background-color: rgb(238, 238, 238); max-height: calc(415px); padding: 0px; margin: 0px; overflow-y: scroll;"></ul>
    <script>
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
        }
    </script>
    <script>
        var mytuner_scripts = mytuner_scripts || {};
        if (mytuner_scripts["widget-player-v1.js-imported"] == undefined) {
            mytuner_scripts["widget-player-v1.js-imported"] = false;
            var s = document.createElement("script");
            s.type = "text/javascript";
            s.src = "https://mytuner-radio.com/static/js/widgets/widget-player-v1.js";
            s.defer = true;
            document.getElementsByTagName('head')[0].appendChild(s);
        }
    </script>




<div id="MD80ZsK+w4FGLmnDu1haQ8Kkw5orw65pwr8peg==" class="mytuner-widget mt-3" data-target="445973" data-requires_initialization="true" data-autoplay="false" data-hidehistory="true" style="width: 100%; max-width: 100%; overflow: hidden; max-height: 700px; border-radius: 6px;"><style type="text/css"> .mytuner-widget { all: initial; display: block; color: #ffffff; } .mytuner-widget, .mytuner-widget * { box-sizing: border-box; font-family: sans-serif; } .main-play-button { padding: 5px; border-radius: 20px; width: 40px; height: 40px; float: left; margin-left: 10px; margin-right: 15px; margin-top: 12.5px; cursor: pointer; background-color: #FFF; box-shadow: 1px 2px 6px -3px black; display: inline-block; } .main-play-button:hover { background-color: #EEE; } .main-play-button.disabled { filter: grayscale(1); cursor: not-allowed; } .main-play-button div { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Play/BT_Play@2x.png") no-repeat center; background-size: 16px; width: 28px; height: 28px; margin-left: 3px; } .main-play-button.loading div { background: url("https://static2.mytuner.mobi/static/images/sprite-loading.gif") no-repeat center; filter: grayscale(1); background-size: 28px; margin-left: 2px; } .main-play-button.playing div { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Pause/BT_Pause@2x.png") no-repeat center; background-size: 16px; margin-left: 2px; } .main-play-button.error div { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Error/erro@2x.png") no-repeat center; background-size: 16px; margin-left: 0; } .play-button { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Play/BT_Play.png") no-repeat center; width: 40px; height: 40px; cursor: pointer; display: inline-flex; align-items: center; margin: auto 4px auto 19px; /* align with radio logo */ } .play-button.loading { background: url("https://static2.mytuner.mobi/static/images/sprite-loading.gif") no-repeat center; filter: grayscale(1); background-size: 28px; } .play-button.playing { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Pause/BT_Pause.png") no-repeat center; } .play-button.error { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Error/erro.png") no-repeat center; background-size: 15px; } .play-button.disabled { opacity: 0.3; } .play-button.disabled:hover { cursor: not-allowed; } input[type=range][orient=vertical] { writing-mode: bt-lr; /* IE */ -webkit-appearance: slider-vertical; /* WebKit */ width: 8px; padding: 0 5px; } .volume-controls { width: 35px; height: 35px; display: inline-block; position: absolute; margin-left: 5px; margin-top: 14px; padding-top: 0; border-radius: 20px; box-sizing: content-box !important; z-index: 10; /* animation */ border: 1px solid transparent; transition: background 0.5s, padding 0.5s, margin 0.5s, border 0.5s; overflow: hidden; } .volume-controls:hover { padding-top: 140px; /* add original margin */ margin-top: -126px; background-color: #F2F2F2; border: 1px solid grey; transition: background 0.5s, padding 0.5s, margin 0.5s; } .volume-controls:hover > .volume-control { display: block; } .volume-controls .volume-control { opacity: 0; margin-top: -126px; margin-left: 13px; position: absolute; transition: 0.5s all; } .volume-controls:hover .volume-control { opacity: 1; } .volume-controls .volume-indicator { cursor: pointer; display: block; } .player-radio-link { width: calc(100% - 65px - 84px - 37px - 12px); } .player-radio-name { width: calc(100% - 74px - 10px); } .player-mytuner-logo { margin-left: 47px; } @media (max-width: 480px) { .player-radio-link { width: calc(100% - 65px - 84px - 12px); } .player-mytuner-logo { margin-left: 10px; } .volume-controls { display: none; } } </style><div id="MD80ZsK+w4FGLmnDu1haQ8Kkw5orw65pwr8peg==top-bar" style="background: rgb(52, 58, 96); height: 75px; width: 100%; display: block; padding: 5px; line-height: 65px;"><div id="MD80ZsK+w4FGLmnDu1haQ8Kkw5orw65pwr8peg==play-button" class="main-play-button disabled" data-id="MD80ZsK+w4FGLmnDu1haQ8Kkw5orw65pwr8peg=="><div class="play-image"></div></div><a class="player-radio-link" href="http://mytuner-radio.com/radio/energy-fitness-445973/?utm_source=widget&amp;utm_medium=player" rel="noopener" target="_blank" style="height: 100%; display: inline-block; line-height: 65px; cursor: pointer;"><img src="https://static2.mytuner.mobi/media/tvos_radios/pefpapk2p5cv.png" alt="ENERGY Fitness" style="float: left; height: 74px; margin-top: -5px; box-shadow: black 0px 0px 3px -1px;"><span class="player-radio-name" style="margin-left: 10px; color: rgb(249, 239, 35); font-weight: bold; font-size: 20px; float: left; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">ENERGY Fitness</span></a><div class="volume-controls"><input id="MD80ZsK+w4FGLmnDu1haQ8Kkw5orw65pwr8peg==volume-control" class="volume-control slider" max="100" min="1" orient="vertical" type="range" value="100"><svg id="MD80ZsK+w4FGLmnDu1haQ8Kkw5orw65pwr8peg==volume-indicator" class="volume-indicator" height="30" width="30" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="fill: grey; margin: 2px;"><path d="M3 10v4c0 .55.45 1 1 1h3l3.29 3.29c.63.63 1.71.18 1.71-.71V6.41c0-.89-1.08-1.34-1.71-.71L7 9H4c-.55 0-1 .45-1 1zm13.5 2c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 4.45v.2c0 .38.25.71.6.85C17.18 6.53 19 9.06 19 12s-1.82 5.47-4.4 6.5c-.36.14-.6.47-.6.85v.2c0 .63.63 1.07 1.21.85C18.6 19.11 21 15.84 21 12s-2.4-7.11-5.79-8.4c-.58-.23-1.21.22-1.21.85z"></path></svg></div></div><ul id="MD80ZsK+w4FGLmnDu1haQ8Kkw5orw65pwr8peg==song-history" data-border="0" data-bordercolor="#817f80" style="width: 100%; background-color: rgb(238, 238, 238); max-height: calc(615px); padding: 0px; margin: 0px; overflow-y: scroll;"></ul><script>
    // var widget_id = widget_id || "MD80ZsK+w4FGLmnDu1haQ8Kkw5orw65pwr8peg==";
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
        mytuner_scripts["player-v1.js_queue"].push(function(){mytuner_scripts["player-v1.js"]("MD80ZsK+w4FGLmnDu1haQ8Kkw5orw65pwr8peg==")});
    } else {
        let widget = document.getElementById("MD80ZsK+w4FGLmnDu1haQ8Kkw5orw65pwr8peg==");
        if (widget && widget.dataset.requires_initialization === "true") {
            if (mytuner_scripts["player-v1.js-imported"]) {
                mytuner_scripts["player-v1.js"]("MD80ZsK+w4FGLmnDu1haQ8Kkw5orw65pwr8peg==");
                widget.dataset.requires_initialization = "false";
            } else {
                mytuner_scripts["player-v1.js_queue"].push(function(){
                    mytuner_scripts["player-v1.js"]("MD80ZsK+w4FGLmnDu1haQ8Kkw5orw65pwr8peg==");
                    widget.dataset.requires_initialization = "false";
                });
            }
        }
    }
	</script>
	<script>
    var mytuner_scripts = mytuner_scripts || {};
    if (mytuner_scripts["widget-player-v1.js-imported"] == undefined) {
        mytuner_scripts["widget-player-v1.js-imported"] = false;
        var s = document.createElement("script");
        s.type = "text/javascript";
        s.src = "https://mytuner-radio.com/static/js/widgets/widget-player-v1.js";
        s.defer = true;
        document.getElementsByTagName('head')[0].appendChild(s);
    }
	</script>
	</div>

  <div id="Y293wq5iVsKkIiXCpUxBdUxlw5PCsj3DsDV+" class="mytuner-widget mt-3" data-target="439796" data-requires_initialization="true" data-autoplay="false" data-hidehistory="false" style="width: 100%; max-width: 100%; overflow: hidden; max-height: 500px; border: 1px solid rgb(129, 127, 128); border-radius: 6px;"><style type="text/css"> .mytuner-widget { all: initial; display: block; color: #3D3D3D; } .mytuner-widget, .mytuner-widget * { box-sizing: border-box; font-family: sans-serif; } .main-play-button { padding: 5px; border-radius: 20px; width: 40px; height: 40px; float: left; margin-left: 10px; margin-right: 15px; margin-top: 12.5px; cursor: pointer; background-color: #FFF; box-shadow: 1px 2px 6px -3px black; display: inline-block; } .main-play-button:hover { background-color: #EEE; } .main-play-button.disabled { filter: grayscale(1); cursor: not-allowed; } .main-play-button div { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Play/BT_Play@2x.png") no-repeat center; background-size: 16px; width: 28px; height: 28px; margin-left: 3px; } .main-play-button.loading div { background: url("https://static2.mytuner.mobi/static/images/sprite-loading.gif") no-repeat center; filter: grayscale(1); background-size: 28px; margin-left: 2px; } .main-play-button.playing div { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Pause/BT_Pause@2x.png") no-repeat center; background-size: 16px; margin-left: 2px; } .main-play-button.error div { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Error/erro@2x.png") no-repeat center; background-size: 16px; margin-left: 0; } .play-button { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Play/BT_Play.png") no-repeat center; width: 40px; height: 40px; cursor: pointer; display: inline-flex; align-items: center; margin: auto 4px auto 19px; /* align with radio logo */ } .play-button.loading { background: url("https://static2.mytuner.mobi/static/images/sprite-loading.gif") no-repeat center; filter: grayscale(1); background-size: 28px; } .play-button.playing { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Pause/BT_Pause.png") no-repeat center; } .play-button.error { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Error/erro.png") no-repeat center; background-size: 15px; } .play-button.disabled { opacity: 0.3; } .play-button.disabled:hover { cursor: not-allowed; } input[type=range][orient=vertical] { writing-mode: bt-lr; /* IE */ -webkit-appearance: slider-vertical; /* WebKit */ width: 8px; padding: 0 5px; } .volume-controls { width: 35px; height: 35px; display: inline-block; position: absolute; margin-left: 5px; margin-top: 14px; padding-top: 0; border-radius: 20px; box-sizing: content-box !important; z-index: 10; /* animation */ border: 1px solid transparent; transition: background 0.5s, padding 0.5s, margin 0.5s, border 0.5s; overflow: hidden; } .volume-controls:hover { padding-top: 140px; /* add original margin */ margin-top: -126px; background-color: #F2F2F2; border: 1px solid grey; transition: background 0.5s, padding 0.5s, margin 0.5s; } .volume-controls:hover > .volume-control { display: block; } .volume-controls .volume-control { opacity: 0; margin-top: -126px; margin-left: 13px; position: absolute; transition: 0.5s all; } .volume-controls:hover .volume-control { opacity: 1; } .volume-controls .volume-indicator { cursor: pointer; display: block; } .player-radio-link { width: calc(100% - 65px - 84px - 37px - 12px); } .player-radio-name { width: calc(100% - 74px - 10px); } .player-mytuner-logo { margin-left: 47px; } @media (max-width: 480px) { .player-radio-link { width: calc(100% - 65px - 84px - 12px); } .player-mytuner-logo { margin-left: 10px; } .volume-controls { display: none; } } </style><div id="Y293wq5iVsKkIiXCpUxBdUxlw5PCsj3DsDV+top-bar" style="background: rgb(249, 240, 240); height: 75px; width: 100%; display: block; padding: 5px; line-height: 65px;"><div id="Y293wq5iVsKkIiXCpUxBdUxlw5PCsj3DsDV+play-button" class="main-play-button disabled" data-id="Y293wq5iVsKkIiXCpUxBdUxlw5PCsj3DsDV+"><div class="play-image"></div></div><a class="player-radio-link" href="http://mytuner-radio.com/radio/open-fm-fitness-439796/?utm_source=widget&amp;utm_medium=player" rel="noopener" target="_blank" style="height: 100%; display: inline-block; line-height: 65px; cursor: pointer;"><img src="https://static2.mytuner.mobi/media/tvos_radios/yltvvg4phy38.png" alt="Astreaus Radio" style="float: left; height: 74px; margin-top: -5px; box-shadow: black 0px 0px 3px -1px;"><span class="player-radio-name" style="margin-left: 10px; color: rgb(61, 61, 61); font-weight: bold; font-size: 20px; float: left; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">Astreaus Radio</span></a><div class="volume-controls"><input id="Y293wq5iVsKkIiXCpUxBdUxlw5PCsj3DsDV+volume-control" class="volume-control slider" max="100" min="1" orient="vertical" type="range" value="100"><svg id="Y293wq5iVsKkIiXCpUxBdUxlw5PCsj3DsDV+volume-indicator" class="volume-indicator" height="30" width="30" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="fill: grey; margin: 2px;"><path d="M3 10v4c0 .55.45 1 1 1h3l3.29 3.29c.63.63 1.71.18 1.71-.71V6.41c0-.89-1.08-1.34-1.71-.71L7 9H4c-.55 0-1 .45-1 1zm13.5 2c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 4.45v.2c0 .38.25.71.6.85C17.18 6.53 19 9.06 19 12s-1.82 5.47-4.4 6.5c-.36.14-.6.47-.6.85v.2c0 .63.63 1.07 1.21.85C18.6 19.11 21 15.84 21 12s-2.4-7.11-5.79-8.4c-.58-.23-1.21.22-1.21.85z"></path></svg></div><a class="player-mytuner-logo" href="https://mytuner-radio.com?utm_source=widget&amp;utm_medium=player" rel="noopener" target="_blank" style="display: inline-block; vertical-align: top;"></a></div><ul id="Y293wq5iVsKkIiXCpUxBdUxlw5PCsj3DsDV+song-history" data-border="1" data-bordercolor="#817f80" style="width: 100%; background-color: rgb(238, 238, 238); max-height: calc(415px); padding: 0px; margin: 0px; overflow-y: scroll;"></ul><script>
    // var widget_id = widget_id || "Y293wq5iVsKkIiXCpUxBdUxlw5PCsj3DsDV+";
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
        mytuner_scripts["player-v1.js_queue"].push(function(){mytuner_scripts["player-v1.js"]("Y293wq5iVsKkIiXCpUxBdUxlw5PCsj3DsDV+")});
    } else {
        let widget = document.getElementById("Y293wq5iVsKkIiXCpUxBdUxlw5PCsj3DsDV+");
        if (widget && widget.dataset.requires_initialization === "true") {
            if (mytuner_scripts["player-v1.js-imported"]) {
                mytuner_scripts["player-v1.js"]("Y293wq5iVsKkIiXCpUxBdUxlw5PCsj3DsDV+");
                widget.dataset.requires_initialization = "false";
            } else {
                mytuner_scripts["player-v1.js_queue"].push(function(){
                    mytuner_scripts["player-v1.js"]("Y293wq5iVsKkIiXCpUxBdUxlw5PCsj3DsDV+");
                    widget.dataset.requires_initialization = "false";
                });
            }
        }
    }
    </script>
    <script>
    var mytuner_scripts = mytuner_scripts || {};
    if (mytuner_scripts["widget-player-v1.js-imported"] == undefined) {
        mytuner_scripts["widget-player-v1.js-imported"] = false;
        var s = document.createElement("script");
        s.type = "text/javascript";
        s.src = "https://mytuner-radio.com/static/js/widgets/widget-player-v1.js";
        s.defer = true;
        document.getElementsByTagName('head')[0].appendChild(s);
    }
    </script>
    </div>

   

    <div id="YCFPeUbDicO0OMKpLsO1dMOnw4k1w43DkUNZw45Z" class="mytuner-widget mt-3" data-target="447520" data-requires_initialization="true" data-autoplay="false" data-hidehistory="false" style="width: 100%; max-width: 100%; overflow: hidden; max-height: 500px; border: 1px solid rgb(129, 127, 128); border-radius: 6px;"><style type="text/css"> .mytuner-widget { all: initial; display: block; color: #3D3D3D; } .mytuner-widget, .mytuner-widget * { box-sizing: border-box; font-family: sans-serif; } .main-play-button { padding: 5px; border-radius: 20px; width: 40px; height: 40px; float: left; margin-left: 10px; margin-right: 15px; margin-top: 12.5px; cursor: pointer; background-color: #FFF; box-shadow: 1px 2px 6px -3px black; display: inline-block; } .main-play-button:hover { background-color: #EEE; } .main-play-button.disabled { filter: grayscale(1); cursor: not-allowed; } .main-play-button div { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Play/BT_Play@2x.png") no-repeat center; background-size: 16px; width: 28px; height: 28px; margin-left: 3px; } .main-play-button.loading div { background: url("https://static2.mytuner.mobi/static/images/sprite-loading.gif") no-repeat center; filter: grayscale(1); background-size: 28px; margin-left: 2px; } .main-play-button.playing div { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Pause/BT_Pause@2x.png") no-repeat center; background-size: 16px; margin-left: 2px; } .main-play-button.error div { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Error/erro@2x.png") no-repeat center; background-size: 16px; margin-left: 0; } .play-button { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Play/BT_Play.png") no-repeat center; width: 40px; height: 40px; cursor: pointer; display: inline-flex; align-items: center; margin: auto 4px auto 19px; /* align with radio logo */ } .play-button.loading { background: url("https://static2.mytuner.mobi/static/images/sprite-loading.gif") no-repeat center; filter: grayscale(1); background-size: 28px; } .play-button.playing { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Pause/BT_Pause.png") no-repeat center; } .play-button.error { background: url("https://mytuner-radio.com/static/icons/widgets/BT_Error/erro.png") no-repeat center; background-size: 15px; } .play-button.disabled { opacity: 0.3; } .play-button.disabled:hover { cursor: not-allowed; } input[type=range][orient=vertical] { writing-mode: bt-lr; /* IE */ -webkit-appearance: slider-vertical; /* WebKit */ width: 8px; padding: 0 5px; } .volume-controls { width: 35px; height: 35px; display: inline-block; position: absolute; margin-left: 5px; margin-top: 14px; padding-top: 0; border-radius: 20px; box-sizing: content-box !important; z-index: 10; /* animation */ border: 1px solid transparent; transition: background 0.5s, padding 0.5s, margin 0.5s, border 0.5s; overflow: hidden; } .volume-controls:hover { padding-top: 140px; /* add original margin */ margin-top: -126px; background-color: #F2F2F2; border: 1px solid grey; transition: background 0.5s, padding 0.5s, margin 0.5s; } .volume-controls:hover > .volume-control { display: block; } .volume-controls .volume-control { opacity: 0; margin-top: -126px; margin-left: 13px; position: absolute; transition: 0.5s all; } .volume-controls:hover .volume-control { opacity: 1; } .volume-controls .volume-indicator { cursor: pointer; display: block; } .player-radio-link { width: calc(100% - 65px - 84px - 37px - 12px); } .player-radio-name { width: calc(100% - 74px - 10px); } .player-mytuner-logo { margin-left: 47px; } @media (max-width: 480px) { .player-radio-link { width: calc(100% - 65px - 84px - 12px); } .player-mytuner-logo { margin-left: 10px; } .volume-controls { display: none; } } </style><div id="YCFPeUbDicO0OMKpLsO1dMOnw4k1w43DkUNZw45Ztop-bar" style="background: rgb(249, 240, 240); height: 75px; width: 100%; display: block; padding: 5px; line-height: 65px;"><div id="YCFPeUbDicO0OMKpLsO1dMOnw4k1w43DkUNZw45Zplay-button" class="main-play-button disabled" data-id="YCFPeUbDicO0OMKpLsO1dMOnw4k1w43DkUNZw45Z"><div class="play-image"></div></div><a class="player-radio-link" href="http://mytuner-radio.com/radio/d-gym-fitness-d-hotel-maris-447520/?utm_source=widget&amp;utm_medium=player" rel="noopener" target="_blank" style="height: 100%; display: inline-block; line-height: 65px; cursor: pointer;"><img src="https://static2.mytuner.mobi/media/tvos_radios/vzuqsxebr2au.png" alt="Astreaus Radio" style="float: left; height: 74px; margin-top: -5px; box-shadow: black 0px 0px 3px -1px;"><span class="player-radio-name" style="margin-left: 10px; color: rgb(61, 61, 61); font-weight: bold; font-size: 20px; float: left; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">Astreaus Radio</span></a><div class="volume-controls"><input id="YCFPeUbDicO0OMKpLsO1dMOnw4k1w43DkUNZw45Zvolume-control" class="volume-control slider" max="100" min="1" orient="vertical" type="range" value="100"><svg id="YCFPeUbDicO0OMKpLsO1dMOnw4k1w43DkUNZw45Zvolume-indicator" class="volume-indicator" height="30" width="30" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="fill: grey; margin: 2px;"><path d="M3 10v4c0 .55.45 1 1 1h3l3.29 3.29c.63.63 1.71.18 1.71-.71V6.41c0-.89-1.08-1.34-1.71-.71L7 9H4c-.55 0-1 .45-1 1zm13.5 2c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 4.45v.2c0 .38.25.71.6.85C17.18 6.53 19 9.06 19 12s-1.82 5.47-4.4 6.5c-.36.14-.6.47-.6.85v.2c0 .63.63 1.07 1.21.85C18.6 19.11 21 15.84 21 12s-2.4-7.11-5.79-8.4c-.58-.23-1.21.22-1.21.85z"></path></svg></div><a class="player-mytuner-logo" href="https://mytuner-radio.com?utm_source=widget&amp;utm_medium=player" rel="noopener" target="_blank" style="display: inline-block; vertical-align: top;"></a></div><ul id="YCFPeUbDicO0OMKpLsO1dMOnw4k1w43DkUNZw45Zsong-history" data-border="1" data-bordercolor="#817f80" style="width: 100%; background-color: rgb(238, 238, 238); max-height: calc(415px); padding: 0px; margin: 0px; overflow-y: scroll;"></ul><script>
    // var widget_id = widget_id || "YCFPeUbDicO0OMKpLsO1dMOnw4k1w43DkUNZw45Z";
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
        mytuner_scripts["player-v1.js_queue"].push(function(){mytuner_scripts["player-v1.js"]("YCFPeUbDicO0OMKpLsO1dMOnw4k1w43DkUNZw45Z")});
    } else {
        let widget = document.getElementById("YCFPeUbDicO0OMKpLsO1dMOnw4k1w43DkUNZw45Z");
        if (widget && widget.dataset.requires_initialization === "true") {
            if (mytuner_scripts["player-v1.js-imported"]) {
                mytuner_scripts["player-v1.js"]("YCFPeUbDicO0OMKpLsO1dMOnw4k1w43DkUNZw45Z");
                widget.dataset.requires_initialization = "false";
            } else {
                mytuner_scripts["player-v1.js_queue"].push(function(){
                    mytuner_scripts["player-v1.js"]("YCFPeUbDicO0OMKpLsO1dMOnw4k1w43DkUNZw45Z");
                    widget.dataset.requires_initialization = "false";
                });
            }
        }
    }
    </script>
    <script>
    var mytuner_scripts = mytuner_scripts || {};
    if (mytuner_scripts["widget-player-v1.js-imported"] == undefined) {
        mytuner_scripts["widget-player-v1.js-imported"] = false;
        var s = document.createElement("script");
        s.type = "text/javascript";
        s.src = "https://mytuner-radio.com/static/js/widgets/widget-player-v1.js";
        s.defer = true;
        document.getElementsByTagName('head')[0].appendChild(s);
    }
    </script></div>





        </main>
        
      </div>
    </div>
    <script>
    

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script> -->
    <script src="dashboard.js"></script>
   
  </body>
</html>
