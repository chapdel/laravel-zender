<?php

namespace Zender\Exceptions;

use Exception;
use DomainException;

class CouldNotSendNotification extends Exception
{
    /**
     * Thrown when content length is greater than 800 characters.
     *
     * @return static
     */
    public static function contentLengthLimitExceeded()
    {
        return new static(
            'Notification was not sent. Content length may not be greater than 800 characters.'
        );
    }

    /**
     * Thrown when mesage status is not SUCCESS
     *
     * @param  DomainException  $exception
     *
     * @return static
     */
    public static function gatewayRespondedWithAnError(DomainException $exception)
    {
        return new static(
            "Notification Error: {$exception->getMessage()}"
        );
    }

    /**
     * Thrown when we're unable to communicate with gateway server
     *
     * @param  Exception  $exception
     *
     * @return static
     */
    public static function couldNotCommunicateWithGateway(Exception $exception)
    {
        return new static("Notification Gateway Error: {$exception->getReason()} [{$exception->getCode()}]");
    }
}
