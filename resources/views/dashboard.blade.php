
<x-layout.main-layout>

    <main class="dashboard-enter space-y-8 p-5 sm:p-8">

        {{-- WELCOME BANNER --}}
        <section class="motion-item relative overflow-hidden rounded-2xl border border-indigo-500/20 bg-gradient-to-br from-indigo-600/20 via-[#111C35] to-[#0F172A] p-6 sm:p-8">

            <div class="pointer-events-none absolute -right-12 -top-16 h-56 w-56 rounded-full bg-indigo-500/10 blur-2xl"></div>

            <div class="relative flex flex-col justify-between gap-6 sm:flex-row sm:items-center">

                <div>
                    <div class="inline-flex items-center gap-2 rounded-full border border-emerald-500/20 bg-emerald-500/10 px-3 py-1 text-xs font-semibold text-emerald-400">
                        <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                        System overview
                    </div>

                    <h2 class="mt-4 text-2xl font-extrabold tracking-tight text-white sm:text-3xl">
                        Welcome back, {{ auth()->user()->name }}!
                    </h2>

                    <p class="mt-3 max-w-xl text-sm leading-6 text-slate-400">
                        Manage accounts, monitor user activity, and keep your workspace organized.
                    </p>
                </div>

                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.users.create') }}"
                       class="motion-button inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 hover:bg-indigo-500">

                        <span class="text-lg leading-none">+</span>
                        Create User
                    </a>
                @endif

            </div>
        </section>

        {{-- STATISTICS --}}
        <section class="motion-item motion-delay-1">

            <div class="mb-5">
                <h3 class="text-lg font-bold text-white">Overview</h3>
                <p class="mt-1 text-sm text-slate-500">
                    Your user database at a glance.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">

                {{-- TOTAL USERS --}}
                <div class="motion-card rounded-2xl border border-slate-800/80 bg-[#0F172A] p-6 shadow-xl shadow-black/10 hover:border-indigo-500/30">

                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-400">Total Users</p>

                            <h4 class="mt-3 text-4xl font-extrabold tracking-tight text-white">
                                {{ number_format($totalUsers) }}
                            </h4>
                        </div>

                        <div class="rounded-xl border border-indigo-500/20 bg-indigo-500/10 p-3 text-indigo-400">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M17 20h5v-2a3 3 0 00-5.2-2M17 20H7m10 0v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2H2v-2a3 3 0 015.2-2M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center gap-2 text-xs text-slate-500">
                        <span class="h-1.5 w-1.5 rounded-full bg-indigo-400"></span>
                        All registered accounts
                    </div>
                </div>

                {{-- ADMINISTRATORS --}}
                <div class="motion-card rounded-2xl border border-slate-800/80 bg-[#0F172A] p-6 shadow-xl shadow-black/10 hover:border-violet-500/30">

                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-400">Administrators</p>

                            <h4 class="mt-3 text-4xl font-extrabold tracking-tight text-white">
                                {{ number_format($adminCount) }}
                            </h4>
                        </div>

                        <div class="rounded-xl border border-violet-500/20 bg-violet-500/10 p-3 text-violet-400">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M12 3l7 4v5c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V7l7-4zm-3 9l2 2 4-4"/>
                            </svg>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center gap-2 text-xs text-slate-500">
                        <span class="h-1.5 w-1.5 rounded-full bg-violet-400"></span>
                        Accounts with admin access
                    </div>
                </div>

                {{-- REGULAR USERS --}}
                <div class="motion-card rounded-2xl border border-slate-800/80 bg-[#0F172A] p-6 shadow-xl shadow-black/10 transition hover:border-emerald-500/30 sm:col-span-2 xl:col-span-1">

                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-400">Regular Users</p>

                            <h4 class="mt-3 text-4xl font-extrabold tracking-tight text-white">
                                {{ number_format($regularUserCount) }}
                            </h4>
                        </div>

                        <div class="rounded-xl border border-emerald-500/20 bg-emerald-500/10 p-3 text-emerald-400">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m16 0v-2a4 4 0 00-3-3.87M14 3.13a4 4 0 010 7.75M14 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center gap-2 text-xs text-slate-500">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                        Standard user accounts
                    </div>
                </div>

            </div>
        </section>

        {{-- RECENT USERS --}}
        <section class="motion-item motion-delay-2 overflow-hidden rounded-2xl border border-slate-800/80 bg-[#0F172A] shadow-xl shadow-black/10">

            <div class="flex flex-col justify-between gap-4 border-b border-slate-800/80 px-5 py-5 sm:flex-row sm:items-center sm:px-6">

                <div>
                    <h3 class="font-bold text-white">Recent Users</h3>

                    <p class="mt-1 text-sm text-slate-500">
                        The latest accounts registered in your system.
                    </p>
                </div>

                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.users.index') }}"
                       class="motion-button inline-flex items-center justify-center gap-2 rounded-lg border border-slate-700 bg-slate-800/60 px-4 py-2 text-sm font-semibold text-slate-300 hover:border-indigo-500/30 hover:text-indigo-400">

                        View All Users <span>&rarr;</span>
                    </a>
                @endif

            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-800/80 text-left">

                    <thead class="bg-slate-900/50">
                        <tr>
                            <th class="px-6 py-3.5 text-[11px] font-semibold uppercase tracking-wider text-slate-400">
                                User
                            </th>

                            <th class="px-6 py-3.5 text-[11px] font-semibold uppercase tracking-wider text-slate-400">
                                Role
                            </th>

                            <th class="px-6 py-3.5 text-[11px] font-semibold uppercase tracking-wider text-slate-400">
                                Registered
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-800/60">

                        @forelse($recentUsers as $recentUser)
                            <tr class="transition-colors duration-300 hover:bg-slate-800/40">

                                {{-- USER DETAILS --}}
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="flex items-center gap-3">

                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-600/20 text-xs font-bold text-indigo-400 ring-1 ring-inset ring-indigo-500/30 transition duration-300 hover:scale-110">
                                            {{ strtoupper(substr($recentUser->name, 0, 2)) }}
                                        </div>

                                        <div>
                                            <p class="text-sm font-semibold text-white">
                                                {{ $recentUser->name }}
                                            </p>

                                            <p class="mt-1 text-xs text-slate-500">
                                                {{ $recentUser->email }}
                                            </p>
                                        </div>

                                    </div>
                                </td>

                                {{-- USER ROLE --}}
                                <td class="whitespace-nowrap px-6 py-4">

                                    @if($recentUser->role === 'admin')
                                        <span class="inline-flex rounded-full bg-indigo-500/10 px-2.5 py-1 text-xs font-semibold text-indigo-400 ring-1 ring-inset ring-indigo-500/20">
                                            Admin
                                        </span>
                                    @else
                                        <span class="inline-flex rounded-full bg-slate-500/10 px-2.5 py-1 text-xs font-semibold text-slate-300 ring-1 ring-inset ring-slate-500/20">
                                            User
                                        </span>
                                    @endif

                                </td>

                                {{-- REGISTRATION DATE --}}
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-400">
                                    {{ optional($recentUser->created_at)->format('M d, Y') ?? 'N/A' }}
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-12 text-center text-sm text-slate-500">
                                    No users found in database.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </section>

        {{-- FOOTER --}}
        <footer class="motion-item motion-delay-3 border-t border-slate-800/80 pt-5 text-center text-xs text-slate-600">
            User Management System <span class="mx-1">&middot;</span> Built with Laravel
        </footer>

    </main>

</x-layout.main-layout>
