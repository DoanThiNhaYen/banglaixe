<?php session_start();
?>
<html>
	<head>
		<title>Dang Nhap</title>
		<meta charset="utf8">
		<style>
			body{
				margin:0;
				padding:0;
				//background:url(ly-ca-phe-1.jpg);
				background-size:cover;
				background-position:center;
				font-family:Arial;
			}
			.loginbox{
				width:420px;
				height:520px;
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
			.loginbox input{
				width:100%;
				margin-bottom:20px;
			}
			.loginbox input[type="text"],input[type="password"]
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
			}
			.loginbox input[type="submit"]:hover
			{
				cursor:pointer;
				background:#ffc107;
				color:#000;
			}
			.loginbox a{
				text-decoration:none;
				font-size:12px;
				line-height:20px;
				color:darkgrey;
			}
			.loginbox a:hover
			{
				color:#ffc107;
			}
			
			
		</style>
	</head>
	<body>
		<?php
		if(isset($_POST['ten'])&&isset($_POST['pass']))
		{
			$t=$_POST['ten'];
			$mk=$_POST['pass'];
			$conn=mysqli_connect("localhost","root","","banglaixe");
			$kt="select *from dangnhap where tendangnhap='".$t."' and matkhau='".$mk."'";
			$kn=mysqli_query($conn,$kt);
			if($row=mysqli_fetch_array($kn))
			{
				if($row['phanquyen']== '1')
				{
					header("location:admin.php");
				}
				else
				{
					header("location:trangchu.php");
				}
				//echo "<script>alert('thành công')</script>";
				$_SESSION['ten']=$t;
				
			}
			else{echo " <script>alert('ko ton tai')</script>";}
			mysqli_close($conn);
		}
		?>
		<form method="POST">
		<div class="loginbox">
			<img src="78-780477_about-us-avatar-icon-red-png-clipart.png" class="avatar">
			<h1>Đăng nhập</h1>
			<p>Tên đăng nhập</p>
			<input type="text" name="ten" placeholder="Enter username"required>
			<p>Mật khẩu</p>
			<input type="password" name="pass" placeholder="Enter password"required>
			<input type="submit" name="sub" value="Login in">
			
			<a href="dangki1.php">Tạo tài khoản</a>
		</div>
		</form>
	</body>
</html>