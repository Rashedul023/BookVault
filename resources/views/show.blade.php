@extends('layouts.app')

@section('content')
    <h1>{{ $category->name }}</h1>
    <p>{{ $category->description }}</p>

    <h3>Books in this Category:</h3>
    @if($category->books->isEmpty())
        <p>No books available in this category.</p>
    @else
        <ul>
            @foreach($category->books as $book)
                <li>
                    <strong>{{ $book->title }}</strong> by {{ $book->author }}

                    <!-- Button to toggle the book summary -->
                    <button class="btn btn-info btn-sm" onclick="toggleSummary('{{ $book->id }}')">Show Summary</button>

                    <!-- Book summary (hidden by default) -->
                    <p id="summary-{{ $book->id }}" class="book-summary" style="display:none;">
                        {{ $book->summary }}
                    </p>

                    <button class="btn btn-warning btn-sm">Add to Favourite List</button>
                    @if($book->pdf_link)
                        <button class="btn btn-success btn-sm" onclick="togglePdf('{{ $book->id }}')">Show PDF</button>

                        
                        <p id="pdf-{{ $book->id }}" class="book-pdf" style="display:none;">
                            <a href="{{ $book->pdf_link }}" target="_blank">Click here to open the PDF</a>
                        </p>
                    @else
                        <p>No PDF available for this book.</p>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif

    <script>
        // JavaScript function to toggle the visibility of the book summary
        function toggleSummary(bookId) {
            var summaryElement = document.getElementById('summary-' + bookId);
            if (summaryElement.style.display === 'none') {
                summaryElement.style.display = 'block';
            } else {
                summaryElement.style.display = 'none';
            }
        }

        // JavaScript function to toggle the visibility of the book PDF
        function togglePdf(bookId) {
            var pdfElement = document.getElementById('pdf-' + bookId);
            if (pdfElement.style.display === 'none') {
                pdfElement.style.display = 'block';
            } else {
                pdfElement.style.display = 'none';
            }
        }
    </script>
@endsection
