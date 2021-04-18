<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;

class book extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $dsdanhmuc=DB::table('danhmucs')->get();
        $dssanpham=DB::table('sanphams')->get();
        $lenh=1;
        return view('giaodien')->with('dsdanhmuc',$dsdanhmuc)->with('dssanpham',$dssanpham)->with('lenh',$lenh)->with('danhmuc',$dsdanhmuc);
    }

    public function detail(Request $rq)
    {
        //
        $id=$rq->get('id');
         $danhmuc=DB::table('danhmucs')->get();
        $sanpham=DB::select('select * from sanphams where id=?', [$id]);
        $lenh=2;
        return view('giaodien')->with('dsdanhmuc',$danhmuc)->with('sanpham',$sanpham)->with('lenh',$lenh)->with('id',$id);
    }

    public function danhmuc(Request $rq)
    {
        $madm=$rq->get('iddm');
        $dsdanhmuc=DB::table('danhmucs')->get();
        $danhmuc=DB::select('select * from danhmucs where id=?',[$madm]);
        $dssanpham=DB::select('select * from sanphams where madm=?',[$madm]);
        $lenh=1;
        return view('giaodien')->with('dsdanhmuc',$dsdanhmuc)->with('dssanpham',$dssanpham)->with('lenh',$lenh)->with('danhmuc',$danhmuc);
    }

    public function danhmucdequi(Request $rq)
    {
        $dequi=$rq->get('dequi');
        $dsdanhmuc=DB::table('danhmucs')->get();
        $danhmuc=DB::select('select * from danhmucs where dequi=?',[$dequi]);
        $dssanpham=DB::select('select * from sanphams JOIN danhmucs ON sanphams.madm=danhmucs.id WHERE danhmucs.dequi=?',[$dequi]);
        $lenh=1;
        return view('giaodien')->with('dsdanhmuc',$dsdanhmuc)->with('dssanpham',$dssanpham)->with('lenh',$lenh)->with('danhmuc',$danhmuc);
    }

    public function khuyenmai()
    {
        $dsdanhmuc=DB::table('danhmucs')->get();
        $dssanpham=DB::select('select * from sanphams WHERE khuyenmai1<>0 or khuyenmai2<>""');
        $lenh=1;
        return view('giaodien')->with('dsdanhmuc',$dsdanhmuc)->with('dssanpham',$dssanpham)->with('lenh',$lenh)->with('danhmuc',$dsdanhmuc);
    }

    public function gioithieu()
    {
         $dsdanhmuc=DB::table('danhmucs')->get();
        $dssanpham=DB::table('sanphams')->get();
        $lenh=3;
        return view('giaodien')->with('dsdanhmuc',$dsdanhmuc)->with('dssanpham',$dssanpham)->with('lenh',$lenh)->with('danhmuc',$dsdanhmuc);
    }

    public function timkiem(Request $rq)
    {
        $mucgia=$rq->get('mucgia');
        $tentim=$rq->get('tentim');
        $sql="select * from sanphams where tensp like '%".$tentim."%' and gia";
        if($mucgia==0) $sql=$sql.">0";
        else if ($mucgia==1) $sql=$sql.">0 and gia<=50000";
        else if ($mucgia==2) $sql=$sql."<=100000 and gia>=50000";
        else if ($mucgia==3) $sql=$sql.">=100000 and gia<=200000";
        else if ($mucgia==4) $sql=$sql."<=500000 and gia>=200000";
        else if ($mucgia==5) $sql=$sql.">=500000";
        $dsdanhmuc=DB::table('danhmucs')->get();
        $dssanpham=DB::select($sql);
        $lenh=1;
        return view('giaodien')->with('dsdanhmuc',$dsdanhmuc)->with('dssanpham',$dssanpham)->with('lenh',$lenh)->with('danhmuc',$dsdanhmuc);
    }

    public function testses()
    {
        $dsdanhmuc=DB::table('danhmucs')->get();
        $dssanpham=DB::table('sanphams')->get();
        $lenh=4;
        return view('giaodien')->with('dsdanhmuc',$dsdanhmuc)->with('dssanpham',$dssanpham)->with('lenh',$lenh)->with('danhmuc',$dsdanhmuc);

        
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
