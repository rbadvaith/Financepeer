<?php
if(isset($_POST["submit"])){
    $file=$FILES['file'];
    $fileUploadName=$_FILES['file']['name'];
    $fileType=$_FILES['file']['type'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileExtension=explode('.',$fileUploadName);
    $fileActualExtension=strtolower(end($fileExtension))

    if($fileActualExtension==="json"){
        $fileDestination="info/".$fileUploadName;
        move_uploaded_file($fileTmpName,$fileDestination);
        $json=file_get_contents("info/".$fileUploadName);
        data=json_decode($json,true);
        echo"<table border='1><tr><th width ='50px'>User ID</th><th width ='50px'>ID<</th><th>Title</th><th width = '500px' Body</th></tr>";
        foreach($data as $val){
            echo"<tr>";
            echo"<td>"/$val['userId']."</td>";
            echo"<td>"/$val['id']."</td>";
            echo"<td>"/$val['title']."</td>";
            echo"<td>"/$val['body']."</td>";
            echo"</tr>";


        }
        echo "</table>";

        
    }
    else{
        echo "wrong file upload type";
    }
}