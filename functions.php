<?php

session_start(); // Start session 
$db = mysqli_connect('localhost', 'root', '', 'islamda');

function registerUser() {
    global $db;

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    $errors = [];

    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match"); }

    if (count($errors) == 0) {
        $password = password_hash($password_1, PASSWORD_DEFAULT);
        $query = "INSERT INTO Users (Username, Email, PasswordHash) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($db, $query);

        if ($stmt === false) {
            return ["An error occurred while preparing the statement."];
        }

        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);

        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        if ($result === false) {
            return ["An error occurred while executing the statement."];
        }

        $_SESSION['success']  = "New user successfully created!!";
        return true;
    } else {
        return $errors;
    }
}

function loginUser($username, $password) {
    global $db;

    $errors = [];

    $query = "SELECT * FROM Users WHERE Username=? LIMIT 1";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['PasswordHash'])) {
            $_SESSION['user'] = $user;
            $_SESSION['userID'] = $user['UserID']; // Set the user ID in the session
            $_SESSION['success'] = "You are now logged in";
        } else {
            array_push($errors, "Wrong password");
            $_SESSION['errors'] = $errors;
            header('Location: login.php');
            exit();
        }
    } else {
        array_push($errors, "Username not found");
        $_SESSION['errors'] = $errors;
        header('Location: login.php');
        exit();
    }
}

?>