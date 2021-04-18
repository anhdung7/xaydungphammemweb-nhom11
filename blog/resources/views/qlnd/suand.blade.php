<link rel="stylesheet" href="./admin/css/them_sanpham.css">
<form action="/updatend?id=<?php echo $usersua->id;?>" method="POST" name="frm" enctype="multipart/form-data">
	{{ csrf_field() }}
	<table>
			<tr class="tieude_themsp">
				<td colspan=2>Sửa Người Dùng </td>
			</tr>
    		<tr>
            	<td>Tên ND</td><td><input type="text" name="name" value="<?php echo $usersua->name; ?>"/></td>
            </tr>
			<tr>
            	<td>Điện thoại</td><td><input type="text" name="phone"  value="<?php echo $usersua->phone; ?>"/></td>
            </tr>
            <tr>
            	<td>Địa chỉ</td><td><input type="text" name="diachi"  value="<?php echo $usersua->diachi; ?>"/></td>
            </tr>
            <tr>
                <td colspan=2 class="input"> <input type="submit" name="update" value="Update" />
                <input type="reset" name="" value="Reset" /></td>
            </tr>
        </table> 
</form>
<table>
    <td colspan=2 class="input"><a href="/mainadmin?lenh=htnd"><input type="" name="thoat" value="Thoát" /></a></td>
</table>