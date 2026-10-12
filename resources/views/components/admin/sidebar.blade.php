
<aside class="motion-sidebar flex w-full shrink-0 flex-col border-b border-slate-800 bg-[#0F172A] lg:min-h-screen lg:w-64 lg:border-b-0 lg:border-r">

    {{-- BRAND --}}
    <div class="flex h-20 items-center gap-3 border-b border-slate-800 px-6">
        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-600 text-lg font-black text-white shadow-lg shadow-indigo-600/20 transition duration-300 hover:rotate-6 hover:scale-105">
            U
        </div>

        <div>
            <h2 class="text-base font-bold text-white">User Management</h2>
            <p class="text-xs text-slate-500">Administration panel</p>
        </div>
    </div>

    {{-- NAVIGATION --}}
    <nav class="flex-1 space-y-2 p-4">

        <p class="px-3 pb-2 pt-3 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500">
            Workspace
        </p>

        {{-- DASHBOARD --}}
        <a href="{{ route('dashboard') }}"
           class="motion-link flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium
           {{ request()->routeIs('dashboard')
                ? 'bg-indigo-600/20 text-indigo-400 ring-1 ring-indigo-500/30'
                : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">

            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 10.5 12 3l9 7.5M5 9v11h14V9M9 20v-6h6v6"/>
            </svg>

            <span>Dashboard</span>
        </a>

        @if(auth()->user()->role === 'admin')

            {{-- MANAGE USERS --}}
            <a href="{{ route('admin.users.index') }}"
               class="motion-link flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium
               {{ request()->routeIs('admin.users.*')
                    ? 'bg-indigo-600/20 text-indigo-400 ring-1 ring-indigo-500/30'
                    : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">

                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                          d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m6-10a4 4 0 100-8 4 4 0 000 8zm10 10v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
                </svg>

                <span>Manage Users</span>
            </a>

            {{-- ADD NEW USER --}}
            <a href="{{ route('admin.users.create') }}"
               class="motion-link flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium
               {{ request()->routeIs('admin.users.create')
                    ? 'bg-indigo-600/20 text-indigo-400 ring-1 ring-indigo-500/30'
                    : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">

                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                          d="M12 5v14m7-7H5"/>
                </svg>

                <span>Add New User</span>
            </a>

        @endif

        {{-- ACCOUNT --}}
        <p class="px-3 pb-2 pt-7 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500">
            Account
        </p>

        {{-- MY PROFILE --}}
        <a href="{{ route('profile.edit') }}"
           class="motion-link flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium
           {{ request()->routeIs('profile.*')
                ? 'bg-indigo-600/20 text-indigo-400 ring-1 ring-indigo-500/30'
                : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">

            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                      d="M20 21a8 8 0 00-16 0m8-10a4 4 0 100-8 4 4 0 000 8z"/>
            </svg>

            <span>My Profile</span>
        </a>

    </nav>

    {{-- LOGGED-IN USER --}}
    <div class="border-t border-slate-800 p-4">
        <div class="flex items-center gap-3 rounded-xl bg-slate-800/50 p-3 transition duration-300 hover:bg-slate-800">

            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-600/20 text-sm font-bold text-indigo-400 ring-1 ring-inset ring-indigo-500/30">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>

            <div class="min-w-0">
                <p class="truncate text-sm font-semibold text-white">
                    {{ auth()->user()->name }}
                </p>

                <p class="truncate text-xs text-slate-500">
                    {{ ucfirst(auth()->user()->role ?? 'user') }}
                </p>
            </div>

        </div>
    </div>

</aside>
