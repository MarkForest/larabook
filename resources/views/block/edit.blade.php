@extends('layouts.app')
@section('menu')
    @parent
@endsection
@section('content')
    {!! Form::model($block, ['route' => ['block.update', $block->id], 'method' => 'PUT', 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('topicid', 'Select Topic') !!}
        {!! Form::select('topicid', $topics, $block->topicid, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('title', 'Edit Title') !!}
        {!! Form::text('title', $block->title, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Edit Content') !!}
        {!! Form::textarea('content', $block->content, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('imagepath', 'Edit Image') !!}
        {!! Form::file('imagepath',  ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save Edet Block', ['class'=> 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection