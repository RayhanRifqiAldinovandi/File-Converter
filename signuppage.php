<?php 

include ("../Final Project/database/db.php");

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_confirm = $_POST['confirm-password'];

    if($password == $password_confirm){
        $password = password_hash($password,PASSWORD_DEFAULT);
        $insert = "INSERT INTO `user_tbl`VALUES(null,'$username','$password')";
        mysqli_query($conn,$insert);
        header("Location:/database/loginpage.php");
    }else{
        echo "<script>Alert('Password does not match')</script>";
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Final Project/styles/signup.css?<?php echo time();?>">
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
    <h1>Sign Up Page</h1>
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <label for="password">Confirm Password</label>
        <input type="password" name="confirm-password" id="confirm-password" required>

        <button type="submit" name="submit">Login</button>
    </form>
    </div>
</head>
<body>