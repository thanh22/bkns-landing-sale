@extends('admins.app')
@section('content')
<!-- 404 Error Text -->
<div class="text-center">
    <div class="error mx-auto" data-text="404">404</div>
    <p class="lead text-gray-800 mb-5">{{ $item }} Not Found</p>
    <a href="{{ route('admin-index') }}">&larr; Back to Dashboard</a>
</div>
@endsection