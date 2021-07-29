<html>
<head>
<title>🔒 Password Manager 🔒</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
</head>

<body>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['password']) {
    $password = $_POST['password'];

    if (password_verify($password, '$2y$10$oFGj2FdkEEFaxI5Y.Sih1eIGHJykMsRBzyp3l2lH4J.jShQM2iEmi')) {
      echo "<p>Successful Login!</p><br /><br />";
      echo "<p>Account Credentials</p><br />";
      echo "<p>Username: alex</p><br />";
      echo "<p>Password: thispasswordissuperdupersecuresinceitisextremelylong</p><br /><br />";
    }
  } else {
    echo "<p>No password was provided!</p><br /><br />";
  }
} else {
  echo "<p>You need to send a password to unlock the password manager!</p><br />";
  echo "<p>You need to send me a POST request with the password as a POST parameter called 'password'!</p><br /><br />";
}
?>

</body>
</html>
