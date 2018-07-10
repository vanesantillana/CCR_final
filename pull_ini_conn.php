 <?php
 //ejecutar php -q .\pull_ini_conn.php 192.90.0.0 192.30.0.0 1200

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

$sql = "SELECT id FROM table_server WHERE estado_conn=1";
$result = $conn->query($sql);
$id_table = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$id_table = $row['id'];
        //echo "id: " . $row["id"];
    }
} else {
    echo "Conexion ya establecida";
}



if($id_table!=0){

	if(count($argv)==4){
		// GET data
		$s_ip_private = $argv[1];
		$s_ip_public = $argv[2];
		$s_port = $argv[3];

		//echo "Estableciendo Conexion...";
		$sql = "UPDATE table_server SET estado_conn=2, s_ip_private='".$s_ip_private."', s_ip_public='".$s_ip_public."', s_port_public=".$s_port." WHERE id=".$id_table;
		if ($conn->query($sql) === TRUE) {
		    //echo "Estado de la conexion 2";	
			$sql = "SELECT c_ip_private, c_ip_public, c_port_public, estado_conn, s_ip_private, s_ip_public, s_port_public FROM table_server WHERE id=".$id_table;
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        echo $row["c_ip_private"].",".$row["c_ip_public"].",".$row["c_port_public"].",".$row["estado_conn"].",".$row["s_ip_private"].",".$row["s_ip_public"].",".$row["s_port_public"];
			    }
			}

		} else {
		    echo "Error updating record: " . $conn->error;
		}
	}	
	else{
		echo 'Error: No ingreso los parametros completos ip_private ip_public port';
	}
}
$conn->close();
?> 