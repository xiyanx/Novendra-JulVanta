<html>
<body>
<?php 
$username = "username"; 
$password = "password"; 
$database = "database"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT
	barang.*, 
	count(barang.kode_barang)
FROM
	barang
GROUP BY
	barang.kode_barang";
 
 
echo '<table border="1" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">ID</font> </td> 
          <td> <font face="Arial">Kode Barang</font> </td> 
          <td> <font face="Arial">Nama Barang</font> </td> 
          <td> <font face="Arial">Kondisi</font> </td> 
          <td> <font face="Arial">Jumlah</font> </td> 
          <td> <font face="Arial">Action</font> </td> 
      </tr>';
 
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["id"];
        $field2name = $row["kode_barang"];
        $field3name = $row["nama_barang"];
        $field4name = $row["kondisi"];
        $field5name = $row["count(barang.kode_barang)"]; 
 
        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
                  <td></td> 
              </tr>';
    }
    $result->free();
} 
?>
</body>
</html>