
<x-layout.main-layout>
    <div class="min-h-screen bg-slate-950 px-4 py-8 text-slate-100 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="mx-auto mb-8 max-w-3xl">
            <a href="{{ route('admin.users.index') }}"
               class="mb-4 inline-flex items-center gap-2 text-sm text-slate-400 transition hover:text-indigo-400">
                &larr; Back to Users
            </a>

            <h1 class="text-3xl font-bold tracking-tight text-white">
                Create New User
            </h1>

            <p class="mt-2 text-sm text-slate-400">
                Add a new user account and assign their role.
            </p>
        </div>

        {{-- Form Card --}}
        <div class="mx-auto max-w-3xl rounded-2xl border border-slate-800 bg-slate-900 p-6 shadow-xl sm:p-8">

            <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Name --}}
                <div>
                    <label for="name" class="mb-2 block text-sm font-medium text-slate-200">
                        Full Name
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter full name"
                        required
                        autocomplete="name"
                        class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white placeholder-slate-500 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20"
                    >

                    @error('name')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-slate-200">
                        Email Address
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="user@example.com"
                        required
                        autocomplete="email"
                        class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white placeholder-slate-500 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20"
                    >

                    @error('email')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Role --}}
                <div>
                    <label for="role" class="mb-2 block text-sm font-medium text-slate-200">
                        User Role
                    </label>

                    <select
                        id="role"
                        name="role"
                        required
                        class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20"
                    >
                        <option value="user" {{ old('role', 'user') === 'user' ? 'selected' : '' }}>
                            Regular User
                        </option>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>
                            Administrator
                        </option>
                    </select>

                    @error('role')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password with Show/Hide --}}
                <div>
                    <label for="password" class="mb-2 block text-sm font-medium text-slate-200">
                        Password
                    </label>

                    <div class="relative">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Create a password"
                            required
                            autocomplete="new-password"
                            class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 pr-12 text-white placeholder-slate-500 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20"
                        >

                        <button
                            type="button"
                            onclick="togglePassword('password', this)"
                            aria-label="Show password"
                            aria-pressed="false"
                            class="absolute right-3 top-1/2 -translate-y-1/2 rounded-lg p-1 text-slate-400 transition hover:text-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        >
                            <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24" stroke-width="1.8"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12Z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>

                    @error('password')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password with Show/Hide --}}
                <div>
                    <label for="password_confirmation" class="mb-2 block text-sm font-medium text-slate-200">
                        Confirm Password
                    </label>

                    <div class="relative">
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Re-enter password"
                            required
                            autocomplete="new-password"
                            class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 pr-12 text-white placeholder-slate-500 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20"
                        >

                        <button
                            type="button"
                            onclick="togglePassword('password_confirmation', this)"
                            aria-label="Show confirm password"
                            aria-pressed="false"
                            class="absolute right-3 top-1/2 -translate-y-1/2 rounded-lg p-1 text-slate-400 transition hover:text-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        >
                            <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24" stroke-width="1.8"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12Z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="flex flex-col-reverse gap-3 border-t border-slate-800 pt-6 sm:flex-row sm:justify-end">
                    <a
                        href="{{ route('admin.users.index') }}"
                        class="inline-flex items-center justify-center rounded-xl border border-slate-700 px-5 py-3 text-sm font-semibold text-slate-300 transition hover:bg-slate-800 hover:text-white"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-950/30 transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 focus:ring-offset-slate-900"
                    >
                        Create User
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Password Toggle Script --}}
    <script>
        function togglePassword(id, button) {
            const input = document.getElementById(id);
            const isHidden = input.type === 'password';

            input.type = isHidden ? 'text' : 'password';
            button.setAttribute('aria-pressed', String(isHidden));
            button.setAttribute(
                'aria-label',
                (isHidden ? 'Hide ' : 'Show ') +
                (id === 'password' ? 'password' : 'confirm password')
            );
        }
    </script>
</x-layout.main-layout>
