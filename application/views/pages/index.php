
<body id="body">
	<header id="header">
		<h1 class="site-logo">Tyto</h1>
		<p class="admin-logo"><?php echo $user_info['type']; ?></p>
        
        <!-- search button -->
		<form action="" method="post" class="search-form">
			<input type="text" name="search_basic" placeholder="Search" class="search-input">
			<input type="submit" value="&#xf002;" class="search-submit fa">
		</form>
        
        <!-- account toggle menu -->       
       	<div class="header-button fa" onClick="toggleAccMenu();">&#xf2be;
			<div class="account-menu-pop" id="account-menu-pop">
				<div class="account-menu-profpic" style="background-image: url(<?php echo base_url() ?>assets/admin/images/profile/default_profpic.svg);"></div>
				<h2 class="account-menu-fname"><?php echo $user_info['fname']; ?></h2>
				<a href="<?php echo base_url();?>pages/contents/account" class="account-menu-links">Account Settings</a>
				<a href="#" class="account-menu-links">Feedback</a>
				<a href="<?php echo base_url('user/logout') ?>" class="account-menu-links">Logout</a>
			</div>
		</div>
        <!-- end account toggle menu -->
        
        <!-- bookbag menu -->
		<button class="header-button fa" onClick="showBookbag();">&#xf02d;</button>
        
        <!-- notification menu toggle -->
		<button class="header-button fa" onClick="showNotif();">&#xf0a2;</button>
        
        <!-- home button -->
        <a href="<?php echo base_url();?>pages/contents/home" class="header-button fa">&#xf015;</a>
        
        <!-- menu toggle -->
		<div class="menu-button" onClick="toggleMenu();"><span class="fa" style="transition: 0.5s all" id="menu-icon">&#xf107;</span> Menu
			<div class="menu-pop" id="menu-pop">
				<a href="#" class="menu-links" onClick="showBookbag();">Bookbag</a>
				<a href="#" class="menu-links">Reservations</a>
				<a href="#" class="menu-links">Fine Management</a>
				<a href="#" class="menu-links">Search History</a>
			</div>
		</div>
        <!-- end  menu toggle -->
        
        
	</header>
	


