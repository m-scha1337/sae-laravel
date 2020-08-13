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
			</li>
		@endforeach
	</ul>

@endsection
