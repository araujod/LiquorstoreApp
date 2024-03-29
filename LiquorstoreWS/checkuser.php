<?php
require_once 'include/db_functions.php';
$db = new DB_Functions();

/**
 * Endpoint : http://<domain>/liquostoreWS/checkuser.php
 * Method   : POST
 * Params   : email
 * Result   : JSON
 */

$response = array();

if(isset($_POST['email']))
{
    $email = $_POST['email'];

    if($db->checkExistsUser($email))
    {
        $response["exists"] = TRUE;
        echo json_encode($response);
    }
    else{
        $response["exists"] = FALSE;
        echo json_encode($response);
    }
}
else{
    
        $response["error_msg"] = "Required parameter (email) is missing!";
        echo json_encode($response);
    
}
?>