@extends("manage.Dashboard")

@section("page")

    <div class="column is-9">


        @if(\Illuminate\Support\Facades\Session::has("message"))

            <article class="message is-success" id="message">
                <div class="message-header">
                    <p>Success</p>
                    <button class="delete" aria-label="delete" onclick="document.getElementById('message').style.display='none';"></button>
                </div>
                <div class="message-body">
                    {{ \Illuminate\Support\Facades\Session::get("message") }}
                </div>
            </article>
            <br>

        @endif

    <section class="hero is-info welcome is-small">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Hello, {{ isSuper() ? "Super Admin" : "User" }}
                    </h1>
                    <h2 class="subtitle">
                        Share your idea with others
                    </h2>
                </div>
            </div>
        </section>

       <form method="post" action="{{ route('Status.store') }}">
           @csrf
        <article class="media media-status">
            <figure class="media-left">
                <p class="image">
                    <img class="is-rounded" style="width:64px;height:64px;" src="{{ substr(user()->image,0,5) === 'https' ? user()->image : asset('storage').'/avatars/'.user()->image }}">
                </p>
            </figure>
            <div class="media-content">
                <div class="field">
                    <p class="control">
                        <textarea class="textarea" name="content" placeholder="Add a comment..."></textarea>
                    </p>
                </div>
                <nav class="level">
                    <button type="submit" class="button is-fullwidth">Submit</button>
                </nav>
            </div>
        </article>
       </form>

        <hr>

       <!-- Status -->

        @foreach($Status as $results)

        <article class="media">

            <figure class="media-left">
                <p class="image">
                    <img class="is-rounded" style="width:64px;height:64px;" src="{{ substr($results->user['image'],0,5) === 'https' ? $results->user['image'] : asset('storage').'/avatars/'.$results->user['image'] }}">
                </p>
            </figure>
            <div class="media-content">
                <div class="content">
                    <p>
                        <strong>{{ $results->user['name'] }}</strong> <small>{{ '@'.$results->user['name'] }}</small> <small>{{ diffForHumans($results->updated_at) }}</small>
                        <br>
                        {{ $results['content'] }}
                    </p>
                </div>
            </div>

        </article>

        @endforeach

        <br><br>

        {{ $Status->links()  }}

        <!-- End Status -->

        <br>

    </div>

@endsection