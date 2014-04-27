<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('CharacterTableSeeder');
		$this->call('QuestTableSeeder');
		$this->call('CharacterQuestTableSeeder');
	}
}

class CharacterTableSeeder extends Seeder {
    public function run() {
	    DB::table('characters')->delete();
	    Character::Create(array('name' => 'Testing', 'race' => 'Elf'));
		Character::Create(array('name' => 'Testing2', 'race' => 'Dwarf'));
		Character::Create(array('name' => 'Testing3', 'race' => 'Halfling'));
		Character::Create(array('name' => 'Testing4', 'race' => 'Human'));
    }
}

class QuestTableSeeder extends Seeder {
    public function run() {
	    DB::table('quests')->delete();
	    Quest::Create(array('date' => date('2014-04-28 00:00:00')));
		Quest::Create(array('date' => date('2014-04-29 00:00:00')));
		Quest::Create(array('date' => date('2014-04-30 00:00:00')));
    }
}

class CharacterQuestTableSeeder extends Seeder {
    public function run() {
	    DB::table('character_quests')->delete();
	    DB::table('character_quests')->insert(array(
             array('character_id' => 1, 'quest_id' => 1, 'experience' => 200),
             array('character_id' => 2, 'quest_id' => 1, 'experience' => 200),
	         array('character_id' => 3, 'quest_id' => 1, 'experience' => 200),
	         array('character_id' => 1, 'quest_id' => 2, 'experience' => 200),
	         array('character_id' => 2, 'quest_id' => 2, 'experience' => 200),
	         array('character_id' => 3, 'quest_id' => 2, 'experience' => 200),
	         array('character_id' => 4, 'quest_id' => 1, 'experience' => 200),
            )
        );
    }
}