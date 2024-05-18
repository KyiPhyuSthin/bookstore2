<header class="bg-black text-white py-4 px-6 md:px-12 flex items-center justify-between">
    <div class="flex items-center">
        <a class="text-2xl font-bold" href="/">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="h-8 w-8 mr-2">
                <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"></path>
            </svg>
            Bookworm
        </a>
    </div>
    <div class="flex items-center">
        <div class="relative mr-4">
            <input
                class="flex h-10 w-full border border-input text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 bg-gray-800 bg-opacity-50 border-none py-2 px-4 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-white"
                placeholder="Search books..." type="text" />
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="absolute right-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.3-4.3"></path>
            </svg>
        </div>
        <nav aria-label="Main" data-orientation="horizontal" dir="ltr"
            class="relative z-10 flex max-w-max flex-1 items-center justify-center">
            <div style="position: relative;">
                <ul data-orientation="horizontal"
                    class="group flex flex-1 list-none items-center justify-center space-x-1" dir="ltr">
                    <li>
                        <a href="#" data-radix-collection-item="">
                            Home
                        </a>
                    </li>
                    <li>
                        <button id="radix-:r1v:-trigger-radix-:r21:" data-state="closed" aria-expanded="false"
                            aria-controls="radix-:r1v:-content-radix-:r21:"
                            class="group inline-flex h-9 w-max items-center justify-center rounded-md bg-background px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground focus:outline-none disabled:pointer-events-none disabled:opacity-50 data-[active]:bg-accent/50 data-[state=open]:bg-accent/50 group"
                            data-radix-collection-item="">
                            Categories
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                class="relative top-[1px] ml-1 h-3 w-3 transition duration-300 group-data-[state=open]:rotate-180">
                                <path
                                    d="M3.13523 6.15803C3.3241 5.95657 3.64052 5.94637 3.84197 6.13523L7.5 9.56464L11.158 6.13523C11.3595 5.94637 11.6759 5.95657 11.8648 6.15803C12.0536 6.35949 12.0434 6.67591 11.842 6.86477L7.84197 10.6148C7.64964 10.7951 7.35036 10.7951 7.15803 10.6148L3.15803 6.86477C2.95657 6.67591 2.94637 6.35949 3.13523 6.15803Z"
                                    fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </li>
                    <li>
                        <a href="#" data-radix-collection-item="">
                            About
                        </a>
                    </li>
                    <li>
                        <a href="#" data-radix-collection-item="">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
            <div class="absolute left-0 top-full flex justify-center"></div>
        </nav>
        <a href="{{ route('website.cart') }}"
            class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground rounded-full border border-gray-700 w-8 h-8"
            type="button" id="radix-:r24:" aria-haspopup="menu" aria-expanded="false" data-state="closed">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                <circle cx="8" cy="21" r="1"></circle>
                <circle cx="19" cy="21" r="1"></circle>
                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
            </svg>
            <span class="sr-only">Toggle cart</span>
        </a>
    </div>
</header>
