<?php
    include 'header.php';
?> 
<?php
    include './includes/conn.inc.php';
    
    if(!isset($_SESSION['userName'])){
        header("Location: index.php");
    }

    if (isset($_POST['service-submit'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = $pdo->prepare("INSERT INTO services (title, description_service) VALUES (:title, :description_service)");
        $query->execute([
            'title' => $title,
            'description_service' => $description
        ]);

        header("Location: ./index.php");
    }
?>
</div>
</div>

    <div id="contact">
        <div class="container">
            <div class="contact-text">
                <h1 class="marg-tb-15"><span class="purple-fonts">Add</span> Service</h1>
                <p>Please fill out the form below.</p>
            </div>
            <form action="" method="POST">
                <div class="form-wrap">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" autocomplete="off">
                </div>
                <div class="form-wrap">
                    <label for="description">Description</label>
                    <textarea name="description" id="description"></textarea>
                </div>
                <button type="submit" name="service-submit" class="btn-1">Add Service</button>
            </form>
        </div>
    </div>

<?php
    include 'footer.php';
?>
