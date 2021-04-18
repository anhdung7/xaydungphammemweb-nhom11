<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" src="./admin/ckeditor/ckeditor.js"></script>
<title>Quản Lý BookNow</title>
<link rel="stylesheet" type="text/css" href="./admin/css/index.css">
</head>
<body>
<div id="wapper">
	<div id="header">
		<div id="lg-header">	
			<img src="./img/logoheader.png">
		</div><!-- End .bg-lg-header -->
		<div id="bg-header">
		</div><!-- End .bg-header -->
	</div><!-- End .header -->
	<div id="content">
		<div id="top-content">
						<p>Chào bạn <font color="green"><b><u><?= $_SESSION['username']?></u></b></font><a href="/logout"> | Thoát</a></p>
		</div>
		<div id="main-content">
			<div id="left-content">
				<div class="danhmucsp">
					<div class="center">
					<h4>Quản lý</h4>
						<ul>
							<li><a href="/mainadmin">Trang chủ</a></li>
							<li><a href="/mainadmin?lenh=htsp"> Quản lý sản phẩm</a></li>
							<li><a href="/mainadmin?lenh=htdm"> Quản lý danh mục</a></li>
							<li><a href="/mainadmin?lenh=hthd"> Quản lý hóa đơn</a></li>
							<li><a href="/mainadmin?lenh=htnd"> Quản lý người dùng</a></li>
						</ul>
					</div><!-- End .center -->
				</div>	<!-- End .menu-left -->
			</div><!-- End .left-content -->
			<!---------------- Hiển trị content-admin------------------->
			
			
			<div id="center-content">
                <?php
                    require_once("./admin/maincontent/content_admin.php");   //trang này sẽ điều hướng các liên kết của menu danh mục quản lý ở trên
                ?>
			</div>
		</div><!-- End .main-content -->
	</div><!-- End .content -->
	
</div><!-- End .wapper -->
</body>
</html>