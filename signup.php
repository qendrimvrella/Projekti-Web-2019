<?php
    include 'header.php';
?> 
</div>
</div>

    <div class="form-wrap-log">
        <div class="container">
            <h1><span class="purple-fonts">Sign</span> Up</h1>
    
            <p id="form-message"></p>

            <form id="signup-form" action="includes/signup.inc.php" method="POST">
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" name="name" id="name" autofocus/>
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" name="surname" id="surname" />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" minlength="6"/>
                </div>
                <div class="form-group">
                    <label for="password2">Confirm Password</label>
                    <input type="password" name="passwordRepeat" id="passwordRepeat"/>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="radio" name="gender" id="genderM" value="M"/>Male
                    <input type="radio" name="gender" id="genderF" value="F"/>Female
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <select name="country" id="country">
                        <option value="Kosova">Kosova</option>
                        <option value="Albania">Albania</option>
                        <option value="Deutschland">Deutschland</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="United States">United States</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="birthday">Birthday</label>
                    <?php 
                        echo '<input type="text" name="birthday" id="birthday" autocomplete="off" placeholder=" y-m-d '. date("Y-m-d").'"/>';
                    ?>
                </div>
                <button id="signup-submit-id" type="submit" name="signup-submit" class="btn-1">Sign Up</button>
                <p class="bottom-text">
                    By clicking the Sign Up button, you agree to our
                    <a href="#">Terms & Conditions</a> and
                    <a href="#">Privacy Policy</a>
                </p>
            </form>
    </div>
    </div>

<?php
    include 'footer.php';
?>