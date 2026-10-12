
<x-layout.main-layout>
    <div class="space-y-6">

        {{-- Page Header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-indigo-400">
                    Administration
                </p>
                <h1 class="mt-2 text-2xl font-bold tracking-tight text-white">
                    User Management
                </h1>
                <p class="mt-2 text-sm text-slate-400">
                    View and manage all registered user accounts.
                </p>
            </div>

            <div>
                <a href="{{ route('admin.users.create') }}"
                   class="motion-button inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 focus:ring-offset-[#0B1120]">
                    <span class="text-lg leading-none">+</span>
                    Add New User
                </a>
            </div>
        </div>

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="flex items-center gap-3 rounded-xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-400">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="rounded-xl border border-red-500/20 bg-red-500/10 px-4 py-3 text-sm text-red-400">
                {{ session('error') }}
            </div>
        @endif

        {{-- Summary Cards --}}
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

            <div class="motion-card motion-card-1 rounded-xl border border-slate-800/80 bg-[#0F172A] p-5">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-slate-400">Total Users</p>
                    <div class="rounded-lg bg-indigo-500/10 p-2 text-indigo-400">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5-2m-3 4H7m10 0v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2H2v-2a3 3 0 015-2m8-11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                </div>
                <p class="mt-4 text-3xl font-bold text-white">{{ $totalUsers }}</p>
                <p class="mt-1 text-xs text-slate-500">Registered accounts</p>
            </div>

           <div class="motion-card motion-card-2 rounded-xl border border-slate-800/80 bg-[#0F172A] p-5">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-slate-400">Administrators</p>
                    <div class="rounded-lg bg-violet-500/10 p-2 text-violet-400">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3l7 4v5c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V7l7-4zm-3 9l2 2 4-4"/>
                        </svg>
                    </div>
                </div>
                <p class="mt-4 text-3xl font-bold text-white">{{ $adminCount }}</p>
                <p class="mt-1 text-xs text-slate-500">Accounts with admin access</p>
            </div>

           <div class="motion-card motion-card-3 rounded-xl border border-slate-800/80 bg-[#0F172A] p-5">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-slate-400">Regular Users</p>
                    <div class="rounded-lg bg-emerald-500/10 p-2 text-emerald-400">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m16 0v-2a4 4 0 00-3-3.87M14 3.13a4 4 0 010 7.75M14 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                </div>
                <p class="mt-4 text-3xl font-bold text-white">{{ $regularUserCount }}</p>
                <p class="mt-1 text-xs text-slate-500">Standard accounts</p>
            </div>

        </div>

        {{-- Users Table --}}
        <div class="overflow-hidden rounded-xl border border-slate-800/80 bg-[#0F172A] shadow-xl">

            {{-- Table Header --}}
            <div class="flex flex-col gap-3 border-b border-slate-800/80 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                <div>
                    <h2 class="font-semibold text-white">All Users</h2>
                    <p class="mt-1 text-xs text-slate-500">
                        Showing {{ $users->firstItem() ?? 0 }}–{{ $users->lastItem() ?? 0 }}
                        of {{ $users->total() }} matching users
                    </p>
                </div>

                <span class="inline-flex w-fit items-center rounded-full border border-slate-700 bg-slate-800/60 px-3 py-1.5 text-xs font-medium text-slate-300">
                    {{ $users->total() }} accounts
                </span>
            </div>

            {{-- Search and Role Filter --}}
            <div class="border-b border-slate-800/80 px-5 py-4 sm:px-6">
                <form method="GET" action="{{ route('admin.users.index') }}"
                      class="flex flex-col gap-3 sm:flex-row">

                    <input
                        type="search"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search by name or email..."
                        class=" motion-button w-full rounded-lg border border-slate-700 bg-slate-900 px-4 py-2.5 text-sm text-white placeholder-slate-500 focus:border-indigo-500 focus:outline-none sm:flex-1"
                    >

                    <select
                        name="role"
                        class="rounded-lg border border-slate-700 bg-slate-900 px-4 py-2.5 text-sm text-white focus:border-indigo-500 focus:outline-none"
                    >
                        <option value="">All Roles</option>
                        <option value="admin" @selected(request('role') === 'admin')>
                            Admin
                        </option>
                        <option value="user" @selected(request('role') === 'user')>
                            Regular User
                        </option>
                    </select>

                    <button type="submit"
                            class="motion-button rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-500">
                        Search
                    </button>

                    <a href="{{ route('admin.users.index') }}"
                       class="motion-button  rounded-lg border border-slate-700 px-5 py-2.5 text-center text-sm font-medium text-slate-300 transition hover:bg-slate-800">
                        Reset
                    </a>
                </form>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-800/80 text-left">
                    <thead class="bg-slate-900/50">
                        <tr>
                            <th class="px-6 py-3.5 text-[11px] font-semibold uppercase tracking-wider text-slate-400">User</th>
                            <th class="px-6 py-3.5 text-[11px] font-semibold uppercase tracking-wider text-slate-400">Email</th>
                            <th class="px-6 py-3.5 text-[11px] font-semibold uppercase tracking-wider text-slate-400">Role</th>
                            <th class="px-6 py-3.5 text-[11px] font-semibold uppercase tracking-wider text-slate-400">Registered</th>
                            <th class="px-6 py-3.5 text-right text-[11px] font-semibold uppercase tracking-wider text-slate-400">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-800/60">
                        @forelse($users as $user)
                            <tr class="transition hover:bg-slate-800/30">
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-600/20 text-xs font-bold text-indigo-400 ring-1 ring-inset ring-indigo-500/30">
                                            {{ strtoupper(substr($user->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-white">{{ $user->name }}</p>
                                            <p class="mt-1 text-xs text-slate-500">ID: {{ $user->id }}</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-400">
                                    {{ $user->email }}
                                </td>

                                <td class="whitespace-nowrap px-6 py-4">
                                    @if($user->role === 'admin')
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-indigo-500/10 px-2.5 py-1 text-xs font-semibold text-indigo-400 ring-1 ring-inset ring-indigo-500/20">
                                            <span class="h-1.5 w-1.5 rounded-full bg-indigo-400"></span>
                                            Admin
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-500/10 px-2.5 py-1 text-xs font-semibold text-slate-300 ring-1 ring-inset ring-slate-500/20">
                                            <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                                            User
                                        </span>
                                    @endif
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-400">
                                    {{ optional($user->created_at)->format('M d, Y') ?? 'N/A' }}
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                           class="rounded-lg border border-slate-700 bg-slate-800/60 px-3 py-1.5 text-xs font-medium text-slate-200 transition hover:border-indigo-500/40 hover:bg-indigo-500/10 hover:text-indigo-300">
                                            Edit
                                        </a>

                                        @if($user->id !== auth()->id())
                                            <form method="POST"
                                                  action="{{ route('admin.users.destroy', $user) }}"
                                                  onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="rounded-lg border border-red-500/20 bg-red-500/10 px-3 py-1.5 text-xs font-medium text-red-400 transition hover:bg-red-500/20">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-slate-800 text-slate-400">
                                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m16 0v-2a4 4 0 00-3-3.87M14 3.13a4 4 0 010 7.75"/>
                                        </svg>
                                    </div>
                                    <p class="mt-4 text-sm font-semibold text-white">No users found</p>
                                    <p class="mt-1 text-sm text-slate-500">
                                        Try another search or reset the filters.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if($users->hasPages())
                <div class="border-t border-slate-800/80 px-5 py-4 sm:px-6">
                    {{ $users->links() }}
                </div>
            @endif

        </div>
    </div>
</x-layout.main-layout>
