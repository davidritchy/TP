@extends('layouts.app')
@section('title', 'Liste Utilisateurs')
@section('content')

<div class="container mt-5">
<table class="table table-dark table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('Name')</th>
                    <th scope="col">@lang('Username')</th>
                    <th scope="col">@lang('Password')</th>
                  </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                  <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->password}}</td>
                  </tr>
                  @empty
            <div class="alert alert-danger">There are no tasks to display!</div>
        @endforelse
                </tbody>
              </table>
              {{ $users }}
</div>   
@endsection