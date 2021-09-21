<?php 
  session_start();

  if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HOME</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">    
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: rgb(255, 255, 153);
}
table.table1 {
  border: 1px solid black;
  padding: 40px;
}
table.table1 th, td {
  border: 1px solid black;
  padding: 40px;
  background-color:#d1d0d0e1;
}

table.table1.center {
  margin-left: auto; 
  margin-right: auto;
}
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
.topnav a.header {
  background-color: #00442b;
  color: white;
}    
table.table2 {
border-collapse: collapse;
width: 100%;
height: 70px;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
table.table2 th {
background-color: #588c7e;
color: white;
}
table.table2 tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<div class="topnav">
        <a class="Header"><h1 text-align: center;>FINANCEPEER</h1></a>
 </div>
 <div class="topnav">
  <a class="active" href="index1.php" target="_parent">Home</a>
  <a href="index.php" target="_parent">Display Record</a>
</div>   



<h1>Welcome</h1>
<div class="d-flex justify-content-center align-items-center flex-column" style="min-height: 30vh;">
	 	<i class="bi bi-person-fill" style="font-size: 14rem"></i>
        <h1 class="text-center display-4" style="margin-top: -60px;font-size: 2rem"><?=$_SESSION['user_full_name']?></h1>
        <a href="logout.php" class="btn btn-warning">LOGOUT</a>

	 </div>
</body>
</html>
<?php 
}else {
   header("Location: login.php");
}