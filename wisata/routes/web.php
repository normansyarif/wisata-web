<?php

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

Auth::routes();

//-------------------
// Guest Controller
//-------------------
Route::get('/', 'GuestController@home')->name('home');
Route::get('/hubungi-kami', 'GuestController@contact')->name('contact');
Route::get('/cari-plus-code', 'GuestController@getPlusCode')->name('plus-code');
Route::get('/terms-and-conditions', 'GuestController@tac')->name('tac');
Route::post('/pesan/insert', 'GuestController@pesanInsert')->name('pesan.insert');


//-------------------
// User Controller
//-------------------
Route::get('/profile', 'UserController@profile')->name('profile');
Route::get('/lengkapi-data', 'UserController@completeData')->name('complete-data');
Route::post('/lengkapi-data/post', 'UserController@completeDataPost')->name('complete-data.post');
Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');

Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/profile/update', 'UserController@profileUpdate')->name('profile.update');
Route::post('/profile/pass/update', 'UserController@passUpdate')->name('profile.pass.update');

//-------------------
// Admin Controller
//-------------------
Route::get('/admin/progress', 'AdminController@progressIndex')->name('admin.progress');
Route::get('/admin/approved', 'AdminController@approvedIndex')->name('admin.approved');
Route::get('/admin/rejected', 'AdminController@rejectedIndex')->name('admin.rejected');

Route::get('/admin/homestay/{id}', 'AdminController@homestayView')->name('admin.homestay');
Route::post('/admin/homestay/{id}/delete', 'AdminController@homestayDelete')->name('admin.homestay.delete');
Route::post('/admin/homestay/{id}/accept', 'AdminController@homestayAccept')->name('admin.homestay.accept');
Route::post('/admin/homestay/{id}/reject', 'AdminController@homestayReject')->name('admin.homestay.reject');

Route::get('/admin/souvenir/{id}', 'AdminController@souvenirView')->name('admin.souvenir');
Route::post('/admin/souvenir/{id}/delete', 'AdminController@souvenirDelete')->name('admin.souvenir.delete');
Route::post('/admin/souvenir/{id}/accept', 'AdminController@souvenirAccept')->name('admin.souvenir.accept');
Route::post('/admin/souvenir/{id}/reject', 'AdminController@souvenirReject')->name('admin.souvenir.reject');

Route::get('/admin/guide/{id}', 'AdminController@guideView')->name('admin.guide');
Route::post('/admin/guide/{id}/delete', 'AdminController@guideDelete')->name('admin.guide.delete');
Route::post('/admin/guide/{id}/accept', 'AdminController@guideAccept')->name('admin.guide.accept');
Route::post('/admin/guide/{id}/reject', 'AdminController@guideReject')->name('admin.guide.reject');

Route::get('/admin/art/{id}', 'AdminController@artView')->name('admin.art');
Route::post('/admin/art/{id}/delete', 'AdminController@artDelete')->name('admin.art.delete');
Route::post('/admin/art/{id}/accept', 'AdminController@artAccept')->name('admin.art.accept');
Route::post('/admin/art/{id}/reject', 'AdminController@artReject')->name('admin.art.reject');

Route::get('/admin/slider', 'AdminController@sliderIndex')->name('admin.slider');
Route::get('/admin/slider/add', 'AdminController@sliderAdd')->name('admin.slider.add');
Route::post('/admin/slider/insert', 'AdminController@sliderInsert')->name('admin.slider.insert');
Route::get('/admin/slider/{id}/edit', 'AdminController@sliderEdit')->name('admin.slider.edit');
Route::post('/admin/slider/{id}/delete', 'AdminController@sliderDelete')->name('admin.slider.delete');
Route::post('/admin/slider/{id}/update', 'AdminController@sliderUpdate')->name('admin.slider.update');

