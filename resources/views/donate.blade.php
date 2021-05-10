@extends('layouts.app')

@section('additional_styles')
    <style type="text/css">

    </style>
@endsection

@section('additional_scripts')
    <script src="https://www.paypal.com/sdk/js?client-id=AV87dtYjY38pNsyjab_VfwKcEYM-B0UT5jqREW2rfMdYfhdMN6oG5jLoViSpLvoxKBi_YtVcvcp__l_3"></script>
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                // This function sets up the details of the transaction, including the amount and line item details.
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: updateAmount()
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {
                payPalComplete(data);

                // This function captures the funds from the transaction.
                return actions.order.capture().then(function(details) {
                    // This function shows a transaction success message to your buyer.
                    // alert('Transaction completed by ' + details.payer.name.given_name);
                });
            }
        }).render('#paypal-button-container');
        // This function displays Smart Payment Buttons on your web page.
    </script>
@endsection

@section('content')

    {{--Add Jumbotron--}}
    @section('jumbotron_title', 'Donations')
    @include('content_parts.jumbotron')

    <div class="container">
        <div class="row" id="">
            <div class="my-4 col-12" id="">
                <h1 class="h1 h1-responsive text-center coolText3">Donate</h1>
            </div>

            <div class="col-12" id="">
                <p>If you would like to support the Vizion It First Non-Profit Organiztion and our mission to give teens hope and a more promising and brighter future,
                    empower them and teach them to strive for something more, please use the donation form below. Thank you!</p>
            </div>
        </div>

        <div class="row" id="">
            <div class="col-12 py-4" id="">
                <form action="" class="" name="paypal_donation" id="paypal_donation">
                    <div class="form-row" id="">
                        <div class="col-8 md-form input-group mb-3 mx-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text md-addon blue darken-3 white-text"><i class="fas fa-dollar-sign"></i></span>
                            </div>

                            <input type="number" id="total_price" class="form-control" name="donation" value="{{ old('amount') ? old('amount') : 25.00 }}" placeholder="Enter an Amount" step="0.01"/>
                        </div>
                    </div>

                    <div class="form-row" id="">
                        <div class="col-8 mx-auto" id="">
                            <div class="row" id="">
                                <button class='btn btn-sm col rounded amountBtn deep-orange white-text' type='button'>$25.00</button>
                                <button class='btn btn-sm col rounded amountBtn btn-outline-deep-orange' type='button'>$50.00</button>
                                <button class='btn btn-sm col rounded amountBtn btn-outline-deep-orange' type='button'>$100.00</button>
                                <button class='btn btn-sm col rounded amountBtn btn-outline-deep-orange' type='button'>Custom Amount</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-row" id="">
                        <div class="col-8 card p-4 my-4 mx-auto" id="">
                            <div class="card-header text-center" id="">
                                <h2 class="">Personal Information</h2>
                            </div>

                            <div class="card-body" id="">
                                <div class="form-row" id="">
                                    <div class="col-12 col-md-6" id="">
                                        <div class="md-form">
                                            <input type="text" name="first_name" id="first_name" class="form-control" required />
                                            <label for="first_name">First Name</label>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6" id="">
                                        <div class="md-form">
                                            <input type="text" name="last_name" id="last_name" class="form-control" required />
                                            <label for="last_name">Last Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row" id="">
                                    <div class="col-12" id="">
                                        <div class="md-form">
                                            <input type="text" name="company_name" id="last_name" class="form-control" required />
                                            <label for="company_name">Company Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row" id="">
                                    <div class="col-12" id="">
                                        <div class="md-form">
                                            <input type="email" name="email_address" id="email_address" class="form-control" required />
                                            <label for="email_address">Email Address</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container text-center mx-auto" id="paypal-button-container">
    </div>
@endsection