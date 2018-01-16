<?php
use Illuminate\Database\Seeder;

class UsersProfileSeeder extends Seeder {
    
    public function run() {
                
        $datetime = date('Y-m-d H:i:s');
                
        DB::table('users_profile')->insert([
            
        ]);
    }
}
