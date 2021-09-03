<?php

function emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat) {
    $result=false;
    if (empty($name) || empty($email)  || empty($username)  || empty($pwd)  || empty($pwdRepeat)){
        $result = true;
    }
    return $result;
}


function invalidUid($username) {
    $result=false;
    if (!preg_match(("/^[a-zA-Z0-9]*$/"),$username)) {
        $result = true;
    }
    return $result;
}

function invalidEmail($email) {
    $result=false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    return $result;
}


function pwdMatch($pwd, $pwdRepeat) {
    $result=false;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }
    return $result;
}


function uidExists($conn, $username, $email) {
    $result = false;
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    } else{
        return $result;
    }

    mysqli_stmt_close($stmt);
}



function createUser($conn, $name, $email, $username, $pwd) {
    # secure insert
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=useristaken");
        exit();
    }

    # default password hashing algorithm used
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); 

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}
