<?php 
$type = $fname = $lname = $id_number = $email = $password = $section = $dep = $prog = $year = $bday = $phone = $address = "";
$updateform = "none";
if (isset($view_user['id_number'])) {
	$fname = $view_user['fname'];
	$lname = $view_user['lname'];
	$id_number = $view_user['id_number'];
	$email = $view_user['email'];
	$password = $view_user['password'];
	$bday = $view_user['bday'];
	$phone = $view_user['phone'];
	$address = $view_user['address'];
	
	if(isset($view_user['type'])){
		$type = $view_user['type'];
		$dep = $view_user['dep'];
		$prog = $view_user['prog'];
		$year = $view_user['year'];
		
		switch ($type){
			case 2: $updateform = "add-faculty"; break;
			case 3: $updateform = "add-student"; break;
			case 4: $updateform = "add-other"; break;
			default: $updateform = "add-staff"; break;
		}
	}else{
		$updateform = "add-staff";
		$section = $view_user['section'];
		$type = 1;
	}
}

?>

		<div class="page-option-view">
			<style>
			.add-account-form {
				opacity: 0;
				display: none;
				transition: all 0.3s;
			}

			#<?php echo $updateform; ?> {
				opacity: 1;
				display: block;
			}
				
			.submit-input-button{
				display: inline;
			}
				
			#select-type-div {
				display: <?php if($fname!=""){echo "block";}else{ echo "none"; }?>
			}
		</style>
            
            
			<?php echo form_open('admin/accman/viewUser'); ?>
				<?php echo form_label('ID Number:','id',$attributes = array("class" => "main-label-text input-box-label")); ?>
				&nbsp;
				&nbsp;
				<?php echo form_input('search_id',set_value('search_id',$id_number),$attributes = array("class" => "input-box-fill")); ?>
				<input type="submit" name="" value="Search" class="submit-search-button">
			</form>



				<br>



			<div id="select-type-div">
				<?php echo form_label('Account Type:','account',$attributes = array("class" => "main-label-text input-box-label"));  ?>
				<select class="input-box-fill" id="select-form-type" onChange="changeAddAccForm();">
				<?php foreach($account_types as $account_type):?>

					<option value="<?php echo $account_type['form_id']; ?>" <?php if($account_type['form_id']==$updateform) echo "selected"; ?>><?php echo $account_type['name']; ?></option>

				<?php endforeach; ?>

				</select>
			</div>
			<hr>
			
