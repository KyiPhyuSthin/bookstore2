<?php

namespace App\Http\Controllers\WEBSITE;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Book;
use App\Models\SubCategory;

class PagesController extends Controller
{
    //
    public function index()
    {
        $featuredBooks = Book::where("is_featured", 1)->orderBy("id", "desc")->take(4)->get();
        $featuredCategories = Category::where("is_featured", 1)->orderBy("id", "desc")->get();
        $newArrivalBooks = Book::orderBy("id", "desc")->take(4)->get();
        return view("website.home", compact(["featuredBooks", "featuredCategories", "newArrivalBooks"]));
    }

    public function categoryDetail(Category $category)
    {
        $category = Category::with("subCategories.books")->find($category->id);
        $categories = Category::all();
        $subCategories = SubCategory::where("category_id", $category->id)->with("books")->get();
        // dd($category->subCategories);

        return view("website.book_list", compact(["category", "categories", "subCategories"]));
    }

    public function bookDetail(Book $book)
    {
        $book = Book::with(["category", "subCategory", "genres"])->find($book->id);

        return view("website.book_detail", compact("book"));
    }

    public function cart()
    {
        return view("website.cart");
    }
}
