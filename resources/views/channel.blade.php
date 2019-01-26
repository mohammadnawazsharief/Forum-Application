@extends('layouts.app')

@section('content')
			@foreach($discussions as $d)
            <div class="panel panel-default">
                <div class="panel-heading">
                	<img src="{{$d->user->avatar}}" alt="" width="50px"height="50px">&nbsp;&nbsp;&nbsp;&nbsp;
                	<span>{{$d->user->name}}, <b>{{$d->created_at->diffForHumans()}}</b></span>
                	<a href="{{route('discussion',['slug'=>$d->slug])}}" class="btn btn-default pull-right"> View
                	</a>

                  @if($d->hasBestAnswer())
                    <span class="btn btn-pull-right btn-success btn-xs">
                    CLOSED
                    </span>
                  @else
                  <span class="btn btn-pull-right btn-danger btn-xs">
                    OPEN
                  </span>
                  @endif
                  
                </div>

                <div class="panel-body">
                	<h3 class="text-center"><b>{{$d->title}}</b> </h3>
                   	<p class="">
                   		{{str_limit($d->content,200)}}
                   	</p>
                </div>
                <div class="panel-footer">
                  <span>
                    {{$d->replies->count()}} Replies
                  </span>
                  <a href="{{route('channel',['slug'=>$d->channel->slug])}}" class="pull-right btn btn-default btn-xs">
                    {{$d->channel->title}}
                  </a>
                </div>
            </div>
      		@endforeach

      		<div class="text-center">
            {{$discussions->links()}}  
          </div>
@endsection
