@extends('website.layouts.master')

@section('body-content')
    <div class="container mx-auto px-4 md:px-6" id="app">
        <input type="hidden" value="{{ $user->addresses }}" id="user-addresses">
        <h1 class="text-3xl font-bold mb-8">Checkout</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-6">
                <div>
                    <h2 class="text-xl font-bold mb-4">Customer Information</h2>
                    <div class="grid gap-4">
                        <div class="grid gap-2">
                            <label
                                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                for="firstName">
                                Name
                            </label>
                            <input
                                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed"
                                id="firstName" value="{{ $user->name }}" />
                        </div>
                        <div class="grid gap-2">
                            <label
                                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                for="lastName">
                                Email
                            </label>
                            <input
                                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                id="lastName" value="{{ $user->email }}" />
                        </div>
                        <div class="grid gap-2">
                            <label
                                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                for="">
                                Choose Address
                            </label>
                            <select v-model="selectedAddress"
                            class="flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            @change="addressSelectChanged">
                                <option selected disabled> Select address </option>
                                <option v-for="(address, addressId) in userAddresses" :value="address" > @{{address.name}} </option>
                            </select>
                        </div>
                        <div class="grid gap-2">
                            <label
                                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                for="address2">
                                Address
                            </label>
                            <input v-model="address"
                                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                id="address2" placeholder="Address" />
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="grid gap-2">
                                <label
                                    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                    for="zip">
                                    Zip
                                </label>
                                <input v-model="zipCode"
                                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                    id="zip" placeholder="Zip Code" />
                            </div>
                            <div class="grid gap-2">
                                <label
                                    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                    for="phone">
                                    Phone Number
                                </label>
                                <input v-model="addressPhone"
                                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                    id="country" placeholder="Address phone number" />
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="grid gap-2">
                                <label
                                    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                    for="city">
                                    City
                                </label>
                                <input v-model="city"
                                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                    id="city" placeholder="City" />
                            </div>
                            <div class="grid gap-2">
                                <label
                                    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                    for="state">
                                    State
                                </label>
                                <input v-model="state"
                                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                    id="state" placeholder="State" />
                            </div>
                        </div>
                        <div class="grid gap-2">
                            <label
                                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                for="tr-id">
                                Transaction Id
                            </label>
                            <input v-model="transactionId"
                                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                id="tr-id" disabled placeholder="Transaction Id" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-200 dark:bg-gray-800 rounded-lg shadow-lg p-6 space-y-4">
                <h2 class="text-xl font-bold">Order Summary</h2>
                <div class="grid grid-cols-[1fr_100px] gap-4" v-for="(book, index) in books" :key="index">
                    <div>
                        <h3 class="font-semibold"> @{{ book.title }} </h3>
                        <p class="text-gray-500"> @{{ book.author }} </p>
                    </div>
                    <div class="text-right">
                        <p class="font-semibold"> @{{ (book.total_price).toLocaleString() }} Ks</p>
                        <p class="text-gray-500">Qty:  @{{ book.quantity }} </p>
                    </div>
                </div>


                <div data-orientation="horizontal" role="none" class="shrink-0 bg-gray-100 h-[1px] w-full"></div>
                <div class="flex justify-between">
                    <span>Subtotal</span>
                    <span>@{{ (totalPrice).toLocaleString() }} Ks</span>
                </div>
                <div class="flex justify-between">
                    <span>Shipping</span>
                    <span> @{{ (deliveryFee).toLocaleString() }} Ks </span>
                </div>
                <div class="flex justify-between">
                    <span>Tax</span>
                    <span> @{{ (tax).toLocaleString() }} Ks</span>
                </div>
                <div data-orientation="horizontal" role="none" class="shrink-0 bg-gray-100 h-[1px] w-full"></div>
                <div class="flex justify-between font-bold">
                    <span>Total</span>
                    <span> @{{ (total).toLocaleString() }} Ks </span>
                </div>
                <div class="grid gap-2">
                    <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                        <input
                          class="relative float-left -ms-[1.5rem] me-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-secondary-500 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] rtl:float-right dark:border-neutral-400 dark:checked:border-primary"
                          type="radio"
                          name="flexRadioDefault"
                          id="radioDefault01"
                          @input="onlinePaymentSelected" />
                        <label
                          class="mt-px inline-block ps-[0.15rem] hover:cursor-pointer"
                          for="radioDefault01">
                          Online Payment
                        </label>
                      </div>
                      <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                        <input
                          class="relative float-left -ms-[1.5rem] me-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-secondary-500 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] rtl:float-right dark:border-neutral-400 dark:checked:border-primary"
                          type="radio"
                          name="flexRadioDefault"
                          id="radioDefault02"
                          @input="cashOnDeliverySelected"
                          checked />
                        <label
                          class="mt-px inline-block ps-[0.15rem] hover:cursor-pointer"
                          for="radioDefault02">
                          Cash On Delivery
                        </label>
                      </div>
                </div>
                <button class="text-sm bg-black h-10 px-4 py-2 w-full text-white inline-flex items-center
                justify-center whitespace-nowrap rounded-md font-medium ring-offset-background transition-colors
                focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2
                disabled:pointer-events-none disabled:opacity-50 hover:bg-primary/90"
                @click="placeOrderBtnClicked">
                    Place Order
                </button>
            </div>
        </div>

        <form action="{{ route("website.order") }}" method="POST" id="order-form">
            @csrf
            <input type="hidden" name="user_address_id" id="user-address-id">
            <input type="hidden" name="is_remote" id="is-remote">
            <input type="hidden" name="payment_option" id="payment-option">
            <input type="hidden" name="transaction_id" id="transaction-id">
            <input type="hidden" name="sub_total" id="sub-total">
            <input type="hidden" name="delivery_fee" id="delivery-fee">
            <input type="hidden" name="tax" id="tax">
            <input type="hidden" name="total" id="total">
            <input type="hidden" name="quantity" id="quantity">
            <input type="hidden" name="order_items" id="order-items">
        </form>
    </div>
