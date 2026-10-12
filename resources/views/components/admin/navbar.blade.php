
<header class="motion-navbar sticky top-0 z-20 flex h-20 items-center justify-between border-b border-slate-800 bg-[#0B1120]/95 px-5 backdrop-blur-xl sm:px-8">

    {{-- PAGE TITLE --}}
    <div class="min-w-0">
        <p class="text-xs font-medium text-slate-500">
            Workspace / Overview
        </p>

        <h1 class="mt-1 text-lg font-bold text-white transition-colors duration-300 hover:text-indigo-400">
            Dashboard
        </h1>
    </div>

    {{-- USER INFORMATION --}}
    <div class="flex items-center gap-3 sm:gap-5">

        {{-- NAME AND EMAIL --}}
        <div class="hidden text-right sm:block">
            <p class="text-sm font-semibold text-white transition-colors duration-300 hover:text-indigo-400">
                {{ auth()->user()->name }}
            </p>

            <p class="mt-0.5 text-xs text-slate-500">
                {{ auth()->user()->email }}
            </p>
        </div>

        {{-- USER AVATAR --}}
        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-indigo-500/30 bg-indigo-600/15 font-bold text-indigo-400 transition duration-300 hover:scale-110 hover:rotate-3 hover:border-indigo-400 hover:bg-indigo-600/25">
            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
        </div>

        {{-- LOGOUT --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                type="submit"
                class="motion-button rounded-lg border border-slate-700 bg-slate-800/60 px-3 py-2 text-xs font-semibold text-slate-300 hover:border-red-500/30 hover:bg-red-500/10 hover:text-red-400 sm:px-4 sm:text-sm"
            >
                Logout
            </button>
        </form>

    </div>

</header>
