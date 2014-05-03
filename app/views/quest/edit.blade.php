@extends('layouts.default')
@section('content')
@if ($edit)
{{ Form::model($quest, array('route' => array('quest.update', $quest->id))) }}
<h1>Editing {{$quest->date}}</h1>
@else
{{ Form::Open(array('route' => 'quest.store')) }}
<h1>Create a new quest</h1>
@endif
{{ Form::label('questDate', 'Quest Date:') }}
{{ Form::Input('date','date', date('Y-m-d')) }}
<br />
@if($edit)
@foreach($quest->characters as $character)
{{ Form::label('experience', $character->name.' Experience:') }}
{{ Form::text('experience['.$character->id.']', $character->pivot->experience) }}
<br />
@endforeach
@else
@foreach($characters as $character)
{{ Form::label('experience', $character->name.' Experience:') }}
{{ Form::text('experience['.$character->id.']', 0) }}
<br />
@endforeach
@endif
@if($edit)
{{ Form::submit('Edit') }}
@else
{{ Form::submit('Create') }}
@endif
{{ Form::close() }}
@stop