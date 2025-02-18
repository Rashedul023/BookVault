<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        
        $categories = Category::all();

        
        return view('home', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::with('books')->findOrFail($id);
        return view('show', compact('category'));
    }
}
