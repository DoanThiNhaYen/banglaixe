<html>
<head>
	<meta charset="utf8">
	<style>
		#xe{
			//margin:5px;
			//padding: 20px;
			//width:20px;
			//height:20px;
			//font-size:25px;
		}
		input[type="radio"]{
			width:19px;
			height:19px;
			//float:left;
			padding:10px;
		}
		
	</style>
</head>
<body>
<?php
	if(isset($_POST['sub']))
	{
		$conn=mysqli_connect("localhost","root","","banglaixe");
		$a=$_POST;
		foreach($a as $key =>$value)
		{
// Check connection
			//echo $key;
			$sql="SELECT dapandung1 FROM cauhoixemay where id='$key'";
			$result=mysqli_query($conn,$sql);
 
// Associative array
		$row=mysqli_fetch_assoc($result);
		//echo var_dump($row);
		foreach ($row as $value1)
		{
			echo $value1;
		}
		}
	}
			
			//$c=implode(",",(string)$arr);
			//if($b==$arr)
			//{
			//	$count++;
			//	echo "<script>alert('Kết quả:".$count."/20')</script>";
				//echo $key;
			//}
			//foreach($b as $value)
			//{
			//	$ck=mysqli_query($conn,"select dapandung1 from cauhoixemay where cauhoi='".$value[$id]."'");
			//	$rr=mysqli_fetch_array($ck);
			//	if($rr==$b)
			//	{
			//		$count=$count+1;
			//	}
			//	else{
			//		echo "ko cos";
			//	}
			//}
		//}
		//$count=0;
		//foreach($a as $id => $value)
		//{
			//$c=is_array($a);
			//$b=explode(',',$c);
		//	echo $id."|".$value."<br>";
			//$sql2="select dapandung1 from cauhoixemay where id=$id";
			//$re2=mysqli_query($conn,$sql2);
			//$arr=is_array(mysqli_fetch_array($re2));
			//$c=explode(",",(string)$arr);
			//if((array)$value==$c)
			//{
		//		$count++;
				//echo "<script>alert('Kết quả:$count/20')</script>";
			//	echo"$count/20";
			//}
			//else{
			//	echo"ko co";
			//}
			//echo "$value";
			
	//	}
		
	//}
	//else
	//	{ echo "ko";}*/
	
?>
<form method="POST">
<?php
	//echo"123";
	
	$conn=mysqli_connect("localhost","root","","banglaixe");
	
		$sql="select * from cauhoixemay    LIMIT 1,20";
		$re=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_array($re))
		{
			
			$cau=$row['cauhoi'];
			$id=$row['id'];
			//$a=array($cau);
			//shuffle($a);
			//echo $r;
					//header("Content-type:/450 cau hoi sat hach lai xe");
					echo "<table border='0' align='center'>";
					echo "<tr><td>".$id."</td></tr>
						<tr><td><img src='/BT/150 câu/$cau'/height='400' width='740'></td></tr>";
					echo "</table>";
					/*if(isset($_POST['cau']))
	{*/
	//	$count=0;
		//$conn=mysqli_connect("localhost","root","","banglaixe");
		//if(!empty($_POST['sub']))
		//{
			
			
			/*foreach($arr as $value){
			$c=$value;}
			$a=($_POST['cau']);
			//$b=implode(',',$a);
			//$b=array($id=>$value);
			foreach($a as $key=> $value)
			{
				if($value==$c){
					echo "đùng";
				}
				else { echo "sai";}
				//$d=$id
				//echo implode(',',$b);
			}*/
			/*if(isset($_POST['sub']))
			{
			$sql2="select dapandung1 from cauhoixemay where id='".$id."'limit 1" ;
			$re2=mysqli_query($conn,$sql2);
			$arr=mysqli_fetch_assoc($re2);
			
			foreach($arr as $value){
			$c=$value;}
			}
		
					/*if($id){
						if($c==$b){
						//$count=$count+1;
						//echo "<script>alert('Kết quả:$count/20')</script>";
						}
						else{echo"ko có";}
					}
				//else{echo "ko";}
    //Print the element out.
			} 

			
		}*/
	
					?>
					<table align="center" >
					<tr><td><input type ="checkbox" name="<?php echo $row['id'];?>" id="xe" value="1"/>1 </td>
					<td><input type ="checkbox" name="<?php echo $row['id'];?>" id="xe" value="3"/> 3 </td>
					<td><input type ="checkbox" name="<?php echo $row['id'];?>"  id="xe" value="4"/> 4 </td>
					<td><input type ="checkbox" name="<?php echo $row['id'];?>"  id="xe" value="1,2"/> 1,2 </td></tr>
					<tr><td><input type ="checkbox" name="<?php echo $row['id'];?>"  id="xe" value="1,3"/> 1,3 </td>
					<td><input type ="checkbox" name="<?php echo $row['id'];?>"  id="xe" value="1,4"/> 1,4 </td>
					<td><input type ="checkbox" name="<?php echo $row['id'];?>"  id="xe" value="2,3"/> 2,3 </td>
					<td><input type ="checkbox" name="<?php echo $row['id'];?>"  id="xe" value="2,4"/> 2,4 </td>
					<td><input type ="checkbox" name="<?php echo $row['id'];?>"  id="xe" value="3,4"/> 3,4 </td></tr>
					</table>
					
 
	<?php	}	?>	
					<input type="submit" name="sub" class="btn btn-primary" value="Hoàn Thành"/>
					
</form>
</body>
</html>		

					
		


	

