<?php

function emptyinputlogin($id,$password) {
    $result;
    if (empty($id) || empty($password)){
        $result = true;
    }
    else {
        $result=false;
    }
    return $result;
}

function invalidid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result=true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdmatch($password,$passwordrepeat) {
    $result;
    if($password !== $passwordrepeat) {
        $result = true;
    } else {
        $result=false;
    }
    return $result;
}

function idexists($conn,$username) {
   $sql = "SELECT * FROM account_details WHERE id =?;";
   $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt, $sql)) {
       echo "error";
       exit();
   }
}

   mysqli_stmt_bind_param($stmt, "ss", $id);
   mysqli_stmt_execute($stmt);

   $resultdata = mysqli_stmt_get_result($stmt);

   if ($row = mysqli_fetch_assoc($resultdata)) {
       return $row;
   } 
   else {
       $result = false;
       return $result;
   }

   mysqli_stmt_close($stmt);


function loginUser($conn,$id,$password) {
    $idexists = idexists($conn,$username) ;
}

if ($idexists === false) {
    header("Location : login_page.html?error=wrongLogin")
}   

?>