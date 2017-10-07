<?php

	if($active_side=='accman'){
		$css_act_option = "active-page-option";
		if(isset($_GET['p_option'])){
			$p_option = $_GET['p_option'];
		}else{
			$p_option = "browse";
		}
?>


<h1 class="page-title">Account Management</h1>
<div class="page-options-holder">
	<a href="?active-sidenav=accman&p_option=browse" class="page-options-links <?php if($p_option=='browse')echo $css_act_option;?>">Browse User Accounts</a>
	<a href="?active-sidenav=accman&p_option=add" class="page-options-links <?php if($p_option=='add')echo $css_act_option;?>">Add User Account</a>
	<a href="?active-sidenav=accman&p_option=mod" class="page-options-links <?php if($p_option=='mod')echo $css_act_option;?>">Modify User Account</a>
	<a href="?active-sidenav=accman&p_option=change" class="page-options-links <?php if($p_option=='change')echo $css_act_option;?>">Change Admin Password</a>
</div>
<?php
	}elseif($active_side=='resdat'){
		$css_act_option = "active-page-option";
		if(isset($_GET['p_option'])){
			$p_option = $_GET['p_option'];
		}else{
			$p_option = "browse";
		}
?>

<h1 class="page-title">Resources' Data</h1>
<div class="page-options-holder">
	<a href="?active-sidenav=resdat&p_option=browse" class="page-options-links <?php if($p_option=='browse')echo $css_act_option;?>">Browse Resources</a>
	<a href="?active-sidenav=resdat&p_option=add" class="page-options-links <?php if($p_option=='add')echo $css_act_option;?>">New Entry</a>
	<a href="?active-sidenav=resdat&p_option=mod" class="page-options-links <?php if($p_option=='mod')echo $css_act_option;?>">Modify Resources</a>
</div>

<?php
	}elseif($active_side=='rec'){
		$css_act_option = "active-page-option";
		if(isset($_GET['p_option'])){
			$p_option = $_GET['p_option'];
		}else{
			$p_option = "browse";
		}
?>

<h1 class="page-title">Records</h1>
<div class="page-options-holder">
	<a href="?active-sidenav=rec&p_option=browse" class="page-options-links <?php if($p_option=='browse')echo $css_act_option;?>">Browse Records</a>
</div>

<?php
	}elseif($active_side=='stat'){
		$css_act_option = "active-page-option";
		if(isset($_GET['p_option'])){
			$p_option = $_GET['p_option'];
		}else{
			$p_option = "all";
		}
?>

<h1 class="page-title">Statistics</h1>
<div class="page-options-holder">
	<a href="?active-sidenav=stat&p_option=all" class="page-options-links <?php if($p_option=='all')echo $css_act_option;?>">All Statistics</a>
</div>

<?php } ?>