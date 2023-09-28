<?php 
session_start();

include ("../Final Project/database/db.php");

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = "SELECT * FROM user_tbl WHERE username = '$username'";

    $query = mysqli_query($conn,$check);

    
    if(mysqli_num_rows($query)>0){
        //if checkbox is checked, give the user a cookie with 'cookie' as it's name and a hashed version of the username as it's value
        if(isset($_POST['cookie'])){
            setcookie('cookie',hash('md5',$username),time()+60000);
        }
        $_SESSION['session'] = $username; 
        header("Location:index.php");
    }else{
        echo "<script>Alert('Wrong username or password')</script>";
    }
}

session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Final Project/styles/login.css?<?php echo time();?>">
    <!--Font Awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <a href="index.php"><img class="logo" src="logo.png" alt="logo"></a>
        <nav>
            <ul class="nav-links">
                <li><a href="PDFtoPNG.php">PDF->PNG</a></li>
                <li><a href="pngToPDF.php">PNG->PDF</a></li>
                <li><a href="pngToSVG.php">PNG->SVG</a></li>
                <li><a href="docxtopdf.php">DOCX->PDF</a></li>

            </ul>
        </nav>
        <div class="buttons">
            <a class="signUp" href="signuppage.php"><button>Sign Up</button></a>
            <a class="signIn" href="loginpage.php"><button>Sign In</button></a>
        </div>
    </header>
    <div class="login">
    <h1>Login Page</h1>
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <input type="checkbox" name="cookie" id="cookie">
        <label for="cookie">Remember Me</label>

        <button type="submit" name="submit">Login</button>
    </form>
    </div>
</head>
<body>
    