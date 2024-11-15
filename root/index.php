<?php
include 'functions.php'; 
checkUserSessionIsActive();

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $email = $_POST['email']; 
    $password = $_POST['password']; 
    $users = getUsers(); 

   
    $errors = validateLoginCredentials($email, $password);
    if (empty($errors) && checkLoginCredentials($email, $password, $users)) { 
        $_SESSION['email'] = $email; 
        $_SESSION['current_page'] = 'dashboard.php'; 
        header('Location: dashboard.php'); 
        exit();
    } else {
        $error = "Invalid credentials"; 
    }
}

include 'header.php'; 
?>
<div class="container mt-4">
    <h2>Login</h2>
    <?php if (!empty($error)) { echo "<div class='alert alert-danger'>$error</div>"; }  ?>
    <form method="POST" action="index.php">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required> 
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required> 
        </div>
        <button type="submit" class="btn btn-primary">Login</button> 
    </form>
</div>
<?php
include 'footer.php'; 
?>
