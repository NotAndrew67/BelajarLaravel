<x-admin.layout>
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Classroom</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Perbarui data kelas {{ $classroom->name }}</p>
        </div>
        <a href="{{ route('admin.classroom') }}"
           class="inline-flex items-center text-gray-700 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 transition">
            Kembali
        </a>
    </div>

    <div class="max-w-2xl bg-white border border-gray-200 rounded-lg shadow p-6 dark:bg-gray-800 dark:border-gray-700">
        <form action="{{ route('admin.classroom.update', $classroom->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nama Kelas <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       id="name"
                       name="name"
                       value="{{ old('name', $classroom->name) }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-500 @enderror"
                       required>
                @error('name')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="major" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Jurusan <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       id="major"
                       name="major"
                       value="{{ old('major', $classroom->major) }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('major') border-red-500 @enderror"
                       required>
                @error('major')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="total_students" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Jumlah Siswa (Total Students)
                </label>
                <input type="number"
                       id="total_students"
                       name="total_students"
                       min="0"
                       value="{{ old('total_students', ($classroom->total_students && $classroom->total_students > 0) ? $classroom->total_students : ($classroom->students_count ?? 0)) }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('total_students') border-red-500 @enderror"
                       placeholder="Contoh: 36">
                @error('total_students')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center space-x-3">
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 transition">
                    Update Kelas
                </button>
                <a href="{{ route('admin.classroom') }}"
                   class="text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin.layout>
