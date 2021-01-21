<!DOCTYPE html>  
<html>  
<head lang="en">  
<meta charset="UTF-8">  
<title>请添加您的术语</title>  
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
<?php
session_start();
$username = $_SESSION['name'];

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

<legend>术语添加</legend>
<form name="uploadform" method="post" action="action-addterms.php" onSubmit="return InputCheck(this)">
<p>
<label for="email" class="label">术语原文</label><input type="text" name="ST">
<p/>
<p>
<label for="password" class="label">术语译文:</label><input type="text" name="TT">
<p/>
<p>
<label>分类：</label>
	<select name="category">
		<option value ="物质">物质</option>
		<option value ="非物质">非物质</option>
		<option value="其他">其他</option>
	</select>
</p>
<p>
<label>上传用户：</label><input type="text" name="UserName" value="<?php echo $username?>"> 
<p/>
<p>
<label>上传日期：</label><input type="date" name="uploadTime"></br> 
<p/>
<p>
<input type="submit" value="  提交  " class="left" />
</p>

</div>

</fieldset>
</div> 
</body>  
</html>