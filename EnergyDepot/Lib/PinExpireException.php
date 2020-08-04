<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 7/12/18
 * Time: 1:30 AM
 */

namespace EnergyDepot\Lib;


class PinExpireException extends NeuEnergyDepotException
{
    public function __construct(string $message = "")
    {
        parent::__construct($message);
    }

    public function getHttpCode(): int
    {
        return 422;
    }

    public function getErrorCode(): int
    {
        return ExceptionConstants::PIN_EXPIRE;
    }
}