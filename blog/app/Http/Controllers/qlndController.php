<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\user;

class qlndController extends Controller
{
    //
    public function xoand()
    {
    	$idxoa=$_GET['id'];
    	$userxoa=User::find($idxoa);
    	if($userxoa!=null)
    	{
    		$userxoa->delete();
    		echo "<p align = center>Xóa thành công !!!</p>";
	        echo '<meta http-equiv="refresh" content="1;url=/mainadmin?lenh=htnd">';
    	}
    	else
    	{
    		echo "<p align = center>Xóa thất bại !!!</p>";
	        echo '<meta http-equiv="refresh" content="1;url=/mainadmin?lenh=htnd">';
    	}
    }

    public function suand()
    {
        $id=$_GET['id'];
        $usersua=User::find($id);
        return view('qlnd.suand')->with('usersua',$usersua);
    }

    public function updatend(request $rq)
    {
        if(isset($rq->name))
        {
            $id=$rq->id;
            $usersua=User::find($id);
            $checkphone=preg_match('/^(0)[3-9][0-9]{8}$/', $rq->phone);
            if($checkphone==false||$rq->name=="")
            {
                echo "<p align = center>Dữ liệu không hợp lệ !!!</p>";
                echo '<meta http-equiv="refresh" content="1;url=/suand?id='.$id.'">';
            }
            else if($usersua!=null)
            {
                $usersua->name=$rq->name;
                $usersua->phone=$rq->phone;
                $usersua->diachi=$rq->diachi;
                $usersua->save();
                echo "<p align = center>Sửa thành công !!!</p>";
                echo '<meta http-equiv="refresh" content="1;url=/suand?id='.$id.'">';
            }
            else
            {
                echo "<p align = center>Không tìm thấy user !!!</p>";
                echo '<meta http-equiv="refresh" content="1;url=/suand?id='.$id.'">';
            }
        }
        else
        {
            echo "<p align = center>Sửa thất bại !!!</p>";
            echo '<meta http-equiv="refresh" content="1;url=/suand?id='.$id.'">';
        }
    }
}
