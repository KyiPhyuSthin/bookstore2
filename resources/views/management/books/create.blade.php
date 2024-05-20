@extends('management.layouts.master')
@section('books', 'active-sidebar-link')
@section('page_name', 'Books')

@section('body-content')
    <div class="container mx-auto px-4" id="app">
        <h1 class="text-3xl font-bold mb-6">Add New Book</h1>
        <form id="create-form" class="grid grid-cols-1 md:grid-cols-2 gap-6" enctype="multipart/form-data" action="{{ route("management.books.store") }}" method="POST">
            @csrf
            <input type="hidden" name="category_id" id="category-id">
            <div class="grid gap-4">
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                        Book Category
                    </label>
                    <select aria-hidden="true" tabindex="-1" id="category"
                    class="flex h-10 w-96 items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                        <option selected disabled >Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category}}"> {{$category->name}} </option>
                            @endforeach
                    </select>
                </div>

                <div>
                    <label for="sub_category" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                        Book Sub Category
                    </label>
                    <select aria-hidden="true" tabindex="-1" id="sub_category"
                    class="flex h-10 w-96 items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                    name="sub_category_id">

                    </select>
                </div>

                <div>
                    <label for="genres" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                        Book Genres
                    </label>
                    <select aria-hidden="true" tabindex="-1" id="genres" v-model="selectedGenre"
                    class="flex h-10 w-96 items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm
                    ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring
                    focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" @change="genreSelectChanged" >
                        @foreach ($genres as $genre)
                            <option value="{{$genre}}"> {{$genre->name}} </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <div class="flex flex-wrap h-36 w-3/4 px-2 items-center gap-2 text-sm border text-gray-500 dark:text-gray-400">
                        <span class="bg-gray-100 dark:bg-gray-800 px-2 py-1 rounded-md" v-for="(genre) in selectedGenres" > @{{ genre.name }} </span>
                        <input type="hidden" name="genre_ids[]" v-if="selectedGenres.length > 0" v-for="(genre) in selectedGenres" :value="genre.id">
                    </div>
                </div>

                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                        Is featured book?
                    </label>
                    <div class="bg-white mb-0 w-full h-12 text-sm inline-block" data-te-select-wrapper-ref>
                        <select data-te-select-init data-te-select-placeholder="Is featured or not" aria-hidden="true" tabindex="-1"
                        class="flex h-10 w-96 items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        name="is_featured">
                            <option value="1"> Yes </option>
                            <option value="0" selected> No </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="grid gap-4">
                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                        Title
                    </label>
                    <input id="title" placeholder="Enter book title" type="text" name="title"
                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"/>
                </div>

                <div>
                    <label for="author" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                        Author
                    </label>
                    <input id="author" placeholder="Enter author name" type="text" name="author"
                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"/>
                </div>

                <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                        Description
                    </label>
                    <textarea id="description" rows="4" placeholder="Enter book description" name="description"
                    class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"></textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            Price
                        </label>
                        <input id="price" min="0" placeholder="Enter book price" type="number" name="price"
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"/>
                    </div>

                    <div>
                        <label for="ratings" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            Ratings
                        </label>
                        <input id="ratings" min="0" max="5" placeholder="Enter book ratings" type="number" name="rating"
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"/>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="front-cover" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            Front Cover
                        </label>
                        <input type="file" accept="image/png, image/gif, image/jpeg" name="front_cover_image" id="front-cover"
                        class="flex flex-col items-center justify-center h-12 w-full bg-gray-100 rounded-md border-2 border-gray-300
                        border-dashed transition-colors hover:bg-gray-200 dark:bg-gray-800 dark:border-gray-600 dark:hover:bg-gray-700"/>
                    </div>

                    <div>
                        <label for="back-cover" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            Back Cover
                        </label>
                        <input type="file" accept="image/png, image/gif, image/jpeg" name="back_cover_image" id="back-cover"
                        class="flex flex-col items-center justify-center h-12 w-full bg-gray-100 rounded-md border-2 border-gray-300
                        border-dashed transition-colors hover:bg-gray-200 dark:bg-gray-800 dark:border-gray-600 dark:hover:bg-gray-700"/>
                    </div>
                </div>
            </div>
        </form>
        <div class="mt-6 flex justify-end">
            <button id="save-btn" class="h-10 bg-black hover:bg-black-600 text-white text-sm inline-flex items-center justify-center whitespace-nowrap ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 font-medium py-2 px-4 rounded">
                Save Book
            </button>
        </div>
    </div>
@endsection

@section("script_index")
    <script>
        var selectedCategory = null;
        var subCategories = [];
        $(document).ready(function(){
            $("#save-btn").click(function(){
                $("#create-form").submit();
            });

            $("#category").on("change",function(){
                // alert(`category select changed`);
                console.log($("#category").val());
                selectedCategory = JSON.parse($("#category").val());
                $("#category-id").val(selectedCategory.id);
                subCategories = selectedCategory.sub_categories;
                console.log(subCategories);
                console.log(selectedCategory.id);
                $("#sub_category").empty();
                subCategories.forEach(subCategory => {
                    let optionHTML = `<option value=${subCategory.id}> ${subCategory.name} </option>`;
                    $("#sub_category").append(optionHTML)
                });
            });
        });

        const app = Vue.createApp({
            data() {
                return {
                    selectedGenre: null,
                    selectedGenres: [],
                };
            },

            methods: {
                genreSelectChanged(){
                    this.selectedGenre = JSON.parse(this.selectedGenre);
                    if(this.selectedGenres.length < 1){
                        this.selectedGenres.push(this.selectedGenre);
                    }
                    else{
                        let index = this.selectedGenres.findIndex(genre => genre.id == this.selectedGenre.id);
                        if(index != -1){
                            this.selectedGenres.splice(index, 1);
                        }
                        else{
                            this.selectedGenres.push(this.selectedGenre);
                        }
                    }
                }
            },

            mounted() {

            }
        });

        app.mount('#app');
    </script>
@endsection
