@extends('layouts.master')

@section('title', 'Edit')

@section('container')

	<div class="card mt-4">
		<div class="card-body">

			<form method="post" action="{{ route('postings.update', $posting->id) }}" autocomplete="off">

				@method('put')
				@csrf

				@include('postings._form')

			</form>

		</div>
	</div>

@endsection
