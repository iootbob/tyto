

		<div class="page-option-view">
			<style>
			.add-account-form {
				opacity: 0;
				display: none;
				transition: all 0.3s;
			}

			#add-staff {
				opacity: 1;
				display: block;
			}
		</style>

				<?php echo form_label('Account Type:','account',$attributes = array("class" => "main-label-text input-box-label"));  ?>
				<select class="input-box-fill" id="select-form-type" onChange="changeAddAccForm();">
				<?php foreach($account_types as $account_type):?>

					<option value="<?php echo $account_type['form_id']; ?>"><?php echo $account_type['name']; ?></option>

				<?php endforeach; ?>

				</select>

			<hr>
			
<!-- Add account Student  -->
			<?php echo form_open('admin/accman/createUser', $attributes = array("id" => "add-student", "class" => "add-account-form")); ?>

				<input type="hidden" name="account" value="3"> 
				<table>
					<tr>
						<td>

							<?php echo form_label('Name:','name',$attributes = array("class" => "input-box-label")); ?>

						</td>

						<td>

							 <?php echo form_input('fname',set_value('fname'),$attributes = array("class" => "input-box-fill","placeholder" => "First Name")); ?>

							<?php echo form_input('lname',set_value('lname'),$attributes = array("class" => "input-box-fill","placeholder" => "Last Name")); ?>

							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('name'); echo form_error('lname'); ?></small> 

						</td>
					</tr>

					<tr>
						<td>
							<?php echo form_label('Student Number:','id-num',$attributes=array("class" => "input-box-label")); ?>                
						</td>

						<td>
							<?php echo form_input('id-num',set_value('id-num'),$attributes=array("class" => "input-box-fill")); ?>

							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('id-num'); ?></small>
						</td>

					</tr>

					<tr>
						<td>
							 <?php echo form_label('Email:','email',$attributes=array("class" => "input-box-label")); ?>
						</td>

						<td>
							<?php echo form_input('email',set_value('email'),$attributes=array("class" => "input-box-fill")); ?>

							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('email'); ?></small>
						</td>
					</tr>

					<tr>
						<td>
							<?php echo form_label('Password','password',$attributes=array("class" => "input-box-label"));?>
						</td>

						<td>
							<?php echo form_password('password',set_value('password'),$attributes=array("class" => "input-box-fill")); ?>
							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('password'); ?></small> 
						</td>
					</tr>

					<tr>
						<td>
							<?php echo form_label('Confirm Password','cpassword',$attributes=array("class"=> "input-box-label")); ?>
						</td>

						<td>
							<?php echo form_password('cpassword',set_value('cpassword'),$attributes = array("class" => "input-box-fill")); ?>

							<small style = 'display:inline-block;'><?php echo form_error('cpassword'); ?></small>
						</td>
					</tr>

					<tr>
						<td>
							<?php echo form_label('Department','department',$attributes=array("class" => "input-box-label")); ?>
						</td>

						<td>
							<select name="department" class="input-box-fill dep">

									<?php foreach($departments as $department): ?>
									<option data-id="<?php echo $department['id']; ?>" value="<?php echo $department['id']; ?>"><?php echo $department['name']; ?></option> 
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

									<option value=""></option>
									<?php foreach($programs as $program): ?>
									<option data-id="<?php echo $program['department_id']; ?>" value = "<?php echo $program['id']; ?>" ><?php echo $program['name']; ?></option> 
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
							
							<?php echo form_input('year',set_value('year'),$attributes=array("class" => "input-box-fill")); ?>
							<?php //echo form_dropdown('year', $options ,set_value('year'), $attributes = array('class' => 'input-box-fill')); ?>
							<small style="color:red;">*</small>
							<small style="display:inline-block"><?php echo form_error('year'); ?></small>

						</td>

					</tr>
					<tr>
						<td><?php echo form_label('Birthday', 'birthday', $attributes = array('class' => 'input-box-label')); ?></td>
						<td><input type="date" name="birthday" class="input-box-fill"></td>
					</tr>
					<tr>
						<td class="input-box-label">Phone Number: </td>
						<td><input type="number" name="phone" class="input-box-fill"></td>
					</tr>
					 <tr>
						<td>
							<?php echo form_label('Address:','address',$attributes=array("class" => "input-box-label")); ?>
						</td>
						<td>
							 <?php
							$data = array(
								"name" => "address",
								"value" => set_value('address'),
								"class" => "input-box-fill",
								"rows" => "4",
								"cols" => "35"
							);
							echo form_textarea($data); ?>
							<small style="display:inline-block"><?php echo form_error('address')?></small>

						</td>
					</tr>
				</table>
				<input type="submit" name="" value="ADD ACCOUNT" class="submit-input-button">
			</form>
			
