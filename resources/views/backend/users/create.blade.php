@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add User</h5>
    <div class="card-body">
      <form method="post" action="{{route('users.store')}}">
        {{csrf_field()}}
        <div class="form-group">
        <label for="inputFirstName" class="col-form-label">First Name</label>
        <input required id="inputFirstName" type="text" name="firstname" placeholder="Enter first name" value="{{ old('firstname') }}" class="form-control">
        @error('firstname')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="inputMiddleName" class="col-form-label">Middle Name</label>
        <input required id="inputMiddleName" type="text" name="middlename" placeholder="Enter middle name" value="{{ old('middlename') }}" class="form-control">
        @error('middlename')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="inputLastName" class="col-form-label">Last Name</label>
        <input required id="inputLastName" type="text" name="lastname" placeholder="Enter last name" value="{{ old('lastname') }}" class="form-control">
        @error('lastname')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="inputGender" class="col-form-label">Gender</label>
        <select id="inputGender" name="gender" class="form-control">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        @error('gender')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="inputAddress" class="col-form-label">Address</label>
        <textarea id="inputAddress" name="address" placeholder="Enter address" class="form-control">{{ old('address') }}</textarea>
        @error('address')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="inputContact" class="col-form-label">Contact</label>
        <input required id="inputContact" type="text" name="contact" placeholder="Enter contact" value="{{ old('contact') }}" class="form-control">
        @error('contact')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="inputshopname" class="col-form-label">Shopname</label>
        <input required id="inputshopname" type="text" name="shopname" placeholder="Enter shopname" value="{{ old('shopname') }}" class="form-control">
        @error('shopname')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="inputShopImage" class="col-form-label">Shop Image</label>
        <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm1" data-input="thumbnail1" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose
                </a>
            </span>
            <input required id="thumbnail1" class="form-control" type="text" name="shopimage" value="{{ old('shopimage') }}">
        </div>
        <img id="holder" style="margin-top:15px;max-height:100px;">
        @error('shopimage')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Nick Name</label>
        <input required id="inputTitle" type="text" name="name" placeholder="Enter name"  value="{{old('name')}}" class="form-control">
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
            <label for="inputEmail" class="col-form-label">Email</label>
          <input required id="inputEmail" type="email" name="email" placeholder="Enter email"  value="{{old('email')}}" class="form-control">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
            <label for="inputPassword" class="col-form-label">Password</label>
          <input required id="inputPassword" type="password" name="password" placeholder="Enter password"  value="{{old('password')}}" class="form-control">
          @error('password')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
        <label for="inputPhoto" class="col-form-label">Photo</label>
        <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                <i class="fa fa-picture-o"></i> Choose
                </a>
            </span>
            <input required id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
        </div>
        <img id="holder" style="margin-top:15px;max-height:100px;">
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        @php 
        $roles = DB::table('users')->select('role')->groupBy('role')->get();
        @endphp
        <div class="form-group">
            <label for="role" class="col-form-label">Role</label>
            <select name="role" class="form-control">
                <option value="">-----Select Role-----</option>
                @foreach($roles as $role)
                    <option value="{{$role->role}}">{{$role->role}}</option>
                @endforeach
            </select>
          @error('role')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
          <div class="form-group">
            <label for="status" class="col-form-label">Status</label>
            <select name="status" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm1').filemanager('image');
    $('#lfm').filemanager('image');
</script>
@endpush