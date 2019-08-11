<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pbin</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
        <link rel="stylesheet" href="/css/app.css">
        <!-- Styles -->
        <style>

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">My Pastes</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="pastes-container" >
                @yield('content')
            </div>

            <div class="content">

                <form method="POST" action="/" >
                    {{csrf_field()}}
                    
                    <div class="field">
                        <label class="label" for="title">Title</label>
                        
                        <div class="control">
                            <input type="text" name="title">
                        </div>
                    </div>

                    <div class="field" >
                        <label class="label" for="content">Content</label>
                        
                        <div class="control">
                            <textarea name="content" required></textarea>
                        </div>
                    </div>
                    @auth
                        <p><input name="privacy" type="radio" value="0">Public</p>
                        <p><input name="privacy" type="radio" value="1">Private</p>
                    @endauth

                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button is-link">Save</button>
                        </div>
                    </div>
                    
                </form>

            </div>
        </div>
    </body>
</html>
