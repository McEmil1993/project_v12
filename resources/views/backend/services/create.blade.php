@extends('backend.layouts.master')
@section('title','Moto Shop || Service Update')
@section('main-content')

<div class="row">
    <div class="col-8 offset-2">
        <div class="card">
            <h5 class="card-header">Update Service</h5>
            <div class="card-body">
                <form method="post" action="/admin/services/update_service">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$edit->id}}" name="edit_id" />

                    <input type="hidden" value="{{$edit->customer_contact}}" name="contact" />

                    <div class="form-group">
                        
                        <label for="inputTotal" class="col-form-label">Total amount<span
                                class="text-danger">*</span></label>
                        <input id="inputTotal" type="text" name="total_amount" placeholder="Enter assign"
                            value="{{old('total_amount')}} {{$edit->total_amount}}" class="form-control">
                        @error('assign')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="inputAssign" class="col-form-label">Assign to <span
                                class="text-danger">*</span></label>

                                <select id="inputAssign" name="assign" class="form-control">
                            @foreach (\App\Http\Controllers\ServiceController::getMechanic() as $mechanic)
                                <option value="{{ $mechanic->id }}">{{ $mechanic->name }}</option>
                            @endforeach
                        </select>

                        @error('assign')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control">
                            <option value="pending" <?php if($edit->status == 'pending'){ echo 'selected';} ?>>Pending
                            </option>
                            <option value="ongoing"
                                <?php if($edit->status == 'ongoing'){ echo 'selected';} ?>>Ongoing
                            </option>
                            <option value="service_finished"
                                <?php if($edit->status == 'service_finished'){ echo 'selected';} ?>>Service Finish
                            </option>
                            <option value="cancelled" <?php if($edit->status == 'cancelled'){ echo 'selected';} ?>>
                                Cancelled</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">

                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

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