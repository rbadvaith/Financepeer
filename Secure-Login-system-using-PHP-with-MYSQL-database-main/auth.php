<?php 
session_start();
include 'db_conn.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	$secure =$_POST['secure'];

	if (empty($email)) {
		header("Location: login.php?error=Email is required");
	}else if (empty($password)){
		header("Location: login.php?error=Password is required&email=$email");
	}
	else if (empty($secure)){
			header("Location: login.php?error=Security Key is required&email=$email");	
	}else {
		$stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
		$stmt->execute([$email]);

		if ($stmt->rowCount() === 1) {
			$user = $stmt->fetch();

			$user_id = $user['id'];
			$user_email = $user['email'];
			$user_password = $user['password'];
			$user_full_name = $user['full_name'];
			$user_secure = $user['secure'];

			if ($email === $user_email) {
				if (password_verify($password, $user_password)) {
					if($secure == $user_secure)
					{
					
					      $_SESSION['user_id'] = $user_id;
					      $_SESSION['user_email'] = $user_email;
					      $_SESSION['user_full_name'] = $user_full_name;
					      header("Location: FileUpload.html");
					}
					else
					{
						header("Location: login.php?error=Incorect User name or password or Key&email=$email");
					}

				}else {
					header("Location: login.php?error=Incorect User name or password or Key&email=$email");
				}
			}else {
				header("Location: login.php?error=Incorect User name or password or Key&email=$email");
			}
		}else {
			header("Location: login.php?error=Incorect User name or password or Key&email=$email");
		}
	}
	if(isset($_POST['g-recaptcha-response'])){
	$secreatkey="6LfzDIAcAAAAAENlczgP7o9Eeqzx5j71eKnUY9kS";
	$ip=$_SERVER['REMOTE_ADDR'];
	$response=$_POST['g-recaptcha-response'];
	$url='https://www.google.com/recaptcha/api/siteverify?secret=$secreatkey&response=$response&remoteip=$ip';
	$fire=file_get_contents($url);
	$data=json_decode($fire);
	if($data->success==true){
		echo "success";
	}
	else{
		echo "please Fill recaptcha";
	}

}
else{
	echo "Recaptcha Error";
}
}

?>
