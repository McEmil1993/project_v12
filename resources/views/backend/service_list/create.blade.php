@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add Service</h5>
    <div class="card-body">
      <form method="post" action="{{ route('service.store') }}"> <!-- Adjust the action as needed -->
        {{ csrf_field() }}
        <div class="form-group">
          <label for="serviceName" class="col-form-label">Service Name <span class="text-danger">*</span></label>
          <input id="serviceName" type="text" name="name" placeholder="Input name of service" value="{{ old('name') }}" class="form-control">
          @error('name')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="description" class="col-form-label">Description <span class="text-danger">*</span></label>
          <textarea id="description" name="description" placeholder="Input service description" class="form-control" rows="4">{{ old('description') }}</textarea>
          @error('description')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="rate" class="col-form-label">Rate <span class="text-danger">*</span></label>
          <input id="rate" type="number" name="rate" placeholder="Input rate of service" value="{{ old('rate') }}" class="form-control">
          @error('rate')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Cancel</button>
          <button class="btn btn-success" type="submit">Save</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush