<div id="danhmucsp">
    <div class="center">
        <h4>SẢN PHẨM</h4>
        <ul>
            
        <?php
            foreach ($dsdanhmuc as $key => $value) {
                if ($value->dequi==1)
                {
                    ?>
                     <li><a href="/danhmuc?iddm=<?php echo $value->id?>"><?php echo $value->tendm;?></a></li>
                     <?php
                }
            }
        ?>
        </ul>
    </div>
    <!-- End : center -->
    
</div>
<!--End : danh muc sp -->

<div id="phukien">
    <div class="center">
        <h4>PHỤ KIỆN</h4>
        <ul>
         <?php
            foreach ($dsdanhmuc as $key => $value) {
                if ($value->dequi==2)
                {
                    ?>
                     <li><a href="/danhmuc?iddm=<?php echo $value->id?>"><?php echo $value->tendm;?></a></li>
                     <?php
                }
            }
        ?>
        </ul>    
    </div>
    <!-- End : center -->
    
</div>
<!--End : phu kien -->
    <!-- End : center -->
    
</div>
<!--End : phu kien -->