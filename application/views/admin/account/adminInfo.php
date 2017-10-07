<?php 
	foreach ($library_sections as $lib_sec){
		if($lib_sec['id']==$user_info['section']){
			$section = $lib_sec['name'];
		}
	}
?>
		<style>
			.submit-input-button {
				margin-top: 20px;
				display: inline;
			}
			
			tr > odd {
				background-color: #000;
			}
		</style>
		<div class="page-option-view">
			<table align="center" width="50%">
				<tr>
					<td><strong>ID  Number:</strong></td>
					<td><?php echo $user_info['id_number']; ?></td>
				</tr>
				<tr>
					<td><strong>Email:</strong></td>
					<td><?php echo $user_info['email']; ?></td>
				</tr>
				<tr>
					<td><strong>Phone:</strong></td>
					<td><?php echo $user_info['phone']; ?></td>
				</tr>
				<tr>
					<td><strong>Library Section:</strong></td>
					<td><?php echo $section; ?></td>
				</tr>
				<tr>
					<td><strong>Birthday:</strong></td>
					<td><?php echo date('F d, Y',strtotime($user_info['bday'])); ?></td>
				</tr>
				<tr>
					<td><strong>Address:</strong></td>
					<td><?php echo $user_info['address']; ?></td>
				</tr>
			</table>
			<div align="center">
				<form action="<?php echo base_url(); ?>admin/accman/viewUser" method="post" accept-charset="utf-8">
					<input type="hidden" name="search_id" value="<?php echo $user_info['id_number']; ?>">
					<input type="submit" name="update" value="UPDATE" class="submit-input-button">
				</form>
				<form action="<?php echo base_url(); ?>admin/accman/deleteUser" method="post" accept-charset="utf-8" onSubmit="return deleteAcc('<?php echo $user_info['fname'];  ?>');">
					<input type="hidden" name="search_id" value="<?php echo $user_info['id_number']; ?>">
					<input type="hidden" name="search_type" value="1">
					<input type="hidden" name="search_cur_id" value="<?php echo $user_info['id_number']; ?>">
					<input type="submit" name="delete" value="DELETE" class="submit-input-button">
				</form>
			</div>
		</div>
	</div>
</div>