<!-- Add account Student  -->
			<?php echo form_open('admin/accman/modifyUser', $attributes = array("id" => "add-student", "class" => "add-account-form")); ?>

				<input type="hidden" name="account" value="3"> 
				<input type="hidden" name="old_account" value="<?php echo $type; ?>"> 
				<input type="hidden" name="cur_id_number" value="<?php echo $id_number; ?>">  
				<input type="hidden" name="password" value="<?php echo $password; ?>"> 
				<input type="hidden" name="cur_email" value="<?php echo $email; ?>"> 
				<table>
					<tr>
						<td>

							<?php echo form_label('Name:','name',$attributes = array("class" => "input-box-label")); ?>

						</td>

						<td>

							 <?php echo form_input('fname',set_value('fname',$fname),$attributes = array("class" => "input-box-fill","placeholder" => "First Name")); ?>

							<?php echo form_input('lname',set_value('lname',$lname),$attributes = array("class" => "input-box-fill","placeholder" => "Last Name")); ?>

							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('name'); echo form_error('lname'); ?></small> 

						</td>
					</tr>

					<tr>
						<td>
							<?php echo form_label('Student Number:','id-num',$attributes=array("class" => "input-box-label")); ?>                
						</td>

						<td>
							<?php echo form_input('id-num',set_value('id-num',$id_number),$attributes=array("class" => "input-box-fill")); ?>

							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('id-num'); ?></small>
						</td>

					</tr>

					<tr>
						<td>
							 <?php echo form_label('Email:','email',$attributes=array("class" => "input-box-label")); ?>
						</td>

						<td>
							<?php echo form_input('email',set_value('email',$email),$attributes=array("class" => "input-box-fill")); ?>

							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('email'); ?></small>
						</td>
					</tr>

					<tr>
						<td>
							<?php echo form_label('Department','department',$attributes=array("class" => "input-box-label")); ?>
						</td>

						<td>
							<select name="department" class="input-box-fill dep">

									<?php foreach($departments as $department): ?>
										<option data-id="<?php echo $department['id']; ?>" value="<?php echo $department['id']; ?>" <?php if($department['id']==$dep) echo "selected"; ?>><?php echo $department['name']; ?></option> 
									<?php endforeach; ?>

							</select>
						</td>
					</tr>

					<tr>
						<td>
							<?php echo form_label('Program','program',$attributes=array("class" => "input-box-label")); ?>
						</td>

						<td>
							<select name="program" class="input-box-fill prog">

									<?php if($prog==""){ ?><option value=""></option><?php }?>
									<?php foreach($programs as $program): ?>
									<option data-id="<?php echo $program['department_id']; ?>" value = "<?php echo $program['id']; ?>" <?php if($program['id']==$prog) echo "selected"; ?>><?php echo $program['name']; ?></option> 
									<?php endforeach; ?>
							</select>

							<small style="color:red;">*</small>
							<small style='display:inline-block;'><?php echo form_error('program'); ?></small>
						</td>
					</tr>
					<tr>
						<td><?php echo form_label('Year', 'year', $attributes = array('class' => 'input-box-label')); ?></td>
						<td>

							<?php 
								$options = array(
									null => '',
									'1' => '1',
									'2' => '2',
									'3' => '3',
									'4' => '4'

								);
							?>
							
							<?php echo form_input('year',set_value('year',$year),$attributes=array("class" => "input-box-fill")); ?>
							<?php //echo form_dropdown('year', $options ,set_value('year'), $attributes = array('class' => 'input-box-fill')); ?>
							<small style="color:red;">*</small>
							<small style="display:inline-block"><?php echo form_error('year'); ?></small>

						</td>

					</tr>
					<tr>
						<td><?php echo form_label('Birthday', 'birthday', $attributes = array('class' => 'input-box-label')); ?></td>
						<td><input type="date" name="birthday" class="input-box-fill" value="<?php echo $bday; ?>"></td>
					</tr>
					<tr>
						<td class="input-box-label">Phone Number: </td>
						<td><input type="number" name="phone" class="input-box-fill" value="<?php echo $phone; ?>"></td>
					</tr>
					 <tr>
						<td>
							<?php echo form_label('Address:','address',$attributes=array("class" => "input-box-label")); ?>
						</td>
						<td>
							 <?php
							$data = array(
								"name" => "address",
								"value" => set_value('address',$address),
								"class" => "input-box-fill",
								"rows" => "4",
								"cols" => "35"
							);
							echo form_textarea($data); ?>
							<small style="display:inline-block"><?php echo form_error('address')?></small>

						</td>
					</tr>
				</table>
				<div align="center">
					<input type="submit" name="update" value="UPDATE" class="submit-input-button">
					<input type="submit" name="delete" value="DELETE" class="submit-input-button">
				</div>
			</form>
			
