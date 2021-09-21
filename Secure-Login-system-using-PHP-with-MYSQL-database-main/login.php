<?php 
  session_start();

  if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_email'])) { 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Secure Login System PHP</title>
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
<script src='https://www.google.com/recaptcha/api.js'></script>


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body bgcolor="orange">
<div class="topnav">
        <a class="Header"><h1 text-align: center;>FINANCEPEER</h1></a>
 </div>
	  <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
	  	<form class="p-5 rounded shadow" 
	  	      action="auth.php"
	  	      method="post" 
	  	      style="width: 30rem">
	  		<h1 class="text-center pb-5 display-4">LOGIN</h1>
	  		<?php if (isset($_GET['error'])) { ?>
	  		<div class="alert alert-danger" role="alert">
			  <?=htmlspecialchars($_GET['error'])?>
			</div>
		    <?php } ?>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" 
		           class="form-label">Email address
		    </label>
		    <input type="email" 
		           name="email" 
		           value="<?php if(isset($_GET['email']))echo(htmlspecialchars($_GET['email'])) ?>" 
		           class="form-control" 
		           id="exampleInputEmail1" aria-describedby="emailHelp">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" 
		           class="form-label">Password
		    </label>
		    <input type="password" 
		           class="form-control" 
		           name="password" 
		           id="exampleInputPassword1">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" 
		           class="form-label">Secret Key
		    </label>
		    <input type="password" 
		           class="form-control" 
		           name="secure" 
		           id="exampleInputSecure1">
		  </div>
		  <div class="g-recaptcha" data-sitekey="6LfzDIAcAAAAAGbsDut6z5MCb96uKAxpQoBmvySV"></div>

		  <button type="submit" name="submit" value="submit"
		          class="btn btn-primary">LOGIN
		  </button>

		</form>

	  </div>
</body>
</html>

<?php 
}else {
   header("Location: index.php");
}
 ?>
