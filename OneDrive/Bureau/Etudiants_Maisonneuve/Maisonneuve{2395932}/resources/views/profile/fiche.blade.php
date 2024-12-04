@extends('layouts.app')
@section('title', 'Fichiers')
@section('content')
<div class="mb-3  mx-auto p-2">
    
    <div class="container">
    <form action="{{ route('profile.fiche') }}" method="POST" enctype="multipart/form-data">
    @csrf
  <label for="formFile" class="form-label">@lang('Add file there')</label>
  <input class="form-control" type="file" id="formFile" name="formFile">
  <label for="titre_document">
    @lang('Add a Title')
  <input class="form-control" type="text"  name="titre_document" >
  </label>
  
  
  <input class="form-control" type="hidden"  name="user_document" value= "{{Auth::user()->id}}">


  <input type="submit" value="@lang('PUSH')">
</form>


<div class="container mt-5">
<table class="table table-dark table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('Title')</th>
                    <th scope="col">@lang('File')</th>
                    <th scope="col">@lang('Share by')</th>
                    <th  scope="col" colspan="4">@lang('Action')</th>
                  </tr>
                </thead>
                <tbody>
                @forelse ($documents as $document)
                  <tr>
                    <th scope="row">{{ $document->id }}</th>
                    <td>{{ $document->titre_document }}</td>
                    <td>{{ $document->fichier}}</td>
                    @foreach($users as $user)
                    @if($user->id == $document->user_document)
                    <td>{{ $user->name}}</td>
                    @endif
                    @endforeach
                    <td colspan="2">
                        <a class="btn btn-md btn-primary" href="http://localhost:8000/uploads/{{ $document->fichier }}" role="button">@lang('View')</a>
                    </td>
                    
                    @if($document->user_document == Auth::user()->id )
                    <td>
                    <a class="btn btn-md  btn-danger" href="{{ route('document.delete', $document->id) }}" role="button">@lang('Delete')</a>
                    </td>
                  
                    @endif
                   
                  </tr>
                  @empty
            <div class="alert alert-danger">There are no tasks to display!</div>
        @endforelse
                </tbody>
              </table>
              {{ $documents }}
</div>   
</div>
</div>
@endsection