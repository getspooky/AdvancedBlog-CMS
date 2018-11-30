@extends("manage.Dashboard")

@section("page")

    <div class="column is-three-quarters-desktop is-three-quarters-tablet">
        <section class="hero is-info welcome is-small">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Hello, {{ isSuper() ? "Super Admin" : "User" }}
                    </h1>
                    <h2 class="subtitle">
                        I hope you are having a great day!
                    </h2>
                </div>
            </div>
        </section>
        <section class="info-tiles">
            <div class="tile is-ancestor has-text-centered">
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title">{{isUserCount()}}</p>
                        <p class="subtitle">Users</p>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title">59k</p>
                        <p class="subtitle">Products</p>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title">{{isPostCount()}}</p>
                        <p class="subtitle">Posts</p>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title">0</p>
                        <p class="subtitle">Exceptions</p>
                    </article>
                </div>
            </div>
        </section>
        <div class="columns">
            <div class="column is-6">
                <div class="card events-card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Status
                        </p>
                        <a href="#" class="card-header-icon" aria-label="more options">
                  <span class="icon">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </span>
                        </a>
                    </header>
                    <div class="card-table">
                        <div class="content">
                            <table class="table is-fullwidth is-striped">
                                <tbody>
                                @foreach($post as $post)
                                <tr>
                                    <td width="5%"><i class="fa fa-bell-o"></i></td>
                                    <td>{{ substr($post['content'],0,50).'...' }}</td>
                                    <td><a class="button is-small is-primary" href="#">New</a></td>
                                </tr>
                                 @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <footer class="card-footer">
                        <a href="{{ route('Status.index') }}" class="card-footer-item">View All</a>
                    </footer>
                </div>
            </div>
            <div class="column is-6">

                <div class="card events-card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Notifications
                        </p>
                        <a href="#" class="card-header-icon" aria-label="more options">
                  <span class="icon">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </span>
                        </a>
                    </header>
                    <div class="card-table">
                        <div class="content">
                            <table class="table is-fullwidth is-striped">
                                <tbody>
                                @if(count($notification->Notifications)===0)
                                <tr>
                                    <td width="5%"><i class="fa fa-bell-o"></i></td>
                                    <td>You Haven't get any notification yet </td>
                                    <td><a class="button is-small is-primary" href="#">Admin</a></td>
                                </tr>
                                @endif
                                @foreach($notification->Notifications as $notification)
                                <tr>
                                    <td width="5%"><i class="fa fa-bell-o"></i></td>
                                    <td>{{ $notification->data['message'] }}</td>
                                    <td><a class="button is-small is-primary" href="#">New</a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <footer class="card-footer">
                        <a href="{{ route('Notification.index') }}" class="card-footer-item">View All</a>
                    </footer>

              </div>

        </div>

    </div>


    </div>


@endsection
