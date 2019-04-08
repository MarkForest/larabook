@extends('layouts.master')
@section('menu')
    @parent
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            <ul style="list-style: none">
                @foreach($topics as $topic)
                    <li>
                        <a href="{{url("topic/$topic->id")}}">
                            {{$topic->topicname}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-7 col-md-offset-1">
            @if ($id != 0)
                @foreach($blocks as $block)
                    <div class="panel panel-success">
                        <div class="panel-heading"><h3>{{$block->title}}</h3></div>
                        <div class="panel-body">
                            @if ( $block->imagepath != '')
                                <img src="{{asset($block->imagepath)}}" alt="iamge picture" class="img-responsive img-rounded">
                            @endif
                            <p>
                                <p data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    {{mb_strimwidth($block->content, 0, 125, "...")}}
                                </p>
                                <div id="collapseOne" class="panel-collapse collapse out">
                                    {{$block->content}}
                                </div>
                            </p>
                        </div>
                        <div class="panel-footer"></div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection