@extends('todos.layout')

@section('content')
<div class="flex justify-center">
    <h1 class="text-2xl">All Todos: </h1>
    <a href="/todos/create" class="mx-5 py-1 px-1 bg-blue-400 cursor-pointer rounded text-white">New Todo</a>
</div>
    <ul class="my-5">
    @foreach($todos as $todo)
        <li>
            {{ $todo->title }}
        </li>
    @endforeach
    </ul>

@endsection
