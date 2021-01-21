<html>
<head>
<style type="text/css">
.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
display: block;
text-align: left;
  padding: 10px 30px;
  text-decoration: none;
  font-size: 25px;
}

.topnav a {
  float: right;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 50px;
  text-decoration: none;
  font-size: 15px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 8px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: left;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>
<?php
session_start();
error_reporting(0);

include('conn.php');
$email = $_SESSION['email'];
$username = $_SESSION['name'];
$password = $_SESSION['password'];

//检测邮箱及密码是否正确
$check_query = mysqli_query($conn,"select name from users where Email='$email' and password='$password'");

//包含数据库连接文件
include('conn.php');

if($result= mysqli_fetch_array($check_query)){
    //登录成功
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $result['name'];
	$name=$result['name'];
    
echo "<div class='topnav'>$name,欢迎你！<a class='active' href='my.php'>用户中心</a> <a href='login.php?action=logout'>注销</a>
<a href='Dindex.php'>主页</a></div>";
}
else
{
	echo "<div class='topnav'>中华文化遗产术语库与翻译记忆库<a class='active' href='login.html'>用户登录</a> <a href='register.html'>新用户注册</a>
<a href='Dindex.php'>主页</a></div>";
   
}

?>
</html>
