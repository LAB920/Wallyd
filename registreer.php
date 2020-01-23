<!-- Include header -->
<?php
    $title = 'Registreren';
    include('inc/header.php');
    include('registration/server_registration.php');  
?>
    <main class="app-container login-container">
        <!-- Background image -->
        <div class="bg-image-container">
            <img src="img/undraw_walk_in_the_city_1ma6.png" class="bg-image" alt="Login">
        </div>    

        <!-- Logo -->
        <div class="logo">
            <img src="img/logo-blue.png" alt="">
        </div>
        
        <h1>Registreer account</h1>

        <form method="post" action="registreer.php">
            <?php include('inc/errors.php'); ?>
            
            <div class="input-group">
                <input placeholder="Gebruikersnaam" type="text" name="username" value="<?php echo $username; ?>">
            </div>
            
            <div class="input-group">
                <input placeholder="E-mailadres" type="email" name="email" value="<?php echo $email; ?>">
            </div>

            <div class="input-group">
                <input placeholder="Bedrijfsnaam"
                 type="text" name="company" value="<?php echo $company; ?>">
            </div>
            
            <div class="input-group">
                <input placeholder="Wachtwoord" type="password" name="password_1">
            </div>
            
            <div class="input-group">
                <input placeholder="Herhaal wachtwoord" type="password" name="password_2">
            </div>
            
            <div class="input-group">
                <button type="submit" class="btn" name="reg_user">Registreer</button>
            </div>
            
            <p>Al een account? <a href="login.php">Log in</a></p>
        </form>
    </main>

<!-- Include footer -->
<?php include('inc/footer.php'); ?>