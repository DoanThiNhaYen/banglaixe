<meta charset="utf8">
<html>
	<head>
		<title>Trang quản lý câu hỏi</title>
		<style>
			body {
				width: 1300px;
				padding: 10px;
				margin: 0 auto;
				font-family:Arial;

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
			#addbox{
				width:420px;
				height:600px;
				top:50%;
				left:50%;
				position:absolute;
				transform:translate(-50%,-50%);
				box-sizing:border-box;
				padding:70px 30px;
			}
			#addbox p{
				margin:0;
				padding:0;
				font-weight:bold;
			}
			#addbox h1{
				margin:0;
				padding: 50px ;
				font-weight:bold;
			}
			#addbox input#macauhoi{
				width:100%;
				margin-bottom:20px;
			}
			#addbox input#noidung{
				width:100%;
				margin-bottom:20px;
			}
			#addbox input#hinhanh{
				width:100%;
				margin-bottom:20px;
			}
			#addbox input#dapan{
				width:100%;
				margin-bottom:20px;
			}
			#addbox input#hang{
				width:100%;
				margin-bottom:20px;
			}
			#addbox input[type="text"],input[type="file"]
			{
				border:none;
				border-bottom:1px solid #000;
				background:transparent;
				outline:none;
				height:40px;
				color:#000;
				font-size:16px;
			}
			#addbox input[type="submit"]
			{
				border:none;
				outline:none;
				height:40px;
				width:80px;
				background:#00BFFF;
				color:#000;
				font-size:15px;
				border-radius:10px;
				margin:10px;
			}
			h1{
				margin:20px;
				padding 0 0 20px;
				text-align:center;
			}
		</style>
	</head>
	<body>
		<?php
		
			
			$conn=mysqli_connect("localhost","root","","banglaixe");
			$kt="select * from cauhoixemay ";
			$kn=mysqli_query($conn,$kt);
			mysqli_set_charset($conn,'utf8');
			if(isset($_POST['sub2']))
			{
				$macauhoi=mysqli_escape_string($conn,$_POST['macauhoi']);
				
				$dapan=mysqli_escape_string($conn,$_POST['dapan']);
				
				$hinhanh=$_FILES['upload']['name'];
				
				if ($hinhanh != null)
				{
					//$path="/BT/150 câu/$hinhanh";
					$tmp_name = $_FILES['upload']['tmp_name'];
					$hinhanh = $_FILES['upload']['name'];
					
					//move_uploaded_file($tmp_name,$path.$hinhanh);
						$sql="insert into cauhoixemay(id,cauhoi,dapandung1) values(N'$macauhoi','$hinhanh','$dapan')";
						mysqli_query($conn,$sql);
						header("location:qlycauhoi1.php");
				}
			}
		?>
		<div id="phandau">
			<p>TRANG ÔN TẬP VÀ THI THỬ BẰNG LÁI XE</p>
		</div>
		<form method="POST" enctype="multipart/form-data">
			<div id="addbox">
				<h1>Thêm câu hỏi</h1>
				<p>Mã câu hỏi</p>
				<input type="text" name="macauhoi" id="macauhoi" required>
				
				<p>Câu Hỏi</p>
				<input type="file" name="upload" id="upload">
				<p>Đáp án</p>
				<input type="text" name="dapan" id="dapan" required>
				
				<input type="submit" name="sub2" id="sub2" value="Thêm">
			</div>
		</form>
		
	</body>
</html>