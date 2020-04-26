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
['name'=>'TraNguyen98','email'=>'lionelnguyen98@gmail.com','password'=>bcrypt('Tra1998@'),'level'=>'0'],
]);
    }
	
}