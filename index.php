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
        <div class="date-picker">
            Over afgelopen
            <select>
                <option value="7">7 dagen</option>
                <option value="14">14 dagen</option>
                <option value="30">30 dagen</option>
                <option value="90">Kwartaal</option>
                <option value="183">Halfjaar</option>
                <option value="365">Jaar</option>
            </select>
        </div>

        <div id="pie-chart-div" style="width: 100%; height: auto"></div>
    </main>
    
<?php include('inc/footer.php') ?>