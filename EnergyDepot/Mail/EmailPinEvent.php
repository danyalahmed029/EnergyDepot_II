<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 6/25/18
 * Time: 1:22 PM
 */

namespace EnergyDepot\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class EmailPinEvent
 * @package EnergyDepot\Mail
 */
class EmailPinEvent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var array
     */
    protected $pin;

    /**
     * @return array
     */
    public function getPin(): array
    {
        return $this->pin;
    }

    /**
     * @param array $pin
     */
    public function setPin(array $pin): void
    {
        $this->pin = $pin;
    }


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $pin)
    {
        $this->pin=$pin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.pin_generate')->with('pin',$this->pin);
    }
}