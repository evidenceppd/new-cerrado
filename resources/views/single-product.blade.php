@extends('layouts.master')

@section('title')
    {{ $product->name }} | {{ env('APP_NAME') }}
@endsection

@section('seo')
    <meta name="title" content="{{ $product->name }} | {{ env('APP_NAME') }}" />
    <meta name="description" content="{{ $product->description }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="{{ $product->name }} | {{ env('APP_NAME') }}" />
    <meta property="og:description" content="{{ $product->description }}" />
    <meta property="og:image" content="{{ asset($product->main_image) }}" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ url()->current() }}" />
    <meta property="twitter:title" content="{{ $product->name }} | {{ env('APP_NAME') }}" />
    <meta property="twitter:description" content="{{ $product->description }}" />
    <meta property="twitter:image" content="{{ asset($product->main_image) }}" />
@endsection

@section('css')
@endsection

@section('content')
{{-- Conteúdo da página de produtos --}}
@endsection

@section('js')
@endsection
