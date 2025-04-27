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
    <script src="script.js" defer></script>
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
                            <img class="w-10 h-10 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of User">
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
                                <li><a href="#"
                                        class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Notifications</a>
                                </li>
                                <li>
                                    <hr class="border-t mx-2 border-gray-400">
                                </li>
                                <div class="hidden sm:flex sm:items-center sm:ms-6">


                                    <form method="POST" action="">

                                    </form>

                                </div>

                                <li><a href="{{ route('logout') }}" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Logout</a></li>
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
                            class="block py-1 md:py-3 pl-1 align-middle text-pink-600 no-underline hover:text-pink-900 border-b-2 border-pink-600 hover:border-pink-600">
                            <i class="fas fa-home fa-fw mr-3 text-pink-800"></i><span
                                class="pb-1 md:pb-0 text-sm">Home</span>
                        </a>
                    </li>
                    <li id="user_click" class="mr-6 my-2 md:my-0">
                        <a href="#"
                            class="block py-1 md:py-3 pl-1 align-middle text-pink-600 no-underline hover:text-pink-900 border-b-2 border-white hover:border-pink-500">
                            <i class="fa fa-pencil-alt fa-fw mr-3"></i>
                            <span class="pb-1 md:pb-0 text-sm">draw kanji</span>
                        </a>
                    </li>
                    <li id="category_click" class="mr-6 my-2 md:my-0">
                        <a href="#" 
                            class="block py-1 md:py-3 pl-1 align-middle text-pink-600 no-underline hover:text-pink-900 border-b-2 border-white hover:border-pink-500">
                            <i class="fa fa-list fa-fw mr-3"></i>
                            <span class="pb-1 md:pb-0 text-sm">my list</span>
                        </a>
                    </li>

                </ul>



            </div>

        </div>
    </nav>

    <!--Container-->
    <div class="w-full mx-auto pt-20">

        <div id="home" class="w-full px-6 py-10 bg-gradient-to-br from-pink-50 to-pink-100 min-h-screen text-gray-800">

                <!-- Welcome Header -->
                <div class="text-center mb-12">
                  <h1 class="text-4xl font-extrabold text-pink-600 mb-2 mt-8">Welcome back, Kanji Warrior! 🥋</h1>
                  <p class="text-lg text-gray-600">Keep going — you're mastering kanji step by step!</p>
                  <div class="mt-4 inline-block bg-yellow-300 text-yellow-900 font-semibold px-4 py-1 rounded-full shadow">Level 5</div>
                </div>
              
                <!-- Progress & XP Section -->
                <div class="mb-10">
                  <div class="bg-white p-6 rounded-2xl shadow-lg">
                    <div class="flex justify-between items-center mb-4">
                      <h2 class="text-2xl font-bold text-pink-500">🔥 Your Streak & XP</h2>
                      <span class="text-gray-600">Streak: <span class="font-bold text-pink-600">12 days</span></span>
                    </div>
                    <div class="w-full bg-pink-200 h-4 rounded-full overflow-hidden shadow-inner">
                      <div class="bg-pink-500 h-full w-[65%]"></div>
                    </div>
                    <p class="mt-2 text-sm text-right text-gray-500">XP: 650 / 1000</p>
                  </div>
                </div>
              
                <!-- Stats Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                  <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-pink-400">
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">📘 Total Kanji Learned</h3>
                    <p class="text-3xl font-bold text-pink-600">120</p>
                  </div>
                  <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-green-400">
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">🎯 Kanji Mastered</h3>
                    <p class="text-3xl font-bold text-green-600">85</p>
                  </div>
                  <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-yellow-400">
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">🔥 Streak</h3>
                    <p class="text-3xl font-bold text-yellow-600">12 days</p>
                  </div>
                  <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-400">
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">⚡ Current XP</h3>
                    <p class="text-3xl font-bold text-blue-600">650</p>
                  </div>
                </div>
              
                <!-- Struggled Kanji Section -->
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-pink-200">
                  <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-bold text-pink-500">🧐 Struggled With</h2>
                    <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full transition shadow">
                      Review Again
                    </button>
                  </div>
                  <div class="flex gap-4 flex-wrap">
                    <!-- Struggled Kanji Cards -->
                    <div class="bg-pink-100 border-2 border-pink-400 text-pink-700 font-bold text-2xl px-4 py-3 rounded-lg shadow">悩</div>
                    <div class="bg-pink-100 border-2 border-pink-400 text-pink-700 font-bold text-2xl px-4 py-3 rounded-lg shadow">難</div>
                    <div class="bg-pink-100 border-2 border-pink-400 text-pink-700 font-bold text-2xl px-4 py-3 rounded-lg shadow">忘</div>
                    <!-- Add more as needed -->
                  </div>
                </div>
              
        </div>

        <div id="user"
    class="hidden w-full px-6 mb-16 md:py-6 md:mt-8 text-gray-800 leading-relaxed relative">

    <div class="flex flex-col lg:flex-row gap-12 items-start justify-center">

        <!-- Canvas Section -->
        <div class="flex flex-col items-center gap-6 bg-white p-6 rounded-3xl shadow-xl border border-pink-200">
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
            <div class="flex justify-between items-center bg-white p-4 rounded-2xl shadow border border-pink-300">
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
           


            <div class="bg-gradient-to-br from-pink-100 to-pink-200 border-2 border-pink-400 p-6 rounded-3xl shadow">
                <h2 class="text-2xl font-bold text-pink-700 mb-4">🌸 Kanji Info:</h2>
                <div id="reading" class="text-lg text-gray-800 leading-relaxed text-left space-y-2">
                </div>
               
            </div>
            <div id="strok_order" class="flex gap-">

            </div>
        </div>
        
    </div>
