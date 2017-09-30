<?php
namespace v1\MessageBirdApiController;

require_once(__DIR__ . '/../../../../vendor/autoload.php');

use MessageBird\Client;
use MessageBird\Objects\Message;

/**
 * Service to send Text messages using MessageBird's API
 */
class MessageBirdApiController
{
    private $client;
    private $originator;

    function __construct()
    {
        $this->client = new Client('7pgSx0IlPkp4nVpkgAVGv8KLo');
        $this->originator = 'MessageBird';
    }

    public function send($values)
    {
        // Validation
        $phone_number = $this->validatePhone($values["recipient"]);
        $message_body = $this->validateMessage($values["message"]);
        $originator = $this->validateOriginator($values["originator"]);

        $response = '';

        // Concatenate SMS when $message_body is longer than 160 chars
        if (strlen($message_body) > 160) {
            $total_message_parts = ceil(strlen($message_body) / 153);
            $character_index_start = 0;
            for ($i = 1; $i <= $total_message_parts; $i++) {
                $message_part = substr($message_body, $character_index_start, 153);
                $character_index_start += 153;
                $message_url_encoded = urlencode($message_part);
                $response = $this->callMessageBird($originator, $phone_number, $message_url_encoded);
            }
        } else {
            $message = urlencode($message_body);
            $response = $this->callMessageBird($originator, $phone_number, $message);
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

        $Message = new Message();
        $Message->originator = $originator;
        $Message->recipients = $phone_number;
        $Message->body = $message;
        $response = $this->client->messages->create($Message);

        return $response;
    }
}

