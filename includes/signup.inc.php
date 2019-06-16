<?php

if (isset($_POST['submit'])) {

    require 'conn.inc.php';

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $birthday = $_POST['birthday'];

    $errorEmpty =  $errorInvalidEmail = $errorInvalidName = $errorInvalidSurname = $errorPwdRep = $successSignup = $errorInvalidBirthday = false;


    if (empty($name) || empty($surname) || empty($email) || empty($password) || empty($passwordRepeat) || empty($birthday)) {
        echo '<span class="error-css">Empty Fileds</span>';
        $errorEmpty = true;
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<span class="error-css">Invalid Email</span>';
        $errorInvalidEmail = true;           
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        echo '<span class="error-css">Invalid Name</span>';
        $errorInvalidName = true;        
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $surname)) {
        echo '<span class="error-css">Invalid Surname</span>';
        $errorInvalidSurname = true;        
    }
    else if ($password !== $passwordRepeat) {
        echo '<span class="error-css">Passwords dont match</span>';
        $errorPwdRep = true;
    }
    else if (!preg_match("/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))*$/", $birthday)) {
        echo '<span class="error-css">Invalid Birthday</span>';
        $errorInvalidBirthday = true;        
    }
    else {
        $query = $pdo->prepare("SELECT user_email FROM users WHERE user_email= :user_email");

        $query->execute([':user_email' => $email]);
        $users = $query->fetch();

        if ($users > 0) {
            echo '<span class="error-css">Email is Used Sorry</span>';
            $errorInvalidEmail = true;
        }
        else {
            $sql = "INSERT INTO users (user_firstname, user_surname, user_email, user_password, user_gender, user_country, user_birthday) 
            VALUES (:user_firstname, :user_surname, :user_email, :user_password, :user_gender, :user_country, :user_birthday)";
            $query = $pdo->prepare($sql);

            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            $query->execute([
                ':user_firstname' => $name, 
                ':user_surname' => $surname, 
                ':user_email' => $email, 
                ':user_password' => $hashedPwd,   
                ':user_gender' => $gender, 
                ':user_country' => $country,
                ':user_birthday' => $birthday
            ]);
            
            echo '<span class="succes-css">You have Sign Up</span>';
            $successSignup = true;
             
        }
    }
}

?>

<script>
    $("#name, #surname, #email, #password, #passwordRepeat, #birthday").removeClass("input-error");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorInvalidName = "<?php echo $errorInvalidName; ?>";
    var errorInvalidSurname = "<?php echo $errorInvalidSurname; ?>";
    var errorInvalidEmail = "<?php echo $errorInvalidEmail; ?>";
    var errorPwdRep = "<?php echo $errorPwdRep; ?>";
    var errorInvalidBirthday = "<?php echo $errorInvalidBirthday; ?>";
    var successSignup = "<?php echo $successSignup; ?>";

    if (errorEmpty == true) {
        $("#name, #surname, #email, #password, #passwordRepeat, #birthday").addClass("input-error");
    }
    if (errorInvalidName == true) {
        $("#name").addClass("input-error");
    }
    if (errorInvalidSurname == true) {
        $("#surname").addClass("input-error");
    }
    if (errorInvalidEmail == true) {
        $("#email").addClass("input-error");
    }
    if (errorPwdRep == true) {
        $("#passwordRepeat").addClass("input-error");
    }
    if (errorInvalidBirthday == true) {
        $("#birthday").addClass("input-error");
    }
    if (successSignup == true) {
        $("#name, #surname, #email, #password, #passwordRepeat, #birthday").val("");
    }
    
</script>