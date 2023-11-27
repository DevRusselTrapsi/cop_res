<?php
require('../view_count.php');

session_start();

if (!isset($_SESSION['user'])) {
    // Redirect to the Home page or any other page
    header("Location: ./home.php");
    exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact</title>

   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->

<header class="header" data-aos="fade-down">

   <section class="flex">

      <a href="home.html" class="logo">Tourism</a>

      <nav class="navbar">
         <a href="./home.php">home</a>
         <a href="./about.php">about</a>
         <a href="./destinations.php">destinations</a>
         <a href="./contact.php">contact</a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </section>

</header>

<!-- header section ends -->

<!-- contact section starts  -->

<div class="container contact">

   <h1 class="heading" data-aos="zoom-out">contact us</h1>

   <section>

      <div class="row">

        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d88707.8774341114!2d120.15800555675638!3d14.963155073542556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bfa437f8d9423d%3A0x1e9df4a2f11c64c9!2sZambales%2C%20Philippines!5e0!3m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" data-aos="flip-left"></iframe>

         <form action="" method="post" data-aos="flip-right">
            <h3>get in touch</h3>
            <input type="text" name="name" required maxlength="50" placeholder="enter your name" class="box">
            <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
            <input type="number" name="number" required maxlength="10" min="0" max="9999999999" placeholder="enter your number" class="box">
            <textarea name="message" class="box" required maxlength="1000" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" name="send" class="btn">
         </form>

      </div>

      <div class="grid">

         <div class="box" data-aos="fade-up">
            <i class="fas fa-phone"></i>
            <h3>phone number</h3>
            <a href="09387951545">09387951545</a>
            <a href="09387951545">09387951545</a>
         </div>

         <div class="box" data-aos="fade-up">
            <i class="fas fa-envelope"></i>
            <h3>email address</h3>
            <a href="allandial604@gmail.com">allandial604@gmail.com</a>
            <a href="al-jaydevillas@pcb.edu.ph">al-jaydevillas@pcb.edu.ph</a>
         </div>

         <div class="box" data-aos="fade-up">
            <i class="fas fa-map-marker-alt"></i>
            <h3>office address</h3>
            <a href="#">Botolan Municipal Hall</a>
         </div>

      </div>

      <div class="credit">
         
      </div>

   </section>

</div>

<!-- contact section ends -->

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>