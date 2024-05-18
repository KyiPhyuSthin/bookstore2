@extends('website.layouts.master')

@section('body-content')
    <div>
        <section class="mb-12">
            <h2 class="text-2xl font-bold mb-4">Featured Books</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 ml-4">
                @foreach ($featuredBooks as $featuredBook)
                    <div class="bg-white rounded-md shadow-md overflow-hidden w-[240px] flex flex-col">
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
        </section>

        <section class="mb-12">
            <h2 class="text-2xl font-bold mb-4">Categories</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($featuredCategories as $featuredCategory)
                    <a class="bg-white rounded-md shadow-md p-6 flex flex-col items-center justify-center hover:bg-gray-200 transition-colors"
                        href="/categories/{{ $featuredCategory->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="h-12 w-12 mb-4">
                            <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"></path>
                        </svg>
                        <h3 class="text-lg font-medium"> {{ $featuredCategory->name }} </h3>
                    </a>
                @endforeach
            </div>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-4">New Arrivals</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 ml-4">
                @foreach ($newArrivalBooks as $newArrivalBook)
                    <div class="bg-white rounded-md shadow-md overflow-hidden w-[240px] flex flex-col">
                        <img src="{{ $newArrivalBook->front_cover_url }}" alt="Book Cover" width="100" height="150"
                            class="w-full h-[250px] object-cover" style="aspect-ratio: 100 / 150; object-fit: cover;" />
                        <div class="p-4 flex flex-col flex-grow">
                            <h3 class="text-lg font-medium mb-2 flex-grow"> {{ $newArrivalBook->title }} </h3>
                            <p class="text-gray-500 mb-2"> {{ $newArrivalBook->author }} </p>
                            <p class="font-bold text-lg"> {{ number_format($newArrivalBook->price) }} Ks</p>
                            <a class="inline-flex items-center justify-center whitespace-nowrap rounded-md
                            text-sm text-white font-medium ring-offset-background transition-colors focus-visible:outline-none
                            focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2
                            disabled:pointer-events-none disabled:opacity-50 bg-black text-primary-foreground
                            hover:bg-primary/90 h-10 px-4 py-2 mt-4"
                                href="/books/{{ $newArrivalBook->id }}">
                                See Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
