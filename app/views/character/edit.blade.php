@extends('layouts.default')
@section('content')
@if ($edit)
{{ Form::model($character, array('route' => array('character.update', $character->id))) }}
<h1>Editing {{$character->name}}-{{$character->race}}</h1>
@else
{{ Form::Open(array('route' => 'character.store')) }}
<h1>Create a new character</h1>
@endif
{{ Form::label('name', 'Name:') }}
{{ Form::text('name') }}
<br />
{{ Form::label('race', 'Race:') }}
{{ Form::text('race') }}
<br />
{{ Form::label('active', 'Active:') }}
{{ Form::checkbox('active', 'false') }}
<br />
{{ Form::submit('Edit') }}
{{ Form::close() }}
@stop