@endsection

@section('script_index')
    <script>
        const app = Vue.createApp({
            data() {
                return {
                    books: [],
                    totalPrice: 0,
                    deliveryFee: 0,
                    tax: 0,
                    total: 0,

                    userAddresses: [],
                    selectedAddress: null,

                    address: null,
                    state: null,
                    city: null,
                    zipCode: null,
                    addressPhone: null,
                    isRemote: 0,

                    paymentOption: "cash_on_delivery",
                    transactionId: null,
                };
            },

            methods: {
                updateTotalPrice(books){
                    this.totalPrice = 0;
                    books.forEach((book)=>{
                        this.totalPrice += book.total_price;
                    });
                    this.tax = (this.totalPrice + this.deliveryFee) * 0.05;
                    this.total = this.totalPrice + this.deliveryFee + this.tax;
                },

                addressSelectChanged(){
                    this.address = this.selectedAddress.address;
                    this.state = this.selectedAddress.state;
                    this.city = this.selectedAddress.city;
                    this.zipCode = this.selectedAddress.zip_code;
                    this.addressPhone = this.selectedAddress.phone;
                    if(this.selectedAddress.is_remote == 1){
                        this.isRemote = 1;
                        this.deliveryFee = 5000;
                    }
                    else{
                        this.isRemote = 0;
                        this.deliveryFee = 1200;
                    }
                    this.updateTotalPrice(this.books);
                },

                onlinePaymentSelected(){
                    this.paymentOption = "online_payment"
                    $('#tr-id').attr("disabled", false);
                    $('#tr-id').attr("required", false);
                },

                cashOnDeliverySelected(){
                    this.paymentOption = "cash_on_delivery"
                    $('#tr-id').attr("disabled", true);
                    $('#tr-id').attr("required", true);
                },

                placeOrderBtnClicked(){
                    if(!this.selectedAddress){
                        alert(`Choose an address`);
                        return 1;
                    }
                    if(this.paymentOption == 'online_payment' && !this.transactionId){
                        alert(`Enter transaction id`);
                        return 1;
                    }

                    $('#user-address-id').val(this.selectedAddress.id);
                    $('#is-remote').val(this.isRemote);
                    $('#payment-option').val(this.paymentOption);
                    $('#transaction-id').val(this.transactionId);
                    $('#sub-total').val(this.totalPrice);
                    $('#delivery-fee').val(this.deliveryFee);
                    $('#tax').val(this.tax);
                    $('#total').val(this.total);
                    $('#quantity').val(this.books.length);
                    $('#order-items').val(JSON.stringify(this.books));
                    $('#order-form').submit();

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
                this.userAddresses = JSON.parse($('#user-addresses').val());
            }
        });

        app.mount('#app');
    </script>
@endsection
