@extends("manage.Dashboard")


@section("page")

    <div class="column is-9">
        <section class="hero is-info welcome is-small">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Manage Notification
                    </h1>
                    <h2 class="subtitle">
                        The Manage Notification screen lets you delete notification.
                    </h2>
                </div>
            </div>
        </section>

        <table class="table">
            <thead>
            <tr>
                <th><abbr title="Position">ID</abbr></th>
                <th>Full Name</th>
                <th>Notification</th>
                <th>Published at</th>
            </tr>
            </thead>
            <tbody>

            @foreach($notification as $key => $results)

                <tr>
                    <th>{{ $key }}</th>
                    <th>{{ $results->data['User'] }}</th>
                    <td>{{ $results->data['message'] }}
                    </td>
                    <td>{{ $results->created_at }}</td>
                    <td>
                    </td>
                </tr>

               {{ $results->markAsRead() }}


            @endforeach

            </tbody>

        </table>

        @if(count($notification)==0)

        <article class="message is-danger">
            <div class="message-header">
                <p>Sorry !! </p>
            </div>
            <div class="message-body">
               Notification Box is Empty
            </div>
        </article>

        @endif

        <br>


    </div>

@endsection