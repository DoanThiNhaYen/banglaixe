<?php
		
			
			$conn=mysqli_connect("localhost","root","","banglaixe");
			$kt="select * from cauhoixemay ";
			$kn=mysqli_query($conn,$kt);
			mysqli_set_charset($conn,'utf8');
			if(isset($_GET['id']))
			{
				
					
					//move_uploaded_file($tmp_name,$path.$hinhanh);
						$sql="delete from cauhoixemay where id='".$_GET['id']."'";
						mysqli_query($conn,$sql);
						header("location:qlycauhoi1.php");
				}
			
		?>