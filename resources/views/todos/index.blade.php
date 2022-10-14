@extends('todos.layout')

@section('content')
<div class="flex justify-center">
    <h1 class="text-2xl">All Todos: </h1>
    <a href="/todos/create" class="mx-5 py-1 px-1 bg-blue-400 cursor-pointer rounded text-white">New Todo</a>
</div>
    <ul class="my-5">
    <x-alert />
    @foreach($todos as $todo)
        <li class="flex justify-center py-2">
            <p>{{ $todo->title }}</p>
            <a href="{{'/todos/' . $todo->id . '/edit'}}" class="mx-5 py-1 px-1 bg-orange-400 cursor-pointer rounded text-white">Edit</a>
            @if($todo->completed)
                <span class="text-green-200">Already done!</span>
            @else
                <a href="{{'/todos/' . $todo->id . '/edit'}}" class="mx-5 py-1 px-1 bg-orange-400 cursor-pointer rounded text-white">Click to finish</a>
            @endif
        </li>
    @endforeach
    </ul>

@endsection
