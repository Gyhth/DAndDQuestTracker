<?php

class QuestController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	    $characters = Character::all();
	    return View::make('quest.edit')->with(array('characters' => $characters, 'edit' => false));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
		     'date' => 'required|date_format:Y-m-d',
		);
		foreach(Input::get('experience') as $key => $value) {
		     $rules['experience.'.$key] = 'required|numeric';
		}
		$input = Input::all();
		
		$validator = Validator::make($input, $rules);
		
	    if ($validator->fails()) {
		dd($validator->messages());
		    return Redirect::back()
			     ->with('flash_message', 'Please fill in all fields.')
			     ->withInput(Input::all())
				 ->withErrors($validator);
		}
		else {
		foreach ($input['experience'] as $key => $value) {
		     $syncValues[$key] = array('experience' => $value);
		}
		    $quest = new Quest;
            $quest->date = $input['date'];
			$quest->save();
            $quest->characters()->sync($syncValues);
            return Redirect::intended('/')->with('flash_message', 'Quest Created.');		
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
		$quest = Quest::find($id);
		return View::make('quest.show')->with('quest', $quest);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$quest = Quest::find($id);
		return View::make('quest.edit')->with('quest', $quest)->with('edit', true);
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
		     'date' => 'required|date_format:Y-m-d',
		);
		foreach(Input::get('experience') as $key => $value) {
		     $rules['experience.'.$key] = 'required|numeric';
		}
		$input = Input::all();
		
		$validator = Validator::make($input, $rules);
		
	    if ($validator->fails()) {
		dd($validator->messages());
		    return Redirect::back()
			     ->with('flash_message', 'Please fill in all fields.')
			     ->withInput(Input::all())
				 ->withErrors($validator);
		}
		else {
		foreach ($input['experience'] as $key => $value) {
		     $syncValues[$key] = array('experience' => $value);
		}
		    $quest = Quest::find($id);
            $quest->date = $input['date'];
			$quest->save();
            $quest->characters()->sync($syncValues);
            return Redirect::intended('/')->with('flash_message', 'Quest Updated.');		
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
        $quest = Quest::find($id);
		$quest->characters()->detach();
		$quest->delete();
		return Redirect::intended('/')->with('flash_message', 'Quest Deleted.');
	}

}