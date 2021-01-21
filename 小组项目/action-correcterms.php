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
// 选择数据库
include('conn.php');

$id=$_GET["id"];
// 获取修改的术语

$ST= $_POST['ST'];
$TT = $_POST['TT'];
$UserName = $_POST['UserName'];
$uploadTime = $_POST['uploadTime'];
$category = $_POST['category'];

// 插入数据
mysqli_query($conn,"UPDATE termbase SET 
            ST='$ST', TT='$TT', UserName='$UserName', uploadTime='$uploadTime', category='$category' 
			WHERE id = '$id'") 
			
or die('添加数据出错：'.mysqli_error($conn)); 

echo "<div class='topnav'>用户管理后台<a class='active' href='my.php'>用户中心</a><a href='Dindex.php'>首页</a>
<a href='login.php?action=logout'>注销</a></div>";

if('mysqli_query')
{
//图片显示
echo'</br>';
echo'</br>';
    echo '<div align=center><img src="okay.jpg" align="center" width="200px"></div>';
echo'</br>';
echo '<div align=center>您的术语已经添加完毕！点此<a href="action-correctterms.php">继续修改</a></div>';
}
else
{
echo'</br>';
echo'</br>';
    echo '<div align=center><img src="wrong.jpg" align="center" width="200px"></div>';
echo'</br>';
echo '<div align=center>您的术语添加出现了错误！点此<a href="action-correctterms.php">重新修改</a></div>';
	echo "术语修改失败！请重新尝试！";
}
?>