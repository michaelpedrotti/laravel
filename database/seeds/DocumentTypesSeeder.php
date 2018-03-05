<?php
use Illuminate\Database\Seeder;

class DocumentTypesSeeder extends Seeder {
    
    public function run() {
                
        \DB::table('document_types')->insert([
			'id' => '1', 
			'name' => 'Padrão', 
			'created_at' => '', 
			'updated_at' => '', 
			'deleted_at' => '', 
        ]);
    }
}
