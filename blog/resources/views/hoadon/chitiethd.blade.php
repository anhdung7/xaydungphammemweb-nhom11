<link rel="stylesheet" href="./admin/css/hienthi_sp.css">
<title>Chi tiết Hoá đơn</title><div class="quanlysp">
	<h3>CHI TIẾT HÓA ĐƠN</h3>
</div>
<table>
    
    <tr class='tieude_hienthi_sp'>
        <td>Mã HD</td>
        <td>Tên sản phẩm</td>
        <td>Số lượng</td>
        <td>Giá</td>
        <td>Thành tiền</td>
    </tr>
    <?php
	$tong=0;					
    if($dem > 0){
        foreach ($cthoadon as $key => $value)
        {
		$thanhtien=$value->gia*$value->soluong;
		$tong+=$thanhtien;
	   
	?>
  
     <tr class='noidung_hienthi_sp'>
                <td class="masp_hienthi_sp"><?php  echo $value->idhd; ?></td>
                <td class="stt_hienthi_sp"><?php  echo $value->tensp; ?></td>
				<td class="sl_hienthi_sp"><?php echo $value->soluong; ?></td>
				<td class="sl_hienthi_sp"><?php echo number_format($value->gia,0,",",".") ?></td>
				<td class="sl_hienthi_sp"><?php echo number_format($thanhtien,0,",",".") ?></td>
                
    </tr>
	<?php 
		
	}			
	?>
		<tr>
			<td colspan=5 align="right" style="padding:10px 20px 10px 0px; font-size:20px;">Tổng: <font color="red"><?php echo number_format($tong,0,",",".") ?></font></td>
		</tr>
	<?php 
	}
    else echo "<tr><td colspan='6'>Không có sản phẩm trong CSDL</td></tr>";
	
?>
</table>



