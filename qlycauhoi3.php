<meta charset="utf8">
<html>
	<head>
		<title>Trang quản lý câu hỏi</title>
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
		</style>
	</head>
	<body>
		<div id="phandau">
			<p>TRANG ÔN TẬP VÀ THI THỬ BẰNG LÁI XE</p>
		</div>
		<div id="tieude">
			<h2>Quản lý câu hỏi</h2>
		</div>
		<div id="hienthi">
				<?php
			//1. số dòng trên 1 trang
			$sodongtrentrang=50;
			//2.đếm số trang của dữ liệu
			$kn=mysqli_connect("localhost","root","","banglaixe");
			mysqli_set_charset($kn, 'UTF8');
			$dl="select * from cauhoioto";
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
			$caulenhphantrang="select * from cauhoioto LIMIT $vt, $sodongtrentrang";
			$kqpt=mysqli_query($kn,$caulenhphantrang);
			echo "<table align='center' border='1'>";
			echo "<tr>
					<td>Mã câu hỏi</td>
					
					<td>Câu hỏi</td>
					<td>Đáp án</td>
					<td>Chức năng</td>
					
				</tr>";
			while($row=mysqli_fetch_array($kqpt))
			{
				$cau=$row['cauhoi'];
				$id=$row['id'];

				echo "<tr><td>Câu ".$row['id']."</td>
						<td><img src='/BT/450 cau hoi sat hach lai xe/$cau'/height='400' width='740'></td>
						<td>Đáp Án:". $row['dapandung1']."</td>
						<td><a href='sua2.php?id=$id'><button type='button' class='btn btn-info'>Sửa</button></a> | <a href='xoa2.php?id=$id'><button type='button' class='btn btn-success'>Xóa</button></a></td></tr>";
			}
			echo "</table>";
					//4.tạo nút bấm 
					for($i=0;$i<=$sotrangdulieu;$i++)
					{
						echo "<a href='qlycauhoi3.php?trangchon=$i'> >>$i </a>";
					}
				?>
			</table>
		</div>
		<div id="link">
			<a href="themcauhoi2.php"><button type='button' class='btn btn-info'>Thêm câu hỏi</button></a>
		</div>
	</body>
</html>