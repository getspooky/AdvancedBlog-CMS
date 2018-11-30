@extends("manage.Dashboard")

@section("page")

    <div class="column is-three-quarters-desktop is-three-quarters-tablet">

        <section class="hero is-primary">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Stripe Checkout
                    </h1>

                    <p>Stripe Checkout Integration</p>

                </div>
            </div>
        </section>
        <br>

        <stripe></stripe>

    </div>


@endsection