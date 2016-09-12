@extends('app')

@section('content')
    <h1>Viewing available items</h1>
    @foreach($items as $item)
    <article>
        <h2> {{ $item->title }}</h2>
        <div class="body">

            {{ $item->description }}
        </div>
    </article>
    @endforeach
    @stop
