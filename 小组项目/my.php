<html>
<head>
<title>用户中心</title>
<style type="text/css">
table.hovertable {
text-align=center;
margin:auto;
    font-family: verdana,arial,sans-serif;
    font-size:20px;
    color:#333333;
    border-width: 20px;
    border-color: #999999;
    border-collapse: collapse;
}
table.hovertable th {
    background-color:#c3dde0;
    border-width: 20px;
    padding: 8px;
    border-style: solid;
    border-color: #a9c6c9;
}
table.hovertable tr {
    background-color:#d4e3e5;
}
table.hovertable td {
    border-width: 5px;
    padding: 30px;
    border-style: solid;
    border-color: #a9c6c9;
}
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
</head>
 <?php
session_start();
error_reporting(0);

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['email'])){
    header("Location:login.html");
    exit();
}
//包含数据库连接文件
include('conn.php');
$email = $_SESSION['email'];
$username = $_SESSION['name'];
$user_query = mysqli_query($conn,"select * from users where Email= $email;");
$row = mysqli_fetch_array($user_query);

echo "<div class='topnav'>用户管理后台<a class='active' href='upload.php'>添加术语</a><a href='Dindex.php'>返回首页</a>
<a href='login.php?action=logout'>点此注销</a><a href='memory.php'>翻译记忆库</a></div>";
echo '<h1 style="border:2px black solid;font-size:14px;width:250px">用户信息：<br />';
echo '用户名：',$username,'<br />';
echo '邮箱：',$email,'<br />';
echo '注册日期：',date("Y-m-d", $row['regdate']),'<br /></h1>';

   $sql = "SELECT * FROM `termbase`";
 
   mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况
   $result = mysqli_query($conn,$sql);
   //var_dump($result);
?>
<body>
<div style="text-align:center;margin:25 0 0 25">  
<table class="hovertable">
<tr>
<td>术语</td>
<td>译文</td>
<td>上传用户</td>
<td>上传时间</td>
<td>分类</td>
<td>用户操作1</td>
<td>用户操作2</td>
</tr>

  <?php
   while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    echo "<tr><td>".$row["ST"]."</td>";
	echo "<td>".$row["TT"]."</td>";
	echo "<td>".$row["UserName"]."</td>";
	echo "<td>".$row["uploadTime"]."</td>";
	echo "<td>".$row["category"]."</td>";
	echo "<td><a href='update.php?id={$row['id']}'>编辑</a></td>";
	echo "<td><a href='action-deleteterms.php?id={$row['id']}'>删除</td>";
	echo mysqli_error($conn);
    } 
    
echo "</table>";

  ?>
  </body>
  </html>