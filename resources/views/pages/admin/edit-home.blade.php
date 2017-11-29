@extends('layouts.dashboard')

@section('template_title')
    Home Edit
@endsection

@section('header')
	
@endsection
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
@section('breadcrumbs')

	<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
		<a itemprop="item" href="{{url('/')}}">
			<span itemprop="name">
				{{ trans('titles.app') }}
			</span>
		</a>
		<i class="material-icons">chevron_right</i>
		<meta itemprop="position" content="1" />
	</li>
	<li class="active">
		Home Edit
	</li>

@endsection

@section('content')
	<div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0">
        <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
            <h2 class="mdl-card__title-text logo-style">
                Home Edit
            </h2>

        </div>
	    <div class="row" style="padding: 20px;">

            <div class="col-md-12">
                @if($success == 'true')
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="font-size: 2em;">×</button>
                        {{$message}}                
                    </div>
                @endif
                @if($success == 'false')
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="font-size: 2em;">×</button>
                        {{$message}}                
                    </div>
                @endif
              	{{ Form::open(array('route' => 'posts.store')) }}
                    {{ csrf_field() }}
                    <div class="box-body">
                     <!--    <div class="form-group">
                            {{Form::label('title', 'Title')}} {{Form::text('title',null,array('class' => 'form-control', 'placeholder'=>'Title'))}}
                        </div> -->

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" placeholder="Title" name="title" type="text" id="title" value="{{$post->title}}">
                        </div>

                        <div class="form-group">
                            <label for="body">Content</label>
                            <textarea class="form-control" placeholder="Content" id="summernote" name="body" cols="50" rows="10" style="display: none;">{!! $post->body !!}</textarea>
                           <!-- {{Form::label('body', 'Content')}}{{Form::textarea('body',null,array('class' => 'form-control', 'placeholder'=>'Content', 'id' => 'summernote'))}}--> 
                        </div>
                        <div class="form-group">
                            {{Form::submit('Publish',array('class' => 'mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--3dp mdl-button--raised mdl-button--primary mdl-color-text--white locations'))}} </div>
                        {{Form::close()}}
                        <script>
                            var content = <?php print_r(json_encode($post->body)) ?>;
                            $('#summernote').summernote({
                                tabsize: 2,
                                height: 300
                            });
                        </script>
                    </div>
             	{{ Form::close() }}
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection