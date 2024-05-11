@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Mechanic</h5>
    <div class="card-body">
      <form method="post" action="{{route('mechanic.update', $mechanic->id)}}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="name" class="col-form-label">Mechanic Name <span class="text-danger">*</span></label>
          <input id="name" type="text" name="name" placeholder="Enter Mechanic Name" value="{{$mechanic->name}}" class="form-control">
          @error('name')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="age" class="col-form-label">Age <span class="text-danger">*</span></label>
          <input id="age" type="number" name="age" placeholder="Enter Age" value="{{$mechanic->age}}" class="form-control">
          @error('age')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="gender" class="col-form-label">Gender <span class="text-danger">*</span></label>
          <select id="gender" name="gender" class="form-control">
            <option value="male" {{$mechanic->gender == 'male' ? 'selected' : ''}}>Male</option>
            <option value="female" {{$mechanic->gender == 'female' ? 'selected' : ''}}>Female</option>
            <option value="other" {{$mechanic->gender == 'other' ? 'selected' : ''}}>Other</option>
          </select>
          @error('gender')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="contact_number" class="col-form-label">Contact No. <span class="text-danger">*</span></label>
          <input id="contact_number" type="text" name="contact_number" placeholder="Enter Contact No." value="{{$mechanic->contact_number}}" class="form-control">
          @error('contact_number')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="specialization" class="col-form-label">Specialization</label>
          <input id="specialization" type="text" name="specialization" placeholder="Enter Specialization" value="{{$mechanic->specialization}}" class="form-control">
          @error('specialization')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select id="status" name="status" class="form-control">
            <option value="available" {{$mechanic->status == 'available' ? 'selected' : ''}}>Available</option>
            <option value="unavailable" {{$mechanic->status == 'unavailable' ? 'selected' : ''}}>Unavailable</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
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