Route::get('/admin/wilayah', 'AdminController@wilayahIndex')->name('admin.wilayah');
Route::get('/admin/wilayah/add', 'AdminController@wilayahAdd')->name('admin.wilayah.add');
Route::post('/admin/wilayah/insert', 'AdminController@wilayahInsert')->name('admin.wilayah.insert');
Route::get('/admin/wilayah/{id}/edit', 'AdminController@wilayahEdit')->name('admin.wilayah.edit');
Route::post('/admin/wilayah/{id}/delete', 'AdminController@wilayahDelete')->name('admin.wilayah.delete');
Route::post('/admin/wilayah/{id}/update', 'AdminController@wilayahUpdate')->name('admin.wilayah.update');

Route::get('/admin/destinasi', 'AdminController@destinasiIndex')->name('admin.destinasi');
Route::get('/admin/destinasi/add', 'AdminController@destinasiAdd')->name('admin.destinasi.add');
Route::post('/admin/destinasi/insert', 'AdminController@destinasiInsert')->name('admin.destinasi.insert');
Route::get('/admin/destinasi/{id}/edit', 'AdminController@destinasiEdit')->name('admin.destinasi.edit');
Route::post('/admin/destinasi/{id}/delete', 'AdminController@destinasiDelete')->name('admin.destinasi.delete');
Route::post('/admin/destinasi/{id}/update', 'AdminController@destinasiUpdate')->name('admin.destinasi.update');



Route::get('/admin/rm/{id}', 'AdminController@rmView')->name('admin.rm');
Route::post('/admin/rm/{id}/delete', 'AdminController@rmDelete')->name('admin.rm.delete');
Route::post('/admin/rm/{id}/accept', 'AdminController@rmAccept')->name('admin.rm.accept');
Route::post('/admin/rm/{id}/reject', 'AdminController@rmReject')->name('admin.rm.reject');

Route::get('/admin/tani/{id}', 'AdminController@taniView')->name('admin.tani');
Route::post('/admin/tani/{id}/delete', 'AdminController@taniDelete')->name('admin.tani.delete');
Route::post('/admin/tani/{id}/accept', 'AdminController@taniAccept')->name('admin.tani.accept');
Route::post('/admin/tani/{id}/reject', 'AdminController@taniReject')->name('admin.tani.reject');

Route::get('/admin/umkm/{id}', 'AdminController@umkmView')->name('admin.umkm');
Route::post('/admin/umkm/{id}/delete', 'AdminController@umkmDelete')->name('admin.umkm.delete');
Route::post('/admin/umkm/{id}/accept', 'AdminController@umkmAccept')->name('admin.umkm.accept');
Route::post('/admin/umkm/{id}/reject', 'AdminController@umkmReject')->name('admin.umkm.reject');

Route::get('/admin/kendaraan/{id}', 'AdminController@kendaraanView')->name('admin.kendaraan');
Route::post('/admin/kendaraan/{id}/delete', 'AdminController@kendaraanDelete')->name('admin.kendaraan.delete');
Route::post('/admin/kendaraan/{id}/accept', 'AdminController@kendaraanAccept')->name('admin.kendaraan.accept');
Route::post('/admin/kendaraan/{id}/reject', 'AdminController@kendaraanReject')->name('admin.kendaraan.reject');



Route::get('/admin/event', 'AdminController@eventIndex')->name('admin.event');
Route::get('/admin/event/add', 'AdminController@eventAdd')->name('admin.event.add');
Route::post('/admin/event/insert', 'AdminController@eventInsert')->name('admin.event.insert');
Route::get('/admin/event/{id}/edit', 'AdminController@eventEdit')->name('admin.event.edit');
Route::post('/admin/event/{id}/delete', 'AdminController@eventDelete')->name('admin.event.delete');
Route::post('/admin/event/{id}/update', 'AdminController@eventUpdate')->name('admin.event.update');

Route::get('/admin/users', 'AdminController@userIndex')->name('admin.users');
Route::get('/admin/users/{id}/view', 'AdminController@userView')->name('admin.users.view');
Route::post('/admin/users/{id}/delete', 'AdminController@userDelete')->name('admin.users.delete');

