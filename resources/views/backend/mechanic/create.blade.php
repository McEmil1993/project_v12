@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add Mechanic</h5>
    <div class="card-body">
      <form method="post" action="{{ route('mechanic.store') }}">
        {{ csrf_field() }}
        
        <div class="form-group">
          <label for="mechanicName" class="col-form-label">Mechanic Name<span class="text-danger">*</span></label>
          <input id="mechanicName" type="text" name="name" placeholder="Enter Mechanic Name" value="{{ old('name') }}" class="form-control">
          @error('name')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="age" class="col-form-label">Age<span class="text-danger">*</span></label>
          <input id="age" type="number" name="age" placeholder="Enter Age" value="{{ old('age') }}" class="form-control">
          @error('age')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="gender" class="col-form-label">Gender<span class="text-danger">*</span></label>
          <select id="gender" name="gender" class="form-control">
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
          </select>
          @error('gender')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="contact" class="col-form-label">Contact No.<span class="text-danger">*</span></label>
          <input id="contact" type="text" name="contact" placeholder="Enter Contact No." value="{{ old('contact') }}" class="form-control">
          @error('contact')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="specialization" class="col-form-label">Specialization</label>
          <input id="specialization" type="text" name="specialization" placeholder="Enter Specialization" value="{{ old('specialization') }}" class="form-control">
          @error('specialization')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Status<span class="text-danger">*</span></label>
          <select id="status" name="status" class="form-control">
              <option value="available">Available</option>
              <option value="unavailable">Unavailable</option>
          </select>
          @error('status')
            <span class="text-danger">{{$message}}</span>
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