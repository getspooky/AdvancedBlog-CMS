@extends("manage.Dashboard")


@section("page")

    <div class="column is-9">
        <section class="hero is-info welcome is-small">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        API(Application programming interface)
                    </h1>
                    <h2 class="subtitle">
                        API using <a href="https://jwt.io/">JSON Web Tokens</a>
                    </h2>
                </div>
            </div>
        </section>

        <div class="tile is-ancestor">
            <div class="tile is-full-fullhd">
                <div class="tile is-child box">
                    <p class="title">Quick Start</p>
                    <p>
                        To identify/authenticate people in your (web/mobile) app, put a standards-based token in the header or url of the page (or API endpoint) which proves the user has logged in and is allowed to access the desired content
                    </p>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>URL</th>
                <th>METHOD</th>
                <th>Authentication</th>
            </tr>
            </thead>
            <tbody>


                <tr  class="is-selected">
                    <td>{{ route('APIArticle.index') }}</td>
                    <th>GET</th>
                    <th>NO</th>
                </tr>

                <tr>
                    <td>{{ route('APIArticle.show',['id'=>1]) }}</td>
                    <th>GET</th>
                    <th>NO</th>
                </tr>

                <tr>
                    <td>{{ route('APIArticle.store') }}</td>
                    <th>POST</th>
                    <th>YES</th>
                </tr>

                <tr>
                    <td>{{ route('APIArticle.update',['id'=>1]) }}</td>
                    <th>PUT|PATCH</th>
                    <th>YES</th>
                </tr>

                <tr>
                    <td>{{ route('APIArticle.destroy',['id'=>1]) }}</td>
                    <th>DELETE</th>
                    <th>YES</th>
                </tr>

            </tbody>

        </table>

        <table class="table">
            <thead>
            <tr>
                <th>URL</th>
                <th>DESC</th>
            </tr>
            </thead>
            <tbody>


            <tr>
                <td>{{ route('APIArticle.index') }}</td>
                <th>Display a listing of the resource</th>
            </tr>

            <tr>
                <td>{{ route('APIArticle.show',['id'=>1]) }}</td>
                <th> Display the specified resource</th>
            </tr>

            <tr>
                <td>{{ route('APIArticle.store') }}</td>
                <th>Store a newly created resource in storage</th>
            </tr>

            <tr  class="is-selected">
                <td>{{ route('APIArticle.update',['id'=>1]) }}</td>
                <th>Update the specified resource in storage</th>
            </tr>

            <tr>
                <td>{{ route('APIArticle.destroy',['id'=>1]) }}</td>
                <th>Remove the specified resource from storage</th>
            </tr>

            </tbody>

        </table>

        <br>


    </div>

@endsection