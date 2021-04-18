<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\danhmuc;

class danhmucController extends Controller
{
    //
    public function themdm()
    {
    	$danhmucgoc=DB::select("select * from danhmucs where dequi=0");
    	return view('danhmuc.themdanhmuc')->with('danhmucgoc',$danhmucgoc);
    }

    public function adddm(request $rq)
    {
    	$db1=DB::select('select * from danhmucs');
    	$dem1=count($db1);
    	if($rq->tendm!="")
    	{
    		$danhmuc=new danhmuc;
    		$danhmuc->tendm=$rq->tendm;
    		$danhmuc->dequi=$rq->dequi;
    		$danhmuc->save();
    		$db2=DB::select('select * from danhmucs');
    		$dem2=count($db2);
    		if($dem1==$dem2)
    		{
	    		echo "<p align = center>Thêm thất bại !!!</p>";
	            echo '<meta http-equiv="refresh" content="1;url=/themdm">';
        	}
        	else
        	{
        		echo "<p align = center>Thêm thành công !!!</p>";
            	echo '<meta http-equiv="refresh" content="1;url=/themdm">';
        	}
    	}
    	else
    	{
    		echo "<p align = center>Chưa nhập tên danh mục !!!</p>";
            echo '<meta http-equiv="refresh" content="1;url=/themdm">';
    	}
    }
    //end themdanhmuc

    public function suadm()
    {
    	$id=$_GET['id'];
    	$dmsua=DB::select('select * from danhmucs where id=?',[$id]);
    	$dmgoc=DB::select('select * from danhmucs where dequi=0');
    	return view('danhmuc.suadm')->with('dmsua',$dmsua)->with('danhmucgoc',$dmgoc);
    }

    public function updatedm(request $rq)
    {
    	$id=$rq->id;
    	$dmsua=danhmuc::find($id);
    	if($dmsua==null)
        {
            echo "<p align = center>Không tìm thấy danh mục để sửa !!!</p>";
            echo '<meta http-equiv="refresh" content="1;url=/themdm">';
        }
        else
        {
            $dmsua->tendm=$rq->tendm;
            $dmsua->dequi=$rq->dequi;
            $dmsua->save();
            echo "<p align = center>Sửa thành công !!!</p>";
            echo '<meta http-equiv="refresh" content="1;url=/suadm?id='.$id.'">';
        }
    }

    public function xoadm()
    {
        $id=$_GET['id'];
        $dmxoa=danhmuc::find($id);
        if($dmxoa!=null)
        {
            $dmxoa->delete();
            if(danhmuc::find($id)==null)
            {
                echo "<p align = center>Xóa thành công !!!</p>";
                echo '<meta http-equiv="refresh" content="1;url=/mainadmin?lenh=htdm">';
            }
            else
            {
                echo "<p align = center>Xóa thất bại !!!</p>";
                echo '<meta http-equiv="refresh" content="1;url=/mainadmin?lenh=htdm">';
            }
        }
        else
        {
            echo "<p align = center>Không tìm thấy danh mục !!!</p>";
            echo '<meta http-equiv="refresh" content="1;url=/mainadmin?lenh=htdm">';
        }
    }
}
