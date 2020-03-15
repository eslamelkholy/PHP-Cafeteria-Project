<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once "functions.php";

if (isset($_POST['email'])) {
	$conn = new mysqli('localhost', 'root', '', 'cafeteria');

	$email = $conn->real_escape_string($_POST['email']);

	$sql = $conn->query("select id FROM users WHERE email='$email'");
	if ($sql->num_rows > 0) {

		$token = generateNewString();

		$conn->query("update users SET token='$token', 
                    tokenExpire=DATE_ADD(NOW(), INTERVAL 5 MINUTE)
                    WHERE email='$email'
            ");

		require_once "PHPMailer/PHPMailer.php";
		require_once "PHPMailer/Exception.php";

		$mail = new PHPMailer();
		$mail->addAddress($email);
		$mail->setFrom("https://github.com/eslamelkholy/PHP-Cafeteria-Project", "Github");
		$mail->Subject = "Reset Password";
		$mail->isHTML(true);
		$mail->Body = "
            Hi,<br><br>
            
            In order to reset your password, please click on the link below:<br>
            <a href='
            http://localhost/CafeteriaProject/Views/resetPassword.php?email=$email&token=$token
            '>http://localhost/CafeteriaProject/Views/resetPassword.php?email=$email&token=$token</a><br><br>
            
            Kind Regards,<br>
            Salah
            ";

		if ($mail->send())
			exit(json_encode(array("status" => 0, "msg" => 'Please Check Your Email Inbox!')));
		else {
			exit(json_encode(array("status" => 1, "msg" => 'Something Wrong Just Happened! Please try again!')));
		}
	} else
		exit(json_encode(array("status" => 0, "msg" => 'Please Check Your Inputs!')));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>Login</title>
	<style></style>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../public/login/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../public/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../public/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../public/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../public/login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../public/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../public/login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../public/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../public/login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../public/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../public/login/css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<span class="login100-form-title p-b-30">
					Cafeteria
				</span>
				<!------------ Login Form ----------------->
				<form class="login100-form validate-form flex-sb flex-w" action="../Controller/authentication.php" method="POST">
					<div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
						<input class="input100" type="text" id="username" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Email is required">
						<input class="input100" type="email" id="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
						<input class="input100" type="password" id="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" type="submit" name="login">
							Login
						</button>

					</div>

				</form>
				<br />
				<!------------- Forget Password ---------------->
				<h5 class="loginhere" style="text-align: center;">
					<input type="button" class="btn btn-primary" value="Forgot Password" style="cursor: pointer" />
					<br><br>
					<h6 id="response"></h6>
				</h5>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="../public/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="../public/login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="../public/login/vendor/bootstrap/js/popper.js"></script>
	<script src="../public/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="../public/login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="../public/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="../public/login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="../public/login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="../public/login/js/main.js"></script>
	<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		var email = $("#email");
		$(document).ready(function() {
			$('.btn-primary').on('click', function() {
				if (email.val() != "") {
					email.css('border', '1px solid green');
					$.ajax({
						url: 'login.php',
						method: 'POST',
						dataType: 'json',
						data: {
							email: email.val()
						},
						success: function(response) {
							if (!response.success)
								$("#response").html(response.msg).css('color', "red");
							else
								$("#response").html(response.msg).css('color', "green");
						}
					});
				} else
					email.css('border', '1px solid red');
			});
		});
	</script>

</body>

</html>