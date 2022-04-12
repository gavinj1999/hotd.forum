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
        <main class="container mx-auto flex-box" style="max-width:1000px;">
            <div style="max-width:280px">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque architecto dolore culpa consequuntur assumenda corrupti illo sit quasi error laborum iusto nemo earum, accusantium, in ipsum, doloribus quia! Cumque culpa laborum alias error voluptatum modi omnis, nobis in quo exercitationem ex pariatur. Rerum fuga praesentium necessitatibus beatae excepturi tenetur repellendus veritatis similique, molestias corporis alias eos. Inventore soluta hic, voluptate distinctio alias eligendi quaerat, ipsa enim possimus dolorum dolores sint ducimus, qui consequatur quasi error explicabo in eveniet id obcaecati maiores magni incidunt? Aliquid aliquam quae dolores magnam et impedit debitis ipsa exercitationem ut. At dolore nemo illum accusamus maiores!

            </div>
            <div style="max-width:700px;">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit dolorem excepturi nulla eligendi. Reprehenderit quo quasi doloremque. Minima illum esse impedit rem quia quod placeat veniam doloribus! Esse est aliquid amet hic, qui consequatur facilis obcaecati harum veniam, quibusdam eveniet odio delectus blanditiis, modi natus quos nobis culpa itaque quaerat exercitationem voluptas eius alias. Deleniti tempora qui ad, fugit deserunt natus id beatae. Molestiae saepe dolores tempora veniam, similique ab porro voluptas consequuntur et aliquam, sit, unde distinctio accusamus aut consequatur iusto quo ducimus itaque? Obcaecati eius odit doloribus, iure ipsum adipisci iusto dolor itaque ullam veritatis vero quae distinctio sit veniam quaerat tempore porro modi voluptatem. Provident enim explicabo odit ex blanditiis sunt doloremque quia fuga laborum, exercitationem laudantium, eveniet delectus sequi fugit suscipit illo minus? Possimus ad saepe at! Quidem mollitia adipisci excepturi cum voluptatem eaque asperiores? Quisquam, deserunt illum. Unde asperiores porro officia explicabo nesciunt minus labore. Numquam expedita quaerat corporis aliquid recusandae soluta nihil ipsam error, quae ipsa perferendis maiores repellendus eveniet iusto atque odio quod nobis architecto magnam ullam hic illum officia dignissimos earum! Earum, quae est alias nihil laborum mollitia! Asperiores laborum doloribus quaerat illum officia voluptas, provident vero eaque dolores incidunt saepe earum.
            </div>
        
        </main>
    </body>
</html>
