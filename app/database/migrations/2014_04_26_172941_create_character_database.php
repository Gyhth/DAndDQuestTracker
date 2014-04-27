<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterDatabase extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('characters', function(Blueprint $table)
		{
		    $table->engine = "InnoDB";
			$table->increments('id')->unsigned();
			$table->string('name');
			$table->string('race');
			$table->boolean('active');
            $table->timestamps();			
            $table->index('id');
			$table->index('name');
		});
		
		Schema::create('quests', function(Blueprint $table)
		{
		    $table->engine = "InnoDB";
			$table->increments('id')->unsigned();
			$table->dateTime('date');
            $table->timestamps();			
            $table->index('date');	
		});
		
		Schema::create('character_quests', function(Blueprint $table) 
		{
		    $table->engine = "InnoDB";
			$table->integer('character_id')->unsigned();
			$table->integer('quest_id')->unsigned();
			$table->integer('experience')->unsigned();
            $table->timestamps();			
            $table->index(array('character_id', 'quest_id'));
			$table->unique(array('character_id', 'quest_id'));
            $table->foreign('character_id')->references('id')->on('characters');
            $table->foreign('quest_id')->references('id')->on('quests');			
		});
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::drop('character_quests');
		Schema::drop('characters');
		Schema::drop('quests');
	}

}
