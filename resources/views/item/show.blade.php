@extends('app')

@section('content');
<h1>{{$item->name}}</h1>


<content>

    {{$item->description}}
</content>
<a href="/addItem/{{$item->id}}">Add to Cart</a>



@stop