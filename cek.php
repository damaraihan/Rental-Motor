<title>Rental Motor</title>
<?php
include 'config.php';
$username = $_POST['username'];
$password = $_POST['password'];
$cek      = mysqli_query($connect, "select * from login where username='$username' and password='$password'");
$result   = mysqli_num_rows($cek);
$data = mysqli_fetch_array($cek);

if($result>0){
	if ($data['level'] == 'admin') {
	    session_start();
	    $_SESSION['username'] = $data['username'];
	    $_SESSION['level'] 	  = $data['level'];
	    echo "<script>document.location.href='admin.php'</script>";

	}elseif($data['level'] == 'user'){
	    session_start();
	    $_SESSION['username'] = $data['username'];
	    $_SESSION['level'] 	  = $data['level'];
	    echo "<script>alert('Selamat Datang');document.location.href='beranda.php'</script>";
	}
}else{
    header("location:index.php");
}
?>