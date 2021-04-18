<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\hoadon;

class qlhdController extends Controller
{
    //
    public function xulyhd()
    {
    	if(isset($_GET['id']))    
    	//nếu được check vào checkbox (vì checkbox được đặt tên là id[] và mỗi checkbox giá trị là mahd
		{
		
		foreach($_GET['id'] as $id)
		{
			$_SESSION['id'][$id]=1;   
			//gán giá trị cho tất cả phần tử của mảng id là 1, nghĩa là các checkbox được chọn sẽ có giá trị 1
		}
		
	    //trangthai=1: đang xử lý; trangthai=2: đã giao hàng; trangthai=3: đã hủy
		if(isset($_GET['giaohang']))    //nếu nút giao hàng được nhấn 
		{
			foreach($_SESSION['id'] as $id=>$value)    
			//duyệt qua biến mảng session id, nếu các phần từ có giá trị 1 thì cập nhật trạng thái hoadon
			{
				if ($value==1) 
					DB::update("update hoadons set trangthai=2 where id=?",[$id]);
				unset($_SESSION['id']);
				echo "
							<script language='javascript'>
								alert('Đã giao hàng');
								window.open('/mainadmin?lenh=hthd','_self', 1);
							</script>
						";
			}
		}
		else if(isset($_GET['huy']))
			{ 
				
				foreach($_SESSION['id'] as $id=>$value)
					{
						if ($value==1){
						DB::update("update hoadons set trangthai=3 where id=?",[$id]);//cập nhật lại trạng thái hóa đơn
						$check=DB::select("SELECT idsp FROM chitiethoadons where chitiethoadons.idhd=?",[$id]);
						foreach ($check as $key => $value) {
							DB::update("update sanphams set daban=daban-1 where id=?",[$value->idsp]);
						}
					    
						}
						unset($_SESSION['id']);
						echo "
								<script language='javascript'>
									alert('Đã huỷ đơn hàng');
									window.open('/mainadmin?lenh=hthd','_self', 1);
								</script>
							";
					}
				}
				else
				{
					foreach($_SESSION['id'] as $id=>$value)
						{
							if ($value==1)
							{
								DB::delete("delete from hoadons where id=?",[$id]);
								DB::delete("delete from chitiethoadons where idhd=?",[$id]);
							}
							unset($_SESSION['id']);
							echo "
							<script language='javascript'>
								alert('Xóa thành công');
								window.open('/mainadmin?lenh=hthd','_self', 1);
							</script>
						";
						}
			
				}

			}		
			else echo "
							<script language='javascript'>
								alert('Bạn chưa chọn hóa đơn cần xử lý');
								window.open('/mainadmin?lenh=hthd','_self', 1);
							</script>
						";
		
    }
    //end xulyhd

    public function hienthihd()
    {
    	$id=$_GET['id'];
	    $cthoadon=DB::select("select * from sanphams, chitiethoadons where chitiethoadons.idhd=? and chitiethoadons.idsp=sanphams.id",[$id]);
	    $dem = count($cthoadon);
    	return view('hoadon.chitiethd')->with('dem',$dem)->with('cthoadon',$cthoadon);
    }
}
