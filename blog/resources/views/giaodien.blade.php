@extends('layouts.app')
<?php 
    $id="";
    if(isset(Auth::user()->id))
    $id=Auth::user()->id;
    if($id!="")
    {
        session_start();
        $_SESSION['user']=$id;
    }
?>
<!DOCTYPE HTML>
<head>	
    <meta http-equiv= "content-type" content="text/html; charset=utf-8" /> 
	
	<link rel="stylesheet" href="./css/style-footer.css">
    <title>BookNow - Tri thức trong từng trang sách</title>    
    <link rel="stylesheet" style="style/sheet" href="./css/index.css" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Lavarel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-------------------------------------slide-------------------------------->
    <link rel="stylesheet" style="style/sheet" href="./css/style1.css">
    <script src="./js/jquery-1.3.2.min.js" type="text/javascript"></script>
    <script lang="javascript" type="text/javascript" src="./js/jquery.easing.js"></script>
    <script lang="javascript" type="text/javascript" src="./js/script.js"></script>
    <script lang="javascript" type="text/javascript" src="./js/slidechayhinh.js"></script>
   <!--  <script type="text/javascript">
     $(document).ready( function(){	
    		var buttons = { previous:$('#lofslidecontent45 .lof-previous') ,
    						next:$('#lofslidecontent45 .lof-next') };
    						
    		$obj = $('#lofslidecontent45').lofJSidernews( { interval : 4000,
    												direction		: 'opacitys',	
    											 	easing			: 'easeInOutExpo',
    												duration		: 2000,
    												auto		 	: true,
    												maxItemDisplay  : 4,
    												navPosition     : 'horizontal', // horizontal
    												navigatorHeight : 32,
    												navigatorWidth  : 80,
    												mainWidth:1000,
    												buttons			: buttons} );	
    	});
    </script> -->
</head>
<body>    
    
    <!-- Begin : wrapper -->   
    <div id="wrapper">  
                  
        <!-- Begin : header -->        
        <div id="header">            
            <div id="lg-header">                
                <h1><img src="./img/logoheader.png"></h1>            
            </div>            
            <div id="bg-header">
				 </div>           
            <div id="menu-header">                
                 <?php require_once("./home_include/menu_ngang.php");?>       
            <!-- End: menu -->            
            </div>
                   
        </div>        
        <!-- End : header -->   
        
        <!-- Begin : content -->
        <div id="content">
        
            <div id="showContainer">

                <div class="imageContainer" id="im_1">
                <img src="./img/slide/1.jpg" width="1000" height="350">
                </div>

                <div class="imageContainer" id="im_2">
                <img src="./img/slide/2.jpg" width="1000" height="350">
                </div>

                <div class="imageContainer" id="im_3">
                <img src="./img/slide/3.jpg" width="1000" height="350">
                </div>

                <div class="imageContainer" id="im_4">
                <img src="./img/slide/4.jpg" width="1000" height="350">
                </div>
                
                <div class="nutgiua">
                    <div class="navButton" id="previous">&#10094;</div>
                <div class="navButton" id="next">&#10095;</div>
                </div>
            
            </div>

            <!-- <div id="lofslidecontent45" class="lof-slidecontent" style="width:1000px; height:350px;">
				<div class="preload"><div></div></div>
				<div id="lof-main-outer">
					<ul class="lof-main-wapper">	
						<li><img src="./img/slide/1.jpg" width="1000" height="350"></li>
						<li><img src="./img/slide/2.jpg" width="1000" height="350"></li>
						<li><img src="./img/slide/3.jpg" width="1000" height="350"></li>
						<li><img src="./img/slide/4.jpg" width="1000" height="350"></li>
					</ul>
				</div>
				<div class="lof-navigator-wapper">
						<div onClick="return false" href="" class="lof-next">Next</div>
						<div class="lof-navigator-outer">
							<ul class="lof-navigator">
							   <li><img src="./img/slide/1.jpg" width="70" height="25" /></li>       		
							   <li><img src="./img/slide/2.jpg" width="70" height="25" /></li>       		
							   <li><img src="./img/slide/3.jpg" width="70" height="25" /></li>       		
							   <li><img src="./img/slide/4.jpg" width="70" height="25" /></li>       		      		
							</ul>
						</div>
						<div onClick="return false" href="" class="lof-previous">Previous</div>
				</div> 
            </div> -->
            
            <div id="main-content">
                <div id="left-content">
                    <?php require_once("./home_include/left_content.php");?>
                </div>
                <!-- End : Left-Content -->
                <div id="center-content">
                	<?php 
                	if($lenh==1)
                	require_once("./home_include/danhsachsp.php");
                	else if($lenh==2)
                	require_once("./home_include/chitiet.php");
                    else if($lenh==3)
                    require_once("./home_include/gioithieu.php");
                    else if($lenh==4)
                    {
                        $value = $request->session()->get('key');
                        print_r($value);
                    }
                	?>
                </div>
                <!-- End: Center-content -->
                
                <div id="right-content">
                    <?php require_once("./home_include/right_content.php");?>
                </div>
                <!-- End: Right -content -->
                
            </div>
            <!-- End : Main-content --> 
        </div>
        <!-- End: content -->
		
	<!--Begin: footer-->
	<div id="wrapper">
	<div id= "footer">
		<div id="footer1">
		  <div class="box"> 
		    <div align="center"><img src= "./img/logo1.png" height="auto" width="40%"><br>
	        </div>
		    <p align="center">Sách -Tri thức của nhân loại!</p>
		  </div>
			<div class="box1">
				<div id = "box_footer1">
					<ul>
						<li><a href = "/phanloai?dequi=1">&diams; Sản phẩm</a></li>
						<li><a href = "/phanloai?dequi=2">&diams; Phụ kiện</a></li>
						<li><a href = "/khuyenmai">&diams; Khuyến mãi</a></li>
					</ul>
				</div>
			</div>
			
			
		  <div class="box3">
			<p><strong>LIÊN HỆ</strong></p>
			<p>Địa chỉ: STU </p>
				 <p>Điện thoại: 0929807996</p>				
		  </div>
		  
		  <div class="box1">
		  <br><br>
			  <a href="https://www.facebook.com/DHCNSG"><img src= "./img/icon/facebook.png" width="20%" >  </a>
			  <!-- <a href="#"><img src= "./img/icon/instagram.png" width="20%" ></a> -->
		  </div>
	  </div>

		
		<div id="footer2">
			<span>© 2021 Booknow </span><a href="#"> </a>
		</div>
	</div>
	</div>
		
	<!--End footer-->
		   
    </div>    
    <!-- End : wrapper -->


</body>
</html>