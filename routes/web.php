<?php

use App\Http\Controllers\Web\Admin\AuthController;
use App\Http\Controllers\Web\Admin\DashboardController;
use App\Http\Controllers\Web\Admin\DreamController as AdminDreamController;
use App\Http\Controllers\Web\Admin\MarketplaceController as AdminMarketplaceController;
use App\Http\Controllers\Web\Admin\UserController as AdminUserController;
use App\Http\Controllers\Web\NewsController;
use App\Http\Middleware\EnsureAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

/*
|--------------------------------------------------------------------------
| Public Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/tentang-kami', function () {
    return view('about');
})->name('about');

Route::get('/fitur', function () {
    return view('features');
})->name('features');

Route::get('/kalkulator', function () {
    return view('calculator');
})->name('calculator');

// News & Articles Routes
Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('news.show');

// Dynamic SEO XML Sitemap Route
Route::get('/sitemap.xml', function () {
    $baseUrl = url('/');
    $newsSlugs = [
        '5-cara-efektif-mengubah-impian-gadget-jadi-target-menabung-harian',
        'mengapa-menabung-bebas-utang-lebih-menenangkan',
        'strategi-mengelola-multi-wallet'
    ];

    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    // Static Pages
    $xml .= '<url><loc>' . $baseUrl . '/</loc><changefreq>daily</changefreq><priority>1.0</priority></url>';
    $xml .= '<url><loc>' . $baseUrl . '/fitur</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';
    $xml .= '<url><loc>' . $baseUrl . '/kalkulator</loc><changefreq>daily</changefreq><priority>0.9</priority></url>';
    $xml .= '<url><loc>' . $baseUrl . '/tentang-kami</loc><changefreq>monthly</changefreq><priority>0.8</priority></url>';
    $xml .= '<url><loc>' . $baseUrl . '/berita</loc><changefreq>daily</changefreq><priority>0.9</priority></url>';

    // News Detail Pages
    foreach ($newsSlugs as $slug) {
        $xml .= '<url><loc>' . $baseUrl . '/berita/' . $slug . '</loc><changefreq>weekly</changefreq><priority>0.8</priority></url>';
    }

    $xml .= '</urlset>';

    return Response::make($xml, 200, ['Content-Type' => 'text/xml']);
})->name('sitemap');

/*
|--------------------------------------------------------------------------
| Admin Panel Routes (Session Auth - Guard 'admin')
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    // Guest Admin Routes
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    });

    // Authenticated Admin Routes (Protected by EnsureAdmin)
    Route::middleware(['auth:admin', EnsureAdmin::class])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Marketplace Catalog Management
        Route::get('/marketplace', [AdminMarketplaceController::class, 'index'])->name('marketplace.index');
        Route::post('/marketplace', [AdminMarketplaceController::class, 'store'])->name('marketplace.store');
        Route::post('/marketplace/{id}/toggle', [AdminMarketplaceController::class, 'toggleStatus'])->name('marketplace.toggle');
        Route::delete('/marketplace/{id}', [AdminMarketplaceController::class, 'destroy'])->name('marketplace.destroy');

        // User App Management
        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::delete('/users/{id}', [AdminUserController::class, 'destroy'])->name('users.destroy');

        // Dreams Monitoring
        Route::get('/dreams', [AdminDreamController::class, 'index'])->name('dreams.index');
        Route::delete('/dreams/{id}', [AdminDreamController::class, 'destroy'])->name('dreams.destroy');

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

});
