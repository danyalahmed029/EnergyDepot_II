<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 6/11/18
 * Time: 2:19 PM
 */

namespace EnergyDepot\Service;

use EnergyDepot\Lib\IncorrectPinException;
use EnergyDepot\Lib\PinExpireException;
use EnergyDepot\Mail\EmailPinEvent;
use EnergyDepot\Repository\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Webpatser\Uuid\Uuid;

class UserService
{
    protected $repository;

    /**
     * UserService constructor.
     * @param UserRepository $newRepository
     */
    public function __construct(UserRepository $newRepository)
    {
        $this->repository=$newRepository;
    }


    /**
     * @param array $data
     * @return array
     * @throws \Exception
     */
    public function verifyUser(array $data)
    {
            $userEmail = $data['email'];
            $existingUser = $this->repository->getUser($userEmail);

            $pin = [];
            for ($i = 0; $i < 6; $i++) {
                $pin[] = mt_rand(0, 9);
            }
            Mail::to($userEmail)->send(new EmailPinEvent($pin));
            $data['expiry'] = Carbon::now()->addMinutes(env('EXPIRATION_TIME'))->toDateTimeString();
            $data['password'] = app('hash')->make(implode('', $pin));
            if (isset($existingUser) && $existingUser != null) {

                return $this->repository->update($data, $existingUser['uuid'])->toArray();
            } else {
                $data['uuid'] = Uuid::generate()->string;
                return $this->repository->create($data)->toArray();
            }
    }


    /**
     * @param array $data
     * @return array
     * @throws IncorrectPinException
     * @throws PinExpireException
     */
    public function verifyPin(array $data)
    {
        try {
            $user = $this->repository->getUser($data['email']);
            $checkPassword = $this->repository->verifyPin($data['password'], $user->password);
            if ($checkPassword) {
                if ($user->is_used == 1 || Carbon::parse($user->expiration_date)->lt(Carbon::now())) {
                    throw new PinExpireException("Sorry your Pin is expired");
                }
                    $apiKey = app('hash')->make(str_random(25));
                    $data = $this->repository->updateToken($apiKey, $user['uuid']);
                    return ['user' => $data->toArray(), 'api_token' => $apiKey];
            }
                throw new IncorrectPinException("Incorrect Pin, please check your email for 6 digit pin");
        }
        catch (PinExpireException | IncorrectPinException $ex)
        {
            throw $ex;
        }
    }

    public function checkRole(string $email):?array
    {
        return $this->repository->getUser($email)->toArray();
    }
}