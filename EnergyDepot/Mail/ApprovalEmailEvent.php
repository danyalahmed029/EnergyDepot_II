<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 7/20/18
 * Time: 12:18 PM
 */

namespace EnergyDepot\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApprovalEmailEvent extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {

    }
        /**
         * Build the message.
         *
         * @return $this
         */
        public function build()
    {
        return $this->view('email.approval');
    }


}