<!-- Add account Faculty  -->
			<?php echo form_open('admin/accman/createUser', $attributes = array("id" => "add-faculty", "class" => "add-account-form")); ?>

				<input type="hidden" name="account" value="2"> 
				<table>
					<tr>
						<td>
							<?php echo form_label('Name:','name',$attributes = array("class" => "input-box-label")); ?>
						</td>

						<td>
							<?php echo form_input('fname',set_value('fname'),$attributes = array("class" => "input-box-fill","placeholder" => "First Name")); ?>

							<?php echo form_input('lname',set_value('lname'),$attributes = array("class" => "input-box-fill","placeholder" => "Last Name")); ?>

							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('name'); echo form_error('lname'); ?></small> 
						</td>
					</tr>

					<tr>
						<td>
							<?php echo form_label('ID Number:','id-num',$attributes=array("class" => "input-box-label")); ?>                
						</td>

						<td>
							<?php echo form_input('id-num',set_value('id-num'),$attributes=array("class" => "input-box-fill")); ?>
							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('id-num'); ?></small>
						</td>
					</tr>

					<tr>
						<td>
							 <?php echo form_label('Email:','email',$attributes=array("class" => "input-box-label")); ?>
						</td>

						<td>
							<?php echo form_input('email',set_value('email'),$attributes=array("class" => "input-box-fill")); ?>
							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('email'); ?></small>
						</td>
					</tr>

					<tr>
						<td>
							<?php echo form_label('Password','password',$attributes=array("class" => "input-box-label"));?>
						</td>

						<td>
							<?php echo form_password('password',set_value('password'),$attributes=array("class" => "input-box-fill")); ?>
							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('password'); ?></small> 
						</td>
					</tr>

					<tr>
						<td>
							<?php echo form_label('Confirm Password','cpassword',$attributes=array("class"=> "input-box-label")); ?>
						</td>

						<td>
							<?php echo form_password('cpassword',set_value('cpassword'),$attributes = array("class" => "input-box-fill")); ?>
							<small style = 'display:inline-block;'><?php echo form_error('cpassword'); ?></small>
						</td>
					</tr>

					<tr>
						<td>
							<?php echo form_label('Department','department',$attributes=array("class" => "input-box-label")); ?>
						</td>

						<td>
							<select name="department" class="input-box-fill dep">

									<?php foreach($departments as $department): ?>
									<option data-id="<?php echo $department['id']; ?>" value="<?php echo $department['id']; ?>"><?php echo $department['name']; ?></option> 
									<?php endforeach; ?>

							</select>
						</td>
					</tr>
					
					<tr>
						<td><?php echo form_label('Birthday', 'birthday', $attributes = array('class' => 'input-box-label')); ?></td>
						<td><input type="date" name="birthday" class="input-box-fill"></td>
					</tr>
					
					<tr>
						<td class="input-box-label">Phone Number: </td>
						<td><input type="number" name="phone" class="input-box-fill"></td>
					</tr>
					
					<tr>
						<td>
							<?php echo form_label('Address:','address',$attributes=array("class" => "input-box-label")); ?>
						</td>
						<td>
							 <?php
							$data = array(
								"name" => "address",
								"value" => set_value('address'),
								"class" => "input-box-fill",
								"rows" => "4",
								"cols" => "35"
							);
							echo form_textarea($data); ?>
							<small style="display:inline-block"><?php echo form_error('address')?></small>

						</td>
					</tr>
				</table>
				<input type="submit" name="" value="ADD ACCOUNT" class="submit-input-button">
			</form>
			
