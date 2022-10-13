@extends('todos.layout')

@section('content')

<h1 class="text-2xl">Update todo</h1>
    <x-alert />
    <form action="{{route('todo.update', ['todo'=>$todo->id])}}" method="post" class="py-5">
        @csrf
        @method('patch')
        <input type="text" name="title" value="{{$todo->title}}" class="py-2 px-2 border rounded" />
        <input type="submit" value="Update" class="p-2 border rounded" />
    </form>

@endsection