<!-- Add account Faculty  -->
			<?php echo form_open('admin/accman/modifyUser', $attributes = array("id" => "add-faculty", "class" => "add-account-form")); ?>

				<input type="hidden" name="account" value="2">
				<input type="hidden" name="old_account" value="<?php echo $type; ?>">
				<input type="hidden" name="cur_id_number" value="<?php echo $id_number; ?>">  
				<input type="hidden" name="password" value="<?php echo $password; ?>">  
				<input type="hidden" name="cur_email" value="<?php echo $email; ?>"> 
				<table>
					<tr>
						<td>
							<?php echo form_label('Name:','name',$attributes = array("class" => "input-box-label")); ?>
						</td>

						<td>
							<?php echo form_input('fname',set_value('fname',$fname),$attributes = array("class" => "input-box-fill","placeholder" => "First Name")); ?>

							<?php echo form_input('lname',set_value('lname',$lname),$attributes = array("class" => "input-box-fill","placeholder" => "Last Name")); ?>

							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('name'); echo form_error('lname'); ?></small> 
						</td>
					</tr>

					<tr>
						<td>
							<?php echo form_label('ID Number:','id-num',$attributes=array("class" => "input-box-label")); ?>                
						</td>

						<td>
							<?php echo form_input('id-num',set_value('id-num',$id_number),$attributes=array("class" => "input-box-fill")); ?>
							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('id-num'); ?></small>
						</td>
					</tr>

					<tr>
						<td>
							 <?php echo form_label('Email:','email',$attributes=array("class" => "input-box-label")); ?>
						</td>

						<td>
							<?php echo form_input('email',set_value('email',$email),$attributes=array("class" => "input-box-fill")); ?>
							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('email'); ?></small>
						</td>
					</tr>

					<tr>
						<td>
							<?php echo form_label('Department','department',$attributes=array("class" => "input-box-label")); ?>
						</td>

						<td>
							<select name="department" class="input-box-fill dep">

									<?php foreach($departments as $department): ?>
									<option data-id="<?php echo $department['id']; ?>" value="<?php echo $department['id']; ?>" <?php if($department['id']==$dep) echo "selected"; ?>><?php echo $department['name']; ?></option> 
									<?php endforeach; ?>

							</select>
						</td>
					</tr>
					
					<tr>
						<td><?php echo form_label('Birthday', 'birthday', $attributes = array('class' => 'input-box-label')); ?></td>
						<td><input type="date" name="birthday" class="input-box-fill" value="<?php echo $bday; ?>"></td>
					</tr>
					
					<tr>
						<td class="input-box-label">Phone Number: </td>
						<td><input type="number" name="phone" class="input-box-fill" value="<?php echo $phone; ?>"></td>
					</tr>
					
					<tr>
						<td>
							<?php echo form_label('Address:','address',$attributes=array("class" => "input-box-label")); ?>
						</td>
						<td>
							 <?php
							$data = array(
								"name" => "address",
								"value" => set_value('address',$address),
								"class" => "input-box-fill",
								"rows" => "4",
								"cols" => "35"
							);
							echo form_textarea($data); ?>
							<small style="display:inline-block"><?php echo form_error('address')?></small>

						</td>
					</tr>
				</table>
				<div align="center">
					<input type="submit" name="update" value="UPDATE" class="submit-input-button">
					<input type="submit" name="delete" value="DELETE" class="submit-input-button">
				</div>
			</form>
			
<!-- Add account Library Staff  -->
			<?php echo form_open('admin/accman/modifyUser', $attributes = array("id" => "add-staff", "class" => "add-account-form")); ?>

				<input type="hidden" name="account" value="1">
				<input type="hidden" name="old_account" value="<?php echo $type; ?>">
				<input type="hidden" name="cur_id_number" value="<?php echo $id_number; ?>">  
				<input type="hidden" name="password" value="<?php echo $password; ?>"> 
				<input type="hidden" name="cur_email" value="<?php echo $email; ?>"> 
				<table>
					<tr>
						<td>
							<?php echo form_label('Name:','name',$attributes = array("class" => "input-box-label")); ?>
						</td>

						<td>
							<?php echo form_input('fname',set_value('fname',$fname),$attributes = array("class" => "input-box-fill","placeholder" => "First Name")); ?>

							<?php echo form_input('lname',set_value('lname',$lname),$attributes = array("class" => "input-box-fill","placeholder" => "Last Name")); ?>

							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('name'); echo form_error('lname'); ?></small> 
						</td>
					</tr>

					<tr>
						<td>
							 <?php echo form_label('Email:','email',$attributes=array("class" => "input-box-label")); ?>
						</td>

						<td>
							<?php echo form_input('email',set_value('email',$email),$attributes=array("class" => "input-box-fill")); ?>
							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('email'); ?></small>
						</td>
					</tr>

					<tr>
						<td>
							<?php echo form_label('Library Section','lib-sec',$attributes=array("class" => "input-box-label")); ?>
						</td>

						<td>
							<select name="lib-sec" class="input-box-fill dep">

									<?php foreach($library_sections as $lib_secs): ?>
									<option data-id="<?php echo $lib_secs['id']; ?>" value="<?php echo $lib_secs['id']; ?>" <?php if($lib_secs['id']==$section) echo "selected"; ?>><?php echo $lib_secs['name']; ?></option> 
									<?php endforeach; ?>

							</select>
						</td>
					</tr>
					
					<tr>
						<td><?php echo form_label('Birthday', 'birthday', $attributes = array('class' => 'input-box-label')); ?></td>
						<td><input type="date" name="birthday" class="input-box-fill" value="<?php echo $bday; ?>"></td>
					</tr>
					
					<tr>
						<td class="input-box-label">Phone Number: </td>
						<td><input type="number" name="phone" class="input-box-fill" value="<?php echo $phone; ?>"></td>
					</tr>
					
					<tr>
						<td>
							<?php echo form_label('Address:','address',$attributes=array("class" => "input-box-label")); ?>
						</td>
						<td>
							 <?php
							$data = array(
								"name" => "address",
								"value" => set_value('address',$address),
								"class" => "input-box-fill",
								"rows" => "4",
								"cols" => "35"
							);
							echo form_textarea($data); ?>
							<small style="display:inline-block"><?php echo form_error('address')?></small>

						</td>
					</tr>
				</table>
				<div align="center">
					<input type="submit" name="update" value="UPDATE" class="submit-input-button">
					<input type="submit" name="delete" value="DELETE" class="submit-input-button">
				</div>
			</form>
			
