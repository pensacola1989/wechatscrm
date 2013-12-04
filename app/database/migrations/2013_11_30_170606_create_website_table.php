<?php

use Illuminate\Database\Migrations\Migration;

class CreateWebsiteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('website', function ($table)
		{
			$table->increments('id');
			$table->integer('userid');
			$table->text('homepage');
			$table->text('categorypage');
			$table->text('detailpage');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('website');
	}

}