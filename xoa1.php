<?php
		
			
			$conn=mysqli_connect("localhost","root","","banglaixe");
			$kt="select * from cauhoimoto ";
			$kn=mysqli_query($conn,$kt);
			mysqli_set_charset($conn,'utf8');
			if(isset($_GET['id']))
			{
				
					
					//move_uploaded_file($tmp_name,$path.$hinhanh);
						$sql="delete from cauhoimoto where id='".$_GET['id']."'";
						mysqli_query($conn,$sql);
						header("location:qlycauhoi2.php");
				}
			
		?>