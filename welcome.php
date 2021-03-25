<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Vojtech Benes" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Portál SNH</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css" /> -->
  	<link rel="stylesheet" type="text/css" href="./style/style.css" />
    <link rel="stylesheet" type="text/css" href="./style/welcome.css" />
    <script src="https://kit.fontawesome.com/1e81993bcd.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    <!-- navigation pannel - START -->
    <div class="sidebar">
      <div class="navigation">
        <a href="" title="championship"><i class="fas fa-trophy fa-lg"></i></a><br />
        <a href="" title="teams"><i class="fas fa-users fa-lg"></i></a><br />
        <a href="" title="members"><i class="fas fa-users-cog fa-lg"></i></a><br />
        <a href="" title="configuration"><i class="fas fa-tools fa-lg"></i></a>
      </div>
    </div>
    <!-- navigation pannel - END -->
</body>
</html>
