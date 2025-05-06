<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Kanji Learning - Sign Up</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg w-10/11 max-w-5xl flex gap-7">
        <!-- Left Side (Image) -->
        <div class="w-2/5 hidden md:block">
            <img src="https://center.cranbrook.edu/sites/default/files/styles/cranbrook__large/public/uploads/shodo2.jpg?itok=WNdqkZQr" alt="Kanji Calligraphy" class="w-full h-full object-cover rounded-l-lg">
        </div>
        
        <!-- Right Side (Form) -->
        <div class="w-full md:w-3/5 flex flex-col justify-center mr-7">
            <h2 class="text-2xl font-bold mb-2 text-center">Create account</h2>
            <p class="text-gray-600 mb-6 text-center" >Start your kanji learning journey now.</p>
            
            <form action="{{ route('signup_user') }}" method="POST" class="space-y-4 ">
                @csrf
                <div class="flex flex-col">

                    <input type="text" placeholder="First name" name="name" class="w-full p-3 border rounded-md" value="{{ old('name') }}">
                    <span class="text-danger text-pink-400">@error('name'){{ $message }}@enderror</span>

                    {{-- <input type="text" placeholder="Last name" class="w-1/2 p-3 border rounded-md"> --}}
                </div>
                <div class="flex flex-col">

                    <input type="email" placeholder="Email or phone number" name="email" class="w-9/8 p-3 border rounded-md">
                    <span class="text-danger text-pink-400">@error('email'){{ $message }}@enderror</span>

                    {{-- <input type="date" placeholder="Date of birth" class="w-1/2 p-3 border rounded-md"> --}}
                </div>
                <div class="flex flex-col">

                    <input type="password" placeholder="Password" name="password" class="w-7/6 p-3 border rounded-md">
                    <span class="text-danger text-pink-400">@error('password'){{ $message }}@enderror</span>

                    {{-- <input type="password" placeholder="Confirm password" class="w-1/2 p-3 border rounded-md"> --}}
                </div>
                {{-- <div class="flex items-center space-x-2">
                    <input type="checkbox" id="remember" class="w-4 h-4">
                    <label for="remember" class="text-sm">Remember me</label>
                </div>
                <div class="flex items-center space-x-2">
                    <input type="checkbox" id="terms" class="w-4 h-4">
                    <label for="terms" class="text-sm">I agree to all the <a href="#" class="text-pink-500">Terms and Privacy policy</a></label>
                </div> --}}
                <button type="submit" class="w-full bg-pink-500 text-white p-3 rounded-md">Create account</button>
                {{-- <button class="w-full flex justify-center items-center bg-gray-900 text-white p-3 rounded-md">
                    <img src="https://cdn1.iconfinder.com/data/icons/google-s-logo/150/Google_Icons-09-1024.png" class="w-5 h-5 mr-2"> Sign-in with Google
                </button> --}}
                <p class="text-center text-sm">Don’t have an account? <a href="{{ route('login') }}" class="text-pink-500">Log In</a></p>
            </form>
        </div>
    </div>
</body>
</html>
