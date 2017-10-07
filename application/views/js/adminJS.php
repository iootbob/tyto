<!--<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>-->
<script src="<?php echo base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
<script>
   
    $(document).ready(function(){

 function update_options(){
  var dep_id = $('.dep').find(':selected').data('id');

  $('.prog option').each(function(){
   $(this).css('display','none');
   if($(this).data('id') == dep_id){
    $(this).css('display','initial');
   }
  });
     $('.prog option[value=""]').css('display','initial');
     $('.prog option[value=""]').attr('selected',true);
 }

update_options();
 $('.dep').change(function(){
  update_options();
 });
});
</script>

<script>
	var menuToggled = true;
	
	function toggleMenu(){
		if(menuToggled==false){
			document.getElementById("sidenav-menu").style.display = "block";
			document.getElementById("menu-icon").style.transform = "rotate(180deg)"
			setTimeout(function() {
					document.getElementById("sidenav-menu").style.marginLeft = "0px";
					document.getElementById("sidenav-menu").style.marginTop = "0px";
					document.getElementById("sidenav-menu").style.transform = "rotate(0deg)";
					document.getElementById("sidenav-menu").style.opacity = "1";
					document.getElementById("page-contents").style.width = "80%";
				},10)
			menuToggled = true;
		} else {
			document.getElementById("sidenav-menu").style.display = "block";
			document.getElementById("sidenav-menu").style.marginLeft = "-260px";
			document.getElementById("sidenav-menu").style.marginTop = "-100px";
			document.getElementById("sidenav-menu").style.transform = "rotate(30deg)";
			document.getElementById("sidenav-menu").style.opacity = "0";
			document.getElementById("menu-icon").style.transform = "rotate(0deg)";
			document.getElementById("page-contents").style.width = "100%";
			setTimeout(function() {
				document.getElementById("sidenav-menu").style.display = "none";
				},500)	
			menuToggled = false;
		}
	}
	
	function changeAddAccForm(){
		//alert("change ADD ACC FORM");
		var curFormType = document.getElementById("select-form-type").value;
		var allForms = document.getElementsByClassName("add-account-form");
		
		for(i=0;i<allForms.length;i++){
			allForms[i].style.opacity = "0";
		}
		setTimeout(function() {
			for(i=0;i<allForms.length;i++){
				allForms[i].style.display = "none";
			}
			document.getElementById(curFormType).style.display = "block";
			setTimeout(function() {
				document.getElementById(curFormType).style.opacity = "1";
			},10)
		},300)
	}
	
	// Statistics scripts
	
	document.getElementById("lib-type-div").style.display = "block";
	document.getElementById("lib-dep-div").style.display = "none";
	document.getElementById("lib-sec-div").style.display = "none";
	document.getElementById("lib-time-div").style.display = "none";
	function changeContent(){
		var currentView = document.getElementById("stat-options").value;
		document.getElementById("lib-type-div").style.opacity = "0";
		document.getElementById("lib-dep-div").style.opacity = "0";
		document.getElementById("lib-sec-div").style.opacity = "0";
		document.getElementById("lib-time-div").style.opacity = "0";
		
		setTimeout(function() {
			document.getElementById("lib-type-div").style.display = "none";
			document.getElementById("lib-dep-div").style.display = "none";
			document.getElementById("lib-sec-div").style.display = "none";
			document.getElementById("lib-time-div").style.display = "none";
			
			document.getElementById(currentView).style.display = "block";
				
			setTimeout(function() {
				document.getElementById(currentView).style.opacity = "1";
			},10)	
		},300)
	}
	
	function deleteAcc(name){
		
		if(confirm('Delete '+name+'\'s Account?')){
			//alert('deleted');
			return true;
		}else{
			//alert('nope');
			return false;
		}
	}
	
	/*
	function changeTab(tab){
		//alert(tab);
		
		curTab = document.querySelector("#"+tab);
		
		var link1 = document.querySelector("#accman");
		var link2 = document.querySelector("#resdat");
		var link3 = document.querySelector("#rec");
		var link4 = document.querySelector("#stats");
		
		if (classie.has(link1,"active-tab-sidenav") class.remove(link1, "active-tab-sidenav");
		if (classie.has(link1,"active-tab-sidenav") class.remove(link2, "active-tab-sidenav");
		if (classie.has(link1,"active-tab-sidenav") class.remove(link3, "active-tab-sidenav");
		if (classie.has(link1,"active-tab-sidenav") class.remove(link4, "active-tab-sidenav");
		
		classie.add(curTab,"active-tab-sidenav");
	}*/

</script>
<!--<script src="js/classie.js"></script>
<script src="js/ajax_functions.js"></script>-->