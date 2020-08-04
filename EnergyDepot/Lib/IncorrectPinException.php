<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 7/12/18
 * Time: 1:34 AM
 */

namespace EnergyDepot\Lib;


class IncorrectPinException extends NeuEnergyDepotException
{
    public function __construct(string $message = "")
    {
        parent::__construct($message);
    }

    public function getHttpCode(): int
    {
        return 406;
    }

    public function getErrorCode(): int
    {
        return ExceptionConstants::INCORRECT_PIN;
    }
}