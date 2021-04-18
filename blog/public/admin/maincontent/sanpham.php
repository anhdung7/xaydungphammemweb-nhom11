<link rel="stylesheet" href="./admin/css/hienthi_sp.css">
<script type="text/javascript" src="./admin/js/checkbox.js"></script>
<?php
	 $dssp=DB::select("select * from sanphams");
    $dem = count($dssp);
?>
<div class="quanlysp">
	<h3>QUẢN LÝ SẢN PHẨM</h3>
<a href='/themsp' >Thêm sản phẩm</a><br>
	
	<p>Có tổng <font color=red><b><?php echo $dem ?></b></font> sản phẩm</p>
	<form action="/xoasp" method="get">
		<div id="check">
			<p>
				<input type="submit" name="xoa" value="Xóa" />

			</p>
		</div>
</div>
<table>
    
    <tr class='tieude_hienthi_sp'>
		<td width="30"><input type="checkbox" name="check"  class="checkbox" onclick="checkall('item', this)"></td>
        <td>id</td>
        <td>HÌnh ảnh và Tên SP</td>
        <td>Số lượng</td>
        <td>Đã bán</td>
        <td>Giá</td>
        <td>Danh mục</td>
        <td>Active</td>
    </tr>

    <?php
	
	/*------------Phan trang------------- */
		// Nếu đã có sẵn số thứ tự của trang thì giữ nguyên 
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

		$sql = "SELECT *,sanphams.id FROM sanphams inner join danhmucs on sanphams.madm=danhmucs.id ORDER by sanphams.id DESC  LIMIT $from, $max_results";
		$dsht=DB::select($sql);
		//print_r($dsht[0]);



								
    if($dem > 0)
        foreach ($dsht as $key => $value)
        {
?>
            <tr class='noidung_hienthi_sp'>
				<td class="masp_hienthi_sp"><input type="checkbox" name="id[]" class="item" class="checkbox" value="<?=$value->id;?>"/></td>
                <td class="masp_hienthi_sp"><?php  echo $value->id; ?></td>
                <td class="img_hienthi_sp">
                    <img src="../img/uploads/<?php echo $value->hinhanh;?>"  width='60' height='60'><br>
                    <h4><?php echo $value->tensp; ?></h4>
                </td>
				<td class="sl_hienthi_sp"><?php echo $value->soluong; ?></td>
				<td class="sl_hienthi_sp"><?php echo $value->daban; ?></td>
                <td class="gia_hienthi_sp"><?php echo number_format($value->gia).' VNÐ' ?></td>
                <td  class="madm_hienthi_sp">
					 
									<?=$value->tendm ?>
				</td>
                <td class="active_hienthi_sp">
                    <a href='/suasp?id=<?php echo $value->id;?>'><img src="./admin/img/sua.png" title="Sửa">Sửa</a>
				</td>
            </tr>
<?php 
    }
	
    else echo "<tr><td colspan='6'>Không có sản phẩm trong CSDL</td></tr>";
	
?>
</table>
</form>
<br>
	<div id="phantrang_sp">
	
	<?php
			
			// Tính tổng kết quả trong toàn DB:  
			$total_results = $dem;  
				
			// Tính tổng số trang. Làm tròn lên sử dụng ceil()  
			$total_pages = ceil($total_results / $max_results);  
				
			
			// Tạo liên kết đến trang trước trang đang xem 
			if($page > 1){  
			
				$prev = ($page - 1);  
				echo "<a href='/mainadmin?lenh=htsp&page=$prev'><button class='trang'>Trang trước</button></a>&nbsp;";  
			}  

			for($i = 1; $i <= $total_pages; $i++){  
				if($page == $i){  
					
							echo "$i&nbsp;";  
					
				} else {  
					echo "<a href='/mainadmin?lenh=htsp&page=$i'><button class='trang'>$i</button></a>&nbsp;";  
				}  
			}  

			// Tạo liên kết đến trang tiếp theo  
			if($page < $total_pages){  
			$next = ($page + 1);  
			echo "<a href='/mainadmin?lenh=htsp&page=$next'><button class='trang'>Trang sau</button></a>&nbsp;";  
			}  
			echo "</center>";  		
		
	?>
	</div>
