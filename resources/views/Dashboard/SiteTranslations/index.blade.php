<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Language Texts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <h3 class="text-sm font-medium text-red-800 mb-2">
                            There were {{ count($errors) }} error(s) with your submission:
                        </h3>
                        <ul class="list-disc list-inside space-y-1 text-sm text-red-700">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <p class="text-sm text-gray-500 mb-6">
                    Edit shared English and Myanmar labels here. Leaving both fields empty for a key makes the site fall back to the current values in the language files.
                </p>

                <form action="{{ route('site-translations.update') }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')

                    @foreach ($groups as $group => $items)
                        <section class="border border-gray-200 rounded-xl overflow-hidden">
                            <div class="px-5 py-4 bg-gray-50 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900 capitalize">{{ str_replace('_', ' ', $group) }}</h3>
                            </div>

                            <div class="divide-y divide-gray-200">
                                @foreach ($items as $item)
                                    <div class="p-5 grid grid-cols-1 xl:grid-cols-[220px_minmax(0,1fr)_minmax(0,1fr)] gap-4 items-start">
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900">{{ $item['label'] }}</p>
                                            <p class="text-xs text-gray-500 mt-1">{{ $item['key'] }}</p>
                                        </div>

                                        <div>
                                            <label for="translation-en-{{ md5($item['key']) }}" class="block text-sm font-medium text-gray-700 mb-2">English</label>
                                            <textarea
                                                id="translation-en-{{ md5($item['key']) }}"
                                                name="translations[{{ $item['key'] }}][en]"
                                                rows="3"
                                                class="w-full border border-gray-300 rounded-lg p-3 text-sm">{{ $item['en_value'] }}</textarea>
                                        </div>

                                        <div>
                                            <label for="translation-mm-{{ md5($item['key']) }}" class="block text-sm font-medium text-gray-700 mb-2">Myanmar</label>
                                            <textarea
                                                id="translation-mm-{{ md5($item['key']) }}"
                                                name="translations[{{ $item['key'] }}][mm]"
                                                rows="3"
                                                class="w-full border border-gray-300 rounded-lg p-3 text-sm">{{ $item['mm_value'] }}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endforeach

                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex justify-center py-2 px-5 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                            Save Language Texts
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
