<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\hoadon;
use App\sanpham;

class giohangController extends Controller
{
    //
    public function xemgiohang()
    {
    	return view('giohang.xemgiohang');
    }

    public function themvaogio()
    {
    	session_start();
    	if(isset($_SESSION['user']))
    	{
	    	if(isset($_GET['id']))	
			$stt=$_GET['id'];
	   		else $stt=-1;
	    	$soluong=1;
	    	if(isset($_GET['soluong']))
	    		$soluong=$_GET['soluong'];
	    	if($stt!=-1)
	    	$check=DB::select("select soluong from sanphams where id=?",[$stt]);
			$dem=$check[0]->soluong;
			if($dem==0)
			{
	        echo '<script language="javascript">
	      		alert("Sản phẩm này tạm thời hết hàng mời bạn chọn mua sản phẩm khác");
	            history.back(); 
	             history.go(-1);
	            </script>';
		    }
		    else if($_GET['sl']>$dem)
		    {
				
		        echo '<script language="javascript">
	            alert("Sỗ lượng bạn đặt mua lớn hơn số hàng còn lại trong kho");
	            history.back(); 
	             history.go(-2);
	            </script>';
		    }
			else
		    {
				
		        $_SESSION['cart'][$stt]=$_GET['sl'];
		        // $sp=DB::select('select * from sanphams where id=?',[$stt]);
		       	// Cart::add('id'=>$sp['0']->id);
		        echo '<script language="javascript">
		            alert("Sản phẩm đã được thêm vào giỏ hàng của bạn");
		            history.back(); 
		             history.go(-1);
		            </script>';
		    }
		}
		else
		{
			echo '<script language="javascript">
		            alert("Bạn chưa đăng nhập vào trang!!");
		            window.location.href="/";
		            </script>';
		}
    }
    //end them vao gio

    public function xuligio(request $rq)
    {
    	session_start();
	    if (isset($_GET['lenh'])&& $_GET['lenh']=='destroy') {
	    	unset ($_SESSION['cart']);
			echo "
							<script language='javascript'>
								alert('Bạn đã xóa thành công');
								window.open('/','_self', 1);
							</script>
						";
	    }
	    else
	    {
	    	if(isset($_GET['huy']))
		    $sl=0;
		    else
		    $sl=$rq->sl;
			$stt=$rq->id;
			//echo "$stt";
		    if($sl==0)
		    unset ($_SESSION['cart'][$stt]);
		    else
		    $_SESSION['cart'][$stt]=$sl;
		    echo '<script language="javascript">
		            alert("cập nhật thành công");
		             window.location.href="/";
		            </script>';
	    }
    }
}
