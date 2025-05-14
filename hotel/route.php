// Public
Route::get('/', [RoomController::class, 'index']);
Route::get('/room/{id}', [RoomController::class, 'show']);

// Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Bookings
Route::middleware('auth')->group(function () {
    Route::get('/bookings', [BookingController::class, 'index']);
    Route::post('/book', [BookingController::class, 'store']);
    Route::post('/bookings/{id}/cancel', [BookingController::class, 'cancel']);

    Route::get('/payment/{bookingId}', [PaymentController::class, 'create']);
    Route::post('/payment/process', [PaymentController::class, 'process']);

    Route::post('/review', [ReviewController::class, 'store']);
});

// Admin (prefix: /admin)
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [Admin\DashboardController::class, 'index']);
    Route::resource('/rooms', Admin\RoomController::class);
    Route::get('/bookings', [Admin\BookingController::class, 'index']);
    Route::post('/bookings/{id}/status', [Admin\BookingController::class, 'updateStatus']);
    Route::get('/users', [Admin\UserController::class, 'index']);
});