<!-- Add account Other  -->
			<?php echo form_open('admin/accman/modifyUser', $attributes = array("id" => "add-other", "class" => "add-account-form")); ?>

				<input type="hidden" name="account" value="4">
				<input type="hidden" name="old_account" value="<?php echo $type; ?>">
				<input type="hidden" name="cur_id_number" value="<?php echo $id_number; ?>">  
				<input type="hidden" name="password" value="<?php echo $password; ?>"> 
				<input type="hidden" name="cur_email" value="<?php echo $email; ?>"> 
				
				<table>
					<tr>
						<td>
							<?php echo form_label('Name:','name',$attributes = array("class" => "input-box-label")); ?>
						</td>

						<td>
							<?php echo form_input('fname',set_value('fname',$fname),$attributes = array("class" => "input-box-fill","placeholder" => "First Name")); ?>

							<?php echo form_input('lname',set_value('lname',$lname),$attributes = array("class" => "input-box-fill","placeholder" => "Last Name")); ?>

							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('name'); echo form_error('lname'); ?></small> 
						</td>
					</tr>

					<tr>
						<td>
							 <?php echo form_label('Email:','email',$attributes=array("class" => "input-box-label")); ?>
						</td>

						<td>
							<?php echo form_input('email',set_value('email',$email),$attributes=array("class" => "input-box-fill")); ?>
							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('email'); ?></small>
						</td>
					</tr>
					
					<tr>
						<td><?php echo form_label('Birthday', 'birthday', $attributes = array('class' => 'input-box-label')); ?></td>
						<td><input type="date" name="birthday" class="input-box-fill" value="<?php echo $bday; ?>"></td>
					</tr>
					
					<tr>
						<td class="input-box-label">Phone Number: </td>
						<td><input type="number" name="phone" class="input-box-fill" value="<?php echo $phone; ?>"></td>
					</tr>
					
					<tr>
						<td>
							<?php echo form_label('Address:','address',$attributes=array("class" => "input-box-label")); ?>
						</td>
						<td>
							 <?php
							$data = array(
								"name" => "address",
								"value" => set_value('address', $address),
								"class" => "input-box-fill",
								"rows" => "4",
								"cols" => "35"
							);
							echo form_textarea($data); ?>
							<small style="display:inline-block"><?php echo form_error('address')?></small>

						</td>
					</tr>
				</table>
				<div align="center">
					<input type="submit" name="update" value="UPDATE" class="submit-input-button">
					<input type="submit" name="delete" value="DELETE" class="submit-input-button">
				</div>
			</form>
			
		</div> <!-- end of page option view -->
	</div><!-- end of page contents-->
</div> <!-- end of page body holder -->

