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
            @if($todo->completed)
                <span class="text-green-200">Already done!</span>
            @else
                <a href="{{'/todos/' . $todo->id . '/edit'}}" class="mx-5 py-1 px-1 bg-orange-400 cursor-pointer rounded text-white">Edit</a>
                <span onclick="event.preventDefault(); document.getElementById('form-complete-{{$todo->id}}').submit()" class="mx-5 py-1 px-1 bg-orange-400 cursor-pointer rounded text-white">Click to finish</span>
                <form id="{{'form-complete-'.$todo->id}}" style="display: none" method="POST" action="{{route('todo.complete', ['todo'=>$todo->id])}}">
                @csrf
                @method('put')
            </form>
            @endif
        </li>
    @endforeach
    </ul>

@endsection
