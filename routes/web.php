<?php


Route::get('/', function () {
    return view('login.login');
});

/*login register logout */
Route::get('logout',[App\Http\Controllers\LoginController::class, 'logoutPost']);
Route::get('login',[App\Http\Controllers\LoginController::class, 'viewLogin'])->name('admin.login');
Route::post('loginPost',[App\Http\Controllers\LoginController::class, 'loginPost']);
Route::get('register',[App\Http\Controllers\LoginController::class, 'viewRegister'])->name('admin.petugas');
Route::post('registerPost',[App\Http\Controllers\LoginController::class, 'registerPost']);

/* route petugas */
Route::get('petugas/home',[App\Http\Controllers\PetugasController::class, 'viewHome'])->name('petugas.home');
Route::get('petugas/persetujuan',[App\Http\Controllers\PetugasController::class, 'viewPersetujuan'])->name('petugas.persetujuan');
Route::get('petugas/setuju/{kode_sewa}',[App\Http\Controllers\PetugasController::class, 'setujuPost']);
Route::get('petugas/disetujui',[App\Http\Controllers\PetugasController::class, 'viewDisetujui'])->name('petugas.disetujui');


/* route admin */
Route::get('admin/home',[App\Http\Controllers\AdminController::class, 'viewHome'])->name('admin.index');

Route::get('admin/mobil',[App\Http\Controllers\AdminController::class, 'viewMobil'])->name('admin.mobil');
Route::get('admin/tambah/barang',[App\Http\Controllers\AdminController::class, 'viewTambahBarang'])->name('admin.addbarang');
Route::post('admin',[App\Http\Controllers\AdminController::class, 'tambahBarangPost']);
Route::get('admin{id_barang}',[App\Http\Controllers\AdminController::class, 'viewDetailBarang']);
Route::get('admin/edit/barang{id_barang}',[App\Http\Controllers\AdminController::class, 'viewEditBarang']);
Route::patch('admin/{id_barang}',[App\Http\Controllers\AdminController::class, 'editBarangPost']);
Route::delete('admin/delete{id_barang}',[App\Http\Controllers\AdminController::class, 'deletePost']);

Route::get('admin/driver',[App\Http\Controllers\AdminController::class, 'viewDriver'])->name('admin.driver');
Route::get('admin/tambah/driver',[App\Http\Controllers\AdminController::class, 'viewTambahDriver'])->name('admin.adddriver');
Route::post('admin/driverp',[App\Http\Controllers\AdminController::class, 'tambahDriverPost']);
Route::get('admin{id_driver}',[App\Http\Controllers\AdminController::class, 'viewDetailDriver']);
Route::get('admin/edit/driver{id_driver}',[App\Http\Controllers\AdminController::class, 'viewEditDriver']);
Route::patch('admin/{id_driver}',[App\Http\Controllers\AdminController::class, 'editDriverPost']);
Route::delete('admin/delete{id_driver}',[App\Http\Controllers\AdminController::class, 'deletePost']);


Route::get('admin/sewa',[App\Http\Controllers\AdminController::class, 'viewSewa'])->name('admin.sewa');
Route::post('admin/sewap',[App\Http\Controllers\AdminController::class, 'tambahSewa'])->name('admin.sewap');
Route::get('admin/konfirmasip',[App\Http\Controllers\AdminController::class, 'Konfirmasi'])->name('admin.konfirmasi');
Route::get('admin/konfirmasi/{kode_sewa}',[App\Http\Controllers\AdminController::class, 'konfirmasiPost']);


Route::get('admin/histori',[App\Http\Controllers\AdminController::class, 'Histori'])->name('admin.histori');
Route::get('admin/export', [App\Http\Controllers\AdminController::class, 'export']);