<x-app-layout>
    <div x-data="{ 
        newSessionModal: false, 
        approveModal: false, 
        discrepancyModal: false 
    }">

        @if(session('success'))
            <div class="mb-4 bg-green-50 border border-green-200 text-green-600 px-4 py-3 rounded-xl text-sm font-bold">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h2 class="text-2xl font-extrabold text-[#005f8a]">الجرد السنوي</h2>
                <p class="text-gray-500 text-sm mt-1">إدارة جلسات الجرد، مطابقة الأرصدة، واعتماد الفروقات (النواقص والزيادات).</p>
            </div>
            
            <button @click="newSessionModal = true" class="bg-[#00a8e8] hover:bg-[#0073a8] text-white font-bold py-2.5 px-5 rounded-xl shadow-md transition-all flex items-center gap-2 text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                إنشاء جلسة جرد جديدة
            </button>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-black text-gray-800 flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-green-500 animate-pulse"></span>
                    جلسة الجرد الحالية نشطة (2026/2027)
                </h3>
                <div class="flex gap-2">
                    <button @click="discrepancyModal = true" class="px-4 py-2 bg-orange-50 text-orange-600 font-bold text-xs rounded-lg hover:bg-orange-100 border border-orange-200">معالجة الفروقات (3)</button>
                    <button @click="approveModal = true" class="px-4 py-2 bg-[#005f8a] text-white font-bold text-xs rounded-lg hover:bg-[#004d73] shadow-md">اعتماد نتيجة الجرد نهائياً</button>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                    <span class="text-xs font-bold text-gray-500 block mb-1">إجمالي المواد المجرودة</span>
                    <span class="text-2xl font-black text-[#005f8a]">1,240 / 1,245</span>
                </div>
                <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                    <span class="text-xs font-bold text-gray-500 block mb-1">نسبة الإنجاز</span>
                    <div class="flex items-center gap-2">
                        <div class="w-full bg-gray-200 rounded-full h-2.5"><div class="bg-green-500 h-2.5 rounded-full" style="width: 98%"></div></div>
                        <span class="text-sm font-bold text-green-600">98%</span>
                    </div>
                </div>
                <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                    <span class="text-xs font-bold text-gray-500 block mb-1">المسؤول عن الجلسة</span>
                    <span class="text-sm font-bold text-gray-800">أ. سامر العلي (أمين المستودع)</span>
                </div>
            </div>
        </div>

        <h3 class="font-black text-gray-700 mb-3 text-lg">سجل فروقات الجرد الحالية</h3>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-right text-sm whitespace-nowrap">
                    <thead class="bg-gray-50 text-gray-600 font-bold border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4">رمز المادة</th>
                            <th class="px-6 py-4">اسم المادة</th>
                            <th class="px-6 py-4">الرصيد الدفتري (النظام)</th>
                            <th class="px-6 py-4">الرصيد الفعلي (الجرد)</th>
                            <th class="px-6 py-4">الفرق</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-gray-500">IT-092</td>
                            <td class="px-6 py-4 font-bold text-gray-800">لوحة أم (Motherboard)</td>
                            <td class="px-6 py-4 font-bold text-gray-500">12</td>
                            <td class="px-6 py-4 font-bold text-[#005f8a]">10</td>
                            <td class="px-6 py-4">
                                <span class="bg-red-50 text-red-600 px-2 py-1 rounded-lg text-xs font-black border border-red-100">-2 (نقص)</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-gray-500">IT-114</td>
                            <td class="px-6 py-4 font-bold text-gray-800">كابلات شاشة (HDMI)</td>
                            <td class="px-6 py-4 font-bold text-gray-500">45</td>
                            <td class="px-6 py-4 font-bold text-[#005f8a]">48</td>
                            <td class="px-6 py-4">
                                <span class="bg-green-50 text-green-600 px-2 py-1 rounded-lg text-xs font-black border border-green-100">+3 (زيادة)</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div x-show="newSessionModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 p-4 backdrop-blur-sm" x-transition>
            <div class="bg-white rounded-3xl max-w-md w-full p-6 shadow-2xl" @click.away="newSessionModal = false">
                <h3 class="text-xl font-black text-[#005f8a] mb-4">إنشاء جلسة جرد جديدة</h3>
                <form action="{{ route('inventory.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">اسم الجلسة / العام الدراسي</label>
                        <input type="text" name="name" required class="w-full border-gray-200 rounded-xl text-sm px-3 py-2.5" placeholder="مثال: جرد نهاية العام 2026">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">تعيين لجنة الجرد</label>
                        <select name="committee" class="w-full border-gray-200 rounded-xl text-sm px-3 py-2.5">
                            <option>أ. سامر العلي (أمين المستودع)</option>
                            <option>لجنة مشتركة</option>
                        </select>
                    </div>
                    <div class="flex justify-end gap-2 pt-4">
                        <button type="button" @click="newSessionModal = false" class="px-4 py-2 border rounded-xl text-sm font-bold text-gray-500">إلغاء</button>
                        <button type="submit" class="px-4 py-2 bg-[#00a8e8] text-white rounded-xl text-sm font-bold shadow-md">بدء الجرد وتجميد الأرصدة</button>
                    </div>
                </form>
            </div>
        </div>

        <div x-show="discrepancyModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 p-4 backdrop-blur-sm" x-transition>
            <div class="bg-white rounded-3xl max-w-md w-full p-6 shadow-2xl border-t-8 border-orange-500" @click.away="discrepancyModal = false">
                <h3 class="text-xl font-black text-orange-900 mb-2">اعتماد وتسوية الفروقات</h3>
                <p class="text-xs text-gray-500 mb-4 leading-relaxed">ستؤدي هذه العملية إلى تعديل الأرصدة في النظام بناءً على الجرد الفعلي. هل تم التحقق من أسباب النقص والزيادة؟</p>
                <form action="{{ route('inventory.resolve') }}" method="POST">
                    @csrf
                    <textarea name="decision" required placeholder="أدخل قرار رئيس القسم بشأن الفروقات (مثال: تحميل المسؤولية، أو إدخال كفائض)..." class="w-full border-gray-200 rounded-xl text-sm p-3 h-24 mb-4 bg-gray-50"></textarea>
                    <div class="flex gap-2">
                        <button type="button" @click="discrepancyModal = false" class="flex-1 py-2.5 border rounded-xl text-sm font-bold text-gray-500">إلغاء</button>
                        <button type="submit" class="flex-1 py-2.5 bg-orange-500 text-white rounded-xl text-sm font-black shadow-md">تسوية وتعديل الأرصدة</button>
                    </div>
                </form>
            </div>
        </div>

        <div x-show="approveModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 p-4 backdrop-blur-sm" x-transition>
            <div class="bg-white rounded-3xl max-w-sm w-full p-6 shadow-2xl text-center" @click.away="approveModal = false">
                <div class="w-16 h-16 rounded-full bg-green-100 text-green-600 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-lg font-black text-gray-800 mb-2">إغلاق واعتماد الجلسة</h3>
                <p class="text-xs text-gray-500 mb-6">بمجرد الاعتماد سيتم إغلاق الجلسة وترصيد المواد للعام القادم بشكل نهائي.</p>
                <form action="{{ route('inventory.close') }}" method="POST">
                    @csrf
                    <div class="flex gap-2">
                        <button type="button" @click="approveModal = false" class="flex-1 py-2.5 border border-gray-200 rounded-xl text-sm font-bold text-gray-600">تراجع</button>
                        <button type="submit" class="flex-1 py-2.5 bg-[#005f8a] text-white rounded-xl text-sm font-black shadow-md">اعتماد وإغلاق</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>