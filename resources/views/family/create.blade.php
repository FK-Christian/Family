@extends('layouts.app')
@section('title','New User')
@section('content')
    <section class="content-header">
        <h1>
            User
        </h1>
    </section>
    <div class="content">

        {!! Form::open(['route' => 'users.store']) !!}

        @include('users.fields')
        
        {{--@if ($errors->any()) @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach @endif--}}
        
        {!! Form::close() !!}
    </div>
@endsection
