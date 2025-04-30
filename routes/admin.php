<?php

use App\Http\Controllers\Admin\AirportBookingAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\RelationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\AdminAccessController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\UserAccessController;
use \App\Http\Controllers\ReportController;
use \App\Http\Controllers\GeneratorController;
use App\Http\Controllers\Admin\AirlineTravelRequestController;
use App\Http\Controllers\Admin\TourBookingAdminController;


Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.loginForm');
Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/logout', [AdminController::class, 'logOut'])->name('admin.logOut');

Route::get('/language/change/{abbr}', [LanguageController::class, 'change'])->name("language.change")->middleware('admin-access');


Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('admin-access');
Route::get('/visit/pack', [AdminController::class, 'packVisits']);

Route::get('/admins', [AdminController::class, 'index'])->name("admin.index")->middleware('admin-access:admin,show');
Route::get('/admin/storeform', [AdminController::class, 'storeform'])->name("admin.storeform")->middleware('admin-access:admin,store');
Route::post('/admin/store', [AdminController::class, 'store'])->name("admin.store")->middleware('admin-access:admin,store');
Route::get('/admin/editform/{id}', [AdminController::class, 'editform'])->name("admin.editform")->middleware('admin-access:admin,edit');
Route::put('/admin/update/{id}', [AdminController::class, 'edit'])->name("admin.update")->middleware('admin-access:admin,edit');
Route::get('/admin/destroy/{id}', [AdminController::class, 'destroy'])->name("admin.destroy")->middleware('admin-access:admin,delete');

Route::get('/admin-access/{adminId}', [AdminAccessController::class, 'index'])->name("admin-access.index")->middleware('admin-access:admin,edit');
Route::get('/admin-access/show/{adminId}/{name}/{catSlug?}', [AdminAccessController::class, 'show'])->name('admin-access.show')->middleware('admin-access:admin,edit');
Route::get('/admin-access/store/{adminId}/{name}/{catSlug?}', [AdminAccessController::class, 'store'])->name('admin-access.store')->middleware('admin-access:admin,edit');
Route::get('/admin-access/edit/{adminId}/{name}/{catSlug?}', [AdminAccessController::class, 'edit'])->name('admin-access.edit')->middleware('admin-access:admin,edit');
Route::get('/admin-access/delete/{adminId}/{name}/{catSlug?}', [AdminAccessController::class, 'delete'])->name('admin-access.delete')->middleware('admin-access:admin,edit');

Route::get('/report/{adminId}', [ReportController::class, 'index'])->name("report.index")->middleware('admin-access:admin,show');


Route::get('/setting', [SettingController::class, 'index'])->name("setting.index")->middleware("admin-access:setting,show");
Route::put('/setting/update/{lang}', [SettingController::class, 'edit'])->name("setting.update")->middleware("admin-access:setting,edit");


Route::get('/records/{slug}/{parentSlug?}/{parentId?}', [RecordController::class, 'index'])->name("record.index")->middleware('admin-access:record,show');
Route::get('/pagination/{slug}/{parentSlug?}/{parentId?}', [RecordController::class, 'pagination'])->name('record.pagination')->middleware('admin-access:record,show');
Route::get('/storeform/{slug}/{parentSlug?}/{parentId?}', [RecordController::class, 'storeform'])->name("record.storeform")->middleware('admin-access:record,store');
Route::post('/store/{slug}/{parentSlug?}/{parentId?}', [RecordController::class, 'store'])->name("record.store")->middleware('admin-access:record,store');
Route::get('/editform/{slug}/{id}', [RecordController::class, 'editform'])->name("record.editform")->middleware('admin-access:record,edit');
Route::put('/update/{slug}/{id}', [RecordController::class, 'edit'])->name("record.update")->middleware('admin-access:record,edit');
Route::get('/destroy/{slug}/{id}', [RecordController::class, 'destroy'])->name("record.destroy")->middleware('admin-access:record,delete');
Route::get('/active/{slug}/{fieldName}/{id}', [RecordController::class, 'active'])->name("record.active")->middleware('admin-access:record,edit');
Route::get('/sort/{slug}', [RecordController::class, 'sort'])->name("record.sort")->middleware('admin-access:record,store');
Route::get('/export/{slug}/{parentSlug?}/{parentId?}', [RecordController::class, 'export'])->name("record.export")->middleware('admin-access:record,show');
Route::get('/pdf/{slug}/{parentSlug?}/{parentId?}', [RecordController::class, 'pdf'])->name("record.pdf")->middleware('admin-access:record,show');
Route::post('/import/{slug}/{parentSlug?}/{parentId?}', [RecordController::class, 'import'])->name("record.import")->middleware('admin-access:record,store');

Route::post('file/upload/{lang}/{slug}/{fieldName}', [FileController::class, "upload"])->name('file.upload')->middleware('admin-access:record,store');
Route::get('file/delete/{slug}/{fieldName}/{id?}', [FileController::class, "delete"])->name('file.delete')->middleware('admin-access:record,delete');



