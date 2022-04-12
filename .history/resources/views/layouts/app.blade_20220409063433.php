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
          <div class="border-2 border-blue rounded-xl mt-16">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat harum hic, voluptatum rem esse soluta debitis nostrum facilis recusandae quisquam corrupti delectus suscipit cum porro? Libero, aperiam non iure unde cupiditate fugit labore laboriosam, rerum tenetur, exercitationem a sequi. Architecto eum officiis est temporibus, nostrum ex voluptatibus earum optio ad?
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
