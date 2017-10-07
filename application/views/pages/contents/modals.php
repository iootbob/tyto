
<!-- the pop ups -->
<div class="user-modals" id="user-modals">

	<!-- content for bookbag -->
	<div class="bookbag-modal" id="bookbag-modal">
		<button class="modal-close fa" onClick="hideBookbag();">&#xf00d;</button>
		<h1 class="modal-title">Bookbag</h1>
		<table class="modal-table">
			<tr style="background-color: rgba(0,0,0,0) !important">
				<th class="modal-table-header">Title</th>
				<th class="modal-table-header">Author</th>
				<th class="modal-table-header">Remove</th>
			</tr>
			<tr>
				<td align="center" style="padding:3px 0px">The Jungle Book</td>
				<td align="center">Awesome Nerds</td>
				<td align="center"><a href="#" class="remove-x fa">&#xf014;</a></td>
			</tr>
			<tr>
				<td align="center" style="padding:3px 0px">The Jungle Book</td>
				<td align="center">Awesome Nerds</td>
				<td align="center"><a href="#" class="remove-x fa">&#xf014;</a></td>
			</tr>
		</table>
		<hr>
		<button class="modal-remove-all">REMOVE ALL</button>
	</div>
	<!-- end of content for bookbag-->


	<!-- content for notification -->
	<div class="bookbag-modal" id="notif-modal">
		<button class="modal-close fa" onClick="hideNotif();">&#xf00d;</button>
		<h1 class="modal-title">Notifications</h1>
		<table class="modal-table">
			<!--<tr style="background-color: rgba(0,0,0,0) !important">
				<th class="modal-table-header">Title</th>
				<th class="modal-table-header">Author</th>
				<th class="modal-table-header">Remove</th>
			</tr>-->
			<tr>
				<!--  Warning -->
				<td class="fa">&#xf06a;</td>
				<td align="left" style="padding:3px 0px">Book on due</td>
				<td align="left">The Jungle Book</td>
				<td align="center"><a href="#" class="remove-x fa">&#xf014;</a></td>
			</tr>
			<tr>
				<!--  New -->
				<td class="fa">&#xf006;</td>
				<td align="left" style="padding:3px 0px">New Book Available</td>
				<td align="left">Awesome Nerds</td>
				<td align="center"><a href="#" class="remove-x fa">&#xf014;</a></td>
			</tr>
		</table>
		<hr>
		<button class="modal-remove-all">REMOVE ALL</button>
	</div>
	<!-- end content for notification -->


	<!-- content for book info -->
	<div class="bookbag-modal" id="book-info-modal">
		<button class="modal-close fa" style="color:rgba(236,54,57,1.00);font-size: 20px;" onClick="hideBookInfo();">&#xf00d;</button>
			<div class="book-info-top-holder">
				<div class="book-info-top-info">
					<h1 class="most-relevant-title">Sample Book Cover</h1>
					<h3 class="most-relevant-author">by Juan Dela Cruz</h3>
					<p class="most-relevant-genre">Horror</p>
					<br>
					<button class="book-info-top-button">Add to Bookbag</button>
					<button class="book-info-top-button">Reserve</button>
				</div>
				<div alt="book-cover"style="background-image: url(<?php echo base_url(); ?>assets/admin/images/bookcover/samplebook.png)" class="book-info-bookcover"></div>
			</div>
			<div class="book-info-mid-holder">
				<h2 class="book-info-subtitle">Book Information</h2>
				<table width="97%" style="margin-left: 3%">
					<tr>
						<td>Available: </td>
						<td style="font-weight: bold"> 2 </td>
					</tr>
					<tr>
						<td>Location: </td>
						<td style="font-weight: bold"> Circulation Resources </td>
					</tr>
					<tr>
						<td>Publish Date: </td>
						<td style="font-weight: bold"> 7/4/2015 </td>
					</tr>
					<tr>
						<td>Publisher: </td>
						<td style="font-weight: bold"> National Book Store </td>
					</tr>
					<tr>
						<td>Book Number: </td>
						<td style="font-weight: bold"> AS232-12332 </td>
					</tr>
				</table>
			</div>
			<div class="book-info-bottom-holder">
				<h2 class="book-info-subtitle">About</h2>
				<p class="most-relevant-about">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.

				Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus.

				Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.
				</p>
				<p class="most-relevant-about">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.

				Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus.

				Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.
				</p>
			</div>
	</div><!-- end of content for book info -->

</div><!-- end for pop ups -->