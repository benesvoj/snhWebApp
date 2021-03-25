<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
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
    <div class="content">
      <div class="conent table">
        <?php
        // Create connection
          require_once "config.php";
          $conn = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          $sql = "SELECT number, name FROM teams";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            echo "<table><tr><th>Number</th><th>Name</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr><td>".$row["number"]."</td><td>".$row["name"]."</td></tr>";
            }
            echo "</table>";
          } else {
            echo "0 results";
          }
          $conn->close();
        ?>
      </div>
    </div>
</body>
</html>
