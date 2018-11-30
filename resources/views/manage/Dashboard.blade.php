@extends("layouts.app")

@section("content")

    <div class="container"><br><br>
        <div class="columns">
            <div class="column is-one-quarter-desktop is-one-quarter-tablet ">
                <aside class="menu">
                    <p class="menu-label">
                        General
                    </p>
                    <ul class="menu-list">
                        <li><a class="is-active" href="{{ route('manage') }}">Dashboard</a></li>
                        <li><a href="{{ route('Status.index') }}">Status</a></li>
                        <li><a href="{{ route('Notification.index') }}">Notifications <span class="badge">{{ notification() }}</span></a></li>
                    </ul>
                    <p class="menu-label">
                        Administration
                    </p>
                    <ul class="menu-list">
                        <li><a href="{{ route('settings') }}">Account Settings</a></li>
                        <li>
                            <a>Manage</a>
                            <ul>
                                <li><a href="{{ route('Users.index') }}">Members</a></li>
                                <li><a href="{{ route('Status.create') }}">Status</a></li>
                            </ul>
                        </li>
                    </ul>

                    <p class="menu-label">
                        Transactions
                    </p>
                    <ul class="menu-list">
                        <li><a href="{{ route('Checkout.index') }}">Payments</a></li>
                    </ul>

                    <p class="menu-label">
                        Devlopment
                    </p>
                    <ul class="menu-list">
                        <li>
                            <a href="{{ route('api') }}">Api</a>
                        </li>
                    </ul>


                </aside>
            </div>


                @yield("page")


            </div>
        </div>


    </div>


@endsection