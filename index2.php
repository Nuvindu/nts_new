<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main1.css">
  <title>Nurse Training School</title>
</head>
<body>
  <!-- Header -->
  <section id="header">
    <div class="header container" style="background-color:yellow;">
    <div class="logo" style="float:left;">
			<img src="./img/logo-0.png" alt="Logo" style="width:90%;">
        </div>
      <div class="nav-bar">
      
        <div class="brand">
          <a href="#hero"><h1><span>N</span>urses <span>T</span>raining <span>S</span>chool </h1></a>
          <br><div class="name">
			
		
		</div>	
		
        </div>
        <div class="nav-list">
          <div class="hamburger"><div class="bar"></div></div>
          <ul>
            <li><a href="#hero" data-after="Home">Home</a></li>
            <li><a href="#about" data-after="About">About</a></li>
            <li><a href="#contact" data-after="Contact">Contact</a></li>
			      <li><a href="login.php">Login</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->


  <!-- Hero Section  -->
  <section id="hero">
    <div class="hero container">
	<div class="intro clearfix" >
		<div class="introimage clearfix" >
			<img src="img/nts.jpg" alt="nts" style="padding-top:15%;width:100%;">
		</div>
		<div class="introtext">
      <br>
			<h4>Our Mission</h4>
			<p>"to facilitate the development f an eficient, effective, knowledgeable,creative and forward lookingnurses to serve health care system of the country."</p>
      <br>
      <h4>Our Vission</h4>
			<p>"to be the best nursing school in Sri Lanka by providin well organized training for the students."</p>
		</div>
	</div>
    </div>
  </section>
  <!-- End Hero Section  -->

  

  <!-- About Section -->
  <section id="about">
    <div class="about container">
      <div class="col-left">
        <div class="about-img">
          <img src="img/operation.jpg" alt="img" >
          <img src="img/nursing.jfif" alt="img" >
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title">About <span>Us</span></h1>
        <h2>We Secure Health</h2>
        <p>Formal nursing education was started in 1939 in Sri Lanka at Nurses training school (NTS) in Colombo. Thereafter, it was expanded to 17 other Schools of Nursing throughout the country conferring a basic Diploma in Nursing.
        Nts Galle offers a 3 year diploma program.Twenty different modules are included in the program. Academic staff consists with qualified lecturers.
        We train nurses for state hospitals and other state health institutions. There is a principal for each NTS.
        NTS is the best place where you can gain both theoritical and practical knowledge at the same time.
      </p>
        
      </div>
    </div>
  </section>
  <!-- End About Section -->

  <!-- Contact Section -->
  <section id="contact">
    <div class="contact container">
      <div><h1 class="section-title">Contact <span>info</span></h1></div>
      <div class="contact-items">
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png"/></div>
          <div class="contact-info">
            <h1>Phone</h1>
            <h2> 0912234452</h2>
            
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png"/></div>
          <div class="contact-info">
            <h1>Email</h1>
            <h2>nts-galle@gov.lk</h2>
            
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png"/></div>
          <div class="contact-info">
            <h1>Address</h1>
            <h2>Nurses Training School, Mahamodara, Galle, Sri Lanka</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact Section -->

  <!-- Footer -->
  <section id="footer">
    <div class="footer container">
      <div class="brand"><h1><span>N</span>urses <span>T</span>raining <span>S</span>chool</h1></div>
      <h2>Learning Management System</h2>
      <div class="social-icon">
        <div class="social-item">
          <a href="https://www.facebook.com/pages/category/College---University/College-Of-Nursing-Galle-194022190708654/"><img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png"/></a>
        </div>
        
        <div class="social-item">
          <a href="https://maps.google.lk/maps/ms?gl=lk&ptab=2&ie=UTF8&oe=UTF8&msa=0&msid=211602232416828735618.0004b5d3f3705261ef07d"><img src="https://img.icons8.com/bubbles/100/000000/map.png"/></a>
        </div>
      </div>
      <p>Copyright © 2020 UOM. All rights reserved</p>
    </div>
  </section>
  <!-- End Footer -->
  <script src="js/app.js"></script>
</body>
</html>
