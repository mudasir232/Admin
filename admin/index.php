
<?php  
// Create connection
$con = mysqli_connect("localhost", "root", "mudasir", "role");
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
// Start the session
session_start();

include('web.php');

// Echo username
echo $_SESSION["username"];
$query=mysqli_query($con,"select * from login where username='$_SESSION[username]'");
while ($row=mysqli_fetch_array($query)) {
	$role=$row['role'];}

	if ($role=='admin') {
		// redirect the user to the admin page
		header("Location: admin.php");
		// stop the script execution
		exit();
	} elseif ($role=="manager") {
		// redirect the user to the manager page
		header("Location: manager.php");
		// stop the script execution
		exit();
	} elseif ($role=="employee") {
		// redirect the user to the employee page
		header("Location: employee.php");
		// stop the script execution
		exit();
	}
	?>