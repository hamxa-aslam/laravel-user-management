<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#090D16] antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard · {{ config('app.name', 'Console') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'] } } }
        }
    </script>
    {{-- In production replace the CDN above with: @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .scroll-thin::-webkit-scrollbar { width: 8px; height: 8px; }
        .scroll-thin::-webkit-scrollbar-track { background: transparent; }
        .scroll-thin::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 8px; }
        .scroll-thin::-webkit-scrollbar-thumb:hover { background: #334155; }
    </style>
</head>
<body class="h-full font-sans text-slate-300 selection:bg-indigo-500/30 selection:text-white">

@php
    $authUser   = auth()->user();
    $isAdmin    = $authUser && $authUser->role === 'admin';
    $hour       = now()->hour;
    $greeting   = $hour < 12 ? 'Good morning' : ($hour < 18 ? 'Good afternoon' : 'Good evening');
    $totalUsers = $totalUsers ?? 0;
    $totalAdmins = $totalAdmins ?? 0;
    $totalStandard = $totalStandard ?? max($totalUsers - $totalAdmins, 0);
    $pct = fn ($n) => $totalUsers > 0 ? round(($n / $totalUsers) * 100) : 0;
    $recentUsers = $recentUsers ?? collect();
@endphp

<div class="flex h-full">

    {{-- ╔══════════════════════════════════════════════════════════════════╗
         ║  SIDEBAR — extract to resources/views/components/admin/sidebar.blade.php  ║
         ║  Usage: <x-admin.sidebar />                                      ║
         ╚══════════════════════════════════════════════════════════════════╝ --}}
          <x-admin.sidebar /> 
    {{-- ═══════════════════════════ END SIDEBAR ═══════════════════════════ --}}


    <div class="flex min-w-0 flex-1 flex-col lg:pl-[270px]">

        {{-- ╔══════════════════════════════════════════════════════════════════╗
             ║  NAVBAR — extract to resources/views/components/admin/navbar.blade.php  ║
             ║  Usage: <x-admin.navbar />                                       ║
             ╚══════════════════════════════════════════════════════════════════╝ --}}
               <x-admin.navbar />  
        {{-- ═══════════════════════════ END NAVBAR ═══════════════════════════ --}}


        {{-- ╔══════════════════════════════════════════════════════════════════╗
             ║  CONTENT WRAPPER — extract to a layout slot: {{ $slot }} / @yield('content')  ║
             ╚══════════════════════════════════════════════════════════════════╝ 
        --}}
              
       {{$slot}}
        {{-- ═══════════════════════════ END CONTENT WRAPPER ═══════════════════════════ --}}
    </div>
</div>

</body>
</html>