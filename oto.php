<html>
	<head>
		<title>Ôn tập bằng Ô tô</title>
		<meta charset="utf8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<style>
			*{
				
			}
			body{
				font-family:Calibri;
				margin:0px;
				padding:0px;
			}
			.hero{
				height:250px;
				weight:100px;
				background-image:url(1024px-Sky.jpg);
				background-size:cover;
				background-position:center;
				position:relative;
				overflow-x:hidden;
			}
			.highway
			{
				height:100px;
				width:400%;
				display:block;
				background-image:url(road-pathway-with-stop-go-sign_1017-19180.jpg);
				position:absolute;
				bottom:0;
				left:0;
				right:0;
				z-index:1
				background-repeat:repeat-x;
				animation: highway 10s linear infinite;
			}
			@keyframes highway
			{
				100%{
					transform:translatex(-3400px);
				}
			}
			.car{
				width:100px;
				left:50%;
				bottom:2px;
				transform:translateX(-50%);
				position:absolute;
				z-index:1;
				
				
			}
			.car img{
				width:300px;
				animation:car 1s linear infinite;
			}
			@keyframs car{
				100%{
					transform:translateY(-1px);
				}
				50%{
					transform:translateY(1px);
				}
				0%{
					transform:translateY(-1px);
				}
			}
			.src{
				
				
				width:300px;
				height:300px;
			}
			h3{
				text-align:center;
				margin:20px;
			}
			a{
				margin:10px;
				
			}
		</style>
	</head>
	<body>
		<form>
			
			<div class="hero">
				<div class="highway"></div>
				<div class="car">
					<img src="taxi-pngrepo-com.png">
				</div>
				
			</div>
			<h3>450 CÂU HỎI THI SÁT HẠCH LÁI XE Ô TÔ</h3>
			<div>
			<?php
			//1. số dòng trên 1 trang
			$sodongtrentrang=100;
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
			
			while($row=mysqli_fetch_array($kqpt))
			{
			
				$cau=$row['cauhoi'];
			
					echo "<table align='center'>";
					echo "<tr><td>Câu ".$row['id']."</td></tr>
						<tr><td><img src='/BT/450 cau hoi sat hach lai xe/$cau'/height='400' width='740'></td></tr>
						<tr><td>Đáp Án:". $row['dapandung1']."</td></tr>";
					echo "</table>";
			}
			$Previous=$trang-1;
			$Next=$trang+1;
					
?>			
		</div>
		<div class="row">
			<div class="col-md-10">
				<nav ari-label="Page navigation">
				<ul class="pagination">
				<li>
					<a href="oto.php?trangchon=<?=$Previous; ?>" aria-label="Previous">
						<span aria-hidden="true">Previous </span>
					</a>
				</li>
			
			<?php for($i=0;$i<=$sotrangdulieu;$i++):?>
				<li><a href="oto.php?trangchon=<?=$i; ?>"><?=$i; ?></a></li>
				<?php endfor; ?>
				<li>
					<a href="oto.php?trangchon=<?=$Next; ?>" aria-label="Next">
					<span aria-hidden="true">Next</span>
					</a>
				</li>
				</ul>
				</nav>
			</div>	
		</div>
		</form>
	</body>
</html>