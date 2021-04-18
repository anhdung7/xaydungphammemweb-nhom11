<?php
if(isset($_GET['lenh']))
	switch($_GET['lenh'])
	{
		case 'htsp':
			require_once("sanpham.php");
			break;
		case 'themsp':
			require_once("themsp.php");
			break;
		case 'suasp':
			require_once("sua_sanpham.php");
			break;
		case 'htdm':
			require_once("danhmuc.php");
			break;
		case 'themdm':
			require_once("them_danhmuc.php");
			break;
		case 'suadm':
			require_once("sua_danhmuc.php");
			break;
		case 'htnd':
			require_once("nguoidung.php");
			break;
		case 'themnd':
			require_once("them_nguoidung.php");
			break;
		case 'suand':
			require_once("sua_nguoidung.php");
			break;
			case 'xulyhd':
			require_once("xulyhd.php");
			break;
		case 'httt':
			require_once("tintuc.php");
			break;
		case 'themtt':
			require_once("them_tintuc.php");
			break;
		case 'suatt':
			require_once("sua_tintuc.php");
			break;
		case 'htht':
			require_once("hotro.php");
			break;
		case 'hthd':
			require_once("hoadon.php");
			break;
		case 'chitiethoadon':
			require_once("chitiethoadon.php");
			break;
		case 'xulyht':
			require_once("xulyht.php");
			break;
		case 'xulysp':
			require_once("xulysp.php");
			break;
		case 'xulytt':
			require_once("xulytt.php");
			break;
		default:
			require_once("sanpham.php");
			break;
	}
	else 
	{
		?>
		<div id="admincon">
			<div id="sanphammoi">
				<table>
				<?php $ngay=date('Y-m-d'); ?>
					<tr class="sanphammoitheongay">
						<td colspan=6>Đơn hàng cần được xử lý sớm</td>
					</tr>
					<tr class="tieudespmoi">
						<td>STT</td>
						<td>Id</td>
						<td>Họ tên</td>
						<td>Địa chỉ</td>
						<td>Điện thoại</td>
						<td>Ngày đặt hàng</td>
						<td>Check</td>
					</tr>
					<?php 
						$i=1;
						$dschuaxuli=DB::select("select * from hoadons where trangthai='1' order by id asc LIMIT 0,10");
						if($dschuaxuli==null)
						{
							?>
							<h1>Không có hóa đơn cần xử lý</h1>	
							
							<?php
						}
						else
						{	
						foreach ($dschuaxuli as $key => $value)
						{
					
					?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $value->id; ?></td>
						<td><?php echo $value->hoten; ?></td>
						<td><?php echo $value->diachi; ?></td>
						<td><?php echo $value->dienthoai; ?></td>
						<td><?php echo $value->ngaydathang; ?></td>
						<td colspan=6 align="right" style="padding-right:20px; height:30px;"><a href="/hienthihd?id=<?php echo $value->id; ?>">Chi tiết</a></td>
					</tr>
					
					<?php } 
				}?>

				</table>
			</div>
		</div>
	<?php 
	}
?>