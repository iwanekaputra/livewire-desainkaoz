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

Route::get('/admin/dashboard', DashboardController::class)->name('admin.dashboard');
Route::get('/admin/products', AdminProductsIndex::class)->name('admin.products.index');
Route::get('/admin/products/create', AdminProductsCreate::class)->name('admin.products.create');
Route::get('/admin/products/edit/{id}', AdminProductsEdit::class)->name('admin.products.edit');

Route::get('/designer/dashboard', DesignerDashboard::class)->name('designer.dashboard');

Route::get('/designer/saldo', DesignerSaldo::class)->name('designer.saldo');
Route::get('/designer/store', DesignerStore::class)->name('designer.store');
Route::get('/designer/setting', DesignerSetting::class)->name('designer.setting');
Route::get('/designer/sale', DesignerSale::class)->name('designer.sale');
Route::get('/designer/design', DesignerDesign::class)->name('designer.design');

Route::get('/admin/variant/product', AdminVariantIndex::class)->name('admin.variant.index');
Route::get('/admin/variant/colors/create', AdminColorsCreate::class)->name('admin.colors.create');
Route::get('/admin/variant/sizes/create', AdminSizesCreate::class)->name('admin.sizes.create');
Route::get('/admin/variant/styles/create', AdminStylesCreate::class)->name('admin.styles.create');
Route::get('/admin/sliders', AdminSliderController::class)->name('admin.sliders');
Route::get('/admin/sliders/create', AdminSlidersCreate::class)->name('admin.sliders.create');
Route::get('/admin/categories', AdminCategoriesIndex::class)->name('admin.categories.index');
Route::get('/admin/categories/create', AdminCategoriesCreate::class)->name('admin.categories.create');


Route::get('/admin/sub-categories', AdminSubCategoriesIndex::class)->name('admin.sub-categories.index');
Route::get('/admin/sub-categories/create', AdminSubCategoriesCreate::class)->name('admin.sub-categories.create');

Route::get('/admin/designer/index', AdminDesignerIndex::class)->name('admin.designer.index');
Route::get('/admin/designer/show/{id}', AdminDesignerShow::class)->name('admin.designer.show');

Route::get('/admin/transactions', AdminTransactionsIndex::class)->name('admin.transactions.index');
Route::get('/admin/transactions/{id}', AdminTransactionsEdit::class)->name('admin.transactions.edit');

Route::get('products', ProductsShow::class)->name('products.index');
Route::get('products/category/{id}', ProductsCategory::class)->name('products.category');
Route::get('products/{id}', ProductsShow::class)->name('products.show');

Route::get('shop/{id}', DesignerShop::class)->name('designer.shop');


Route::get('products/design/category/{id}', ProductsDesignCategory::class)->name('products.design.category');

Route::get('carts', CartIndex::class)->name('carts.index');
Route::get('order', Order::class)->name('order');

Route::get('checkout', Checkout::class)->name('checkout');

Route::get('upload-design', UploadDesign::class)->name('designer.upload-design');


Route::get('/admin/users', AdminUsersIndex::class)->name('admin.users.index');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');
