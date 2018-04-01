<?php

$title ="Upload new image";

$content='  <form action="" method="POST" enctype="multipart/form-data">
                <input Type="file" Name="file"></input>
                <br>
                <br>
                <input Type="submit" Name="submit" value="Submit"></input>
            </form>';
$imgUrl="";
echo ('<img src="'.$imgUrl.'"/>');


if(isset($_POST['submit'])){
    $fileType = $_FILES["file"]["type"];
    //$size = $_FILES['file']['size']
    //$type = $_FILES['file']['type']

    $tmp_name = $_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];

    if (isset ($Name)) 
    {
        if (!empty($Name)) 
        {

            $location = 'uploads/';

            if  (move_uploaded_file($tmp_Name, $location.$Name))
            {
                echo 'Upload';    
            } else {
                echo 'please choose a file';
            }
        }
    }
    
    if(($fileType== 'image/jpg')||
        ($fileType =='image/jpeg')||
         ($fileType =='image/png'))
    {
        $imgUpload = "images/".$_FILES["file"]["name"];
        if(file_exists($imgUpload))
        {
            echo "File realy exists";
        }
        else {
            move_uploaded_file($_FILES["file"]["tmp_name"],$imgUpload);
            echo"upload in ".$imgUpload;

            $imgUrl = '<img src="'.$imgUpload.'"/>';
            //echo ($img);
        }
    }
    
}
 
    
 
include 'template.php';


?>