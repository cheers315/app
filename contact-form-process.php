<?php
// Add debugging at the top
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Print the POST data for testing
echo "POST Data received:<br>";
print_r($_POST);
echo "<br><br>";

if (isset($_POST['Email'])) {
    $email_to = "nicaman9@gmail.com";
    $email_subject = "Cheers 315 New Message";

    function problem($error)
    {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // validation expected data exists
    if (!isset($_POST['Name']) || !isset($_POST['Email']) || !isset($_POST['Message'])) {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $message = $_POST['Message'];

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'The Message you entered does not appear to be valid.<br>';
    }   
    