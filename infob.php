<?php



/**
 * Send an SMS message by using Infobip API PHP Client.
 *
 * For your convenience, environment variables are already pre-populated with your account data
 * like authentication, base URL and phone number.
 *
 * Please find detailed information in the readme file.
 */

require './vendor/autoload.php';

use Infobip\Api\SmsApi;
use Infobip\Configuration;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;

$BASE_URL = $_POST['urly'];
$API_KEY = $_POST['api'];
$SENDERID = $_POST['from'];
$RECEIVERs = $_POST['to'];
$CONTENT = $_POST['info__'];
$i = count($RECEIVERs);
$error_sms = 0;
$successfull_sms = 0;
foreach ($RECEIVERs as $RECEIVER) {



    $SENDER = $SENDERID;
    $RECIPIENT = $RECEIVER;
    $MESSAGE_TEXT = $CONTENT;

    $configuration = new Configuration(host: $BASE_URL, apiKey: $API_KEY);

    $sendSmsApi = new SmsApi(config: $configuration);

    $destination = new SmsDestination(
        to: $RECIPIENT
    );

    $message = new SmsTextualMessage(destinations: [$destination], from: $SENDER, text: $MESSAGE_TEXT);

    $request = new SmsAdvancedTextualRequest(messages: [$message]);

    
    try {

        $smsResponse = $sendSmsApi->sendSmsMessage($request);

        echo $smsResponse->getBulkId() . PHP_EOL;

        foreach ($smsResponse->getMessages() ?? [] as $message) {

            if ($message->getStatus()?->getName() == 'PENDING_ACCEPTED') {
                $successfull_sms++;

            } elseif ($message->getStatus()?->getName() == 'DELIVERED_TO_HANDSET') {
                $successfull_sms++;
               
            } else {
                $error_sms++;
            }
        }
    } catch (Throwable $apiException) {
        echo ("HTTP Code: " . $apiException->getCode() . "\n");
    }        

}
echo ' <span class="d-flex text-success m-2">' . $successfull_sms . ' of ' . $i . ' Successfully send</span>
<span class="d-flex text-danger m-2">' . $error_sms . ' of ' . $i . ' fail to send</span>';
