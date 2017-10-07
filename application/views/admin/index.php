 <?php

$active_sublink = "active-sidenav-sublinks";

$acc_browse = $acc_add = $acc_mod = $acc_adminInfo = "";
$accman = false;
$res_browse = $res_add = $res_mod = "";
$resdata = false;
$rec_browse = "";
$records = false;
$stat_lib = $stat_dep = $stat_sys = "";
$stats = false;
	    switch(current_url()){
            
            case base_url().'admin/accman/browse':
		      $acc_browse = $active_sublink;
		      $accman = true;
            break;
            
            case base_url().'admin/accman/add':
            case base_url().'admin/accman/createUser':
		      $acc_add = $active_sublink;
		      $accman = true;
            break;
            
            case base_url().'admin/accman/modify':
            case base_url().'admin/accman/viewUser':
		      $acc_mod = $active_sublink;
		      $accman = true;
            break;
            
            case base_url().'admin/accman/adminInfo':
		      $acc_adminInfo = $active_sublink;
		      $accman = true;
            break;
            
            case base_url().'admin/resdata/browse':
		      $res_browse = $active_sublink;
		      $resdata = true;
            break;
                
            case base_url().'admin/resdata/add':
		      $res_add = $active_sublink;
		      $resdata = true;
            break;
                
            case base_url().'admin/resdata/modify':
		      $res_mod = $active_sublink;
		      $resdata = true;
            break;  
                
            case base_url().'admin/records/browse':
		      $rec_browse = $active_sublink;
		      $records = true;
            break;
            
            case base_url().'admin/statistics/library':
		      $stats_lib = $active_sublink;
		      $stat = true;
            break;
            
            case base_url().'admin/statistics/department':
		      $stats_dep = $active_sublink;
		      $stat = true;
            break;
            
            case base_url().'admin/statistics/system':
		      $stat_sys = $active_sublink;
		      $stats = true;
            break;
 
	}
?>

<?php 
    

        
    

?>
 
 
<body>
	<header>
		<h1 class="site-logo">Tyto</h1>
		<p class="admin-logo">admin</p>
		<a href="<?php echo base_url();?>user/logout"><button class="account-button"><span class="fa">&#xf08b;</span> Logout</button></a>
		<button class="account-button"><span class="fa">&#xf2be;</span> <?php echo $user_info['fname']." ".$user_info['lname']; ?></button>
		<button class="menu-button" onClick="toggleMenu();"><span class="fa" style="transition: 0.5s all" id="menu-icon">&#xf0c9;</span> Menu</button>
	</header>
	
    
    <!-- sidebar  -->
	<div class="page-body-holder">

		<div class="sidenav-menu" id="sidenav-menu">
			<a href="<?php echo base_url();?>admin/accman/browse" class="sidenav-menu-links 
                                                <?php 
                                                                   
                                                if(current_url() == base_url().'admin/accman/browse'){
                                                    echo $active_tab;
                                                }
                                                else if(current_url() == base_url().'admin/accman/add' || current_url() == base_url().'admin/accman/createUser'){
                                                    echo $active_tab;
                                                }
                                                else if(current_url() == base_url().'admin/accman/modify' || current_url() == base_url().'admin/accman/viewUser'){
                                                    echo $active_tab;
                                                }
                                                else if(current_url() == base_url().'admin/accman/adminInfo'){
                                                    echo $active_tab;
                                                }
  
                                                ?>">Account Manager</a>
            <?php if($accman){ ?>
            <a href="<?php echo base_url()?>admin/accman/browse" class="sidenav-menu-sublinks <?php echo $acc_browse;?>">Browse Accounts</a>
            <a href="<?php echo base_url()?>admin/accman/add" class="sidenav-menu-sublinks <?php echo $acc_add;?>">Add Account</a>
            <a href="<?php echo base_url()?>admin/accman/modify" class="sidenav-menu-sublinks <?php echo $acc_mod;?>">Modify Account</a>
            <a href="<?php echo base_url()?>admin/accman/adminInfo" class="sidenav-menu-sublinks <?php echo $acc_adminInfo;?>">Admin Info</a>
            <?php } ?>
            
			<a href="<?php echo base_url();?>admin/resdata/browse" class="sidenav-menu-links 
                                                <?php 
                                                                   
                                                if(current_url() == base_url().'admin/resdata/browse'){
                                                    echo $active_tab;
                                                }
                                                else if(current_url() == base_url().'admin/resdata/add' || current_url() == base_url().'admin/resdata/createBook'){
                                                    echo $active_tab;
                                                }
                                                else if(current_url() == base_url().'admin/resdata/change'){
                                                    echo $active_tab;
                                                }
  
                                                ?>">Library Collections</a>
            <?php if($resdata){ ?>
            <a href="<?php echo base_url()?>admin/resdata/browse" class="sidenav-menu-sublinks <?php echo $res_browse;?>">Browse Collections</a>
            <a href="<?php echo base_url()?>admin/resdata/add" class="sidenav-menu-sublinks <?php echo $res_add;?>">New Entry</a>
            <a href="<?php echo base_url()?>admin/resdata/modify" class="sidenav-menu-sublinks <?php echo $res_mod;?>">Modify Information</a>
            <?php } ?>
            
			<a href="<?php echo base_url();?>admin/records/browse" class="sidenav-menu-links <?php if(current_url() == base_url().'admin/records/browse')echo $active_tab;?>">Records</a>
            <?php if($records){ ?>
            <a href="<?php echo base_url()?>admin/records/browse" class="sidenav-menu-sublinks <?php echo $rec_browse;?>">Browse Records</a>
            <?php } ?>
            
			<a href="<?php echo base_url();?>admin/statistics/library" class="sidenav-menu-links <?php if(current_url() == base_url().'admin/statistics/library') echo $active_tab; ?> ">Statistics</a>
			<?php if($stats){ ?>
            <a href="<?php echo base_url()?>admin/statistics/library" class="sidenav-menu-sublinks <?php echo $stat_lib;?>">Library</a>
            <a href="<?php echo base_url()?>admin/statistics/department" class="sidenav-menu-sublinks <?php echo $stat_dep;?>">Department</a>
            <a href="<?php echo base_url()?>admin/statistics/system" class="sidenav-menu-sublinks <?php echo $stat_sys;?>">System</a>
            <?php } ?>
		</div>
 