<html>
<head>
<title>登录反馈</title>
<style type="text/css">
@import url(./allcss/sign.css)
</style>
</head>

</html>
<?php
session_start();
error_reporting(0);

if($_GET['action'] == "logout"){
    unset($_SESSION['email']);
    unset($_SESSION['name']);
//标题栏
echo "<div class='topnav'>中华文化遗产术语库与翻译记忆库<a class='active' href='my.php'>用户中心</a> <a href='Dindex.php'>首页</a></div>";
//图片显示
echo'</br>';
echo'</br>';
    echo '<div align=center><img src="okay.jpg" align="center" width="200px"></div>';
echo'</br>';
    echo '<div align=center font-size=10000px>注销成功！点击此处重新 <a href="login.html">登录</a></div>';
    exit;
}
header("Content-Type: text/html;charset=utf-8");

//登录
//if(!isset($_POST['submit'])){
//    exit('非法访问!');
//}

$email = htmlspecialchars($_POST['email']);
$password = $_POST['password'];

//包含数据库连接文件
include('conn.php');
//检测邮箱及密码是否正确
$check_query = mysqli_query($conn,"select name from users where Email='$email' and password='$password'");

//if (!$check_query) {
//printf("Error: %s\n", mysqli_error($conn));
//exit();
//}
if( $result= mysqli_fetch_array($check_query)){
    //登录成功
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $result['name'];
	$_SESSION['password'] = $password;
	$name=$result['name'];
//标题导航栏
echo "<div class='topnav'>$name,欢迎你!<a class='active' href='my.php'>用户中心</a> <a href='Dindex.php'>首页</a>
<a href='login.php?action=logout'>注销</a></div>";
//显示
echo'</br>';
echo'</br>';
echo '<div align=center margin="200px"><img src="okay.jpg" align="center" width="200px" ></div>';
echo'</br>';
echo '<h1 style="text-align:center" margin="200px">恭喜您，您已登录成功！</h1>';
    exit;
} 
else {
echo "<div class='topnav'>中华文化遗产术语库与翻译记忆库<a class='active' href='Dindex.php'>首页</a></div>";
echo'</br>';
echo'</br>';
echo'<div align=center margin="200px"><img src="wrong.jpg" align="center" width="200px" ></div>';
echo'</br>';
echo'<div style="text-align:center" margin="200px">登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a>重试</div>';
}

//注销登录

?>

 <script type="text/javascript">
            //刷新or取消
            document.getElementById('i77').onclick = function(){
                location.reload();
            }
            document.getElementById('i222').onclick = function(){
                location.reload();
            }

            //用户名验证
            function checkname(){ 
                var div = document.getElementById("div1"); 
                div.innerHTML = ""; 
                var name1 = document.tijiao.text1.value; 
                if (name1 == "") { 
                div.innerHTML = "用户名不能为空！"; 
                document.tijiao.text1.focus(); 
                return false; 
            } 
                if (name1.length < 4 || name1.length > 16) { 
                div.innerHTML = "长度4-16个字符"; 
                document.tijiao.text1.select(); 
                return false; 
            } 
                var charname1 = name1.toLowerCase(); 
                for (var i = 0; i < name1.length; i++) { 
                var charname = charname1.charAt(i); 
                if (!(charname >= 0 && charname <= 9) && (!(charname >= 'a' && charname <= 'z')) && (charname != '_')) { 
                    div.innerHTML = "用户名包含非法字符"; 
                    document.form1.text1.select(); 
                    return false; 
                } 
            } 
                return true;
        }

            //密码验证
            function checkpassword(){ 
                var div = document.getElementById("div2"); 
                div.innerHTML = ""; 
                var password = document.tijiao.text2.value; 
                if (password == "") { 
                div.innerHTML = "密码不能为空"; 
                document.tijao.text2.focus(); 
                return false; 
            } 
                if (password.length < 4 || password.length > 16) { 
                div.innerHTML = "密码长度为4-16位"; 
                document.tijiao.text2.select(); 
                return false; 
                } 
                return true; 
        }

            function checkrepassword(){ 
                var div = document.getElementById("div3"); 
                div.innerHTML = ""; 
                var password = document.tijiao.text2.value; 
                var repass = document.tijiao.text3.value; 
                if (repass == "") { 
                div.innerHTML = "密码不能为空"; 
                document.tijiao.text3.focus(); 
                return false; 
            } 
                if (password != repass) { 
                div.innerHTML = "密码不一致"; 
                document.tijiao.text3.select(); 
                return false; 
            } 
                return true; 
        }
        //邮箱验证
        function checkEmail(){ 
            var div = document.getElementById("div4"); 
            div.innerHTML = ""; 
            var email = document.tijiao.text5.value; 
            var sw = email.indexOf("@", 0); 
            var sw1 = email.indexOf(".", 0); 
            var tt = sw1 - sw; 
            if (email.length == 0) { 
            div.innerHTML = "邮箱不能为空"; 
            document.tijiao.text5.focus(); 
            return false; 
        } 

            if (email.indexOf("@", 0) == -1) { 
            div.innerHTML = "必须包含@符号"; 
            document.tijiao.text5.select(); 
            return false; 
        } 

            if (email.indexOf(".", 0) == -1) { 
            div.innerHTML = "必须包含.符号"; 
            document.tijiao.text5.select(); 
            return false; 
        } 

            if (tt == 1) { 
            div.innerHTML = "@和.不能一起"; 
            document.tijiao.text5.select(); 
            return false; 
        }

            if (sw > sw1) { 
            div.innerHTML  = "@符号必须在.之前"; 
            document.tijiao.text5.select(); 
            return false; 
        } 
            else { 
            return true; 
            }
        return ture; 
        }

            function check(){ 
            if (checkname() && checkpassword() && checkrepassword() && checkEmail()) { 
            return true; 
            } 
            else { 
            return false; 
        } 
    } 
    </script>