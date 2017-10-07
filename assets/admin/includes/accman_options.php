<?php if(isset($p_option)){ if($p_option=="browse"){ ?>
<style>
	
tr {
	background-color: rgba(0,0,0,0.00);
	transition: all 0.3s;
}

tr:hover {
	background-color: rgba(0,0,0,0.15);
}

th {
	padding-bottom: 3px;
}

td {
	padding: 5px 0px;
}
</style>
<form action="" method="post" class="search-form" align="center">
	<input type="text" name="search_basic" placeholder="Search" class="search-input">
	<input type="submit" value="&#xf002;" class="search-submit fa">
</form>
<div class="browse-filter-div" align="center">
	<h3 class="browse-filter-headers">Filters</h3>
	<h4 class="browse-filter-headers">Account Type</h4>
		<button class="browse-filter-choices">Student</button>
		<button class="browse-filter-choices">Faculty</button>
		<button class="browse-filter-choices">Library Staff</button>
		<button class="browse-filter-choices">Other</button>
	<h4 class="browse-filter-headers">Department</h4>
		<button class="browse-filter-choices">CCS</button>
		<button class="browse-filter-choices">CED</button>
		<button class="browse-filter-choices">CAFA</button>
		<button class="browse-filter-choices">CTHRM</button>
	<h4 class="browse-filter-headers">Program</h4>
		<button class="browse-filter-choices">BSIT</button>
		<button class="browse-filter-choices">BSCS</button>
		<button class="browse-filter-choices">ACT</button>
</div>
<table class="browse-users-table">
	<tr style="background-color: rgba(0,0,0,0.00) !important;">
		<th>No.</th>
		<th>Name</th>
		<th>Type</th>
		<th>Department</th>
		<th>Program</th>
		<th>Year</th>
		<th>Options</th>
	</tr>
	<tr>
		<td>1</td>
		<td align="left">Juan Dela Cruz</td>
		<td>Student</td>
		<td>CCS</td>
		<td>BSIT</td>
		<td>3</td>
		<td>
			<a href="#" class="browse-users-options-btn">MODIFY</a>
			<a href="#" class="browse-users-options-btn">DELETE</a>
		</td>
	</tr>
	<tr>
		<td>2</td>
		<td align="left">Peter Dela Cruz</td>
		<td>Faculty</td>
		<td>CCS</td>
		<td>N/A</td>
		<td>N/A</td>
		<td>
			<a href="#" class="browse-users-options-btn">MODIFY</a>
			<a href="#" class="browse-users-options-btn">DELETE</a>
		</td>
	</tr>
	<tr>
		<td>3</td>
		<td align="left">Juana Derama</td>
		<td>Library Staff</td>
		<td>N/A</td>
		<td>N/A</td>
		<td>N/A</td>
		<td>
			<a href="#" class="browse-users-options-btn">MODIFY</a>
			<a href="#" class="browse-users-options-btn">DELETE</a>
		</td>
	</tr>
	<tr>
		<td>4</td>
		<td align="left">Juaqin Llagas</td>
		<td>Other</td>
		<td>N/A</td>
		<td>N/A</td>
		<td>N/A</td>
		<td>
			<a href="#" class="browse-users-options-btn">MODIFY</a>
			<a href="#" class="browse-users-options-btn">DELETE</a>
		</td>
	</tr>
</table>
<?php }} ?>


<?php if(isset($p_option)){ if($p_option=="add"){ ?>
<p class="main-label-text input-box-label">Account Type: 
	<select class="input-box-fill">
		<option value="3">Student</option>
		<option value="2">Faculty</option>
		<option value="1">Library Staff</option>
		<option value="4">Other</option>
	</select>
</p>
<hr>
<form action="" method="post" id="add-student">
	<input type="hidden" name="acc-type" value="3">
	<table>
		<tr>
			<td class="input-box-label">Name:</td>
			<td>
				<input type="text" placeholder="First Name" name="fname" class="input-box-fill">
				<input type="text" placeholder="Last Name" name="lname" class="input-box-fill">
			</td>
		</tr>
		<tr>
			<td class="input-box-label">Student Number:</td>
			<td><input type="text" name="stud-num" class="input-box-fill"></td>
		</tr>
		<tr>
			<td class="input-box-label">Email:</td>
			<td><input type="email" name="email" class="input-box-fill"></td>
		</tr>
		<tr>
			<td class="input-box-label">Password:</td>
			<td><input type="password" name="password" class="input-box-fill"></td>
		</tr>
		<tr>
			<td class="input-box-label">Confirm Password:</td>
			<td><input type="password" name="cpassword" class="input-box-fill"></td>
		</tr>
		<tr>
			<td class="input-box-label">Department: </td>
			<td>
				<select name="dep" class="input-box-fill">
					<option>CCS</option>	
					<option>CTHRM</option>	
				</select>
			</td>
		</tr>
		<tr>
			<td class="input-box-label">Program: </td>
			<td>
				<select name="program" class="input-box-fill">
					<option>BSIT</option>
					<option>BSCS</option>
					<option>ACT</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="input-box-label">Year: </td>
			<td><input type="number" name="year" class="input-box-fill"></td>
		</tr>
		<tr>
			<td class="input-box-label">Birthday: </td>
			<td><input type="date" name="birthday" class="input-box-fill"></td>
		</tr>
		<tr>
			<td class="input-box-label">Phone Number: </td>
			<td><input type="number" name="phone" class="input-box-fill"></td>
		</tr>
		<tr>
			<td class="input-box-label">Address: </td>
			<td><textarea name="address" class="input-box-fill" rows="5" cols="35"></textarea></td>
		</tr>
	</table>
	<input type="submit" name="add-acc-stud" value="ADD ACCOUNT" class="submit-input-button">
</form>
<?php }} ?>
