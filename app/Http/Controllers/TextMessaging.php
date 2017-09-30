<?php
namespace App\Http\Controllers;

class TextMessaging extends Controller
{

    public function index()
    {
        return view('messagebird/index');
    }

    public function sms()
    {
        try {
            //api url
            $url = "http://www.raph-web.eu:2020";

            $data_string = json_encode($_POST);

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data_string))
            );

            $result = curl_exec($ch);

            $decoded_values = json_decode($result, true);
            if (!$result) {
                throw new \Exception('No response from the API');
            }
            if (!empty($decoded_values['error'])) {
                throw new \Exception($decoded_values['error']);
            }

            $output = array(
                'success' => true,
                'result' => $result,
            );
        } catch(\Exception $e) {
            $output = array(
                'success' => false,
                'result' => 'Unknown',
                'error' => $e->getMessage()
            );
        }
        $this->arrayToJSONAndExit($output, true);
    }

    /**
     * Output an array as JSON, with the appropriate headers and utilizing the page load timer.
     *
     * @param array $output a multi-nested array with data
     * @return void
     */
    public function arrayToJSONAndExit(array $output, $json_force_object = false)
    {
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');

        if (!empty($output['error']) || !empty($output['error'])) {
            http_response_code(500);
        }

        if ($json_force_object === true) {
            echo json_encode($output, JSON_FORCE_OBJECT);
        } else {
            echo json_encode($output);
        }
        exit;
    }
}