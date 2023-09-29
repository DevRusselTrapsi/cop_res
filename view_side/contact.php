<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./view_css/contact.css">
    <title>Responsive Navigation Bar</title>
</head>
<body style="background-image: url('../assets/img/background.jpg');">
    <nav>
       <div class="logo"><img src="../assets/img/tourism.jpg"></div>
        <ul class="nav-links">
            <li><a href="./user_index.php">Home</a></li>
            <li><a href="./bnpool.php">Gallery</a></li>
            <li><a href="./search.php">Search Resort</a></li>
            <li><a href="./about.php">About</a></li>
            <li><a href="./contact.php">Contact</a></li>
        </ul>
        <div class="burger">&#9776;</div>
    </nav>

    <div class="content">
        
    </div>





    <script>
    	// JavaScript to toggle the mobile navigation menu
document.querySelector('.burger').addEventListener('click', () => {
    const navLinks = document.querySelector('.nav-links');
    navLinks.classList.toggle('active');
});

    </script>
</body>
</html>
