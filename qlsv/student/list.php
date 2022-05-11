<?php include "../layout/header.php" ?>
			<h1>Danh sách sinh viên</h1>
			<a href="add.php" class="btn btn-info">Add</a>
			<form action="list.php" method="GET">
				<label class="form-inline justify-content-end">Tìm kiếm: <input type="search" name="search" class="form-control" value="<?=!empty($_GET["search"]) ? $_GET["search"]: ""?>">
				<button class="btn btn-danger">Tìm</button>
				</label>
			</form>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Mã SV</th>
						<th>Tên</th>
						<th>Ngày Sinh</th>
						<th>Giới Tính</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					require "../config.php";
					require "../connectDB.php";
					
					$sql = "SELECT * FROM student";
					if (!empty($_GET["search"])) {
							$search = $_GET["search"];
							$sql .= " WHERE name LIKE '%$search%' 
									OR id LIKE '$search'
									OR birthday LIKE '%$search%'
									";
						}
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						    // output data of each row
						    $order = 0;
						    $genderMap = [0=> "nam", 1=> "nữ", 2=> "khác"];
						    while($row = $result->fetch_assoc()) {
						    	//while(null) là fasle
						    	//$result->fetch_assoc() : lấy 1 dòng trong $result
						    	$order++;
						    	$vnDate = date("d/m/Y", strtotime($row["birthday"]));
						    	$genderName = $genderMap[$row["gender"]];
						       ?>
						       	<tr>
									<td><?=$order?></td>
									<td><?=$row["id"]?></td>
									<td><?=$row["name"]?></td>
									<td><?=$vnDate?></td>
									<td><?=$genderName?></td>
									<!-- truyền tham số id lên server để biết sửa sv nào -->
									<td><a href="edit.php?id=<?=$row["id"]?>">Sửa</a></td>
									<td><a data="<?=$row["id"]?>" href="delete.php?id=<?=$row["id"]?>" type="student">Xóa</a></td>
								</tr>
						       <?php
						    }
						}
					 ?>
				</tbody>
			</table>
			<div>
				<span>Số lượng: <?=$result->num_rows?> </span>
			</div>
			<?php include "../layout/footer.php" ?>