Route::get('/admin/messages', 'AdminController@messageIndex')->name('admin.messages');
Route::post('/admin/messages/{id}/delete', 'AdminController@messageDelete')->name('admin.messages.delete');

//-------------------
// Statistik Controller
//-------------------

Route::get('/admin/statistik', 'AdminController@statistikIndex')->name('admin.statistik');
Route::get('/admin/statistikView/{id}', 'AdminController@statistikView')->name('admin.statistikView');
Route::get('/admin/statistik/add', 'AdminController@statistikAdd')->name('admin.statistik.add');
Route::post('/admin/statistik/insert', 'AdminController@statistikInsert')->name('admin.statistik.insert');
Route::get('/admin/statistik/{id}/edit', 'AdminController@statistikEdit')->name('admin.statistik.edit');
Route::post('/admin/statistik/{id}/delete', 'AdminController@statistikDelete')->name('admin.statistik.delete');
Route::post('/admin/statistik/{id}/update', 'AdminController@statistikUpdate')->name('admin.statistik.update');


//-------------------
// Bumdes Controller
//-------------------

Route::get('/admin/bumdes', 'BumdesController@index')->name('admin.bumdes');
Route::get('/admin/bumdes/add', 'BumdesController@add')->name('admin.bumdes.add');
Route::post('/admin/bumdes/insert', 'BumdesController@insert')->name('admin.bumdes.insert');
Route::get('/admin/bumdes/{id}/edit', 'BumdesController@edit')->name('admin.bumdes.edit');
Route::post('/admin/bumdes/{id}/delete', 'BumdesController@delete')->name('admin.bumdes.delete');
Route::post('/admin/bumdes/{id}/update', 'BumdesController@update')->name('admin.bumdes.update');

//-------------------
// Gov Controller
//-------------------

Route::get('/admin/gov', 'GovController@index')->name('admin.gov');
Route::get('/admin/gov/add', 'GovController@add')->name('admin.gov.add');
Route::post('/admin/gov/insert', 'GovController@insert')->name('admin.gov.insert');
Route::get('/admin/gov/{id}/edit', 'GovController@edit')->name('admin.gov.edit');
Route::post('/admin/gov/{id}/delete', 'GovController@delete')->name('admin.gov.delete');
Route::post('/admin/gov/{id}/update', 'GovController@update')->name('admin.gov.update');


//-------------------
// Art Controller
//-------------------
Route::get('/kelompok-seni', 'ArtController@index')->name('art');
Route::get('/kelompok-seni/add', 'ArtController@add')->name('art.add');
Route::post('/kelompok-seni/insert', 'ArtController@insert')->name('art.insert');
Route::get('/kelompok-seni/{id}/edit', 'ArtController@edit')->name('art.edit');
Route::post('/kelompok-seni/{id}/delete', 'ArtController@delete')->name('art.delete');
Route::post('/kelompok-seni/{id}/update', 'ArtController@update')->name('art.update');

//-------------------
// Rumah makan Controller
//-------------------
Route::get('/rumah-makan', 'RMController@index')->name('rm');
Route::get('/rumah-makan/add', 'RMController@add')->name('rm.add');
Route::post('/rumah-makan/insert', 'RMController@insert')->name('rm.insert');
Route::get('/rumah-makan/{id}/edit', 'RMController@edit')->name('rm.edit');
Route::post('/rumah-makan/{id}/delete', 'RMController@delete')->name('rm.delete');
Route::post('/rumah-makan/{id}/update', 'RMController@update')->name('rm.update');

//-------------------
// Tani Controller
//-------------------
Route::get('/tani', 'TaniController@index')->name('tani');
Route::get('/tani/add', 'TaniController@add')->name('tani.add');
Route::post('/tani/insert', 'TaniController@insert')->name('tani.insert');
Route::get('/tani/{id}/edit', 'TaniController@edit')->name('tani.edit');
Route::post('/tani/{id}/delete', 'TaniController@delete')->name('tani.delete');
Route::post('/tani/{id}/update', 'TaniController@update')->name('tani.update');

