<?php
    include 'header.php';
?> 
<?php
    require './includes/conn.inc.php';

    if(!(isset($_SESSION['userName']) && $_SESSION['is_admin'] == 1)){
        header("Location: index.php");
    }

    if (isset($_GET['id'])) {
        $userId = $_GET['id'];

        $query = $pdo->prepare("SELECT * FROM users WHERE id = :id");
        $query->execute(['id' => $userId]);
        $currentUser = $query->fetch(PDO::FETCH_ASSOC);
    }

    if (isset($_POST['edit-submit'])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $admin = isset($_POST['admin']) ? $admin = 1 : $admin = 0;
        $birthday = $_POST['birthday'];

        $query = $pdo->prepare("UPDATE users SET user_firstname = :user_firstname, user_surname = :user_surname, user_email = :user_email, user_country = :user_country, is_admin = :is_admin, user_birthday = :user_birthday
        WHERE id = :id");
        $query->execute([
            'id' => $userId,
            'user_firstname' => $name,
            'user_surname' => $surname,
            'user_email' => $email,
            'user_country' => $country,
            'is_admin' => $admin,
            'user_birthday' => $birthday
        ]);

        header("Location: ./users.php?edit=success");
    }

?>
</div>
</div>

    <div class="form-wrap-log">
        <div class="container">
            <h1><span class="purple-fonts">Edit</span> User</h1>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" name="name" id="name" value="<?php echo $currentUser['user_firstname']?>"/>
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" name="surname" id="surname" value="<?php echo $currentUser['user_surname']?>"/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo $currentUser['user_email']?>"/>
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
                    <label for="admin">Admin</label>
                    <input type="checkbox" name="admin" id="admin">
                </div>
                <div class="form-group">
                    <label for="birthday">Birthday</label>
                   <input type="text" name="birthday" id="birthday" autocomplete="off" value="<?php echo $currentUser['user_birthday']?>">
                </div>
                <button type="submit" name="edit-submit" class="btn-1">Edit</button>
                <p class="bottom-text">
                    By clicking the Edit button, you agree to our
                    <a href="#">Terms & Conditions</a> and
                    <a href="#">Privacy Policy</a>
                </p>
            </form>
    </div>
    </div>

<?php
    include 'footer.php';
?>