<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Artist;

class MessageBird extends Controller
{
    const EMAIL_OWNER = 'raph@raph-web.com';

    public $greetings = 'hello world';
    public $image_type = Array(1 => 'jpg', 2 => 'jpeg', 3 => 'png');

    public function index()
    {
        return view('messagebird/index',
            [
                'greetings' => $this->greetings
            ]
        );
    }


    public function sms()
    {


        try {
//            $result = ClientReportManager::generateOrdersReport(json_encode($_POST));

            $result = json_encode($_POST);

            // If we got here, all is good
            $output = array(
                'success' => true,
                'result' => $result
            );
        } catch(NotEnoughDataException $e) {
            $output = array(
                'success' => true,
                'represultort' => 'Onbekend'
            );
        } catch(Exception $e) {
            $output = array('error' => $e->getMessage() . "\n\n" . $e->getTraceAsString());
        }
        $this->arrayToJSONAndExit($output);
    }

    public function clean_input($data) {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }

    /**
     * Output an array as JSON, with the appropiate headers and utilzing the page load timer.
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