
    
<?php foreach ($danhmuc as $key => $value) {
    # code...
    $ma=$value->id;
    $temp=$value->tendm;
    ?><div class="sanpham"><?php
    ?><h2><?php echo $value->tendm;?></h2>
    <div class="sanphamcon">
    <?php
    foreach ($dssanpham as $key => $value) {
        # code...
        if($ma==$value->madm)
        {?>
                <div class="sach">
                    <?php if($value->khuyenmai1>0)
                    { ?>
                    <div class="moi"><h3>-<?php echo $value->khuyenmai1?>%</h3></div>
                    <?php } ?>
                    <a href="/chitiet?id=<?php echo $value->id;?>"><img  src="./img/uploads/<?php echo $value->hinhanh;?>"></a><br>
                    <p><a href="/chitiet?id=<?php echo $value->id;?>" ><?php echo $value->tensp;?></a></p><br>
                    <h4><?php echo number_format(($value->gia*((100-$value->khuyenmai1)/100)),0,",",".");?></h4>
                    <div class="button">
                        <ul>
                            <li>
                                <h1><a href="/chitiet?id=<?php echo $value->id;?>" class="chitiet"><button>Chi tiết</button></a></h1>
                            </li>
                            <li>
                                <h5><a href="/themvaogio?id=<?php echo $value->id;?>&sl=1"><button>Cho vào giỏ</button></a></h5>
                            </li>
                        </ul>
                    </div><!-- End .button-->
                </div><!-- End .sach-->
        <?php } ?>
        
    <?php } ?>
    </div><!-- end san pham-->
    </div>
<?php } ?>



