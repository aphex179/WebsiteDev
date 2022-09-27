<?php
/**
 * Template Name: Custom Confirmation Registration
 *
 * @version 1.0
 * @author alavi
 */

get_header();
?>
<style>

#page.site{
    	margin-top:100px;
}

.custom-reg-conf{
padding: 100px; 
  /*display: flex; */
    margin: auto;
  width: 50%;
  text-align: center;
  justify-content: center;
  }

   .site-footer{
    position: absolute;
	right: 0;
	bottom: 0;
	left: 0;
   }
   
   p{
	    font-size: 20px;
	   
   }
   
   h1{
   padding-bottom: 20px;
   }

</style>

<body onload="redirectLogin()">

<div class="custom-reg-conf">

<h1>Thank you for Registering with Lead Life!</h1>

<p>
You will be automatically directed to the Login Page
</p>

<p>
Otherwise, <a href="https://leadlife.com.au/log-in/">Click Here to Login</a>
</p>

<p>
Any inquires, please <a href="https://leadlife.com.au/contact-me/">Contact Us Here</a>
</p>

</div>  
	
</body>

<script>
    function redirectLogin(){
        window.location="https://leadlife.com.au/log-in/";
    }
</script>

<?php 

get_footer(); 

?>
