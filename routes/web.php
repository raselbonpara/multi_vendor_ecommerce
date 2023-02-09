<?php

    use App\Http\Controllers\Admin\AdminController;
    use App\Http\Controllers\Admin\BrandController;
    use App\Http\Controllers\Admin\CategoryController;
    use App\Http\Controllers\Admin\SubcategoryController;
    use App\Http\Controllers\Admin\SupplierController;
    use App\Http\Controllers\Admin\OrderController;
    use App\Http\Controllers\Admin\VendorController as AdminVendorController;
    use App\Http\Controllers\Frontend\CartController;
    use App\Http\Controllers\Frontend\FrontendController;
    use App\Http\Controllers\Frontend\VendorController;
    use App\Http\Controllers\Auth\RegisterController;
    use App\Http\Controllers\Auth\LoginController;
    

    use Illuminate\Support\Facades\Route;
    //use App\Http\Controllers\ProfileController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', [FrontendController::class, 'index']);
    Route::get('/product/details/{id}', [FrontendController::class, 'productDetails']);
    Route::post('/review/store', [FrontendController::class, 'customerReview']);
    Route::post('/add/to/cart', [CartController::class, 'addToCart']);
    Route::get('/checkout', [CartController::class, 'checkout']);
    Route::post('/cart/product/update/{id}', [CartController::class, 'cartProductUpdate']);
    Route::get('/cart/product/delete/{id}', [CartController::class, 'cartProductDelete']);
    Route::post('/customer/details/for-order', [CartController::class, 'orderComplete']);

    //User controller routes
    Route::get('/user/register', [FrontendController::class, 'userRegister']);
    Route::get('/user/login', [FrontendController::class, 'userLogin']);


    Route::get('/vendor/register', [VendorController::class, 'vendorRegister']);
    Route::post('/vendor/registration', [VendorController::class, 'vendorRegistration']);
    Route::post('/vendor/login', [VendorController::class, 'vendorLogin']);
    Route::get('/vendor/dashboard', [VendorController::class, 'vendorDashboard']);
    Route::get('/vendor/product/create', [VendorController::class, 'vendorProductCreateForm']);
    Route::post('/vendor/product/store', [VendorController::class, 'vendorProductStore']);
    Route::get('/vendor/logout', [VendorController::class, 'vendorLogout']);

    //AdminController routes
    Route::get('/admin/login', [AdminController::class, 'adminLoginForm']);
    Route::post('/admin/login', [AdminController::class, 'adminLogin']);
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);
    Route::get('/admin/logout', [AdminController::class, 'adminLogout']);


    //Category controller
    Route::get('/category/create', [CategoryController::class, 'categoryCreate']);
    Route::get('/category/manage', [CategoryController::class, 'categoryManage']);
    Route::post('/category/store', [CategoryController::class, 'categoryStore']);
    Route::get('/category/edit/{id}', [CategoryController::class, 'categoryEdit']);
    Route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate']);
    Route::get('/category/delete/{id}', [CategoryController::class, 'categoryDelete']);

    //Subcategory controller
    Route::get('/subcategory/create', [SubcategoryController::class, 'subcategoryCreate']);
    Route::get('/subcategory/manage', [SubcategoryController::class, 'subcategoryManage']);
    Route::post('/subcategory/store', [SubcategoryController::class, 'subcategoryStore']);

    //Subcategory controller
    Route::get('/brand/create', [BrandController::class, 'brandCreate']);
    Route::get('/brand/manage', [BrandController::class, 'brandManage']);
    Route::post('/brand/store', [BrandController::class, 'brandStore']);

    //Verndor controller
    Route::get('/vendors', [SupplierController::class, 'vendors']);
    Route::get('/admin/vendor/approved/{id}', [SupplierController::class, 'vendorApproved']);
    Route::get('/admin/vendor/pending/{id}', [SupplierController::class, 'vendorPending']);

    Route::get('/vendor/products', [SupplierController::class, 'vendorProducts']);
    Route::get('/vendor/product/approved/{id}', [SupplierController::class, 'vendorProductApproved']);
    Route::get('/vendor/product/pending/{id}', [SupplierController::class, 'vendorProductPending']);
    Route::get('/vendor/orders', [SupplierController::class, 'vendorOrders']);
    Route::get('/vendor/pending/product', [SupplierController::class, 'vendorPendingProductList']);
    Route::get('/vendor/approved/product', [SupplierController::class, 'vendorAprovedProductList']);

    Route::get('/orders', [OrderController::class, 'customerOrders']);


   
    //after npm install this was created prev class
   // Auth::routes();

    //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



require __DIR__.'/auth.php';


    



    


