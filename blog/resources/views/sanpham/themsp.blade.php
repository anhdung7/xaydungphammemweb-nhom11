<link rel="stylesheet" href="./admin/css/them_sanpham.css" />
<script language="javascript" src="./admin/ckeditor/ckeditor.js"></script>

<form action="{{ url('/upsp') }}" method="post" enctype="multipart/form-data" name="frm" onsubmit="return kiemtra()">
	{{ csrf_field() }}
      <table>
			<tr class="tieude_themsp">
				<td colspan=2>Thêm Sản Phẩm </td>
			</tr>
    		<tr>
            	<td>Tên SP</td><td><input type="text" name="tensp"/></td>
            </tr>
            <tr>
            	<td>Hình ảnh</td><td><input type="file" name="hinhanh" required="true" /></td>
            </tr> 
			<tr>
            	<td>Ghi chú</td><td><input type="text" name="mau"/></td>
            </tr> 
            <tr>
            	<td>Chi tiết</td><td><textarea name="chitiet" id="chitiet"></textarea></td>
            </tr>
			<tr>
            	<td>Số lượng</td><td><input type="text" name="soluong" size="5"/></td>
            </tr>
            <tr>
            	<td>Giá</td><td><input type="text" name="gia"/></td>
            </tr>
			<tr>
            	<td>Giảm giá </td><td><input type="text" name="khuyenmai1" size="1"/> &nbsp %</td>
            </tr>
			<tr>
            	<td>Tặng thêm</td><td><textarea name="khuyenmai2"></textarea></td>
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
                <td colspan=2 class="input"> <input type="submit" name="submit" value="Thêm" />
                <input type="reset" name="" value="Tạo lại" /></td>
            </tr>
         </table>  
</form>
<table>
	<td colspan=2 class="input"><a href="/mainadmin?lenh=htsp"><input type="" name="thoat" value="Thoát" /></a></td>
</table>
//CKEditor cho chi tiet
<script type="text/javascript" language="javascript">
 
  CKEDITOR.replace( 'chitiet', {
    uiColor: '#d1d1d1'
});
</script>
//kiem tra bang js
<script language="javascript">
 	function  kiemtra()
	{
	    
		if(frm.tensp.value=="")
	 	{
			alert("Bạn chưa nhập tên SP. Vui lòng kiểm tra lại");
			frm.tensp.focus();
			return false;	
		}
		if(frm.hinhanh.value=="")
		{
			alert("Bạn chưa chọn hình ảnh");	
			frm.hinhanh.focus();
			return false;
		}
		if(frm.soluong.value=="")
		{
			alert("Bạn chưa nhập số lượng");	
			frm.soluong.focus();
			return false;
		}
		if(frm.madm.value=="")
		{
			alert("Bạn chưa chọn danh mục");	
			frm.madm.focus();
			return false;
		}
	}
 </script>


 