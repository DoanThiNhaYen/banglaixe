<?php session_start();
?>
<html>
	<head>
		<title>Thi thử bằng Ôtô</title>
		<meta charset="utf8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<style>
		body{
			font-family:Calibri;
			font-size:18px;
			//width:1000px;
			//margin:0px auto;
		}
		h1{
			text-align:center;
		}
			
		#footer{
			position:absolute;
			//bottom:0;
			width:100%;
			height:20%;
			background:black;
			color:#FFF;	
			left:0;
		}
		label{
			margin:10px;
			
		}
		#time{
				margin:30px auto;
				width:100px;
				padding:30px;
				font-family:verdana;
				font-size:18px;
				background:black;
				color:white;
				border-radius:10px;
				text-align:center;
			}
			.xe{
			margin:10px;
			padding: 10px;
			//width:20px;
			//height:20px;
			//font-size:25px;
		}
		input[type="radio"]{
			width:20px;
			height:20px;
		}
			
		</style>
	</head>
	<body>
		<?php
	
	if (isset($_POST['sub']))
	{
		$conn=mysqli_connect("localhost","root","","banglaixe");
		$arr = $_POST;
		$dung =0;
		$sai =0;
		foreach ($arr as $key => $value)
		{
			if(is_numeric($key))
			{
			//echo $c;
				//echo substr($key, -3) ;
				//echo strpos($key, "_");
				$sql1 = "select dapandung1 from cauhoixemay where id ='$key' limit 1";
				$re1 = mysqli_query($conn,$sql1);
				$kq = mysqli_fetch_assoc($re1);
				
					foreach( $kq as $value1)
					{
						if ($value == $value1)
						{
					//echo "cau $key dung <br>";
							$dung++;
						}
						else
						{
					//echo "cau $key sai <br>";
							$sai++;
						}
						//echo $value1;
						//echo var_dump($value1);
					}
			}
				
				//echo $key;
				//echo $c;
				//echo var_dump($kq);
				
				/*if ($value == $kq)
				{
					//echo "cau $key dung <br>";
					$dung++;
				}
				else
				{
					//echo "cau $key sai <br>";
					$sai++;
				}*/
			
		}
		if($dung>=26)
		{
			echo "<br> <script>alert('đúng $dung, ĐẠT')</script>";
		}
		else
		{
			echo "<br> <script>alert('đúng $dung,KHÔNG ĐẠT')</script>";
		}
		
	}
?>
		<h1>Thi Thử Bằng Lái Ô tô</h1>
		<div class="container list-quiz">
		<form method="POST">
			<h1>Thi Thử Bằng Lái Xe Máy</h1><br>
			<div class="form-group">
			<div id="time"></div>
			<script>
			//dem thoi gian
			var sec=1500;
			function secondPassed()
			{
				var min=Math.round((sec-30)/60);
				var remainingSecond=sec%60;
				if(remainingSecond<10){
					remainingSecond="0"+remainingSecond;
				}
				document.getElementById('time').innerHTML=min +":" +remainingSecond;
				if(sec==0){
					clearInterval(countdownTime);
					//document.getElementById('time').innerHTML="Buzz";
					window.location.href="ontapvathithuxemay.php";
				}
				else
				{
					sec--;
				}
			}
			var countdownTime=setInterval('secondPassed()',1000);		
			

			
			</script>
			
			<?php
			//cau hoi trac nghiem
	//echo"123";
	
	$conn=mysqli_connect("localhost","root","","banglaixe");
	mysqli_set_charset($conn, 'UTF8');
		$sql="select a.id,a.cauhoi,b.dapan1,b.dapan2,b.dapan3,b.dapan4 from cauhoioto as a inner join dapan as b  order by rand() LIMIT 1,30";
		$re=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_array($re))
		{
			
			$cau=$row['cauhoi'];
			//$a=array($cau);
			//shuffle($a);
			//echo $r;
			$id=$row['id'];
					//header("Content-type:/450 cau hoi sat hach lai xe");
					echo "<table border='0' align='center'>";
					echo "<tr><td>Câu ".$id."</td></tr>
						<tr><td><img src='/BT/450 cau hoi sat hach lai xe/$cau'/height='400' width='740'></td></tr>";
					echo "</table>";
					
	
					?>
					<table align="center" >
					<tr><td><input type ="radio" name="<?php echo $row['id'];?>" class="xe" value="1">1 </td>
					<td><input type ="radio" name="<?php echo $row['id'];?>" class="xe"value="2">  2</td>
					<td><input type ="radio" name="<?php echo $row['id'];?>" class="xe" value="3"> 3 </td>
					<td><input type ="radio" name="<?php echo $row['id'];?>"  class="xe" value="4"> 4 </td>
					<td><input type ="radio" name="<?php echo $row['id'];?>" class="xe" value="1,2">1,2 </td></tr>
					<tr><td><input type ="radio" name="<?php echo $row['id'];?>" class="xe" value="1,3">1,3 </td>
					<td><input type ="radio" name="<?php echo $row['id'];?>" class="xe" value="1,4">1,4 </td>
					<td><input type ="radio" name="<?php echo $row['id'];?>" class="xe" value="2,3">2,3 </td>
					<td><input type ="radio" name="<?php echo $row['id'];?>" class="xe" value="2,4">2,4 </td>
					<td><input type ="radio" name="<?php echo $row['id'];?>" class="xe" value="3,4">3,4 </td></tr>
					</table>
					
	<?php	}	?>	
					<input type="submit" name="sub" class="btn btn-primary" value="Hoàn Thành"/>
			
				
			</div>
			
			<div id="footer">
			<label><?php
					echo "Tên Đăng Nhập: " . $_SESSION['ten'];
					?></label><br>
			<label>Hạng Thi:B2</label>
			<a href="logout.php">Thoát</a>
			</div>
		</form>
	</body>
</html>