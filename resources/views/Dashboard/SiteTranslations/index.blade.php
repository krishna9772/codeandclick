<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full items-center">
            <a href="{{ route('dashboard') }}" class="rounded border border-blue-800 px-4 py-2 font-bold text-blue-800">
                Back to Dashboard
            </a>
            <h2 class="ml-auto text-right text-xl font-semibold leading-tight text-gray-800">
                Language Texts
            </h2>
        </div>
    </x-slot>

    <div class="py-12" id="top">
        <div class="mx-auto max-w-6xl sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-lg bg-white shadow-sm">
                <div class="p-8">
                @if ($errors->any())
                    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4">
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

                <p class="mb-6 text-sm text-gray-500">
                    Edit shared English and Myanmar labels here. Leaving both fields empty for a key makes the site fall back to the current values in the language files.
                </p>

                <div class="mb-8 rounded-2xl border border-gray-200 bg-gray-50 p-4">
                    <p class="mb-3 text-sm font-semibold text-gray-800">Page Tabs</p>
                    <div class="flex flex-wrap gap-3">
                        @foreach ($groups as $group => $items)
                            <a
                                href="#group-{{ $group }}"
                                class="inline-flex items-center rounded-full border border-gray-300 bg-white px-4 py-2 text-sm font-medium capitalize text-gray-700 transition hover:border-blue-600 hover:text-blue-700">
                                {{ str_replace('_', ' ', $group) }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <form action="{{ route('site-translations.update') }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')

                    @foreach ($groups as $group => $items)
                        <section id="group-{{ $group }}" class="scroll-mt-28 overflow-hidden rounded-2xl border border-gray-200">
                            <div class="border-b border-gray-200 bg-gray-50 px-5 py-4">
                                <div class="flex items-center justify-between gap-4">
                                    <h3 class="text-lg font-semibold capitalize text-gray-900">{{ str_replace('_', ' ', $group) }}</h3>
                                    <a href="#top" class="text-sm font-medium text-blue-600 hover:text-blue-700">Back to tabs</a>
                                </div>
                            </div>

                            <div class="divide-y divide-gray-200">
                                @foreach ($items as $item)
                                    <div class="grid grid-cols-1 items-start gap-4 p-5 xl:grid-cols-[220px_minmax(0,1fr)_minmax(0,1fr)]">
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900">{{ $item['label'] }}</p>
                                            <p class="text-xs text-gray-500 mt-1">{{ $item['key'] }}</p>
                                        </div>

                                        <div>
                                            <label for="translation-en-{{ md5($item['key']) }}" class="block text-sm font-medium text-gray-700 mb-2">English</label>
                                            <textarea
                                                id="translation-en-{{ md5($item['key']) }}"
                                                name="translations[{{ $item['key'] }}][en]"
                                                rows="{{ str_ends_with($item['key'], '.content') ? '14' : '3' }}"
                                                class="w-full border border-gray-300 rounded-lg p-3 text-sm {{ str_ends_with($item['key'], '.content') ? 'min-h-[320px]' : '' }}">{{ $item['en_value'] }}</textarea>
                                        </div>

                                        <div>
                                            <label for="translation-mm-{{ md5($item['key']) }}" class="block text-sm font-medium text-gray-700 mb-2">Myanmar</label>
                                            <textarea
                                                id="translation-mm-{{ md5($item['key']) }}"
                                                name="translations[{{ $item['key'] }}][mm]"
                                                rows="{{ str_ends_with($item['key'], '.content') ? '14' : '3' }}"
                                                class="w-full border border-gray-300 rounded-lg p-3 text-sm {{ str_ends_with($item['key'], '.content') ? 'min-h-[320px]' : '' }}">{{ $item['mm_value'] }}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endforeach

                    <div class="flex justify-end border-t border-gray-200 pt-6">
                        <button type="submit" class="rounded-md bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-700">
                            Save Language Texts
                        </button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
