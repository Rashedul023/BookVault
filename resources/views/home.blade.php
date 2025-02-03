@extends('layouts.app')  <!-- Extend the layout file -->

@section('content')
    <style>
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-md-4 {
            display: flex;
        }

        .card {
            width: 100%; /* Ensures all cards take full column width */
            height: 100%; /* Ensures uniform height */
            display: flex;
            flex-direction: column;
        }

        .card-img-top {
            width: 100%; /* Ensures image takes full width */
            height: 200px; /* Fixed height for uniformity */
            object-fit: cover; /* Prevents distortion */
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-grow: 1;
        }

        .card-text {
            flex-grow: 1;
        }
    </style>

    <div class="container">
        <h1 class="text-center mb-5">Welcome to Book Vault</h1>

        <!-- Categories Section -->
        <div class="row">
            <h3 class="col-12 text-center mb-4">Categories</h3>
            @foreach($categories as $category)
                <div class="col-md-4 mb-4 d-flex"> 
                    <div class="card">
                        <img src="{{ asset('images/' . $category->name . '.jpg') }}" class="card-img-top" alt="{{ $category->name }}">

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
