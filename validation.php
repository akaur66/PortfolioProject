<?php

function validName($name){
    return !empty(trim($name));
}

function validEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validURL($url){
    return filter_var($url, FILTER_VALIDATE_URL);
}

function validMeet($meet){
    return $meet == "jobFair" || $meet == "meetup" || $meet == "haven't" || $meet == "other";
}
?>