@extends('management.layouts.master')
@section('categories', 'active-sidebar-link')
@section('page_name', 'Categories')

@section('body-content')
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Categories Management</h1>
            <button class="bg-black text-white text-primary-foreground inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-primary/90 h-9 rounded-md px-3"
            data-te-toggle="modal" data-te-target="#addModal">
                Add
            </button>
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
                                Name
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Description
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Is featured?
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="[&amp;_tr:last-child]:border-0">
                        @foreach ($categories as $i => $category)
                        <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"> {{ ++$i }} </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"> {{$category->name}} </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"> {{$category->description}} </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                @if ($category->is_featured == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                <div class="flex items-center gap-2">
                                    <button class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3"
                                    id="edit-btn" data-id="{{ $category->id }}" data-name="{{ $category->name }}" data-description="{{ $category->description }}" data-te-toggle="modal" data-te-target="#editModal">
                                        Edit
                                    </button>
                                    <button class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3"
                                    id="delete-btn" data-delete-id="{{ $category->id }}" data-te-toggle="modal" data-te-target="#deleteModal" color="red">
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
        id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
            <div
                class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark">
                <div
                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 p-4 dark:border-white/10">
                    <h5 class="text-xl font-medium leading-normal text-surface dark:text-white" id="exampleModalLabel">
                        Add Category
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
                    <form id="add-form" action="/management/categories" method="POST">
                        @csrf
                        <div class="my-1">
                            <label for="add-name"> Name </label>
                            <input type="text" id="add-name" name="name" class="border-4 rounded ">
                        </div>
                        <div class="my-1">
                            <label for="add-description"> Description </label>
                            <input type="text" id="add-description" name="description" class="border-4 rounded ">
                        </div>
                        <div class="bg-white mb-0 w-[30%] my-1 text-sm inline-block" data-te-select-wrapper-ref>
                            <select data-te-select-init data-te-select-placeholder="Is Featured" data-te-select-filter="true"
                            name="is_featured">
                                <option value="1"> Yes </option>
                                <option value="0"> No </option>
                            </select>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div
                    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 p-4 dark:border-white/10">
                    <button type="button"
                        class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-200 focus:bg-primary-accent-200 focus:outline-none focus:ring-0 active:bg-primary-accent-200 dark:bg-primary-300 dark:hover:bg-primary-400 dark:focus:bg-primary-400 dark:active:bg-primary-400"
                        data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                        Cancel
                    </button>
                    <button type="button"
                        class="ms-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                        data-te-ripple-init data-te-ripple-color="light" id="confirm-add-btn">
                        Create
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div data-te-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
            <div
                class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark">
                <div
                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 p-4 dark:border-white/10">
                    <h5 class="text-xl font-medium leading-normal text-surface dark:text-white" id="exampleModalLabel">
                        Edit Category
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
                    <form id="edit-form" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit-id" name="id">
                        <div>
                            <label for="edit-name"> Name </label>
                            <input type="text" id="edit-name" name="name" class="border-4 rounded ">
                        </div>
                        <div>
                            <label for="edit-description"> Description </label>
                            <input type="text" id="edit-description" name="description" class="border-4 rounded ">
                        </div>
                        <div class="bg-white mb-0 w-[30%] mt-4 text-sm inline-block" data-te-select-wrapper-ref>
                            <select data-te-select-init data-te-select-placeholder="Is Featured" data-te-select-filter="true"
                            name="is_featured">
                                <option value="1"> Yes </option>
                                <option value="0"> No </option>
                            </select>
                        </div>
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
                        class="ms-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                        data-te-ripple-init data-te-ripple-color="light" id="confirm-edit-btn">
                        Save changes
                    </button>
                </div>
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
                        Delete Category
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
        var editId = null;
        var editName = null;
        var editDescription = null;
        var deleteId = null;

        $(document).ready(function() {
            $(document).on("click", "#edit-btn", function() {
                editId = $(this).data("id");
                editName = $(this).data("name");
                editDescription = $(this).data("description");
                $("#edit-name").val(editName);
                $("#edit-id").val(editId);
                $("#edit-description").val(editDescription);
            });

            $(document).on("click", "#confirm-edit-btn", function() {
                $("#edit-form").attr("action", `/management/categories/${editId}`);
                $("#edit-form").submit();
            });

            $(document).on("click", "#confirm-add-btn", function() {
                $("#add-form").submit();
            });

            $(document).on("click", "#delete-btn", function() {
                deleteId = $(this).data("delete-id");
                $("#delete-id").val(deleteId);
            });

            $(document).on("click", "#confirm-delete-btn", function() {
                $("#delete-form").attr("action", `/management/categories/${deleteId}`);
                $("#delete-form").submit();
            });
        });
    </script>
@endsection