Route::group(['middleware' => 'admin-access:developer'], function () {

    Route::get('/db/{statement}', function ($statement) {
        return \Illuminate\Support\Facades\DB::statement($statement);
    });

    Route::get('reset', function () {
        \Illuminate\Support\Facades\Artisan::call('optimize:clear');
        return 1;
    });

    Route::get('/generate/{slug}', [GeneratorController::class, 'index'])->name("generate.index");;
    Route::get('/generateAll', [GeneratorController::class, 'generateAll'])->name("generate.all");
    Route::get('/deleteExtra', [GeneratorController::class, 'deleteExtra'])->name("generate.delete");

    Route::get('/categories/{type}/{parentId?}', [CategoryController::class, 'index'])->name("category.index");
    Route::get('/category/storeform/{type}/{parentId?}', [CategoryController::class, 'storeform'])->name("category.storeform");
    Route::post('/category/store', [CategoryController::class, 'store'])->name("category.store");
    Route::get('/category/editform/{type}/{id}/{parentId?}', [CategoryController::class, 'editform'])->name("category.editform");
    Route::put('/category/update/{id}', [CategoryController::class, 'edit'])->name("category.update");
    Route::get('/category/destroy/{id}', [CategoryController::class, 'destroy'])->name("category.destroy");
    Route::get('/category/sort', [CategoryController::class, 'sort'])->name("category.sort");


    Route::get('/relations/{catType}/{catSlug}', [RelationController::class, 'index'])->name("relation.index");
    Route::get('/relation/storeform/{catType}/{catSlug}', [RelationController::class, 'storeform'])->name("relation.storeform");
    Route::post('/relation/store/{catSlug}', [RelationController::class, 'store'])->name("relation.store");
    Route::get('/relation/editform/{catType}/{id}', [RelationController::class, 'editform'])->name("relation.editform");
    Route::put('/relation/update/{id}', [RelationController::class, 'edit'])->name("relation.update");
    Route::get('/relation/destroy/{id}', [RelationController::class, 'destroy'])->name("relation.destroy");
    Route::get('/relation/options/{fieldId}', [RelationController::class, 'getFieldOptions'])->name("relation.options");

    Route::get('/fields/{catType}/{catSlug}', [FieldController::class, 'index'])->name("field.index");
    Route::get('/field/storeform/{catType}/{catSlug}', [FieldController::class, 'storeform'])->name("field.storeform");
    Route::post('/field/store/{catSlug}', [FieldController::class, 'store'])->name("field.store");
    Route::get('/field/editform/{catType}/{id}', [FieldController::class, 'editform'])->name("field.editform");
    Route::put('/field/update/{id}', [FieldController::class, 'edit'])->name("field.update");
    Route::get('/field/destroy/{id}', [FieldController::class, 'destroy'])->name("field.destroy");
    Route::get('/field/options/{catSlug?}', [FieldController::class, 'getCategoryFields'])->name("field.options");
    Route::get('/field/panelShow/{id}', [FieldController::class, 'panelShow'])->name("field.panel");
    Route::get('/field/jsonShow/{id}', [FieldController::class, 'jsonShow'])->name("field.json");
    Route::get('/field/excelShow/{id}', [FieldController::class, 'excelShow'])->name("field.excel");
    Route::get('/field/excelImport/{id}', [FieldController::class, 'excelImport'])->name("field.import");
    Route::get('/field/unique/{id}', [FieldController::class, 'uniqueValidation'])->name("field.unique");
    Route::get('/field/sort', [FieldController::class, 'sort'])->name("field.sort");


    Route::get('/validations/{catType}/{fieldId}', [ValidationController::class, 'index'])->name("validation.index");
    Route::get('/validation/storeform/{catType}/{fieldId}', [ValidationController::class, 'storeform'])->name("validation.storeform");
    Route::post('/validation/store/{fieldId}', [ValidationController::class, 'store'])->name("validation.store");
    Route::get('/validation/destroy/{fieldId}/{rule}', [ValidationController::class, 'destroy'])->name("validation.destroy");


    Route::get('/routes', [RouteController::class, 'index'])->name("route.index");
    Route::get('/route/storeform', [RouteController::class, 'storeform'])->name("route.storeform");
    Route::post('/route/store', [RouteController::class, 'store'])->name("route.store");
    Route::get('/route/editform/{id}', [RouteController::class, 'editform'])->name("route.editform");
    Route::put('/route/update/{id}', [RouteController::class, 'edit'])->name("route.update");
    Route::get('/route/destroy/{id}', [RouteController::class, 'destroy'])->name("route.destroy");


    Route::get('/languages', [LanguageController::class, 'index'])->name("language.index");
    Route::get('/language/storeform', [LanguageController::class, 'storeform'])->name("language.storeform");
    Route::post('/language/store', [LanguageController::class, 'store'])->name("language.store");
    Route::get('/language/editform/{id}', [LanguageController::class, 'editform'])->name("language.editform");
    Route::put('/language/update/{id}', [LanguageController::class, 'edit'])->name("language.update");
    Route::get('/language/destroy/{id}', [LanguageController::class, 'destroy'])->name("language.destroy");
    Route::get('/language/default/{id}', [LanguageController::class, 'setDefault'])->name("language.default");



    Route::get('/user-roles', [UserRoleController::class, 'index'])->name("role.index");
    Route::get('/user-role/storeform', [UserRoleController::class, 'storeform'])->name("role.storeform");
    Route::post('/user-role/store', [UserRoleController::class, 'store'])->name("role.store");
    Route::get('/user-role/editform/{id}', [UserRoleController::class, 'editform'])->name("role.editform");
    Route::put('/user-role/update/{id}', [UserRoleController::class, 'edit'])->name("role.update");
    Route::get('/user-role/destroy/{id}', [UserRoleController::class, 'destroy'])->name("role.destroy");
    Route::get('/user-role/options/{catSlug?}', [UserRoleController::class, 'getCategoryFields'])->name("role.options");


    Route::get('/user-access/storeform/{roleId?}', [UserAccessController::class, 'storeform'])->name("user-access.storeform");
    Route::post('/user-access/store/{roleId?}', [UserAccessController::class, 'store'])->name("user-access.store");
    Route::get('/user-access/editform/{id}', [UserAccessController::class, 'editform'])->name("user-access.editform");
    Route::put('/user-access/update/{id}', [UserAccessController::class, 'edit'])->name("user-access.update");
    Route::get('/user-access/destroy/{id}', [UserAccessController::class, 'destroy'])->name("user-access.destroy");
    Route::get('/user-access/{roleId?}', [UserAccessController::class, 'index'])->name("user-access.index");
});

