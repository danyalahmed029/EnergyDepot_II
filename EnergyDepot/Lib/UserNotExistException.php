<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 7/12/18
 * Time: 3:26 AM
 */

namespace EnergyDepot\Lib;


class UserNotExistException extends NeuEnergyDepotException
{
    public function __construct(string $message = "")
    {
        parent::__construct($message);
    }

    public function getHttpCode(): int
    {
        return 404;
    }

    public function getErrorCode(): int
    {
        return ExceptionConstants::USER_NOT_EXIST;
    }
}