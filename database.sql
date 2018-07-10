CREATE TABLE table_server (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
c_ip_private VARCHAR(30),
c_ip_public VARCHAR(30),
c_port_public INT(10),
estado_conn INT,
s_ip_private VARCHAR(30),
s_ip_public VARCHAR(30),
s_port_public INT(10)
);


