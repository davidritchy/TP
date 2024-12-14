@extends('layouts.app')
@section('title', trans('lang.text_welcome'))
@section('content')
@auth
        <h1 class="ms-4">
         @lang('Online')</h1>
    @else
        <h1>
          @lang('Please log in to continue.')
        </h1>
    @endauth




<a href="{{ route('user.create') }}"  class="btn btn-success btn-lg" role="button" aria-disabled="true">@lang('New Account')</a>
<div class="container mt-5" style="background-color: rgba(0, 0, 0, 0.69);border-radius:10px;border:1px solid white;">
<h2>@lang('lang.text_etudiant')</h2>

  <form class="row-3 g-3 needs-validation"  style="padding: 10px;" action="{{ route('etudiant.store') }}" method="POST">
  @csrf
    <div class="col-md-6 position-relative ms-5">
      <label for="validationTooltip01" class="form-label">
        @lang('Name')
      </label>
      <input type="text" class="form-control" id="validationTooltip01" name="nom" required>
      @if ($errors->has('nom'))
            <div class="text-danger mt-2">
                {{$errors->first('nom')}}
            </div>
        @endif
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 position-relative ms-5">
      <label for="validationTooltip02" class="form-label">
        @lang('Address')
      </label>
      <input type="text" class="form-control" id="validationTooltip02" name="addresse" required>
      @if ($errors->has('addresse'))
            <div class="text-danger mt-2">
                {{$errors->first('addresse')}}
            </div>
        @endif
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 position-relative ms-5">
      <label for="validationTooltip02" class="form-label">
        @lang('Birthday')
      </label>
      <input type="date" class="form-control" id="validationTooltip02" name="date_naissance" required>
      @if ($errors->has('date_naissance'))
            <div class="text-danger mt-2">
                {{$errors->first('date_naissance')}}
            </div>
        @endif
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 position-relative ms-5">
      <label for="validationTooltip02" class="form-label">
        @lang('Number phone')
      </label>
      <input type="text" class="form-control" id="validationTooltip02" name="telephone" required>
      @if ($errors->has('telephone'))
            <div class="text-danger mt-2">
                {{$errors->first('telephone')}}
            </div>
        @endif
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 position-relative ms-5">
      <label for="validationTooltipUsername" class="form-label">
        @lang('E-mail')
      </label>
      <div class="input-group has-validation">
        <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
        <input type="email" name="email" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required>
        @if ($errors->has('email'))
            <div class="text-danger mt-2">
                {{$errors->first('email')}}
            </div>
        @endif
        <div class="invalid-tooltip">
          Please choose a unique and valid username.
        </div>
      </div>
    </div>
    <div class="col-md-6 position-relative ms-5">
      <label for="validationTooltip04" class="form-label">
        @lang('City')
      </label>
      <select class="form-select" name="ville_id"  id="validationTooltip04" required>
      @forelse ($villes as $ville)
        <option selected  value="{{ $ville->id_ville }}">{{ $ville->nom }}</option>
        @empty
            <div class="alert alert-danger">There are no tasks to display!</div>
        @endforelse
        <!-- <option>...</option> -->
      </select>
      <div class="invalid-tooltip">
        Please select a valid state.
      </div>
    </div>
      <button type="submit" class="btn btn-success mt-4 btn-lg" style="margin-left: 45%">
        @lang('Submit Form')
      </button>
    </div>
  </form>
</div>
@endsection