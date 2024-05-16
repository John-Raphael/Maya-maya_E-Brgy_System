<?php

date_default_timezone_set('Asia/Manila');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

require __DIR__ . '/vendor/autoload.php';

function getTimeAndDate($format = "Y-m-d H:i:s")
{
    return date($format);
}
function getDateToday()
{
    return date("Y-m-d");
}

function script($name, bool $isDeferred = false)
{
    $javascript = $GLOBALS["project_host"] . "/public/javascript/$name.js";
    if ($isDeferred === true) {
        return "<script src=\"$javascript\" defer></script>";
    } else {
        return "<script src=\"$javascript\"></script>";
    }
}
function formatdate($date, $format = "M d,Y h:i A")
{
    $date = strtotime($date);
    return date($format, $date);
}

function error_field($field, $message)
{
    $msg = array(
        "success" => false,
        "field" => $field,
        "message" => $message
    );
    echo arraytojson($msg);
    die();
}
function response($success, $message, $extra = [])
{
    $msg = array(
        "success" => $success,
        "message" => $message,
        "extra" => arraytojson($extra)
    );
    echo arraytojson($msg);
    die();
}
function navigate($path)
{
    echo "<script>window.location.href='$path'</script>";
    exit();
}

function arraytojson($array)
{
    if (is_array($array)) {
        return json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    } else {
        return false;
    }
}

function send_email($content)
{
    $receiver = $content["email"];
    $subject = $content["subject"];
    $message = $content["message"];

    $host = $GLOBALS["settings"]["mailer"]["host"];
    $username = $GLOBALS["settings"]["mailer"]["username"];
    $password = $GLOBALS["settings"]["mailer"]["password"];
    $port = $GLOBALS["settings"]["mailer"]["port"];
    $name = $GLOBALS["settings"]["mailer"]["name"];

    $mail = new PHPMailer();
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = $host;
        $mail->SMTPAuth = true;
        $mail->Username = $username;
        $mail->Password = $password;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = $port; // non ssl 587;
        $mail->setFrom($username, $name);

        $mail->addAddress($receiver);

        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->send();

        $response = [
            "success" => true,
            "message" => "Email was successfully sent!"
        ];

    } catch (Exception $e) {
        $response = [
            'success' => false,
            "message" => "Failed to sent email, Error Info {$mail->ErrorInfo}"
        ];
    }

    return $response;
}
function send_sms($content){
    $ch = curl_init();

    $number = $content['number'];
    $message = $content['message'];

    $apikey = $GLOBALS["settings"]["semaphore"]["api_key"];
    $sender_name = $GLOBALS["settings"]["semaphore"]["sender_name"];

    $parameters = [
        'apikey' => $apikey, //Your API KEY
        'number' => $number,
        'message' => $message,
        'sendername' => $sender_name
    ];
    curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/priority');
    curl_setopt($ch, CURLOPT_POST, 1);

    //Send the parameters set above with the request
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));

    // Receive response from server
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
}
function generateUniqueCode($length, $uppercase = false)
{
    $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $code = '';
    $max = strlen($characters) - 1;

    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[mt_rand(0, $max)];
    }

    return ($uppercase) ? strtoupper($code) : $code;
}
/**
 * Generates a CSRF.
 * returns a input field with the CSRF token.
 * @param string $key The unique key identifier for the CSRF required.
 */
function csrf(string $key = "")
{
    if($key == ""){
        echo "<p class='text-warning'>Please type a csrf key</p>";
        return false;
    }
    $csrf = bin2hex(random_bytes(32));
    $_SESSION["csrf_token_$key"] = $csrf;

    echo "<!-- WARNING : DO NOT MODIFY THE CSRF -->";
    echo "<input type='hidden' name='csrf_token' value='$csrf' />";
}

function table($table_name){
    $nosql = $GLOBALS["nosql"];
    return $nosql->table($table_name);
}
function session($key)
{
    $session = $GLOBALS["session"];
    return $session->key($key);
}

function CheckTokenValidity($token)
{    global $db;

    $sql = "SELECT * FROM tbl_verification_codes WHERE token = '$token' AND expired_at > NOW() AND is_used = 'no'";
    $result = $db->query($sql);

    if ($result && $result->num_rows > 0) {
        return "token_valid";
    } else {
        $sql = "SELECT * FROM tbl_verification_codes WHERE token = '$token' AND expired_at <= NOW()";
        $result = $db->query($sql);
        if ($result && $result->num_rows > 0) {
            return "token_expired";
        }

        $sql = "SELECT * FROM tbl_verification_codes WHERE token = '$token' AND is_used = 'yes'";
        $result = $db->query($sql);
        if ($result && $result->num_rows > 0) {
            return "token_used";
        }

        return "token_invalid";
    }
}
function pusher_trigger($channel,$event,$data){

    $pusher = new Pusher\Pusher(
        '130b5654b238339533be',
        '09ae3a3935ec37e789da',
        '1773804',
        [
            'cluster' => 'eu',
            'useTLS' => true
        ]
    );

    $pusher->trigger($channel, $event, $data);
}
function pusher_scripts(){
    $javascript = $GLOBALS["project_host"] . "/public/javascript/pusher.js";

    echo "<script src=\"https://js.pusher.com/8.2.0/pusher.min.js\"></script>";
    //echo"<script src=\"$javascript\" defer></script>";
}

function cancellable($created_time)
{
    // Convert the created time to a Unix timestamp
    $created_timestamp = strtotime($created_time);

    // Calculate the current time
    $current_time = time();

    // Calculate the difference in seconds
    $time_difference = $current_time - $created_timestamp;

    // Calculate the difference in days
    $days_difference = floor($time_difference / (60 * 60 * 24));

    // Disable button if the difference is greater than or equal to 3 days
    return ($days_difference >= 3);
}
