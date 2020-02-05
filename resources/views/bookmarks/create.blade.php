@extends('layout')
@section('content')
<ul>
  @foreach($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
<form action="/" method="POST">
  @csrf
  <input name="title" type="text" placeholder="Title" value="{{old('title')}}" />
  <input name="url" type="url" placeholder="URL" value="{{old('url')}}" />
  <input type="submit" value="Create">
</form>
@endsection