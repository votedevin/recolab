@extends('layouts.dashboard')

@section('template_title')
	{{ $user->name }}'s Profile
@endsection

@section('template_fastload_css')

	#map-canvas{
		min-height: 300px;
		height: 100%;
		width: 100%;
	}

@endsection

@section('header')
	<small>
		{{ trans('profile.showProfileTitle',['username' => $user->name]) }}
	</small>
@endsection

@section('breadcrumbs')

	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="{{url('/')}}">
			<span itemprop="name">
				{{ trans('titles.app') }}
			</span>
		</a>
		<i class="material-icons">chevron_right</i>
		<meta itemprop="position" content="1" />
	</li>

	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="active">
		<a itemprop="item" href="{{ url('/profile/'.Auth::user()->name) }}" class="hidden">
			<span itemprop="name">
				{{ trans('titles.profile') }}
			</span>
		</a>
		{{ trans('titles.profile') }}
		<meta itemprop="position" content="2" />
	</li>

@endsection

@section('content')

	@include('cards.user-profile-card')

@endsection

@section('footer_scripts')

	@include('scripts.google-maps-geocode-and-map')

@endsection
