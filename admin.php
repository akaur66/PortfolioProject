<?php

require('check-login.php');

//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

//connecting to database
require('/home2/akaurgre/db.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

</head>
<body>
<div class="container">

    <h1>Guestbook Summary</h1>
    <p><a href="index.html">Guestbook Form</a></p>
    <p><a href="logout.php">Logout</a></p>

    <table id="myTable">
        <thead>
        <tr>
            <th>Time Submitted</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Job</th>
            <th>Company</th>
            <th>City</th>
            <th>Email</th>
            <th>LinkedIn</th>
            <th>Met</th>
            <th>Other</th>
            <th>Message</th>
            <th>MailingList</th>
            <th>EmailFormat</th>
        </tr>
        </thead>

        <?php
        $sql = "SELECT * FROM guestbook";

        //runs $sql line with my database
        $result = mysqli_query($cnxn, $sql);

        //var_dump($result);

        //get table info from database
        foreach($result as $row) {
            $time = $row['SubmittedAt'];
            $first = $row['FirstName'];
            $last = $row['LastName'];
            $job = $row['Job'];
            $company = $row['Company'];
            $city = $row['City'];
            $email = $row['Email'];
            $url = $row['LinkedIn'];
            $met = $row['Met'];
            $other = $row['Other'];
            $message = $row['Message'];
            $mList = $row['MailingList'];
            $eFormat = $row['EmailFormat'];

            //print it
            echo "<tr>
                    <td>$time</td>
                    <td>$first</td>
                    <td>$last</td>
                    <td>$job</td>
                    <td>$company</td>
                    <td>$city</td>
                    <td>$email</td>
                    <td>$url</td>
                    <td>$met</td>
                    <td>$other</td>
                    <td>$message</td>
                    <td>$mList</td>
                    <td>$eFormat</td>
                  </tr>";
        }
        ?>
    </table>

</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $('#myTable').DataTable();
</script>

</body>