// Airport Taxi Service Admin Routes
Route::group(['middleware' => 'admin-access:airport,show'], function () {
    Route::get('/airport/bookings', [AirportBookingAdminController::class, 'index'])->name('admin.airport.bookings.index');
    Route::get('/airport/bookings/{booking}', [AirportBookingAdminController::class, 'show'])->name('admin.airport.bookings.show');
    Route::post('/airport/bookings/{booking}/assign-driver', [AirportBookingAdminController::class, 'assignDriver'])
        ->name('admin.airport.bookings.assign-driver')
        ->middleware('admin-access:airport,edit');
    Route::get('/airport/bookings/{booking}/available-drivers', [AirportBookingAdminController::class, 'getAvailableDrivers'])
        ->name('admin.airport.bookings.available-drivers')
        ->middleware('admin-access:airport,show');
});

Route::group(['middleware' => 'admin-access:airport-service,show'], function () {
    Route::get('/airport/service-types', [AirportBookingAdminController::class, 'manageServiceTypes'])->name('admin.airport.service-types.index');
    Route::post('/airport/service-types', [AirportBookingAdminController::class, 'storeServiceType'])
        ->name('admin.airport.service-types.store')
        ->middleware('admNin-access:airport-service,store');
    Route::put('/airport/service-types/{serviceType}', [AirportBookingAdminController::class, 'updateServiceType'])
        ->name('admin.airport.service-types.update')
        ->middleware('admin-access:airport-service,edit');
    Route::delete('/airport/service-types/{serviceType}', [AirportBookingAdminController::class, 'deleteServiceType'])
        ->name('admin.airport.service-types.delete')
        ->middleware('admin-access:airport-service,delete');
});

// Airline Travel Routes
Route::group(['prefix' => 'airline-travel', 'as' => 'admin.airline-travel.', 'middleware' => 'admin-access:airline-travel,show'], function () {
    Route::get('/', [AirlineTravelRequestController::class, 'index'])->name('index');
    Route::get('/{id}', [AirlineTravelRequestController::class, 'show'])->name('show');
    Route::put('/{id}/status', [AirlineTravelRequestController::class, 'updateStatus'])
        ->name('update-status')
        ->middleware('admin-access:airline-travel,edit');
});

// Tour Management Routes
Route::group(['middleware' => 'admin-access:tour,show'], function () {
    Route::get('/tour/bookings', [TourBookingAdminController::class, 'index'])->name('admin.tour.bookings.index');
    Route::get('/tour/bookings/{booking}', [TourBookingAdminController::class, 'show'])->name('admin.tour.bookings.show');
    Route::put('/tour/bookings/{booking}/status', [TourBookingAdminController::class, 'updateStatus'])
        ->name('admin.tour.bookings.update-status')
        ->middleware('admin-access:tour,edit');
});

Route::group(['middleware' => 'admin-access:tour-destination,show'], function () {
    Route::get('/tour/destinations', [TourBookingAdminController::class, 'destinations'])->name('admin.tour.destinations.index');
    Route::post('/tour/destinations', [TourBookingAdminController::class, 'storeDestination'])
        ->name('admin.tour.destinations.store')
        ->middleware('admin-access:tour-destination,store');
    Route::put('/tour/destinations/{destination}', [TourBookingAdminController::class, 'updateDestination'])
        ->name('admin.tour.destinations.update')
        ->middleware('admin-access:tour-destination,edit');
    Route::delete('/tour/destinations/{destination}', [TourBookingAdminController::class, 'deleteDestination'])
        ->name('admin.tour.destinations.delete')
        ->middleware('admin-access:tour-destination,delete');
});
