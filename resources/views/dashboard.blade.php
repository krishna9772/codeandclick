<x-app-layout>
    @php
        $stats = $stats ?? [];
        $quickLinks = $quickLinks ?? [];
        $recentContent = $recentContent ?? collect();
        $recentEnquiries = $recentEnquiries ?? collect();

        $heroEnquiries = data_get($stats, '5.value', 0);
        $heroContent = data_get($stats, '0.value', 0) + data_get($stats, '1.value', 0) + data_get($stats, '2.value', 0);
        $heroTranslations = data_get($stats, '7.value', 0);
    @endphp

    <x-slot name="header">
        <div>
            <p class="text-sm font-medium uppercase tracking-[0.2em] text-slate-500">Admin Overview</p>
            <h2 class="mt-1 text-2xl font-semibold text-slate-900 leading-tight">
                Dashboard
            </h2>
        </div>
        <a href="{{ route('sitemap') }}" class="inline-flex items-center rounded-xl bg-slate-900 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-800">
            Generate Sitemap
        </a>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto space-y-8 sm:px-6 lg:px-8">
            <section class="overflow-hidden rounded-3xl bg-gradient-to-br from-slate-950 via-slate-900 to-sky-900 px-6 py-8 text-white shadow-xl sm:px-8">
                <div class="grid gap-8 lg:grid-cols-[1.4fr_0.9fr] lg:items-end">
                    <div>
                        <p class="text-sm font-medium uppercase tracking-[0.25em] text-sky-200">Control Center</p>
                        <h3 class="mt-3 max-w-2xl text-3xl font-semibold leading-tight sm:text-4xl">Everything important for content, enquiries, and site health in one place.</h3>
                        <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-200 sm:text-base">Use this page to track publishing activity, keep an eye on incoming leads, and jump straight into the areas that need attention.</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-2">
                        <div class="rounded-2xl border border-white/10 bg-white/10 p-4 backdrop-blur">
                            <p class="text-xs uppercase tracking-[0.2em] text-sky-100">This Week</p>
                            <p class="mt-2 text-3xl font-semibold">{{ $heroEnquiries }}</p>
                            <p class="mt-1 text-sm text-slate-200">Total enquiries received</p>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/10 p-4 backdrop-blur">
                            <p class="text-xs uppercase tracking-[0.2em] text-sky-100">Content</p>
                            <p class="mt-2 text-3xl font-semibold">{{ $heroContent }}</p>
                            <p class="mt-1 text-sm text-slate-200">Blogs, services, and work items</p>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/10 p-4 backdrop-blur col-span-2 sm:col-span-1 lg:col-span-2">
                            <p class="text-xs uppercase tracking-[0.2em] text-sky-100">Localization</p>
                            <p class="mt-2 text-3xl font-semibold">{{ $heroTranslations }}</p>
                            <p class="mt-1 text-sm text-slate-200">Translation keys currently managed in the CMS</p>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
                    @foreach ($stats as $stat)
                        <a href="{{ $stat['href'] }}" class="group overflow-hidden rounded-3xl bg-white shadow-sm ring-1 ring-slate-200 transition hover:-translate-y-1 hover:shadow-lg">
                            <div class="h-2 w-full bg-gradient-to-r {{ $stat['tone'] }}"></div>
                            <div class="p-5">
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <p class="text-sm font-medium text-slate-500">{{ $stat['label'] }}</p>
                                        <p class="mt-3 text-4xl font-semibold tracking-tight text-slate-900">{{ number_format($stat['value']) }}</p>
                                    </div>
                                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-slate-500 group-hover:bg-slate-900 group-hover:text-white">Open</span>
                                </div>
                                <p class="mt-4 text-sm leading-6 text-slate-600">{{ $stat['meta'] }}</p>
                                <p class="mt-5 text-sm font-semibold text-slate-900">{{ $stat['action'] }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>

            <section class="grid gap-8 xl:grid-cols-[0.95fr_1.05fr]">
                <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-sm font-medium uppercase tracking-[0.2em] text-slate-500">Quick Actions</p>
                            <h3 class="mt-1 text-xl font-semibold text-slate-900">Jump into your most common tasks</h3>
                        </div>
                    </div>
                    <div class="mt-6 grid gap-3 sm:grid-cols-2">
                        @foreach ($quickLinks as $link)
                            <a href="{{ $link['href'] }}" class="rounded-2xl border border-slate-200 px-4 py-4 text-sm font-semibold text-slate-700 transition hover:border-slate-900 hover:bg-slate-50 hover:text-slate-900">
                                {{ $link['label'] }}
                            </a>
                        @endforeach
                    </div>

                    <div class="mt-8 rounded-2xl bg-slate-50 p-5 ring-1 ring-slate-200">
                        <p class="text-sm font-medium uppercase tracking-[0.18em] text-slate-500">System Snapshot</p>
                        <div class="mt-4 space-y-3 text-sm text-slate-700">
                            <div class="flex items-center justify-between gap-4">
                                <span>Clients</span>
                                <span class="font-semibold text-slate-900">{{ number_format(\App\Models\Client::count()) }}</span>
                            </div>
                            <div class="flex items-center justify-between gap-4">
                                <span>Testimonials</span>
                                <span class="font-semibold text-slate-900">{{ number_format(\App\Models\Testimornial::count()) }}</span>
                            </div>
                            <div class="flex items-center justify-between gap-4">
                                <span>SEO Records</span>
                                <span class="font-semibold text-slate-900">{{ number_format(\App\Models\Seo::count()) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-sm font-medium uppercase tracking-[0.2em] text-slate-500">Recent Content</p>
                            <h3 class="mt-1 text-xl font-semibold text-slate-900">Latest updates across your site</h3>
                        </div>
                    </div>
                    <div class="mt-6 space-y-4">
                        @forelse ($recentContent as $item)
                            <a href="{{ $item['href'] }}" class="flex items-start justify-between gap-4 rounded-2xl border border-slate-200 px-4 py-4 transition hover:border-slate-900 hover:bg-slate-50">
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">{{ $item['type'] }}</p>
                                    <p class="mt-2 text-base font-semibold text-slate-900">{{ $item['title'] }}</p>
                                    <p class="mt-2 text-sm text-slate-600">{{ $item['created_at']->format('M d, Y h:i A') }}</p>
                                </div>
                                <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">{{ $item['status'] }}</span>
                            </a>
                        @empty
                            <p class="rounded-2xl border border-dashed border-slate-300 px-4 py-6 text-sm text-slate-500">No recent content yet.</p>
                        @endforelse
                    </div>
                </div>
            </section>

            <section class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm font-medium uppercase tracking-[0.2em] text-slate-500">Recent Enquiries</p>
                        <h3 class="mt-1 text-xl font-semibold text-slate-900">Latest leads coming through the site</h3>
                    </div>
                    <a href="{{ route('enquiry.index') }}" class="text-sm font-semibold text-slate-900 hover:text-slate-600">View all</a>
                </div>

                <div class="mt-6 overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead>
                            <tr class="text-left text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">
                                <th class="pb-3 pr-6">Contact</th>
                                <th class="pb-3 pr-6">Business</th>
                                <th class="pb-3 pr-6">Budget</th>
                                <th class="pb-3 pr-6">Location</th>
                                <th class="pb-3 pr-6">Received</th>
                                <th class="pb-3 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($recentEnquiries as $enquiry)
                                <tr class="text-sm text-slate-700">
                                    <td class="py-4 pr-6">
                                        <div class="font-semibold text-slate-900">{{ trim($enquiry->first_name.' '.$enquiry->last_name) }}</div>
                                        <div class="mt-1 text-slate-500">{{ $enquiry->email }}</div>
                                    </td>
                                    <td class="py-4 pr-6">{{ $enquiry->business_name ?: 'N/A' }}</td>
                                    <td class="py-4 pr-6">{{ $enquiry->budget ?: 'Not set' }}</td>
                                    <td class="py-4 pr-6">{{ $enquiry->location ?: 'N/A' }}</td>
                                    <td class="py-4 pr-6">{{ $enquiry->created_at->diffForHumans() }}</td>
                                    <td class="py-4 text-right">
                                        <a href="{{ route('enquiry.show', $enquiry->id) }}" class="inline-flex rounded-xl border border-slate-200 px-3 py-2 font-semibold text-slate-700 transition hover:border-slate-900 hover:text-slate-900">Details</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-8 text-center text-sm text-slate-500">No enquiries yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
