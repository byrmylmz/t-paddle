<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form action="#" method="post" id="payment-form" data-secret="#">
                        @csrf
                        <div class="w-1/2 form-row">
                            <label for="cardholder-name">Cardholder's Name</label>
                            <div>
                                <input type="text" id="cardholder-name" class="px-2 py-2 border">
                            </div>

                            <div class="mt-4">
                                <input type="radio" name="plan" id="standard" value="price_1HmXIkHcC5z5MAw3pfNKs65q" checked>
                                <label for="standard">Standard - $10 / month</label> <br>

                                <input type="radio" name="plan" id="premium" value="price_1HmXIkHcC5z5MAw3DZfIg9IZ">
                                <label for="premium">Premium - $20 / month</label>
                            </div>
                            <label for="card-element">
                                Credit or debit card
                            </label>
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>

                        <x-jet-button class="mt-4">
                            Subscribe Now
                        </x-jet-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
