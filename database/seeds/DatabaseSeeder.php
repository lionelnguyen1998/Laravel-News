<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        
    }
    
}
class UserSeeder extends Seeder{
	public function run(){
		DB::table('users')->insert([

['name'=>'MinhHang','email'=>'minhhang@gmail.com','password'=>'187704167','level'=>'0'],
]);
    }
	
}