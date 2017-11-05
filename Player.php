<?php
require_once "controller/PlayerController.php";

// Set allow CORS for dev only. Remove this line in release product.
// Unless you know what you are doing.
header('Access-Control-Allow-Origin: *');

function checkGetParam($paramName) {
    if(!isset($_GET[$paramName]))
    {
        // return Bad Request with message.
        http_response_code(400);
        $message = array("message"=>"(GET method) param '" . $paramName . "' is required.");

        // print output and exit current script.
        exit(json_encode($message));
    }
}

function checkPostParam($paramName) {
    if(!isset($_POST[$paramName]))
    {
        // return Bad Request with message.
        http_response_code(400);
        $message = array("message"=>"(POST method) param '" . $paramName . "' is required.");

        // print output and exit current script.
        exit(json_encode($message));
    }
}

checkGetParam('action');
$action = $_GET['action'];

$playerCtrl = new PlayerController();

if($action == "create")
{
    checkPostParam("player_name");
    $player_name = $_POST['player_name'];

    $playerCtrl->create($player_name);
} 
else if ($action == "delete") 
{
    checkPostParam("player_id");
    $player_id = $_POST['player_id'];

    $playerCtrl->delete($player_id);
}
else if ($action == "get") 
{
    checkGetParam("player_id");
    $player_id = $_GET['player_id'];

    $playerCtrl->get($player_id);
}
else if ($action == "update") 
{
    checkPostParam("player_id");
    checkPostParam("player_name");
    checkPostParam("gold");
    checkPostParam("level");

    $player_id = $_POST['player_id'];
    $player_name = $_POST['player_name'];
    $gold = $_POST['gold'];
    $level = $_POST['level'];
    
    $playerCtrl->update($player_id, $player_name, $gold, $level);
}
else 
{
    // return Bad Request with message.
    http_response_code(400);
    $message = array("message"=> sprintf("param 'action' not support value '%s'.", $action));

    // print output and exit current script.
    exit(json_encode($message));
}

?>