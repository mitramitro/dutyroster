<!-- resources/views/layouts/blank.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'On Duty Roster')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tambahkan link CSS yang sama dengan layout utama -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    @stack('add-plugins-css')
    <!-- Jika ada file CSS lain, tambahkan di sini -->
</head>
<body style="margin: 0; padding: 0;">
   
   
    @yield('content')

    <!-- Tambahkan script JS jika diperlukan -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('add-plugins-js')
</body>
</html>
