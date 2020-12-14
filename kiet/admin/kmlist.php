<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/loaimon.php' ?>
<?php include '../classes/khuyenmai.php' ?>
<?php include_once '../helpers/format.php' ?>
 <?php $fm = new Format();
 $km = new khuyenmai();
 
 if(isset($_GET['delid'])){
	 $id= $_GET['delid'];
	 $delkm = $km->del_km($id);
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
                    <th>discout</th>
					<th>Star</th>
					<th>End</th>
                    <th>ghi chú</th>
					<th>Hình ảnh</th>				
					<th>action</th>
				</tr>
			</thead>
			<tbody>
			<?php
				
				$listkm = $km->show_km();
				if($listkm){
					$i=0;
					while($result=$listkm->fetch_assoc()){ 
						$i++;
			?>
				<tr class="odd gradeX">
					<td><?php echo $i?></td>
					<td><?php echo $result['name_km']?></td>
                    <td><?php echo $result['discout']?></td>
					<td><?php echo $result['time_star']?></td>
					<td><?php echo $result['time_end']?></td>
                 
					<td><?php echo $fm->textShorten($result['ghichu'],10) ?></td>
					
					<td class="center"> <img height="150" width ="150" src="../images/food/<?php echo $result['images'] ?>"></td>
					
					<td><a href="kmedit.php?id_km=<?php echo $result['id_km']?>">Edit</a> ||<a onclick="return confirm('bạn muốn xóa ?')" href="?delid=<?php echo $result['id_km']?>">Delete</a></td>
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
