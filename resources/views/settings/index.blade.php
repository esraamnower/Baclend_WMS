<x-app-layout>
    <div class="mb-6 flex justify-between items-end">
        <div>
            <h2 class="text-2xl font-extrabold text-[#005f8a]">إعدادات النظام</h2>
            <p class="text-gray-500 text-sm mt-1">تكوين الخصائص الأساسية، التصنيفات، والقيم الافتراضية للعمليات.</p>
        </div>
        <button class="bg-[#00a8e8] text-white font-bold py-2.5 px-6 rounded-xl hover:bg-[#0073a8] transition-colors shadow-md">حفظ كافة التعديلات</button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h3 class="font-black text-gray-800 mb-4 border-r-4 border-[#00a8e8] pr-3">القيم الافتراضية والحدود</h3>
            <div class="space-y-5">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">الحد الأدنى للمخزون (الافتراضي)</label>
                    <div class="relative">
                        <input type="number" value="10" class="w-full border-gray-200 rounded-xl text-sm px-4 py-2.5 focus:ring-[#00a8e8]">
                        <span class="absolute left-4 top-2.5 text-xs text-gray-400 font-bold">وحدة</span>
                    </div>
                    <p class="text-[10px] text-gray-400 mt-1">سيقوم النظام بإرسال تنبيه عند وصول أي مادة لهذا الرقم.</p>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">مدة الإعارة الافتراضية (للمدربين)</label>
                    <div class="relative">
                        <input type="number" value="14" class="w-full border-gray-200 rounded-xl text-sm px-4 py-2.5 focus:ring-[#00a8e8]">
                        <span class="absolute left-4 top-2.5 text-xs text-gray-400 font-bold">يوم</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h3 class="font-black text-gray-800 mb-4 border-r-4 border-purple-500 pr-3">إدارة تصنيفات المواد</h3>
            <div class="flex gap-2 mb-4">
                <input type="text" placeholder="إضافة تصنيف جديد..." class="flex-1 border-gray-200 rounded-xl text-sm px-3 py-2">
                <button class="bg-gray-100 text-gray-600 font-bold px-4 rounded-xl text-sm hover:bg-gray-200">إضافة</button>
            </div>
            <div class="flex flex-wrap gap-2">
                <span class="bg-purple-50 text-purple-700 px-3 py-1.5 rounded-lg text-xs font-bold border border-purple-100 flex items-center gap-2">معدات شبكات <button class="text-purple-400 hover:text-red-500"><i class="fas fa-times"></i></button></span>
                <span class="bg-purple-50 text-purple-700 px-3 py-1.5 rounded-lg text-xs font-bold border border-purple-100 flex items-center gap-2">ملحقات حاسب <button class="text-purple-400 hover:text-red-500"><i class="fas fa-times"></i></button></span>
                <span class="bg-purple-50 text-purple-700 px-3 py-1.5 rounded-lg text-xs font-bold border border-purple-100 flex items-center gap-2">كابلات ووصلات <button class="text-purple-400 hover:text-red-500"><i class="fas fa-times"></i></button></span>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:col-span-2">
            <h3 class="font-black text-gray-800 mb-4 border-r-4 border-orange-500 pr-3">أنواع حالات المواد (Status)</h3>
            <div class="flex flex-wrap gap-3">
                <div class="flex items-center gap-2 px-4 py-2 border border-gray-200 rounded-xl bg-gray-50">
                    <span class="w-2 h-2 rounded-full bg-green-500"></span>
                    <span class="text-sm font-bold text-gray-700">جديد / متاح</span>
                </div>
                <div class="flex items-center gap-2 px-4 py-2 border border-gray-200 rounded-xl bg-gray-50">
                    <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                    <span class="text-sm font-bold text-gray-700">معار (في عهدة)</span>
                </div>
                <div class="flex items-center gap-2 px-4 py-2 border border-gray-200 rounded-xl bg-gray-50">
                    <span class="w-2 h-2 rounded-full bg-orange-500"></span>
                    <span class="text-sm font-bold text-gray-700">قيد الصيانة</span>
                </div>
                <div class="flex items-center gap-2 px-4 py-2 border border-gray-200 rounded-xl bg-gray-50">
                    <span class="w-2 h-2 rounded-full bg-red-500"></span>
                    <span class="text-sm font-bold text-gray-700">تالف / متلف</span>
                </div>
                <button class="px-4 py-2 border border-dashed border-gray-300 rounded-xl text-sm font-bold text-gray-400 hover:border-[#00a8e8] hover:text-[#00a8e8] transition-colors">
                    + إضافة حالة مخصصة
                </button>
            </div>
        </div>

    </div>
</x-app-layout>