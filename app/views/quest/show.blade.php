@extends('layouts.default')
@section('content')
<h1>Quest - {{$quest->date}} <a href="{{URL::Action('QuestController@edit', [$quest->id]) }}">Edit</a></h1>
<table>
<tr><th>Character</th><th>Experience</th></tr>
@if (count($quest->characters) > 0)
@foreach($quest->characters as $character) 
<tr><td>{{$character->name}} - {{$character->race}}</td><td>{{$character->pivot->experience}}</td></tr>
@endforeach
@else 
<tr><td colspan="2">No Characters</td></tr>
@endif 
</table>
<a href="{{URL::Action('QuestController@destroy', [$quest->id]) }}">Delete Quest</a>
@stop