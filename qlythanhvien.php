<meta charset="utf8">
<html>
	<head>
		<title>Trang quản lý thành viên</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<style>
			body {
				width: 1300px;
				padding: 10px;
				margin: 0 auto;
			}
			#phandau {
				height: 120px;
				background-color: #00BFFF;
			}
			#phandau p {
				font-family: Arial;
				font-size: 40px;
				font-weight: bold;
				text-align: center;
				padding: 40px;
			}
			#hienthi{
				padding:40px;
			}
		</style>
	</head>
	<body>
		<div id="phandau">
			<p>TRANG ÔN TẬP VÀ THI THỬ BẰNG LÁI XE</p>
		</div>
		<div id="hienthi">
			<?php
				//1. số dòng trên 1 trang
				$sodongtrentrang=3;
				//2.đếm số trang của dữ liệu
				$kn=mysqli_connect("localhost","root","","banglaixe");
				$dl="select * from dangnhap";
				$kq=mysqli_query($kn,$dl);
				$sodongdulieu=mysqli_num_rows($kq);
				$sotrangdulieu=$sodongdulieu/$sodongtrentrang;
				if(isset($_GET['trangchon']))
				{
					$trang=$_GET['trangchon'];
				}
				else
				{
					$trang=0;
				}
				//3.đưa dữ liệu lên trang
				$vt=$trang*$sodongtrentrang;
				$caulenhphantrang="select * from dangnhap LIMIT $vt, $sodongtrentrang";
				$kqpt=mysqli_query($kn,$caulenhphantrang);
				echo "<table border='1' align='center'>";
				echo "<tr><td>Tên đăng nhập</td><td>Mật khẩu</td><td>Email</td></tr>";
				while($dong=mysqli_fetch_array($kqpt))
				{
					echo "<tr><td>".$dong['tendangnhap']."</td><td>".$dong['matkhau']."</td><td>".$dong['email']."</td></tr>";
				}
				echo "</table>";
				//4.tạo nút bấm 
				for($i=0;$i<=$sotrangdulieu;$i++)
				{
					echo "<a href='qlythanhvien.php?trangchon=$i'> >>$i </a>";
				}
			?>
		</div>
	</body>
</html>