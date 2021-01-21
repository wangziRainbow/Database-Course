<html>
<head>
<meta charset="utf-8"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>术语查询结果显示</title>
<style type="text/css">
@import url(./allcss/table.css)
</style>
</head>
<body>

<?php
   session_start();
   error_reporting(0);

   include('julogin.php');
   
   include('conn.php');
   mysqli_select_db($conn,"project1"); //连接数据库
   mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况
   $searchterm = $_POST["searchterm"]; //获取用户输入的检索词
   
   
   //选择数据表中的字段
   
   $sql = "SELECT * FROM `termbase` WHERE `ST` LIKE '%{$searchterm}%' or `TT` LIKE '%{$searchterm}%'";
 
   mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况
   $result = mysqli_query($conn,$sql);
   //var_dump($result);
?>

<div style="text-align:center;margin:25 0 0 25">  
<table class="hovertable">
<tr>
<td>术语</td>
<td>译文</td>
<td>上传用户</td>
<td>上传时间</td>
<td>分类</td>

</tr>
<?php
   while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    echo "<tr><td>".$row["ST"]."</td>";
    echo "<td>".$row["TT"]."</td>";
    echo "<td>".$row["UserName"]."</td>";
    echo "<td>".$row["uploadTime"]."</td>";
    echo "<td>".$row["category"]."</td>";
 
  
    echo mysqli_error($conn);
    } 
 
echo "</table>";


  $query = $_POST["searchterm"];
  
  $sql = "SELECT * FROM `translationmemory` WHERE `ST` LIKE '%{$query}%' or `TT` LIKE '%{$query}%'";
  
  $result = mysqli_query($conn,$sql);
  
  //$sql_count_data = "SELECT COUNT(*) AS 'total_rows' FROM `translationmemory` WHERE 'ST' LIKE '%{$query}%' OR 'TT' LIKE '%{$query}%' ";
  
  //$count_data = mysqli_query($conn, $sql_count_data);
  //$total_data = mysqli_fetch_array($count_data,MYSQLI_ASSOC);	
  //$total_rows = $total_data["total_rows"];  
   //echo $total_rows;
   
   
    echo "<p></p>";
    echo "<table class='hovertable'";
  	echo "<thead>
  		<td>原文</td>
  		<td>译文</td>
  	    </thead>";	
		
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
  	{   
        
  		echo "<tr>
  				<td>{$row["ST"]}</td>
  				<td>{$row["TT"]}</td>
  			</tr>";
    }

  echo "</table>";
  
?>		
 </div>		

</body>
</html>
