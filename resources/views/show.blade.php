@extends('layouts.app')

@section('content')
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
                        
                        <!-- Show Summary Button -->
                        <td>
                            <button class="btn btn-info btn-sm" onclick="toggleSummary('{{ $book->id }}')">Show Summary</button>
                            <p id="summary-{{ $book->id }}" class="book-summary" style="display:none;">
                                {{ $book->summary }}
                            </p>
                        </td>

                     
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

                    
                        <td>
                            <button class="btn btn-warning btn-sm">Add to Favourite List</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

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
