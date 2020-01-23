<!-- Include header -->
<?php
    $title = 'Inloggen';
    include('inc/header.php');  
    include('registration/server_registration.php');
?>
    <main class="app-container login-container">
        <img src="img/welcoming.png" class="bg-image" alt="Login">

        <form method="post" action="login.php">

            <!-- Logo -->
            <div class="logo">
                <img src="img/logo-blue.png" alt="">
            </div>

            <?php include('inc/errors.php'); ?>
            
            <div class="input-group">
                <input placeholder="Gebruikersnaam" type="text" name="username" >
            </div>
            
            <div class="input-group">
                <input placeholder="Wachtwoord" type="password" name="password">
            </div>
            
            <div class="input-group">
                <button type="submit" class="btn" name="login_user">Inloggen</button>
            </div>

            <p class="forgot-password">Wachtwoord vergeten? <a href="#"></a></p>
            
            <p class="form-help">Nog geen lid? <a href="registreer.php">Meld je nu aan!</a></p>
        </form>
    </main>

<!-- Include footer -->
<?php include('inc/footer.php'); ?>