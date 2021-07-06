<!DOCTYPE html>
<html>
<body>

<form action="#" method="post" enctype="multipart/form-data"> 
    Select Folder to Upload: <input type="file" name="files[]" id="files" multiple directory="" webkitdirectory="" moxdirectory="" /><br/><br/> 
    <input type="Submit" value="Upload" name="upload" />
    <ul id="listing"></ul>
</form>
<script type="text/javascript">
    // document.write("hello bhai ");
    document.getElementById("files").addEventListener("change", function(event) {
    let output = document.getElementById("listing");
    let files = event.target.files;

    for (let i=0; i<files.length; i++) {
        let item = document.createElement("li");
        item.innerHTML = files[i].webkitRelativePath;
        output.appendChild(item);
    };
    }, false);
</script>
<?php
  if(isset($_POST['upload']))
  {
  	
  		// $foldername=$_POST['foldername'];
  		// if(!is_dir($foldername)) mkdir($foldername);
  		foreach($_FILES['files']['name'] as $i => $name)
		{
            echo $_FILES['files']['name'][$i];
            echo "<br>";
  		    // if(strlen($_FILES['files']['name'][$i]) > 1)
  		    // {  move_uploaded_file($_FILES['files']['tmp_name'][$i],$foldername."/".$name);
  		    // }
  		}
  		echo "Folder is successfully uploaded";
}
?>
</body>
</html>