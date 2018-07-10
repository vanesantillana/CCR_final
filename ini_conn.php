<?php
//ejecutar php -q .\ini_conn.php 192.90.0.0 192.30.0.0 1200

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "server";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//print_r($argv);
if(count($argv)==4){
	// GET data
	$ip_private = $argv[1];
	$ip_public = $argv[2];
	$port = $argv[3];

	//$sql = "INSERT INTO table_server (c_ip_private, c_ip_public, c_port_public, estado_conn, s_ip_private, s_ip_public, s_port_public)
	//VALUES ( '".$ip_private."', '".$ip_public."', '".$port."', 1,'".$s_ip_private."', '".$s_ip_public."', '".$s_port."' )";
	$sql = "INSERT INTO table_server (c_ip_private, c_ip_public, c_port_public, estado_conn)
	VALUES ( '".$ip_private."', '".$ip_public."', '".$port."', 1)";

	if ($conn->query($sql) === TRUE) {
	    echo "Iniciada la conexion con el server";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
else{
	echo 'Error: No ingreso los parametros completos ip_private ip_public port';
}

$conn->close();
?> 