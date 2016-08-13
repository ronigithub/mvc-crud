
<?php
	if(isset($postErrors)){
		echo '<div style="color:red;border:1px solid red;margin:2px 5px;padding:10px">';
		foreach ($postErrors as $key => $value) {
			switch ($key) {
				case 'name':
					foreach ($value as $val) {
						echo "Name:".$val."<br>";
					}
					break;
				case 'email':
					foreach ($value as $val) {
						echo "Email:".$val."<br>";
					}
					break;
				case 'skill':
					foreach ($value as $val) {
						echo "Skill:".$val."<br>";
					}
					break;
				
				default:
					# code...
					break;
					}		
		}
	echo '</div>';
	}
?>
<a style="color:#3D8B64" href="<?php echo BASE_URL;?>">Back</a>
<a class="right" style="color:#3D8B64;" href="<?php echo BASE_URL;?>">Home</a>
<h3>Update Information</h3>
<div class="loginform">	
<?php 
foreach ($readbyid as $key => $value) {
?>
<form action="<?php echo BASE_URL;?>/CRUDController/editInfo/<?php echo $value['id'];?>" method="post">
	<table>
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name" value="<?php echo $value['name'];?>" /></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" value="<?php echo $value['email'];?>" /></td>
		</tr>
		<tr>
			<td>Skill:</td>
			<td><input type="text" name="skill" value="<?php echo $value['skill'];?>" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Update" /></td>
		</tr>
	</table>

</form>
<?php  } ?>
</div>