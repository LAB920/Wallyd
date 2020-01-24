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
            <select id="chart-date-picker">
                <option value="7">7 dagen</option>
                <option value="14">14 dagen</option>
                <option value="30">30 dagen</option>
                <option value="90">kwartaal</option>
                <option value="183">halfjaar</option>
                <option value="365">jaar</option>
            </select>
        </div>

        <div id="pie-chart-div" class="chart square"></div>
    </main>
    
<?php include('inc/footer.php') ?>