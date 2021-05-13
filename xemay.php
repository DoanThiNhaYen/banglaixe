<html>
	<head>
		<title>Ôn tập bằng Xe Máy</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<style>
			*{
				
			}
			body{
				font-family:Calibri;
				margin:5px;
				padding:0px;
			}
			.hero{
				//margin:0px;
				//padding:0px;
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
			.xemay{
				width:100px;
				left:50%;
				bottom:10px;
				transform:translateX(-50%);
				position:absolute;
				z-index:1;
				
				
			}
			.xemay img{
				width:250px;
				animation:xemay 1s linear infinite;
			}
			@keyframs xemay{
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
				<div class="xemay">
					<img src="delivery-04-512.png">
				</div>
				</div>
				
			<h3>150 CÂU HỎI THI SÁT HẠCH LÁI XE MÁY</h3>
			<div>
			<?php
			//1. số dòng trên 1 trang
			$sodongtrentrang=50;
			//2.đếm số trang của dữ liệu
			$kn=mysqli_connect("localhost","root","","banglaixe");
			mysqli_set_charset($kn, 'UTF8');
			$dl="select * from cauhoixemay";
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
			$caulenhphantrang="select * from cauhoixemay LIMIT $vt, $sodongtrentrang";
			$kqpt=mysqli_query($kn,$caulenhphantrang);
			
			while($row=mysqli_fetch_array($kqpt))
			{
			
				$cau=$row['cauhoi'];
			
					echo "<table align='center'>";
					echo "<tr><td>Câu ".$row['id']."</td></tr>
						<tr><td><img src='/BT/150 câu/$cau'/height='400' width='740'></td></tr>
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
					<a href="xemay.php?trangchon=<?=$Previous; ?>" aria-label="Previous">
						<span aria-hidden="true">Previous </span>
					</a>
				</li>
			
			<?php for($i=0;$i<=$sotrangdulieu;$i++):?>
				<li><a href="xemay.php?trangchon=<?=$i; ?>"><?=$i; ?></a></li>
				<?php endfor; ?>
				<li>
					<a href="xemay.php?trangchon=<?=$Next; ?>" aria-label="Next">
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