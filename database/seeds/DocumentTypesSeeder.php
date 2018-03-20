<?php
use Illuminate\Database\Seeder;

class DocumentTypesSeeder extends Seeder {
    
    public function run() {
        
		$datatime = date('Y-m-d H:i:s');
		
        \DB::table('document_types')->insert([
			'id' => '1', 
			'name' => 'Padrão', 
			'created_at' => $datatime, 
			'updated_at' => $datatime
        ]);
    }
}
