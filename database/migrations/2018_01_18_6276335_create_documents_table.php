<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration {

	public function up() {
		Schema::create('documents', function (Blueprint $table) {
			
			$table->increments("id");
			$table->integer("type_id")->unsigned();
			$table->integer("acl_id")->unsigned();
			$table->string("name", 255);
			$table->string("extension", 40);
			$table->string("mimetype", 255);
			$table->integer("size")->unsigned();
			$table->string("hash", 255);
			$table->timestamps();
			$table->softDeletes();
			
			$table->foreign('type_id', 'fk_documents_documenttypes')
				->references('id')
					->on('document_types')
						->onDelete('cascade');
			
			$table->foreign('acl_id', 'fk_documents_acls')
				->references('id')
					->on('acls')
						->onDelete('cascade');
			
		});
	}

	public function down() {
		Schema::drop('documents');
	}

}
