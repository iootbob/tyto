
<script src="<?php echo base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
<script>
	var menuToggled = false;
	var accMenuToggled = false;
	
	function toggleMenu(){
		if(menuToggled==false){
			document.getElementById("menu-pop").style.display = "block";
			document.getElementById("menu-icon").style.transform = "rotate(180deg)"
			setTimeout(function() {
				document.getElementById("menu-pop").style.width = "250px";
				document.getElementById("menu-pop").style.height = "115px";
				document.getElementById("menu-pop").style.padding = "10px 0px";
				document.getElementById("menu-pop").style.marginTop = "20px";
				document.getElementById("menu-pop").style.marginLeft = "0px";
					
				},10)
			menuToggled = true;
		} else {
			document.getElementById("menu-pop").style.width = "0px";
			document.getElementById("menu-pop").style.height = "0px";
			document.getElementById("menu-pop").style.padding = "0px";
			document.getElementById("menu-pop").style.marginTop = "-10px";
			document.getElementById("menu-pop").style.marginLeft = "30px";
			document.getElementById("menu-icon").style.transform = "rotate(0deg)"
			setTimeout(function() {
				document.getElementById("menu-pop").style.display = "none";
				},500)	
			menuToggled = false;
		}
	}
	
	function toggleAccMenu(){
		if(accMenuToggled==false){
			document.getElementById("account-menu-pop").style.display = "block";
			setTimeout(function() {
				document.getElementById("account-menu-pop").style.width = "180px";
				document.getElementById("account-menu-pop").style.height = "210px";
				document.getElementById("account-menu-pop").style.padding = "10px 0px";
				document.getElementById("account-menu-pop").style.marginTop = "20px";
				document.getElementById("account-menu-pop").style.marginLeft = "-80px";
					
				},10)
			accMenuToggled = true;
		} else {
			document.getElementById("account-menu-pop").style.width = "0px";
			document.getElementById("account-menu-pop").style.height = "0px";
			document.getElementById("account-menu-pop").style.padding = "0px";
			document.getElementById("account-menu-pop").style.marginTop = "-10px";
			document.getElementById("account-menu-pop").style.marginLeft = "10px";
			setTimeout(function() {
				document.getElementById("account-menu-pop").style.display = "none";
				},500)	
			accMenuToggled = false;
		}
	}
	
	function showBookbag(){
		document.getElementById("user-modals").style.display = "block";
		document.getElementById("bookbag-modal").style.display = "block";
		document.getElementById("body").style.overflow = "hidden";
		setTimeout(function() {
			document.getElementById("user-modals").style.opacity = "1";
			document.getElementById("header").style.filter = "blur(10px)";
			document.getElementById("page-contents").style.filter = "blur(10px)";
			setTimeout(function() {
				document.getElementById("bookbag-modal").style.marginTop = "80px";
				document.getElementById("bookbag-modal").style.opacity = "1";


				},100)

			},10)
	}
	
	function hideBookbag(){
		document.getElementById("bookbag-modal").style.marginTop = "180px";
		document.getElementById("bookbag-modal").style.opacity = "0";
		
		setTimeout(function() {
			document.getElementById("user-modals").style.opacity = "0";
			document.getElementById("header").style.filter = "blur(0px)";
			document.getElementById("page-contents").style.filter = "blur(0px)";
			setTimeout(function() {
				document.getElementById("user-modals").style.display = "none";
				document.getElementById("bookbag-modal").style.display = "none";
				document.getElementById("body").style.overflow = "auto";
				},500)
			},10)
	}
	
	function showNotif(){
		document.getElementById("user-modals").style.display = "block";
		document.getElementById("notif-modal").style.display = "block";
		document.getElementById("body").style.overflow = "hidden";
		setTimeout(function() {
			document.getElementById("user-modals").style.opacity = "1";
			document.getElementById("header").style.filter = "blur(10px)";
			document.getElementById("page-contents").style.filter = "blur(10px)";
			setTimeout(function() {
				document.getElementById("notif-modal").style.marginTop = "80px";
				document.getElementById("notif-modal").style.opacity = "1";


				},100)

			},10)
	}
	
	function hideNotif(){
		document.getElementById("notif-modal").style.marginTop = "180px";
		document.getElementById("notif-modal").style.opacity = "0";
		
		setTimeout(function() {
			document.getElementById("user-modals").style.opacity = "0";
			document.getElementById("header").style.filter = "blur(0px)";
			document.getElementById("page-contents").style.filter = "blur(0px)";
			setTimeout(function() {
				document.getElementById("user-modals").style.display = "none";
				document.getElementById("notif-modal").style.display = "none";
				document.getElementById("body").style.overflow = "auto";
				},500)
			},10)
	}
	
	function showBookInfo(){
		document.getElementById("user-modals").style.display = "block";
		document.getElementById("book-info-modal").style.display = "block";
		document.getElementById("body").style.overflow = "hidden";
		setTimeout(function() {
			document.getElementById("user-modals").style.opacity = "1";
			document.getElementById("header").style.filter = "blur(10px)";
			document.getElementById("page-contents").style.filter = "blur(10px)";
			setTimeout(function() {
				document.getElementById("book-info-modal").style.marginTop = "80px";
				document.getElementById("book-info-modal").style.opacity = "1";


				},100)

			},10)
	}
	
	function hideBookInfo(){
		document.getElementById("book-info-modal").style.marginTop = "180px";
		document.getElementById("book-info-modal").style.opacity = "0";
		
		setTimeout(function() {
			document.getElementById("user-modals").style.opacity = "0";
			document.getElementById("header").style.filter = "blur(0px)";
			document.getElementById("page-contents").style.filter = "blur(0px)";
			setTimeout(function() {
				document.getElementById("user-modals").style.display = "none";
				document.getElementById("book-info-modal").style.display = "none";
				document.getElementById("body").style.overflow = "auto";
				},500)
			},10)
	}
	
	//account page scripts
	
	var allAccSidenav = document.getElementsByClassName("account-sidenav-buttons");
	var allAccContents = document.getElementsByClassName("account-contents-holder");
	var contentTitle = "";
	var activeSidenav = "AccountOverview";
	
	for(i = 0; i < allAccContents.length; i++){
		allAccContents[i].style.display = "none";
	}
	
	document.getElementById(activeSidenav).style.display = "block";
	
	for(i = 0; i < allAccSidenav.length; i++){
		allAccSidenav[i].addEventListener("click", changeAccContent);
	}
	
	function changeAccContent(e){
		
		for(i = 0; i < allAccSidenav.length; i++){
			allAccSidenav[i].classList.remove("active-account-sidenav-button");
		}
		
		this.classList.add("active-account-sidenav-button");
		
		activeSidenav = this.value.replace(/\s/g, '');
		contentTitle = this.value;
		
		document.getElementById("account-contents-sec-div").style.marginTop = "100px";
		document.getElementById("account-contents-sec-div").style.opacity = "0";
		document.getElementById("account-contents-title").style.marginLeft = "-50px";
		document.getElementById("account-contents-title").style.opacity = "0";
		document.getElementById("account-contents-title").style.filter = "blur(10px)";
		document.getElementsByClassName("account-contents-hr")[0].style.borderColor = "#484848";
		document.getElementsByClassName("account-contents-hr")[0].style.width = "170px";
		setTimeout(function() {
			for(i = 0; i < allAccContents.length; i++){
				allAccContents[i].style.display = "none";
			}
			document.getElementById(activeSidenav).style.display = "block";
			document.getElementById("account-contents-title").innerHTML = contentTitle;
			setTimeout(function() {
					document.getElementById("account-contents-sec-div").style.marginTop = "0px";
					document.getElementById("account-contents-sec-div").style.opacity = "1";
					document.getElementById("account-contents-title").style.marginLeft = "0px";
					document.getElementById("account-contents-title").style.opacity = "1";
					document.getElementById("account-contents-title").style.filter = "blur(0px)";
					document.getElementsByClassName("account-contents-hr")[0].style.borderColor = "#b94141";
					document.getElementsByClassName("account-contents-hr")[0].style.width = "130px";
				},10)
			},300)
	}

</script>

<!--<script src="js/ajax_functions.js"></script>-->