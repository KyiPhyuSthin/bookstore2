@extends('website.layouts.master')

@section('body-content')
    <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto py-4 px-4" id="app">
        <div>
            <img src=" {{ $book->front_cover_url }} " alt="Book Cover" width="400" height="600" class="rounded-lg shadow-lg"
                style="aspect-ratio:400/600;object-fit:cover" />
        </div>
        <div class="space-y-6">
            <div class="space-y-2">
                <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                    @foreach ($book->genres as $genre)
                        <span class="bg-gray-100 dark:bg-gray-800 px-2 py-1 rounded-md"> {{ $genre->name }} </span>
                    @endforeach
                </div>
                <h1 class="text-3xl font-bold"> {{ $book->title }} </h1>
                <p class="text-gray-500 dark:text-gray-400">by {{ $book->author }} </p>
            </div>
            <div class="space-y-4">
                <div class="flex items-center gap-2 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-4 w-4 text-gray-500 dark:text-gray-400">
                        <path d="M8 2v4"></path>
                        <path d="M16 2v4"></path>
                        <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                        <path d="M3 10h18"></path>
                    </svg>
                    <span class="text-gray-500 dark:text-gray-400">Published:
                        {{ date_create($book->created_at)->format('M d, Y') }} </span>
                </div>
                <div class="flex items-center gap-2 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-4 w-4 text-gray-500 dark:text-gray-400">
                        <path
                            d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z">
                        </path>
                        <circle cx="7.5" cy="7.5" r=".5" fill="currentColor"></circle>
                    </svg>
                    <span class="text-gray-500 dark:text-gray-400">Category: {{ $book->category->name }} </span>
                </div>
                <div class="flex items-center gap-2 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-4 w-4 text-gray-500 dark:text-gray-400">
                        <path
                            d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z">
                        </path>
                        <circle cx="7.5" cy="7.5" r=".5" fill="currentColor"></circle>
                    </svg>
                    <span class="text-gray-500 dark:text-gray-400">Subcategory: {{ $book->subCategory->name }} </span>
                </div>
                <div class="flex items-center gap-2 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-4 w-4 text-yellow-500">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                        </polygon>
                    </svg>
                    <span class="text-gray-500 dark:text-gray-400">Rating: {{ $book->rating }}/5</span>
                </div>
                <div class="flex items-center gap-2 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="h-4 w-4">
                        <g fill="none" fill-rule="evenodd" stroke="#4A4A4A">
                            <rect width="17" height="17" x="4.5" y="4.5" rx="2"></rect>
                            <path stroke-linecap="round" d="M3 19V5a2 2 0 0 1 2-2h14"></path>
                            <path d="M10.064 10.347c0-.71.206-1.283.619-1.719.413-.435 1.031-.718 1.857-.848V7h1.92v.78c.84.12
                            1.47.398 1.89.833.419.436.629 1.013.629 1.734v.33h-2.22v-.435c0-.38-.103-.648-.31-.803-.206-.155-.494-.233-.864-.233s-.658.078-.864.233c-.206.155-.31.423-.31.803
                            0 .36.114.67.342.93.228.26.512.503.854.728.341.225.708.445 1.099.66a8.05 8.05 0 0 1 1.099.728c.341.27.626.583.854.938.227.356.341.783.341 1.284
                            0 .72-.213 1.3-.64 1.74-.427.44-1.06.72-1.9.841v.765h-1.92v-.765c-.854-.12-1.49-.4-1.91-.84-.42-.44-.63-1.021-.63-1.741v-.72h2.22v.825c0
                            .38.11.645.33.795.22.15.516.225.886.225s.665-.075.886-.225c.22-.15.33-.415.33-.795 0-.36-.113-.67-.341-.93a4.186 4.186
                            0 0 0-.854-.729 16.012 16.012 0 0 0-1.099-.66 7.908 7.908 0 0 1-1.099-.728 3.818 3.818 0 0 1-.854-.938c-.227-.355-.341-.783-.341-1.283z">
                            </path>
                        </g>
                    </svg>
                    <span class="text-gray-500 dark:text-gray-400">Price: {{ number_format($book->price, 2) }} Ks</span>
                </div>
                @if ($book->is_featured == 1)
                    <div class="flex items-center gap-2 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="h-4 w-4 text-yellow-500 dark:text-gray-400">
                            <circle cx="12" cy="8" r="6"></circle>
                            <path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"></path>
                        </svg>
                        <span class="text-gray-500 dark:text-gray-400">Featured Book</span>
                    </div>
                @endif

            </div>
            <div class="space-y-4">
                <h2 class="text-xl font-bold">About the Book</h2>
                <p class="text-gray-500 dark:text-gray-400">
                    {{ $book->description }}
                </p>
            </div>
            <div class="flex gap-4">
                <button
                    class="inline-flex items-center justify-center whitespace-nowrap text-sm text-white font-medium ring-offset-background
                    transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2
                    disabled:pointer-events-none disabled:opacity-50 bg-black text-primary-foreground hover:bg-primary/90 h-11
                    rounded-md px-8"
                    data-twe-toggle="modal" data-twe-target="#addToCartModal" data-twe-ripple-init
                    data-twe-ripple-color="light" @click="addToCartBtnClicked({{$book}})" >
                    Add to Cart
                </button>

                <button
                    class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-11 rounded-md px-8">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="h-4 w-4 mr-2">
                        <path
                            d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z">
                        </path>
                    </svg>
                    Add to Wishlist
                </button>
            </div>
        </div>

        <!-- Add to cart modal -->
        <div data-twe-modal-init
            class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
            id="addToCartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div data-twe-modal-dialog-ref
                class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                <div
                    class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark">
                    <div
                        class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 p-4 dark:border-white/10">
                        <h5 class="text-xl font-medium leading-normal text-surface dark:text-white" id="exampleModalLabel">
                            Add to cart
                        </h5>
                        <button type="button"
                            class="box-content rounded-none border-none text-neutral-500 hover:text-neutral-800 hover:no-underline focus:text-neutral-800 focus:opacity-100 focus:shadow-none focus:outline-none dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-neutral-300"
                            data-twe-modal-dismiss aria-label="Close">
                            <span class="[&>svg]:h-6 [&>svg]:w-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="relative flex-auto p-4" data-twe-modal-body-ref>
                        {{-- Modal body text goes here. --}}
                        <div class="w-1/2">
                            <label for="quantity" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Quantity
                            </label>
                            <input id="quantity" placeholder="Qty" type="number" v-model="quantity"
                            class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"/>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div
                        class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 p-4 dark:border-white/10">
                        <button type="button"
                            class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-200 focus:bg-primary-accent-200 focus:outline-none focus:ring-0 active:bg-primary-accent-200 dark:bg-primary-300 dark:hover:bg-primary-400 dark:focus:bg-primary-400 dark:active:bg-primary-400"
                            data-twe-modal-dismiss data-twe-ripple-init data-twe-ripple-color="light">
                            Cancel
                        </button>
                        <button type="button"
                            class="ms-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                            data-twe-modal-dismiss data-twe-ripple-init data-twe-ripple-color="light"
                            @click="confirmAddToCartBtnClicked">
                            Confirm
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script_index')
    <script>
        const app = Vue.createApp({
            data() {
                return {
                    book: null,
                    quantity: 0,
                    price: 0,
                    totalPrice: 0,
                };
            },

            methods: {
                addToCartBtnClicked(book){
                    this.book = {
                        id: book.id,
                        title: book.title,
                        author: book.author,
                        front_cover_url: book.front_cover_url,
                        price: book.price,
                        quantity: 0,
                        total_price: 0,
                    };
                },

                confirmAddToCartBtnClicked(){
                    this.book.quantity = this.quantity;
                    this.book.total_price = this.book.price * this.book.quantity;
                    if(saveObjectInObjectsArrayToLocalStorage('books', this.book)){
                        alert(`Book added to cart`);
                    }
                },
            },

            mounted() {

            }
        });

        app.mount('#app');
    </script>
@endsection
