
<?php
	if(isset($postErrors)){
		echo '<div style="color:red;border:1px solid red;margin:5px;padding:10px">';
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
<h3>Add Information</h3>
<div class="loginform">	
<form action="<?php echo BASE_URL;?>/CRUDController/insert" method="post">
	<table>
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name" placeholder="Enter your name.." /></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" placeholder="Enter your email.." /></td>
		</tr>
		<tr>
			<td>Skill:</td>
			<td><input type="text" name="skill" placeholder="Enter your skill.." /></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" value="Save" />
				<input type="reset" value="Reset" /></td>
		</tr>
	</table>
</form>

</div>
