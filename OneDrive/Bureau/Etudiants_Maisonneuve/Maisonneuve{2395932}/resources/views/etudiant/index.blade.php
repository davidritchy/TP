@extends('layouts.app')
@section('title', 'Liste Etudiants')
@section('content')

<div class="container mt-5">
<table class="table table-dark table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('Name')</th>
                    <th scope="col">@lang('City')</th>
                    <th scope="col">@lang('Action')</th>
                  </tr>
                </thead>
                <tbody>
                @forelse ($etudiants as $etudiant)
                  <tr>
                    <th scope="row">{{ $etudiant->etudiant_id }}</th>
                    <td>{{ $etudiant->nom }}</td>
                    @foreach($villes as $ville)
                    @if( $etudiant->ville_id == $ville->id_ville)
                    <td>{{ $ville->nom }}</td>
                    @endif
                    @endforeach
                    <td>
                        <a class="btn  btn-success" href="{{ route('etudiant.show', $etudiant->etudiant_id) }}" role="button">@lang('View')</a>
                    </td>
                  </tr>
                  @empty
            <div class="alert alert-danger">There are no tasks to display!</div>
        @endforelse
                </tbody>
              </table>
              {{ $etudiants }}
</div>   
@endsection