</div>



        <div id="category" class=" hidden w-full md:py-6 md:mt-8 mb-16 text-gray-800">
          <div class="flex justify-end  space-x-4 mb-8 mr-8">
            <button id="flashcard_click" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-xl shadow-md transition flex items-center space-x-2">
              <i class="fas fa-clone"></i>
              <span>Flash Cards</span>
            </button>
            <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-xl shadow-md transition flex items-center space-x-2">
              <i class="fas fa-brain"></i>
              <span>Memory Game</span>
            </button>
            <button id="quiz_click" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-xl shadow-md transition flex items-center space-x-2">
              <i class="fas fa-question-circle"></i>
              <span>Quiz</span>
            </button>
          </div>
           
            <div class="grid grid-cols-4 gap-4  mx-20">

              
              @foreach ($savedKanjis as $kanji)
              <div class="bg-pink-600 hover:bg-pink-700 transition text-white text-center rounded-xl border-4 border-green-400 p-4 shadow-lg cursor-pointer">
                <div class="text-sm">{{ $kanji->reading_on }}.{{ $kanji->reading_kon }}</div>
                {{-- <div class="text-sm">イチ・ひと-</div> --}}
                <div class="text-4xl font-bold my-2">{{ $kanji->kanji_character }}</div>
                <div class="uppercase text-xs tracking-widest">{{ $kanji->meaning }}</div>
              </div>
                  
              @endforeach
            
            </div>

  </div>
  <div id="flashcard" class=" hidden w-full md:py-6 md:mt-8 mb-16 text-gray-800 ">
