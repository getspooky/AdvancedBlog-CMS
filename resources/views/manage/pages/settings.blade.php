@extends("manage.Dashboard")


@section("page")

    <div class="column is-9">
        <section class="hero is-info welcome is-small">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        General Account Settings
                    </h1>
                    <h2 class="subtitle">
                        I hope you are having a great day!
                    </h2>
                </div>
            </div>
        </section>
        <br>
        <form method="post" action="{{ route('Users.update',['id'=>rand(0,100000)]) }}">
            {{ method_field('PUT') }}
            @csrf
        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" type="text" name="name" value="{{ \Illuminate\Support\Facades\Auth::user()->name }}">
            </div>
            @if($errors->has('name'))
            <p class="help is-danger">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input class="input" type="email" disabled name="email"  value="{{ \Illuminate\Support\Facades\Auth::user()->email }}">
            </div>
            @if($errors->has('email'))
            <p class="help is-danger">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <div class="field">
            <label class="label">Password</label>
            <div class="control">
                <input class="input" type="password" name="password" value="{{ old('password') }}" placeholder="**************">
            </div>
            @if($errors->has('password'))
            <p class="help is-danger">{{ $errors->first('password') }}</p>
            @endif
        </div>

            <div class="field">
                <label class="label">Password</label>
                <div class="control">
                    <input class="input" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="**************">
                </div>
                @if($errors->has('password_confirmation'))
                    <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
                @endif
            </div>

        <div class="field">
            <div class="control">
                <button class="button is-medium is-fullwidth" style="margin-top:22px;">Submit</button>
            </div>
        </div>

        <br>

        </form>

    </div>

@endsection