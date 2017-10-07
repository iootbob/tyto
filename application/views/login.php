<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tyto | Login</title>
<link href="<?php echo base_url()?>assets/css/login.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1 class="proj-logo">Tyto</h1>

<div class="login-container">
	<h2 class="login-title">LOGIN</h2>
	<?php echo form_open('user/login',$attributes = array('class' => 'login-form-design')) ?>
		<hr>
    
		<p class="login-labels">ID Number</p>
		<input type="text" name="id-num" class="login-inputbox">
        <small><center><?php echo form_error('id-num'); ?></center></small>
		<p class="login-labels">Password</p>
		<input type="password" name="password" class="login-inputbox">
        <small><center><?php echo form_error('password'); ?></center></small>
        <br>
		<input type="submit" name="sublogin" value="LOGIN" class="login-inputbutton">
        <?php if($this->session->flashdata('login_error')): ?>
           	<br>
            <?php echo '<p style = "text-align:center;">'.$this->session->flashdata('login_error').'</p>'; ?>
        <?php endif; ?>
	</form>
</div>
<p class="login-footer">TYTO &copy; <span style="font-weight: bold">2017</span></p>
</body>
</html>