<?php
    session_start();

    include('../inc/config.php');

    $period = 7;

    // Get params from Ajax
    if(isset($_POST['period'])) {
        $period = json_decode($_POST['period'], true);
    }

    // connect to the database
    $db = mysqli_connect($db_config['DB_HOST'], $db_config['DB_USERNAME'], $db_config['DB_PASSWORD'], $db_config['DB_DATABASE']);
    
    //Prepare insert statement
    $query = 
    "SELECT `weekday`, COUNT(`id`) AS 'amount' 
    FROM `vw_transactions_weekdays`";

    $query .= " WHERE `date` >= NOW() + INTERVAL -$period DAY AND `date` <  NOW() + INTERVAL  0 DAY ";

    $query .=
    "GROUP BY `weekday` 
    ORDER BY FIELD(`weekday`, 'ma', 'di', 'wo', 'do', 'vr', 'za', 'zo')";

    $results = mysqli_query($db, $query);

    $rows = array();
    $table = array();

    $table['cols'] = array(
        array(
            'label' => 'dag',
            'type' => 'string'
        ),
            array(
            'label' => 'aantal transacties',
            'type' => 'number'
        )
    );

    while($row = $results->fetch_assoc()) {
        $sub_array = array();
        
        $sub_array[] =  array(
            "v" => $row["weekday"]
        );
        
        $sub_array[] =  array(
            "v" => $row["amount"]
        );

        $rows[] =  array(
            "c" => $sub_array
        );

    }

    $table['rows'] = $rows;

    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($table);
?>

