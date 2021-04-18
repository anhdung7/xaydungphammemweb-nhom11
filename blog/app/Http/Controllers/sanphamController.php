<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\sanpham;

class sanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function themsp(Request $rq)
    {
        return view("sanpham.themsp");
    }

    public function upload(request $rq)
    {
         if ($rq->hasFile('hinhanh')) 
        {
            //dem tr khi them
            $ds1=DB::select('select * from sanphams');
            $count1=count($ds1);
            //lay gia tri
            $ten_sanpham=$rq->tensp;
            $gia=$rq->gia;
            $mau=$rq->mau;
            $chitiet=$rq->chitiet;
            $madm=$rq->madm;
            if(isset($rq->soluong))
                $soluong=$rq->soluong;
            else
                $soluong='0';
            if($rq->khuyenmai1!="")
                $khuyenmai1=$rq->khuyenmai1;
            else
                $khuyenmai1='0';
            $khuyenmai2=$rq->khuyenmai2;
            $hinh=$rq->hinhanh;
            $filename=$hinh->getClientOriginalName();
            //Lay gio cua he thong
            $dmyhis= date("Y").date("m").date("d").date("H").date("i").date("s");
            //Lay ngay cua he thong
            $ngay=date("Y").":".date("m").":".date("d").":".date("H").":".date("i").":".date("s");
            //them san pham
            $new= new sanpham;
            $new->tensp=$ten_sanpham;
            $new->hinhanh=$filename;
            $new->mau=$mau;
            $new->chitiet=$chitiet;
            $new->soluong=$soluong;
            $new->gia=$gia;
            $new->khuyenmai1=$khuyenmai1;
            $new->khuyenmai2=$khuyenmai2;
            $new->madm=$madm;
            $new->ngaycapnhat=$ngay;
            $new->daban='0';
            $new->trangthai='0';
            $new->save();
            //kiem tra sau them
            $ds2=DB::select('select * from sanphams');
            $count2=count($ds2);
            $check=$count2-$count1;
            if($check==1) {
            //them hinh
            $file = $rq->hinhanh;
            $file->move('./img/uploads', $file->getClientOriginalName());
                echo "<p align = center>Thêm sản phẩm thành công!</p>";
                echo '<meta http-equiv="refresh" content="1;url=/themsp">';
            }
            else 
            {
                echo "<p align = center>Thêm sản phẩm thất bại!!!</p>";
                echo '<meta http-equiv="refresh" content="1;url=/themsp">';
            }
        }
        else 
        {
            echo'Hình ảnh không thêm được!!';
            echo '<meta http-equiv="refresh" content="1;url=/themsp">';
        }
    }

    public function suasp()
    {
        $id=$_GET['id'];
        $sanphamsua=DB::select("select * from sanphams where id =?",[$id]);
        return view('sanpham.suasp')->with('spsua',$sanphamsua);
    }

    public function updatesp(request $rq)
    {
        $id=$_GET['id'];
        $tenhinhxoa=$_GET['hinh'];
        $update=sanpham::find($id);
        if($update!=null)
        {
            $ten_sanpham=$rq->tensp;
            $gia=$rq->gia;
            $mau=$rq->mau;
            $chitiet=$rq->chitiet;
            $madm=$rq->madm;
            $soluong=$rq->soluong;
            $khuyenmai1=$rq->khuyenmai1;
            $khuyenmai2=$rq->khuyenmai2;
            if(isset($rq->hinhanh))
            {
                $hinh=$rq->hinhanh;
                $filename=$hinh->getClientOriginalName();
            }
            else $filename=$tenhinhxoa;
            //Lay gio cua he thong
            $dmyhis= date("Y").date("m").date("d").date("H").date("i").date("s");
            //Lay ngay cua he thong
            $ngay=date("Y").":".date("m").":".date("d").":".date("H").":".date("i").":".date("s");
            //them san pham
            $update->tensp=$ten_sanpham;
            $update->hinhanh=$filename;
            $update->mau=$mau;
            $update->chitiet=$chitiet;
            $update->soluong=$soluong;
            $update->gia=$gia;
            $update->khuyenmai1=$khuyenmai1;
            $update->khuyenmai2=$khuyenmai2;
            $update->madm=$madm;
            $update->ngaycapnhat=$ngay;
            $update->daban='0';
            $update->trangthai='0';
            $update->save();
            $file = $rq->hinhanh;
            if($tenhinhxoa!=$filename)
            {
                if(unlink("./img/uploads/".$tenhinhxoa)){
                    echo "XÓA HÌNH THÀNH CÔNG";
                    $file->move('./img/uploads', $file->getClientOriginalName());
                }
                else{
                    echo "XÓA HÌNH THẤT BẠI(HOẶC KHÔNG CÓ HÌNH ĐỂ XÓA)";
                }
            }
            echo "<p align = center>Sửa sản phẩm thành công!</p>";
            echo '<meta http-equiv="refresh" content="1;url=/mainadmin?lenh=htsp">';
        }
        else 
        {
            echo "<p align = center>Không tìm thấy sản phẩm !!!</p>";
            echo '<meta http-equiv="refresh" content="1;url=/mainadmin?lenh=htsp">';
        }
    }

    public function xoasp()
    {
        if(isset($_GET['id']))
        {
            foreach($_GET['id'] as $id)
            {
                $_SESSION['id'][$id]=1;
            }
            if(isset($_GET['xoa']))
                    {
                        foreach($_SESSION['id'] as $id=>$value)
                        {
                            if ($value == 1)
                            $sql=DB::delete("delete from sanphams where id=?",[$id]);
                            unset($_SESSION['id']);
                            echo "
                            <script language='javascript'>
                                alert('Xóa thành công');
                                window.open('/mainadmin?lenh=htsp','_self', 1);
                            </script>
                        ";
                        }
            
                    }

            }       else echo "
                            <script language='javascript'>
                                alert('Bạn chưa chọn sản phẩm cần xử lý');
                                window.open('/mainadmin?lenh=htsp','_self', 1);
                            </script>
                        ";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
