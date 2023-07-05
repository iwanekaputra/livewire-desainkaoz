<?php

use App\Http\Controllers\AuthController;
use App\Http\Livewire\Admin\AdminProduct;
use App\Http\Livewire\Admin\AdminSliderController;
use App\Http\Livewire\Admin\Categories\AdminCategoriesCreate;
use App\Http\Livewire\Admin\Categories\AdminCategoriesIndex;
use App\Http\Livewire\Admin\DashboardController;
use App\Http\Livewire\Admin\Designer\AdminDesignerIndex;
use App\Http\Livewire\Admin\Designer\AdminDesignerShow;
use App\Http\Livewire\Admin\Products\AdminProductsCreate;
use App\Http\Livewire\Admin\Products\AdminProductsEdit;
use App\Http\Livewire\Admin\Products\AdminProductsIndex;
use App\Http\Livewire\Admin\Sliders\AdminSlidersCreate;
use App\Http\Livewire\Admin\SubCategories\AdminSubCategoriesCreate;
use App\Http\Livewire\Admin\SubCategories\AdminSubCategoriesIndex;
use App\Http\Livewire\Admin\Transactions\AdminTransactionsEdit;
use App\Http\Livewire\Admin\Transactions\AdminTransactionsIndex;
use App\Http\Livewire\Admin\Users\AdminUsersIndex;
use App\Http\Livewire\Admin\VariantProducts\AdminColorsCreate;
use App\Http\Livewire\Admin\VariantProducts\AdminSizesCreate;
use App\Http\Livewire\Admin\VariantProducts\AdminStylesCreate;
use App\Http\Livewire\Admin\VariantProducts\AdminVariantIndex;
use App\Http\Livewire\Designer\DesignerDashboard;
use App\Http\Livewire\Designer\DesignerDesign;
use App\Http\Livewire\Designer\DesignerSaldo;
use App\Http\Livewire\Designer\DesignerSale;
use App\Http\Livewire\Designer\DesignerSetting;
use App\Http\Livewire\Designer\DesignerShop;
use App\Http\Livewire\Designer\DesignerStore;
use App\Http\Livewire\Designer\UploadDesign;
use App\Http\Livewire\Landingpage\Index;
use App\Http\Livewire\Landingpage\Login;
use App\Http\Livewire\Landingpage\Register;
use App\Http\Livewire\User\CartIndex;
use App\Http\Livewire\User\Checkout;
use App\Http\Livewire\User\Custom;
use App\Http\Livewire\User\Order;
use App\Http\Livewire\User\Products\ProductsCategory;
use App\Http\Livewire\User\Products\ProductsShow;
use App\Http\Livewire\User\ProductsDesign\ProductsDesignCategory;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', Index::class)->name('index');

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::get('/custom', Custom::class)->name('custom');

Route::prefix('admin')->middleware(['auth','admin'])->group(function () {
    Route::get('dashboard', DashboardController::class)->name('admin.dashboard');
    Route::get('products', AdminProductsIndex::class)->name('admin.products.index');
    Route::get('products/create', AdminProductsCreate::class)->name('admin.products.create');
    Route::get('products/edit/{id}', AdminProductsEdit::class)->name('admin.products.edit');

    Route::get('variant/product', AdminVariantIndex::class)->name('admin.variant.index');
    Route::get('variant/colors/create', AdminColorsCreate::class)->name('admin.colors.create');
    Route::get('variant/sizes/create', AdminSizesCreate::class)->name('admin.sizes.create');
    Route::get('variant/styles/create', AdminStylesCreate::class)->name('admin.styles.create');

    Route::get('sliders', AdminSliderController::class)->name('admin.sliders');
    Route::get('sliders/create', AdminSlidersCreate::class)->name('admin.sliders.create');

    Route::get('categories', AdminCategoriesIndex::class)->name('admin.categories.index');
    Route::get('categories/create', AdminCategoriesCreate::class)->name('admin.categories.create');

    Route::get('sub-categories', AdminSubCategoriesIndex::class)->name('admin.sub-categories.index');
    Route::get('sub-categories/create', AdminSubCategoriesCreate::class)->name('admin.sub-categories.create');

    Route::get('designer/index', AdminDesignerIndex::class)->name('admin.designer.index');
    Route::get('designer/show/{id}', AdminDesignerShow::class)->name('admin.designer.show');

    Route::get('transactions', AdminTransactionsIndex::class)->name('admin.transactions.index');
    Route::get('transactions/{id}', AdminTransactionsEdit::class)->name('admin.transactions.edit');
    Route::get('users', AdminUsersIndex::class)->name('admin.users.index');
});

Route::prefix('designer')->middleware(['auth', 'designer'])->group(function () {
    Route::get('dashboard', DesignerDashboard::class)->name('designer.dashboard');
    Route::get('saldo', DesignerSaldo::class)->name('designer.saldo');
    Route::get('store', DesignerStore::class)->name('designer.store');
    Route::get('setting', DesignerSetting::class)->name('designer.setting');
    Route::get('sale', DesignerSale::class)->name('designer.sale');
    Route::get('design', DesignerDesign::class)->name('designer.design');
});

Route::get('products', ProductsShow::class)->name('products.index');
Route::get('products/category/{id}', ProductsCategory::class)->name('products.category');
Route::get('products/{id}', ProductsShow::class)->name('products.show');

Route::get('shop/{id}', DesignerShop::class)->name('designer.shop');


Route::get('products/design/category/{id}', ProductsDesignCategory::class)->name('products.design.category');

Route::get('carts', CartIndex::class)->name('carts.index');
Route::get('order', Order::class)->name('order');

Route::get('checkout', Checkout::class)->name('checkout');


Route::get('carts', CartIndex::class)->name('carts.index')->middleware(['auth']);
Route::get('checkout', Checkout::class)->name('checkout')->middleware(['auth']);
Route::get('upload-design', UploadDesign::class)->name('designer.upload-design')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware(['auth']);



Route::get('products', ProductsShow::class)->name('products.index');
Route::get('products/category/{id}', ProductsCategory::class)->name('products.category');
Route::get('products/{id}', ProductsShow::class)->name('products.show');
Route::get('shop/{id}', DesignerShop::class)->name('designer.shop');
Route::get('products/design/category/{id}', ProductsDesignCategory::class)->name('products.design.category');
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');
