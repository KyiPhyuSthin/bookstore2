<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Book;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Genre;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = Book::with(['category', 'subCategory'])->get();

        return view('management.books.index', compact(['books']));
    }

    public function create()
    {
        $categories = Category::with('subCategories')->get();
        $subCategories = SubCategory::all();
        $genres = Genre::all();

        return view('management.books.create', compact(['categories', 'subCategories', 'genres']));
    }

    public function store(Request $request)
    {
        $data = $request->except(['genre_ids', 'front_cover_image', 'back_cover_image']);
        if($request->hasFile('front_cover_image')){
            $file = $request->file('front_cover_image');
            $file_path = $file->store('books', 'public');
            $file_url = Storage::url($file_path);
            $data['front_cover_url'] = $file_url;
        }
        if($request->hasFile('back_cover_image')){
            $file = $request->file('back_cover_image');
            $file_path = $file->store('books', 'public');
            $file_url = Storage::url($file_path);
            $data['back_cover_url'] = $file_url;
        }

        $book = Book::create($data);
        $book->genres()->sync($request->genre_ids);

        return redirect()->route('management.books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('management.books.index')
                         ->with('success', 'Book deleted successfully.');
    }
}
