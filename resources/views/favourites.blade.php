@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>My Favourite Books</h1>

        @if($favourites->isEmpty())
            <p>You have no favourite books yet.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Summary</th>
                        <th>PDF</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($favourites as $book)
                        <tr>
                            <td><strong>{{ $book->title }}</strong></td>
                            <td>{{ $book->author }}</td>

                            <td>
                                <button class="btn btn-info btn-sm" onclick="toggleSummary('{{ $book->id }}')">Show Summary</button>
                                <p id="summary-{{ $book->id }}" class="book-summary" style="display:none;">
                                    {{ $book->summary }}
                                </p>
                            </td>

                            <td>
                                @if($book->pdf_link)
                                    <a href="{{ $book->pdf_link }}" target="_blank" class="btn btn-success btn-sm">Open PDF</a>
                                @else
                                    No PDF available.
                                @endif
                            </td>

                            
                            <td>
                                <form action="{{ route('favourites.remove', $book->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
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
    </script>
@endsection
