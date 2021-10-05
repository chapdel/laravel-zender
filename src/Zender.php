<?php

namespace Chapdel\Zender;

use ClickSendLib\APIException;
use ClickSendLib\ClickSendClient;
use Zender\Exceptions\CouldNotSendNotification;

class Zender
{
    /**
     * @param $from
     * @param $to
     * @param $message
     * @param null $delay
     *
     * @return array
     */
    public static function sendMessage($from, $to, $message, $delay = null)
    {
        switch (config("zender.default")) {
            case 'clicksend':

                // The payload may have more messages but we use just one at a time
                $payload = ['messages' => [
                    [
                        "from" => $from,
                        "to" => $to,
                        "body" => $message,
                        "schedule" => $delay,
                    ],
                ]];

                $result = [
                    'success' => false,
                    'message' => '',
                    'data' => $payload['messages'][0],
                ];

                try {
                    $client =
                        new ClickSendClient(config("zender.drivers.clicksend.username"), config("zender.drivers.clicksend.username"));
                    $response = $client->getSMS()->sendSms($payload);

                    // communication error
                    if ($response->response_code != 'SUCCESS') {
                        $result['message'] = $response->response_code;
                    }
                    // sending error
                    elseif ($response->data->messages[0]->status != 'SUCCESS') {
                        $result['message'] = $response->data->messages[0]->status;
                    } else {
                        $result['success'] = true;
                        $result['message'] = 'Message sent successfully.';
                    }
                }
                // clicksend API error
                catch (APIException $exception) {
                    $result['message'] = $exception->getReason();
                }
                // any php error
                catch (\Exception $exception) {
                    $result['message'] = $exception->getMessage();
                }

                return $result;

                break;

            default:
                throw CouldNotSendNotification::invalidGateway();

                break;
        }
    }
}
