@extends('layouts.app')
@section('title', 'Profile - Modification')
@section('content')

<div class="container mx-auto p-2" style="background-color: rgba(0, 0, 0, 0.69);border-radius:10px;border:1px solid white;">

<form method="POST">
@csrf
@method('PUT')
    <h2>@lang('Modification')</h2>
<div class="input-group mx-auto p-2">
  <input type="text" class="form-control" placeholder="@lang('Title post')" aria-label="Username" name="titre"  value="{{ old('titre', $article->titre) }}" required>
  @if ($errors->has('titre'))
            <div class="text-danger mt-2">
                {{$errors->first('titre')}}
            </div>
        @endif
      <div class="valid-tooltip">
        Looks good!
      </div>
</div>

    <div class="input-group mx-auto p-2">
    <span class="input-group-text">textarea</span>
    <textarea class="form-control" aria-label="With textarea" name="contenu"  value="{{ old('contenu', $article->contenu) }}"  required></textarea>
    @if ($errors->has('contenu'))
            <div class="text-danger mt-2">
                {{$errors->first('contenu')}}
            </div>
        @endif
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="mb-3">
    <label for="due_date" class="form-label">@lang('Due Date')</label>
    <input type="date" class="form-control" id="due_date" name="due_date" value="{{ old('due_date', $article->due_date) }}" >
    </div>
    <input type="hidden" class="form-control" value="{{Auth::user()->id}}" aria-label="Username" name="user_id">
    <input type="submit" class="input-group mx-auto p-2" value = "@lang('Update')">
</form>
</div>
@endsection