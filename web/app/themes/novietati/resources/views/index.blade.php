@extends('layouts.app')

@section('content')
@include('partials.page-header')
@include('partials.custom-content.loop')
@include('partials.post.loop')
@endsection