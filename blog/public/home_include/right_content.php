<!--TÌM KIẾM-->
<div id="timkiem">
    <div class="center1">
    <h4>TÌM KIẾM </h4>
        <div id ="select">
            <form action ="/timkiem" method="GET">
            <input type ="hidden" name ="content" value= "tentim">
            <input type ="text" name ="tentim" />
        <div id="select2">
            <select name ="mucgia">
            <option value ="0">Chọn giá</option>
            <option value ="1">0 - 50.000 VNĐ</option>
            <option value ="2">50.000 - 100.000 VNĐ</option>
            <option value ="3">100.000 - 200.000 VNĐ</option>
            <option value ="4">200.000 - 500.000 VNĐ</option>
            <option value ="5">Lớn hơn 500.000 VBĐ</option>
            </select>
            <input type ="submit" name ="btnk" value ="Tìm kiếm" />
        </div>
            </form>
        </div>
    </div>
</div>
<!-- End: Tim kiem-->

<!-- Begin : Giỏ hàng -->
<div id="giohang">
    <div class="center1">
        <h4>GIỎ HÀNG</h4>
        <a href="/xemgiohang"><img src="img/images.jpg" title="Vào giỏ hàng" width="150" height="100"/></a>
        <?php
            $tongtien=0;
            if(isset($_SESSION['cart']))
                $count=count($_SESSION['cart']);
            else $count=0;
            if($count==0){
        ?>
            <p>Không có sản phẩm</p>
            <?php }//đóng if $count==0
            else {
            ?>
            <p id="soluonggiohang">Có <span><?=$count?></span>sản phẩm trong giỏ</p>    
            <p id="tiengiohang">
                <?php 
                $sql="Select * from sanphams where id in(";
                    foreach($_SESSION['cart']as $id => $soluong)
                    {
                        if($soluong>0)
                        //nối vào chuỗi sql
                        $sql .=$id. ",";
                    }
                    //-1 lấy ngược từ cuối bên phải .tham số thứ 2 là số kí tự bỏ đi
                    if(substr($sql,-1,1)==",")//lấy về 1 ký tự cuối cùng trong chuỗi của $sql
                    {
                        $sql = substr($sql,0,-1); // bỏ dấu "," ra khỏi chuỗi của $sql
                    }
                    $sql .= ')order by id';
                    $giohang=DB::select($sql);
                    
                    //duyệt từng dòng của mảng $rows
                    foreach ($giohang as $key => $value)
                    {
                        //$_SESSION['cart'] thông qua idsp lấy giá trị(số lượng) của idsp tương đương số lượng chọn thông qua idsp 
                        $tongtien+=$_SESSION['cart'][$value->id]*$value->gia;
                    }    
                ?> <?php echo number_format($tongtien,"0",",","."); ?> VNĐ
                </p>
                <?php }//đóng else ?>
    </div>
    <!-- End: center1 -->
     
</div>
<!-- End: Giỏ hàng-->



