<?php
use Illuminate\Database\Seeder;

class DocumentTypesSeeder extends Seeder {
    
    public function run() {
                
        $datetime = date('Y-m-d H:i:s');                
        \DB::table('document_types')->insert([
            
            [

            'id' => '1', 

            'name' => 'Documentação Técnica', 

            'created_at' => '2018-01-18 11:43:08', 

            'updated_at' => '2018-01-18 11:43:08', 

            'deleted_at' => '', 
            'created_at' => $datetime,
            'updated_at' => $datetime, 
            ],
            [

            'id' => '2', 

            'name' => 'Tech Paper', 

            'created_at' => '2018-01-18 11:43:08', 

            'updated_at' => '2018-01-18 11:43:08', 

            'deleted_at' => '', 
            'created_at' => $datetime,
            'updated_at' => $datetime, 
            ],
            [

            'id' => '3', 

            'name' => 'MKT', 

            'created_at' => '2018-01-18 11:43:08', 

            'updated_at' => '2018-01-18 11:43:08', 

            'deleted_at' => '', 
            'created_at' => $datetime,
            'updated_at' => $datetime, 
            ],
        ]);
    }
}
