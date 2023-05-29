<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href='ssn.css'>
</head>
<body>
     <form action="login.php" method="post">
		<img class="mySlides" src="images/datblack.jpg" style="width: 150px;">
     	<h2>تسجيل الدخول</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>الاسم</label>
     	<input type="text" name="uname" placeholder="User Name" autocomplete="off"><br>

     	<label>كلمة المرور</label>
     	<input type="password" name="password" placeholder="Password" autocomplete="off"><br>

     	<button type="submit">تسجيل الدخول</button>
     </form>
</body>