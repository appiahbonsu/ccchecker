<?php

$userLogged = false;
$isAdmin = false;
if (isset($_SESSION['username'])) {
  $userLogged = true;
  if ($_SESSION['username'] === "drbinner") {
    $isAdmin = true;
  }
}
?>

<header class="uk-background-primary uk-background-norepeat uk-background-cover uk-background-center-center uk-light" 
	>
	<nav class="uk-navbar-container">
	  <div class="uk-container">
	    <div data-uk-navbar>
	      <div class="uk-navbar-left">
	        <a class="uk-navbar-item uk-logo uk-visible@m" href="./">Team 2.0</a>
	        <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas-docs" data-uk-toggle><span
	          data-uk-navbar-toggle-icon></span>
               <!-- <span class="uk-margin-small-left">Articles</span> -->
            </a>
	      </div>
	      <div class="uk-navbar-center uk-hidden@m">
	        <a class="uk-navbar-item uk-logo" href="./">Team 2.0</a>
	      </div>
	      <div class="uk-navbar-right">
	        <ul class="uk-navbar-nav uk-visible@m">
	          <li ><a href="./">Home</a></li>
			  <?php if($userLogged === true) { ?>
				<li ><a href="./dashboard">Dashboard</a></li>

				<?php }?>
	          <li ><a href="https://t.me/namelessxl">Support</a></li>
	       
	          <li>
	            <div class="uk-navbar-item">
                <?php if($userLogged === true) { ?>
	              <a class="uk-button uk-button-small uk-button-primary-outline logoutbtn" href="./logout?destroy=sesssion_destroy">Logout</a>
	            <?php } else { ?>
                    <a class="uk-button uk-button-small uk-button-primary-outline" href="./create?new_user=true">Join</a>
                    <?php } ?>
                </div>
	          </li>
	        </ul>
	        <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas" data-uk-toggle><span
	          data-uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span></a>
	      </div>
	    </div>
	  </div>
	</nav>
	
	
</header>
<div id="hyper_progress"></div>