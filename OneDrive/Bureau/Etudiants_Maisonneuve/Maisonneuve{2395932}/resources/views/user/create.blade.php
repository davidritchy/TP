
@extends('layouts.app')
@section('title', 'Welcome')
@section('content')
<div class="container mt-5" style="background-color: rgba(0, 0, 0, 0.69);border-radius:10px;border:1px solid white;">
<h2>
   @lang('Registration')
</h2>
<form class="row-3 g-3 needs-validation"  style="padding: 10px;" method="POST">
  @csrf
    <div class="col-md-6 position-relative ms-5">
      <label for="validationTooltip01" class="form-label">
         @lang('Name')
      </label>
      <input type="text" class="form-control" id="validationTooltip01" name="name" required>
      @if ($errors->has('name'))
            <div class="text-danger mt-2">
                {{$errors->first('name')}}
            </div>
        @endif
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 position-relative ms-5">
      <label for="validationTooltip02" class="form-label">
         @lang('Username')
      </label>
      <input type="text" class="form-control" id="validationTooltip02" name="email" required>
      @if ($errors->has('email'))
            <div class="text-danger mt-2">
                {{$errors->first('email')}}
            </div>
        @endif
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 position-relative ms-5">
      <label for="validationTooltip02" class="form-label">
         @lang('Password')
      </label>
      <input type="password" class="form-control" id="validationTooltip02" name="password" required>
      @if ($errors->has('password'))
            <div class="text-danger mt-2">
                {{$errors->first('password')}}
            </div>
        @endif
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
      <button type="submit" class="btn btn-success mt-4 btn-lg" style="margin-left: 45%">
         @lang('Save')
      </button>
    </div>
  </form>
  </div>
  @endsection