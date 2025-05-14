

//dashboard controller

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::where('role', 'customer')->count();
        $totalRooms = Room::count();
        $totalBookings = Booking::count();
        $totalRevenue = Payment::where('status', 'paid')->sum('amount');

        $recentBookings = Booking::with('user', 'room')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalRooms',
            'totalBookings',
            'totalRevenue',
            'recentBookings'
        ));
    }
}

//route

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
});



// route

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
});


/// dashboard  blade view

@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white shadow p-4 rounded">
            <h2 class="text-sm text-gray-500">Total Users</h2>
            <p class="text-xl font-bold">{{ $totalUsers }}</p>
        </div>
        <div class="bg-white shadow p-4 rounded">
            <h2 class="text-sm text-gray-500">Total Rooms</h2>
            <p class="text-xl font-bold">{{ $totalRooms }}</p>
        </div>
        <div class="bg-white shadow p-4 rounded">
            <h2 class="text-sm text-gray-500">Total Bookings</h2>
            <p class="text-xl font-bold">{{ $totalBookings }}</p>
        </div>
        <div class="bg-white shadow p-4 rounded">
            <h2 class="text-sm text-gray-500">Revenue</h2>
            <p class="text-xl font-bold">${{ number_format($totalRevenue, 2) }}</p>
        </div>
    </div>

    <div class="bg-white shadow p-4 rounded">
        <h2 class="text-lg font-semibold mb-4">Recent Bookings</h2>
        <table class="min-w-full text-left text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">Customer</th>
                    <th class="px-4 py-2">Room</th>
                    <th class="px-4 py-2">Check-In</th>
                    <th class="px-4 py-2">Check-Out</th>
                    <th class="px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentBookings as $booking)
                    <tr>
                        <td class="px-4 py-2">{{ $booking->user->name }}</td>
                        <td class="px-4 py-2">{{ $booking->room->room_number }}</td>
                        <td class="px-4 py-2">{{ $booking->check_in }}</td>
                        <td class="px-4 py-2">{{ $booking->check_out }}</td>
                        <td class="px-4 py-2 capitalize">{{ $booking->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

// admin dashboard view

@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white shadow p-4 rounded">
            <h2 class="text-sm text-gray-500">Total Users</h2>
            <p class="text-xl font-bold">{{ $totalUsers }}</p>
        </div>
        <div class="bg-white shadow p-4 rounded">
            <h2 class="text-sm text-gray-500">Total Rooms</h2>
            <p class="text-xl font-bold">{{ $totalRooms }}</p>
        </div>
        <div class="bg-white shadow p-4 rounded">
            <h2 class="text-sm text-gray-500">Total Bookings</h2>
            <p class="text-xl font-bold">{{ $totalBookings }}</p>
        </div>
        <div class="bg-white shadow p-4 rounded">
            <h2 class="text-sm text-gray-500">Revenue</h2>
            <p class="text-xl font-bold">${{ number_format($totalRevenue, 2) }}</p>
        </div>
    </div>

    <div class="bg-white shadow p-4 rounded">
        <h2 class="text-lg font-semibold mb-4">Recent Bookings</h2>
        <table class="min-w-full text-left text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">Customer</th>
                    <th class="px-4 py-2">Room</th>
                    <th class="px-4 py-2">Check-In</th>
                    <th class="px-4 py-2">Check-Out</th>
                    <th class="px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentBookings as $booking)
                    <tr>
                        <td class="px-4 py-2">{{ $booking->user->name }}</td>
                        <td class="px-4 py-2">{{ $booking->room->room_number }}</td>
                        <td class="px-4 py-2">{{ $booking->check_in }}</td>
                        <td class="px-4 py-2">{{ $booking->check_out }}</td>
                        <td class="px-4 py-2 capitalize">{{ $booking->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

// tep 4: Create layouts.admin Blade (if not exist)

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
</head>
<body class="bg-gray-100 text-gray-800">
    <nav class="bg-white shadow p-4">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-xl font-bold">Admin Panel</h1>
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </nav>

    <main class="mt-4">
        @yield('content')
    </main>
</body>
</html>


// middle ware

php artisan make:middleware AdminMiddleware
public function handle($request, Closure $next)
{
    if (auth()->check() && auth()->user()->role === 'admin') {
        return $next($request);
    }
    abort(403);
}

