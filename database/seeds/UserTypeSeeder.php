<?php


use EnergyDepot\Models\Auth\User;
use Carbon\Carbon;
use EnergyDepot\Models\RoleType;
use Illuminate\Database\Seeder;

use Webpatser\Uuid\Uuid;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_types')->truncate();
        RoleType::create([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'role_type'=>'ADMIN',
        ]);
        RoleType::create([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'role_type'=>'NEW_USER',
        ]);
        RoleType::create([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'role_type'=>'SUSPENDED',
        ]);

        RoleType::create([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'role_type'=>'DELETED',
        ]);

        RoleType::create([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'role_type'=>'PENDING_ORDER',
        ]);

        RoleType::create([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'role_type'=>'NEED_CONTRACT',
        ]);

        RoleType::create([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'role_type'=>'PENDING_APPROVAL',
        ]);

        RoleType::create([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'role_type'=>'ACTIVE_USER',
        ]);

        User::create([
            'uuid'=>(string) Uuid::generate(),
            'email'=>"admin@gmail.com",
            'password'=>app('hash')->make('123123') ,
            'expiration_date'=>Carbon::now()->addMinutes(env('EXPIRATION_TIME'))->toDateTimeString(),
            'is_used'=>1,
            'role_id'=>1,
            'api_token'=>base64_encode(str_random(25)),
        ]);
    }
}
