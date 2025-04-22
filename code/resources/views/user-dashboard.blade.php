<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
                <a href="index.html" class="flex items-center text-primary">
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

        <div id="home" class="w-full md:py-6 md:mt-8 mb-16 text-gray-800 leading-normal">

            <h1>home</h1>

        </div>
        <div id="user"
            class="hidden flex flex-col gap-10 w-full md:py-6 md:mt-8 mb-16 text-gray-800 leading-normal relative px-6">
            
            <div class="flex gap-10  align-center ">
                <div class="flex flex-col ">
                    {{-- <h2 class="text-2xl font-semibold mb-2">🎴 Draw a Kanji Below</h2> --}}

                    <canvas id="canvas" width="450" height="450"
                        class="border-2 border-pink-500 cursor-crosshair my-2 mx-auto bg-white  rounded-lg "></canvas>

                    <div class="my-4 space-x-4">
                        <button onclick="recognizeKanji()"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Recognize
                        </button>
                        <button onclick="eraseAll()"
                            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                            Erase
                        </button>
                    </div>
                </div>
                
                <div class="flex flex-col gap-5">
                    <div class="flex justify-between items-center">
                        <div id="result" class="border-2 border-pink-500 px-4 py-1 text-pink-600 font-bold text-xl bg-white rounded-tl-lg rounded-br-lg">
                            
                          </div>
                                                  <!-- Save Icon -->
                        <button class="flex items-center gap-1 bg-pink-500 text-white px-3 py-1 rounded hover:bg-pink-600 transition">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7" />
                          </svg>
                          Save
                        </button>
                      </div>
        
                     <div class="border-2 border-pink-500 bg-pink-200 w-96 h-96 p-5 text-pink-700  rounded-lg">
                      <h2 class="text-2xl font-semibold mb-2">🌸Kanji info</h2>
        
                      <div id="reading" class="mt-5 text-lg leading-relaxed text-left">
                      </div>
        
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
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-xl shadow-md transition flex items-center space-x-2">
              <i class="fas fa-question-circle"></i>
              <span>Quiz</span>
            </button>
          </div>
           
            <div class="grid grid-cols-4 gap-4  mx-20">

              
              <!-- Example Kanji Card -->
              <div class="bg-pink-600 hover:bg-pink-700 transition text-white text-center rounded-xl border-4 border-green-400 p-4 shadow-lg cursor-pointer">
                <div class="text-sm">イチ・ひと-</div>
                <div class="text-4xl font-bold my-2">一</div>
                <div class="uppercase text-xs tracking-widest">ONE</div>
              </div>
              
              <div class="bg-pink-600 hover:bg-pink-700 transition text-white text-center rounded-xl border-4 border-green-400 p-4 shadow-lg cursor-pointer">
                <div class="text-sm">ニ・ふた-</div>
                <div class="text-4xl font-bold my-2">二</div>
                <div class="uppercase text-xs tracking-widest">TWO</div>
              </div>
          
              <div class="bg-pink-600 hover:bg-pink-700 transition text-white text-center rounded-xl border-4 border-green-400 p-4 shadow-lg cursor-pointer">
                <div class="text-sm">サン・み</div>
                <div class="text-4xl font-bold my-2">三</div>
                <div class="uppercase text-xs tracking-widest">THREE</div>
              </div>
              <div class="bg-pink-600 hover:bg-pink-700 transition text-white text-center rounded-xl border-4 border-green-400 p-4 shadow-lg cursor-pointer">
                <div class="text-sm">サン・み</div>
                <div class="text-4xl font-bold my-2">三</div>
                <div class="uppercase text-xs tracking-widest">THREE</div>
              </div>
              <div class="bg-pink-600 hover:bg-pink-700 transition text-white text-center rounded-xl border-4 border-green-400 p-4 shadow-lg cursor-pointer">
                <div class="text-sm">サン・み</div>
                <div class="text-4xl font-bold my-2">三</div>
                <div class="uppercase text-xs tracking-widest">THREE</div>
              </div>
          
              
            </div>
              

  </div>
  <div id="flashcard" class=" hidden w-full md:py-6 md:mt-8 mb-16 text-gray-800 ">
    <h1>flashcard get start</h1>

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
        const flashcard = document.getElementById("flashcard");
        const home_click = document.getElementById("home_click");
        const flashcard_click = document.getElementById("flashcard_click");
        const category_click = document.getElementById("category_click");
        const user_click = document.getElementById("user_click");

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
        });

        category_click.addEventListener("click", () => {

            home.classList.add('hidden');
            category.classList.remove('hidden');
            user.classList.add('hidden');
            flashcard.classList.add('hidden');

        });
        user_click.addEventListener("click", () => {

            home.classList.add('hidden');
            category.classList.add('hidden');
            user.classList.remove('hidden');
            flashcard.classList.add('hidden');

        });
        flashcard_click.addEventListener("click", () => {

            home.classList.add('hidden');
            category.classList.add('hidden');
            user.classList.add('hidden');
            flashcard.classList.remove('hidden');

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

            fetch(`https://kanjiapi.dev/v1/kanji/${kanji}`)
                .then(res => res.json())
                .then(info => {
                    document.getElementById("reading").innerHTML = `
              <strong>Kanji:</strong> ${info.kanji}<br>
              <strong>JLPT:</strong> N${info.jlpt}<br>
              <strong>Meanings:</strong> ${info.meanings.slice(0, 3).join(', ')}<br>
              <strong>Onyomi:</strong> ${info.on_readings.join(', ') || 'N/A'}<br>
              <strong>Kunyomi:</strong> ${info.kun_readings.join(', ') || 'N/A'}<br>
              <strong>Grade:</strong> ${info.grade || 'N/A'}
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
        }
    </script>


</body>

</html>