<!-- Add account Library Staff  -->
			<?php echo form_open('admin/accman/createUser', $attributes = array("id" => "add-staff", "class" => "add-account-form")); ?>

				<input type="hidden" name="account" value="1"> 
				<table>
					<tr>
						<td>
							<?php echo form_label('Name:','name',$attributes = array("class" => "input-box-label")); ?>
						</td>

						<td>
							<?php echo form_input('fname',set_value('fname'),$attributes = array("class" => "input-box-fill","placeholder" => "First Name")); ?>

							<?php echo form_input('lname',set_value('lname'),$attributes = array("class" => "input-box-fill","placeholder" => "Last Name")); ?>

							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('name'); echo form_error('lname'); ?></small> 
						</td>
					</tr>

					<tr>
						<td>
							 <?php echo form_label('Email:','email',$attributes=array("class" => "input-box-label")); ?>
						</td>

						<td>
							<?php echo form_input('email',set_value('email'),$attributes=array("class" => "input-box-fill")); ?>
							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('email'); ?></small>
						</td>
					</tr>

					<tr>
						<td>
							<?php echo form_label('Password','password',$attributes=array("class" => "input-box-label"));?>
						</td>

						<td>
							<?php echo form_password('password',set_value('password'),$attributes=array("class" => "input-box-fill")); ?>
							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('password'); ?></small> 
						</td>
					</tr>

					<tr>
						<td>
							<?php echo form_label('Confirm Password','cpassword',$attributes=array("class"=> "input-box-label")); ?>
						</td>

						<td>
							<?php echo form_password('cpassword',set_value('cpassword'),$attributes = array("class" => "input-box-fill")); ?>
							<small style = 'display:inline-block;'><?php echo form_error('cpassword'); ?></small>
						</td>
					</tr>

					<tr>
						<td>
							<?php echo form_label('Library Section','lib-sec',$attributes=array("class" => "input-box-label")); ?>
						</td>

						<td>
							<select name="lib-sec" class="input-box-fill dep">

									<?php foreach($library_sections as $lib_secs): ?>
									<option data-id="<?php echo $lib_secs['id']; ?>" value="<?php echo $lib_secs['id']; ?>"><?php echo $lib_secs['name']; ?></option> 
									<?php endforeach; ?>

							</select>
						</td>
					</tr>
					
					<tr>
						<td><?php echo form_label('Birthday', 'birthday', $attributes = array('class' => 'input-box-label')); ?></td>
						<td><input type="date" name="birthday" class="input-box-fill"></td>
					</tr>
					
					<tr>
						<td class="input-box-label">Phone Number: </td>
						<td><input type="number" name="phone" class="input-box-fill"></td>
					</tr>
					
					<tr>
						<td>
							<?php echo form_label('Address:','address',$attributes=array("class" => "input-box-label")); ?>
						</td>
						<td>
							 <?php
							$data = array(
								"name" => "address",
								"value" => set_value('address'),
								"class" => "input-box-fill",
								"rows" => "4",
								"cols" => "35"
							);
							echo form_textarea($data); ?>
							<small style="display:inline-block"><?php echo form_error('address')?></small>

						</td>
					</tr>
				</table>
				<input type="submit" name="" value="ADD ACCOUNT" class="submit-input-button">
			</form>
			
<!-- Add account Other  -->
			<?php echo form_open('admin/accman/createUser', $attributes = array("id" => "add-other", "class" => "add-account-form")); ?>

				<input type="hidden" name="account" value="4"> 
				<table>
					<tr>
						<td>
							<?php echo form_label('Name:','name',$attributes = array("class" => "input-box-label")); ?>
						</td>

						<td>
							<?php echo form_input('fname',set_value('fname'),$attributes = array("class" => "input-box-fill","placeholder" => "First Name")); ?>

							<?php echo form_input('lname',set_value('lname'),$attributes = array("class" => "input-box-fill","placeholder" => "Last Name")); ?>

							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('name'); echo form_error('lname'); ?></small> 
						</td>
					</tr>

					<tr>
						<td>
							 <?php echo form_label('Email:','email',$attributes=array("class" => "input-box-label")); ?>
						</td>

						<td>
							<?php echo form_input('email',set_value('email'),$attributes=array("class" => "input-box-fill")); ?>
							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('email'); ?></small>
						</td>
					</tr>

					<tr>
						<td>
							<?php echo form_label('Password','password',$attributes=array("class" => "input-box-label"));?>
						</td>

						<td>
							<?php echo form_password('password',set_value('password'),$attributes=array("class" => "input-box-fill")); ?>
							<small style="color:red;">*</small>
							<small style="display:inline-block;"><?php echo form_error('password'); ?></small> 
						</td>
					</tr>

					<tr>
						<td>
							<?php echo form_label('Confirm Password','cpassword',$attributes=array("class"=> "input-box-label")); ?>
						</td>

						<td>
							<?php echo form_password('cpassword',set_value('cpassword'),$attributes = array("class" => "input-box-fill")); ?>
							<small style = 'display:inline-block;'><?php echo form_error('cpassword'); ?></small>
						</td>
					</tr>
					
					<tr>
						<td><?php echo form_label('Birthday', 'birthday', $attributes = array('class' => 'input-box-label')); ?></td>
						<td><input type="date" name="birthday" class="input-box-fill"></td>
					</tr>
					
					<tr>
						<td class="input-box-label">Phone Number: </td>
						<td><input type="number" name="phone" class="input-box-fill"></td>
					</tr>
					
					<tr>
						<td>
							<?php echo form_label('Address:','address',$attributes=array("class" => "input-box-label")); ?>
						</td>
						<td>
							 <?php
							$data = array(
								"name" => "address",
								"value" => set_value('address'),
								"class" => "input-box-fill",
								"rows" => "4",
								"cols" => "35"
							);
							echo form_textarea($data); ?>
							<small style="display:inline-block"><?php echo form_error('address')?></small>

						</td>
					</tr>
				</table>
				<input type="submit" name="" value="ADD ACCOUNT" class="submit-input-button">
			</form>
			
		</div> <!-- end of page option view -->
	</div><!-- end of page contents-->
</div> <!-- end of page body holder -->

