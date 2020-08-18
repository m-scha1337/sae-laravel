@extends('layouts.master')

@section('title', 'Create')

@section('container')

	<div class="card mt-4">
		<div class="card-body">

			<form method="post" action="{{ route('postings.store') }}" autocomplete="off">

				@csrf

				<label for="input_title">Title:</label>
				<input type="text" name="title" value="" class="form-control" id="input_title">

				<label for="input_text">Text:</label>
				<textarea name="text" class="form-control" id="input_text"></textarea>

				<button type="submit" class="btn btn-primary mt-4">Save</button>

			</form>

		</div>
	</div>

@endsection
