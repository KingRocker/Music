<?php

function cleanlFormPassword($inputText){
    $inputText = strip_tags($inputText);
    return $inputText;
}

function cleanlFormUsername($inputText){
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    return $inputText;
}

function cleanlFormString($inputText){
    $inputText= strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    $inputText = ucfirst(strtolower($inputText));
    return $inputText;
}



if(isset($_POST['registerButton'])){
    //register button was pressed
    $username = cleanlFormUsername($_POST['username']);
    $firstName = cleanlFormString($_POST['firstName']);
    $lastName = cleanlFormString($_POST['lastName']);
    $email = cleanlFormString($_POST['email']);
    $cEmail = cleanlFormString($_POST['cEmail']);
    $password = cleanlFormPassword($_POST['password']);
    $cPassword = cleanlFormPassword($_POST['cPassword']);

    $wasSuccessful = $account->register($username, $firstName, $lastName, $email, $cEmail, $password, $cPassword);

    if($wasSuccessful){
        $_SESSION['userLoggedIn'] = $username;
        header("Location: index.php");
    }
    
}

?>