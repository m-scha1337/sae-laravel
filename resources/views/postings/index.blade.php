@extends('layouts.master')

@section('container')

	<h1>Postings</h1>

	<ul>
		@foreach($postings as $posting)
			<li>
				{{ $posting->title }}
				@if($posting->is_featured)
					<span>FEATURED!</span>
				@endif
			</li>
		@endforeach
	</ul>

@endsection
