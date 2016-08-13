<?php
if(!empty($_GET['msg'])){
	$msg = unserialize(urldecode($_GET['msg']));
	foreach ($msg as $key => $value) {
		echo "<span style='border: 1px dashed #339680;color: #33960a;
padding: 5px 30px;'>".$value."</span>";
	}
}

?>
<a class="right" style="color: #3d8b64;font-size: 22px;margin-right: 11px;" href="<?php echo BASE_URL; ?>/Index">Home</a>
<div class="button">
	<a href="<?php echo BASE_URL; ?>/CRUDController/addNew">Add New</a>
</div>
	<table class="tblone">
	<tr>
		<th width="5%">No.</th>
		<th width="25%">Name</th>
		<th width="25%">Email</th>
		<th width="15%">Skill</th>
		<th width="15%">Action</th>
	</tr>
	<?php 

	$i = 0;
	foreach ($alldata as $key => $value) {
		$i++;

	?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $value['name'];?></td>
		<td><?php echo $value['email'];?></td>
		<td><?php echo $value['skill'];?></td>
		<td><a href="<?php echo BASE_URL; ?>/CRUDController/updateInfo/<?php echo $value['id']; ?>">Edit</a> | 
			<a onclick="return confirm('Are you sure..!');" href="<?php echo BASE_URL; ?>/CRUDController/deleteInfo/<?php echo $value['id']; ?>">Delete</a></td>
	</tr>
	<?php } ?>
	
</table>
	