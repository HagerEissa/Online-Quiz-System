@extends('layouts.app')
@section('content') 
<link rel="stylesheet" href="{{ asset('css/QuizList.css') }}">

<style>
    .category-image {
        width: 100%; /* Full width of the card */
        height: 200px; /* Fixed height */
        object-fit: cover; /* Ensures the image scales without distortion */
    }
</style>

<div class="row" style="position: relative; top: 100px; color: black !important;">
    <!-- Side Navigation -->
    <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar" style="position: relative; top:-30px;">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#" data-category="all">All Categories</a>
            </li>
            @foreach ($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" href="#" data-category="{{ $category->name }}">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <h1 class="h2">Available Categories</h1>
        <div id="quizList" class="row">
            <!-- Quiz Items -->
            <div class="container">
                <div class="row">
                    @php
                        $categoryImages = [
                            'front end' => 'Assets/Images/front.jpg',
                            'Mobile app' => 'Assets/Images/mobile.jpg',
                            'Artificial intellgence' => 'Assets/Images/ai.jpg',
                            'back end' => 'Assets/Images/back.jpg',
                            // Add more category-specific images here
                        ];
                    @endphp

                    @foreach ($categories as $category)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4 category-item" data-category="{{ $category->name }}">
                            <div class="card h-100 shadow-sm">
                                <img class="category-image" src="{{ asset($categoryImages[$category->name] ?? 'Assets/Images/j1.jpg') }}" alt="{{ $category->name }}" style="width:300px;height:200px">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $category->name }}</h5>
                                    <p class="card-text">{{ $category->description }}</p>
                                    <button onclick="window.location.href='{{ route('quizof.category', $category->id) }}'" class="btn btn-primary">View Quizzes</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const categoryLinks = document.querySelectorAll('#sidebar .nav-link');
        const categoryItems = document.querySelectorAll('.category-item');

        categoryLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();

                // Update active class for clicked link
                categoryLinks.forEach(link => link.classList.remove('active'));
                link.classList.add('active');

                const selectedCategory = link.getAttribute('data-category');

                // Filter items by selected category
                categoryItems.forEach(item => {
                    const itemCategory = item.getAttribute('data-category');
                    if (selectedCategory === 'all' || itemCategory === selectedCategory) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
</script>

<script src="{{ asset('js/QuizList.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
