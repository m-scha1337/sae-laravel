@extends('layouts.master')

@section('title', $posting->title)

@section('container')

	<div class="card mt-4">
		<div class="card-body">

			<h2>{{ $posting->title }}</h2>

			@if($posting->is_featured)
				<div class="alert alert-info">featured!</div>
			@endif

			@if($posting->text)
				<p>{{ $posting->text }}</p>
			@endif

			<p>
				<i class="fa fa-thumbs-up"></i> {{ $posting->like_count }}
				<i class="fa fa-thumbs-down ml-2"></i> {{ $posting->dislike_count }}
			</p>

			<p>{{ nice_date($posting->created_at) }}</p>

			<a href="{{ route('postings.index') }}" class="btn btn-outline-primary">
				<i class="fa fa-chevron-left"></i> Back
			</a>

		</div>
	</div>

@endsection
