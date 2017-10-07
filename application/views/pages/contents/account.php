<div class="page-contents" id="page-contents">	
	<style>
		.account-contents-sec-table th {
			border-bottom: 1px solid #454545;
			padding-bottom: 5px;
			background-color: #FFF;
		}
		table {
			border-collapse: collapse;
		}
		td a {
			color: #454545;
		}

		td {
			padding: 3px;
		}

		tr:hover {
			transition: all 0.3s;
			background-color: rgba(0,0,0,0.10);
		}
	</style>

	<div class="account-div-sidenav">
		<div class="account-sidenav-userinfo-div">
			<div class="account-sidenav-userinfo-bgblur" style="background-image: url(<?php echo base_url(); ?>assets/admin/images/profile/default_profpic.svg)"></div>
			<div class="account-sidenav-userinfo-pic" style="background-image: url(<?php echo base_url(); ?>assets/admin/images/profile/default_profpic.svg)"></div>
			<h2 class="account-sidenav-userinfo-name"><?php echo $user_info['fname']." ".$user_info['lname']; ?></h2>
			<span class="account-sidenav-userinfo-usertype"><?php echo $user_info['type']; ?></span>
		</div>
		<input type="button" class="account-sidenav-buttons active-account-sidenav-button" value="Account Overview">
		<input type="button" class="account-sidenav-buttons" value="Reservations">
		<input type="button" class="account-sidenav-buttons" value="Borrowed Books">
		<input type="button" class="account-sidenav-buttons" value="Book Fines">
		<input type="button" class="account-sidenav-buttons" value="Payment History">
		<input type="button" class="account-sidenav-buttons" value="Search History">
	</div>

	<div class="account-div-contents">
		<h1 class="account-contents-title" id="account-contents-title">ACCOUNT OVERVIEW</h1>
		<div class="account-contents-hr"></div>
		<div class="account-contents-sec-div" id="account-contents-sec-div">
			<div id="AccountOverview" class="account-contents-holder">
				<table align="center" class="account-contents-sec-table" width="80%">
					<tr>
						<td><strong><?php if($user_info['type']=='student') {echo 'Student';} else {echo 'ID';}?>  Number:</strong></td>
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
					<?php if($user_info['type']=='student'||$user_info['type']=='faculty') {?>
					<tr>
						<td><strong>Department:</strong></td>
						<td><?php echo $user_info['dep'] ?></td>
					</tr>
					<?php }
						if($user_info['type']=='student') {
					?>
					<tr>
						<td><strong>Program:</strong></td>
						<td><?php echo $user_info['prog']; ?></td>
					</tr>
					<?php }?>
					<tr>
						<td><strong>Birthday:</strong></td>
						<td><?php echo date('F d, Y',strtotime($user_info['bday'])); ?></td>
					</tr>
					<tr>
						<td><strong>Address:</strong></td>
						<td><?php echo $user_info['address']; ?></td>
					</tr>
				</table>
			</div>

			<div id="Reservations" class="account-contents-holder">
				<table align="center" class="account-contents-sec-table" width="80%">
					<tr>
						<th align="left">Title</th>
						<th align="left">Status</th>
						<th align="left">Expiration</th>
						<th></th>
					</tr>
					<tr>
						<td><a href="#">The Jungle Book</a></td>
						<td>On Queue</td>
						<td>N/A</td>
						<td><button class="account-contents-btn-candel">CANCEL</button></td>
					</tr>
					<tr>
						<td><a href="#">The Awesome Nerds</a></td>
						<td>Reserved</td>
						<td>10/20/2017</td>
						<td><button class="account-contents-btn-candel">CANCEL</button></td>
					</tr>
					<tr>
						<td><a href="#">Learn C++</a></td>
						<td>Expired</td>
						<td>10/10/2017</td>
						<td><button class="account-contents-btn-candel">DELETE</button></td>
					</tr>
					<tr>
						<td><a href="#">Learn JAVA</a></td>
						<td>Borrowed</td>
						<td>10/09/2017</td>
						<td><button class="account-contents-btn-candel">DELETE</button></td>
					</tr>
				</table>
			</div>

			<div id="BorrowedBooks" class="account-contents-holder">
				<table align="center" class="account-contents-sec-table" width="80%">
					<tr>
						<th align="left">Title</th>
						<th align="left">Status</th>
						<th align="left">Expiration</th>
						<th></th>
					</tr>
					<tr>
						<td><a href="#">The Jungle Book</a></td>
						<td>Not Return</td>
						<td>10/21/2017</td>
						<td></td>
					</tr>
					<tr>
						<td><a href="#">The Awesome Nerds</a></td>
						<td>Not Return</td>
						<td>10/20/2017</td>
						<td></td>
					</tr>
					<tr>
						<td><a href="#">Learn C++</a></td>
						<td>Returned</td>
						<td>10/10/2017</td>
						<td><button class="account-contents-btn-candel">DELETE</button></td>
					</tr>
					<tr>
						<td><a href="#">Learn JAVA</a></td>
						<td>Returned</td>
						<td>10/09/2017</td>
						<td><button class="account-contents-btn-candel">DELETE</button></td>
					</tr>
				</table>
			</div>

			<div id="BookFines" class="account-contents-holder">
				<table align="center" class="account-contents-sec-table" width="80%">
					<tr>
						<th align="left">Title</th>
						<th align="left">Status</th>
						<th align="left">Date</th>
						<th></th>
					</tr>
					<tr>
						<td><a href="#">The Jungle Book</a></td>
						<td>Unpaid</td>
						<td>10/21/2017</td>
						<td></td>
					</tr>
					<tr>
						<td><a href="#">The Awesome Nerds</a></td>
						<td>Unpaid</td>
						<td>10/20/2017</td>
						<td></td>
					</tr>
					<tr>
						<td><a href="#">Learn C++</a></td>
						<td>Paid</td>
						<td>10/10/2017</td>
						<td><button class="account-contents-btn-candel">DELETE</button></td>
					</tr>
					<tr>
						<td><a href="#">Learn JAVA</a></td>
						<td>Paid</td>
						<td>10/09/2017</td>
						<td><button class="account-contents-btn-candel">DELETE</button></td>
					</tr>
				</table>
			</div>

			<div id="PaymentHistory" class="account-contents-holder">
				<table align="center" class="account-contents-sec-table" width="80%">
					<tr>
						<th align="left">Title</th>
						<th align="left">Type</th>
						<th align="left">Date</th>
						<th align="left">Amount<br>(PHP)</th>
						<th></th>
					</tr>
					<tr>
						<td><a href="#">The Jungle Book</a></td>
						<td>On Due</td>
						<td>10/21/2017</td>
						<td>3</td>
						<td><button class="account-contents-btn-candel">DELETE</button></td>
					</tr>
					<tr>
						<td><a href="#">The Awesome Nerds</a></td>
						<td>On Due</td>
						<td>10/20/2017</td>
						<td>10</td>
						<td><button class="account-contents-btn-candel">DELETE</button></td>
					</tr>
					<tr>
						<td><a href="#">Learn C++</a></td>
						<td>On Due</td>
						<td>10/10/2017</td>
						<td>25</td>
						<td><button class="account-contents-btn-candel">DELETE</button></td>
					</tr>
					<tr>
						<td><a href="#">Learn JAVA</a></td>
						<td>Lost</td>
						<td>10/09/2017</td>
						<td>2000</td>
						<td><button class="account-contents-btn-candel">DELETE</button></td>
					</tr>
				</table>
				<button class="account-contents-btn-candel" style="margin-top: 10px;">DELETE ALL</button>
			</div>

			<div id="SearchHistory" class="account-contents-holder">
				<table align="center" class="account-contents-sec-table" width="80%">
					<tr>
						<th align="left">Search Query</th>
						<th align="left">Date</th>
						<th></th>
					</tr>
					<tr>
						<td><a href="#">java</a></td>
						<td>10/21/2017</td>
						<td><button class="account-contents-btn-candel">DELETE</button></td>
					</tr>
					<tr>
						<td><a href="#">cisco</a></td>
						<td>10/20/2017</td>
						<td><button class="account-contents-btn-candel">DELETE</button></td>
					</tr>
					<tr>
						<td><a href="#">medicine brain</a></td>
						<td>10/10/2017</td>
						<td><button class="account-contents-btn-candel">DELETE</button></td>
					</tr>
					<tr>
						<td><a href="#">google codes</a></td>
						<td>10/09/2017</td>
						<td><button class="account-contents-btn-candel">DELETE</button></td>
					</tr>
				</table>
				<button class="account-contents-btn-candel" style="margin-top: 10px;">CLEAR ALL</button>
			</div>
		</div>
	</div>
</div> <!-- end of page contents -->