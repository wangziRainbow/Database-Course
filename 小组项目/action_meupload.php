<?php
echo "<div class='topnav'>文件上传结果<a class='active' href='memo_upload.php'>继续上传文件</a><a href='Dindex.php'>返回首页</a>
<a href='login.php?action=logout'>点此注销</a><a href='memory.php'>翻译记忆库</a></div>";
include('conn.php');

if ($_FILES["file"]["error"] > 0)
  {
	echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
	echo "Upload: " . $_FILES["file"]["name"] . "<br />";
	echo "Type: " . $_FILES["file"]["type"] . "<br />";
	echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
	echo "Stored in: " . $_FILES["file"]["tmp_name"];
  
  
	if($_FILES["file"]["type"] == "application/xml")
	{
		echo "<br />";
		echo "This is an XML file.";
	}
	
	if (file_exists("upload/" . $_FILES["file"]["name"]))
	{
		echo $_FILES["file"]["name"] . " already exists. ";
	}
	else
	{
		$file = $_FILES["file"];
		$filename=$file["tmp_name"];
		$pinfo=pathinfo($file["name"]);
		$ftype=$pinfo['extension'];  
		$qianzhui= date("ymdhis").rand();
		$savename = $qianzhui.".".$ftype;
		$destination = "upload/".$savename;
		move_uploaded_file($filename,$destination);
		echo "Stored in: " . $destination;
		
		
		$xml = simplexml_load_file($destination);
		$json = json_encode($xml);
		$jsondata = json_decode($json,true);
	
		
		foreach ($jsondata["body"]["tu"] as $tu)
		{
			$ST = $tu["tuv"][0]["seg"];
			$TT = $tu["tuv"][1]["seg"];
        
			$insert_sql = "INSERT INTO `translationmemory` (`ST`, `TT`) VALUES ('{$ST}', '{$TT}')";
        
			$status = mysqli_query($conn,$insert_sql);
        
			if(!$status)
			{
				echo "数据导入失败！！";
			}
			else
			{
				echo "数据导入成功！！";
			}
		}
		
   
	}
  }
 ?>