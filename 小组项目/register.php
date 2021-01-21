<html>
<head>
<meta charset="UTF-8">
<style type="text/css">
@import url(css1.css)
</style>
</head>
<body>
<div class="topnav">术语与翻译记忆管理系统
  <a class="active" href="login.html">用户登录</a>
  <a href="#about">关于我们</a>
<a href="resgister.html">新用户注册</a>
  <a href="Dindex.php">主页</a>
</div>
</body>
</html>
<?php
 
 if(!isset($_POST['submit2'])){
  exit('非法访问!');
}
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
//注册信息判断
if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)){
echo'<div align=center><img src="wrong.jpg" width="150px" height="60px"></div>';
    exit('<div text=center>错误：用户名不符合规定。<a href="javascript:history.back(-1);">返回</a></div>');
}
if(strlen($password) < 6){
echo'<div align=center><img src="wrong.jpg" width="150px" height="60px"></div>';
    exit('<div text=center>错误：密码长度不符合规定。<a href="javascript:history.back(-1);">返回</a><div>');
}
if(!preg_match('/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i', $email)){
echo'<div align=center><img src="wrong.jpg" width="150px" height="60px"></div>';
    exit('<div text=center>错误：电子邮箱格式错误。<a href="javascript:history.back(-1);">返回</a></div>');
}
//包含数据库连接文件
include('conn.php');
//检测用户名是否已经存在
$check_query = mysqli_query($conn,"select email from users where Email='$email' limit 1");
if(mysqli_fetch_array($check_query)){
echo'<div align=center><img src="wrong.jpg width="150px" height="60px"" >注册问题</div>';
    echo '<div text=center>错误：邮箱 ',$email,' 已注册使用。<a href="javascript:history.back(-1);">返回</a>';
    exit;
}

//写入数据
$sql = "INSERT INTO users(Name,password,Email)VALUES('$username','$password','$email')";
if(mysqli_query($conn,$sql)){
    exit('<div align=center><img src="success.png" width="150px" height="60px"><font color=red>您已成功注册该系统！请点击此处 </font><a href="login.html">登录</a></div>');
} else {
echo'<div align=center><img src="wrong.png" width="150px" height="60px"></div>';
    echo '抱歉！添加数据失败：',mysqli_error($conn),'<br />';
    echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';
}
?>
