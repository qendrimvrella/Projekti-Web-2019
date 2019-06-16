<?php
    include 'header.php';
?> 
<?php
    include './includes/conn.inc.php';
    
    if(!isset($_SESSION['userName'])){
        header("Location: index.php");
    }

    $query = $pdo->query("SELECT * FROM users");
    $query->execute();

    $users = $query->fetchAll(PDO::FETCH_ASSOC);
?>
</div>
</div>

    <div id="user-con">
        <div class="container">
            <?php 
                if (isset($_GET['edit']) && $_GET['edit'] == 'success') {
                    echo '<p class="succes-css">User Edited Success</p>';
                } else if (isset($_GET['delete']) && $_GET['delete'] == 'success') {
                    echo '<p class="error-css">User Deleted Success</p>';
                }
            ?>
            
            <table>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th> 
                <th>Age</th>
                <?php if(isset($_SESSION['userName']) && $_SESSION['is_admin'] == 1): ?> 
                <th>Actions</th>
                <?php endif;?>
            </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['user_firstname']; ?></td>
                <td><?php echo $user['user_surname']; ?></td>
                <td><?php echo $user['user_email']; ?></td> 
                <td><?php echo date("Y") - substr($user['user_birthday'], 0, 4); ?></td>
                <?php if(isset($_SESSION['userName']) && $_SESSION['is_admin'] == 1): ?>     
                <td>
                    <a href="edit-user.php?id=<?php echo $user['id']; ?>">Edit</a>
                    <a href="delete-user.php?id=<?php echo $user['id']; ?>">Delete</a>
                </td>
                <?php endif;?>
            </tr>
        <?php endforeach;?>
            </table>
        </div>
    </div>

<?php
    include 'footer.php';
?>