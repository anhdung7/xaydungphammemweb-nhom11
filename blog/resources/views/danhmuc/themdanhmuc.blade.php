<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm Danh Mục</title>
<link rel="stylesheet" href="./admin/css/them_sanpham.css" />
</head>
<body>
<form action="{{ url('/adddm') }}" method="POST">
	{{ csrf_field() }}
	<table>
		<tr class="tieude_themsp">
				<td colspan=2>Thêm Danh Mục </td>
			</tr>
		<tr>
        	<td>Mã danh mục</td><td><input type="text" disabled="disabled" name="id" size="5" /></td>
		</tr>
		<tr>
    		<td>Tên danh mục</td><td><input type="text" name="tendm" /></td>
		</tr>
		<tr>
            <td>Thuộc</td>
			<td>
            	<select name="dequi">
                	<option value="0">Danh mục chính</option>
                    <?php
						foreach($danhmucgoc as $key=>$value)
						{
							$id = $value->id;	
							$tendm = $value->tendm;
							echo "<option value='".$id."'>".$tendm."</option>";
								$danhmuccon=DB::select("select *from danhmucs 
								where dequi=?",[$id]);	
								foreach($danhmuccon as $key=>$value)
								{
									$id1 = $value->id;	
									$tendm1 = $value->tendm;
									echo "<option value='".$id1."'> - ".$tendm1."</option>";
								}
						}
							
					?>
                </select>
			</td>
		</tr>
		<tr>
			<td colspan=2 class="input">
            <input type="submit" name="btnthem" value="Thêm" />
            <input type="reset" name="" value="Tạo lại" />
			</td>
		</tr>
       </table>    
</form>
<table>
	<tr>
		<td colspan=2 class="input">
			<a href="/mainadmin?lenh=htdm"><input type="submit" name="thoat" value="Thoát" /></a>
		</td>
	</tr>
</table>
</body>
</html>