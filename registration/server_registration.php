<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$company    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect($db_config['DB_HOST'], $db_config['DB_USERNAME'], $db_config['DB_PASSWORD'], $db_config['DB_DATABASE']);

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $company = mysqli_real_escape_string($db, $_POST['company']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Gebruikersnaam is verplicht"); }
  if (empty($email)) { array_push($errors, "E-mailadres is verplicht"); }
  if (empty($company)) { array_push($errors, "Bedrijfsnaam is verplicht"); }
  if (empty($password_1)) { array_push($errors, "Wachtwoord is verplicht"); }
  if ($password_1 != $password_2) {
	array_push($errors, "De wachtwoorden komen niet overeen");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Gebruikersnaam bestaat al");
    }

    if ($user['email'] === $email) {
      array_push($errors, "E-mailadres bestaat al");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
    $query = "INSERT INTO users (username, email, company, password) VALUES('$username', '$email', '$company', '$password')";
    mysqli_query($db, $query);
    
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          while($row = $results->fetch_assoc()) {
              $user_id = $row['id'];
              $company = $row['company'];
          }
          
          $_SESSION['user_id'] = $user_id;
          $_SESSION['company'] = $company;
          $_SESSION['username'] = $username;
    }
    header('location: index.php');
  }
}

// ...

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Gebruikersnaam is verplicht");
    }
    if (empty($password)) {
        array_push($errors, "Wachtwoord is verplicht");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          while($row = $results->fetch_assoc()) {
              $user_id = $row['id'];
              $company = $row['company'];
          }
          
          $_SESSION['user_id'] = $user_id;
          $_SESSION['company'] = $company;
          $_SESSION['username'] = $username;
          header('location: index.php');
        }else {
            array_push($errors, "Verkeerde gebruikersnaam/wachtwoord combinatie");
        }
    }
  }
  
  ?>