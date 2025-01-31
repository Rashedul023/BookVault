
@extends('layouts.app')  <!-- Extend the layout file -->



@section('content')
    <div class="container">
        <h1 class="text-center mb-5">Welcome to Book Vault</h1>

        <!-- Categories Section -->
        <div class="row">
            <h3 class="col-12 text-center mb-4">Categories</h3>
            @foreach($categories as $category)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/category-placeholder.jpg') }}" class="card-img-top" alt="{{ $category->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <p class="card-text">{{ $category->description }}</p>
                            <a href="{{ route('category.show', $category->id) }}" class="btn btn-primary">View Books</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection