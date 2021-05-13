<html>
<head>
		<title>Register</title>
		<meta charset="utf8">
		<style>
			body{
				margin:0;
				padding:0;
				background:url(ly-ca-phe-1.jpg);
				background-size:cover;
				background-position:center;
				font-family:Arial;
			}
			.loginbox{
				width:420px;
				height:600px;
				background:#000;
				color:#fff;
				top:50%;
				left:50%;
				position:absolute;
				transform:translate(-50%,-50%);
				box-sizing:border-box;
				padding:70px 30px;
			}
			.avatar{
				width:100px;
				height:100px;
				border-radius:50%;
				position:absolute;
				top:-50px;
				left:calc(50% - 50px);
				
			}
			h1{
				margin:0;
				padding 0 0 20px;
				text-align:center;
			}
			.loginbox p{
				margin:0;
				padding:0;
				font-weight:bold;
			}
			.loginbox input#ten{
				width:100%;
				margin-bottom:20px;
			}
			.loginbox input#email{
				width:100%;
				margin-bottom:20px;
			}
			.loginbox input#pass{
				width:100%;
				margin-bottom:20px;
			}
			.loginbox input#xn{
				width:100%;
				margin-bottom:20px;
			}
			.loginbox input#gt{
				width:10%;
				margin-bottom:20px;
			}
			.loginbox input#sub{
				width:100%;
				margin-bottom:20px;
			}
			
			.loginbox input[type="text"],input[type="password"],input[type="email"]
			{
				border:none;
				border-bottom:1px solid #fff;
				background:transparent;
				outline:none;
				height:40px;
				color:#fff;
				font-size:16px;
			}
			.loginbox input[type="submit"]
			{
				border:none;
				outline:none;
				height:40px;
				background:#fb2525;
				color:#fff;
				font-size:18px;
				border-radius:20px;
				margin:10px;
			}
			.loginbox input[type="submit"]:hover
			{
				cursor:pointer;
				background:#ffc107;
				color:#000;
			}
			
			
			
		</style>
	</head>
	<body>
	<?php
		
		if(isset($_POST['ten'])&&isset($_POST['email'])&&isset($_POST['pass'])&&isset($_POST['xn'])&&isset($_POST['gt']))
		{
			$t=$_POST['ten'];
			$email=$_POST['email'];
			$mk=$_POST['pass'];
			$xn=$_POST['xn'];
			$gt=$_POST['gt'];
			$conn=mysqli_connect("localhost","root","","banglaixe");
			$kt="select *from dangnhap  where tendangnhap='".$t."'";
			$kn=mysqli_query($conn,$kt);
			if($row=mysqli_fetch_array($kn))
			{
				echo "<script>alert('đã ton tai')</script>";
			}
			else
			{
				if($mk==$xn)
				{
					$dk="INSERT INTO dangnhap(tendangnhap,email,matkhau,gioitinh) VALUES ('".$t."','".$email."','".$mk."','".$gt."')";
					mysqli_query($conn,$dk);
					echo "đăng ký Thành Công";
					header("location:index.php");
				}
				else
				{
					echo"<script>alert('nhập lại mật khẩu')</script>";
				}
			}
			
			mysqli_close($conn);
		}
	
	?>
		<form method="POST">
		<div class="loginbox">
			<img src="78-780477_about-us-avatar-icon-red-png-clipart.png" class="avatar">
			<h1>Đăng ký</h1>
			<p>Tên đăng nhập</p>
			<input type="text" name="ten" id="ten"placeholder="Enter username" required>
			<p>Email</p>
			<input type="email" name="email" id="email" placeholder="Enter email"required>
			<p>Mật khẩu</p>
			<input type="password" name="pass"  id="pass" placeholder="Enter password"required>
			<p>Nhập lại mật khẩu</p>
			<input type="password" name="xn" id="xn" placeholder="Confirm password"required>
			<div>
				<p>Giới tính</p>
				<input type="radio" name="gt" id="gt" value="nam">Nam
				<input type="radio" name="gt" id="gt" value="nu">Nữ
			</div>
			<input type="submit" name="sub"  id="sub" value="Đăng ký">
			
		</div>
		</form>
	
	</body>
</html>