@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $category->name }}</h1>
        <p>{{ $category->description }}</p>

        <h3>Books in this Category:</h3>

        @if($category->books->isEmpty())
            <p>No books available in this category.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Summary</th>
                        <th>PDF</th>
                        <th>Favourite</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category->books as $book)
                        <tr>
                            <td><strong>{{ $book->title }}</strong></td>
                            <td>{{ $book->author }}</td>

                            <!-- Show Summary -->
                            <td>
                                <button class="btn btn-info btn-sm" onclick="toggleSummary('{{ $book->id }}')">Show Summary</button>
                                <p id="summary-{{ $book->id }}" class="book-summary" style="display:none;">
                                    {{ $book->summary }}
                                </p>
                            </td>

                            <!-- Show PDF -->
                            <td>
                                <button class="btn btn-success btn-sm" onclick="togglePdf('{{ $book->id }}')">Show PDF</button>
                                <p id="pdf-{{ $book->id }}" class="book-pdf" style="display:none;">
                                    @if($book->pdf_link)
                                        <a href="{{ $book->pdf_link }}" target="_blank">Click here to open the PDF</a>
                                    @else
                                        No PDF available for this book.
                                    @endif
                                </p>
                            </td>

                            <!-- Favourite Button -->
                            <td>
                                @auth
                                    @if(Auth::user()->favourites->contains($book->id))
                                        <form action="{{ route('favourites.remove', $book->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Remove from Favourites</button>
                                        </form>
                                    @else
                                        <form action="{{ route('favourites.add', $book->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-warning btn-sm">Add to Favourites</button>
                                        </form>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login to Favourite</a>
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <script>
        function toggleSummary(bookId) {
            var summaryElement = document.getElementById('summary-' + bookId);
            summaryElement.style.display = (summaryElement.style.display === 'none') ? 'block' : 'none';
        }

        function togglePdf(bookId) {
            var pdfElement = document.getElementById('pdf-' + bookId);
            pdfElement.style.display = (pdfElement.style.display === 'none') ? 'block' : 'none';
        }
    </script>
@endsection
