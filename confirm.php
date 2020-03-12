<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require('validation.php');

$flag = true;

//declare variables
$job = "";
$company = "";
$city = "";
$email = "";
$url = "";
$m = "";
$mList = "";
$eFormat = "";
$other = "";

//test first name
if(validName($_POST['firstName'])){
    $firstName = trim($_POST['firstName']);
}
else {
    echo "<p>First name required</p>";
    $flag = false;
}

//test last name
if(validName($_POST['lastName'])){
    $lastName = trim($_POST['lastName']);
}
else{
    echo "<p>Last name required</p>";
    $flag = false;
}

// if mailing list checkbox is checked, email required
if(isset($_POST['mailingList']) && $_POST['mailingList'] != ""){
    if(validEmail($_POST['email'])){
        $email = $_POST['email'];
    }
    else{
        echo "<p>Email required if mailing list checkbox is checked</p>";
        $flag = false;
    }

}

//test linked in url
if($_POST['linkedIn'] != ""){
    if(validURL($_POST['linkedIn'])){
        $url = $_POST['linkedIn'];
    }
    else{
        echo "<p>Linked In URL must be valid</p>";
        $flag = false;
    }
}

//test how we met field
if(validMeet($_POST['meet'])){
    $meet = $_POST['meet'];
}
else{
    echo "<p>Correct option must be selected for How we met</p>";
    $flag = false;
}

$job = $_POST['jobTitle'];
$company = $_POST['company'];
$city = $_POST['city'];
$other = $_POST['otherS'];
$m = $_POST['message'];
$eFormat = $_POST['eFormat'];
$message = '';

if($flag) {
    $message .= "<p>$firstName $lastName</p>";
    $message .= "<p>$job</p>";
    $message .= "<p>$company</p>";
    $message .= "<p>$city</p>";
    $message .= "<p>$email</p>";
    $message .= "<p>$url</p>";
    $message .= "<p>$meet</p>";
    $message .= "<p>$other</p>";
    $message .= "<p>$m</p>";
    $message .= "<p>$eFormat</p>";

    echo "<h1>Thank You For Signing The Guestbook</h1 >";
    echo "<h3>Summary:</h3>";
    echo "$message";


//adding the data from the form to the database

//connect to db
    require('/home2/akaurgre/db.php');

//getting data from the form
    $fName = mysqli_real_escape_string($cnxn, $_POST['firstName']);
    $lName = mysqli_real_escape_string($cnxn, $_POST['lastName']);
    $job = mysqli_real_escape_string($cnxn, $_POST['jobTitle']);
    $company = mysqli_real_escape_string($cnxn, $_POST['company']);
    $city = mysqli_real_escape_string($cnxn, $_POST['city']);
    $email = mysqli_real_escape_string($cnxn, $_POST['email']);
    $linkedIn = mysqli_real_escape_string($cnxn, $_POST['linkedIn']);
    $met = mysqli_real_escape_string($cnxn, $_POST['meet']);
    $other = mysqli_real_escape_string($cnxn, $_POST['otherS']);
    $m = mysqli_real_escape_string($cnxn, $_POST['message']);
    if($_POST['mailingList'] == "mailingList"){
        $mList = 'yes';
    }
    else{
        $mList = 'no';
    }
    $eFormat = mysqli_real_escape_string($cnxn, $_POST['eFormat']);

//sql statement to insert data into database
    $sql = "INSERT INTO guestbook(FirstName, LastName, Job, Company, City, 
            Email, LinkedIn, Met, Other, Message, MailingList, EmailFormat)
    VALUES('$fName', '$lName', '$job', '$company', '$city', '$email', '$linkedIn', '$met', '$other', '$m', '$mList', '$eFormat')";

//send form data to database to add into the table
$result = mysqli_query($cnxn, $sql);


}

?>

</body>
</html

