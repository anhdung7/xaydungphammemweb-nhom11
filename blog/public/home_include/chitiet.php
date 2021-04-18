<?php 
//print_r($sanpham);
?>
<div class="chitietsp">
        <div class="chitietsp-in">
            <div class="content">
                <div class="zoom-small-image">
                    <a href = './img/uploads/<?php echo $sanpham[0]->hinhanh; ?>' width = "300" height = "300" class='cloud-zoom' id='zoom1'
                    rel="adjustX: 10, adjustY: -4">
                        <img  src="./img/uploads/<?php echo $sanpham[0]->hinhanh; ?>" width="250" height="250" title="Optional title display" />
                    </a>
                    
                </div>
                <!-- End : zoom -->
                
                <div class="giasp">
                    <ul>
                        <p><?php echo $sanpham[0]->tensp; ?></p>
                        <li><span><b>Giá: 
                            <font color="red">
                                <?php echo number_format(($sanpham[0]->gia*((100-$sanpham[0]->khuyenmai1)/100)),0,",",".");?>
                            
                        </b></font></span></li>
                        <li><h2>Tình Trạng</h2>
                            <?php
                                $dem = $sanpham[0]->soluong - $sanpham[0]->daban;
                                if($dem>0)
                                    echo "Số sản phẩm còn :".$dem;
                                else
                                    echo "Hết hàng";
                            ?>
                        </li>
                        <br>
                        <li>Khuyến mãi thêm:
                            <?php 
                            $text=$sanpham[0]->khuyenmai2;
                            if($text!="")
                                echo "$text";
                            else echo "Không có";
                            ?>
                        </li>
                        <form action="/themvaogio" method="get">
                            <li>Mã sản phẩm: <input type="text" size="1" value="<?php echo $sanpham[0]->id;?>" readonly="readonly" name="id"/></li>
                            <li>Số lượng mua: <input type="text" name="sl" size="1" value="1"/></li>
                            <li>
                                <?php
                                if($dem <=0)
                                    echo "Hết hàng!!";
                                else
                                {
                                ?>
                                <input type="submit" value="Cho vào giỏ" name="chovaogio" class="inputmuahang" />
                                <?php } ?>
                            </li>
                        </form>
                    </ul>
                </div>
                <!-- End : Giá sản phẩm -->
                
            </div>
            <!--End: Content -->
            
            <div class="tinhnang">
                <div class="tieudetinhnang">
                    <ul class="tabs">
                        <li><a href="#tab1">Tính năng</a></li>
                        <li><a href="#tab2">Bình luận</a></li>
                    </ul>
                </div>
                <!-- End : Tiêu đề tính năng -->
                
                <div id="tab1">
                    <?php echo $sanpham[0]->chitiet; ?>
                </div>  
                
            </div>
        </div>
        <!-- End : Chi tiết sản phẩm -in -->
        
    </div>
    <!-- End: Chi ti?t s?n ph?m -->
 