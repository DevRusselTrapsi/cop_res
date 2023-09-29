<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./view_css/user_view.css">
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

    <div class="container">
        
    	<div class="content">
            <div id="default">
            <p>WELCOME TO BOTOLAN ZAMBALES</p>
            </div>
    		<p id="typewriter-text">
    		</p>
    	</div>
    </div>
</div>


<script>
	// Text for the typewriter animation
const text = " YOURS TO DISCOVER!!";

// Function to simulate typing animation
function typeWriter() {
    let charIndex = 0;
    const speed = 190; // Adjust typing speed (lower value = faster)
    const typewriterText = document.getElementById("typewriter-text");
    
    function type() {
        if (charIndex < text.length) {
            typewriterText.textContent += text.charAt(charIndex);
            charIndex++;
            setTimeout(type, speed);
        } else {
            // Typing animation finished, clear the text and restart
            typewriterText.textContent = "";
            charIndex = 0;
            setTimeout(type, speed * 5); // Pause before restarting
        }
    }

    type();
}

// Start the typewriter animation when the page loads
window.addEventListener("load", typeWriter);



</script>
    <script>
    	// JavaScript to toggle the mobile navigation menu
document.querySelector('.burger').addEventListener('click', () => {
    const navLinks = document.querySelector('.nav-links');
    navLinks.classList.toggle('active');
});

    </script>
</body>
</html>
