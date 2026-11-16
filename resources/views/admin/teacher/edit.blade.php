<x-admin.layout>
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Teacher</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Perbarui data guru {{ $teacher->name }}</p>
        </div>
        <a href="{{ route('admin.teacher') }}"
           class="inline-flex items-center text-gray-700 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 transition">
            Kembali
        </a>
    </div>

    <div class="max-w-2xl bg-white border border-gray-200 rounded-lg shadow p-6 dark:bg-gray-800 dark:border-gray-700">
        <form action="{{ route('admin.teacher.update', $teacher->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="niy" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nomor Induk Yayasan (NIY) <span class="text-red-500">* (10 digit angka)</span>
                </label>
                <input type="number"
                       id="niy"
                       name="niy"
                       value="{{ old('niy', $teacher->niy) }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('niy') border-red-500 @enderror"
                       required>
                @error('niy')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nama Guru <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       id="name"
                       name="name"
                       value="{{ old('name', $teacher->name) }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-500 @enderror"
                       required>
                @error('name')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="subject_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Mata Pelajaran yang Diampu
                </label>
                <select id="subject_id"
                        name="subject_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('subject_id') border-red-500 @enderror">
                    <option value="">-- Pilih Mata Pelajaran (Opsional) --</option>
                    @foreach ($subjects as $sub)
                        <option value="{{ $sub->id }}" {{ old('subject_id', $teacher->subject_id) == $sub->id ? 'selected' : '' }}>
                            {{ $sub->name }}
                        </option>
                    @endforeach
                </select>
                @error('subject_id')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Tanggal Mulai Mengajar <span class="text-red-500">*</span>
                </label>
                <input type="date"
                       id="start_date"
                       name="start_date"
                       value="{{ old('start_date', $teacher->start_date ? (is_string($teacher->start_date) ? $teacher->start_date : $teacher->start_date->format('Y-m-d')) : '') }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('start_date') border-red-500 @enderror"
                       required>
                @error('start_date')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center space-x-3">
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 transition">
                    Update Guru
                </button>
                <a href="{{ route('admin.teacher') }}"
                   class="text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin.layout>
