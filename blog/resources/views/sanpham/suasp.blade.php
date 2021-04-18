<link rel="stylesheet" href="./admin/css/them_sanpham.css">
<script language="javascript" src="./admin/ckeditor/ckeditor.js"></script>
<form action="/updatesp?id=<?php echo $spsua['0']->id;?>&hinh=<?php echo $spsua['0']->hinhanh;?>" method="post" name="frm" onsubmit="" enctype="multipart/form-data">
    {{ csrf_field() }}
    <table>
            <tr class="tieude_themsp">
                <td colspan=2>Sửa Sản Phẩm </td>
            </tr>
            <tr>
                <td>Tên SP</td><td><input type="text" name="tensp" value="<?php echo $spsua['0']->tensp; ?>"/></td>
            </tr>
            <tr>
                <td>Hình ảnh</td><td class="img_hienthi_sp"><img src="../img/uploads/<?=$spsua['0']->hinhanh;?>" width="80" height="120"/><br /><br /><input type="file" name="hinhanh" /></td>
            </tr>
            <tr>
                <td>Ghi chú </td>
                <td><input type="text" name="mau" value="<?php echo $spsua['0']->mau;?>"/></td>
            </tr>
            <tr>
                <td>Chi tiết</td><td><textarea name="chitiet" id="chitiet"><?php echo $spsua[0]->chitiet; ?></textarea></td>
            </tr>  
            <tr>
                <td>Số lượng</td><td><input type="text" name="soluong" size="5" value="<?php echo $spsua['0']->soluong; ?>"/></td>
            </tr>
            <tr>
                <td>Đã bán</td><td><input type="text" name="daban" size="5" value="<?php echo $spsua['0']->daban; ?>"/></td>
            </tr>
            <tr>
                <td>Giá</td><td><input type="text" name="gia" value="<?php echo $spsua['0']->gia; ?>"/></td>
            </tr>
            <tr>
                <td>Giảm giá</td><td><input type="text" name="khuyenmai1" size="1" value="<?php echo $spsua['0']->khuyenmai1; ?>" /> &nbsp %</td>
            </tr>
            <tr>
                <td>Tặng thêm </td><td><textarea name="khuyenmai2"><?php echo $spsua['0']->khuyenmai2; ?></textarea></td>
            </tr>
            <tr>
                <td>Mã DM</td><td> 
                    <select name="madm">
                    <option value="">Chọn danh mục</option>
                    <?php
                        $dmgoc = DB::select("SELECT * FROM danhmucs WHERE dequi=0");
                        foreach ($dmgoc as $key => $value) 
                        {
                            $madmgoc = $value->id;    
                            $tendmgoc = $value->tendm;
                            echo "<option value='".$madmgoc."'>".$tendmgoc."</option>"; 
                            $dmcon = DB::Select("SELECT * FROM danhmucs WHERE dequi=?",     [$madmgoc]);
                                foreach ($dmcon as $key => $value)
                                {
                                    $madmcon = $value->id;    
                                    $tendmcon = $value->tendm;
                                    echo "<option value='".$madmcon."'> - ".$tendmcon."</option>";
                                }
                        }
                    ?>
                
                </td>
            </tr>
            <tr>
                <td colspan=2 class="input"> <input type="submit" name="update" value="Update" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
        </table> 

</form>
<table>
    <td colspan=2 class="input"><a href="/mainadmin?lenh=htsp"><input type="" name="thoat" value="Thoát" /></a></td>
</table>
<script type="text/javascript" language="javascript">
 
  CKEDITOR.replace( 'chitiet', {
    uiColor: '#d1d1d1'
});
</script>