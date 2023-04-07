<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;


class UserAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAccounts = [
            [
                'username' => 'buidung-superadmin',
                'name'=>'Bui The Dung',
                'email' => 'thedung.1292@gmail.com',
                'phone_number' => '+79689240329',
                'password'=> Hash::make('Buidung1292'),
                'user_avatar'=>'',
            ],
        ];

        DB::beginTransaction();
        try{
            foreach($serviceTypes as $serviceType)
            service_type_name::updateOrCreate([
                "service_name" => $serviceType
            ]);
            DB::commit();
        }catch(\Exception $e){
            Log::debug('service type seeder : '.$e);
            DB::rollBack();
        }
    }
}
