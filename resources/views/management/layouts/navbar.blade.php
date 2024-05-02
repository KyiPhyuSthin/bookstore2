<header class="flex h-14 lg:h-[60px] items-center gap-4 border-b bg-gray-100/40 px-6 dark:bg-gray-800/40">
    <a class="lg:hidden" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="h-6 w-6">
            <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"></path>
        </svg>
        <span class="sr-only">Home</span>
    </a>
    <div class="flex-1">
        <h1 class="font-semibold text-lg"> @yield('page_name') </h1>
    </div>
    <button
        class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground rounded-full border border-gray-200 w-8 h-8 dark:border-gray-800"
        type="button" id="radix-:r6:" aria-haspopup="menu" aria-expanded="false" data-state="closed">
        <img src="/placeholder.svg" width="32" height="32" class="rounded-full" alt="Avatar"
            style="aspect-ratio: 32 / 32; object-fit: cover;" />
        <span class="sr-only">Toggle user menu</span>
    </button>
</header>
