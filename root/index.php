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
<div class="container d-flex justify-content-center align-items-center mt-5" style="min-height: 100vh;">
    <div class="card p-4" style="width: 100%; max-width: 400px;">
        <div><h2 class="text-left mb-4 text-dark">Login</h2></div>
        <hr>

        <?php if (!empty($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
        
        <form method="POST" action="index.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="Email or Phone">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Log In</button>
        </form>
    </div>
</div>


<?php
include 'footer.php'; 
?>
