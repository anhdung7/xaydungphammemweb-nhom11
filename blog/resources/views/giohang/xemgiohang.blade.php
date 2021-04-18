<link rel="stylesheet" href="./css/index.css">
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div id="wrapper">
  <div class="cart">

 <h3>Giỏ hàng của bạn</h3>
 <?php
    session_start();
    if(isset($_SESSION['cart']))//nếu tồn tại biến session có tên là cart
    $count=count($_SESSION['cart']);
    else $count=0;
    $tongtien=0;
    if($count==0)
    echo "Giỏ hàng của bạn chưa có sản phẩm nào";
    else
   {
    ?>
   
<table>
<tr class="tieudecart">
<td><b>Mã sản phẩm</b></td>
<td><b>Tên sản phẩm</b></td>
<td><b>Giá</b></td>
<td><b>Số lượng</b></td>
<td><b>Thành tiền</b></td>
<td><b>Tùy chọn</b></td></tr>
<?php

   $sql ="select * from sanphams where id in(";
        foreach($_SESSION['cart'] as $stt => $soluong)
            {
              if($soluong>0)
                $sql .= $stt.",";
            }
            if (substr($sql,-1,1)==',')
            {
                $sql = substr($sql,0,-1);
            }
      $sql .=' )order by id DESC';
      $giohang=DB::select($sql);
foreach ($giohang as $key => $value)
{
?>
 

<form action="/xuligio" method="get" name="update">
  
<tr class="sanphamcart">
<td><input type="text" readonly="readonly" value="<?php echo $value->id;?>" name="id"></td>
<td><p class="carta"><a href="/chitiet?id=<?php echo $value->id; ?>"><?php echo $value->tensp;?></a></p></td>
<td><?php echo number_format(($value->gia*((100-$value->khuyenmai1)/100)),0,",",".");?></td>
<td><input type="text" name="sl" value="<?php echo $_SESSION['cart'][$value->id] ?>" style="width:30px;"/></td>
<td><?php echo number_format(($value->gia*((100-$value->khuyenmai1)/100))*$_SESSION['cart'][$value->id],0,",",".") ?></td>
<td><p class="xoa"><input type="submit" name="huy" value="Xóa"/>
 <input type="submit" class="submit" value="update" name="submit"/>
 </form>
 </p></td>
</tr>
<?php $tongtien+=$_SESSION['cart'][$value->id]*($value->gia*((100-$value->khuyenmai1)/100)); ?>
<?php
}
?>

</table>
<div class="xoatoanbo">
  <a href="/xuligio?lenh=destroy"><button>Xóa toàn bộ</button></a>
  <p>Tổng cộng: <span><?php  echo number_format($tongtien,0,",",".") ?></span>VNĐ</p>
</div>
<div class="tieptucmuahang">
  <p class="tieptucmuahangcon"><a href="/">Tiếp tục mua hàng  </a></p><p class="thanhtoancon"><a href="#">Thanh toán</a></p>
</div>
<?php
}
?>
</div>
</div>
<div id="wrapper">
  <a href="/">
    <button class="buttonmoi">Trở về trang chính</button>
  </a>
</div>
</body>
</html>
 