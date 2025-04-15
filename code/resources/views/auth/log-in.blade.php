<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Kanji Learning - Sign Up</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg w-11/12 max-w-5xl flex">
        <div class="w-full md:w-3/5 flex flex-col items-center justify-center">
            <h2 class="text-3xl font-bold mb-2">Log In</h2>
            <p class="text-gray-600 mb-6">Welcome back</p>
            
            <form action="{{ route('login_user') }}" method="POST" class="space-y-3">
                @csrf
                <div>
                    <label class="block text-gray-700">Email or phone number</label>
                    <input type="email" name="email" class="w-full p-3 border rounded-md text-lg" placeholder="Email or phone number">
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>

                </div>
                <div>
                    <label class="block text-gray-700">Password</label>
                    <input type="password" name="password" class="w-full p-3 border rounded-md text-lg" placeholder="Password">
                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>

                    <a href="#" class="text-pink-500 text-sm mt-2 inline-block">Forgot password?</a>
                </div>
                <button type="submit" class="w-full bg-pink-500 text-white p-4 rounded-md text-lg font-semibold">LOG IN</button>
                
                <button class="w-full flex justify-center items-center bg-gray-900 text-white p-4 rounded-md text-lg">
                    <img src="https://cdn1.iconfinder.com/data/icons/google-s-logo/150/Google_Icons-09-1024.png" class="w-6 h-6 mr-3"> Log-in with Google
                </button>
                
                <div class="flex items-center space-x-2">
                    <input type="checkbox" id="remember" class="w-5 h-5">
                    <label for="remember" class="text-lg">Remember me</label>
                </div>
                
                <p class="text-center text-lg">Don’t have an account? <a href="#" class="text-pink-500">Sign up</a></p>
            </form>
        </div>

        <!-- Left Side (Image) -->
        <div class="w-2/5 hidden md:block">
            <img src="https://center.cranbrook.edu/sites/default/files/styles/cranbrook__large/public/uploads/shodo2.jpg?itok=WNdqkZQr" alt="Kanji Calligraphy" class="w-full h-full object-cover rounded-l-lg">
        </div>
        
        
        
    </div>
</body>
</html>
