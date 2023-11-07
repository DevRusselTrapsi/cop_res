<?php
require('../view_count.php');

session_start();

$_SESSION['user'] = 'loggedInUser'; // You can set this to any value you like
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body style="overflow: hidden;">
   
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

<!-- home section starts  -->

<div class="container home" data-aos="zoom-out">

   <section class="flex" data-aos="zoom-in" data-aos-delay="600">

      <form action="" method="post">
         <h3>welcome to botolan zambales</h3>
         
        <h1>Yours To Discover</h1>
      </form>

   </section>

</div>

<!-- home section ends -->















<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>