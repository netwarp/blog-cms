@extends('layouts.admin')

@section('content')
<div class="col s12">
    <nav class="blue-grey darken-2">
        <div class="nav-wrapper">
            <div class="col s12">
                <a href="/admin" class="breadcrumb">Admin</a>
                <a href="/admin/messages" class="breadcrumb">Messages</a>
            </div>
        </div>
    </nav>
</div>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <table class="bordered stripped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Ip</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td>{{ $message->id }}</td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->ip }}</td>
                                <td>{{ $message->message }}</td>
                                <td>{{ $message->created_at }}</td>
                                <td>
                                    <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit" class="btn red darken-3"><i class="trash outline icon"></i> Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection