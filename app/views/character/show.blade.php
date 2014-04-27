@extends('layouts.default')
@section('content')
<h1>{{$character->name}} - {{$character->race}} - <a href="{{URL::Action('CharacterController@edit', [$character->id]) }}">Edit</a></h1>
<table>
<tr><th>Date</th><th>Experience</th></tr>
@if (count($character->quests) > 0)
@foreach($character->quests as $quest) 
<tr><td>{{$quest->date}}</td><td>{{$quest->pivot->experience}}</td></tr>
@endforeach
@else 
<tr><td colspan="2">No Quests</td></tr>
@endif 
</table>
<a href="{{URL::Action('CharacterController@destroy', [$character->id]) }}">Delete Character</a>
@stop