<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body id=body> 

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
    <?php
    if (isset($_POST["submit"])){
        $fullname =$_POST["fullname"];
        $email =$_POST["email"];
        $password =$_POST["password"];
        $passwordRepeat = $_POST["repeat_password"];
         
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $error = array();

        if (empty($fullname) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($error,"All field must be filled!");
        }
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
          array_push($error,"Email is not correct!");
        }
        if(strlen($password)<7){
            array_push($error, "<div class='alert alert-danger'>Password should be at least 7 characters long! </div>");
        }
        if ($password!==$passwordRepeat) {
            array_push($error,"Password does not match");
        }

        require_once "database.php";
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $rowcount = mysqli_num_rows ($result);
        if ($rowcount>0){
            array_push ($error ,"Email already exists in system");
        }
        if (count($error)>0){
        foreach($error as $error){
                echo "<div class='alert alert-danger'>$error</div>";}
        }
        else{
           
           $sql = "INSERT INTO users (full_name, email ,password) VALUES(?, ?, ?)";
           $stmt = mysqli_stmt_init($conn);
           $prepareStmt = mysqli_stmt_prepare ($stmt,$sql);
           if ($prepareStmt){
            mysqli_stmt_bind_param ($stmt,"sss",$fullname, $email, $passwordHash);
            mysqli_stmt_execute ($stmt);
            echo " <div class = 'alert alert-success'>You have registered successfully,Welcome. </div> ";
           }
           else{
            ("Something went wrong!");
           }

         }


    }
    
    ?>
    <form action="registration.php" method="post">
        <div class="form-group">
        <input type="text" class="form-control" name="fullname"  placeholder="Fullname:" required>
   </div>
   <br>
   <div class="form-group">
        <input type="email" class="form-control" name="email"  placeholder="Email:" required>
   </div>
   <br>
   <div class="form-group">
        <input type="password" class="form-control" name="password"  placeholder="Password:" required>
   </div>
   <br>
   <div class="form-group">
        <input type="password" class="form-control" name="repeat_password"  placeholder="Repeat password:" required>
   </div>
   <br>
   <div class="form-btn">
        <input type="submit" class="btn btn-primary" value="Sign Up" name="submit">
    </div>
  
   </form>
</div>
<a href="login.php">Already have an Account?Click to Login</a>
</body><br>
<footer><ins>Terms and conditions apply</footer> </ins> 
</html>