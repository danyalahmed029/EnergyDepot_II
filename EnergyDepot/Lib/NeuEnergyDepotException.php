<?php
/**
 * User: mlawson
 * Date: 5/24/18
 * Time: 2:47 PM
 */

namespace EnergyDepot\Lib;


abstract class NeuEnergyDepotException extends \Exception {

	public function __construct(string $message = "") {
		parent::__construct($message);
	}

	public abstract function getHttpCode() : int;

	public abstract function getErrorCode() : int;

}