@extends('todos.layout')

@section('content')

<h1 class="text-2xl">Add a todo item</h1>
    <x-alert />
    <form action="/todos/create" method="post" class="py-5">
        @csrf
        <input type="text" name="title" class="py-2 px-2 border rounded" />
        <input type="submit" value="create" class="p-2 border rounded" />
    </form>

@endsection
