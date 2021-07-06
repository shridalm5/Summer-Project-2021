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
  <h2>Hey, <?php echo $_SESSION['username']; ?>!</h2>
  <h3 style='color:white'>You are in user dashboard page</h3>
  <form action="curlpdf.php" method="post" enctype="multipart/form-data">
    <div class="user-box">
      <span style='color:white'>Select PDFs to upload:</span>  
      
            <input type="file" name="files[]" multiple id="fileInput" >
            
         
            <span style='color:white'>Select Folder to Upload:</span>  
           
            <input type="file" name="folder[]" id="files" multiple directory="" webkitdirectory="" moxdirectory="" /><br/><br/> 

   
    <div class="user-box">
    <font style='color:white'>Upload Folders:</font> 

    <input type="checkbox" name="fold" value="Upload Folder">
    <font style='color:white'>Upload Files:</font> 
    <input type="checkbox" name="fil" value="Upload Files">
 
    </div>
   <div class="user-box">
      <input type="submit" name="submit" value="Click here to start processing" required="">
    </div>
  
    <a href="logout.php">
      <span></span>
      <span></span>
      Logout
    </a>
  </form>
</div>








</body>
  
</html>                    