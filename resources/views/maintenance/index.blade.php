<x-app-layout>
    <div x-data="{ 
        actionModal: false, 
        actionType: '', 
        actionColor: '', 
        selectedItem: { name: '', code: '' } 
    }">
        
        <div class="mb-6">
            <h2 class="text-2xl font-extrabold text-[#005f8a]">إدارة الصيانة والتوالف</h2>
            <p class="text-gray-500 text-sm mt-1">مراقبة المواد المتعطلة واتخاذ القرارات الإدارية (إصلاح، إتلاف، أو استبدال).</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="bg-white p-5 rounded-2xl shadow-sm border-b-4 border-red-500 flex justify-between items-center">
                <div>
                    <span class="text-xs font-bold text-gray-400 block mb-1">مواد تالفة / خارج الخدمة</span>
                    <span class="text-2xl font-black text-gray-800">18</span>
                </div>
                <div class="w-12 h-12 bg-red-50 text-red-500 rounded-full flex items-center justify-center"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></div>
            </div>
            <div class="bg-white p-5 rounded-2xl shadow-sm border-b-4 border-orange-500 flex justify-between items-center">
                <div>
                    <span class="text-xs font-bold text-gray-400 block mb-1">مواد قيد الصيانة</span>
                    <span class="text-2xl font-black text-gray-800">5</span>
                </div>
                <div class="w-12 h-12 bg-orange-50 text-orange-500 rounded-full flex items-center justify-center"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg></div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-4 border-b border-gray-100 flex gap-2">
                <button class="px-4 py-2 bg-[#005f8a] text-white text-sm font-bold rounded-lg shadow-md">الكل</button>
                <button class="px-4 py-2 bg-gray-50 text-gray-600 hover:bg-gray-100 text-sm font-bold rounded-lg border border-gray-200">بانتظار القرار</button>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-right text-sm whitespace-nowrap">
                    <thead class="bg-gray-50 text-gray-600 font-bold border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4">الرمز</th>
                            <th class="px-6 py-4">اسم المادة</th>
                            <th class="px-6 py-4">المخبر / الوجهة</th>
                            <th class="px-6 py-4">الحالة الحالية</th>
                            <th class="px-6 py-4 text-center">اتخاذ قرار (لجنة التقنية)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-gray-500">PC-M-01</td>
                            <td class="px-6 py-4 font-bold text-gray-800">شاشة حاسب (Dell 24")</td>
                            <td class="px-6 py-4 text-gray-600">مخبر الشبكات</td>
                            <td class="px-6 py-4">
                                <span class="bg-red-50 text-red-600 text-xs font-black px-3 py-1 rounded-full border border-red-100">تالفة (شاشة مكسورة)</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center items-center gap-2">
                                    <button @click="selectedItem = {name: 'شاشة حاسب (Dell 24)', code: 'PC-M-01'}, actionType = 'إصلاح', actionColor = 'blue', actionModal = true" class="px-3 py-1.5 bg-blue-50 text-blue-600 rounded-lg text-xs font-bold hover:bg-blue-100 border border-blue-200">إرسال للصيانة</button>
                                    <button @click="selectedItem = {name: 'شاشة حاسب (Dell 24)', code: 'PC-M-01'}, actionType = 'استبدال', actionColor = 'orange', actionModal = true" class="px-3 py-1.5 bg-orange-50 text-orange-600 rounded-lg text-xs font-bold hover:bg-orange-100 border border-orange-200">استبدال من المخزون</button>
                                    <button @click="selectedItem = {name: 'شاشة حاسب (Dell 24)', code: 'PC-M-01'}, actionType = 'إتلاف', actionColor = 'red', actionModal = true" class="px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-xs font-bold hover:bg-red-100 border border-red-200">إتلاف نهائي</button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-gray-500">NET-R-05</td>
                            <td class="px-6 py-4 font-bold text-gray-800">راوتر سيسكو (Cisco)</td>
                            <td class="px-6 py-4 text-gray-600">غرفة السيرفر</td>
                            <td class="px-6 py-4">
                                <span class="bg-orange-50 text-orange-600 text-xs font-black px-3 py-1 rounded-full border border-orange-100">قيد الصيانة الخارجية</span>
                            </td>
                            <td class="px-6 py-4 flex justify-center">
                                <button class="px-4 py-1.5 bg-gray-100 text-gray-500 rounded-lg text-xs font-bold hover:bg-gray-200">تحديث حالة الصيانة</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div x-show="actionModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 p-4 backdrop-blur-sm" x-transition>
            <div class="bg-white rounded-3xl max-w-md w-full p-6 shadow-2xl" @click.away="actionModal = false">
                <h3 class="text-xl font-black mb-2" 
                    :class="actionColor == 'blue' ? 'text-blue-900' : (actionColor == 'red' ? 'text-red-900' : 'text-orange-900')" 
                    x-text="'قرار: ' + actionType"></h3>
                <p class="text-xs text-gray-500 mb-4">المادة المحددة: <span class="font-bold text-gray-800" x-text="selectedItem.name + ' (' + selectedItem.code + ')'"></span></p>
                
                <form @submit.prevent="actionModal = false">
                    <div class="mb-4">
                        <label class="block text-xs font-bold text-gray-700 mb-1" x-text="actionType == 'إصلاح' ? 'جهة الصيانة المعتمدة' : 'ملاحظات / سبب ' + actionType"></label>
                        <input x-show="actionType == 'إصلاح'" type="text" class="w-full border-gray-200 rounded-xl text-sm px-3 py-2.5 bg-gray-50" placeholder="اسم الشركة أو الفني...">
                        <textarea x-show="actionType != 'إصلاح'" class="w-full border-gray-200 rounded-xl text-sm p-3 h-20 bg-gray-50" placeholder="أدخل التفاصيل..."></textarea>
                    </div>

                    <div class="flex gap-2">
                        <button type="button" @click="actionModal = false" class="flex-1 py-2.5 border rounded-xl text-sm font-bold text-gray-500">إلغاء</button>
                        <button type="submit" class="flex-1 py-2.5 text-white rounded-xl text-sm font-black shadow-md"
                                :class="actionColor == 'blue' ? 'bg-blue-600' : (actionColor == 'red' ? 'bg-red-600' : 'bg-orange-500')"
                                x-text="'تأكيد الـ ' + actionType"></button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>