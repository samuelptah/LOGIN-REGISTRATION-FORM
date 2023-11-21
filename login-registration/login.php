<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class=box>
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
  <div class="cointainer">
    <?php
    if (isset($_POST["login"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
          require_once "database.php";
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $user =mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user){
            
            if (password_verify($password, $user["password"])) {
                echo "<div class='alert alert-success'>You have successfully logged in</div>";
                header("location:index.php");
               
                die();
            }
            
            else{
                echo "<div class='alert alert-danger'>Password does not match</div>";
            }
        }
        else{
            echo "<div class='alert alert-danger'>Email does not match</div>";
        }
    }
    ?>
    <div class="cointainer">
    <form action = "login.php" method="post">
        <div class="form-group">
            <input type="email" placeholder="Enter Your Email:" name="email" class="form-control" required>
        </div>
        <br>
        <div class="form-group">
            <input type="password" placeholder="Enter Your password:" name="password" class="form-control" required>
        </div>
        <br>
        <div class="form-btn">
           <input type="submit" value="Login:" name="login" class="btn btn-primary">
        </div>
     </form>
     <br>
     <a href="forget.php">Forgot password?</a>
  </div><br>
  <a href="registration.php">Dont have account?CLICK TO CREATE</a>
</body><br>
<footer><ins>Terms and conditions apply</footer> </ins> 
</html>