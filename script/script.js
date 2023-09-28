let uploadButton = document.getElementById("upload-button");
let chosenImage = document.getElementById("chosen-image");
let fileName = document.getElementById("file-name");


uploadButton.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(uploadButton.files[0]);
    reader.onload = () => {
        chosenImage.setAttribute("src",reader.result);
        document.getElementsByClassName("bElement").style.display="grid";
    }
    fileName.textContent = uploadButton.files[0].name;
   
}