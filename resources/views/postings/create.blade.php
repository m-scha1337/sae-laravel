@extends('layouts.master')

@section('title', 'Create')

@section('container')

	<div class="card mt-4">
		<div class="card-body">

			<form method="post" action="{{ route('postings.store') }}" enctype="multipart/form-data" autocomplete="off">

				@csrf

				@include('postings._form')

			</form>

		</div>
	</div>

@endsection
