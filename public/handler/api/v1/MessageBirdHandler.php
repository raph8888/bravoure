<?php

require_once(__DIR__ . '/../../../../vendor/autoload.php');

use MessageBird\Client;
use MessageBird\Objects\Message;

// The (theoretical/imaginary) throughput to MessageBird is one API request per second.
// Make sure the outgoing messages won’t exceed that limit when multiple incoming
// requests are received at the API.
sleep(1);

//Make sure that it is a POST request.
if (strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0) {
    throw new Exception('Request method must be POST!');
}

//Make sure that the content type of the POST request has been set to application/json
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if (strcasecmp($contentType, 'application/json') != 0) {
    throw new Exception('Content type must be: application/json');
}

//Receive the RAW post data.
$content = trim(file_get_contents("php://input"));

//Attempt to decode the incoming RAW post data from JSON.
$decoded = json_decode($content, true);

//If json_decode failed, the JSON is invalid.
if (!is_array($decoded)) {
    throw new Exception('Received content contained invalid JSON!');
}

$possible_actions = array("send_sms", "send_voice_message");
$value = "Something went wrong";

if (isset($decoded["action"]) && in_array($decoded["action"], $possible_actions)) {
    switch ($decoded["action"]) {
        case "send_sms":
            $value = send_sms($decoded);
            break;
    }
}

function send_sms($decoded)
{
    $client = new Client('7pgSx0IlPkp4nVpkgAVGv8KLo');
    $message_body = $decoded["message"];

    if (empty($message_body)) {
        throw new Exception('Empty messages are invalid');
    }

    if (strlen($decoded["originator"]) < 10) {
        throw new Exception(sprintf('The number: %s is incorrect, it must have at least 10 characters', $decoded["originator"]));
    }

    $phone_number = applyCountryCode($decoded["recipient"]);

    // When an incoming message content/body is longer than 160 chars,
    // split it into multiple parts (known as concatenated SMS)
    if (strlen($message_body) > 160) {

        // The (theoretical/imaginary) throughput to MessageBird is one API request per second.
        // Make sure the outgoing messages won’t exceed that limit,
        // also when concatenated messages need to be send.
        sleep(1);

        $total_message_parts = ceil(strlen($message_body) / 153);
        $character_index_start = 0;

        for ($i = 1; $i <= $total_message_parts; $i++) {
            $message_part = substr($message_body, $character_index_start, 153);
            $character_index_start += 153;
            $message_url_encoded = urlencode($message_part);

            $Message = new Message();
            $Message->originator = $decoded["originator"];
            $Message->recipients = $phone_number;
            $Message->body = $message_url_encoded;
            $response = $client->messages->create($Message);
        }
    } else {
        $Message = new Message();
        $Message->originator = $decoded["originator"];
        $Message->recipients = $phone_number;
        $Message->body = $message_body;
        $response = $client->messages->create($Message);
    }

    return $response;
}

function applyCountryCode($phone_number)
{
    if (substr($phone_number, 0, 4) == '0031') {
        return '31' . substr($phone_number, 4);
    } elseif (substr($phone_number, 0, 3) == '316') {
        return $phone_number;
    } elseif (substr($phone_number, 0, 2) == '06') {
        return substr_replace($phone_number, '31', 0, 1);
    } elseif (substr($phone_number, 0, 4) == '+316') {
        return $phone_number;
    }

    throw new Exception(sprintf('Unexpected format of phone number %s'
        . ', expected it starts with 0031, 31 or 316', $phone_number));
}

exit(json_encode($value));