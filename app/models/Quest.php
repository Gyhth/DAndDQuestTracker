<?php

class Quest extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'quests';
	
    public function characters() {
	     return $this->belongsToMany('Character', 'character_quests', 'quest_id', 'character_id')->withPivot('experience');
	}
}
