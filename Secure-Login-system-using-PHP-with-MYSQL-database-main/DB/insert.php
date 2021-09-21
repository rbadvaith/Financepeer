<?php
    //connect to mysql db
    $con = mysql_connect("username","password","") or die('Could not connect: ' . mysql_error());
    //connect to the employee database
    mysql_select_db("test_db", $con);

    //read the json file contents
    $jsondata = file_get_contents('data(13).json');
    
    //convert json object to php associative array
    $data = json_decode($jsondata, true);
    
    //get the employee details
    $userid = $data['userId'];
    $id = $data['id'];
    $title = $data['title'];
    $body = $data['body'];
    
    //insert into mysql table
    $sql = "INSERT INTO tbl_data(userid, id, title, body)
    VALUES('$userid', '$id', '$title', '$body', )";
    if(!mysql_query($sql,$con))
    {
        die('Error : ' . mysql_error());
    }
?>