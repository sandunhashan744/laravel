<?php
use Illuminate\Support\Facades\Route;

//-------------------------------
//          Test Routs Pages
//-------------------------------


Route::get('checkout', function () {
   return view('/elegent/checkout');
});

Route::get('popup', function () {
   return view('/admin/editProduct');
});

//-------------------------------
//          Admin Pages
//-------------------------------

// Dash Bord
Route::get('/admin', [App\Http\Controllers\AdminPage\dashbordController::class, 'loaddashbord']);

Route::post('/addProduct','App\Http\Controllers\productController@saveProduct');

Route::post('/seveCategory','App\Http\Controllers\categoryController@saveCat');

Route::post('/seveSubCategory','App\Http\Controllers\categoryController@saveSubCat');

Route::get('/category/delete/{catid}', [App\Http\Controllers\categoryController::class, 'deleteCats'])->name('category.delete');
Route::get('/category/update/{catid}', [App\Http\Controllers\categoryController::class, 'updateCats'])->name('category.update');

//************************************************************************************************


Route::get('/category', [App\Http\Controllers\loadController::class, 'loadData'])->name('category');

Route::get('/product', [App\Http\Controllers\loadController::class, 'loadProductForm'])->name('product.details');

Route::post('/ajax-subcat', [App\Http\Controllers\loadController::class, 'loadsubcat'])->name('loadSubcat');


Route::get('/customers', [App\Http\Controllers\loadController::class, 'loadCusDetails'])->name('customer.details');


//********************************** Product Add,Delete,Update **********************************

Route::get('/product/delete/{productid}', [App\Http\Controllers\productController::class, 'deleteProduct'])->name('product.delete');

Route::get('/product/edit/{productid}', [App\Http\Controllers\productController::class, 'editProduct'])->name('product.edit');

Route::put('/product/update/{productid}', [App\Http\Controllers\productController::class, 'updataProduct']);

Route::get('/product/add', [App\Http\Controllers\productController::class, 'addnewproduct'])->name('product.add');



//********************************** Search Product Routs **************************************

Route::get('/product-list', [App\Http\Controllers\HomePage\homepageController::class, 'productlistAjax']);

Route::post('/searchProduct', [App\Http\Controllers\HomePage\homepageController::class, 'productSearch']);

//*********************************************************************************************

Auth::routes();

//********************************* Home Page / Single Product Page ********************************

//shop page

Route::get('/shop/{id}', [App\Http\Controllers\HomePage\shopController::class, 'shopPage'])->name('shop');

Route::get('/shop/subcat/{catid}/{scatid}', [App\Http\Controllers\HomePage\shopController::class, 'suctategory'])->name('shopSubcat');
//shopSubcat


Route::get('/home', [App\Http\Controllers\HomePage\homepageController::class, 'loadProducts'])->name('home');

Route::get('/', [App\Http\Controllers\HomePage\homepageController::class, 'loadProducts'])->name('index');

//Route::get('/single-product/show/{productid}', [App\Http\Controllers\loadController::class, 'showProduct'])->name('product.show');
Route::get('/single-product/show/{productid}', [App\Http\Controllers\HomePage\singalProductController::class, 'showProduct'])->name('product.show');
 

//***************************************************************************************************

Route::middleware(['auth'])->group(function(){

   Route::get('cart',[App\Http\Controllers\HomePage\cartController::class, 'viewCart']);
   Route::get('/checkout',[App\Http\Controllers\HomePage\checkoutController::class, 'index']);
   Route::post('place-order',[App\Http\Controllers\HomePage\checkoutController::class, 'placeorder']);

   //Single Product Page to Checkout
   Route::get('single-checkout',[App\Http\Controllers\HomePage\checkoutController::class, 'loadChechout']);

   Route::get('my-orders',[App\Http\Controllers\HomePage\userController::class, 'index']);

   Route::get('viewOrder/{id}',[App\Http\Controllers\HomePage\userController::class, 'view']);

});

// Cart Area: Add/ cartcount/ remove cart/ 

Route::post('add-to-cart',[App\Http\Controllers\HomePage\cartController::class, 'addCart']);

Route::get('/load-cart-data',[App\Http\Controllers\HomePage\cartController::class, 'cartCount']);


Route::post('delete-to-cart',[App\Http\Controllers\HomePage\cartController::class, 'removeCart']);

Route::post('/update-cartTotPrice',[App\Http\Controllers\HomePage\cartController::class, 'updatePrice']);


// Admin Manage size 

Route::get('/admin/size-manage',[App\Http\Controllers\sizeManageController::class, 'loadCat_to_sizeManage'])->name('manage.size');

Route::post('/sizeOptimize',[App\Http\Controllers\sizeManageController::class, 'saveSizeDetails']);

Route::get('/sizePro/delete/{sizeid}', [App\Http\Controllers\sizeManageController::class, 'deleteSize'])->name('sizePro.delete');

Route::get('/sizePro/edit/{sizeid}', [App\Http\Controllers\sizeManageController::class, 'loadCat_to_sizeManage'])->name('sizePro.edit');

//find the size by User
Route::post('/find-size', [App\Http\Controllers\HomePage\shopController::class, 'findSize']);



// Admin view order Details

Route::get('/view/orders', [App\Http\Controllers\AdminPage\orderViewController::class, 'viewOrder'])->name('view.order.admin');

Route::get('admin/order-details/{id}', [App\Http\Controllers\AdminPage\orderViewController::class, 'viewOrderDetails'])->name('view.order.Details');

Route::get('admin/orderHistory/', [App\Http\Controllers\AdminPage\orderViewController::class, 'viewOrderHistory']);

Route::put('/update/order/status/{id}', [App\Http\Controllers\AdminPage\orderViewController::class, 'updateStatus'])->name('order.status');

