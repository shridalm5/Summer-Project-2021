<?php
include("auth_session.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="st.css" />
</head>
<body>
<div class="login-box">  
 
  <h3 style='color:white'>You are in user dashboard page</h3>
  <form action="process.php" method="post" enctype="multipart/form-data">
    <div class="user-box">
      <span style='color:white'>Select image to upload:</span>  
      
            <input type="file" name="files[]" multiple id="fileInput" >
            <input type="hidden" name="hidden1" id="hidden1" />
            <input type="hidden" name="hidden2" id="hidden2" />
         
            <span style='color:white'>Select Folder to Upload:</span>  
           
            <input type="file" name="folder[]" id="files" multiple directory="" webkitdirectory="" moxdirectory="" /><br/><br/> 
            <input type="hidden" name="hidden3" id="hidden3" />
            <input type="hidden" name="hidden4" id="hidden4" />
            <input type="hidden" name ="path" id="path">
            
      <font style='color:white'> Document Class:</font> 
      <select name="dcmntcls">
        <option value="Images" selected="selected">Images</option>
        <option value="PDF" >PDF</option>
        <option value="TIFF" >TIFF</option>
      </select>
      <br><br> 
      <font style='color:white'>Document Type:</font> 
        <select name="dcmnttyp">
        <option value="Book" selected="selected">Book</option>
        <option value="Forms" selected="selected">Form</option>
        <option value="News" selected="selected">News</option>
        <option value="Miscellaneous" selected="selected">Miscellaneous</option>
      </select>
      <br><br>    
      <font style='color:white'>Select Process:</font> <select name="prc">
        <option value="ocr" selected="selected">OCR</option>
        <option value="cv" >Object Detection</option>
        <option value="both" >Both</option>
      </select>
      <br><br>
      <font style='color:white'>Enter Batch:</font> 
      <input type="text"  name="btch">
    </div>
    <div class="user-box">
    <font style='color:white'>Upload Folders:</font> 

    <input type="checkbox" name="fold" value="Upload Folder">
    <font style='color:white'>Upload Files:</font> 
    <input type="checkbox" name="fil" value="Upload Files">
 
    </div>
   <div class="user-box">
      <input type="submit" name="submit" value="Click here to start processing" required="">
    </div>
    <a href="uplaodpdfs.php">
      <span></span>
      <span></span>
      Upload PDFs
    </a>
  
    <a href="search.php">
      <span></span>
      <span></span>
      Search
    </a>
    <a href="logout.php">
      <span></span>
      <span></span>
      Logout
    </a>
  </form>
</div>
<script type="text/javascript">
    // document.write("hello bhai ");
    document.getElementById("files").addEventListener("change", function(event) {
   
    let files = event.target.files;
    var abx="";
    var datevar="";
   var timevar="";

    for (let i=0; i<files.length; i++) {

      const date = new Date(files[i].lastModified);
  
      //document.getElementById("path").value = files[i].webkitRelativePath;
      abx = abx.concat(files[i].webkitRelativePath);
      abx = abx.concat('%');

      datevar = datevar.concat(date.toISOString().replace('-', '-').split('T')[0].replace('-', '-'));
      datevar = datevar.concat('%');
      timevar = timevar.concat(date.toLocaleTimeString());
      timevar = timevar.concat('%');
    };
    document.getElementById("path").value = abx;
    document.getElementById("hidden3").value = datevar;
    document.getElementById("hidden4").value = timevar;

    }, false);
</script>

<script type="text/javascript">

const fileInput = document.querySelector('#fileInput');
fileInput.addEventListener('change', (event) => {
  // files is a FileList object (similar to NodeList)
  const files = event.target.files;
   var datevar="";
   var timevar="";
  for (let file of files) {
    const date = new Date(file.lastModified);
  
      datevar = datevar.concat(date.toISOString().replace('-', '-').split('T')[0].replace('-', '-'));
      datevar = datevar.concat('%');
      timevar = timevar.concat(date.toLocaleTimeString());
      timevar = timevar.concat('%');
  }
  document.getElementById("hidden1").value = datevar;
  document.getElementById("hidden2").value = timevar;
});

</script>



</body>
  
</html>                    