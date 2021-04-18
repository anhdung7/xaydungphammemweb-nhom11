<link rel="stylesheet" href="./admin/css/hienthi_sp.css">
<?php
	$dsnd=DB::select("select * from users ");
    $dem = count($dsnd);
?>
<div class="quanlysp">
	<h3>QUẢN LÝ NGƯỜI DÙNG</h3>
	
	<p>Có tổng <font color=red><b><?php echo $dem ?></b></font> người dùng</p>
</div>
<table>
    
    <tr class='tieude_hienthi_sp'>
        <td>ID</td>
        <td>Tên ND</td>
        <td>Email</td>
        <td>Điện thoại</td>
        <td>Địa chỉ</td>
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
 

		$htnd = DB::select("SELECT * FROM users LIMIT $from, $max_results"); 



								
    if($dem > 0)
        foreach ($htnd as $key => $value)
        {
?>
            <tr class='noidung_hienthi_sp'>
                <td class="masp_hienthi_sp"><?php  echo $value->id; ?></td>
                <td class="sl_hienthi_sp"><?php echo $value->name; ?></td>
                <td class="sl_hienthi_sp"> <?php echo $value->email; ?>  </td>
				<td class="sl_hienthi_sp"><?php echo $value->phone; ?></td>
				<td class="sl_hienthi_sp">0<?php echo $value->diachi; ?></td>
                <td class="active_hienthi_sp">
                    <a href='/suand?id=<?php echo $value->id;?>'><img src="./admin/img/sua.png" title="Sửa"></a>
					<?php echo "<p onclick = 'checkdel({$value->id })' ><img src='./admin/img/xoa.png' title='Xóa' class='delete'></p>" ?>
                </td>
            </tr>
<?php 
    }
	
    else echo "<tr><td colspan='6'>Không có khách hàng</td></tr>";
	
?>
</table>
	<br>
	<div id="phantrang_sp">
	
	<?php
			// Tính tổng kết quả trong toàn DB:  
			$total_results = DB::select("SELECT * FROM users");  
			$dem=count($total_results);
			// Tính tổng số trang. Làm tròn lên sử dụng ceil()  
			$total_pages = ceil($dem / $max_results);  

			$lenh=$_GET['lenh'];
			// Tạo liên kết đến trang trước trang đang xem 
			if($page > 1){  
			$prev = ($page - 1);  
			echo "<a href='/mainadmin?lenh=$lenh&page=$prev'><button class='trang'>Trang trước</button></a>&nbsp;";  
			}  

			for($i = 1; $i <= $total_pages; $i++){  
			if(($page) == $i){  
			echo "$i&nbsp;";  
			} else {  
			echo "<a href='/mainadmin?lenh=$lenh&page=$i'><button class='so'>$i</button></a>&nbsp;";
			}  //$_SERVER[‘PHP_SELF’]	Trả về tên file của file đang được chạy.
			}  

			// Tạo liên kết đến trang tiếp theo  
			if($page < $total_pages){  
			$next = ($page + 1);  
			echo "<a href='/mainadmin?lenh=$lenh&page=$next'><button class='trang'>Trang sau</button></a>&nbsp;";
			}  
			echo "</center>";  		
		
	?>
	</div>

<script language="JavaScript">
    function checkdel(idnd)
    {
        var	idnd=idnd;
        var link="/xoand?id="+idnd;
        if(confirm("Bạn có chắc chắn muốn xóa người dùng này?")==true)
            window.open(link,"_self",1);
    }
</script>