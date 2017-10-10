<div class="page-option-view">
                        <form action="<?php echo base_url('admin/accman/search') ?>" method="post" class="search-form" align="center">
                            <input type="text" name="search_basic" id="search_basic" placeholder="Search" class="search-input">
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
                                <th>ID No.</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Options</th>
                            </tr>
                            
                            <?php 
                            
                            foreach ($search_admin as $se): ?>
								
								<tr>
									<td><?php echo $se['lib_id_number']; ?></td>
									<td align="center"><?php echo $se['lib_fname']." ".$se['lib_lname']; ?></td>
									<td>Library Staff</td>
									<td><?php echo $se['lib_email']; ?></td>
									<td><?php echo $se['lib_phone']; ?></td>
									<td>
										<form action="<?php echo base_url(); ?>admin/accman/viewUser" method="post" accept-charset="utf-8">
											<input type="hidden" name="search_id" value="<?php echo $se['lib_id_number']; ?>">
											<input type="submit" name="update" value="MODIFY" class="browse-users-options-btn">
										</form>
										<form action="<?php echo base_url(); ?>admin/accman/deleteUser" method="post" accept-charset="utf-8" onSubmit="return deleteAcc('<?php echo $se['lib_fname'];  ?>');">
											<input type="hidden" name="search_id" value="<?php echo $se['lib_id_number']; ?>">
											<input type="hidden" name="search_type" value="1">
											<input type="hidden" name="search_cur_id" value="<?php echo $user_info['id_number']; ?>">
											<input type="submit" name="delete" value="DELETE" class="browse-users-options-btn">
										</form>
									</td>
								</tr>
								
							<?php endforeach; ?>
                            
                            <?php
                                $acc_types = array('0','Library Staff', 'Faculty', 'Student', 'Other');
								foreach ($search_user as $se){ ?>
								
								<tr>
									<td><?php echo $se['user_id_number']; ?></td>
									<td align="center"><?php echo $se['user_fname']." ".$se['user_lname']; ?></td>
									<td><?php echo $acc_types[$se['user_type']]; ?></td>
									<td><?php echo $se['user_email']; ?></td>
									<td><?php echo $se['user_phone']; ?></td>
									<td>
										<form action="<?php echo base_url(); ?>admin/accman/viewUser" method="post" accept-charset="utf-8">
											<input type="hidden" name="search_id" value="<?php echo $se['user_id_number']; ?>">
											<input type="submit" name="update" value="MODIFY" class="browse-users-options-btn">
										</form>
										<form action="<?php echo base_url(); ?>admin/accman/deleteUser" method="post" accept-charset="utf-8" onSubmit="return deleteAcc('<?php echo $se['user_fname'];  ?>');">
											<input type="hidden" name="search_id" value="<?php echo $se['user_id_number']; ?>">
											<input type="hidden" name="search_type" value="<?php echo $se['user_type']; ?>">
											<input type="submit" name="delete" value="DELETE" class="browse-users-options-btn">
										</form>
									</td>
								</tr>
								
							<?php }  ?>
                            
                      