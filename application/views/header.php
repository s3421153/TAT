<?php 
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> <?php echo $title; ?> </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
  
        <link rel="stylesheet" href="<?php echo base_url()?>Assets/css/accordian-css.css">
        <link rel="stylesheet" href="<?php echo base_url()?>Assets/css/normalize.css">
        <link rel="stylesheet" href="<?php echo base_url()?>Assets/css/main.css">
        <script src="<?php echo base_url()?>Assets/js/vendor/modernizr-2.8.3.min.js"></script>
	
		
		<!-- for UI Dialog -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

		
        <!-- ADDED LINES HERE (JS + CUSTOM JS IMPORTS) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="<?php echo base_url()?>Assets/js/vendor/popup-form.js"></script> <!-- custom JS for projects form -->
      
        
                
        <link href="https://fonts.googleapis.com/css?family=Lato|Oswald:700" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		<script src="Assets/js/vendor/js-cookie.js"></script>
		
    </head>

    <!-- using HTML5 boilerplate: https://html5boilerplate.com/ -->
    <body>

    <!-- =================================================================== -->
	<!--                        BRANDING / HEADER             	   	         -->
	<!-- =================================================================== -->
        <header class="full-width">
            
            <div class="page-wrap">
                <h1> <?php echo $pageHeader; ?> </h1>
            </div>
            
        </header>
        
        
        
        
    <!-- =================================================================== -->
	<!--                       MAIN CONTENT BEGIN            		         -->
	<!-- =================================================================== -->
        
        
        <!-- ..................USER LOG IN / LOG OUT PANEL...................... -->
        <section class="user-login-panel page-wrap">
            
            <i class="fa fa-user fa-4x" aria-hidden="true"></i>
             <!-- [PLACE HOLDER] Lectuer's login email here -->
             
             
             
             
            <?php 
            
     
            if (isset($userEmail))
					{
	        		echo' <span class="lecture-email"> ' .   $userEmail; 
     	    		echo '</span>';
					
					 //<!-- LOG OUT FUNCTIONALITY HERE -->
					 
					echo '<a href="'. site_url("Functions/userLogout") .'" class="log-out">log out</a>';
           
					}
				else 
					{
					echo'User Login ';
					echo '</span>';
				
					}
			?>
           
            
         
            
  
        </section>
