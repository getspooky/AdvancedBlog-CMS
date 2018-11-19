<template>

    <div>

        <div class="notification is-success" v-show="seen">
            <button class="delete" @click="hide"></button>
            {{ root.Session_stripe }}
        </div>


        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Payment
                </p>
                <a href="#" class="card-header-icon" aria-label="more options"><span class="icon">
                    <i class="fas fa-angle-down" aria-hidden="true"></i>
                 </span>
                </a>
            </header>
            <div class="card-content">
                <div class="content">

                    <form :action="root.Checkout" method="post" id="payment-form">

                        <input type="hidden" name="_token" id="csrf-token" :value="root.csrf_token" />

                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input class="input" name="email" type="email" id="email">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control">
                                <input class="input" name="name" type="text" id="name">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">address_line</label>
                            <div class="control">
                                <input class="input" name="adress_line" type="text" id="adress">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">City</label>
                            <div class="control">
                                <input class="input" name="city" id="city" type="text">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Province</label>
                            <div class="control">
                                <input class="input" name="province" id="province" type="text">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Code Postal</label>
                            <div class="control">
                                <input class="input" name="postal" type="number" id="code_postal">
                            </div>
                        </div>

                        <div class="form-row">
                            <label for="card-element">
                            </label><br>
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <br>

                        <button type="button" @click.prevent="stripeSubmit"  class="button is-fullwidth is-link">Submit Payment</button>

                    </form>


                </div>
            </div>

        </div>

        <br>


    </div>

</template>

<script>
    export default {
        name: "stripe",

        data() {

            return {

                root:window.laravel,

                // Create a Stripe client.
                stripe:Stripe('pk_test_GgQ08bLE6BA3POIJBx8v3Cjf'),

                elements:null,

                card:null,

                seen:false,

            }

        },

        methods:{

            stripeSubmit:function () {

                var _this = this

                this.stripe.createToken(this.card).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        _this.stripeTokenHandler(result.token);
                    }
                });

            },

            // Submit the form with the token ID.
            stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                form.submit();

             },

            hide(){

               this.seen = false

            }

        },


        mounted(){

            if(this.root.Session_stripe !== null){

                this.seen = true

            }

            // Create an instance of Elements.
            this.elements = this.stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)

            var style = {
                base: {
                    color: '#32325d',
                    lineHeight: '18px',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            this.card = this.elements.create('card', {style: style});

            // Add an instance of the card Element into the `card-element` <div>.
            this.card.mount('#card-element');


        }

    }


</script>

<style scoped>



</style>