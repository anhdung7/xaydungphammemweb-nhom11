<link rel="stylesheet" href="./admin/css/hienthi_sp.css">
<script type="text/javascript" src="./admin/js/checkbox.js"></script>
<?php
    $dshoadon=DB::select("select * from hoadons");
    $dem = count($dshoadon);
?>
<div class="quanlysp">
	<h3>QUẢN LÝ HÓA ĐƠN</h3>
	
	<p>Có tổng <font color=red><b><?php echo $dem; ?></b></font> hóa đơn</p><br>
	<form action="/xulyhd" method="get">
		<div id="check">
			<p>
				<input type="submit" name="giaohang" value="Đã giao hàng" />
				<input type="submit" name="huy" value="Hủy" />
				<input type="submit" name="xoa" value="Xóa" />

			</p>
		</div>
	
</div>
<table>
    
    <tr class='tieude_hienthi_sp'>
        <td width="30"><input type="checkbox" name="check"  class="checkbox" onclick="checkall('item', this)"></td>
        <td>Mã HD</td>
        <td>Họ Tên</td>
        <td>Địa Chỉ</td>
        <td>Điện Thoại</td>
        <td>Email</td>
        <td>Trạng thái</td>
        <td colspan=2>Active</td>
    </tr>

    <?php
	
	/*------------Phan trang------------- */
		// Nếu đã có sẵn số thứ tự của trang thì giữ nguyên (ở đây tôi dùng biến $page) 
		// nếu chưa có, đặt mặc định là 1!   

		if(!isset($_GET['page'])){  
		$page = 1;  
		} else {  
		$page = $_GET['page'];  
		}  

		// Chọn số kết quả trả về trong mỗi trang mặc định là 10 
		$max_results = 10;  

		// Tính số thứ tự giá trị trả về của đầu trang hiện tại 
		$from = (($page * $max_results) - $max_results);  

		// Chạy 1 MySQL query để hiện thị kết quả trên trang hiện tại  

		$dshienthi = DB::select("SELECT * FROM hoadons ORDER by id DESC  LIMIT $from, $max_results"); 



								
    if($dem > 0)
        foreach ($dshienthi as $key => $value)
        {
?>
            <tr class='noidung_hienthi_sp'>
                <td class="masp_hienthi_sp"><input type="checkbox" name="id[]" class="item" class="checkbox" value="<?=$value->id?>"/></td>
                <td class="masp_hienthi_sp"><?php  echo $value->id; ?></td>
                <td class="stt_hienthi_sp"><?php echo $value->hoten; ?></td>
				<td class="sl_hienthi_sp"><?php echo $value->diachi; ?></td>
				<td class="sl_hienthi_sp">0<?php echo $value->dienthoai; ?></td>
				<td class="sl_hienthi_sp"><?php echo $value->email; ?></td>
				<td class="sl_hienthi_sp"><?php if($value->trangthai==1) echo "Đang xử lý"; else if($value->trangthai==2) echo"Đã giao hàng"; else echo"Đã hủy đơn hàng";?></td>
				<td class="active_hienthi_sp" style="width:70px;"><a href="/hienthihd?id=<?php echo $value->id; ?>" style="float:left;">Chi tiết</a>
					
				</td>
            </tr>
<?php 
    }
	
    else echo "<tr><td colspan='6'>Không có sản phẩm trong CSDL</td></tr>";
	
?>
</table>
</form>
	<div id="phantrang_sp">
	
	<?php
			// Tính tổng kết quả trong toàn DB:  
			$dem=DB::select("SELECT * FROM hoadons");
			$total_results = count($dem);  

			// Tính tổng số trang. Làm tròn lên sử dụng ceil()  
			$total_pages = ceil($total_results / $max_results);  


			// Tạo liên kết đến trang trước trang đang xem 
			if($page > 1){  
			$prev = ($page - 1);  
			echo "<a href='/mainadmin?lenh=hthd&page=$prev'>
			<button class='trang'>Trang trước</button></a>&nbsp;";  
			}  

			for($i = 1; $i <= $total_pages; $i++){  
			if(($page) == $i){  
			echo "$i&nbsp;";  
			} else {  
			echo  "<a href='/mainadmin?lenh=hthd&page=$i'>
			<button class='so'>$i</button></a>&nbsp;";
			}  
			}  

			// Tạo liên kết đến trang tiếp theo  
			if($page < $total_pages){  
			$next = ($page + 1);  
			echo "<a href='/mainadmin?lenh=hthd&page=$next'>
			<button class='trang'>Trang sau</button></a>&nbsp;";  
			}  
			echo "</center>";  		
		
	?>
	</div>
