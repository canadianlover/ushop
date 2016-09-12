@extends('app');
@section('content');
<h1>Add a  new item</h1>
<hr />
<content>
    <div class="form-group">
    {!! Form::open() !!}
    {!! Form::label('name', "Name") !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    {!! Form::label('filename', "File Name") !!}
    {!! Form::file('filename', null, ['class' => 'form-control']) !!}

    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    {!! Form::submit('Add Item', ['class' => 'btn btn-primary form-control']) !!}

</content>
</div>

@stop