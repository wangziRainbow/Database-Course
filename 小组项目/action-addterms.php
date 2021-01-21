<html>
<head>
<title>
</title>
<style type="text/css">
@import url(./allcss/sign.css)
</style>
</head>
</html>
<?php
echo "<div class='topnav'>用户管理后台<a class='active' href='my.php'>用户中心</a><a href='Dindex.php'>首页</a>
<a href='login.php?action=logout'>注销</a></div>";

?>

<?php
// 选择数据库
include('conn.php');

// 获取增加的术语
$ST= $_POST['ST'];
$TT = $_POST['TT'];
$UserName = $_POST['UserName'];
$uploadTime = $_POST['uploadTime'];
$category = $_POST['category'];

// 插入数据
mysqli_query($conn,"INSERT INTO termbase(ST,TT,UserName,uploadTime,category) 
			VALUES ('$ST','$TT','$UserName','$uploadTime','$category')") 
or die('添加数据出错：'.mysqli_error($conn)); 
if('mysqli_query')
{

echo'</br>';
echo'</br>';
echo '<div align=center margin="200px"><img src="okay.jpg" align="center" width="200px" ></div>';
echo'</br>';
echo '<div align=center>您的术语已经添加完毕！点此<a href="upload.php">继续添加</a></div>';
}
else
{
echo'</br>';
echo'</br>';
echo '<div align=center margin="200px"><img src="wrong.jpg" align="center" width="200px" ></div>';
echo'</br>';
echo '<div align=center>术语添加失败！点此重新<a href="upload.php">添加</a></div>';
}
?>
