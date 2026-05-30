<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>إنشاء حساب - نظام المستودع</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased bg-gray-100">

    <div class="absolute top-0 w-full h-64 bg-[#005f8a] shadow-lg z-0 rounded-b-[50px]"></div>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative z-10 px-4">
        
        <div class="w-full sm:max-w-md px-8 py-10 bg-white shadow-2xl rounded-[30px] border border-gray-100 mt-10">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-black text-[#005f8a]">إنشاء حساب جديد</h2>
                <p class="text-gray-500 font-bold mt-1">أدخل بيانات المستخدم بدقة</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="grid grid-cols-1 gap-5">
                    <div>
                        <label class="block font-bold text-sm text-gray-700 mr-1">الاسم الكامل</label>
                        <input id="name" class="block mt-1.5 w-full border-gray-200 focus:border-[#00a8e8] rounded-xl px-4 py-3 bg-gray-50" type="text" name="name" required autofocus />
                    </div>

                    <div>
                        <label class="block font-bold text-sm text-gray-700 mr-1">البريد الإلكتروني</label>
                        <input id="email" class="block mt-1.5 w-full border-gray-200 focus:border-[#00a8e8] rounded-xl px-4 py-3 bg-gray-50" type="email" name="email" required />
                    </div>

                    <div>
                        <label class="block font-bold text-sm text-gray-700 mr-1">كلمة المرور</label>
                        <input id="password" class="block mt-1.5 w-full border-gray-200 focus:border-[#00a8e8] rounded-xl px-4 py-3 bg-gray-50" type="password" name="password" required />
                    </div>

                    <div>
                        <label class="block font-bold text-sm text-gray-700 mr-1">تأكيد كلمة المرور</label>
                        <input id="password_confirmation" class="block mt-1.5 w-full border-gray-200 focus:border-[#00a8e8] rounded-xl px-4 py-3 bg-gray-50" type="password" name="password_confirmation" required />
                    </div>
                </div>

                <button type="submit" class="w-full mt-8 bg-[#005f8a] hover:bg-[#004d73] text-white font-black py-3.5 rounded-xl shadow-lg transition-all transform hover:-translate-y-1">
                    إنشاء الحساب
                </button>

                <p class="text-center mt-6 text-sm text-gray-600 font-bold">
                    لديك حساب بالفعل؟ <a href="{{ route('login') }}" class="text-[#005f8a] hover:underline">سجل دخولك</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>