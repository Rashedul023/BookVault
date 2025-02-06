<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function addToFavourites($bookId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to add favourites.');
        }

        $user = Auth::user();
        $book = Book::findOrFail($bookId);

        if (!$user->favourites()->where('book_id', $bookId)->exists()) {
            $user->favourites()->attach($book);
        }

        return back()->with('success', 'Book added to favourites!');
    }

    public function removeFromFavourites($bookId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to remove favourites.');
        }

        $user = Auth::user();
        $book = Book::findOrFail($bookId);

        $user->favourites()->detach($book);

        return back()->with('success', 'Book removed from favourites!');
    }

    public function showFavourites()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to view your favourites.');
        }

        $user = Auth::user();
        $favourites = $user->favourites;

        return view('favourites', compact('favourites'));
    }


}
