<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <title>Kanji Recognizer</title>
    <script src="https://www.chenyuho.com/project/handwritingjs/handwriting.canvas.js"></script>
    {{-- <script src="script.js" defer></script> --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <!--Replace with your tailwind.css once created-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"
        integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>



</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <nav id="header" class="px-4 bg-white fixed w-full z-10 top-0 shadow">


        <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">

            <div class="w-1/2 pl-2 md:pl-0">
                <a href="#" class="flex items-center text-primary">
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <span class="absolute text-4xl text-pink-500 font-extrabold animate-bounce">漢</span>
                            <span class="text-3xl text-pink-500 font-extrabold mt-10">字</span>
                        </div>

                        <h1 class="text-1xl font-extrabold uppercase text-pink-600 flex items-center space-x-3">
                            <span>Kanji </br>Mastery</span>
                        </h1>
                    </div>
                </a>

            </div>
            <div class="w-1/2 pr-0">
                <div class="flex relative inline-block float-right">

                    <div class="relative text-sm">
                        <button id="userButton" class="flex items-center focus:outline-none mr-3">
                            <img class="w-10 h-10 rounded-full mr-4" src="data:image/jpeg;base64,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"
                                alt="Avatar of User">
                            {{-- <img class="w-10 h-10 rounded-full mr-4" src="http://i.pravatar.cc/300"
                                alt="Avatar of User"> --}}
                            <span class="hidden md:inline-block">Hi, {{ $user->name }} </span>
                            <svg class="pl-2 h-2" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink"
                                enable-background="new 0 0 129 129">
                                <g>
                                    <path
                                        d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z" />
                                </g>
                            </svg>
                        </button>
                        <div id="userMenu"
                            class="bg-white rounded shadow-md mt-2 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30 invisible">
                            <ul class="list-reset">
                                <li><a href="#"
                                        class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">My
                                        account</a></li>
                               
                                <li>
                                    <hr class="border-t mx-2 border-gray-400">
                                </li>
                                <div class="hidden sm:flex sm:items-center sm:ms-6">


                                    <form method="POST" action="">

                                    </form>

                                </div>

                                <li><a href="{{ route('logout') }}"
                                        class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="block lg:hidden pr-4">
                        <button id="nav-toggle"
                            class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-900 hover:border-teal-500 appearance-none focus:outline-none">
                            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Menu</title>
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                            </svg>
                        </button>
                    </div>
                </div>

            </div>


            <div class="px-4 w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white z-20"
                id="nav-content">
                <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
                    <li id="home_click" class="mr-6 my-2 md:my-0">
                        <a href="#"
                            class="block py-1 md:py-3 pl-1 align-middle text-pink-600 no-underline hover:text-pink-900  border-b-2 border-white hover:border-pink-500">
                            <i class="fas fa-home fa-fw mr-3 text-pink-800"></i><span
                                class="pb-1 md:pb-0 text-sm">Home</span>
                        </a>
                    </li>
                    <li id="user_click" class="mr-6 my-2 md:my-0">
                        <a href="#"
                            class="block py-1 md:py-3 pl-1 align-middle text-pink-600 no-underline hover:text-pink-900 border-b-2 border-white hover:border-pink-500">
                            <i class="fa fa-pencil-alt fa-fw mr-3"></i>
                            <span class="pb-1 md:pb-0 text-sm">Draw Kanji</span>
                        </a>
                    </li>
                    <li id="category_click" class="mr-6 my-2 md:my-0">
                        <a href="#"
                            class="block py-1 md:py-3 pl-1 align-middle text-pink-600 no-underline hover:text-pink-900 border-b-2 border-white hover:border-pink-500">
                            <i class="fa fa-list fa-fw mr-3"></i>
                            <span class="pb-1 md:pb-0 text-sm">My List</span>
                        </a>
                    </li>

                </ul>



            </div>

        </div>
    </nav>

    <!--Container-->
    <div class="w-full mx-auto pt-20">

        <div id="home"
            class="w-full px-6 py-10 bg-gradient-to-br from-pink-50 to-pink-100 min-h-screen text-gray-800">

            <!-- Welcome Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-extrabold text-pink-600 mb-2 mt-8">Welcome back, Kanji Master! 🥋</h1>
                <p class="text-lg text-gray-600">Keep going — you're mastering kanji step by step!</p>
                {{-- <div
                    class="mt-4 inline-block bg-yellow-300 text-yellow-900 font-semibold px-4 py-1 rounded-full shadow">
                    Level 5</div> --}}
            </div>

            <!-- Progress & XP Section -->
            <div class="mb-10">
                <div class="bg-white p-6 rounded-2xl shadow-lg">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold text-pink-500">🔥 Your Kanji Progress</h2>
                        <span class="text-gray-600">{{ $msg }}</span>
                    </div>
                    <div class="w-full bg-pink-200 h-4 rounded-full overflow-hidden shadow-inner">
                        <div class="bg-pink-500 h-full w-[{{ $progress }}%]"></div>
                    </div>
                    <p class="mt-2 text-sm text-right text-gray-500">{{ $progress }} / 100</p>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-pink-400">
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">📘 Total Kanji In My List </h3>
                    <p class="text-3xl font-bold text-pink-600">{{ $totalSavedKanji }}</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-green-400">
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">🎯 Kanji with Meaning Mastered</h3>
                    <p class="text-3xl font-bold text-green-600">{{ $countMasterdKanjiMeaning }}</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-yellow-400">
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">🎯 Kanji with Reading Mastered</h3>
                    <p class="text-3xl font-bold text-yellow-600">{{ $countMasterdKanjiReading }}</p>
                </div>
                {{-- <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-400">
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">⚡ Current XP</h3>
                    <p class="text-3xl font-bold text-blue-600">650</p>
                </div> --}}
            </div>

            <!-- Struggled Kanji Section -->
            <div class="flex flex-col gap-6">

                <h2 class="text-2xl font-bold text-pink-500">🧐 Kanji You Struggled With ..</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-pink-200">
                        <h2 class="text-2xl font-bold text-pink-500"> Their Meanings :</h2>
                        <div class="flex items-center justify-between mb-4">
                            {{-- <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full transition shadow">
                      Review Again
                    </button> --}}
                        </div>
                        <div class="flex gap-4 flex-wrap">
                            <!-- Struggled Kanji Cards -->
                            @foreach ($getStruggledKanjiMeaning as $kanji)
                                <div
                                    class="bg-pink-100 border-2 border-pink-400 text-pink-700 font-bold text-2xl px-4 py-3 rounded-lg shadow">
                                    {{ $kanji->kanji_character }}</div>
                            @endforeach

                            <!-- Add more as needed -->
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-pink-200">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-2xl font-bold text-pink-500">Their Readings :</h2>
                            {{-- <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full transition shadow">
                      Review Again
                    </button> --}}
                        </div>
                        <div class="flex gap-4 flex-wrap">
                            <!-- Struggled Kanji Cards -->
                            @foreach ($getStruggledKanjiReading as $kanji)
                                <div
                                    class="bg-pink-100 border-2 border-pink-400 text-pink-700 font-bold text-2xl px-4 py-3 rounded-lg shadow">
                                    {{ $kanji->kanji_character }}</div>
                            @endforeach

                            <!-- Add more as needed -->
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div id="user" class="hidden w-full px-6 mb-16 md:py-6 md:mt-8 text-gray-800 leading-relaxed relative">

            <div class="flex flex-col lg:flex-row gap-12 items-start justify-center">

                <!-- Canvas Section -->
                <div
                    class="flex flex-col items-center gap-6 bg-white p-6 rounded-3xl shadow-xl border border-pink-200">
                    <canvas id="canvas" width="450" height="450"
                        class="rounded-2xl border-4 border-pink-400 shadow-inner cursor-crosshair bg-white"></canvas>

                    <div class="flex gap-4">
                        <button onclick="recognizeKanji()"
                            class="bg-gradient-to-r from-blue-400 to-blue-600 text-white px-5 py-2 rounded-full shadow hover:from-blue-500 hover:to-blue-700 transition duration-300">
                            🔍 Recognize
                        </button>
                        <button onclick="eraseAll()"
                            class="bg-gradient-to-r from-red-400 to-red-600 text-white px-5 py-2 rounded-full shadow hover:from-red-500 hover:to-red-700 transition duration-300">
                            ❌ Erase
                        </button>
                    </div>
                </div>

                <!-- Info Section -->
                <div class="flex flex-col gap-6 w-full max-w-md">
                    <div
                        class="flex justify-between items-center bg-white p-4 rounded-2xl shadow border border-pink-300">
                        <div id="result"
                            class="text-xl font-semibold text-pink-600 border-2 border-pink-500 px-4 py-1 rounded-md bg-pink-100">
                        </div>
                        <form action="{{ route('add_kanjiList') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="flex items-center gap-2 bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full transition duration-300 shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Save
                            </button>
                            <input type="hidden" id="kanji_id" name="kanji_id">
                        </form>

                    </div>



                    <div
                        class="bg-gradient-to-br from-pink-100 to-pink-200 border-2 border-pink-400 p-6 rounded-3xl shadow">
                        <h2 class="text-2xl font-bold text-pink-700 mb-4">🌸 Kanji Info:</h2>
                        <div id="reading" class="text-lg text-gray-800 leading-relaxed text-left space-y-2">
                        </div>

                    </div>
                    <div id="strok_order" class="flex gap-6">

                    </div>
                </div>

            </div>
        </div>



        <div id="category" class=" hidden w-full md:py-6 md:mt-8 mb-16 text-gray-800">
            <div class="flex justify-end  space-x-4 mb-8 mr-8">
                <button id="flashcard_click"
                    class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-xl shadow-md transition flex items-center space-x-2">
                    <i class="fas fa-clone"></i>
                    <span>Flash Cards</span>
                </button>
                {{-- <button
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-xl shadow-md transition flex items-center space-x-2">
                    <i class="fas fa-brain"></i>
                    <span>Memory Game</span>
                </button> --}}
                {{-- @if (count($savedKanjis)>=4) --}}
                <button id="quiz_click"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-xl shadow-md transition flex items-center space-x-2">
                <i class="fas fa-question-circle"></i>
                <span>Quiz</span>
            </button>
                {{-- @endif --}}
            </div>

         <div class="grid grid-cols-4 gap-4 mx-20">
  @foreach ($savedKanjis as $kanji)
    <div class="relative group bg-pink-600 hover:bg-pink-700 transition text-white text-center rounded-xl border-4 border-green-400 p-4 shadow-lg cursor-pointer">
      
      <!-- Delete Icon (hidden until hover) -->
      <form action="{{ route('deleteKanjiFromMyList') }}" method="POST" class="absolute top-2 right-2 hidden group-hover:block">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-100 hover:bg-red-200 text-red-600 hover:text-red-700 rounded-full p-2 shadow-md transition-all duration-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
        <input type="hidden"  name="ID_kanji" value="{{ $kanji->id }}">

        {{-- <h1>{{ $kanji->id }}</h1> --}}

      </form>

      <div class="text-sm">{{ $kanji->reading_on }}・{{ $kanji->reading_kon }}</div>
      <div class="text-4xl font-bold my-2">{{ $kanji->kanji_character }}</div>
      <div class="uppercase text-xs tracking-widest">{{ $kanji->meaning }}</div>
    </div>
  @endforeach
</div>

            {{-- <div class="absolute top-40 left-20 right-20 z-20 bg-pink-300 text-white p-6">
                <div class="bg-pink-300 text-white font-sans">

                    <main class="p-6 flex flex-col lg:flex-row gap-6">

                        <!-- Left Kanji Card -->
                        <section
                            class="bg-pink-900 border border-pink-700 p-6 rounded-lg flex flex-col gap-4 w-20 lg:w-40 h-40">
                            <div class="text-7xl text-center">三</div>
                            <div class="text-center">THREE</div>
                        </section>

                        <!-- Right Kanji Info -->
                        <section class="flex-1 space-y-4">

                            <!-- Tags -->
                            <div class="flex gap-2 flex-wrap">
                                <span class="bg-pink-500 text-black px-3 py-1 rounded-full">Grade 1</span>
                                <span class="bg-pink-500 text-black px-3 py-1 rounded-full">Strokes 3</span>
                                
                            </div>

                            <!-- Meanings -->
                            <div>
                                <h2 class="text-lg font-bold">Meanings</h2>
                                <div class="mt-1 bg-pink-800 px-3 py-1 rounded inline-block">three</div>
                            </div>

                            <!-- Kun Readings -->
                            <div>
                                <h2 class="text-lg font-bold">Kun Readings</h2>
                                <div class="mt-1 flex flex-wrap gap-2">
                                    <span class="bg-pink-800 px-3 py-1 rounded">み.つ</span>
                                    <span class="bg-pink-800 px-3 py-1 rounded">みっ.つ</span>
                                    <span class="bg-pink-800 px-3 py-1 rounded">み</span>
                                </div>
                            </div>

                            <!-- On Readings -->
                            <div>
                                <h2 class="text-lg font-bold">On Readings</h2>
                                <div class="mt-1 flex gap-2">
                                    <span class="bg-pink-800 px-3 py-1 rounded">ソウ</span>
                                    <span class="bg-pink-800 px-3 py-1 rounded">サン</span>
                                </div>
                            </div>

                            <!-- Resources -->
                            <div>
                                <h2 class="text-lg font-bold">Learn more from:</h2>
                                <div class="flex flex-wrap gap-2 text-sm text-pink-400 underline">
                                    <a href="#">JPDB</a>
                                    <a href="#">Jotoba</a>
                                    <a href="#">The Kanji Map</a>
                                    <a href="#">Jisho</a>
                                    <a href="#">KanjiAlive</a>
                                </div>
                            </div>

                        </section>

                    </main>
                </div>
            </div> --}}
        </div>

    </div>

    <div id="flashcard" class=" hidden w-full md:py-6 md:mt-8 mb-16 text-gray-800  ">
        <!-- Flashcard Section -->
        <h2 class="text-4xl font-extrabold text-center text-pink-600 mb-10 drop-shadow">🃏 Master Your Kanji</h2>

        <div class="carousel flex justify-center ">
            <h1 class="text-pink-500">no cards added </h1>
        </div>

        <div class="flex justify-center mt-10 space-x-6">
            <button
                class="prev bg-pink-500 hover:bg-pink-600 text-white font-bold px-6 py-3 rounded-full shadow-lg transition-all">
                ⬅ Previous
            </button>
            <button
                class="next bg-pink-500 hover:bg-pink-600 text-white font-bold px-6 py-3 rounded-full shadow-lg transition-all">
                Next ➡
            </button>
        </div>


    </div>
    <div id="quiz_menu" class="hidden w-full py-8 mt-12 mb-16 text-gray-800">
        <h2 class="text-3xl font-extrabold text-pink-600 mb-10 text-center">📝 Test Your Kanji Skills</h2>

        <div class="flex flex-col items-center gap-6">
            <!-- Guess Meaning Quiz -->
            <button id="click_quiz_meaning"
                class="flex items-center gap-4 bg-white hover:bg-pink-100 text-pink-600 font-semibold py-4 px-8 rounded-2xl shadow-md text-lg transition w-full max-w-md border-l-8 border-pink-400">
                <i class="fas fa-question-circle text-pink-500 text-2xl"></i>
                <span>Guess the Kanji Meaning</span>
            </button>

            <!-- Guess Reading Quiz -->
            <button id="click_quiz_reading"
                class="flex items-center gap-4 bg-white hover:bg-pink-100 text-pink-600 font-semibold py-4 px-8 rounded-2xl shadow-md text-lg transition w-full max-w-md border-l-8 border-pink-400">
                <i class="fas fa-book-open text-pink-500 text-2xl"></i>
                <span>Guess the Kanji Reading</span>
            </button>
        </div>
    </div>


    <div id="quiz_meaning" class=" hidden w-full md:py-6 md:mt-8 mb-16 text-gray-800 ">
        <h2 class="text-3xl font-extrabold text-pink-600 mb-10 text-center">📝 Guess the Kanji Meaning</h2>


        <div id="quizContainer_meaning"
            class="bg-white p-8 rounded-2xl shadow-lg mb-12 mr-5 ml-5 border-4  border-pink-400">
            {{-- <!-- Question -->
                <div class="mb-8">
                    <p class="text-xl font-bold text-gray-800 text-center">
                      What is the meaning of the kanji <span class="text-pink-500 text-4xl">{{ $randomKanji['kanji'] }}</span>?
                    </p>
                  </div>
                
                  <!-- Answers -->
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                   @foreach ($options as $index => $op)
                   <button class="bg-pink-100 hover:bg-pink-200 text-pink-600 font-semibold py-4 px-6 rounded-lg shadow text-lg transition w-full">
                    {{ $index+1 }}-{{ $op }}
                  </button>
              
                       
                   @endforeach
                  </div> --}}



        </div>

        <!-- Navigation Buttons -->
        <div class="flex justify-end mt-8 mr-6">
            {{-- <button class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-3 px-6 rounded-lg shadow transition">
                      Previous
                    </button> --}}
            <button id="next_question"
                class=" hidden bg-pink-500 hover:bg-pink-600 text-white font-bold py-3 px-6 rounded-lg shadow transition">
                Next
            </button>
        </div>

    </div>
    <div id="quiz_reading" class=" hidden w-full md:py-6 md:mt-8 mb-16 text-gray-800 ">
        <h2 class="text-3xl font-extrabold text-pink-600 mb-10 text-center">📝 Guess the Kanji Reading</h2>


        <div id="quizContainer_reading"
            class="bg-white p-8 rounded-2xl shadow-lg mb-12 mr-5 ml-5 border-4  border-pink-400">




        </div>




    </div>
    </div>
    <!--/container-->



    <script>
        /*Toggle dropdown list*/
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

        var userMenuDiv = document.getElementById("userMenu");
        var userMenu = document.getElementById("userButton");

        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");

        document.onclick = check;

        function check(e) {
            var target = (e && e.target) || (event && event.srcElement);

            //User Menu
            if (!checkParent(target, userMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, userMenu)) {
                    // click on the link
                    if (userMenuDiv.classList.contains("invisible")) {
                        userMenuDiv.classList.remove("invisible");
                    } else {
                        userMenuDiv.classList.add("invisible");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    userMenuDiv.classList.add("invisible");
                }
            }

            //Nav Menu
            if (!checkParent(target, navMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, navMenu)) {
                    // click on the link
                    if (navMenuDiv.classList.contains("hidden")) {
                        navMenuDiv.classList.remove("hidden");
                    } else {
                        navMenuDiv.classList.add("hidden");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    navMenuDiv.classList.add("hidden");
                }
            }

        }

        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t == elm) {
                    return true;
                }
                t = t.parentNode;
            }
            return false;
        }


        // const user =document.getElementById("user");

        const home = document.getElementById("home");
        const category = document.getElementById("category");
        const user = document.getElementById("user");
        const quiz = document.getElementById("quiz_menu");
        const flashcard = document.getElementById("flashcard");
        const quiz_meaning = document.getElementById("quiz_meaning");
        const quiz_reading = document.getElementById("quiz_reading");
        const home_click = document.getElementById("home_click");
        const flashcard_click = document.getElementById("flashcard_click");
        const category_click = document.getElementById("category_click");
        const user_click = document.getElementById("user_click");
        const quiz_click = document.getElementById("quiz_click");
        const click_quiz_meaning = document.getElementById("click_quiz_meaning");
        const click_quiz_reading = document.getElementById("click_quiz_reading");

        // Initially, the category should be hidden, and home should be visible.
        home.classList.remove('hidden');
        category.classList.add('hidden');
        user.classList.add('hidden');

        home_click.addEventListener("click", () => {

            home.classList.remove('hidden');
            category.classList.add('hidden');
            user.classList.add('hidden');
            flashcard.classList.add('hidden');
            quiz.classList.add('hidden');
            quiz_meaning.classList.add('hidden');
            quiz_reading.classList.add('hidden');

            user_click.style.borderBottom = ""
            category_click.style = ""
            home_click.style = "2px solid #D5006D";
        });

        category_click.addEventListener("click", () => {
            home.classList.add('hidden');
            category.classList.remove('hidden');
            user.classList.add('hidden');
            flashcard.classList.add('hidden');
            quiz.classList.add('hidden');
            quiz_meaning.classList.add('hidden');
            quiz_reading.classList.add('hidden');

            category_click.style.borderBottom = "2px solid #D5006D"
            user_click.style.removeProperty("border-bottom");
            home_click.style.removeProperty("border-bottom");



        });
        user_click.addEventListener("click", () => {

            home.classList.add('hidden');
            category.classList.add('hidden');
            user.classList.remove('hidden');
            flashcard.classList.add('hidden');
            quiz.classList.add('hidden');
            quiz_meaning.classList.add('hidden');
            quiz_reading.classList.add('hidden');

            user_click.style.borderBottom = "2px solid #D5006D";
            category_click.style = ""
            home_click.style = "";


        });
        flashcard_click.addEventListener("click", () => {

            home.classList.add('hidden');
            category.classList.add('hidden');
            user.classList.add('hidden');
            flashcard.classList.remove('hidden');
            quiz.classList.add('hidden');
            quiz_meaning.classList.add('hidden');
            quiz_reading.classList.add('hidden');
            user_click.style.borderBottom = "";
            category_click.style = "";
            home_click.style = "";



        });
        quiz_click.addEventListener("click", () => {

            home.classList.add('hidden');
            category.classList.add('hidden');
            user.classList.add('hidden');
            quiz.classList.remove('hidden');
            flashcard.classList.add('hidden');
            quiz_meaning.classList.add('hidden');
            quiz_reading.classList.add('hidden');
            user_click.style.borderBottom = "";
            category_click.style = "";
            home_click.style = "";


        });
        click_quiz_meaning.addEventListener("click", () => {

            home.classList.add('hidden');
            category.classList.add('hidden');
            user.classList.add('hidden');
            quiz_meaning.classList.remove('hidden');
            flashcard.classList.add('hidden');
            quiz.classList.add('hidden');
            quiz_reading.classList.add('hidden');

        });
        click_quiz_reading.addEventListener("click", () => {

            home.classList.add('hidden');
            category.classList.add('hidden');
            user.classList.add('hidden');
            quiz_reading.classList.remove('hidden');
            flashcard.classList.add('hidden');
            quiz.classList.add('hidden');
            quiz_meaning.classList.add('hidden');



        });



        const canvas = new handwriting.Canvas(document.getElementById("canvas"), 3);
        canvas.setLineWidth(5);

        canvas.setOptions({
            language: "ja",
            numOfReturn: 1
        });

        canvas.setCallBack(function(data, err) {
            if (err) {
                alert("Recognition error");
                return;
            }

            const kanji = data;
            document.getElementById("result").innerText = kanji;

            fetch(`/kanji/${kanji}`)
                .then(res => res.json())
                .then(info => {
                    currentKanjiId = info.id;
                    console.log(currentKanjiId)
                    localStorage.setItem("kanji_id", currentKanjiId);
                    document.getElementById('kanji_id').value = currentKanjiId

                    document.getElementById("reading").innerHTML = `
              <strong>Kanji:</strong> ${info.kanji}<br>
              <strong>JLPT:</strong> N${info.jlpt}<br>
              <strong>Meanings:</strong> ${info.meanings.slice(0, 3).join(', ')}<br>
              <strong>Onyomi:</strong> ${info.on_readings.join(', ') || 'N/A'}<br>
              <strong>Kunyomi:</strong> ${info.kun_readings.join(', ') || 'N/A'}<br>
              <strong>Grade:</strong> ${info.grade || 'N/A'}
            `;
                    document.getElementById('strok_order').innerHTML = `
                              <img class="h-48 w-48 object-cover ..." src="${info.stroke_order}" />              
                              <img class="h-48 w-48 object-cover ..." src="${info.memory_trick}" />              


                `;
                })
                .catch(() => {
                    document.getElementById("reading").innerText = "❌ This is not a Kanji.";
                    document.getElementById("result").innerText = "";

                });

        });

        let paintMode = false;
        let x = 0,
            y = 0;

        document.onmousemove = function(e) {
            x = e.clientX;
            y = e.clientY;
        };

        document.addEventListener("keydown", event => {
            if (event.code === "KeyP" && !paintMode) {
                paintMode = true;
                document.getElementById("paintMode").innerText = "ON";
                sendMouseEvent("mousedown");
            }
        });

        document.addEventListener("keyup", event => {
            if (event.code === "KeyP" && paintMode) {
                paintMode = false;
                document.getElementById("paintMode").innerText = "OFF";
                sendMouseEvent("mouseup");
            }
        });

        function sendMouseEvent(eventName) {
            const element = document.getElementById("canvas");
            const clickEvent = new MouseEvent(eventName, {
                view: window,
                bubbles: true,
                cancelable: true,
                clientX: x,
                clientY: y
            });
            element.dispatchEvent(clickEvent);
        }

        function recognizeKanji() {
            canvas.recognize();
        }


        function eraseAll() {
            canvas.erase();
            document.getElementById("result").innerText = "";
            document.getElementById("reading").innerHTML = "";
            document.getElementById('strok_order').innerHTML = "";


        }

        // flashcard 

        let cards = @json($flashcard);
        console.log(cards);

        let currentCard = 0;

        carousel = document.querySelector(".carousel");
        prev = document.querySelector(".prev");
        next = document.querySelector(".next");
        renderCard();

        function renderCard() {
            carousel.innerHTML = `
    <div class="relative w-[50rem] h-[20rem] bg-white rounded-3xl shadow-2xl border-4 border-pink-400 cursor-pointer transform transition hover:scale-105 group">
        <!-- Front of the card -->
        <div  class="absolute inset-0 flex items-center justify-center text-[6rem] font-extrabold text-pink-600 group-hover:hidden">
          ${cards[currentCard].kanji}
        </div> 
                                     
        <!-- Back of the card -->
        <!-- Back of the card -->
<div class="absolute inset-0 hidden group-hover:flex bg-pink-50 rounded-3xl shadow-lg p-6 text-center items-center justify-center">
  <div class="flex flex-col md:flex-row items-center gap-6 w-full">
    
    <!-- Memory Trick Image -->
    <img src="${cards[currentCard].memory_trick}" alt="Memory Trick" class="w-40 h-40 object-cover rounded-xl shadow-md" />

   <div class="absolute inset-0 hidden group-hover:flex bg-pink-50 rounded-3xl shadow-lg p-6 items-center justify-center">
  <div class="flex flex-col md:flex-row items-center justify-center gap-10 text-center">

    <!-- Memory Trick Image -->
    <img src="${cards[currentCard].memory_trick}" alt="Memory Trick" class="w-40 h-40 object-cover rounded-xl shadow-md" />

    <!-- Kanji Info -->
    <div class="flex flex-col text-center space-y-4 items-center">
     <div class="flex gap-7">
       <div>
        <h3 class="text-xl font-semibold text-pink-600 mb-1">On'yomi</h3>
        <p class="text-2xl font-bold text-pink-500">${cards[currentCard].on_readings}</p>
      </div>

      <div>
        <h3 class="text-xl font-semibold text-pink-600 mb-1">Kun'yomi</h3>
        <p class="text-2xl font-bold text-pink-500">${cards[currentCard].kun_readings}</p>
      </div>
      </div>

      <div>
        <h3 class="text-xl font-semibold text-gray-600 mb-1">Meaning</h3>
        <p class="text-lg text-gray-700">${cards[currentCard].meanings}</p>
      </div>

      <span class="inline-block bg-pink-200 text-pink-800 px-4 py-1 rounded-full text-sm font-semibold">
        JLPT N${cards[currentCard].jlpt}
      </span>
    </div>

  </div>
</div>

      </div>

   `


        }
        next.addEventListener('click', function(e) {
            if (currentCard >= cards.length) {
                return;
            }
            currentCard++
            renderCard();

        })

        prev.addEventListener('click', function(e) {
            if (currentCard <= 0) {
                return;
            }
            currentCard--;
            renderCard();

        })

        // quiz_meaning


        let quizs = @json($quizs);
        console.log(quizs);
        let questionNumber = 0
        let struggledKanjiMeaning = []
        getQuiz();

        function getQuiz() {
            if (!quizs[questionNumber]) {
                console.warn('No more questions left.');
                return;
            }

            document.getElementById('quizContainer_meaning').innerHTML = `
        <!-- Question -->
        <div class="mb-8">
          <p class="text-xl font-bold text-gray-800 text-center">
            ${questionNumber+1 }-What is the meaning of the kanji <span class="text-pink-500 text-4xl">
                ${quizs[questionNumber].kanji}
                </span>?
          </p>
        </div>
      
        <!-- Answers -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          ${quizs[questionNumber].options.map(op=>`
                   <button class=" answer bg-pink-100 hover:bg-pink-200 text-pink-600 font-semibold py-4 px-6 rounded-lg shadow text-lg transition w-full">
                    ${op}
                  </button>

                  `).join('')}
        </div>
         
      <div class="flex justify-end mt-8 mr-6">
        
                   
                    <button type="submit" id="next_question" class=" hidden bg-pink-500 hover:bg-pink-600 text-white font-bold py-3 px-6 rounded-lg shadow transition">
                      Next
                    </button>
                   
                  </div>
                 
       
`


            document.querySelectorAll('.answer').forEach(button => {

                button.addEventListener('click', () => {
                    button.disabled = true;

                    selectedOption = button.innerText.trim();
                    correctAnswer = quizs[questionNumber].correctAnswer;



                    // console.log(quizs.length)
                    if (selectedOption == correctAnswer) {

                        button.style.background = 'green';

                        button.style.color = 'white';
                        document.getElementById('next_question').classList.remove('hidden');



                        // alert('good job ')
                        // questionNumber++;
                        console.log(questionNumber)



                        // getQuiz();


                    } else {
                        struggledKanjiMeaning[struggledKanjiMeaning.length] = quizs[questionNumber].id
                        // quizs[questionNumber].isStruggled = 'true';
                        console.log(quizs[questionNumber].isStruggled)

                        button.style.background = 'red';
                        button.style.color = 'white';
                        // alert('❌ Wrong! Try again.');
                    }





                })
            });
            document.getElementById('next_question').addEventListener('click', () => {
                console.log('next btn')
                document.getElementById('next_question').classList.add('hidden');

                questionNumber++;
                if (questionNumber == quizs.length) {

                    review()


                }
                getQuiz();
            });

        }



        function review() {
            console.log(struggledKanjiMeaning);
            document.getElementById('quizContainer_meaning').innerHTML = `
            <form action="{{ route('Struggled_kanji') }}" method="POST">
    @csrf
               <div class="flex flex-col gap-7 items-center justify-center text-center">

  <button id="quiz_again" class="bg-pink-100 hover:bg-pink-200 text-pink-600 font-semibold py-4 px-6 rounded-lg shadow text-lg transition w-5/6">
    Do Quiz Again
  </button>

  
    <button id="back_home" class="bg-pink-100 hover:bg-pink-200 text-pink-600 font-semibold py-4 px-6 rounded-lg shadow text-lg transition w-5/6">
      GO Home
    </button>
    <input type="hidden" id="kanji_id" name="kanji_id" value="${struggledKanjiMeaning}">
    </div>

  </form>


        `
            document.getElementById('quiz_again').addEventListener('click', () => {

                questionNumber = 0;
                getQuiz();
            })


        }

        // --quiz reading


        let kanji_reading = @json($quizs_reading);

        let 質問 = 0;

        let struggledKanjiReading = []
        // console.log(kanji_reading[question].kanji)
        getQuizReading();

        function getQuizReading() {
            if (!kanji_reading[質問]) {
                console.warn('No more questions left.');
                return;
            }
            document.getElementById('quizContainer_reading').innerHTML = `
   <!-- Question -->
        <div class="mb-8">
          <p class="text-xl font-bold text-gray-800 text-center">
            ${質問+1 }-What is the reading of the kanji <span class="text-pink-500 text-4xl">${kanji_reading[質問].kanji}</span>?
          </p>
        </div>
      
        <!-- Answers -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
         ${kanji_reading[質問].options.map(op=>`
                  <button  class="readingAnswer bg-pink-100 hover:bg-pink-200 text-pink-600 font-semibold py-4 px-6 rounded-lg shadow text-lg transition w-full">
                    ${op}
                  </button>
                 `).join('')}
      
    
        </div>
         <!-- Navigation Buttons -->
            <div class="flex justify-end mt-8 mr-6">
             
                <button id="next"
                    class=" hidden bg-pink-500 hover:bg-pink-600 text-white font-bold py-3 px-6 rounded-lg shadow transition">
                    Next
                </button>
            </div>
  `
            document.querySelectorAll('.readingAnswer').forEach(btn => {
                btn.addEventListener('click', () => {
                    selected = btn.innerText;

                    correct = kanji_reading[質問].correctAnswer;


                    if (selected == correct) {
                        btn.style.background = 'green';
                        btn.style.color = 'white';
                        document.getElementById('next').classList.remove('hidden');


                    } else {
                        struggledKanjiReading[struggledKanjiReading.length] = kanji_reading[質問].id
                        console.log(struggledKanjiReading)
                        btn.style.background = 'red';
                        btn.style.color = 'white';

                    }
                })

            });
            document.getElementById('next').addEventListener('click', () => {
                document.getElementById('next').classList.add('hidden');
                質問++;
                if (質問 == kanji_reading.length) {
                    review_reading();
                }
                getQuizReading();



            })

        }



        function review_reading() {
            document.getElementById('quizContainer_reading').innerHTML = `
  <button id="quizReading_again" class=" bg-pink-100 hover:bg-pink-200 text-pink-600 font-semibold py-4 px-6 rounded-lg shadow text-lg transition w-full">
            do quiz again
          </button>
      <form id="" action="{{ route('Struggled_kanji_reading') }}" method="POST">
@csrf

         <button id="back_home" class=" bg-pink-100 hover:bg-pink-200 text-pink-600 font-semibold py-4 px-6 rounded-lg shadow text-lg transition w-full">
            go home
          </button>
             <input type="hidden" name="kanji_id_reading" value="${struggledKanjiReading}">
     
               </form>   
  `

            document.getElementById('quizReading_again').addEventListener('click', () => {

                質問 = 0;
                getQuizReading();

            })

        }
    </script>


</body>

</html>
