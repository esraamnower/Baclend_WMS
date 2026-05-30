<x-app-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-extrabold text-[#005f8a]">التقارير والتصدير</h2>
        <p class="text-gray-500 text-sm mt-1">توليد تقارير مخصصة للنظام وتصديرها بصيغ (PDF, Excel).</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
            <div class="md:col-span-2">
                <label class="block text-xs font-bold text-gray-700 mb-2">نوع التقرير المطلوب</label>
                <select class="w-full border-gray-200 rounded-xl text-sm px-4 py-3 focus:ring-[#00a8e8] bg-gray-50">
                    <option>تقرير المخزون الشامل</option>
                    <option>تقرير الطلبات وحركة المواد</option>
                    <option>تقرير الجرد السنوي</option>
                    <option>تقرير المواد التالفة</option>
                    <option>تقرير الصيانة</option>
                    <option>تقرير العهدة (للمدربين)</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-2">من تاريخ</label>
                <input type="date" class="w-full border-gray-200 rounded-xl text-sm px-4 py-3 focus:ring-[#00a8e8] bg-gray-50">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-2">إلى تاريخ</label>
                <input type="date" class="w-full border-gray-200 rounded-xl text-sm px-4 py-3 focus:ring-[#00a8e8] bg-gray-50">
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 text-center">
        <div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4 text-[#005f8a]">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        </div>
        <h3 class="text-lg font-black text-gray-800 mb-2">التقرير جاهز للتوليد</h3>
        <p class="text-sm text-gray-500 mb-6 max-w-md mx-auto">اختر الصيغة المناسبة لتصدير البيانات، يمكنك تحميلها كملف Excel للجداول أو كملف PDF للطباعة الرسمية.</p>
        
        <div class="flex justify-center gap-4">
            <button class="flex items-center gap-2 bg-red-50 text-red-600 hover:bg-red-100 font-bold py-3 px-6 rounded-xl transition-colors border border-red-100">
                <i class="fas fa-file-pdf text-lg"></i> تصدير كـ PDF
            </button>
            <button class="flex items-center gap-2 bg-green-50 text-green-600 hover:bg-green-100 font-bold py-3 px-6 rounded-xl transition-colors border border-green-100">
                <i class="fas fa-file-excel text-lg"></i> تصدير كـ Excel
            </button>
        </div>
    </div>
</x-app-layout>