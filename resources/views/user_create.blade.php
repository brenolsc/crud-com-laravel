@extends ('master')

@section ('content')

<h2>Create</h2>

@if (session()-has('message'))
    {{session()->get('message')}}
@endif
<form action="{{ route('users.store')}}" method="post">
    @csrft
    <input type="text" name="name" placeholder="name">
    <input type="text" name="lastName" placeholder="lastName">
    <input type="text" name="email" placeholder="email">
    <input type="text" name="password" placeholder="password">
    <button type="submit">Create</button>
</form>

@endsection