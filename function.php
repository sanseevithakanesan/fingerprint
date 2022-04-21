<?php
function samePassword($password,$reenterPass){
    if($password == $reenterPass){
        return true;
    }
}
function alert($message,$class) {
    return '<div class="alert alert-'.$class.'" role="alert"> '. $message . '</div>';
}
function unWantedChar($code) {
    $pattern = "/^[a-zA-Z0-9-]*$/";
    if(!preg_match($pattern, $code)){
        return true;
    }
    
}
function alreadyExit($connection,$tablename,$column_1,$value_1,$column_2, $value_2){
    $sql = "
        SELECT *
        FROM $tablename
        WHERE
            $column_1 = '$value_1' OR
            $column_2 ='$value_2';
    ";
    $result = mysqli_query($connection,$sql);
    $count = mysqli_num_rows($result);
        if($count>0){
           return true;
        }
 
}


