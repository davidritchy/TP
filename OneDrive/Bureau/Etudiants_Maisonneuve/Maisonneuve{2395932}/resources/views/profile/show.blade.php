@extends('layouts.app')
@section('title', 'Article')
@section('content')
<div class="card container mt-5" style=" height: 25rem;background-color: rgba(0, 0, 0, 0.538);border: 1px solid white;">
            <div class="card-body text-light "  >
              
              <h5 class="card-title text-center">@lang('Title post') : {{ $article->titre }}</h5>
        
              <div class=" mt-5 ">
                <p class="text-center">{{ $article->contenu }}</p>
           
              </div>

              @if(Auth::user()->id == $article->user_id)
               <div class="text-center d-flex justify-content-around mt-5">     
                <a class="btn btn-primary btn-lg" href="{{ route('profile.edit', $article->id) }}" role="button">@lang('Edit')</a>
                <button type="button" class="btn btn-lg btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">@lang('Delete')</button>
               </div>
            @else
            <div>

            </div>
            @endif
            </div>
          </div>
          {{-- Bootstrap Modal --}}
<div class="modal fade container" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
    <div class="modal-content text-light" style="background-color: rgba(0, 0, 0, 0.538);border: 1px solid white;">
        <div class="modal-header container">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ">
            @lang('Are you sure !?')
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">@lang('No')</button>
        <form method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">@lang('Yes')</button>
        </form>
        </div>
    </div>
    </div>


</div>  
@endsection