@extends('layouts.app')
@section('content')
<form action="{{ route('store') }}" method="POST">
    @csrf
    <div class="form-group">
    <div class="mb-3 form-group">
        <label for="id" class="form-label">Email address</label>
        <input type="text" class="form-control" id="id" placeholder="name@example.com" name="id">
    </div>
    <div class="mb-3 form-group">
        <label for="title" class="form-label">Email address</label>
        <input type="text" class="form-control" id="title" placeholder="name@example.com" name="title">
    </div>
    <div class="mb-3 form-group">
        <label for="content" class="form-label">Example textarea</label>
        <input class="form-control" id="content" name="content">
    </div>
    <div class="mb-3 form-group">
        <label for="id_user" class="form-label">Email address</label>
        <input type="text" class="form-control" id="id_user" placeholder="name@example.com" name="id_user">
    </div>
    <div>
        <input type="submit" class="btn btn-primary">
    </div>
    </div>
</form>
@endsection