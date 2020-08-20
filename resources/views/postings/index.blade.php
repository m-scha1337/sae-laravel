@extends('layouts.master')

@section('title', trans('postings.title'))

@section('container')

	<h1>{{ trans_choice('postings.title', $postings->count()) }}</h1>

	<ul>
		@foreach($postings as $posting)
			<li>
				<a href="{{ route('postings.show', $posting->id) }}">{{ $posting->title }}</a>
				@if($posting->is_featured)
					<span>{{ trans('postings.featured') }}</span>
				@endif
				@if($posting->user)
					<br><small>{{ $posting->user->name }}</small>
				@endif
			</li>
		@endforeach
	</ul>

	<a href="{{ route('postings.create') }}" class="btn btn-primary">
		<i class="fa fa-plus"></i> Create new posting
	</a>

@endsection
