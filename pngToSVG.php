<?php 
include ("vendor/autoload.php");

use \ConvertApi\ConvertApi;



if(isset($_POST['submit'])){

    $filename = $_FILES['file']['name'];
    $filetype = $_FILES['file']['type'];
    $filetmp = $_FILES['file']['tmp_name'];

    $validExtetnsions = "png";
    $fileExtens = explode(".",$filename);
    $fileExtens = strtolower(end($fileExtens));

    $originalPath = "../Final Project/result/".$filename;
    $convPath = '../Final Project/convertedResult/';

    if($fileExtens != $validExtetnsions){
      
        echo "FAILED. The file you sent is in ".$fileExtens." format";
    }else{
      move_uploaded_file($filetmp, $originalPath);
      ConvertApi::setApiSecret('wDtbVkcn96U4cMeG');
      $result = ConvertApi::convert('svg', [
        'File' => $originalPath,
    ], 'png'
);
$result->saveFiles($convPath);
    }
}


?>

<?php include 'navbar.php' ?>

<div class="container">
    <h1>PNG to SVG</h1>
    <h3>Convert your PNG file into SVG</h3>
        <figure class="image-container">
            <img id="chosen-image">
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
<script src="../Final Project/script/noImages.js"></script>
</body>
</html>