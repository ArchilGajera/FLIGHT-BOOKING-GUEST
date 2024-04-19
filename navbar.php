<?php
include_once("connection.php");
$url = $_SERVER['REQUEST_URI'];
?>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php" style="color:white;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutus.php" style="color: white;">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php" style="color: white;">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login.php" style="color: white;">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php" style="color: white;">Sign Up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

