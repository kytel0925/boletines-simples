<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
	    $this->createFirstUser();

        Model::reguard();
    }

	private function createFirstUser(){
		$master_email = 'kytel0925@gmail.com';
		$exist = DB::table('user')->where('email', '=', $master_email)->count() > 0;
		if(!$exist){
			return $this->createUser([
				'name' => 'Telmo Rafael Riofrio Tigse',
				'email' => 'kytel0925@gmail.com',
				'password' => 'admin',
				'created_at' => date('Y-m-d H:i:s')
			]);
		}

		return true;
	}

	private function createUser(array $data){
		$data['password'] = \Illuminate\Support\Facades\Hash::make($data['password']);
		return DB::table('user')->insert($data);
	}
}
