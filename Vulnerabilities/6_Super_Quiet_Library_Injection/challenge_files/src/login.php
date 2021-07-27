<?php
include("db.php");
if (isset($_POST)) {
	if (isset($_POST["username"]) && isset($_POST["password"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$users_result = $db->querySingle("SELECT COUNT(DISTINCT 'id') FROM 'users' WHERE username = '$username' and password = '$password'");
		if ($users_result == 1) {
			session_start();
			$_SESSION["logged_in"] = True;
			session_write_close();
			header("Location: admin.php");
			exit();
		} else {
			$err_msg = "Invalid username and/or password!";
		}
	}
}

?>

<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Login - Super Quiet Library</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<a href="index.php" class="logo">Login</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li><a href="index.php">Home</a></li>
							<li class="active"><a href="login.php">Login</a></li>
							<li><a href="admin.php">Admin</a></li>
						</ul>
						<ul class="icons">
							<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<?php
							if (isset($err_msg)) {
								echo "<p style='color:#bf0407'><b>$err_msg</b></p>";
							}
						?>
						<form method="post" action="/login.php">
							<div class="fields">
								<div class="field">
									<label for="name">Username</label>
									<input type="text" name="username" id="username" />
								</div>
								<div class="field">
									<label for="message">Password</label>
									<input type="password" name="password" id="password" />
								</div>
							</div>
							<ul class="actions">
								<li><input type="submit" value="Login" /></li>
							</ul>
						</form>
					</div>

				<!-- Copyright -->
					<div id="copyright">
						<ul><li>&copy; Untitled</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li></ul>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
