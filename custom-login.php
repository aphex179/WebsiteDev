<?php

/**
 * Template Name: Custom Login Page
 *
 * @version 1.0
 * @author alavi
 *
 *References
 *Customizing the Login Form « WordPress Codex. Retrieved 5 September 2022, from https://codex.wordpress.org/Customizing_the_Login_Form
 *Online Web Tutor. (2018). Step by step to create WordPress Custom Login Page Without Using a Plugin [Video]. Retrieved from https://www.youtube.com/watch?v=HafkLf1EPdw
 */

	global $user_ID;
	global $wpdb;

	if(!$user_ID){
	//when the user is not logged in

	if($_POST){
		$username =$wpdb->escape($_POST['username']); //has to be wpdb for live site
		$password =$wpdb->escape($_POST['password']);

		$login_array = array();
		$login_array['user_login'] = $username;
		$login_array['user_password'] = $password;

		//authenticate user using wp_signon
		$verify_user = wp_signon($login_array,true);
		if(!is_wp_error($verify_user)){
		//after successful login, redirect to homepage
			echo "<script>window.location = '".site_url()."'</script>";
}else{
		//invalid login
			echo "INVALID credentials";

}

}
else{

	get_header();
?>

<script>
function inputValidation(inputTxt){
var userN = document.getElementById('username');
var userN_error = document.getElementById("userN-error");

if (userN.value == ''){
	userN_error.textContent = 'Please enter your username!';
     userN_error.style.color = 'red';
	} else {
    	userN_error.textContent = '';
    }
}

function inputValidation2(inputTxt){
var password = document.getElementById('password');
var password_error = document.getElementById("pwd-error");

if (password.value == ''){
	password_error.textContent = 'Please enter your password!';
     password_error.style.color = 'red';
	} else {
    	password_error.textContent = '';
    }
}

</script>


<style>
.loginForm{
padding: 70px;
display: flex;
justify-content: center;
}

#page.site{
 margin-top:100px;
}


</style>

<div class="loginForm">
<form method="post">

<strong style="font-size: 40px;">Login to LeadLife</strong>
    <p>
        <label for="username">Username/Email</label><br />
        <input name="username" type="text" id="username" placeholder="Enter Username" onblur='inputValidation(this)'>
        <div id='userN-error'></div>
    </p>
    
    <p>
        <label for="password">Password</label><br />
        <input name="password" type="password" id="password" placeholder="Enter Password" onblur='inputValidation2(this)'>
        <div id='pwd-error'></div>
    </p>
    <p>
        <button type="submit" name="submit">Login</button>
    </p>
</form>
</div>
<?php
get_footer();
}
}else{
//if user is logged in
}

?>
