@extends('website.layouts.master')

@section('body-content')
    <div class="container mx-auto" id="app">
        <div class="gap-16 mx-auto flex">
            <div class="w-8/12 px-16 pt-4 rounded-lg shadow-lg bg-white dark:bg-gray-950">
                <div class="grid gap-4">
                    <h1 class="text-3xl font-bold">Your Cart</h1>
                    <p class="text-gray-500 dark:text-gray-400">Review the items in your cart and proceed to checkout.</p>
                </div>
                <div class="grid gap-4">
                    <div class="grid gap-4 border-b pb-4" v-for="(book, index) in books" :key="index" >
                        <div class="grid grid-cols-[100px_1fr_100px] items-center gap-4">
                            <img :src="book.front_cover_url" alt="Book Cover" width="100" height="150"
                                class="rounded-md object-cover" style="aspect-ratio: 100 / 150; object-fit: cover;" />
                            <div class="grid gap-1">
                                <h3 class="font-medium"> @{{book.title}} </h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400"> @{{book.author}} </p>
                            </div>
                            <div class="flex items-center gap-2">
                                <button
                                    class="inline-flex items-center justify-center whitespace-nowrap rounded-md
                                    text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none
                                    focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2
                                    disabled:pointer-events-none disabled:opacity-50 border border-input bg-background
                                    hover:bg-accent hover:text-accent-foreground h-10 w-10"
                                    @click="decreaseBookQtyBtnClicked(index)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                                        <path d="M5 12h14"></path>
                                    </svg>
                                </button>
                                <span> @{{book.quantity}} </span>
                                <button
                                    class="inline-flex items-center justify-center whitespace-nowrap rounded-md
                                    text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none
                                    focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2
                                    disabled:pointer-events-none disabled:opacity-50 border border-input bg-background
                                    hover:bg-accent hover:text-accent-foreground h-10 w-10"
                                    @click="increaseBookQtyBtnClicked(index)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5v14"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-gray-500 dark:text-gray-400">Book price total</p>
                            <p class="font-medium"> @{{ (book.total_price).toLocaleString() }} Ks</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-200 w-4/12 rounded-lg shadow-lg p-6 dark:bg-gray-950">
                <div class="grid gap-2">
                    <h2 class="text-2xl font-bold">Order Summary</h2>
                    <div class="flex items-center justify-between">
                        <p class="text-gray-500 dark:text-gray-400">Order Items</p>
                        <p class="font-medium"> @{{ books.length }} </p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-gray-500 dark:text-gray-400">Sub total</p>
                        <p class="font-medium"> @{{ (totalPrice).toLocaleString() }} Ks</p>
                    </div>
                </div>
                <div data-orientation="horizontal" role="none" class="shrink-0 bg-gray-100 h-[1px] w-full"></div>
                <div class="grid gap-2 mt-16">
                    <a class="bg-black text-white inline-flex items-center justify-center
                    whitespace-nowrap text-sm font-medium ring-offset-background transition-colors
                    focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring
                    focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50
                    hover:bg-primary/90 h-11 rounded-md px-8"
                    href="{{ route("website.checkout") }}">
                        Proceed to Checkout
                    </a>
                    <button class="bg-gray-100 text-black inline-flex items-center justify-center
                    whitespace-nowrap text-sm font-medium ring-offset-background transition-colors
                    focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring
                    focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50
                    border border-input bg-background hover:bg-accent hover:text-accent-foreground
                    h-11 rounded-md px-8" @click="continueShoppingBtnClicked()" >
                        Continue Shopping
                    </button>
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
                    books: [],
                    totalPrice: 0,
                };
            },

            methods: {
                updateTotalPrice(books){
                    this.totalPrice = 0;
                    books.forEach((book)=>{
                        this.totalPrice += book.total_price;
                    });
                },

                increaseBookQtyBtnClicked(bookIndex){
                    this.books[bookIndex].quantity = +this.books[bookIndex].quantity + 1;
                    this.books[bookIndex].total_price = this.books[bookIndex].price * this.books[bookIndex].quantity;
                    this.updateTotalPrice(this.books);
                    saveObjectInObjectsArrayToLocalStorage('books', this.books[bookIndex]);
                },

                decreaseBookQtyBtnClicked(bookIndex){
                    this.books[bookIndex].quantity = this.books[bookIndex].quantity - 1;
                    if(this.books[bookIndex].quantity < 1){
                        deleteObjectInObjectsArrayFromLocalStorage('books', this.books[bookIndex]);
                        this.books.splice(bookIndex, 1);
                    }
                    else{
                        this.books[bookIndex].total_price = this.books[bookIndex].price * this.books[bookIndex].quantity;
                    }

                    this.updateTotalPrice(this.books);
                    saveObjectInObjectsArrayToLocalStorage('books', this.books[bookIndex]);
                },

                continueShoppingBtnClicked(){
                    window.history.go(-2);
                },
            },

            created(){
                this.books = JSON.parse(getStorage('books'));
                if(!this.books || this.books.length < 1){
                    window.location.replace("/");
                }
                this.updateTotalPrice(this.books);
            },

            mounted() {

            }
        });

        app.mount('#app');
    </script>
@endsection
