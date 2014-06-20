<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

	//Comment::truncate();

	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('text');
			$table->string('author');
			$table->integer('indent');
			$table->timestamps();
			$table->SoftDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
