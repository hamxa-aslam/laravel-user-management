
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | User Management</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#0B1120] text-slate-200 antialiased">

    <div class="min-h-screen lg:flex">

        {{-- SIDEBAR --}}
        <div class="motion-sidebar">
            <x-layout.sidebar />
        </div>

        {{-- MAIN CONTENT --}}
        <div class="min-w-0 flex-1">

            {{-- NAVBAR --}}
            <div class="motion-navbar">
                <x-layout.navbar />
            </div>

            {{-- PAGE CONTENT --}}
            {{ $slot }}

        </div>

    </div>

</body>
</html>
