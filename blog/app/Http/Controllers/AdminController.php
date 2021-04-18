<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\admin;

class AdminController extends Controller
{
    //
    public function taomau()
    {
    	$admin=new admin();
    	$admin->taikhoan="admin123";
    	$admin->matkhau=MD5("admin123");
    	$admin->ten="admin 1";
    	$admin->save();
    }

    public function admin()
    {
    	$check=isset($_GET['username']);
    	session_start();
    	if($check==true) 
    	{
    		$_SESSION['username']=$_GET['username'];
    		$_SESSION['idnd']=$_GET['id'];
    	}
	   	if(!isset($_SESSION['username']))
	   	{
			header('location:/loginadmin');   //redirect đến trang login.php
			exit();
	   	}
	   	return view("adminview");
    }

    // public function testses()
    // {
    // 	session_start();
    // 	$_SESSION['username']=$_GET['username'];
    // 	echo $_SESSION['username'];
    // }

    public function login()
    {
    	session_start();
		if(isset($_SESSION['username']))
		{
			header("location:/mainadmin");
		}
		return view('loginadmin');
    }

    public function checklogin(Request $rq)
    {
    	if(isset($_GET['login']))
		{
		    $username = $rq->get('user');
		    $password = MD5($rq->get('pass'));
		    $check = DB::select("select * from admins where taikhoan = ?",[$username]);
		    if($check == null)
		    {
		        echo "<script language='javascript'>
										alert('Tài khoản không tồn tại');	
									</script>";
				?>
				<script>window.location="/loginadmin";</script>
				<?php
				//header('localhost:/loginadmin');
		    }
		    else
		    {
		        $check2 = DB::select("select * from admins where taikhoan = ? and matkhau = ?",[$username,$password]);
		        if($check2 == null)
		        {
		            echo "<script language='javascript'>
										alert('Mật khẩu không chính xác');
									</script>";
					?>
					<script>window.location="/loginadmin";</script>
					<?php
					//header('localhost:/loginadmin');
		        }
		        else
		        {
				 if($check2!=null)
		            {
		            	$id=$check2[0]->id;
						// echo $_SESSION['username'];
						// print_r($check2);
		                 echo "<script language='javascript'>
										alert('Đăng nhập quản trị thành công');
										window.location='/mainadmin?username=".$username."&id=".$id."';
									</script>";
						//header('localhost:/mainadmin');".$username"
		            }
		        }
		    }
		}
		//End if login
    }

    public function logout()
    {
		session_start();
		unset($_SESSION['username']);
		unset($_SESSION['idnd']);
		echo 	"<script language='javascript'>
					alert('Thoát quản trị thành công');
					window.location='/mainadmin';
				</script>";
    }
}
