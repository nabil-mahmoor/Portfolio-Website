<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mailFrom = $_POST['email'];
    $message = $_POST['message'];

    if (empty($name) || empty($mailFrom) || empty($message)) {
        header("Location: index.html?form=empty&name=" . $name . "&email=" . $mailFrom . "#contact");
        exit();
    } else if (!filter_var($mailFrom, FILTER_VALIDATE_EMAIL)) {
        exit();
        header("Location: index.html?form=invalid_email&name=" . $name . "#contact");
    } else if (!preg_match("/^[a-zA-Z]*$/", $name)) {
        header("Location: index.html?form=invalid_name&email=" . $email . "#contact");
        exit();
    } else {
        $mailTo = "nabil.mahmoor@gmail.com";
        $subject = "You have received an email from " . $name;
        $headers = "From: " . $mailFrom;
    
        mail($mailTo, $subject, $message, $headers);
    }

} else {
    header("Location: index.html?form=error#contact");
}