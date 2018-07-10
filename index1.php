 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "server";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) dm    die("Connection failed: " . mysqli_connect_error());
}

// Get the client ip address
$ipaddress = $_SERVER['REMOTE_ADDR'];
// Print IP Address
echo 'Your IP address is ' . $ipaddress . '<br />';

#echo 'Your IP address (using get_client_ip_env function) is ' . get_client_ip_env() . '<br />';
#echo 'Your IP address (using get_client_ip_server function) is ' . get_client_ip_server() . '<br />';

/*
$sql = "INSERT INTO users (ip_host, ip_na)
VALUES ('".$ipaddress."', '192.168.10.1')";

if (mysqli_query($conn, $sql)) {
    echo "New user created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
*/
mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Servidor</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
  
    <div class="row">
      <h2>Login</h2>
        <div class="col">
            <form action="/logear.php" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" value="Login">
                <a href="/register.php">Register</a>
            </form>
      </div>
      
    </div>
  
</div>
	
</body>
</html>