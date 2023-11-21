<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body id=forget>
<nav>
        <ul id=navbar>
        <label class="logo">DESIGN</label>
            <li class=list><a href="home.php">Home</a></li>
            <li class=list><a href="about.php">About Us</a></li>
            <li class=list><a href="contact.php">Contact</a></li>
            <li class=list><a href="services.php">Services</a></li>
            <li class=list><a href="#">Feedback</a></li>
        </ul>
    </nav>
<div class="shadow">
<div class="container">
    <h2>Password Reset</h2>

    <!-- Password Reset Form -->
    <form action="/reset_password" method="post">
        <!-- Email Input -->
        <label for="email">Email:</label>
        <input type="email" placeholder="Enter Your Email:" name="email" class="form-control" required>

        <!-- New Password Input -->
        <label for="newPassword">New Password:</label>
        <input type="password" placeholder="Enter Your New password:" name="new password" class="form-control" required>

        <!-- Confirm New Password Input -->
        <label for="confirmPassword">Confirm New Password:</label>
        <input type="password" placeholder="Confirm New Password:" name="Confirm New Password" class="form-control" required>

        <!-- Submit Button -->
        <button type="submit" >Reset Password</button>
       
    </form>
   <button> <a href="login.php">Login</a></button>
    </div>
    </div>
   
</body>
</html>
