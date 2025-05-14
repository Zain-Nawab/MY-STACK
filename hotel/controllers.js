

php artisan make:controller AuthController
php artisan make:controller RoomController
php artisan make:controller BookingController
php artisan make:controller PaymentController
php artisan make:controller ReviewController
php artisan make:controller Admin/DashboardController
php artisan make:controller Admin/RoomController --resource
php artisan make:controller Admin/BookingController
php artisan make:controller Admin/UserController


class AuthController extends Controller
{
    public function register(Request $request) { /* Validate and create user */ }
    public function login(Request $request) { /* Check credentials and login */ }
    public function logout(Request $request) { /* Logout */ }
}


class RoomController extends Controller
{
    public function index() { /* List available rooms with filters */ }
    public function show($id) { /* Room details */ }
}


class BookingController extends Controller
{
    public function index() { /* List user's bookings */ }
    public function store(Request $request) { /* Create new booking */ }
    public function cancel($id) { /* Cancel booking */ }
}


class PaymentController extends Controller
{
    public function create($bookingId) { /* Show payment page */ }
    public function process(Request $request) { /* Stripe/PayPal integration */ }
}

class ReviewController extends Controller
{
    public function store(Request $request) { /* Add review */ }
}

// admins

class RoomController extends Controller
{
    public function index() { /* List all rooms */ }
    public function create() { /* Form to add room */ }
    public function store(Request $request) { /* Save room */ }
    public function edit($id) { /* Edit room form */ }
    public function update(Request $request, $id) { /* Update room */ }
    public function destroy($id) { /* Delete room */ }
}


class BookingController extends Controller
{
    public function index() { /* List all bookings */ }
    public function updateStatus(Request $request, $id) { /* Confirm or cancel */ }
}

class UserController extends Controller
{
    public function index() { /* List all users */ }
    public function destroy($id) { /* Delete user */ }
}


