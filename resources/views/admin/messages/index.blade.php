@extends('layouts.admin')

@section('content')
    @if(Session::has('message_success')))
        <div class="message green">
            {{ Session::get('message_success') }}
        </div>
    @endif

    <table class="ui celled table">
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

                            <button type="submit" class="ui button red mini"><i class="trash outline icon"></i> Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection