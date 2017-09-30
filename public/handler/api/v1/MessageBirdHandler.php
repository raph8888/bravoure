<?php

require_once(__DIR__ . '/../../../../vendor/autoload.php');

use MessageBird\Client;
use MessageBird\Objects\Message;
use v1\MessageBirdApiController\MessageBirdApiController;

try {

    //Make sure that it is a POST request.
    if (strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0) {
        throw new \Exception('Request method must be POST!');
    }

    //Make sure the content type of the POST request has been set to application/json
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    if (strcasecmp($contentType, 'application/json') != 0) {
        throw new \Exception('Content type must be: application/json');
    }

    //Handle json post request, get raw post data.
    $content = trim(file_get_contents("php://input"));

    //Attempt to decode the incoming raw post data from json.
    $decoded = json_decode($content, true);

    //If json_decode failed, the json is invalid.
    if (!is_array($decoded)) {
        throw new \Exception('Received content contained invalid JSON!');
    }

//    $send_message = new MessageBirdApiController;
//    $response = $send_message->send($decoded);

    $response = send_sms($decoded);

} catch (\Exception $e) {
    // if an exception happened in the try block above
    $output = array(
        'success' => false,
        'result' => 'Unknown',
        'error' => $e->getMessage()
    );
    exit(json_encode($output));
}

function send_sms($values)
{
    // Validation
    $phone_number = validatePhone($values["recipient"]);
    $message_body = validateMessage($values["message"]);
    $originator = validateOriginator($values["originator"]);

    $response = '';

    // Concatenate SMS when $message_body is longer than 160 chars
    if (strlen($message_body) > 160) {
        $total_message_parts = ceil(strlen($message_body) / 153);
        $character_index_start = 0;
        for ($i = 1; $i <= $total_message_parts; $i++) {
            $message_part = substr($message_body, $character_index_start, 153);
            $character_index_start += 153;
            $message_url_encoded = urlencode($message_part);
            $response = callMessageBird($originator, $phone_number, $message_url_encoded);
        }
    } else {
        $message = urlencode($message_body);
        $response = callMessageBird($originator, $phone_number, $message);
    }
    return $response;
}

function validatePhone($phone_number)
{
    if (strlen($phone_number) < 10) {
        throw new \Exception('The number is incorrect, it must have at least 10 characters');
    }
    if (substr($phone_number, 0, 4) == '0031') {
        return '31' . substr($phone_number, 4);
    } elseif (substr($phone_number, 0, 3) == '316') {
        return $phone_number;
    } elseif (substr($phone_number, 0, 2) == '06') {
        return substr_replace($phone_number, '31', 0, 1);
    } elseif (substr($phone_number, 0, 4) == '+316') {
        return $phone_number;
    }
    throw new \Exception('Unexpected format of phone number, expected it starts with 0031, 31 or 316');
}

function validateMessage($message)
{
    if (empty($message)) {
        throw new \Exception('Empty messages are invalid');
    }
    return $message;
}

function validateOriginator($originator)
{
    if (empty($originator)) {
        throw new \Exception('Empty originator is invalid');
    }
    return $originator;
}

function callMessageBird($originator, $phone_number, $message)
{
    $client = new Client('7pgSx0IlPkp4nVpkgAVGv8KLo');

    $Message = new Message();
    $Message->originator = $originator;
    $Message->recipients = $phone_number;
    $Message->body = $message;
    $response = $client->messages->create($Message);

    return $response;
}

exit(json_encode($response));