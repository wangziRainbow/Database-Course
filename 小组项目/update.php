
<?php
include('conn.php');
mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况



 //选择数据表中的字段
$id=$_GET["id"];
$sql = "SELECT * FROM termbase WHERE ID={$id}";

mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$ST= $row['ST'];
$TT = $row['TT'];
$UserName = $row['UserName'];
$uploadTime = $row['uploadTime'];
$category = $row['category'];

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>术语修改</title>
<style type="text/css">
@import url(uploadcss.css)
</style>
<script language=JavaScript>
<!--

function InputCheck(uploadform)
{
  if (uploadform.ST.value == "")
  {
    alert("请输入术语原文!");
    uploadform.ST.focus();
    return (false);
  }
  if (uploadform.TT.value == "")
  {
    alert("请输入术语译文!");
    uploadform.password.focus();
    return (false);
  }
  if (uploadform.UserName.value == "")
  {
    alert("请输入上传用户!");
    uploadform.UserName.focus();
    return (false);
  }
  if (uploadform.uploadTime.value == "")
  {
    alert("请输入上传时间!");
    uploadform.uploadTime.focus();
    return (false);
  }
  if (uploadform.category.value == "")
  {
    alert("选择术语类别!");
    uploadform.username.focus();
    return (false);
  }
}

//-->
</script>
</head>
<?php
echo "<div class='topnav'>用户管理后台<a class='active' href='my.php'>用户中心</a><a href='Dindex.php'>首页</a>
<a href='login.php?action=logout'>注销</a></div>";
?>
<body>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<fieldset>

<legend>术语修改</legend>
<form method="POST" action="action-correcterms.php?id=<?php echo $id?>" name="uploadform" onSubmit="return InputCheck(this)"> 
						
	<p><label>术语原文：</label><input type="text" name="ST" value="<?php echo $ST?>"> </p>
   <p> <label>术语译文：</label><input type="text" name="TT" value="<?php echo $TT?>">  </p>
    <p><label>上传用户：</label><input type="text" name="UserName" value="<?php echo $UserName?>"> </p> 
    <p><label>上传日期：</label><input type="date" name="uploadTime">  </p>
     <p><label>分类：</label><input type="text" name="category" value="<?php echo $category?>">  </p>
	<p><input type="submit" value="更新"/>  </p>
			
</form>
</fieldset>
</body>
</html>