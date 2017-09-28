<?php

use MessageBird\Client;
use MessageBird\Objects\Message;

//Make sure that it is a POST request.
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
    throw new Exception('Request method must be POST!');
}

//Make sure that the content type of the POST request has been set to application/json
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if(strcasecmp($contentType, 'application/json') != 0){
    throw new Exception('Content type must be: application/json');
}

//Receive the RAW post data.
$content = trim(file_get_contents("php://input"));

//Attempt to decode the incoming RAW post data from JSON.
$decoded = json_decode($content, true);

//If json_decode failed, the JSON is invalid.
if(!is_array($decoded)){
    throw new Exception('Received content contained invalid JSON!');
}

function send_sms()
{
    $MessageBird = new \MessageBird\Client('7pgSx0IlPkp4nVpkgAVGv8KLo');

    $Message = new \MessageBird\Objects\Message();
    $Message->originator = 'MessageBird';
    $Message->recipients = array(31612345678);
    $Message->body = 'This is a test message.';
    $response = $MessageBird->messages->create($Message);

    return $response;

}

$possible_url = array("send_sms", "send_voice_message");
$value = "Something went terribly wrong";

if (isset($decoded["action"]) && in_array($decoded["action"], $possible_url))
{
    switch ($decoded["action"])
    {
        case "send_sms":
            $value = send_sms();
            break;
    }
}

//return JSON array
exit(json_encode($value));