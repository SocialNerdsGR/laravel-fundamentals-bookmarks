@extends('layout')
@section('content')
<a href="create">Create bookmark</a>
<ul>
  @foreach($bookmarks as $bookmark)
  <li>
    <a href="{{$bookmark->url}}">
      <span>{{$bookmark->title}}</span>
    </a>
    <form action="/{{$bookmark->id}}" method="POST">
      @method("DELETE")
      @csrf
      <input type="submit" value="Delete">
    </form>
  </li>
  @endforeach
</ul>
@endsection