<?php

class Character extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'characters';
	
	public function quests() {
	     return $this->belongsToMany('Quest', 'character_quests', 'character_id', 'quest_id')->withPivot('experience');
	}
}
