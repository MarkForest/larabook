@extends('layouts.master')
@section('menu')
    @parent
@endsection
@section('content')
    <div class="label lable-info">
        {{$page}}
    </div>
    {!! Form::model($block, ['action'=>'BlockController@store', 'files'=>true, 'class'=>'form']) !!}
    <div class="form-group">
        {!! Form::label('topicid', 'Select Topic') !!}
        {!! Form::select('topicid', $topics, '', ['class'=>'form-control']) !!}
        <br>
        <a href="{{url('topic/create')}}" class="btn btn-sm btn-info" type="submit">Add new Topic</a>
    </div>
    <div class="form-group">
        {!! Form::label('title', 'Block Title') !!}
        {!! Form::text('title', '', ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Add Content') !!}
        {!! Form::textarea('content', '', ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('imagepath', 'Add Image') !!}
        {!! Form::file('imagepath', ['class'=>'form-control']) !!}
    </div>
    <button class="btn btn-success" type="submit">Add Block</button>
    {!! Form::close() !!}
@endsection