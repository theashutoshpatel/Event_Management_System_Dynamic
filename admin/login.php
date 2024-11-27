<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
ob_start();
if(!isset($_SESSION['system'])){
	$system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach($system as $k => $v){
		$_SESSION['system'][$k] = $v;
	}
}
ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo $_SESSION['system']['name'] ?></title>
<?php include('./header.php'); ?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");
?>
<style>
	body {
		width: 100%;
		height: 100%;
		margin: 0;
		font-family: Arial, sans-serif;
		background: linear-gradient(to right, #6a11cb, #2575fc);
		color: #fff;
	}
	main#main {
		width: 100%;
		height: 100vh;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	#login-right {
		width: 100%;
		max-width: 400px;
		background: rgba(255, 255, 255, 0.1);
		backdrop-filter: blur(10px);
		border-radius: 10px;
		padding: 20px;
		box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
		animation: fadeIn 1s ease-out;
	}
	.card {
		background: none;
		border: none;
	}
	.card-body {
		text-align: center;
	}
	.card-body label {
		font-weight: bold;
		color: #fff;
	}
	.card-body .form-control {
		background: rgba(255, 255, 255, 0.2);
		color: #fff;
		border: none;
		border-radius: 5px;
		padding: 10px;
		margin-bottom: 15px;
	}
	.card-body .form-control:focus {
		outline: none;
		box-shadow: 0 0 5px #6a11cb;
	}
	.btn-primary {
		background: #2575fc;
		border: none;
		padding: 10px 20px;
		border-radius: 5px;
		color: #fff;
		transition: background 0.3s;
	}
	.btn-primary:hover {
		background: #6a11cb;
		cursor: pointer;
	}
	@keyframes fadeIn {
		from {
			opacity: 0;
			transform: scale(0.9);
		}
		to {
			opacity: 1;
			transform: scale(1);
		}
	}
</style>
</head>
<body>
  <main id="main">
	<div id="login-right">
		<div class="card">
			<div class="card-body">
				<h2 class="mb-4">Welcome</h2>
				<form id="login-form">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" id="username" name="username" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" id="password" name="password" class="form-control" required>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Login</button>
				</form>
			</div>
		</div>
	</div>
  </main>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
	$('#login-form').submit(function(e) {
		e.preventDefault();
		$('button[type="submit"]').attr('disabled', true).html('Logging in...');
		$.ajax({
			url: 'ajax.php?action=login',
			method: 'POST',
			data: $(this).serialize(),
			success: function(resp) {
				if (resp == 1) {
					location.href = 'index.php?page=home';
				} else if (resp == 2) {
					location.href = 'voting.php';
				} else {
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>');
					$('button[type="submit"]').removeAttr('disabled').html('Login');
				}
			},
			error: function() {
				alert('An error occurred. Please try again.');
				$('button[type="submit"]').removeAttr('disabled').html('Login');
			}
		});
	});
  </script>
</body>
</html>
