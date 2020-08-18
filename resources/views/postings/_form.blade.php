
<div class="form-group">
	<label for="input_title">Title:</label>
	<input type="text" name="title" value="{{ $posting->title }}" class="form-control" id="input_title">
</div>

<div class="form-group">
	<label for="input_text">Text:</label>
	<textarea name="text" class="form-control" id="input_text">{{ $posting->text }}</textarea>
</div>

<div class="form-group">
	<input type="checkbox" name="is_featured" id="input_featured" {{ $posting->is_featured ? 'checked' : '' }}>
	<label for="input_featured">Is featured</label>
</div>

<button type="submit" class="btn btn-primary">
	<i class="fa fa-check"></i> Save
</button>

<a href="{{ route('postings.index') }}" class="btn btn-outline-primary">
	<i class="fa fa-chevron-left"></i> Back
</a>
