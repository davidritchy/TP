@extends('layouts.app')
@section('title', trans('lang.text_welcome'))
@section('content')

        <div class="container">
            Etes-vous sur de vouloir supprimer?
        </div>
        <form method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Oui</button>
        </form>
        </div>