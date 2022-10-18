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
            <p>{{ $todo->title }} </p>
            @if($todo->completed)
                <span onclick="event.preventDefault(); document.getElementById('form-incomplete-{{$todo->id}}').submit()" class="text-green-200">: Already done! (click to undo)</span>
                <form id="{{'form-incomplete-'.$todo->id}}" style="display: none" method="POST" action="{{route('todo.incomplete', ['todo'=>$todo->id])}}">
                @csrf
                @method('put')
            </form>
            @else
                <a href="{{'/todos/' . $todo->id . '/edit'}}" class="mx-5 py-1 px-1 bg-orange-400 cursor-pointer rounded text-white">Edit</a>
                <span onclick="event.preventDefault(); document.getElementById('form-complete-{{$todo->id}}').submit()" class="mx-5 py-1 px-1 bg-orange-400 cursor-pointer rounded text-white">Click to finish</span>
                <form id="{{'form-complete-'.$todo->id}}" style="display: none" method="POST" action="{{route('todo.complete', ['todo'=>$todo->id])}}">
                @csrf
                @method('put')
                </form>
            @endif
            
            <span onclick="event.preventDefault(); document.getElementById('form-delete-{{$todo->id}}').submit()" class="mx-5 py-1 px-1 bg-red-400 cursor-pointer rounded text-white">Delete</span>
            <form id="{{'form-delete-'.$todo->id}}" style="display: none" method="POST" action="{{route('todo.delete', ['todo'=>$todo->id])}}">
            @csrf
            @method('delete')
            </form>
        </li>
    @endforeach
    </ul>

@endsection
