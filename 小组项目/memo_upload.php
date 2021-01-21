<html>
<head>
<title>上传双语文件</title>
</head>
<body>
<div class='topnav'>上传双语文件
<a href='Dindex.php'>返回首页</a>
<a href>翻译记忆库</a>
<a href='login.php?action=logout'>点此注销</a>
<a href='my.php'>用户中心</a></div>	
<form role="form" method="POST" action="action_meupload.php" enctype="multipart/form-data">
	
	<div class="form-group">
		<label>文件说明</label>
		<textarea class="form-control" rows="3" name="description" ></textarea>
	</div>
	<div class="form-group">
		<label for="file">上传文件</label>
		<input type="file" name="file" id="file" />
	</div>
	
	<button type="submit" class="btn btn-default">提交</button>
</form>	
	

</body>
</html>