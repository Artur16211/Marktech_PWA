@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')

    <script>
        window.location.href = '{{ route('myaccount.orders.show', $viewData['order']->hashid()) }}';
    </script>
@endsection
