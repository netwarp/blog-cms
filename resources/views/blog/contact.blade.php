@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Contact</div>
    <div class="panel-body">
        @if( session('success') )
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/contact" method="POST">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="name">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                <label for="message">Message</label>
                <textarea name="message" rows="4" class="form-control">{{ old('message') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Envoie</button>

        </form>
    </div>
</div>
@endsection