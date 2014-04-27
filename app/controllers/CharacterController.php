<?php

class CharacterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$characters = Character::with('quests')->get();
		$characters = Character::all();
		$quests     = Quest::all();
		return View::make('layouts.home')->with(array('characters' => $characters, 'quests' => $quests));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	    return View::make('character.edit')->with('edit', false);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
		     'name' => 'required',
		     'race' => 'required',
		);
		$input = Input::all();
		
		$validator = Validator::make($input, $rules);
		
	    if ($validator->fails()) {
		    return Redirect::back()
			     ->with('flash_message', 'Please fill in all fields.')
			     ->withInput(Input::all())
				 ->withErrors($validator);
		}
		else {
		    if (isset($input['active'])) {
         	     $active = true;
            }
            else {
			     $active = false;
		    } 			
		    $character = new Character;
            $character->name = $input['name'];
            $character->race = $input['race'];
			$character->active = $active;
            $character->save();
            return Redirect::intended('/')->with('flash_message', 'Character Created.');		
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$character = Character::find($id);
		return View::make('character.show')->with('character', $character);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$character = Character::find($id);
		return View::make('character.edit')->with('character', $character)->with('edit', true);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	    $rules = array(
		     'name' => 'required',
		     'race' => 'required',
		);
		$input = Input::all();
		
		$validator = Validator::make($input, $rules);
		
	    if ($validator->fails()) {
		    return Redirect::back()
			     ->with('flash_message', 'Please fill in all fields.')
			     ->withInput(Input::all())
				 ->withErrors($validator);
		}
		else {
		    if (isset($input['active'])) {
         	     $active = true;
            }
            else {
			     $active = false;
		    } 			
		    $character = Character::with('quests')->find($id);
            $character->name = $input['name'];
            $character->race = $input['race'];
			$character->active = $active;
            $character->save();
            return Redirect::intended('/')->with('flash_message', 'Character Updated.');		
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $character = Character::find($id);
		$character->quests()->detach();
		$character->delete();
		return Redirect::intended('/')->with('flash_message', 'Character Deleted.');
	}

}