<!-- Flashcard Section -->
    <h2 class="text-4xl font-extrabold text-center text-pink-600 mb-10 drop-shadow">🃏 Master Your Kanji</h2>
  
    <div class="carousel flex justify-center">
        <h1 class="text-pink-500">no cards added </h1>
    </div>
  
    <div class="flex justify-center mt-10 space-x-6">
      <button class="prev bg-pink-500 hover:bg-pink-600 text-white font-bold px-6 py-3 rounded-full shadow-lg transition-all">
        ⬅ Previous
      </button>
      <button class="next bg-pink-500 hover:bg-pink-600 text-white font-bold px-6 py-3 rounded-full shadow-lg transition-all">
        Next ➡
      </button>
    </div>
  
  
  </div>
  <div id="quiz_menu" class="hidden w-full py-8 mt-12 mb-16 text-gray-800">
    <h2 class="text-3xl font-extrabold text-pink-600 mb-10 text-center">📝 Test Your Kanji Skills</h2>
  
    <div class="flex flex-col items-center gap-6">
      <!-- Guess Meaning Quiz -->
      <button id="click_quiz_meaning" class="flex items-center gap-4 bg-white hover:bg-pink-100 text-pink-600 font-semibold py-4 px-8 rounded-2xl shadow-md text-lg transition w-full max-w-md border-l-8 border-pink-400">
        <i class="fas fa-question-circle text-pink-500 text-2xl"></i>
        <span>Guess the Kanji Meaning</span>
      </button>
  
      <!-- Guess Reading Quiz -->
      <button id="click_quiz_reading" class="flex items-center gap-4 bg-white hover:bg-pink-100 text-pink-600 font-semibold py-4 px-8 rounded-2xl shadow-md text-lg transition w-full max-w-md border-l-8 border-pink-400">
        <i class="fas fa-book-open text-pink-500 text-2xl"></i>
        <span>Guess the Kanji Reading</span>
      </button>
    </div>
  </div>
  
  
  <div id="quiz_meaning" class=" hidden w-full md:py-6 md:mt-8 mb-16 text-gray-800 ">
    <h2 class="text-3xl font-extrabold text-pink-600 mb-10 text-center">📝 Guess the Kanji Meaning</h2>


    <div class="bg-white p-8 rounded-2xl shadow-lg mb-12 mr-5 ml-5 border-4  border-pink-400">
      
        <!-- Question -->
        <div class="mb-8">
          <p class="text-xl font-bold text-gray-800 text-center">
            What is the meaning of the kanji <span class="text-pink-500 text-4xl">花</span>?
          </p>
        </div>
      
        <!-- Answers -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <button class="bg-pink-100 hover:bg-pink-200 text-pink-600 font-semibold py-4 px-6 rounded-lg shadow text-lg transition w-full">
            A) River
          </button>
      
          <button class="bg-pink-100 hover:bg-pink-200 text-pink-600 font-semibold py-4 px-6 rounded-lg shadow text-lg transition w-full">
            B) Mountain
          </button>
      
          <button class="bg-pink-100 hover:bg-pink-200 text-pink-600 font-semibold py-4 px-6 rounded-lg shadow text-lg transition w-full">
            C) Flower
          </button>
      
          <button class="bg-pink-100 hover:bg-pink-200 text-pink-600 font-semibold py-4 px-6 rounded-lg shadow text-lg transition w-full">
            D) Tree
          </button>
        </div>
      
        <!-- Navigation Buttons -->
        <div class="flex justify-between mt-10">
          <button class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-3 px-6 rounded-lg shadow transition">
            Previous
          </button>
          <button class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-3 px-6 rounded-lg shadow transition">
            Next
          </button>
        </div>
      </div>
      
  </div>
  <div id="quiz_reading" class=" hidden w-full md:py-6 md:mt-8 mb-16 text-gray-800 ">
    <h2 class="text-3xl font-extrabold text-pink-600 mb-10 text-center">📝 Guess the Kanji Reading</h2>


    <div class="bg-white p-8 rounded-2xl shadow-lg mb-12 mr-5 ml-5 border-4  border-pink-400">
      
        <!-- Question -->
        <div class="mb-8">
          <p class="text-xl font-bold text-gray-800 text-center">
            What is the reading of the kanji <span class="text-pink-500 text-4xl">花</span>?
          </p>
        </div>
      
        <!-- Answers -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <button class="bg-pink-100 hover:bg-pink-200 text-pink-600 font-semibold py-4 px-6 rounded-lg shadow text-lg transition w-full">
            A)やま 
          </button>
      
          <button class="bg-pink-100 hover:bg-pink-200 text-pink-600 font-semibold py-4 px-6 rounded-lg shadow text-lg transition w-full">
            B) かわ
          </button>
      
          <button class="bg-pink-100 hover:bg-pink-200 text-pink-600 font-semibold py-4 px-6 rounded-lg shadow text-lg transition w-full">
            C) き
          </button>
      
          <button class="bg-pink-100 hover:bg-pink-200 text-pink-600 font-semibold py-4 px-6 rounded-lg shadow text-lg transition w-full">
            D) はな
          </button>
        </div>
      
        <!-- Navigation Buttons -->
        <div class="flex justify-between mt-10">
          <button class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-3 px-6 rounded-lg shadow transition">
            Previous
          </button>
          <button class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-3 px-6 rounded-lg shadow transition">
            Next
          </button>
        </div>
      </div>
      {{-- <div class="flex justify-center mt-10">
        <button id="quiz_menu" class="flex items-center gap-3 bg-white hover:bg-pink-100 text-pink-600 font-bold py-3 px-8 rounded-2xl shadow-md text-lg transition border-l-8 border-pink-400">
          <i class="fas fa-arrow-left text-pink-500 text-2xl"></i>
          <span>Back to Menu</span>
        </button>
      </div> --}}
      
      
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
            console.log("home");

            home.classList.remove('hidden');
            category.classList.add('hidden');
            user.classList.add('hidden');
            flashcard.classList.add('hidden');
            quiz.classList.add('hidden');
            quiz_meaning.classList.add('hidden');
            quiz_reading.classList.add('hidden');
        });

        category_click.addEventListener("click", () => {

            home.classList.add('hidden');
            category.classList.remove('hidden');
            user.classList.add('hidden');
            flashcard.classList.add('hidden');
            quiz.classList.add('hidden');
            quiz_meaning.classList.add('hidden');
            quiz_reading.classList.add('hidden');




        });
        user_click.addEventListener("click", () => {

            home.classList.add('hidden');
            category.classList.add('hidden');
            user.classList.remove('hidden');
            flashcard.classList.add('hidden');
            quiz.classList.add('hidden');
            quiz_meaning.classList.add('hidden');
            quiz_reading.classList.add('hidden');




        });
        flashcard_click.addEventListener("click", () => {

            home.classList.add('hidden');
            category.classList.add('hidden');
            user.classList.add('hidden');
            flashcard.classList.remove('hidden');
            quiz.classList.add('hidden');
            quiz_meaning.classList.add('hidden');
            quiz_reading.classList.add('hidden');




        });
        quiz_click.addEventListener("click", () => {

            home.classList.add('hidden');
            category.classList.add('hidden');
            user.classList.add('hidden');
            quiz.classList.remove('hidden');
            flashcard.classList.add('hidden');
            quiz_meaning.classList.add('hidden');
            quiz_reading.classList.add('hidden');




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
                    localStorage.setItem("kanji_id",currentKanjiId);
                    document.getElementById('kanji_id').value= currentKanjiId

            document.getElementById("reading").innerHTML = `
              <strong>Kanji:</strong> ${info.kanji}<br>
              <strong>JLPT:</strong> N${info.jlpt}<br>
              <strong>Meanings:</strong> ${info.meanings.slice(0, 3).join(', ')}<br>
              <strong>Onyomi:</strong> ${info.on_readings.join(', ') || 'N/A'}<br>
              <strong>Kunyomi:</strong> ${info.kun_readings.join(', ') || 'N/A'}<br>
              <strong>Grade:</strong> ${info.grade || 'N/A'}
            `;
            document.getElementById('strok_order').innerHTML=`
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
            document.getElementById('strok_order').innerHTML="";
 

            }

// flashcard 
           
    let cards = @json($flashcardCard);
    console.log(cards);

    let currentCard=0;

    carousel=document.querySelector(".carousel");
    prev=document.querySelector(".prev");
    next=document.querySelector(".next");
   renderCard();
   
function renderCard(){
   carousel.innerHTML=`
    <div class="relative w-[28rem] h-[20rem] bg-white rounded-3xl shadow-2xl border-4 border-pink-400 cursor-pointer transform transition hover:scale-105 group">
        <!-- Front of the card -->
        <div class="absolute inset-0 flex items-center justify-center text-[6rem] font-extrabold text-pink-600 group-hover:hidden">
          ${cards[currentCard].kanji}
        </div> 
                                     
        <!-- Back of the card -->
        <div class="absolute inset-0 flex flex-col justify-center items-center hidden group-hover:flex text-center p-6 bg-pink-50 rounded-3xl">
          <p class="text-2xl font-bold text-pink-500 mb-2">Reading on: ${cards[currentCard].on_readings}</p>
          <p class="text-2xl font-bold text-pink-500 mb-2">Reading kun: ${cards[currentCard].kun_readings}</p>
          <p class="text-lg text-gray-700 mb-4">Meaning: ${cards[currentCard].meanings} </p>
          <span class="inline-block bg-pink-200 text-pink-800 px-4 py-1 rounded-full text-sm font-semibold">JLPT N${cards[currentCard].jlpt}</span>
        </div>
      </div>

   `
  

}
next.addEventListener('click',function(e){
    if(currentCard>=cards.length){
        return;
    }
    currentCard++
    renderCard();

})

prev.addEventListener('click',function(e){
    if(currentCard<=0){
        return;
    }
    currentCard--;
    renderCard();

})
     


    </script>


</body>

</html>
