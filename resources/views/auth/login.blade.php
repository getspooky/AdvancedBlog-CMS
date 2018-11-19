@extends('layouts.app')

@section('content')

    <section class="hero is-success is-fullheight">

        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Login</h3>
                    <p class="subtitle has-text-grey">Please login to proceed.</p>
                    <div class="box">
                        <figure class="avatar">
                            <img class="is-margin is-128x128" src="https://discordapp.com/assets/dd4dbc0016779df1378e7812eabaa04d.png">
                        </figure>
                        <form method="post" action="{{ route('login') }}">
                            @csrf
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
                                <label class="checkbox">
                                    <input type="checkbox">
                                    Remember me
                                </label>
                            </div>
                            <button type="submit" class="button is-block is-info is-large is-fullwidth">Login</button>

                            <hr>

                            <a href="{{ route('fb') }}" class="fb btn">
                                <i class="fa fa-facebook fa-fw"></i> Login with Facebook
                            </a>

                        </form>
                    </div>
                    <p class="has-text-grey">
                        <a href="{{ route('register') }}">Sign Up</a> &nbsp;·&nbsp;
                        <a href="{{ route('password.request') }}">Forgot Password</a> &nbsp;·&nbsp;
                        <a href="../">Need Help?</a>
                    </p>
                </div>
            </div>
        </div>


    </section>

@endsection
