

php artisan make:migration create_users_table

public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->enum('role', ['admin', 'customer'])->default('customer');
        $table->timestamps();
    });
}


php artisan make:migration create_rooms_table

public function up()
{
    Schema::create('rooms', function (Blueprint $table) {
        $table->id();
        $table->string('room_number')->unique();
        $table->string('type'); // single, double, deluxe, etc.
        $table->decimal('price_per_night', 8, 2);
        $table->text('description')->nullable();
        $table->string('image')->nullable(); // store image filename/path
        $table->enum('status', ['available', 'unavailable'])->default('available');
        $table->timestamps();
    });
}



php artisan make:migration create_bookings_table

public function up()
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('room_id')->constrained()->onDelete('cascade');
        $table->date('check_in');
        $table->date('check_out');
        $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
        $table->timestamps();
    });
}


php artisan make:migration create_payments_table

public function up()
{
    Schema::create('payments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('booking_id')->constrained()->onDelete('cascade');
        $table->decimal('amount', 10, 2);
        $table->string('method'); // e.g. stripe, paypal
        $table->string('transaction_id')->nullable();
        $table->enum('status', ['paid', 'failed'])->default('paid');
        $table->timestamps();
    });
}


php artisan make:migration create_reviews_table

public function up()
{
    Schema::create('reviews', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('room_id')->constrained()->onDelete('cascade');
        $table->unsignedTinyInteger('rating'); // 1 to 5
        $table->text('comment')->nullable();
        $table->timestamps();
    });
}


