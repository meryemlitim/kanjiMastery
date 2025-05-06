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
                            <img class="w-10 h-10 rounded-full mr-4" src="https://thicc-uwu.mywaifulist.moe/pending/waifus/vz2w3qrSjLVct05NrnUUBQI5Hy6Krn1Xh4PuspmF.jpg" alt="Avatar of User">
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
                            class="block py-1 md:py-3 pl-1 align-middle text-pink-600 no-underline hover:text-pink-900 ">
                            <i class="fas fa-home fa-fw mr-3 text-pink-800"></i><span
                                class="pb-1 md:pb-0 text-sm">Home</span>
                        </a>
                    </li>
                    <li id="user_click" class="mr-6 my-2 md:my-0">
                        <a href="#"
                            class="block py-1 md:py-3 pl-1 align-middle text-pink-600 no-underline hover:text-pink-900 border-b-2 border-white hover:border-pink-500">
                            <i class="fa fa-pencil-alt fa-fw mr-3"></i>
                            <span class="pb-1 md:pb-0 text-sm">Kanji Management</span>
                        </a>
                    </li>
                    <li id="category_click" class="mr-6 my-2 md:my-0">
                        <a href="#" 
                            class="block py-1 md:py-3 pl-1 align-middle text-pink-600 no-underline hover:text-pink-900 border-b-2 border-white hover:border-pink-500">
                            <i class="fa fa-list fa-fw mr-3"></i>
                            <span class="pb-1 md:pb-0 text-sm">Users Management</span>
                        </a>
                    </li>

                </ul>



            </div>

        </div>
    </nav>

    <!--Container-->
    <div class="w-full mx-auto pt-20">

        <div id="home" class="hidden w-full px-6 mb-16 md:py-6 md:mt-8 text-gray-800 leading-relaxed relative">
<!-- Admin Dashboard Home -->
<div class="w-full px-6 py-10 md:py-16 bg-pink-50 rounded-2xl shadow-lg">
    <h1 class="text-4xl font-extrabold text-pink-600 mb-6 text-center">Hello, {{$user->name}}</h1>
    <p class="text-center text-gray-700 mb-10 text-lg">Welcome back to your admin dashboard!</p>
  
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
      <div class="bg-white border-4 border-pink-300 rounded-xl p-6 shadow-md flex items-center justify-between">
        <div>
          <h2 class="text-xl font-bold text-pink-600 mb-1">Total Kanji</h2>
          <p class="text-3xl font-extrabold text-gray-800">{{ $kanji_number }}</p>
        </div>
        <div class="text-pink-400 text-5xl">🈷️</div>
      </div>
  
      <div class="bg-white border-4 border-pink-300 rounded-xl p-6 shadow-md flex items-center justify-between">
        <div>
          <h2 class="text-xl font-bold text-pink-600 mb-1">Registered Users</h2>
          <p class="text-3xl font-extrabold text-gray-800">{{ $user_number }} </p>
        </div>
        <div class="text-pink-400 text-5xl">👥</div>
      </div>
    </div>
  
    <!-- Management Buttons -->
    {{-- <div class="flex flex-col md:flex-row gap-6 justify-center">
      <button class="bg-pink-500 hover:bg-pink-600 text-white font-semibold px-8 py-3 rounded-full shadow-lg transition">
        📘 Manage Kanjis
      </button>
      <button class="bg-pink-500 hover:bg-pink-600 text-white font-semibold px-8 py-3 rounded-full shadow-lg transition">
        👤 Manage Users
      </button>
    </div> --}}
  </div>
          </div>

        <div id="user"
    class="hidden w-full px-6 mb-16 md:py-6 md:mt-8 text-gray-800 leading-relaxed relative">
<!-- Add Kanji Section -->
<div class="bg-white p-8 rounded-2xl shadow-lg mb-12 border-l-8 border-pink-400">
    <h2 class="text-3xl font-extrabold text-pink-600 mb-6">➕ Add New Kanji</h2>
  
    <form class="grid grid-cols-1 md:grid-cols-2 gap-6" action="{{ route('add_kanji') }}" method="post" >
        @csrf

      <div>
        <label class="block text-gray-700 font-semibold mb-1">Kanji Character</label>
        <input name="kanji_character" type="text" placeholder="例: 花" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400">
      </div>
  
      <div>
        <label class="block text-gray-700 font-semibold mb-1">Meaning</label>
        <input name="meaning" type="text" placeholder="Example: Flower" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400">
      </div>
  
      <div>
        <label class="block text-gray-700 font-semibold mb-1">On'yomi Reading</label>
        <input name="reading_on" type="text" placeholder="例: カ (ka)" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400">
      </div>
  
      <div>
        <label class="block text-gray-700 font-semibold mb-1">Kun'yomi Reading</label>
        <input name="reading_kon" type="text" placeholder="例: はな (hana)" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400">
      </div>
  
      <div>
        <label class="block text-gray-700 font-semibold mb-1">JLPT Level</label>
        <input name="jlpt_level" type="number" placeholder="Example: 5" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400">
      </div>
  
      <div>
        <label class="block text-gray-700 font-semibold mb-1">Grade Level</label>
        <input name="grade" type="number" placeholder="Example: 1" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400">
      </div>
  
      <div>
        <label class="block text-gray-700 font-semibold mb-1">Strokes Number</label>
        <input name="radical" type="number" placeholder="Example: 7" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400">
      </div>
  
      <div>
        <label class="block text-gray-700 font-semibold mb-1">Stroke Order</label>
        <textarea name="stroke_order" placeholder="Paste stroke order image link here..." class="w-full p-3 border rounded-lg resize-none h-32 focus:outline-none focus:ring-2 focus:ring-pink-400"></textarea>
      </div>
  
      <div class="md:col-span-2">
        <label class="block text-gray-700 font-semibold mb-1">Memory Trick</label>
        <textarea name="memory_trick" placeholder="Paste Memory Trick image link here..." class="w-full p-3 border rounded-lg resize-none h-28 focus:outline-none focus:ring-2 focus:ring-pink-400"></textarea>
      </div>
  
      <div class="md:col-span-2">
        <label class="block text-gray-700 font-semibold mb-1">Examples</label>
        <textarea name="exemples" placeholder="花火 (はなび) - Fireworks, 花見 (はなみ) - Flower viewing" class="w-full p-3 border rounded-lg resize-none h-28 focus:outline-none focus:ring-2 focus:ring-pink-400"></textarea>
      </div>
  
      <div class="md:col-span-2 text-right">
        <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-3 px-6 rounded-lg shadow transition">
          Save Kanji
        </button>
      </div>
  
    </form>
  </div>
  
