<x-app-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-extrabold text-[#005f8a]">سجل العمليات (Audit Trail)</h2>
        <p class="text-gray-500 text-sm mt-1">مراقبة كافة التغييرات والحركات التي قام بها المستخدمون داخل النظام.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-4 border-b border-gray-100 flex gap-4 bg-gray-50/50">
            <input type="text" placeholder="ابحث عن مستخدم أو عملية..." class="flex-1 border-gray-200 rounded-xl text-sm px-4 py-2.5 focus:ring-[#00a8e8]">
            <input type="date" class="border-gray-200 rounded-xl text-sm px-4 py-2.5 focus:ring-[#00a8e8] text-gray-500">
        </div>

        <div class="p-6">
            <div class="relative border-r-2 border-gray-100 pr-6 space-y-8">
                
                <div class="relative">
                    <span class="absolute -right-8 bg-green-100 text-green-600 w-6 h-6 rounded-full flex items-center justify-center border-4 border-white"><i class="fas fa-check text-[10px]"></i></span>
                    <div class="flex justify-between items-start mb-1">
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-gray-800 text-sm">أحمد محمود (رئيس القسم)</span>
                            <span class="bg-gray-100 text-gray-500 text-[10px] px-2 py-0.5 rounded font-bold">إدارة الطلبات</span>
                        </div>
                        <span class="text-xs text-gray-400 font-bold">اليوم، 10:30 صباحاً</span>
                    </div>
                    <p class="text-sm text-gray-600">قام بالموافقة على الطلب <span class="font-bold text-[#005f8a]">#ORD-7742</span> مع ملاحظة: "تم الاعتماد لاستكمال مشروع التخرج".</p>
                </div>

                <div class="relative">
                    <span class="absolute -right-8 bg-blue-100 text-blue-600 w-6 h-6 rounded-full flex items-center justify-center border-4 border-white"><i class="fas fa-edit text-[10px]"></i></span>
                    <div class="flex justify-between items-start mb-1">
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-gray-800 text-sm">سامر العلي (أمين مستودع)</span>
                            <span class="bg-gray-100 text-gray-500 text-[10px] px-2 py-0.5 rounded font-bold">المخزون</span>
                        </div>
                        <span class="text-xs text-gray-400 font-bold">أمس، 02:15 ظهراً</span>
                    </div>
                    <p class="text-sm text-gray-600">قام بإضافة مادة جديدة <span class="font-bold text-[#005f8a]">(كابلات CAT6)</span> برصيد افتتاحي 500 متر.</p>
                </div>

                <div class="relative">
                    <span class="absolute -right-8 bg-orange-100 text-orange-600 w-6 h-6 rounded-full flex items-center justify-center border-4 border-white"><i class="fas fa-exclamation text-[10px]"></i></span>
                    <div class="flex justify-between items-start mb-1">
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-gray-800 text-sm">النظام الآلي</span>
                            <span class="bg-gray-100 text-gray-500 text-[10px] px-2 py-0.5 rounded font-bold">تنبيهات</span>
                        </div>
                        <span class="text-xs text-gray-400 font-bold">أمس، 09:00 صباحاً</span>
                    </div>
                    <p class="text-sm text-red-600 font-bold">تنبيه: انخفاض مخزون مادة (رؤوس RJ45) عن الحد الأدنى المسموح.</p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>