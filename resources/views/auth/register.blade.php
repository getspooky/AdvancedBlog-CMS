@extends('layouts.app')

@section('content')

    <section class="hero is-success is-fullheight">


            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="column is-4 is-offset-4">
                        <h3 class="title has-text-grey">Sign Up</h3>
                        <p class="subtitle has-text-grey">Please Sign Up to proceed.</p>
                        <div class="box">

                            <form action="{{ route('register') }}" method="post">

                                @csrf

                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large {{ $errors->has('name') ? 'is-danger' : '' }} " name="name" type="text" placeholder="Your Full Name" autofocus="" value="{{ old('name') }}">
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large {{ $errors->has('email') ? 'is-danger' : '' }} " name="email" type="email" placeholder="Your Email" autofocus="" value="{{ old('email') }}">
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large {{ $errors->has('password') ? 'is-danger' : '' }}" name="password" type="password" placeholder="Your Password" value="{{ old('password') }}">
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large {{ $errors->has('password_confirmation') ? 'is-danger' : '' }}" name="password_confirmation" type="password" placeholder="Your Password" required>
                                    </div>
                                </div>

                                <button type="submit" class="button is-block is-info is-large is-fullwidth">Sign up</button>

                            </form>

                        </div>

                        <p class="has-text-grey">
                            <a href="{{ route('login') }}">Login</a> &nbsp;·&nbsp;
                            <a href="{{ route('password.request') }}">Forgot Password</a> &nbsp;·&nbsp;
                            <a href="../">Need Help?</a>
                        </p>
                    </div>
                </div>
            </div>


    </section>


@endsection
