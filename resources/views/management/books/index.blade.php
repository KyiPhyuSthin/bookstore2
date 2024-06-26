@extends('management.layouts.master')
@section('books', 'active-sidebar-link')
@section('page_name', 'Books')

@section('body-content')
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Books Management</h1>
            <a class="bg-black text-white text-primary-foreground inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-primary/90 h-9 rounded-md px-3"
            href="{{ route("management.books.create") }}">
                Add
            </a>
        </div>
        <div class="overflow-x-auto">
            <div class="relative w-full overflow-auto">
                <table class="w-full caption-bottom text-sm">
                    <thead class="[&amp;_tr]:border-b">
                        <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                #
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Title
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Category
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Sub Category
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Is Featured?
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Author
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Price
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Front Cover
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="[&amp;_tr:last-child]:border-0">
                        @foreach ($books as $i => $book)
                        <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"> {{ ++$i }} </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"> {{$book->title}} </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"> {{$book->category->name}} </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"> {{$book->subCategory->name}} </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                @if ($book->is_featured == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"> {{$book->author}} </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"> {{$book->price}} </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                <span class="relative flex shrink-0 overflow-hidden rounded-md h-12 w-12">
                                    <img src="{{$book->front_cover_url}}" alt="Front Cover">
                                </span>
                            </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                <div class="flex items-center gap-2">
                                    <a class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3"
                                    href="/management/books/{{$book->id}}/edit">
                                        Edit
                                    </a>
                                    <button class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3"
                                    id="delete-btn" data-delete-id="{{ $book->id }}" data-te-toggle="modal" data-te-target="#deleteModal" color="red">
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div data-te-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
            <div
                class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark">
                <div
                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 p-4 dark:border-white/10">
                    <h5 class="text-xl font-medium leading-normal text-surface dark:text-white" id="exampleModalLabel">
                        Delete Book
                    </h5>
                    <button type="button"
                        class="box-content rounded-none border-none text-neutral-500 hover:text-neutral-800 hover:no-underline focus:text-neutral-800 focus:opacity-100 focus:shadow-none focus:outline-none dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-neutral-300"
                        data-te-modal-dismiss aria-label="Close">
                        <span class="[&>svg]:h-6 [&>svg]:w-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="relative flex-auto p-4" data-te-modal-body-ref>
                    This action cannot be undone, are you sure?
                    <form id="delete-form" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>

                <!-- Modal footer -->
                <div
                    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 p-4 dark:border-white/10">
                    <button type="button"
                        class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-200 focus:bg-primary-accent-200 focus:outline-none focus:ring-0 active:bg-primary-accent-200 dark:bg-primary-300 dark:hover:bg-primary-400 dark:focus:bg-primary-400 dark:active:bg-primary-400"
                        data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                        Close
                    </button>
                    <button type="button"
                        class="ms-1 inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                        data-te-ripple-init data-te-ripple-color="light" id="confirm-delete-btn">
                        Confirm Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script_index')
    <script>
        var deleteId = null;
        $(document).ready(function() {
            $(document).on("click", "#delete-btn", function() {
                deleteId = $(this).data("delete-id");
                $("#delete-id").val(deleteId);
            });

            $(document).on("click", "#confirm-delete-btn", function() {
                $("#delete-form").attr("action", `/management/books/${deleteId}`);
                $("#delete-form").submit();
            });
        });
    </script>
@endsection
