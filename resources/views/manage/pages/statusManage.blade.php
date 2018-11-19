@extends("manage.Dashboard")


@section("page")

    <div class="column is-9">
        <section class="hero is-info welcome is-small">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Manage Post
                    </h1>
                    <h2 class="subtitle">
                        The Manage Post screen lets you add, change and delete posts.
                    </h2>
                </div>
            </div>
        </section>

        <table class="table">
            <thead>
            <tr>
                <th><abbr title="Position">ID</abbr></th>
                <th>Content</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>


            @foreach($StatusAuth as $key => $results)

                <tr>
                    <th>{{ $results['id'] }}</th>
                    <td>{{ isSlice($results['content']) }}</td>
                    <td>

                        <div class="field has-addons">

                            <p class="control">
                                <a class="button" onclick="document.getElementById('modal-edit').style.display = 'block' ">
                                    Edit
                                </a>
                            </p>

                            @can("delete",$results)

                                <form method="post" class="user_delete" action="{{ route("Status.destroy",["id"=>$results->id]) }}">

                                    @csrf

                                    {{ method_field("DELETE") }}

                                    <p class="control">
                                        <a class="button is-danger" onclick='document.querySelectorAll(".user_delete")["{{ $key }}"].submit()'>
                                            Delete
                                        </a>
                                    </p>

                                </form>

                            @endcan

                        </div>

                    </td>
                </tr>

            @endforeach

            </tbody>

        </table>


        @if($StatusAuth->count()===0)

            <article class="message is-danger">
                <div class="message-header">
                    <p>Sorry !! </p>
                </div>
                <div class="message-body">
                    No posts were found <strong>Create your first post <a href="{{ route('Status.index') }}">Here</a></strong></div>
            </article>

        @endif

        <br>

        <!-- edit post -->

        <div class="modal" id="modal-edit">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Modal title</p>
                    <button class="delete" aria-label="close" onclick="document.getElementById('modal-edit').style.display = 'none' "></button>
                </header>
                <section class="modal-card-body">
                    <!-- Content ... -->
                    <input class="input" type="text" placeholder="Full Name ">

                    <input class="input" type="email" placeholder="Email">

                    <div class="notification is-info">
                        <button class="delete"></button>
                        Primar lorem ipsum dolor sit amet, consectetur
                        adipiscing elit lorem ipsum dolor. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Sit amet,
                        consectetur adipiscing elit
                    </div>

                </section>

                <footer class="modal-card-foot">
                    <button class="button is-success">Save changes</button>
                </footer>
            </div>
        </div>

        <!-- -->

    </div>

@endsection