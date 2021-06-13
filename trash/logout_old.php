<?php 
session_start();

//menghancurkan $_SESSION["pelanggan"

session_destroy();

echo "<script>alert('Terimakasih Telah Makan Disini')

</script>";
echo "<meta http-equiv='refresh' content='1;url=index.php'>";

?>