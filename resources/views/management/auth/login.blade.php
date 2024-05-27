<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <title> Book Store Admin Panel </title>
    @vite('resources/js/management/app.js')

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/vue.global.js') }}"></script>
</head>

<body>
    <div class="grid min-h-screen w-1/2">
        {{-- @include("management.layouts.sidebar") --}}

        <div class="flex flex-col">
            {{-- @include("management.layouts.navbar") --}}

            <main class="flex-1 grid gap-8 p-6 md:p-8">
                <div class="space-y-6 opacity-100 transition-opacity duration-150 ease-linear"
                id="tabs-sign-in" role="tabpanel" aria-labelledby="tabs-sign-in-tab">
                    <div class="space-y-2">
                        <h2 class="text-2xl font-bold md:text-3xl">Admin Sign In</h2>
                        <p class="text-gray-500 dark:text-gray-400">Enter your username and password to access admin panel.</p>
                    </div>
                    <form action="{{ route("management.login") }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="space-y-2">
                            <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                for="username">
                                Username
                            </label>
                            <input
                                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                type="text" name="username" id="username" placeholder="Username" required="" />
                        </div>
                        <div class="space-y-2">
                            <label
                                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                for="password">
                                Password
                            </label>
                            <input
                                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                type="password" name="password" id="password" placeholder="Password" required="" />
                        </div>

                        <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                            <input
                              class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-primary dark:checked:bg-primary"
                              type="checkbox"
                              value="true"
                              name="remember"
                              id="checkboxDefault" />
                            <label
                              class="inline-block ps-[0.15rem] hover:cursor-pointer"
                              for="checkboxDefault">
                              Remember me
                            </label>
                        </div>

                        <button type="submit"
                        class="bg-black text-white h-10 px-4 py-2 w-full inline-flex items-center justify-center
                        whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none
                        focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none
                        disabled:opacity-50 hover:bg-primary/90 ">
                            Sign In
                        </button>
                        <div class="text-center text-sm">
                            <a class="underline underline-offset-2" href="#">
                                Forgot password?
                            </a>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>

@yield('script_index')

</html>