<!-- Kanji List Section -->
<div class="bg-white p-8 rounded-2xl shadow-lg border-l-8 border-pink-400">
    <h2 class="text-3xl font-extrabold text-pink-600 mb-6">📚 Kanji List</h2>
  
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white border rounded-lg overflow-hidden">
        <thead class="bg-pink-100 text-pink-700 font-semibold">
          <tr>
            <th class="py-3 px-4 text-left">Kanji</th>
            <th class="py-3 px-4 text-left">Reading</th>
            <th class="py-3 px-4 text-left">Meaning</th>
            <th class="py-3 px-4 text-left">Level</th>
            <th class="py-3 px-4 text-center">Actions</th>
          </tr>
        </thead>
        <tbody class="text-gray-700 divide-y divide-pink-100">
         @foreach ($allKanji as $kanji)
           
            <tr>
              <td class="py-3 px-4 text-2xl font-bold">{{ $kanji->kanji_character }}</td>
              <td class="py-3 px-4">{{ $kanji->reading_on }}</td>
              <td class="py-3 px-4">{{ $kanji->meaning }}</td>
              <td class="py-3 px-4">JLPT N{{ $kanji->jlpt_level }}</td>
              <td class="py-3 px-4 text-center space-x-2">
                {{-- <button class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded shadow">Edit</button> --}}
                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow">Delete</button>
              </td>
            </tr>
            <!-- More rows can be added here -->
        @endforeach

          </tbody>
        
      </table>
    </div>
  </div>
  {{-- <img src="https://upload.wikimedia.org/wikipedia/commons/a/ae/%E4%B8%89-order.gif" alt=""> --}}
       
</div>



        <div id="category" class="hidden w-full px-6 mb-16 md:py-6 md:mt-8 text-gray-800 leading-relaxed relative">
          
<!-- Manage Users Section -->
<div class="bg-white p-8 rounded-2xl shadow-lg border-l-8 border-pink-400">
    <h2 class="text-3xl font-extrabold text-pink-600 mb-6">👥 Users Management</h2>
  
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white border rounded-lg overflow-hidden">
        <thead class="bg-pink-100 text-pink-700 font-semibold">
          <tr>
            <th class="py-3 px-4 text-left">Name</th>
            <th class="py-3 px-4 text-left">Email</th>
            <th class="py-3 px-4 text-left">Role</th>
            {{-- <th class="py-3 px-4 text-center">Status</th> --}}
            {{-- <th class="py-3 px-4 text-center">Actions</th> --}}
          </tr>
        </thead>
        <tbody class="text-gray-700 divide-y divide-pink-100">
          @foreach ($all_users as $user )
          <tr>
            <td class="py-3 px-4">{{ $user->name }}</td>
            <td class="py-3 px-4">{{ $user->email }}</td>
            <td class="py-3 px-4">
              <span class="bg-pink-200 text-pink-700 px-3 py-1 rounded-full text-sm font-semibold">{{ $user->role }}</span>
            </td>
            {{-- <td class="py-3 px-4 text-center">
              <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-semibold">Active</span>
            </td> --}}
            {{-- <td class="py-3 px-4 text-center space-x-2">
              <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded shadow text-sm">View</button>
              <button class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded shadow text-sm">Edit</button>
              <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow text-sm">Delete</button>
            </td> --}}
          </tr>
              
          @endforeach
  
          <!-- Add more users here as needed -->
        </tbody>
      </table>
    </div>
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
        const home_click = document.getElementById("home_click");
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

            user_click.style.borderBottom = ""
            category_click.style = ""
            home_click.style = "2px solid #D5006D";
        });

        category_click.addEventListener("click", () => {

            home.classList.add('hidden');
            category.classList.remove('hidden');
            user.classList.add('hidden');

            category_click.style.borderBottom = "2px solid #D5006D"
            user_click.style.removeProperty("border-bottom");
            home_click.style.removeProperty("border-bottom");



        });
        user_click.addEventListener("click", () => {

            home.classList.add('hidden');
            category.classList.add('hidden');
            user.classList.remove('hidden');

            user_click.style.borderBottom = "2px solid #D5006D"
            category_click.style = ""
            home_click.style = "";

        });
       


       
    </script>


</body>

</html>
