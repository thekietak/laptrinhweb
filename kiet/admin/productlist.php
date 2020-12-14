<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/loaimon.php' ?>
<?php include '../classes/mon.php' ?>
<?php include_once '../helpers/format.php' ?>
 <?php $fm = new Format();
 $monan = new mon();
 
 if(isset($_GET['delid'])){
	 $id= $_GET['delid'];
	 $delmon = $monan->del_mon($id);
 }
	 
 ?> 
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tên</th>
					<th>Loại</th>
					<th>Giá</th>
					<th>Ghi chú</th>
					<th>Hình ảnh</th>
					<th>trạng thái</th>
					<th>action</th>
				</tr>
			</thead>
			<tbody>
			<?php
				
				$listmon = $monan->show_mon();
				if($listmon){
					$i=0;
					while($result=$listmon->fetch_assoc()){ 
						$i++;
			?>
				<tr class="odd gradeX">
					<td><?php echo $i?></td>
					<td><?php echo $result['name_mon']?></td>
					<td><?php echo $result['name_loai']?></td>
					<td><?php echo $result['gia_mon']?></td>
					<td><?php echo $fm->textShorten($result['ghichu_mon'],10) ?></td>
					
					<td class="center"> <img height="150" width ="150" src="../images/food/<?php echo $result['images'] ?>"></td>
					<td><?php
					if($result['tinhtrang']==1){
						echo "Phục vụ";
					}
					else{
						echo "Ngưng phục vụ";
					}
					?>
					</td>
					<td><a href="productdit.php?id_mon=<?php echo $result['id_mon']?>">Edit</a> ||<!--<a onclick="return confirm('bạn muốn xóa ?')" href="?delid=<?php echo $result['id_mon']?>">Delete</a>--></td>
				</tr>
				<?php
				}}
				?>
			
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
