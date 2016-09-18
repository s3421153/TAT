<?php require './includes/header.php'; ?>

<?php if ( empty($_SESSION['loggedIn']) ){ ?> 
<div class="container">

  <div class="card-login">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <div class="card well">
          <h2>LECTURER LOGIN</h2>
          
          <?php 
          // If there were errors 
          if ( !empty($_SESSION['loginError']) ) {
              echo $_SESSION['loginError'];
          } ?>

          <form id="form-login" class="" action="includes/login.php" method="post">
    
            <div class="form-group">
              <input class="form-control" type="email" name="email" id="email" autofocus="" 
                placeholder="Email" maxlength="255" required="required">
            </div>

            <div class="form-group">
              <input class="form-control" type="password" name="password" id="password" 
                placeholder="Password" required="required">
            </div>
    
            <input type="submit" name="login-submit" id="login-submit" 
              class="accent-color secondary-text-color btn btn-lg" value="Log in">

            <hr>
    
          </form>
        </div>
      </div>
    </div>
  </div>

</div><!-- !container -->
<?php } ?>

<?php if ( !empty($_SESSION['loggedIn']) ){ ?> 
<div class="main-content container">

  
      <p>
		Logged In User:       
        <?php echo $_SESSION['username'] ? $_SESSION['username'] : 'username'; ?>
      </p>
	
</div>

<?php } ?> 


<?php require './includes/footer.php'; ?>
