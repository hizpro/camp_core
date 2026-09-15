@extends('layouts.app')

@section('content')
    @include('components.hero')
    @include('components.about')
    @include('components.programs')
    @include('components.timeline')
    @include('components.requirements')
    @include('components.registration-form')
    @include('components.faq')
@endsection
