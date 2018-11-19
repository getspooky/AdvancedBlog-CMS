@extends("layouts.app")

@section("content")

    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="columns is-vcentered">
                <div class="column is-5">
                    <figure class="image is-4by3">
                        <img src="https://picsum.photos/800/600/?random" alt="Description">
                        <form method="post" action="{{ route('upload::image') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="file is-fixed-bottom-left is-small">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="avatar">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                          <i class="fa fa-camera"></i>
                                        </span>
                                        <span class="file-label">Choose a Image…</span></span>
                                </label>
                                <button style="margin-left:10px;" type="submit" class="button is-info is-small"><span class="icon"><i class="fa fa-floppy-o"></i></span>
                                    <span>Save</span>
                                </button>
                            </div>
                        </form>

                    </figure>
                </div>
                <div class="column is-6 is-offset-1">
                    <h1 class="title is-2">
                        Superhero Scaffolding
                    </h1>
                    <h2 class="subtitle is-4">
                        Let this cover page describe a product or service.
                    </h2>
                    <br>
                    <p class="has-text-centered">
                        <a class="button is-medium is-info is-outlined">
                            Learn more
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>


    <section class="section">
        <div class="container has-text-centered">
            <h2 class="title">The Band</h2>
            <p>We have created a fictional band website. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

            <div class="columns is-centered" style="padding: 2rem">
                <div class="column">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image">
                                <img height="350px" src="{{ substr(user()->image,0,5) === 'https' ? user()->image : asset('storage').'/avatars/'.user()->image }}" ></figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                    <p class="title is-4">John Smith</p>
                                    <p class="subtitle is-6">@johnsmith</p>
                                </div>
                            </div>

                            <div class="content">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.
                                <a>@bulmaio</a>.
                                <a href="#">#css</a>
                                <a href="#">#responsive</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-2by1">
                                <img src="https://images.pexels.com/photos/167635/pexels-photo-167635.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                    <p class="title is-4">John Smith</p>
                                    <p class="subtitle is-6">@johnsmith</p>
                                </div>
                            </div>

                            <div class="content">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.
                                <a>@bulmaio</a>.
                                <a href="#">#css</a>
                                <a href="#">#responsive</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-2by1">
                                <img src="https://images.pexels.com/photos/167635/pexels-photo-167635.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                    <p class="title is-4">John Smith</p>
                                    <p class="subtitle is-6">@johnsmith</p>
                                </div>
                            </div>

                            <div class="content">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.
                                <a>@bulmaio</a>.
                                <a href="#">#css</a>
                                <a href="#">#responsive</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


    <footer class="footer">
        <div class="content has-text-centered">
            <p>
                <strong>Bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
                <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
                is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
            </p>
        </div>
    </footer>

@endsection
