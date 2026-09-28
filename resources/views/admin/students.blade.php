<x-admin.layout>
    {{-- Header + tombol add --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-white">Students</h1>
        <a href="#"
           class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700">
            + Add Student
        </a>
    </div>

    {{-- Tabel --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">NIS</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Classroom</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $student['nis'] }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $student['name'] }}</td>
                        <td class="px-6 py-4">{{ $student['classroom'] }}</td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <a href="#" class="ml-3 font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin.layout>
