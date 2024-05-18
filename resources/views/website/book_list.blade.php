@extends('website.layouts.master')

@section('body-content')
<div class="gap-8 mx-auto flex">
    <div class="bg-white w-3/9 px-16 pt-4 rounded-lg shadow-lg dark:bg-gray-950">
        <h2 class="text-xl font-bold mb-4 ">
            Categories
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-1 gap-4">
            <ul>
                @foreach ($categories as $category)
                <li class="mb-2 p-2">
                    <a class="text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-50"
                    href="/categories/{{$category->id}}">
                        {{ $category->name }}
                    </a>
                </li>
                @endforeach
            </ul>
      </div>
    </div>

    <div class="bg-white w-6/9 rounded-lg shadow-lg p-6 dark:bg-gray-950">
        @foreach ($subCategories as $subCategory)
            <div class="my-2">
                <h2 class="text-xl font-bold mb-2 mt-2"> {{ $subCategory->name }} </h2>
                <div class="ml-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach ($subCategory->books as $featuredBook)
                        <div class=" rounded-md shadow-md overflow-hidden w-[240px] flex flex-col">
                            <img src="{{ $featuredBook->front_cover_url }}" alt="Book Cover" width="100" height="150"
                                class="w-full h-[250px] object-cover" style="aspect-ratio: 100 / 150; object-fit: cover;" />
                            <div class="p-4 flex flex-col flex-grow">
                                <h3 class="text-lg font-medium mb-2 flex-grow"> {{ $featuredBook->title }} </h3>
                                <p class="text-gray-500 mb-2"> {{ $featuredBook->author }} </p>
                                <p class="font-bold text-lg"> {{ number_format($featuredBook->price) }} Ks</p>
                                <a class="inline-flex items-center justify-center whitespace-nowrap rounded-md
                                text-sm text-white font-medium ring-offset-background transition-colors focus-visible:outline-none
                                focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2
                                disabled:pointer-events-none disabled:opacity-50 bg-black text-primary-foreground
                                hover:bg-primary/90 h-10 px-4 py-2 mt-4"
                                href="/books/{{ $featuredBook->id }}">
                                    See Detail
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- @foreach ($subCategory->books as $book)
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden dark:bg-gray-900">
                            <a class="block" href="#">
                                <img
                                src="/placeholder.svg"
                                alt="Book Cover"
                                width="200"
                                height="300"
                                class="w-full h-[300px] object-cover"
                                style="aspect-ratio: 200 / 300; object-fit: cover;"
                                />
                                <div class="p-4">
                                <h3 class="text-lg font-bold mb-2"> {{$book->title}} </h3>
                                <p class="text-gray-600 dark:text-gray-400"> {{ $book->author }} </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="bg-white rounded-md shadow-md overflow-hidden w-[240px]">
                        <img src="/placeholder.svg" alt="Book Cover" width="100" height="150"
                            class="w-full h-[250px] object-cover" style="aspect-ratio: 100 / 150; object-fit: cover;" />
                        <div class="p-4 flex flex-col flex-grow">
                            <h3 class="text-lg font-medium mb-2 flex-grow"> Book title </h3>
                            <p class="text-gray-500 mb-2"> author </p>
                            <p class="font-bold text-lg"> Price Ks</p>
                            <a class="inline-flex items-center justify-center whitespace-nowrap rounded-md
                            text-sm text-white font-medium ring-offset-background transition-colors focus-visible:outline-none
                            focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2
                            disabled:pointer-events-none disabled:opacity-50 bg-black text-primary-foreground
                            hover:bg-primary/90 h-10 px-4 py-2 mt-4"
                            href="/books/1">
                                See Detail
                            </a>
                        </div>
                    </div>
                @endforeach --}}
            </div>
        @endforeach
    </div>
@endsection
