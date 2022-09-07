<?php

/**
 * Template Name: Custom Login Page
 *
 * @version 1.0
 * @author alavi
 */
//class custom_login
//{
//}

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

<style>
.loginForm{
padding: 70px;

}
</style>

<div class="loginForm">
<form method="post">

<strong style="font-size: 40px;">Login to LeadLife</strong>
    <p>
        <label for="username">Username/Email</label><br />
        <input name="username" type="text" id="username" placeholder="Enter Username/Email" />
    </p>
    <p>
        <label for="password">Password</label><br />
        <input name="password" type="password" id="password" placeholder="Enter Password" />
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