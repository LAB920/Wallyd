<!-- Include header -->
<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: index.php");
    }

    $title = 'Dashboard';
    include('inc/header.php');  
?>

    <main class="app-container">
        
    </main>

    </body>

</html>