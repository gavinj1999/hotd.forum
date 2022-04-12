<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>House of the Dragon Forum</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans bg-gray-background text-gray-900 text-sm">
        <header class="flex items-center justify-between px-8 py-4">
            <a href="#">HOTD Logo</a>

            
            <div class="flex items-center">
                @if (Route::has('login'))
                <div class="px-6 py-4">
                    @auth

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{route('logout')}}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>

                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
                <a href="#">
                    <img src="https://www.gravatar.com/avatar/0000000000000000000000000000?d=mp&f=y" alt="avatar" class="w-10 h-10 rounded-full">
                </a>
            </div>
        </header>
        <main class="container mx-auto flex" style="max-width:1000px;">
            <div class="w-70 mr-5" >
          <div class="bg-white border-2 border-blue rounded-xl mt-16">
            <div class="text-center px-6 py-2 pt-6">
                <h3 class="font-semiboldm  text-base">
                    Add An Idea
                </h3>
                <p class="text-xs mt-4">
                    Let us know what you would like to see and we'll take a look over!
                </p>
            </div>
            <form action="" method="POST" class="space-y-4 px-4 py-6">
                <div>
                    <input type="text" class="text-sm w-full bg-gray-100 rounded-xl border-none placeholder-gray-900 px-4 py-2" placeholder="Your Idea"/>
                </div>
                <div>
                    <select name="category_add" id="category_add" class="bg-gray-100 text-sm w-full rounded-xl border-none px-4 py-2">
                        <option value="Category One">Category One</option>
                        <option value="Category Two">Category Two</option>
                        <option value="Category Three">Category Three</option>
                        <option value="Category Four">Category Four</option>
                    </select>
                </div>
            </form>
        </div>
            </div>
            <div class="w-175">
               <nav class="flex items-center justify-between text-xs">
                   <ul class="flex uppercase font-semibold space-x-10 pb-3">
                      <li>
                          <a class="border-b-4 pb-3 border-blue" href="">All Ideas(87)</a>
                        </li>
                        <li>
                            <a class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue" href="">Considering(6))</a>
                        </li>
                        <li>
                            <a class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue" href="">In Progress(1))</a>
                        </li>
                        <li>
                            <a class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue" href="">Implemented(6))</a>
                        </li>
                        <li>
                            <a class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue" href="">Closed(55))</a>
                        </li>
                   </ul>
               </nav>

               <div class="mt-8">
                   {{$slot}}
               </div>
            </div>
        
        </main>
    </body>
</html>
