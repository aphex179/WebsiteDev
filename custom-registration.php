<?php

/**
 * Template Name: Custom Registration Page
 *
 * @version 1.0
 * @author alavi
 */
//class custom_registration
//{
//}

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

        wp_create_user($firstname, $lastname, $username, $email, $password);
        echo "User Created Successfully, Thank you for Registering";
        exit();
    }else{
        
        print_r($error);
        
    }
}


?>

<style>
.regoForm{
padding: 70px;

}
</style>

<div class="regoForm">
<form method = "post">
<strong style="font-size: 40px;">Register to LeadLife</strong>
	<p>
    	<label>Enter First Name</label>
        <div><input type="text" id="txtFirstName" name="txtFirstName" placeholder="FirstName"/></div>
    </p>
    
    	<p>
    	<label>Enter Last Name</label>
        <div><input type="text" id="txtLastName" name="txtLastName" placeholder="LastName"/></div>
    </p>
    
    	<p>
    	<label>Enter Username</label>
        <div><input type="text" id="txtUsername" name="txtUsername" placeholder="Username"/></div>
    </p>
    
    	<p>
    	<label>Enter Email</label>
        <div><input type="email" id="txtEmail" name="txtEmail" placeholder="Email"/></div>
    </p>
    
        <p>
    	<label>Enter Password</label>
        <div><input type="password" id="txtPassword" name="txtPassword" placeholder="Password"/></div>
    </p>
    
       <p>
    	<label>Confirm Password</label>
        <div><input type="password" id="txtConfirmPassword" name="txtConfirmPassword" placeholder="ConfirmPassword"/></div>
    </p>
    
    <input type="submit" name="btnSubmit"/>

</form>
</div>

<?php 

get_footer() 

?>