<?php
   include('conn.php');
   mysqli_query($conn,"set names utf8"); 
   $id=$_GET["id"];
   $sql_delete="DELETE FROM translationmemory WHERE ID ={$id}";
   if(mysqli_query($conn,$sql_delete))   
	{  
		echo "<script>alert('删除成功！')</script>";
	}   
	else 
	{  
		echo "<script>alert('删除失败！')</script>";
	}
	echo "<script>location='memory.php'</script>"; 
   
   
?>