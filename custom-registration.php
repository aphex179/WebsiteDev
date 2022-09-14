<?php

/**
 * Template Name: Custom Registration Page 2
 *
 * @version 1.0
 * @author alavi
 *
 *References
  *Create register form without a plugin. (2016). Retrieved 5 September 2022, from https://wordpress.stackexchange.com/questions/247531/create-register-form-without-a-plugin
 *Online Web Tutor. (2018). Custom Registration/Sign Up Page Without Using a Plugin step by step tutorial for beginner WordPress [Video]. Retrieved from https://www.youtube.com/watch?v=LTNUSb_5zA8
 https://codepen.io/javascriptacademy-stash/pen/oNeNMNR
 *
 */

get_header();
global $wpdb;


if($_POST){
	$firstname = $wpdb->escape($_POST['txtFirstName']);
    $lastname = $wpdb->escape($_POST['txtLastName']);
    $username = $wpdb->escape($_POST['txtUsername']);
    $email = $wpdb->escape($_POST['txtEmail']);
    $password = $wpdb->escape($_POST['txtPassword']);
    $ConfPassword = $wpdb->escape($_POST['txtConfirmPassword']);
    
    $error = array();
    
     if (empty("$firstname")) {
        $error['firstname_empty'] = "First Name is required!";
    }
    
     if (empty("$lastname")) {
        $error['lastname_empty'] = "Last Name is required!";
    }
    
    if (strpos($username, ' ') !== FALSE) {
        $error['username_space'] = "Username cannot contain spaces!";
    }

    if (empty($username)) {
        $error['username_empty'] = "Username cannot be empty!";
    }

    if (username_exists($username)) {
        $error['username_exists'] = "Username already exists!";
    }

    if (!is_email($email)) {
        $error['email_valid'] = "Email has no valid value!";
    }

    if (email_exists($email)) {
        $error['email_existence'] = "Email already exists!";
    }

    if (strcmp($password, $ConfPassword) !== 0) {
        $error['password'] = "Password do not match!";
    }

    //create user if no errors found
    if (count($error) == 0) {

        //wp_create_user($firstname, $lastname, $username, $email, $password);
        wp_create_user($username, $password, $email);
        //echo "User Created Successfully, Thank you for Registering";
        
        //show user id
        $user = get_user_by( 'email', $email);
		//echo $user->id;
        
        $userId=$user->id;
        
        wp_update_user([
    	'ID' => $userId, // this is the ID of the user you want to update.
    	'first_name' => $firstname,
    	'last_name' => $lastname,
		]);
    
        echo "User Created Successfully, Thank you for Registering";
		
		wp_redirect(site_url()."/log-in");
		
        exit();
    }else{
        
        //print_r($error);
        
                if ( ! empty( $error ) ) {
	foreach ( $error as $error ) {
		echo '<div class="error-message">' . esc_html( $error ) . '</div>';
	}
}
 
        
    }
}


?>

<script>
//Save reference for each variable

function inputValidation(inputTxt){
var firstN = document.getElementById('txtFirstName');
var f_name_error = document.getElementById("name-error");

if (firstN.value == ''){
	f_name_error.textContent = 'Please enter your first name!';
     f_name_error.style.color = 'red';
	} else {
    	f_name_error.textContent = '';
    }
}

function inputValidation2(inputTxt){
var lastN = document.getElementById('txtLastName');
var l_name_error = document.getElementById("name-error2");

if (lastN.value == ''){
	l_name_error.textContent = 'Please enter your last name!';
     l_name_error.style.color = 'red';
	} else {
    	l_name_error.textContent = '';
    }
}

function inputValidation3(inputTxt){
var userN = document.getElementById('txtUsername');
var username_error = document.getElementById("username-error");

if (userN.value == ''){
	username_error.textContent = 'Please enter a username!';
     username_error.style.color = 'red';
	} else {
    	username_error.textContent = '';
    }
}

function inputValidation4(inputTxt){
var email = document.getElementById('txtEmail');
var email_error = document.getElementById("email-error");

if (email.value == ''){
	email_error.textContent = 'Please enter a valid email!';
     email_error.style.color = 'red';
	} else {
    	email_error.textContent = '';
    }
}

function inputValidation5(txtPassword, txtConfirmPassword){
var password = document.getElementById('txtPassword');
var conf_password = document.getElementById('txtConfirmPassword');
var pw_error = document.getElementById("pw-error");

if ( conf_password.value === password.value){
    	pw_error.textContent = 'Passwords match!';
        pw_error.style.color = 'green';
	} else if(conf_password.value !== password.value)  {
	pw_error.textContent = 'Passwords do not match!';
     pw_error.style.color = 'red';
    }
}


  
</script>


<style>
.regoForm{
padding: 70px;
}

#custom-registration{
margin: 20vh auto 0 auto;
padding: 20px;
}



</style>

<div class="regoForm">

<form id="customRegistration" method = "post">

<h1>Registration</h1>

	
    <div class="input-control">
    	<label for="txtFirstName">Enter First Name</label><br>
        <input id="txtFirstName" name="txtFirstName" type="text" placeholder="First Name" onblur='inputValidation(this)'>
        <br/>
        <div id='name-error'></div>
        </div>
        
    
    	<div class="input-control">
    	<label for="txtLastName">Enter Last Name</label><br>
        <input type="text" id="txtLastName" name="txtLastName" placeholder="Last Name" onblur='inputValidation2(this)'>
         <br/>
        <div id='name-error2'></div>
        
    </div>
    
    	<div class="input-control">
    	<label for="txtUserName">Enter Username</label><br>
        <input id="txtUsername" name="txtUsername" type="text" placeholder="Username" onblur='inputValidation3(this)'>
                 <br/>
        <div id='username-error'></div>
        
    </div>
    
    	<div class="input-control">
    	<label for="txtEmail">Enter Email</label><br>
        <input id="txtEmail" name="txtEmail" type="text" placeholder="Email" onblur='inputValidation4(this)'> 
        <br/>
        <div id='email-error'></div>
        
    </div>
    
        <div class="input-control">
    	<label for="txtPassword">Enter Password</label><br>
        <input  id="txtPassword" name="txtPassword" type="password" placeholder="Password">
        
    </div>
    
       <div class="input-control">
    	<label for="txtConfirmPassword">Confirm Password</label><br>
        <input id="txtConfirmPassword" name="txtConfirmPassword" type="password" placeholder="Confirm Password" onblur='inputValidation5(this)'>
        <br/>
        <div id='pw-error'></div>
    </div>
      
    <button type="submit">Register</button> 

</form>
</div>

<?php 

get_footer() 

?>
