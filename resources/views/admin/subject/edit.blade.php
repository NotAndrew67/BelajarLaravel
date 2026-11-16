<x-admin.layout>
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Subject</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Perbarui data mata pelajaran {{ $subject->name }}</p>
        </div>
        <a href="{{ route('admin.subject') }}"
           class="inline-flex items-center text-gray-700 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 transition">
            Kembali
        </a>
    </div>

    <div class="max-w-2xl bg-white border border-gray-200 rounded-lg shadow p-6 dark:bg-gray-800 dark:border-gray-700">
        <form action="{{ route('admin.subject.update', $subject->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nama Mata Pelajaran <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       id="name"
                       name="name"
                       value="{{ old('name', $subject->name) }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-500 @enderror"
                       required>
                @error('name')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="teacher_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Guru Pengampu (Opsional)
                </label>
                <select id="teacher_id"
                        name="teacher_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('teacher_id') border-red-500 @enderror">
                    <option value="">-- Pilih Guru Pengampu (Opsional) --</option>
                    @foreach ($teachers as $t)
                        <option value="{{ $t->id }}" {{ old('teacher_id', $subject->teacher?->id) == $t->id ? 'selected' : '' }}>
                            {{ $t->name }} (NIY: {{ $t->niy }})
                        </option>
                    @endforeach
                </select>
                @error('teacher_id')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center space-x-3">
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 transition">
                    Update Mapel
                </button>
                <a href="{{ route('admin.subject') }}"
                   class="text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin.layout>
