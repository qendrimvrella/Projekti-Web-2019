<?php
    include 'header.php';
?> 
</div>
</div>

    <div id="contact">
        <div class="container">
            <div class="contact-text">
                <h1 class="marg-tb-15"><span class="purple-fonts">Contact</span> Us</h1>
                <p>Please fill out the form below to contact us.</p>
            </div>
            <form action="">
                <div class="form-wrap">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="form-wrap">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="form-wrap">
                    <label for="message">Message</label>
                    <textarea name="message" id="message"></textarea>
                </div>
            </form>
            <button type="submit" class="btn-1">Submit</button>
        </div>
    </div>

<?php
    include 'footer.php';
?>