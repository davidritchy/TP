@extends('layouts.app')
@section('title', 'Profile')
@section('content')
@auth
        <h1 class="ms-4">
          @lang('Welcome')
          , {{ Auth::user()->name }}</h1>
    @else
        <h1>
          @lang('Please log in to continue.')
        </h1>
    @endauth



<a href="#"  class="btn btn-success btn-lg mb-2" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal" aria-disabled="true">
   @lang('Make a Post')
</a>
<div class="container d-flex flex-wrap justify-content-around gap-3 mx-auto p-2 overflow-y-auto" style="background-color: rgba(0, 0, 0, 0.69);border-radius:10px;border:1px solid white;height:65vh">

@forelse ($articles as $article)
<div class="card p-2" style="width: 18rem;">  
    <div class="card-body ">
        <h5 class="card-title">{{ $article->titre }}</h5>
        <p><small>{{ $article->due_date }}</small></p>
        @foreach($users as $user)
        @if($user->id == $article->user_id)
        <p>{{ $user->name }}</p>
        @endif
        @endforeach       
        <a href="{{ route('profile.show', $article->id) }}" class="btn btn-dark text-light">
           @lang('View')
        </a>
    </div>
</div>
@empty
    <div class="alert alert-danger">There are no articles to display!</div>
@endforelse
</div>


<div class="modal fade container" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" >

<div class="modal-dialog mt-5">

<div class="modal-content text-light " style="background-color: rgba(0, 0, 0, 0.538);border: 1px solid white;height:60vh;width:50vw">
<button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close" >X</button>
<form  action="{{ route('profile.store') }}" method="POST">
@csrf
    <h2>Forum</h2>
<div class="input-group mx-auto p-2">
  <input type="text" class="form-control" placeholder="@lang('Title post')" aria-label="Username" name="titre" required>
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
    <textarea class="form-control" aria-label="With textarea" name="contenu" required></textarea>
    @if ($errors->has('contenu'))
            <div class="text-danger mt-2">
                {{$errors->first('contenu')}}
            </div>
        @endif
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="mb-3 ms-2 me-2">
    <label for="due_date" class="form-label ">
       @lang('Due Date')
    </label>
    <input type="date" class="form-control" id="due_date" name="due_date">
    </div>
    <input type="hidden" class="form-control" value=" {{ Auth::user()->id }}" aria-label="Username" name="user_id">
    <input type="submit" class="input-group mx-auto p-2" value="@lang('POST')">
</form>
</div>
  
</div>
</div>
</div>


@endsection