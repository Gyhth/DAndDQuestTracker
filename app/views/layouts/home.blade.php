@extends('layouts.default')
@section('content')
<div style="float: left; width: 200px">
<h1>Characters</h1>
@foreach($characters as $character) 
<p><a href="{{URL::Action('CharacterController@show', [$character->id]) }}">{{ $character->name }} - {{ $character->race }}</a></p>
@endforeach
<a href="{{URL::Action('CharacterController@create')}}">New Character</a> 
</div>
<div style="float: left; width: 200px">
<h1>Quests</h1>
@foreach($quests as $quest) 
<p><a href="{{URL::Action('QuestController@show', [$quest->id]) }}">{{ $quest->date }}</a></p>
@endforeach
</div>
@stop