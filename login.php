<div id="modal-wrapper">
	<div class="modal-content">
		<p onclick="closePopUp()" class="close">&times;</p>
		<h1 class="marg-b-10"><span class="purple-fonts">Log</span> In</h1>
		<?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'emptyfields') {
                        echo '<p class="error-css">Empty Fileds</p>';
                    }
                    else if ($_GET['error'] == 'sqlerror') {
                        echo '<p class="error-css">DB Error</p>';
                    }
                    else if ($_GET['error'] == 'wrongpwd') {
                        echo '<p class="error-css">Wrong Password</p>';
                    }
                    else if ($_GET['error'] == 'nouser') {
                        echo '<p class="error-css">This Email Dont Exist</p>';
                    }
                }
            ?>

		<form action="includes/login.inc.php" method="POST">
			<input type="email" placeholder="Enter Email" name="email" autofocus>
			<input type="password" placeholder="Enter Password" name="password">        
			<button type="submit" name="login-submit" class="btn-1">LogIn</button>
		</form>
  </div>
</div>