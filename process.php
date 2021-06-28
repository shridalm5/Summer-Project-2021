<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
?>

<?php 
include("auth_session.php");
// if(empty(array_filter($_FILES['files']['name']))) 
// {
// exit("No files selected");
// }

if(isset($_POST['submit'])) 
{
    if(isset($_POST['fold']))
    {
         // echo "hello";
                $upload_dir = 'uploads'.DIRECTORY_SEPARATOR;
                $allowed_types = array('jpg', 'png', 'jpeg', 'gif');
                // Define maxsize for files i.e 2MB
                $maxsize = 2 * 1024 * 1024*10;
                $target_url="http://106.214.24.120:7777/adfs/upload.php";
                //106.214.24.120:7777/adfs/
                
                    $datevar=$_POST['hidden3'];
                    $timevar=$_POST['hidden4'];
                    $pat=$_POST['path'];
                    echo "hello";

                    echo $datevar;
                    echo $timevar;
                    $datearr= explode('%',$datevar);

                    $timarr=explode('%',$timevar);
                    $path=explode('%',$pat);
                    array_pop($path);
                    array_pop($datearr);
                    array_pop($timarr);
                    $count=0;


                    $clsdscrptn=$_POST['dcmntcls'];
                    $typdscrptn=$_POST['dcmnttyp'];
                    $btchdscrptn=$_POST['btch'];
                    $prcs=$_POST['prc'];


                $filecount = count($_FILES['folder']['name']);
            

            
                for($i=0; $i<$filecount; $i++){
                $fileName[] = $_FILES["folder"]['name'][$i];
                $tempFileName[] = $_FILES["folder"]['tmp_name'][$i];
                } 
                $postField = array();
                $postFields['dcmntcls']=$clsdscrptn;
                $postFields['dcmnttyp']=$typdscrptn;
                $postFields['btch']=$btchdscrptn;
                $postFields['prc']=$prcs;
                $postFields['username']=$_SESSION['username'] ;

                foreach ($tempFileName as $index => $file) {

                    $file_tmpname = $_FILES['folder']['tmp_name'][$index];
                    $file_name = $_FILES['folder']['name'][$index];
                    $file_size = $_FILES['folder']['size'][$index];
                    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                    $filepath = $upload_dir.$file_name;
                    $start_time = microtime(true);
                    $modified_file_name=$path[$index];
                    // echo  $modified_file_name;
                    // echo "<br>";
                    $outputocr = shell_exec("/var/www/html/first.py '".$modified_file_name."'");
                    // echo $outputocr;
                    // echo "<br>";
                    $end_time = microtime(true);
                    if (function_exists('curl_file_create')) { // For PHP 5.5+
                        $file = curl_file_create($file, "mime", $fileName[$index]);
                    }
                    else {
                        $file = '@' . realpath($file);
            }

            $postFields["files_$index"] = $file;
            $postFields["ocrdata_$index"]= $outputocr;
            $postFields["cvdata_$index"]= "This system does not have YOLO";
            $postFields["tmetkn_$index"]=$tmetkn = strval($end_time - $start_time);
            $postFields["date_$index"]=$datearr[$count];
            $postFields["time_$index"]=$timarr[$count];
            $count=$count+1;

            }


            $headers = array("Content-Type" => "multipart/form-data");
            $curl_handle = curl_init();
            curl_setopt($curl_handle, CURLOPT_URL, $target_url);
            curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl_handle, CURLOPT_POST, TRUE);
            curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $postFields);
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);
            $returned_data = curl_exec($curl_handle);
            echo $returned_data;
            curl_close($curl_handle);

    }
    else if(isset($_POST['fil']))
    {
                    $upload_dir = 'uploads'.DIRECTORY_SEPARATOR;
                $allowed_types = array('jpg', 'png', 'jpeg', 'gif');
                // Define maxsize for files i.e 2MB
                $maxsize = 2 * 1024 * 1024*10;
                $target_url="http://106.214.24.120:7777/adfs/upload.php";
                
                    $datevar=$_POST['hidden1'];
                    $timevar=$_POST['hidden2'];
                    $pat=$_POST['path'];
                    $datearr= explode('%',$datevar);
                    $timarr=explode('%',$timevar);
                    $path=explode('%',$pat);
                    array_pop($path);
                    array_pop($datearr);
                    array_pop($timarr);
                    $count=0;
                    $clsdscrptn=$_POST['dcmntcls'];
                    $typdscrptn=$_POST['dcmnttyp'];
                    $btchdscrptn=$_POST['btch'];
                    $prcs=$_POST['prc'];


                $filecount = count($_FILES['files']['name']);
            
                for($i=0; $i<$filecount; $i++){
                $fileName[] = $_FILES["files"]['name'][$i];
                $tempFileName[] = $_FILES["files"]['tmp_name'][$i];
                } 
                $postField = array();
                $postFields['dcmntcls']=$clsdscrptn;
                $postFields['dcmnttyp']=$typdscrptn;
                $postFields['btch']=$btchdscrptn;
                $postFields['prc']=$prcs;
                $postFields['username']=$_SESSION['username'] ;

                foreach ($tempFileName as $index => $file) {

                    $file_tmpname = $_FILES['files']['tmp_name'][$index];
                    $file_name = $_FILES['files']['name'][$index];
                    $file_size = $_FILES['files']['size'][$index];
                    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                    $filepath = $upload_dir.$file_name;
                    $start_time = microtime(true);
                    $modified_file_name=$path[$index];
                    $outputocr = shell_exec("/var/www/html/first.py '".$modified_file_name."'");
                    $end_time = microtime(true);
                    if (function_exists('curl_file_create')) { // For PHP 5.5+
                        $file = curl_file_create($file, "mime", $fileName[$index]);
                    }
                    else {
                        $file = '@' . realpath($file);
            }

            $postFields["files_$index"] = $file;
            $postFields["ocrdata_$index"]= $outputocr;
            $postFields["cvdata_$index"]= "This system does not have YOLO";
            $postFields["tmetkn_$index"]=$tmetkn = strval($end_time - $start_time);
            $postFields["date_$index"]=$datearr[$count];
            $postFields["time_$index"]=$timarr[$count];
            $count=$count+1;

            }


            $headers = array("Content-Type" => "multipart/form-data");
            $curl_handle = curl_init();
            curl_setopt($curl_handle, CURLOPT_URL, $target_url);
            curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl_handle, CURLOPT_POST, TRUE);
            curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $postFields);
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);
            $returned_data = curl_exec($curl_handle);
            echo $returned_data;
            curl_close($curl_handle);

    }
    else
    {
        echo "please upload files";

    }
}
?>