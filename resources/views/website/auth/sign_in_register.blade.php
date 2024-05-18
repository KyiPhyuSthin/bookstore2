@extends('website.layouts.master')

@section('body-content')
    <div class="container mx-auto px-4 py-8" id="app">
        <div class="w-10/12 lg:w-2/6 mx-auto">
            <!--Tabs navigation-->
            <ul class="mb-5 flex list-none flex-row flex-wrap justify-center border-b-0 pl-0" role="tablist"
                data-twe-nav-ref>
                <li role="presentation">
                    <a href="#tabs-sign-in"
                        class="my-2 block text-medium px-7 pb-3.5 pt-4 text-black font-medium hover:isolate focus:isolate data-[twe-nav-active]:text-black "
                        data-twe-toggle="tab" data-twe-target="#tabs-sign-in" data-twe-nav-active role="tab"
                        aria-controls="tabs-sign-in" aria-selected="true">Sign In</a>
                </li>
                <li role="presentation">
                    <a href="#tabs-register"
                        class="my-2 block text-medium px-7 pb-3.5 pt-4 text-black font-medium hover:isolate  focus:isolate data-[twe-nav-active]:text-black "
                        data-twe-toggle="tab" data-twe-target="#tabs-register" role="tab" aria-controls="tabs-register"
                        aria-selected="false">Register</a>
                </li>
            </ul>

        <div class="mb-6">
            <div class="hidden space-y-6 opacity-100 transition-opacity duration-150 ease-linear data-[twe-tab-active]:block"
            id="tabs-sign-in" role="tabpanel" aria-labelledby="tabs-sign-in-tab" data-twe-tab-active>
                <div class="space-y-2">
                    <h2 class="text-2xl font-bold md:text-3xl">Sign In</h2>
                    <p class="text-gray-500 dark:text-gray-400">Enter your email and password to access your account.</p>
                </div>
                <form action="{{ route("website.sign_in") }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="space-y-2">
                        <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="email">
                            Email
                        </label>
                        <input
                            class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            type="email" name="email" id="email" placeholder="Sign in email" required="" />
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

            <div class="hidden space-y-6 opacity-100 transition-opacity duration-150 ease-linear data-[twe-tab-active]:block"
            id="tabs-register" role="tabpanel" aria-labelledby="tabs-sign-in-tab">
                <div class="space-y-2">
                    <h2 class="text-2xl font-bold md:text-3xl">Register</h2>
                    <p class="text-gray-500 dark:text-gray-400">Create a new account to access the bookstore.</p>
                </div>
                <form action="{{ route("website.register") }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="state" id="state">
                    <input type="hidden" name="city" id="city">
                    <input type="hidden" name="is_remote" id="is-remote">
                    <div class="space-y-2">
                        <label
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="name">
                            Name
                        </label>
                        <input
                            class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            id="name" name="name" placeholder="Enter name" required="" />
                    </div>
                    <div class="space-y-2">
                        <label
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="register-email">
                            Email
                        </label>
                        <input
                            class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            type="email" name="email" id="register-email" placeholder="Enter email" required="" />
                    </div>
                    <div class="space-y-2">
                        <label
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="password">
                            Password
                        </label>
                        <input
                            class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            type="password" name="password" id="register-password" placeholder="Enter password" required="" />
                    </div>

                    <div class="space-y-2">
                        <label
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="address-name">
                            Address Name
                        </label>
                        <select name="address_name"
                        class="flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                            <option value="Home"> Home </option>
                            <option value="Home 2"> Home 2 </option>
                            <option value="School"> School </option>
                            <option value="Work"> Work </option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="address">
                            Address
                        </label>
                        <textarea placeholder="Address" id="address" rows="4" name="address" required=""
                            class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"></textarea>
                    </div>

                    <div class="space-y-2">
                        <label
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="phone">
                            Phone Number
                        </label>
                        <input
                            class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            type="tel" name="address_phone" id="phone" placeholder="Contact ph: number" required="" />
                    </div>

                    <div class="space-y-2">
                        <label
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="zip">
                            Zip Code
                        </label>
                        <input
                            class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            type="text" name="zip_code" id="zip" placeholder="Zip code" />
                    </div>

                    <div class="space-y-2">
                        <label
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="state">
                            State
                        </label>
                        <select v-model="selectedRegion"
                        class="flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        @change="regionSelectChanged">
                            <option selected disabled> Select state </option>
                            <option v-for="(region, regionIndex) in regions" :value="region"> @{{ region.name }} </option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="city">
                            City
                        </label>
                        <select v-model="selectedCity"
                        class="flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        @change="citySelectChanged">
                            <option selected disabled> Select city </option>
                            <option v-for="(city, cityIndex) in cities" :value="city"> @{{ city.name }} </option>
                        </select>
                    </div>

                    <button type="submit"
                    class="bg-black text-white h-10 px-4 py-2 w-full inline-flex items-center justify-center
                    whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none
                    focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none
                    disabled:opacity-50 hover:bg-primary/90 ">
                        Register
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script_index')
    <script>
        const app = Vue.createApp({
            data() {
                return {
                    regions: [],
                    selectedRegion: null,
                    cities: [],
                    selectedCity: null,
                    isRemote: 1,
                };
            },

            methods: {
                async getRegionList(){
                    let response = await getApiData({url: `/api/mmrc/regions`});
                    if(response.data){
                        this.regions = response.data;
                    }
                },

                async regionSelectChanged(){
                    $("#state").val(this.selectedRegion.name);
                    console.log(this.selectedRegion.name);
                    let response = await getApiData({url: `/api/mmrc/regions/${this.selectedRegion.id}`});
                    if(response.data){
                        this.cities = response.data.cities;
                    }
                },

                citySelectChanged(){
                    $("#city").val(this.selectedCity.name);

                    if(this.selectedCity.name == "Mandalay"){
                        this.isRemote = 0;
                    }
                    else{
                        this.isRemote = 1;
                    }

                    $("#is-remote").val(this.isRemote);
                },
            },

            created(){
                this.getRegionList();
            },

            mounted() {

            }
        });

        app.mount('#app');
    </script>
@endsection
