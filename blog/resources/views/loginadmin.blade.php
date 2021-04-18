<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="./admin/css/login.css" type="text/css">
</head>
<body>
	<div class="tieude1">
        <div class="quantri">
            <h2>Đăng nhập Admin</h2>
        </div>
    </div>
    <div class="admin_login">
    <form action="/checkloginadmin" method="get">
        <label>Tên tài khoản:</label><input type="text" name="user" placeholder=" Username"><br>
        <label>Mật khẩu:</label><input type="password" name="pass" placeholder=" Password"><br>
        <button name="login" class="dangnhap">Đăng nhập</button><button class="thoat"><a href="../index.php">Thoát</a></button>
    </form>
</div>
</body>
</html>