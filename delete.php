<?php

		//include "config.php";
		$conn=mysqli_connect("localhost","root","","banglaixe");
		$sql = "delete from cauhoixemay where id = '$_GET[id]'";
		mysqli_query($conn,$sql);
		echo "thanh cong";
		//header('location:qlycauhoi1.php');

?>