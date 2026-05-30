<x-app-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-extrabold text-[#005f8a]">جميع الأصناف</h2>
        <p class="text-gray-500 text-sm mt-1">عرض قائمة الأصناف المتوفرة في النظام.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-right text-sm whitespace-nowrap">
            <thead class="bg-gray-50 text-gray-600 font-bold border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4">الرقم</th>
                    <th class="px-6 py-4">اسم الصنف</th>
                    <th class="px-6 py-4">تاريخ الإضافة</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($categories as $category)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4 font-bold text-gray-500">{{ $category->id }}</td>
                    <td class="px-6 py-4 font-bold text-gray-800">{{ $category->name }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $category->created_at ? $category->created_at->format('Y-m-d') : 'غير محدد' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-8 text-center text-gray-400 font-bold">لا يوجد أصناف مضافة حالياً</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>