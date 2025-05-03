<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    <div class="relative bg-cover bg-center h-[700px] w-full " style="background-image: url('https://gaijinpot.scdn3.secure.raxcdn.com/app/uploads/sites/4/2022/03/iStock-kumikomini_edit1.jpg'); margin-bottom: 90px;">

    <div class="container mx-auto p-4">
        <nav class="flex items-center justify-between  py-3 px-5 ">
            <a href="index.html" class="flex items-center text-primary">
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <span class="absolute text-5xl text-black-500 font-extrabold animate-bounce">漢</span>
                        <span class="text-4xl text-black-500 font-extrabold mt-10">字</span>
                    </div>
            
                    <h1 class="text-2xl font-extrabold uppercase text-black-600 flex items-center space-x-3">
                        <span>Kanji </br>Mastery</span>
                    </h1>
                </div>
            </a>
            
            <button class="lg:hidden text-gray-500" id="menuToggle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <div id="navbarCollapse" class="hidden lg:flex space-x-6 text-1xl">
                <a href="index.html" class="text-black-500 font-extrabold hover:text-pink-600">Home</a>
                <a href="about.html" class="text-black-500 font-extrabold hover:text-pink-600">About</a>
                <a href="contact.html" class="text-black-500 font-extrabold hover:text-pink-600">Contact</a>
            </div>
            @auth
            <a href="{{ route('logout') }}" class="hidden lg:block bg-black text-white py-2 px-4 rounded hover:bg-pink-500 transition">LOGOUT</a>
            @endauth
            @guest
            <a href="/login" class="hidden lg:block bg-black text-white py-2 px-4 rounded hover:bg-pink-500 transition">LOG IN</a>
            @endguest
        </nav>
    </div>

        <div class="relative z-10 text-center text-black py-28">
            <h1 class="text-4xl sm:text-6xl font-extrabold">Welcome to:</h1>
            <br>
            <h1 class="text-4xl sm:text-6xl font-extrabold">Kanji Mastery Platform: 一筆一歩</h1>
          
            <button type="submit"  class="bg-black text-white py-2 px-4 mt-8 w-64 text-1xl rounded-md hover:bg-pink-500 transition">
                <a href="/register">Get started</a>
                
             </button> 
         
        </div>
       
    </div>
    <section>
        <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden flex flex-col md:flex-row">
            <div class="md:w-1/2">
                <img src="https://workinjapan.today/wp-content/uploads/2019/06/pixta_19882608_M-825x550.jpg" alt="Piggy Bank and Calendar" class="w-full h-full object-cover">
            </div>
            
            <div class="md:w-1/2 p-8 flex flex-col justify-center">
                <h2 class="text-2xl font-bold text-black-600 mb-4">What Kanji Mastery About?</h2>
                <div class="w-12 h-1 bg-back mb-4"></div>
                <p class="text-black-700 mb-6">
                    Kanji Mastery is a platform where users can draw a kanji to get its meaning, readings, JLPT level, and stroke order. It also shows memory tricks and example sentences to help users understand how the kanji is used. After exploring the details of a kanji, users can save it to their personal list. This makes it easy to review and organize the kanji they are learning. Users can then practice with flashcards or quizzes to test their knowledge. Kanji Mastery helps make learning kanji easier, more fun, and more effective.
                </p>
                <a href="#" class="bg-black text-white px-6 py-2 rounded-lg font-semibold shadow-md hover:bg-pink-500 transition flex justify-center items-center">READ MORE</a>            </div>
        </div>
    </section>
    <footer class="mt-20 xl:mt-32 mx-auto w-full relative text-center bg-black text-white">
        <div class="px-6 py-8 md:py-14 xl:pt-20 xl:pb-12">
            <h2 class="font-bold text-3xl xl:text-4xl leading-snug">
                From beginner to master<br><br>Your kanji journey starts here!
            </h2>
            <a class="mt-8 xl:mt-12 px-12 py-5 text-lg font-medium leading-tight inline-block bg-pink-700 rounded-full shadow-xl border border-transparent hover:bg-pink-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-sky-999 focus:ring-sky-500"
                href="{{ route('signup') }}">Get
                started</a>
            <div class="mt-14 xl:mt-20">
                <nav class="flex flex-wrap justify-center text-lg font-medium">
                    <div class="px-5 py-2"><a href="#">Home</a></div>
                    <div class="px-5 py-2"><a href="#">Contact</a></div>
                    <div class="px-5 py-2"><a href="#">About</a></div>
                   
                </nav> 
                <p class="mt-7 text-base">© 2025 Kanji Mastery, Meryem Litim.</p>
            </div>
        </div>
    </footer>
    
     
</body>
</html>