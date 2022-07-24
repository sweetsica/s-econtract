<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @tailwind base;
        @tailwind components;
        @tailwind utilities;
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<div
    class="relative flex items-top sm:px-3 justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0" style="background-color: white">
    <div class="text-center w-full px-3">
        <img class="w-40 h-40 object-cover m-auto mb-4"
             src="https://doppelherz.vn/wp-content/uploads/2022/01/LOGO-DOPPELHERZ-Logo-tren-an-pham-792x800.png"/>
        <h1 class="text-2xl font-black text-gray-800 my-5">HỢP ĐỒNG ĐIỆN TỬ - DOPPELHERZ VIỆT NAM</h1>
        <div class="max-w-xl p-6 bg-white m-auto">
            <a href="{{route('member.login')}}">
                <button class="bg-blue-500 text-lg mb-4 hover:bg-blue-700 text-white font-bold w-full py-4 rounded">
                    Đăng nhập dành cho Admin
                </button>
            </a>
            <a href="{{route('member.login')}}">
                <button class="bg-blue-500 text-lg mb-4 hover:bg-blue-700 text-white font-bold w-full py-4 rounded">
                    Đăng nhập dành cho Thành viên
                </button>
            </a>
            <a href="{{route('partner.login')}}">
                <button class="bg-blue-500 text-lg mb-4 hover:bg-blue-700 text-white font-bold w-full py-4 rounded">
                    Đăng nhập dành cho Đối tác
                </button>
            </a>
            <a href="{{route('contract.seach')}}">
                <button class="bg-blue-500 text-lg hover:bg-blue-700 text-white font-bold w-full py-4 rounded">
                    Tìm xuất hợp đồng
                </button>
            </a>
        </div>
    </div>
</div>
</body>
</html>
