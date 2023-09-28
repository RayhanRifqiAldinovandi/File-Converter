<?php 
include ("vendor/autoload.php");

if(!isset($_COOKIE['cookie'])){
    header("Location:loginpage.php");
}

use \ConvertApi\ConvertApi;



if(isset($_POST['submit'])){
    //Get the name,file type and temporary name of the uploaded file
    $filename = $_FILES['file']['name'];
    $filetype = $_FILES['file']['type'];
    $filetmp = $_FILES['file']['tmp_name'];

    //the acceptable extension on this page would be pdf
    $validExtetnsions = "pdf";
    //separates the string of the filename right when it hits the "." character
    $fileExtens = explode(".",$filename);
    //transforms the string into lowercase
    $fileExtens = strtolower(end($fileExtens));

    $originalPath = "../Final Project/result/".$filename;
    $convPath = '../Final Project/convertedResult/';

    if($fileExtens != $validExtetnsions){
      //create error message if uploaded file extension is incompatible with what is asked
        $msg = "FAILED. The file you sent is in .".$fileExtens." format";
    }else{
      //downloads the file into the local directory
      move_uploaded_file($filetmp, $originalPath);

      //get these line of code from convertAPI.com documentation
      ConvertApi::setApiSecret('wDtbVkcn96U4cMeG');
      $result = ConvertApi::convert('png', [
        'File' => $originalPath,
    ], 'pdf'
);
//saves the converted result into the local directory
$result->saveFiles($convPath);
    }
}


?>

<?php include 'navbar.php'; ?>

<div class="container">

    <h1>PDF to PNG</h1>
    <h3>Convert your PDF file into PNG</h3>
        <figure class="image-container">
            <figcaption id="file-name"></figcaption>
        </figure>
        <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="upload-button">
        <label for="upload-button">
            <i class="fas fa-upload"></i> &nbsp; Choose File
        </label>
        <div class="bElement">
            <button type="submit" name="submit">Convert File</button>
        </div>
        <?php if(isset($_POST['submit'])): ?>
            <?php if($fileExtens != $validExtetnsions): ?>
                <p class="error"><?php echo $msg; ?></p>
                <?php endif; ?>
                <?php endif; ?>
</form>
        
    </div>
<script src="../Final Project/script/noImages.js"></script>
</body>
</html>