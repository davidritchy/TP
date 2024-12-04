@extends('layouts.app')
@section('title', 'Liste Etudiants')
@section('content')
<div class="card container mt-5" style=" height: 25rem;background-color: rgba(0, 0, 0, 0.538);border: 1px solid white;">
            <div class="card-body text-light "  >
              <h5 class="card-title text-center">@lang('Student No') / {{ $etudiant->etudiant_id }}</h5>
        
              <div class=" mt-5">
                <ul style="list-style: none;">
                    <li>@lang('Name') : {{ $etudiant->nom }}</li>
                    <li>@lang('Birthday') : {{ $etudiant->date_naissance }}</li>
                    <li>@lang('Address') : {{ $etudiant->addresse }}</li>
                    <li>@lang('Number phone') : {{ $etudiant->telephone }}</li>
                    @foreach( $villes as $ville )
                    @if( $ville->id_ville == $etudiant->ville_id)
                    <li>@lang('City') : {{$ville->nom}}</li>
                    @endif
                    @endforeach
                    <li>@lang('E-mail') : {{ $etudiant->email }}</li>
                 </ul>
              </div>
           
               <div class="text-center d-flex justify-content-around mt-5">     
                <a class="btn btn-primary btn-lg" href="{{ route('etudiant.edit', $etudiant->etudiant_id) }}" role="button">@lang('Edit')</a>
                <button type="button" class="btn btn-lg btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">@lang('Delete')</button>
               </div>
           
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