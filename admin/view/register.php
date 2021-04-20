<?php include 'view/header.php'; ?>
<section class="admin-login">
    <h2>Register a new admin user</h2>
    <?php if (!empty($errors)) { ?>
        <ul>
        <?php for ($i = 0; $i < count($errors); $i++) {
            echo "<li style='color:red;font-weight:bold;margin:10px;'>{$errors[$i]}</li>";
        } ?>
        </ul>
    <?php } ?>
    <form action="." method="post" class="admin_login_form">
            <input type="hidden" name="action" value="register">
        
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" autofocus required>
        
        
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required title="Must contain at least one number, one uppercase letter, one lowercase letter, and total 8 or more characters">
        
        
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" required title="Must contain at least one number, one uppercase letter, one lowercase letter, and total 8 or more characters">
        
        
            <input type="submit" class="button blue" value="Register">
        
    </form>
</section>
<?php include 'view/footer.php'; ?>