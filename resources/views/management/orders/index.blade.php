@extends('management.layouts.master')
@section('orders', 'active-sidebar-link')
@section('page_name', 'Orders')

@section('body-content')
    <div class="container mx-auto px-4" id="app">
        {{-- @foreach ($orders as $order) --}}
        <input type="hidden" id="order-container" value="{{ json_encode($orders->items()) }}">
        {{-- @endforeach --}}

        <div class="overflow-hidden">
            <div class="relative w-full overflow-hidden">
                <table class="w-full caption-bottom text-sm">
                    <thead class="[&amp;_tr]:border-b">
                        <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Order Id
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Datetime
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Customer
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Address
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Phone
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Sub Total
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Delivery Fee
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Tax
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Total
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Payment Option
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Transaction Id
                            </th>
                        </tr>
                    </thead>
                    <tbody class="[&amp;_tr:last-child]:border-0">
                        <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted"
                            v-for="(order, orderIndex) in orders" :key="orderIndex" @click="rowDetail(orderIndex)" data-twe-toggle="modal" data-twe-target="#orderDetailModal">
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                @{{ order.id }}
                            </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"> @{{ order.created_at }} </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"> @{{ order.user.name }} </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"> @{{ order.user_address.address }} </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"> @{{ order.user_address.phone }} </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"> @{{ order.sub_total }} </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"> @{{ order.delivery_fee }} </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"> @{{ order.tax }} </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"> @{{ order.total }} </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"> @{{ order.payment_option }} </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"> @{{ order.transaction_id }} </td>
                        </tr>
                    </tbody>
                </table>

                {{ $orders->links() }}
            </div>

            <!-- Order detail modal -->
            <div data-twe-modal-init
                class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                id="orderDetailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div data-twe-modal-dialog-ref
                    class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                    <div
                        class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark">
                        <div
                            class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 p-4 dark:border-white/10">
                            <h5 class="text-xl font-medium leading-normal text-surface dark:text-white"
                                id="exampleModalLabel">
                                Order Detail
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
                        <div class="relative flex-auto" data-twe-modal-body-ref>
                            <table class="w-full rounded-xl text-left my-2 text-sm font-light ">
                                <thead class="bg-gray-50 font-medium ">
                                    <tr>
                                        <th scope="col" class=" px-3 py-3 "> Title </th>
                                        <th scope="col" class=" px-3 py-3 "> Author </th>
                                        <th scope="col" class=" px-3 py-3 "> Price </th>
                                        <th scope="col" class=" px-3 py-3 "> Qty </th>
                                        <th scope="col" class=" px-3 py-3 "> Cost </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, itemIndex) in order.order_items" v-if="order">
                                        <td class="px-3 py-3"> @{{ item.book.title }} </td>
                                        <td class="px-3 py-3 "> @{{ item.book.author }} </td>
                                        <td class="px-3 py-3 "> @{{ item.price }} </td>
                                        <td class="px-3 py-3 "> @{{ item.quantity }} </td>
                                        <td class="px-3 py-3 "> @{{ item.total_price }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Modal footer -->
                        <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2
                        border-neutral-100 p-4 dark:border-white/10">
                            <button type="button" class="ms-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5
                            text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition
                            duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2
                            focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0
                            active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong
                            dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                            data-twe-modal-dismiss data-twe-ripple-init data-twe-ripple-color="light">
                                OK
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
                        orders: [],
                        order: null,
                    };
                },

                methods: {
                    rowDetail(orderIndex) {
                        this.order = this.orders[orderIndex];
                        console.log(this.order);
                    },
                },

                created() {

                },

                mounted() {
                    this.orders = JSON.parse($('#order-container').val());
                }
            });

            app.mount('#app');
        </script>
    @endsection