//-------------------
// umkm Controller
//-------------------
Route::get('/umkm', 'UMKMController@index')->name('umkm');
Route::get('/umkm/add', 'UMKMController@add')->name('umkm.add');
Route::post('/umkm/insert', 'UMKMController@insert')->name('umkm.insert');
Route::get('/umkm/{id}/edit', 'UMKMController@edit')->name('umkm.edit');
Route::post('/umkm/{id}/delete', 'UMKMController@delete')->name('umkm.delete');
Route::post('/umkm/{id}/update', 'UMKMController@update')->name('umkm.update');

//-------------------
// Kendaraan Controller
//-------------------
Route::get('/kendaraan', 'KendaraanController@index')->name('kendaraan');
Route::get('/kendaraan/add', 'KendaraanController@add')->name('kendaraan.add');
Route::post('/kendaraan/insert', 'KendaraanController@insert')->name('kendaraan.insert');
Route::get('/kendaraan/{id}/edit', 'KendaraanController@edit')->name('kendaraan.edit');
Route::post('/kendaraan/{id}/delete', 'KendaraanController@delete')->name('kendaraan.delete');
Route::post('/kendaraan/{id}/update', 'KendaraanController@update')->name('kendaraan.update');


//-------------------
// Guide Controller
//-------------------
Route::get('/tour-guide', 'GuideController@index')->name('guide');
Route::post('/tour-guide/insert', 'GuideController@insert')->name('guide.insert');
Route::post('/tour-guide/{id}/delete', 'GuideController@delete')->name('guide.delete');
Route::post('/tour-guide/{id}/update', 'GuideController@update')->name('guide.update');


//-------------------
// Homestay Controller
//-------------------
Route::get('/homestay', 'HomestayController@index')->name('homestay');
Route::get('/homestay/add', 'HomestayController@add')->name('homestay.add');
Route::post('/homestay/insert', 'HomestayController@insert')->name('homestay.insert');
Route::get('/homestay/{id}/edit', 'HomestayController@edit')->name('homestay.edit');
Route::post('/homestay/{id}/delete', 'HomestayController@delete')->name('homestay.delete');
Route::post('/homestay/{id}/update', 'HomestayController@update')->name('homestay.update');


//-------------------
// Souvenir Controller
//-------------------
Route::get('/souvenir', 'SouvenirController@index')->name('souvenir');
Route::get('/souvenir/add', 'SouvenirController@add')->name('souvenir.add');
Route::post('/souvenir/insert', 'SouvenirController@insert')->name('souvenir.insert');
Route::get('/souvenir/{id}/edit', 'SouvenirController@edit')->name('souvenir.edit');
Route::post('/souvenir/{id}/delete', 'SouvenirController@delete')->name('souvenir.delete');
Route::post('/souvenir/{id}/update', 'SouvenirController@update')->name('souvenir.update');


//--------------------
// Webview
//--------------------
Route::get('/webview/wilayah-index', 'WebviewController@wilayahIndex')->name('wv.wilayah.index');
Route::get('/webview/wilayah-map', 'WebviewController@wilayahMap')->name('wv.wilayah.map');
Route::get('/webview/wilayah-select', 'WebviewController@wilayahSelect')->name('wv.wilayah.select');
Route::get('/webview/list', 'WebviewController@list')->name('wv.list');
Route::get('/webview/review', 'WebviewController@review')->name('wv.review');
Route::get('/webview/wilayah-content/{type}/{id}', 'WebviewController@wilayahContent');
Route::get('/webview/wv/{type}/{id}', 'WebviewController@mpWebview');
Route::get('/webview/deskripsi/{type}/{id}', 'WebviewController@deskripsi');


//-------------------
// Ajax for webview
//-------------------
Route::get('/ajax/list', 'WebviewController@ajaxList')->name('ajax.list');
Route::get('/ajax/review-content', 'WebviewController@ajaxReview')->name('ajax.review');
