<?php

use Illuminate\Support\Facades\Route;





Route::get('records/orders/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyOrdersController::class,'index'])->name("record.orders.index")->middleware('admin-access:record,show,orders');
Route::get('pagination/orders/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyOrdersController::class,'pagination'])->name("record.orders.pagination")->middleware('admin-access:record,show,orders');
Route::get('/storeform/orders/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyOrdersController::class,'storeform'])->name("record.orders.storeform")->middleware('admin-access:record,store,orders');
Route::post('/store/orders/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyOrdersController::class,'store'])->name("record.orders.store")->middleware('admin-access:record,store,orders');
Route::get('/editform/orders/{id}', [\App\Http\Controllers\MyOrdersController::class,'editform'])->name("record.orders.editform")->middleware('admin-access:record,edit,orders');
Route::put('/update/orders/{id}', [\App\Http\Controllers\MyOrdersController::class,'edit'])->name("record.orders.edit")->middleware('admin-access:record,edit,orders');
Route::get('/destroy/orders/{id}', [\App\Http\Controllers\MyOrdersController::class,'destroy'])->name("record.orders.destroy")->middleware('admin-access:record,delete,orders');
Route::get('/sort/orders', [\App\Http\Controllers\MyOrdersController::class,'sort'])->name("record.orders.sort")->middleware('admin-access:record,store,orders');
Route::get('/export/orders/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyOrdersController::class,'export'])->name("record.orders.export")->middleware('admin-access:record,show,orders');
Route::get('/pdf/orders/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyOrdersController::class,'pdf'])->name("record.orders.pdf")->middleware('admin-access:record,show,orders');
Route::get('/active/orders/user_rate/{id}', [\App\Http\Controllers\MyOrdersController::class,'user_rateActive'])->name("record.orders.user_rate")->middleware('admin-access:record,edit,orders');
Route::get('/active/orders/economic/{id}', [\App\Http\Controllers\MyOrdersController::class,'economicActive'])->name("record.orders.economic")->middleware('admin-access:record,edit,orders');








Route::get('records/wallet/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyWalletController::class,'index'])->name("record.wallet.index")->middleware('admin-access:record,show,wallet');
Route::get('pagination/wallet/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyWalletController::class,'pagination'])->name("record.wallet.pagination")->middleware('admin-access:record,show,wallet');
Route::get('/storeform/wallet/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyWalletController::class,'storeform'])->name("record.wallet.storeform")->middleware('admin-access:record,store,wallet');
Route::post('/store/wallet/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyWalletController::class,'store'])->name("record.wallet.store")->middleware('admin-access:record,store,wallet');
Route::get('/editform/wallet/{id}', [\App\Http\Controllers\MyWalletController::class,'editform'])->name("record.wallet.editform")->middleware('admin-access:record,edit,wallet');
Route::put('/update/wallet/{id}', [\App\Http\Controllers\MyWalletController::class,'edit'])->name("record.wallet.edit")->middleware('admin-access:record,edit,wallet');
Route::get('/destroy/wallet/{id}', [\App\Http\Controllers\MyWalletController::class,'destroy'])->name("record.wallet.destroy")->middleware('admin-access:record,delete,wallet');
Route::get('/sort/wallet', [\App\Http\Controllers\MyWalletController::class,'sort'])->name("record.wallet.sort")->middleware('admin-access:record,store,wallet');
Route::get('/export/wallet/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyWalletController::class,'export'])->name("record.wallet.export")->middleware('admin-access:record,show,wallet');
Route::get('/pdf/wallet/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyWalletController::class,'pdf'])->name("record.wallet.pdf")->middleware('admin-access:record,show,wallet');
Route::post('/import/wallet/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyWalletController::class,'import'])->name("record.wallet.import")->middleware('admin-access:record,store,wallet');





Route::get('records/drivers',[\App\Http\Controllers\MyDriversController::class,'index'])->name("record.drivers.index")->middleware('admin-access:record,show,drivers');
Route::get('pagination/drivers',[\App\Http\Controllers\MyDriversController::class,'pagination'])->name("record.drivers.pagination")->middleware('admin-access:record,show,drivers');
Route::get('/storeform/drivers', [\App\Http\Controllers\MyDriversController::class,'storeform'])->name("record.drivers.storeform")->middleware('admin-access:record,store,drivers');
Route::post('/store/drivers', [\App\Http\Controllers\MyDriversController::class,'store'])->name("record.drivers.store")->middleware('admin-access:record,store,drivers');
Route::get('/editform/drivers/{id}', [\App\Http\Controllers\MyDriversController::class,'editform'])->name("record.drivers.editform")->middleware('admin-access:record,edit,drivers');
Route::put('/update/drivers/{id}', [\App\Http\Controllers\MyDriversController::class,'edit'])->name("record.drivers.edit")->middleware('admin-access:record,edit,drivers');
Route::get('/destroy/drivers/{id}', [\App\Http\Controllers\MyDriversController::class,'destroy'])->name("record.drivers.destroy")->middleware('admin-access:record,delete,drivers');
Route::get('/sort/drivers', [\App\Http\Controllers\MyDriversController::class,'sort'])->name("record.drivers.sort")->middleware('admin-access:record,store,drivers');
Route::get('/export/drivers',[\App\Http\Controllers\MyDriversController::class,'export'])->name("record.drivers.export")->middleware('admin-access:record,show,drivers');
Route::get('/pdf/drivers',[\App\Http\Controllers\MyDriversController::class,'pdf'])->name("record.drivers.pdf")->middleware('admin-access:record,show,drivers');
Route::post('/import/drivers',[\App\Http\Controllers\MyDriversController::class,'import'])->name("record.drivers.import")->middleware('admin-access:record,store,drivers');
Route::get('/active/drivers/state/{id}', [\App\Http\Controllers\MyDriversController::class,'stateActive'])->name("record.drivers.state")->middleware('admin-access:record,edit,drivers');





Route::get('records/statuses',[\App\Http\Controllers\MyStatusesController::class,'index'])->name("record.statuses.index")->middleware('admin-access:record,show,statuses');
Route::get('pagination/statuses',[\App\Http\Controllers\MyStatusesController::class,'pagination'])->name("record.statuses.pagination")->middleware('admin-access:record,show,statuses');
Route::get('/storeform/statuses', [\App\Http\Controllers\MyStatusesController::class,'storeform'])->name("record.statuses.storeform")->middleware('admin-access:record,store,statuses');
Route::post('/store/statuses', [\App\Http\Controllers\MyStatusesController::class,'store'])->name("record.statuses.store")->middleware('admin-access:record,store,statuses');
Route::get('/editform/statuses/{id}', [\App\Http\Controllers\MyStatusesController::class,'editform'])->name("record.statuses.editform")->middleware('admin-access:record,edit,statuses');
Route::put('/update/statuses/{id}', [\App\Http\Controllers\MyStatusesController::class,'edit'])->name("record.statuses.edit")->middleware('admin-access:record,edit,statuses');
Route::get('/destroy/statuses/{id}', [\App\Http\Controllers\MyStatusesController::class,'destroy'])->name("record.statuses.destroy")->middleware('admin-access:record,delete,statuses');
Route::get('/sort/statuses', [\App\Http\Controllers\MyStatusesController::class,'sort'])->name("record.statuses.sort")->middleware('admin-access:record,store,statuses');
Route::get('/export/statuses',[\App\Http\Controllers\MyStatusesController::class,'export'])->name("record.statuses.export")->middleware('admin-access:record,show,statuses');
Route::get('/pdf/statuses',[\App\Http\Controllers\MyStatusesController::class,'pdf'])->name("record.statuses.pdf")->middleware('admin-access:record,show,statuses');
Route::post('/import/statuses',[\App\Http\Controllers\MyStatusesController::class,'import'])->name("record.statuses.import")->middleware('admin-access:record,store,statuses');





Route::get('records/moving_order_details',[\App\Http\Controllers\MyMoving_Order_DetailsController::class,'index'])->name("record.moving_order_details.index")->middleware('admin-access:record,show,moving_order_details');
Route::get('pagination/moving_order_details',[\App\Http\Controllers\MyMoving_Order_DetailsController::class,'pagination'])->name("record.moving_order_details.pagination")->middleware('admin-access:record,show,moving_order_details');
Route::get('/storeform/moving_order_details', [\App\Http\Controllers\MyMoving_Order_DetailsController::class,'storeform'])->name("record.moving_order_details.storeform")->middleware('admin-access:record,store,moving_order_details');
Route::post('/store/moving_order_details', [\App\Http\Controllers\MyMoving_Order_DetailsController::class,'store'])->name("record.moving_order_details.store")->middleware('admin-access:record,store,moving_order_details');
Route::get('/editform/moving_order_details/{id}', [\App\Http\Controllers\MyMoving_Order_DetailsController::class,'editform'])->name("record.moving_order_details.editform")->middleware('admin-access:record,edit,moving_order_details');
Route::put('/update/moving_order_details/{id}', [\App\Http\Controllers\MyMoving_Order_DetailsController::class,'edit'])->name("record.moving_order_details.edit")->middleware('admin-access:record,edit,moving_order_details');
Route::get('/destroy/moving_order_details/{id}', [\App\Http\Controllers\MyMoving_Order_DetailsController::class,'destroy'])->name("record.moving_order_details.destroy")->middleware('admin-access:record,delete,moving_order_details');
Route::get('/sort/moving_order_details', [\App\Http\Controllers\MyMoving_Order_DetailsController::class,'sort'])->name("record.moving_order_details.sort")->middleware('admin-access:record,store,moving_order_details');
Route::get('/export/moving_order_details',[\App\Http\Controllers\MyMoving_Order_DetailsController::class,'export'])->name("record.moving_order_details.export")->middleware('admin-access:record,show,moving_order_details');
Route::get('/pdf/moving_order_details',[\App\Http\Controllers\MyMoving_Order_DetailsController::class,'pdf'])->name("record.moving_order_details.pdf")->middleware('admin-access:record,show,moving_order_details');
Route::post('/import/moving_order_details',[\App\Http\Controllers\MyMoving_Order_DetailsController::class,'import'])->name("record.moving_order_details.import")->middleware('admin-access:record,store,moving_order_details');





Route::get('records/users',[\App\Http\Controllers\MyUsersController::class,'index'])->name("record.users.index")->middleware('admin-access:record,show,users');
Route::get('pagination/users',[\App\Http\Controllers\MyUsersController::class,'pagination'])->name("record.users.pagination")->middleware('admin-access:record,show,users');
Route::get('/storeform/users', [\App\Http\Controllers\MyUsersController::class,'storeform'])->name("record.users.storeform")->middleware('admin-access:record,store,users');
Route::post('/store/users', [\App\Http\Controllers\MyUsersController::class,'store'])->name("record.users.store")->middleware('admin-access:record,store,users');
Route::get('/editform/users/{id}', [\App\Http\Controllers\MyUsersController::class,'editform'])->name("record.users.editform")->middleware('admin-access:record,edit,users');
Route::put('/update/users/{id}', [\App\Http\Controllers\MyUsersController::class,'edit'])->name("record.users.edit")->middleware('admin-access:record,edit,users');
Route::get('/destroy/users/{id}', [\App\Http\Controllers\MyUsersController::class,'destroy'])->name("record.users.destroy")->middleware('admin-access:record,delete,users');
Route::get('/sort/users', [\App\Http\Controllers\MyUsersController::class,'sort'])->name("record.users.sort")->middleware('admin-access:record,store,users');
Route::get('/export/users',[\App\Http\Controllers\MyUsersController::class,'export'])->name("record.users.export")->middleware('admin-access:record,show,users');
Route::get('/pdf/users',[\App\Http\Controllers\MyUsersController::class,'pdf'])->name("record.users.pdf")->middleware('admin-access:record,show,users');
Route::post('/import/users',[\App\Http\Controllers\MyUsersController::class,'import'])->name("record.users.import")->middleware('admin-access:record,store,users');





Route::get('records/order_motor_details',[\App\Http\Controllers\MyOrder_Motor_DetailsController::class,'index'])->name("record.order_motor_details.index")->middleware('admin-access:record,show,order_motor_details');
Route::get('pagination/order_motor_details',[\App\Http\Controllers\MyOrder_Motor_DetailsController::class,'pagination'])->name("record.order_motor_details.pagination")->middleware('admin-access:record,show,order_motor_details');
Route::get('/storeform/order_motor_details', [\App\Http\Controllers\MyOrder_Motor_DetailsController::class,'storeform'])->name("record.order_motor_details.storeform")->middleware('admin-access:record,store,order_motor_details');
Route::post('/store/order_motor_details', [\App\Http\Controllers\MyOrder_Motor_DetailsController::class,'store'])->name("record.order_motor_details.store")->middleware('admin-access:record,store,order_motor_details');
Route::get('/editform/order_motor_details/{id}', [\App\Http\Controllers\MyOrder_Motor_DetailsController::class,'editform'])->name("record.order_motor_details.editform")->middleware('admin-access:record,edit,order_motor_details');
Route::put('/update/order_motor_details/{id}', [\App\Http\Controllers\MyOrder_Motor_DetailsController::class,'edit'])->name("record.order_motor_details.edit")->middleware('admin-access:record,edit,order_motor_details');
Route::get('/destroy/order_motor_details/{id}', [\App\Http\Controllers\MyOrder_Motor_DetailsController::class,'destroy'])->name("record.order_motor_details.destroy")->middleware('admin-access:record,delete,order_motor_details');
Route::get('/sort/order_motor_details', [\App\Http\Controllers\MyOrder_Motor_DetailsController::class,'sort'])->name("record.order_motor_details.sort")->middleware('admin-access:record,store,order_motor_details');
Route::get('/export/order_motor_details',[\App\Http\Controllers\MyOrder_Motor_DetailsController::class,'export'])->name("record.order_motor_details.export")->middleware('admin-access:record,show,order_motor_details');
Route::get('/pdf/order_motor_details',[\App\Http\Controllers\MyOrder_Motor_DetailsController::class,'pdf'])->name("record.order_motor_details.pdf")->middleware('admin-access:record,show,order_motor_details');
Route::post('/import/order_motor_details',[\App\Http\Controllers\MyOrder_Motor_DetailsController::class,'import'])->name("record.order_motor_details.import")->middleware('admin-access:record,store,order_motor_details');





Route::get('records/state_completed',[\App\Http\Controllers\MyState_CompletedController::class,'index'])->name("record.state_completed.index")->middleware('admin-access:record,show,state_completed');
Route::get('pagination/state_completed',[\App\Http\Controllers\MyState_CompletedController::class,'pagination'])->name("record.state_completed.pagination")->middleware('admin-access:record,show,state_completed');
Route::get('/storeform/state_completed', [\App\Http\Controllers\MyState_CompletedController::class,'storeform'])->name("record.state_completed.storeform")->middleware('admin-access:record,store,state_completed');
Route::post('/store/state_completed', [\App\Http\Controllers\MyState_CompletedController::class,'store'])->name("record.state_completed.store")->middleware('admin-access:record,store,state_completed');
Route::get('/editform/state_completed/{id}', [\App\Http\Controllers\MyState_CompletedController::class,'editform'])->name("record.state_completed.editform")->middleware('admin-access:record,edit,state_completed');
Route::put('/update/state_completed/{id}', [\App\Http\Controllers\MyState_CompletedController::class,'edit'])->name("record.state_completed.edit")->middleware('admin-access:record,edit,state_completed');
Route::get('/destroy/state_completed/{id}', [\App\Http\Controllers\MyState_CompletedController::class,'destroy'])->name("record.state_completed.destroy")->middleware('admin-access:record,delete,state_completed');
Route::get('/sort/state_completed', [\App\Http\Controllers\MyState_CompletedController::class,'sort'])->name("record.state_completed.sort")->middleware('admin-access:record,store,state_completed');
Route::get('/export/state_completed',[\App\Http\Controllers\MyState_CompletedController::class,'export'])->name("record.state_completed.export")->middleware('admin-access:record,show,state_completed');
Route::get('/pdf/state_completed',[\App\Http\Controllers\MyState_CompletedController::class,'pdf'])->name("record.state_completed.pdf")->middleware('admin-access:record,show,state_completed');
Route::post('/import/state_completed',[\App\Http\Controllers\MyState_CompletedController::class,'import'])->name("record.state_completed.import")->middleware('admin-access:record,store,state_completed');





Route::get('records/agency_admin',[\App\Http\Controllers\MyAgency_AdminController::class,'index'])->name("record.agency_admin.index")->middleware('admin-access:record,show,agency_admin');
Route::get('pagination/agency_admin',[\App\Http\Controllers\MyAgency_AdminController::class,'pagination'])->name("record.agency_admin.pagination")->middleware('admin-access:record,show,agency_admin');
Route::get('/storeform/agency_admin', [\App\Http\Controllers\MyAgency_AdminController::class,'storeform'])->name("record.agency_admin.storeform")->middleware('admin-access:record,store,agency_admin');
Route::post('/store/agency_admin', [\App\Http\Controllers\MyAgency_AdminController::class,'store'])->name("record.agency_admin.store")->middleware('admin-access:record,store,agency_admin');
Route::get('/editform/agency_admin/{id}', [\App\Http\Controllers\MyAgency_AdminController::class,'editform'])->name("record.agency_admin.editform")->middleware('admin-access:record,edit,agency_admin');
Route::put('/update/agency_admin/{id}', [\App\Http\Controllers\MyAgency_AdminController::class,'edit'])->name("record.agency_admin.edit")->middleware('admin-access:record,edit,agency_admin');
Route::get('/destroy/agency_admin/{id}', [\App\Http\Controllers\MyAgency_AdminController::class,'destroy'])->name("record.agency_admin.destroy")->middleware('admin-access:record,delete,agency_admin');
Route::get('/sort/agency_admin', [\App\Http\Controllers\MyAgency_AdminController::class,'sort'])->name("record.agency_admin.sort")->middleware('admin-access:record,store,agency_admin');
Route::get('/export/agency_admin',[\App\Http\Controllers\MyAgency_AdminController::class,'export'])->name("record.agency_admin.export")->middleware('admin-access:record,show,agency_admin');
Route::get('/pdf/agency_admin',[\App\Http\Controllers\MyAgency_AdminController::class,'pdf'])->name("record.agency_admin.pdf")->middleware('admin-access:record,show,agency_admin');
Route::post('/import/agency_admin',[\App\Http\Controllers\MyAgency_AdminController::class,'import'])->name("record.agency_admin.import")->middleware('admin-access:record,store,agency_admin');





Route::get('records/financial_report',[\App\Http\Controllers\MyFinancial_ReportController::class,'index'])->name("record.financial_report.index")->middleware('admin-access:record,show,financial_report');
Route::get('pagination/financial_report',[\App\Http\Controllers\MyFinancial_ReportController::class,'pagination'])->name("record.financial_report.pagination")->middleware('admin-access:record,show,financial_report');
Route::get('/storeform/financial_report', [\App\Http\Controllers\MyFinancial_ReportController::class,'storeform'])->name("record.financial_report.storeform")->middleware('admin-access:record,store,financial_report');
Route::post('/store/financial_report', [\App\Http\Controllers\MyFinancial_ReportController::class,'store'])->name("record.financial_report.store")->middleware('admin-access:record,store,financial_report');
Route::get('/editform/financial_report/{id}', [\App\Http\Controllers\MyFinancial_ReportController::class,'editform'])->name("record.financial_report.editform")->middleware('admin-access:record,edit,financial_report');
Route::put('/update/financial_report/{id}', [\App\Http\Controllers\MyFinancial_ReportController::class,'edit'])->name("record.financial_report.edit")->middleware('admin-access:record,edit,financial_report');
Route::get('/destroy/financial_report/{id}', [\App\Http\Controllers\MyFinancial_ReportController::class,'destroy'])->name("record.financial_report.destroy")->middleware('admin-access:record,delete,financial_report');
Route::get('/sort/financial_report', [\App\Http\Controllers\MyFinancial_ReportController::class,'sort'])->name("record.financial_report.sort")->middleware('admin-access:record,store,financial_report');
Route::get('/export/financial_report',[\App\Http\Controllers\MyFinancial_ReportController::class,'export'])->name("record.financial_report.export")->middleware('admin-access:record,show,financial_report');
Route::get('/pdf/financial_report',[\App\Http\Controllers\MyFinancial_ReportController::class,'pdf'])->name("record.financial_report.pdf")->middleware('admin-access:record,show,financial_report');
Route::post('/import/financial_report',[\App\Http\Controllers\MyFinancial_ReportController::class,'import'])->name("record.financial_report.import")->middleware('admin-access:record,store,financial_report');





Route::get('records/wallet_admin',[\App\Http\Controllers\MyWallet_AdminController::class,'index'])->name("record.wallet_admin.index")->middleware('admin-access:record,show,wallet_admin');
Route::get('pagination/wallet_admin',[\App\Http\Controllers\MyWallet_AdminController::class,'pagination'])->name("record.wallet_admin.pagination")->middleware('admin-access:record,show,wallet_admin');
Route::get('/storeform/wallet_admin', [\App\Http\Controllers\MyWallet_AdminController::class,'storeform'])->name("record.wallet_admin.storeform")->middleware('admin-access:record,store,wallet_admin');
Route::post('/store/wallet_admin', [\App\Http\Controllers\MyWallet_AdminController::class,'store'])->name("record.wallet_admin.store")->middleware('admin-access:record,store,wallet_admin');
Route::get('/editform/wallet_admin/{id}', [\App\Http\Controllers\MyWallet_AdminController::class,'editform'])->name("record.wallet_admin.editform")->middleware('admin-access:record,edit,wallet_admin');
Route::put('/update/wallet_admin/{id}', [\App\Http\Controllers\MyWallet_AdminController::class,'edit'])->name("record.wallet_admin.edit")->middleware('admin-access:record,edit,wallet_admin');
Route::get('/destroy/wallet_admin/{id}', [\App\Http\Controllers\MyWallet_AdminController::class,'destroy'])->name("record.wallet_admin.destroy")->middleware('admin-access:record,delete,wallet_admin');
Route::get('/sort/wallet_admin', [\App\Http\Controllers\MyWallet_AdminController::class,'sort'])->name("record.wallet_admin.sort")->middleware('admin-access:record,store,wallet_admin');
Route::get('/export/wallet_admin',[\App\Http\Controllers\MyWallet_AdminController::class,'export'])->name("record.wallet_admin.export")->middleware('admin-access:record,show,wallet_admin');
Route::get('/pdf/wallet_admin',[\App\Http\Controllers\MyWallet_AdminController::class,'pdf'])->name("record.wallet_admin.pdf")->middleware('admin-access:record,show,wallet_admin');
Route::post('/import/wallet_admin',[\App\Http\Controllers\MyWallet_AdminController::class,'import'])->name("record.wallet_admin.import")->middleware('admin-access:record,store,wallet_admin');





Route::get('records/wallet_agency',[\App\Http\Controllers\MyWallet_AgencyController::class,'index'])->name("record.wallet_agency.index")->middleware('admin-access:record,show,wallet_agency');
Route::get('pagination/wallet_agency',[\App\Http\Controllers\MyWallet_AgencyController::class,'pagination'])->name("record.wallet_agency.pagination")->middleware('admin-access:record,show,wallet_agency');
Route::get('/storeform/wallet_agency', [\App\Http\Controllers\MyWallet_AgencyController::class,'storeform'])->name("record.wallet_agency.storeform")->middleware('admin-access:record,store,wallet_agency');
Route::post('/store/wallet_agency', [\App\Http\Controllers\MyWallet_AgencyController::class,'store'])->name("record.wallet_agency.store")->middleware('admin-access:record,store,wallet_agency');
Route::get('/editform/wallet_agency/{id}', [\App\Http\Controllers\MyWallet_AgencyController::class,'editform'])->name("record.wallet_agency.editform")->middleware('admin-access:record,edit,wallet_agency');
Route::put('/update/wallet_agency/{id}', [\App\Http\Controllers\MyWallet_AgencyController::class,'edit'])->name("record.wallet_agency.edit")->middleware('admin-access:record,edit,wallet_agency');
Route::get('/destroy/wallet_agency/{id}', [\App\Http\Controllers\MyWallet_AgencyController::class,'destroy'])->name("record.wallet_agency.destroy")->middleware('admin-access:record,delete,wallet_agency');
Route::get('/sort/wallet_agency', [\App\Http\Controllers\MyWallet_AgencyController::class,'sort'])->name("record.wallet_agency.sort")->middleware('admin-access:record,store,wallet_agency');
Route::get('/export/wallet_agency',[\App\Http\Controllers\MyWallet_AgencyController::class,'export'])->name("record.wallet_agency.export")->middleware('admin-access:record,show,wallet_agency');
Route::get('/pdf/wallet_agency',[\App\Http\Controllers\MyWallet_AgencyController::class,'pdf'])->name("record.wallet_agency.pdf")->middleware('admin-access:record,show,wallet_agency');
Route::post('/import/wallet_agency',[\App\Http\Controllers\MyWallet_AgencyController::class,'import'])->name("record.wallet_agency.import")->middleware('admin-access:record,store,wallet_agency');





Route::get('records/car_details/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCar_DetailsController::class,'index'])->name("record.car_details.index")->middleware('admin-access:record,show,car_details');
Route::get('pagination/car_details/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCar_DetailsController::class,'pagination'])->name("record.car_details.pagination")->middleware('admin-access:record,show,car_details');
Route::get('/storeform/car_details/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyCar_DetailsController::class,'storeform'])->name("record.car_details.storeform")->middleware('admin-access:record,store,car_details');
Route::post('/store/car_details/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyCar_DetailsController::class,'store'])->name("record.car_details.store")->middleware('admin-access:record,store,car_details');
Route::get('/editform/car_details/{id}', [\App\Http\Controllers\MyCar_DetailsController::class,'editform'])->name("record.car_details.editform")->middleware('admin-access:record,edit,car_details');
Route::put('/update/car_details/{id}', [\App\Http\Controllers\MyCar_DetailsController::class,'edit'])->name("record.car_details.edit")->middleware('admin-access:record,edit,car_details');
Route::get('/destroy/car_details/{id}', [\App\Http\Controllers\MyCar_DetailsController::class,'destroy'])->name("record.car_details.destroy")->middleware('admin-access:record,delete,car_details');
Route::get('/sort/car_details', [\App\Http\Controllers\MyCar_DetailsController::class,'sort'])->name("record.car_details.sort")->middleware('admin-access:record,store,car_details');
Route::get('/export/car_details/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCar_DetailsController::class,'export'])->name("record.car_details.export")->middleware('admin-access:record,show,car_details');
Route::get('/pdf/car_details/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCar_DetailsController::class,'pdf'])->name("record.car_details.pdf")->middleware('admin-access:record,show,car_details');
Route::post('/import/car_details/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCar_DetailsController::class,'import'])->name("record.car_details.import")->middleware('admin-access:record,store,car_details');





Route::get('records/gender',[\App\Http\Controllers\MyGenderController::class,'index'])->name("record.gender.index")->middleware('admin-access:record,show,gender');
Route::get('pagination/gender',[\App\Http\Controllers\MyGenderController::class,'pagination'])->name("record.gender.pagination")->middleware('admin-access:record,show,gender');
Route::get('/storeform/gender', [\App\Http\Controllers\MyGenderController::class,'storeform'])->name("record.gender.storeform")->middleware('admin-access:record,store,gender');
Route::post('/store/gender', [\App\Http\Controllers\MyGenderController::class,'store'])->name("record.gender.store")->middleware('admin-access:record,store,gender');
Route::get('/editform/gender/{id}', [\App\Http\Controllers\MyGenderController::class,'editform'])->name("record.gender.editform")->middleware('admin-access:record,edit,gender');
Route::put('/update/gender/{id}', [\App\Http\Controllers\MyGenderController::class,'edit'])->name("record.gender.edit")->middleware('admin-access:record,edit,gender');
Route::get('/destroy/gender/{id}', [\App\Http\Controllers\MyGenderController::class,'destroy'])->name("record.gender.destroy")->middleware('admin-access:record,delete,gender');
Route::get('/sort/gender', [\App\Http\Controllers\MyGenderController::class,'sort'])->name("record.gender.sort")->middleware('admin-access:record,store,gender');
Route::get('/export/gender',[\App\Http\Controllers\MyGenderController::class,'export'])->name("record.gender.export")->middleware('admin-access:record,show,gender');
Route::get('/pdf/gender',[\App\Http\Controllers\MyGenderController::class,'pdf'])->name("record.gender.pdf")->middleware('admin-access:record,show,gender');
Route::post('/import/gender',[\App\Http\Controllers\MyGenderController::class,'import'])->name("record.gender.import")->middleware('admin-access:record,store,gender');





Route::get('records/admin_message',[\App\Http\Controllers\MyAdmin_MessageController::class,'index'])->name("record.admin_message.index")->middleware('admin-access:record,show,admin_message');
Route::get('pagination/admin_message',[\App\Http\Controllers\MyAdmin_MessageController::class,'pagination'])->name("record.admin_message.pagination")->middleware('admin-access:record,show,admin_message');
Route::get('/storeform/admin_message', [\App\Http\Controllers\MyAdmin_MessageController::class,'storeform'])->name("record.admin_message.storeform")->middleware('admin-access:record,store,admin_message');
Route::post('/store/admin_message', [\App\Http\Controllers\MyAdmin_MessageController::class,'store'])->name("record.admin_message.store")->middleware('admin-access:record,store,admin_message');
Route::get('/editform/admin_message/{id}', [\App\Http\Controllers\MyAdmin_MessageController::class,'editform'])->name("record.admin_message.editform")->middleware('admin-access:record,edit,admin_message');
Route::put('/update/admin_message/{id}', [\App\Http\Controllers\MyAdmin_MessageController::class,'edit'])->name("record.admin_message.edit")->middleware('admin-access:record,edit,admin_message');
Route::get('/destroy/admin_message/{id}', [\App\Http\Controllers\MyAdmin_MessageController::class,'destroy'])->name("record.admin_message.destroy")->middleware('admin-access:record,delete,admin_message');
Route::get('/sort/admin_message', [\App\Http\Controllers\MyAdmin_MessageController::class,'sort'])->name("record.admin_message.sort")->middleware('admin-access:record,store,admin_message');
Route::get('/export/admin_message',[\App\Http\Controllers\MyAdmin_MessageController::class,'export'])->name("record.admin_message.export")->middleware('admin-access:record,show,admin_message');
Route::get('/pdf/admin_message',[\App\Http\Controllers\MyAdmin_MessageController::class,'pdf'])->name("record.admin_message.pdf")->middleware('admin-access:record,show,admin_message');
Route::post('/import/admin_message',[\App\Http\Controllers\MyAdmin_MessageController::class,'import'])->name("record.admin_message.import")->middleware('admin-access:record,store,admin_message');





Route::get('records/deliveries',[\App\Http\Controllers\MyDeliveriesController::class,'index'])->name("record.deliveries.index")->middleware('admin-access:record,show,deliveries');
Route::get('pagination/deliveries',[\App\Http\Controllers\MyDeliveriesController::class,'pagination'])->name("record.deliveries.pagination")->middleware('admin-access:record,show,deliveries');
Route::get('/storeform/deliveries', [\App\Http\Controllers\MyDeliveriesController::class,'storeform'])->name("record.deliveries.storeform")->middleware('admin-access:record,store,deliveries');
Route::post('/store/deliveries', [\App\Http\Controllers\MyDeliveriesController::class,'store'])->name("record.deliveries.store")->middleware('admin-access:record,store,deliveries');
Route::get('/editform/deliveries/{id}', [\App\Http\Controllers\MyDeliveriesController::class,'editform'])->name("record.deliveries.editform")->middleware('admin-access:record,edit,deliveries');
Route::put('/update/deliveries/{id}', [\App\Http\Controllers\MyDeliveriesController::class,'edit'])->name("record.deliveries.edit")->middleware('admin-access:record,edit,deliveries');
Route::get('/destroy/deliveries/{id}', [\App\Http\Controllers\MyDeliveriesController::class,'destroy'])->name("record.deliveries.destroy")->middleware('admin-access:record,delete,deliveries');
Route::get('/sort/deliveries', [\App\Http\Controllers\MyDeliveriesController::class,'sort'])->name("record.deliveries.sort")->middleware('admin-access:record,store,deliveries');
Route::get('/export/deliveries',[\App\Http\Controllers\MyDeliveriesController::class,'export'])->name("record.deliveries.export")->middleware('admin-access:record,show,deliveries');
Route::get('/pdf/deliveries',[\App\Http\Controllers\MyDeliveriesController::class,'pdf'])->name("record.deliveries.pdf")->middleware('admin-access:record,show,deliveries');
Route::post('/import/deliveries',[\App\Http\Controllers\MyDeliveriesController::class,'import'])->name("record.deliveries.import")->middleware('admin-access:record,store,deliveries');
Route::get('/active/deliveries/show/{id}', [\App\Http\Controllers\MyDeliveriesController::class,'showActive'])->name("record.deliveries.show")->middleware('admin-access:record,edit,deliveries');
Route::get('/active/deliveries/have_economic/{id}', [\App\Http\Controllers\MyDeliveriesController::class,'have_economicActive'])->name("record.deliveries.have_economic")->middleware('admin-access:record,edit,deliveries');





Route::get('records/favorite_place',[\App\Http\Controllers\MyFavorite_PlaceController::class,'index'])->name("record.favorite_place.index")->middleware('admin-access:record,show,favorite_place');
Route::get('pagination/favorite_place',[\App\Http\Controllers\MyFavorite_PlaceController::class,'pagination'])->name("record.favorite_place.pagination")->middleware('admin-access:record,show,favorite_place');
Route::get('/storeform/favorite_place', [\App\Http\Controllers\MyFavorite_PlaceController::class,'storeform'])->name("record.favorite_place.storeform")->middleware('admin-access:record,store,favorite_place');
Route::post('/store/favorite_place', [\App\Http\Controllers\MyFavorite_PlaceController::class,'store'])->name("record.favorite_place.store")->middleware('admin-access:record,store,favorite_place');
Route::get('/editform/favorite_place/{id}', [\App\Http\Controllers\MyFavorite_PlaceController::class,'editform'])->name("record.favorite_place.editform")->middleware('admin-access:record,edit,favorite_place');
Route::put('/update/favorite_place/{id}', [\App\Http\Controllers\MyFavorite_PlaceController::class,'edit'])->name("record.favorite_place.edit")->middleware('admin-access:record,edit,favorite_place');
Route::get('/destroy/favorite_place/{id}', [\App\Http\Controllers\MyFavorite_PlaceController::class,'destroy'])->name("record.favorite_place.destroy")->middleware('admin-access:record,delete,favorite_place');
Route::get('/sort/favorite_place', [\App\Http\Controllers\MyFavorite_PlaceController::class,'sort'])->name("record.favorite_place.sort")->middleware('admin-access:record,store,favorite_place');
Route::get('/export/favorite_place',[\App\Http\Controllers\MyFavorite_PlaceController::class,'export'])->name("record.favorite_place.export")->middleware('admin-access:record,show,favorite_place');
Route::get('/pdf/favorite_place',[\App\Http\Controllers\MyFavorite_PlaceController::class,'pdf'])->name("record.favorite_place.pdf")->middleware('admin-access:record,show,favorite_place');
Route::post('/import/favorite_place',[\App\Http\Controllers\MyFavorite_PlaceController::class,'import'])->name("record.favorite_place.import")->middleware('admin-access:record,store,favorite_place');





Route::get('records/type_parcel',[\App\Http\Controllers\MyType_ParcelController::class,'index'])->name("record.type_parcel.index")->middleware('admin-access:record,show,type_parcel');
Route::get('pagination/type_parcel',[\App\Http\Controllers\MyType_ParcelController::class,'pagination'])->name("record.type_parcel.pagination")->middleware('admin-access:record,show,type_parcel');
Route::get('/storeform/type_parcel', [\App\Http\Controllers\MyType_ParcelController::class,'storeform'])->name("record.type_parcel.storeform")->middleware('admin-access:record,store,type_parcel');
Route::post('/store/type_parcel', [\App\Http\Controllers\MyType_ParcelController::class,'store'])->name("record.type_parcel.store")->middleware('admin-access:record,store,type_parcel');
Route::get('/editform/type_parcel/{id}', [\App\Http\Controllers\MyType_ParcelController::class,'editform'])->name("record.type_parcel.editform")->middleware('admin-access:record,edit,type_parcel');
Route::put('/update/type_parcel/{id}', [\App\Http\Controllers\MyType_ParcelController::class,'edit'])->name("record.type_parcel.edit")->middleware('admin-access:record,edit,type_parcel');
Route::get('/destroy/type_parcel/{id}', [\App\Http\Controllers\MyType_ParcelController::class,'destroy'])->name("record.type_parcel.destroy")->middleware('admin-access:record,delete,type_parcel');
Route::get('/sort/type_parcel', [\App\Http\Controllers\MyType_ParcelController::class,'sort'])->name("record.type_parcel.sort")->middleware('admin-access:record,store,type_parcel');
Route::get('/export/type_parcel',[\App\Http\Controllers\MyType_ParcelController::class,'export'])->name("record.type_parcel.export")->middleware('admin-access:record,show,type_parcel');
Route::get('/pdf/type_parcel',[\App\Http\Controllers\MyType_ParcelController::class,'pdf'])->name("record.type_parcel.pdf")->middleware('admin-access:record,show,type_parcel');
Route::post('/import/type_parcel',[\App\Http\Controllers\MyType_ParcelController::class,'import'])->name("record.type_parcel.import")->middleware('admin-access:record,store,type_parcel');





Route::get('records/stop_on_way/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyStop_On_WayController::class,'index'])->name("record.stop_on_way.index")->middleware('admin-access:record,show,stop_on_way');
Route::get('pagination/stop_on_way/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyStop_On_WayController::class,'pagination'])->name("record.stop_on_way.pagination")->middleware('admin-access:record,show,stop_on_way');
Route::get('/storeform/stop_on_way/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyStop_On_WayController::class,'storeform'])->name("record.stop_on_way.storeform")->middleware('admin-access:record,store,stop_on_way');
Route::post('/store/stop_on_way/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyStop_On_WayController::class,'store'])->name("record.stop_on_way.store")->middleware('admin-access:record,store,stop_on_way');
Route::get('/editform/stop_on_way/{id}', [\App\Http\Controllers\MyStop_On_WayController::class,'editform'])->name("record.stop_on_way.editform")->middleware('admin-access:record,edit,stop_on_way');
Route::put('/update/stop_on_way/{id}', [\App\Http\Controllers\MyStop_On_WayController::class,'edit'])->name("record.stop_on_way.edit")->middleware('admin-access:record,edit,stop_on_way');
Route::get('/destroy/stop_on_way/{id}', [\App\Http\Controllers\MyStop_On_WayController::class,'destroy'])->name("record.stop_on_way.destroy")->middleware('admin-access:record,delete,stop_on_way');
Route::get('/sort/stop_on_way', [\App\Http\Controllers\MyStop_On_WayController::class,'sort'])->name("record.stop_on_way.sort")->middleware('admin-access:record,store,stop_on_way');
Route::get('/export/stop_on_way/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyStop_On_WayController::class,'export'])->name("record.stop_on_way.export")->middleware('admin-access:record,show,stop_on_way');
Route::get('/pdf/stop_on_way/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyStop_On_WayController::class,'pdf'])->name("record.stop_on_way.pdf")->middleware('admin-access:record,show,stop_on_way');
Route::post('/import/stop_on_way/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyStop_On_WayController::class,'import'])->name("record.stop_on_way.import")->middleware('admin-access:record,store,stop_on_way');





Route::get('records/slider',[\App\Http\Controllers\MySliderController::class,'index'])->name("record.slider.index")->middleware('admin-access:record,show,slider');
Route::get('pagination/slider',[\App\Http\Controllers\MySliderController::class,'pagination'])->name("record.slider.pagination")->middleware('admin-access:record,show,slider');
Route::get('/storeform/slider', [\App\Http\Controllers\MySliderController::class,'storeform'])->name("record.slider.storeform")->middleware('admin-access:record,store,slider');
Route::post('/store/slider', [\App\Http\Controllers\MySliderController::class,'store'])->name("record.slider.store")->middleware('admin-access:record,store,slider');
Route::get('/editform/slider/{id}', [\App\Http\Controllers\MySliderController::class,'editform'])->name("record.slider.editform")->middleware('admin-access:record,edit,slider');
Route::put('/update/slider/{id}', [\App\Http\Controllers\MySliderController::class,'edit'])->name("record.slider.edit")->middleware('admin-access:record,edit,slider');
Route::get('/destroy/slider/{id}', [\App\Http\Controllers\MySliderController::class,'destroy'])->name("record.slider.destroy")->middleware('admin-access:record,delete,slider');
Route::get('/sort/slider', [\App\Http\Controllers\MySliderController::class,'sort'])->name("record.slider.sort")->middleware('admin-access:record,store,slider');
Route::get('/export/slider',[\App\Http\Controllers\MySliderController::class,'export'])->name("record.slider.export")->middleware('admin-access:record,show,slider');
Route::get('/pdf/slider',[\App\Http\Controllers\MySliderController::class,'pdf'])->name("record.slider.pdf")->middleware('admin-access:record,show,slider');
Route::post('/import/slider',[\App\Http\Controllers\MySliderController::class,'import'])->name("record.slider.import")->middleware('admin-access:record,store,slider');





Route::get('records/pay_typs',[\App\Http\Controllers\MyPay_TypsController::class,'index'])->name("record.pay_typs.index")->middleware('admin-access:record,show,pay_typs');
Route::get('pagination/pay_typs',[\App\Http\Controllers\MyPay_TypsController::class,'pagination'])->name("record.pay_typs.pagination")->middleware('admin-access:record,show,pay_typs');
Route::get('/storeform/pay_typs', [\App\Http\Controllers\MyPay_TypsController::class,'storeform'])->name("record.pay_typs.storeform")->middleware('admin-access:record,store,pay_typs');
Route::post('/store/pay_typs', [\App\Http\Controllers\MyPay_TypsController::class,'store'])->name("record.pay_typs.store")->middleware('admin-access:record,store,pay_typs');
Route::get('/editform/pay_typs/{id}', [\App\Http\Controllers\MyPay_TypsController::class,'editform'])->name("record.pay_typs.editform")->middleware('admin-access:record,edit,pay_typs');
Route::put('/update/pay_typs/{id}', [\App\Http\Controllers\MyPay_TypsController::class,'edit'])->name("record.pay_typs.edit")->middleware('admin-access:record,edit,pay_typs');
Route::get('/destroy/pay_typs/{id}', [\App\Http\Controllers\MyPay_TypsController::class,'destroy'])->name("record.pay_typs.destroy")->middleware('admin-access:record,delete,pay_typs');
Route::get('/sort/pay_typs', [\App\Http\Controllers\MyPay_TypsController::class,'sort'])->name("record.pay_typs.sort")->middleware('admin-access:record,store,pay_typs');
Route::get('/export/pay_typs',[\App\Http\Controllers\MyPay_TypsController::class,'export'])->name("record.pay_typs.export")->middleware('admin-access:record,show,pay_typs');
Route::get('/pdf/pay_typs',[\App\Http\Controllers\MyPay_TypsController::class,'pdf'])->name("record.pay_typs.pdf")->middleware('admin-access:record,show,pay_typs');
Route::post('/import/pay_typs',[\App\Http\Controllers\MyPay_TypsController::class,'import'])->name("record.pay_typs.import")->middleware('admin-access:record,store,pay_typs');





Route::get('records/wait_service',[\App\Http\Controllers\MyWait_ServiceController::class,'index'])->name("record.wait_service.index")->middleware('admin-access:record,show,wait_service');
Route::get('pagination/wait_service',[\App\Http\Controllers\MyWait_ServiceController::class,'pagination'])->name("record.wait_service.pagination")->middleware('admin-access:record,show,wait_service');
Route::get('/storeform/wait_service', [\App\Http\Controllers\MyWait_ServiceController::class,'storeform'])->name("record.wait_service.storeform")->middleware('admin-access:record,store,wait_service');
Route::post('/store/wait_service', [\App\Http\Controllers\MyWait_ServiceController::class,'store'])->name("record.wait_service.store")->middleware('admin-access:record,store,wait_service');
Route::get('/editform/wait_service/{id}', [\App\Http\Controllers\MyWait_ServiceController::class,'editform'])->name("record.wait_service.editform")->middleware('admin-access:record,edit,wait_service');
Route::put('/update/wait_service/{id}', [\App\Http\Controllers\MyWait_ServiceController::class,'edit'])->name("record.wait_service.edit")->middleware('admin-access:record,edit,wait_service');
Route::get('/destroy/wait_service/{id}', [\App\Http\Controllers\MyWait_ServiceController::class,'destroy'])->name("record.wait_service.destroy")->middleware('admin-access:record,delete,wait_service');
Route::get('/sort/wait_service', [\App\Http\Controllers\MyWait_ServiceController::class,'sort'])->name("record.wait_service.sort")->middleware('admin-access:record,store,wait_service');
Route::get('/export/wait_service',[\App\Http\Controllers\MyWait_ServiceController::class,'export'])->name("record.wait_service.export")->middleware('admin-access:record,show,wait_service');
Route::get('/pdf/wait_service',[\App\Http\Controllers\MyWait_ServiceController::class,'pdf'])->name("record.wait_service.pdf")->middleware('admin-access:record,show,wait_service');
Route::post('/import/wait_service',[\App\Http\Controllers\MyWait_ServiceController::class,'import'])->name("record.wait_service.import")->middleware('admin-access:record,store,wait_service');





Route::get('records/cancel_trip/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCancel_TripController::class,'index'])->name("record.cancel_trip.index")->middleware('admin-access:record,show,cancel_trip');
Route::get('pagination/cancel_trip/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCancel_TripController::class,'pagination'])->name("record.cancel_trip.pagination")->middleware('admin-access:record,show,cancel_trip');
Route::get('/storeform/cancel_trip/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyCancel_TripController::class,'storeform'])->name("record.cancel_trip.storeform")->middleware('admin-access:record,store,cancel_trip');
Route::post('/store/cancel_trip/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyCancel_TripController::class,'store'])->name("record.cancel_trip.store")->middleware('admin-access:record,store,cancel_trip');
Route::get('/editform/cancel_trip/{id}', [\App\Http\Controllers\MyCancel_TripController::class,'editform'])->name("record.cancel_trip.editform")->middleware('admin-access:record,edit,cancel_trip');
Route::put('/update/cancel_trip/{id}', [\App\Http\Controllers\MyCancel_TripController::class,'edit'])->name("record.cancel_trip.edit")->middleware('admin-access:record,edit,cancel_trip');
Route::get('/destroy/cancel_trip/{id}', [\App\Http\Controllers\MyCancel_TripController::class,'destroy'])->name("record.cancel_trip.destroy")->middleware('admin-access:record,delete,cancel_trip');
Route::get('/sort/cancel_trip', [\App\Http\Controllers\MyCancel_TripController::class,'sort'])->name("record.cancel_trip.sort")->middleware('admin-access:record,store,cancel_trip');
Route::get('/export/cancel_trip/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCancel_TripController::class,'export'])->name("record.cancel_trip.export")->middleware('admin-access:record,show,cancel_trip');
Route::get('/pdf/cancel_trip/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCancel_TripController::class,'pdf'])->name("record.cancel_trip.pdf")->middleware('admin-access:record,show,cancel_trip');
Route::post('/import/cancel_trip/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCancel_TripController::class,'import'])->name("record.cancel_trip.import")->middleware('admin-access:record,store,cancel_trip');





Route::get('records/cancel_request/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCancel_RequestController::class,'index'])->name("record.cancel_request.index")->middleware('admin-access:record,show,cancel_request');
Route::get('pagination/cancel_request/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCancel_RequestController::class,'pagination'])->name("record.cancel_request.pagination")->middleware('admin-access:record,show,cancel_request');
Route::get('/storeform/cancel_request/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyCancel_RequestController::class,'storeform'])->name("record.cancel_request.storeform")->middleware('admin-access:record,store,cancel_request');
Route::post('/store/cancel_request/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyCancel_RequestController::class,'store'])->name("record.cancel_request.store")->middleware('admin-access:record,store,cancel_request');
Route::get('/editform/cancel_request/{id}', [\App\Http\Controllers\MyCancel_RequestController::class,'editform'])->name("record.cancel_request.editform")->middleware('admin-access:record,edit,cancel_request');
Route::put('/update/cancel_request/{id}', [\App\Http\Controllers\MyCancel_RequestController::class,'edit'])->name("record.cancel_request.edit")->middleware('admin-access:record,edit,cancel_request');
Route::get('/destroy/cancel_request/{id}', [\App\Http\Controllers\MyCancel_RequestController::class,'destroy'])->name("record.cancel_request.destroy")->middleware('admin-access:record,delete,cancel_request');
Route::get('/sort/cancel_request', [\App\Http\Controllers\MyCancel_RequestController::class,'sort'])->name("record.cancel_request.sort")->middleware('admin-access:record,store,cancel_request');
Route::get('/export/cancel_request/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCancel_RequestController::class,'export'])->name("record.cancel_request.export")->middleware('admin-access:record,show,cancel_request');
Route::get('/pdf/cancel_request/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCancel_RequestController::class,'pdf'])->name("record.cancel_request.pdf")->middleware('admin-access:record,show,cancel_request');
Route::post('/import/cancel_request/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCancel_RequestController::class,'import'])->name("record.cancel_request.import")->middleware('admin-access:record,store,cancel_request');





Route::get('records/cost_type',[\App\Http\Controllers\MyCost_TypeController::class,'index'])->name("record.cost_type.index")->middleware('admin-access:record,show,cost_type');
Route::get('pagination/cost_type',[\App\Http\Controllers\MyCost_TypeController::class,'pagination'])->name("record.cost_type.pagination")->middleware('admin-access:record,show,cost_type');
Route::get('/storeform/cost_type', [\App\Http\Controllers\MyCost_TypeController::class,'storeform'])->name("record.cost_type.storeform")->middleware('admin-access:record,store,cost_type');
Route::post('/store/cost_type', [\App\Http\Controllers\MyCost_TypeController::class,'store'])->name("record.cost_type.store")->middleware('admin-access:record,store,cost_type');
Route::get('/editform/cost_type/{id}', [\App\Http\Controllers\MyCost_TypeController::class,'editform'])->name("record.cost_type.editform")->middleware('admin-access:record,edit,cost_type');
Route::put('/update/cost_type/{id}', [\App\Http\Controllers\MyCost_TypeController::class,'edit'])->name("record.cost_type.edit")->middleware('admin-access:record,edit,cost_type');
Route::get('/destroy/cost_type/{id}', [\App\Http\Controllers\MyCost_TypeController::class,'destroy'])->name("record.cost_type.destroy")->middleware('admin-access:record,delete,cost_type');
Route::get('/sort/cost_type', [\App\Http\Controllers\MyCost_TypeController::class,'sort'])->name("record.cost_type.sort")->middleware('admin-access:record,store,cost_type');
Route::get('/export/cost_type',[\App\Http\Controllers\MyCost_TypeController::class,'export'])->name("record.cost_type.export")->middleware('admin-access:record,show,cost_type');
Route::get('/pdf/cost_type',[\App\Http\Controllers\MyCost_TypeController::class,'pdf'])->name("record.cost_type.pdf")->middleware('admin-access:record,show,cost_type');
Route::post('/import/cost_type',[\App\Http\Controllers\MyCost_TypeController::class,'import'])->name("record.cost_type.import")->middleware('admin-access:record,store,cost_type');





Route::get('records/heavy_equipment/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyHeavy_EquipmentController::class,'index'])->name("record.heavy_equipment.index")->middleware('admin-access:record,show,heavy_equipment');
Route::get('pagination/heavy_equipment/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyHeavy_EquipmentController::class,'pagination'])->name("record.heavy_equipment.pagination")->middleware('admin-access:record,show,heavy_equipment');
Route::get('/storeform/heavy_equipment/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyHeavy_EquipmentController::class,'storeform'])->name("record.heavy_equipment.storeform")->middleware('admin-access:record,store,heavy_equipment');
Route::post('/store/heavy_equipment/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyHeavy_EquipmentController::class,'store'])->name("record.heavy_equipment.store")->middleware('admin-access:record,store,heavy_equipment');
Route::get('/editform/heavy_equipment/{id}', [\App\Http\Controllers\MyHeavy_EquipmentController::class,'editform'])->name("record.heavy_equipment.editform")->middleware('admin-access:record,edit,heavy_equipment');
Route::put('/update/heavy_equipment/{id}', [\App\Http\Controllers\MyHeavy_EquipmentController::class,'edit'])->name("record.heavy_equipment.edit")->middleware('admin-access:record,edit,heavy_equipment');
Route::get('/destroy/heavy_equipment/{id}', [\App\Http\Controllers\MyHeavy_EquipmentController::class,'destroy'])->name("record.heavy_equipment.destroy")->middleware('admin-access:record,delete,heavy_equipment');
Route::get('/sort/heavy_equipment', [\App\Http\Controllers\MyHeavy_EquipmentController::class,'sort'])->name("record.heavy_equipment.sort")->middleware('admin-access:record,store,heavy_equipment');
Route::get('/export/heavy_equipment/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyHeavy_EquipmentController::class,'export'])->name("record.heavy_equipment.export")->middleware('admin-access:record,show,heavy_equipment');
Route::get('/pdf/heavy_equipment/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyHeavy_EquipmentController::class,'pdf'])->name("record.heavy_equipment.pdf")->middleware('admin-access:record,show,heavy_equipment');
Route::post('/import/heavy_equipment/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyHeavy_EquipmentController::class,'import'])->name("record.heavy_equipment.import")->middleware('admin-access:record,store,heavy_equipment');





Route::get('records/price_parcel',[\App\Http\Controllers\MyPrice_ParcelController::class,'index'])->name("record.price_parcel.index")->middleware('admin-access:record,show,price_parcel');
Route::get('pagination/price_parcel',[\App\Http\Controllers\MyPrice_ParcelController::class,'pagination'])->name("record.price_parcel.pagination")->middleware('admin-access:record,show,price_parcel');
Route::get('/storeform/price_parcel', [\App\Http\Controllers\MyPrice_ParcelController::class,'storeform'])->name("record.price_parcel.storeform")->middleware('admin-access:record,store,price_parcel');
Route::post('/store/price_parcel', [\App\Http\Controllers\MyPrice_ParcelController::class,'store'])->name("record.price_parcel.store")->middleware('admin-access:record,store,price_parcel');
Route::get('/editform/price_parcel/{id}', [\App\Http\Controllers\MyPrice_ParcelController::class,'editform'])->name("record.price_parcel.editform")->middleware('admin-access:record,edit,price_parcel');
Route::put('/update/price_parcel/{id}', [\App\Http\Controllers\MyPrice_ParcelController::class,'edit'])->name("record.price_parcel.edit")->middleware('admin-access:record,edit,price_parcel');
Route::get('/destroy/price_parcel/{id}', [\App\Http\Controllers\MyPrice_ParcelController::class,'destroy'])->name("record.price_parcel.destroy")->middleware('admin-access:record,delete,price_parcel');
Route::get('/sort/price_parcel', [\App\Http\Controllers\MyPrice_ParcelController::class,'sort'])->name("record.price_parcel.sort")->middleware('admin-access:record,store,price_parcel');
Route::get('/export/price_parcel',[\App\Http\Controllers\MyPrice_ParcelController::class,'export'])->name("record.price_parcel.export")->middleware('admin-access:record,show,price_parcel');
Route::get('/pdf/price_parcel',[\App\Http\Controllers\MyPrice_ParcelController::class,'pdf'])->name("record.price_parcel.pdf")->middleware('admin-access:record,show,price_parcel');
Route::post('/import/price_parcel',[\App\Http\Controllers\MyPrice_ParcelController::class,'import'])->name("record.price_parcel.import")->middleware('admin-access:record,store,price_parcel');





Route::get('records/price_floors/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyPrice_FloorsController::class,'index'])->name("record.price_floors.index")->middleware('admin-access:record,show,price_floors');
Route::get('pagination/price_floors/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyPrice_FloorsController::class,'pagination'])->name("record.price_floors.pagination")->middleware('admin-access:record,show,price_floors');
Route::get('/storeform/price_floors/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyPrice_FloorsController::class,'storeform'])->name("record.price_floors.storeform")->middleware('admin-access:record,store,price_floors');
Route::post('/store/price_floors/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyPrice_FloorsController::class,'store'])->name("record.price_floors.store")->middleware('admin-access:record,store,price_floors');
Route::get('/editform/price_floors/{id}', [\App\Http\Controllers\MyPrice_FloorsController::class,'editform'])->name("record.price_floors.editform")->middleware('admin-access:record,edit,price_floors');
Route::put('/update/price_floors/{id}', [\App\Http\Controllers\MyPrice_FloorsController::class,'edit'])->name("record.price_floors.edit")->middleware('admin-access:record,edit,price_floors');
Route::get('/destroy/price_floors/{id}', [\App\Http\Controllers\MyPrice_FloorsController::class,'destroy'])->name("record.price_floors.destroy")->middleware('admin-access:record,delete,price_floors');
Route::get('/sort/price_floors', [\App\Http\Controllers\MyPrice_FloorsController::class,'sort'])->name("record.price_floors.sort")->middleware('admin-access:record,store,price_floors');
Route::get('/export/price_floors/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyPrice_FloorsController::class,'export'])->name("record.price_floors.export")->middleware('admin-access:record,show,price_floors');
Route::get('/pdf/price_floors/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyPrice_FloorsController::class,'pdf'])->name("record.price_floors.pdf")->middleware('admin-access:record,show,price_floors');
Route::post('/import/price_floors/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyPrice_FloorsController::class,'import'])->name("record.price_floors.import")->middleware('admin-access:record,store,price_floors');





Route::get('records/worker_price/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyWorker_PriceController::class,'index'])->name("record.worker_price.index")->middleware('admin-access:record,show,worker_price');
Route::get('pagination/worker_price/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyWorker_PriceController::class,'pagination'])->name("record.worker_price.pagination")->middleware('admin-access:record,show,worker_price');
Route::get('/storeform/worker_price/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyWorker_PriceController::class,'storeform'])->name("record.worker_price.storeform")->middleware('admin-access:record,store,worker_price');
Route::post('/store/worker_price/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyWorker_PriceController::class,'store'])->name("record.worker_price.store")->middleware('admin-access:record,store,worker_price');
Route::get('/editform/worker_price/{id}', [\App\Http\Controllers\MyWorker_PriceController::class,'editform'])->name("record.worker_price.editform")->middleware('admin-access:record,edit,worker_price');
Route::put('/update/worker_price/{id}', [\App\Http\Controllers\MyWorker_PriceController::class,'edit'])->name("record.worker_price.edit")->middleware('admin-access:record,edit,worker_price');
Route::get('/destroy/worker_price/{id}', [\App\Http\Controllers\MyWorker_PriceController::class,'destroy'])->name("record.worker_price.destroy")->middleware('admin-access:record,delete,worker_price');
Route::get('/sort/worker_price', [\App\Http\Controllers\MyWorker_PriceController::class,'sort'])->name("record.worker_price.sort")->middleware('admin-access:record,store,worker_price');
Route::get('/export/worker_price/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyWorker_PriceController::class,'export'])->name("record.worker_price.export")->middleware('admin-access:record,show,worker_price');
Route::get('/pdf/worker_price/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyWorker_PriceController::class,'pdf'])->name("record.worker_price.pdf")->middleware('admin-access:record,show,worker_price');
Route::post('/import/worker_price/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyWorker_PriceController::class,'import'])->name("record.worker_price.import")->middleware('admin-access:record,store,worker_price');





Route::get('records/path_info/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyPath_InfoController::class,'index'])->name("record.path_info.index")->middleware('admin-access:record,show,path_info');
Route::get('pagination/path_info/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyPath_InfoController::class,'pagination'])->name("record.path_info.pagination")->middleware('admin-access:record,show,path_info');
Route::get('/storeform/path_info/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyPath_InfoController::class,'storeform'])->name("record.path_info.storeform")->middleware('admin-access:record,store,path_info');
Route::post('/store/path_info/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyPath_InfoController::class,'store'])->name("record.path_info.store")->middleware('admin-access:record,store,path_info');
Route::get('/editform/path_info/{id}', [\App\Http\Controllers\MyPath_InfoController::class,'editform'])->name("record.path_info.editform")->middleware('admin-access:record,edit,path_info');
Route::put('/update/path_info/{id}', [\App\Http\Controllers\MyPath_InfoController::class,'edit'])->name("record.path_info.edit")->middleware('admin-access:record,edit,path_info');
Route::get('/destroy/path_info/{id}', [\App\Http\Controllers\MyPath_InfoController::class,'destroy'])->name("record.path_info.destroy")->middleware('admin-access:record,delete,path_info');
Route::get('/sort/path_info', [\App\Http\Controllers\MyPath_InfoController::class,'sort'])->name("record.path_info.sort")->middleware('admin-access:record,store,path_info');
Route::get('/export/path_info/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyPath_InfoController::class,'export'])->name("record.path_info.export")->middleware('admin-access:record,show,path_info');
Route::get('/pdf/path_info/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyPath_InfoController::class,'pdf'])->name("record.path_info.pdf")->middleware('admin-access:record,show,path_info');
Route::post('/import/path_info/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyPath_InfoController::class,'import'])->name("record.path_info.import")->middleware('admin-access:record,store,path_info');





Route::get('records/way_type',[\App\Http\Controllers\MyWay_TypeController::class,'index'])->name("record.way_type.index")->middleware('admin-access:record,show,way_type');
Route::get('pagination/way_type',[\App\Http\Controllers\MyWay_TypeController::class,'pagination'])->name("record.way_type.pagination")->middleware('admin-access:record,show,way_type');
Route::get('/storeform/way_type', [\App\Http\Controllers\MyWay_TypeController::class,'storeform'])->name("record.way_type.storeform")->middleware('admin-access:record,store,way_type');
Route::post('/store/way_type', [\App\Http\Controllers\MyWay_TypeController::class,'store'])->name("record.way_type.store")->middleware('admin-access:record,store,way_type');
Route::get('/editform/way_type/{id}', [\App\Http\Controllers\MyWay_TypeController::class,'editform'])->name("record.way_type.editform")->middleware('admin-access:record,edit,way_type');
Route::put('/update/way_type/{id}', [\App\Http\Controllers\MyWay_TypeController::class,'edit'])->name("record.way_type.edit")->middleware('admin-access:record,edit,way_type');
Route::get('/destroy/way_type/{id}', [\App\Http\Controllers\MyWay_TypeController::class,'destroy'])->name("record.way_type.destroy")->middleware('admin-access:record,delete,way_type');
Route::get('/sort/way_type', [\App\Http\Controllers\MyWay_TypeController::class,'sort'])->name("record.way_type.sort")->middleware('admin-access:record,store,way_type');
Route::get('/export/way_type',[\App\Http\Controllers\MyWay_TypeController::class,'export'])->name("record.way_type.export")->middleware('admin-access:record,show,way_type');
Route::get('/pdf/way_type',[\App\Http\Controllers\MyWay_TypeController::class,'pdf'])->name("record.way_type.pdf")->middleware('admin-access:record,show,way_type');
Route::post('/import/way_type',[\App\Http\Controllers\MyWay_TypeController::class,'import'])->name("record.way_type.import")->middleware('admin-access:record,store,way_type');





Route::get('records/documents/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyDocumentsController::class,'index'])->name("record.documents.index")->middleware('admin-access:record,show,documents');
Route::get('pagination/documents/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyDocumentsController::class,'pagination'])->name("record.documents.pagination")->middleware('admin-access:record,show,documents');
Route::get('/storeform/documents/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyDocumentsController::class,'storeform'])->name("record.documents.storeform")->middleware('admin-access:record,store,documents');
Route::post('/store/documents/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyDocumentsController::class,'store'])->name("record.documents.store")->middleware('admin-access:record,store,documents');
Route::get('/editform/documents/{id}', [\App\Http\Controllers\MyDocumentsController::class,'editform'])->name("record.documents.editform")->middleware('admin-access:record,edit,documents');
Route::put('/update/documents/{id}', [\App\Http\Controllers\MyDocumentsController::class,'edit'])->name("record.documents.edit")->middleware('admin-access:record,edit,documents');
Route::get('/destroy/documents/{id}', [\App\Http\Controllers\MyDocumentsController::class,'destroy'])->name("record.documents.destroy")->middleware('admin-access:record,delete,documents');
Route::get('/sort/documents', [\App\Http\Controllers\MyDocumentsController::class,'sort'])->name("record.documents.sort")->middleware('admin-access:record,store,documents');
Route::get('/export/documents/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyDocumentsController::class,'export'])->name("record.documents.export")->middleware('admin-access:record,show,documents');
Route::get('/pdf/documents/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyDocumentsController::class,'pdf'])->name("record.documents.pdf")->middleware('admin-access:record,show,documents');
Route::post('/import/documents/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyDocumentsController::class,'import'])->name("record.documents.import")->middleware('admin-access:record,store,documents');





Route::get('records/car_models',[\App\Http\Controllers\MyCar_ModelsController::class,'index'])->name("record.car_models.index")->middleware('admin-access:record,show,car_models');
Route::get('pagination/car_models',[\App\Http\Controllers\MyCar_ModelsController::class,'pagination'])->name("record.car_models.pagination")->middleware('admin-access:record,show,car_models');
Route::get('/storeform/car_models', [\App\Http\Controllers\MyCar_ModelsController::class,'storeform'])->name("record.car_models.storeform")->middleware('admin-access:record,store,car_models');
Route::post('/store/car_models', [\App\Http\Controllers\MyCar_ModelsController::class,'store'])->name("record.car_models.store")->middleware('admin-access:record,store,car_models');
Route::get('/editform/car_models/{id}', [\App\Http\Controllers\MyCar_ModelsController::class,'editform'])->name("record.car_models.editform")->middleware('admin-access:record,edit,car_models');
Route::put('/update/car_models/{id}', [\App\Http\Controllers\MyCar_ModelsController::class,'edit'])->name("record.car_models.edit")->middleware('admin-access:record,edit,car_models');
Route::get('/destroy/car_models/{id}', [\App\Http\Controllers\MyCar_ModelsController::class,'destroy'])->name("record.car_models.destroy")->middleware('admin-access:record,delete,car_models');
Route::get('/sort/car_models', [\App\Http\Controllers\MyCar_ModelsController::class,'sort'])->name("record.car_models.sort")->middleware('admin-access:record,store,car_models');
Route::get('/export/car_models',[\App\Http\Controllers\MyCar_ModelsController::class,'export'])->name("record.car_models.export")->middleware('admin-access:record,show,car_models');
Route::get('/pdf/car_models',[\App\Http\Controllers\MyCar_ModelsController::class,'pdf'])->name("record.car_models.pdf")->middleware('admin-access:record,show,car_models');
Route::post('/import/car_models',[\App\Http\Controllers\MyCar_ModelsController::class,'import'])->name("record.car_models.import")->middleware('admin-access:record,store,car_models');





Route::get('records/fuel_type',[\App\Http\Controllers\MyFuel_TypeController::class,'index'])->name("record.fuel_type.index")->middleware('admin-access:record,show,fuel_type');
Route::get('pagination/fuel_type',[\App\Http\Controllers\MyFuel_TypeController::class,'pagination'])->name("record.fuel_type.pagination")->middleware('admin-access:record,show,fuel_type');
Route::get('/storeform/fuel_type', [\App\Http\Controllers\MyFuel_TypeController::class,'storeform'])->name("record.fuel_type.storeform")->middleware('admin-access:record,store,fuel_type');
Route::post('/store/fuel_type', [\App\Http\Controllers\MyFuel_TypeController::class,'store'])->name("record.fuel_type.store")->middleware('admin-access:record,store,fuel_type');
Route::get('/editform/fuel_type/{id}', [\App\Http\Controllers\MyFuel_TypeController::class,'editform'])->name("record.fuel_type.editform")->middleware('admin-access:record,edit,fuel_type');
Route::put('/update/fuel_type/{id}', [\App\Http\Controllers\MyFuel_TypeController::class,'edit'])->name("record.fuel_type.edit")->middleware('admin-access:record,edit,fuel_type');
Route::get('/destroy/fuel_type/{id}', [\App\Http\Controllers\MyFuel_TypeController::class,'destroy'])->name("record.fuel_type.destroy")->middleware('admin-access:record,delete,fuel_type');
Route::get('/sort/fuel_type', [\App\Http\Controllers\MyFuel_TypeController::class,'sort'])->name("record.fuel_type.sort")->middleware('admin-access:record,store,fuel_type');
Route::get('/export/fuel_type',[\App\Http\Controllers\MyFuel_TypeController::class,'export'])->name("record.fuel_type.export")->middleware('admin-access:record,show,fuel_type');
Route::get('/pdf/fuel_type',[\App\Http\Controllers\MyFuel_TypeController::class,'pdf'])->name("record.fuel_type.pdf")->middleware('admin-access:record,show,fuel_type');
Route::post('/import/fuel_type',[\App\Http\Controllers\MyFuel_TypeController::class,'import'])->name("record.fuel_type.import")->middleware('admin-access:record,store,fuel_type');





Route::get('records/certificates_types',[\App\Http\Controllers\MyCertificates_TypesController::class,'index'])->name("record.certificates_types.index")->middleware('admin-access:record,show,certificates_types');
Route::get('pagination/certificates_types',[\App\Http\Controllers\MyCertificates_TypesController::class,'pagination'])->name("record.certificates_types.pagination")->middleware('admin-access:record,show,certificates_types');
Route::get('/storeform/certificates_types', [\App\Http\Controllers\MyCertificates_TypesController::class,'storeform'])->name("record.certificates_types.storeform")->middleware('admin-access:record,store,certificates_types');
Route::post('/store/certificates_types', [\App\Http\Controllers\MyCertificates_TypesController::class,'store'])->name("record.certificates_types.store")->middleware('admin-access:record,store,certificates_types');
Route::get('/editform/certificates_types/{id}', [\App\Http\Controllers\MyCertificates_TypesController::class,'editform'])->name("record.certificates_types.editform")->middleware('admin-access:record,edit,certificates_types');
Route::put('/update/certificates_types/{id}', [\App\Http\Controllers\MyCertificates_TypesController::class,'edit'])->name("record.certificates_types.edit")->middleware('admin-access:record,edit,certificates_types');
Route::get('/destroy/certificates_types/{id}', [\App\Http\Controllers\MyCertificates_TypesController::class,'destroy'])->name("record.certificates_types.destroy")->middleware('admin-access:record,delete,certificates_types');
Route::get('/sort/certificates_types', [\App\Http\Controllers\MyCertificates_TypesController::class,'sort'])->name("record.certificates_types.sort")->middleware('admin-access:record,store,certificates_types');
Route::get('/export/certificates_types',[\App\Http\Controllers\MyCertificates_TypesController::class,'export'])->name("record.certificates_types.export")->middleware('admin-access:record,show,certificates_types');
Route::get('/pdf/certificates_types',[\App\Http\Controllers\MyCertificates_TypesController::class,'pdf'])->name("record.certificates_types.pdf")->middleware('admin-access:record,show,certificates_types');
Route::post('/import/certificates_types',[\App\Http\Controllers\MyCertificates_TypesController::class,'import'])->name("record.certificates_types.import")->middleware('admin-access:record,store,certificates_types');





Route::get('records/transaction_types',[\App\Http\Controllers\MyTransaction_TypesController::class,'index'])->name("record.transaction_types.index")->middleware('admin-access:record,show,transaction_types');
Route::get('pagination/transaction_types',[\App\Http\Controllers\MyTransaction_TypesController::class,'pagination'])->name("record.transaction_types.pagination")->middleware('admin-access:record,show,transaction_types');
Route::get('/storeform/transaction_types', [\App\Http\Controllers\MyTransaction_TypesController::class,'storeform'])->name("record.transaction_types.storeform")->middleware('admin-access:record,store,transaction_types');
Route::post('/store/transaction_types', [\App\Http\Controllers\MyTransaction_TypesController::class,'store'])->name("record.transaction_types.store")->middleware('admin-access:record,store,transaction_types');
Route::get('/editform/transaction_types/{id}', [\App\Http\Controllers\MyTransaction_TypesController::class,'editform'])->name("record.transaction_types.editform")->middleware('admin-access:record,edit,transaction_types');
Route::put('/update/transaction_types/{id}', [\App\Http\Controllers\MyTransaction_TypesController::class,'edit'])->name("record.transaction_types.edit")->middleware('admin-access:record,edit,transaction_types');
Route::get('/destroy/transaction_types/{id}', [\App\Http\Controllers\MyTransaction_TypesController::class,'destroy'])->name("record.transaction_types.destroy")->middleware('admin-access:record,delete,transaction_types');
Route::get('/sort/transaction_types', [\App\Http\Controllers\MyTransaction_TypesController::class,'sort'])->name("record.transaction_types.sort")->middleware('admin-access:record,store,transaction_types');
Route::get('/export/transaction_types',[\App\Http\Controllers\MyTransaction_TypesController::class,'export'])->name("record.transaction_types.export")->middleware('admin-access:record,show,transaction_types');
Route::get('/pdf/transaction_types',[\App\Http\Controllers\MyTransaction_TypesController::class,'pdf'])->name("record.transaction_types.pdf")->middleware('admin-access:record,show,transaction_types');
Route::post('/import/transaction_types',[\App\Http\Controllers\MyTransaction_TypesController::class,'import'])->name("record.transaction_types.import")->middleware('admin-access:record,store,transaction_types');





Route::get('records/commission/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCommissionController::class,'index'])->name("record.commission.index")->middleware('admin-access:record,show,commission');
Route::get('pagination/commission/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCommissionController::class,'pagination'])->name("record.commission.pagination")->middleware('admin-access:record,show,commission');
Route::get('/storeform/commission/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyCommissionController::class,'storeform'])->name("record.commission.storeform")->middleware('admin-access:record,store,commission');
Route::post('/store/commission/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyCommissionController::class,'store'])->name("record.commission.store")->middleware('admin-access:record,store,commission');
Route::get('/editform/commission/{id}', [\App\Http\Controllers\MyCommissionController::class,'editform'])->name("record.commission.editform")->middleware('admin-access:record,edit,commission');
Route::put('/update/commission/{id}', [\App\Http\Controllers\MyCommissionController::class,'edit'])->name("record.commission.edit")->middleware('admin-access:record,edit,commission');
Route::get('/destroy/commission/{id}', [\App\Http\Controllers\MyCommissionController::class,'destroy'])->name("record.commission.destroy")->middleware('admin-access:record,delete,commission');
Route::get('/sort/commission', [\App\Http\Controllers\MyCommissionController::class,'sort'])->name("record.commission.sort")->middleware('admin-access:record,store,commission');
Route::get('/export/commission/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCommissionController::class,'export'])->name("record.commission.export")->middleware('admin-access:record,show,commission');
Route::get('/pdf/commission/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCommissionController::class,'pdf'])->name("record.commission.pdf")->middleware('admin-access:record,show,commission');
Route::post('/import/commission/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCommissionController::class,'import'])->name("record.commission.import")->middleware('admin-access:record,store,commission');





Route::get('records/level',[\App\Http\Controllers\MyLevelController::class,'index'])->name("record.level.index")->middleware('admin-access:record,show,level');
Route::get('pagination/level',[\App\Http\Controllers\MyLevelController::class,'pagination'])->name("record.level.pagination")->middleware('admin-access:record,show,level');
Route::get('/storeform/level', [\App\Http\Controllers\MyLevelController::class,'storeform'])->name("record.level.storeform")->middleware('admin-access:record,store,level');
Route::post('/store/level', [\App\Http\Controllers\MyLevelController::class,'store'])->name("record.level.store")->middleware('admin-access:record,store,level');
Route::get('/editform/level/{id}', [\App\Http\Controllers\MyLevelController::class,'editform'])->name("record.level.editform")->middleware('admin-access:record,edit,level');
Route::put('/update/level/{id}', [\App\Http\Controllers\MyLevelController::class,'edit'])->name("record.level.edit")->middleware('admin-access:record,edit,level');
Route::get('/destroy/level/{id}', [\App\Http\Controllers\MyLevelController::class,'destroy'])->name("record.level.destroy")->middleware('admin-access:record,delete,level');
Route::get('/sort/level', [\App\Http\Controllers\MyLevelController::class,'sort'])->name("record.level.sort")->middleware('admin-access:record,store,level');
Route::get('/export/level',[\App\Http\Controllers\MyLevelController::class,'export'])->name("record.level.export")->middleware('admin-access:record,show,level');
Route::get('/pdf/level',[\App\Http\Controllers\MyLevelController::class,'pdf'])->name("record.level.pdf")->middleware('admin-access:record,show,level');
Route::post('/import/level',[\App\Http\Controllers\MyLevelController::class,'import'])->name("record.level.import")->middleware('admin-access:record,store,level');





Route::get('records/cancel_driver/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCancel_DriverController::class,'index'])->name("record.cancel_driver.index")->middleware('admin-access:record,show,cancel_driver');
Route::get('pagination/cancel_driver/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCancel_DriverController::class,'pagination'])->name("record.cancel_driver.pagination")->middleware('admin-access:record,show,cancel_driver');
Route::get('/storeform/cancel_driver/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyCancel_DriverController::class,'storeform'])->name("record.cancel_driver.storeform")->middleware('admin-access:record,store,cancel_driver');
Route::post('/store/cancel_driver/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyCancel_DriverController::class,'store'])->name("record.cancel_driver.store")->middleware('admin-access:record,store,cancel_driver');
Route::get('/editform/cancel_driver/{id}', [\App\Http\Controllers\MyCancel_DriverController::class,'editform'])->name("record.cancel_driver.editform")->middleware('admin-access:record,edit,cancel_driver');
Route::put('/update/cancel_driver/{id}', [\App\Http\Controllers\MyCancel_DriverController::class,'edit'])->name("record.cancel_driver.edit")->middleware('admin-access:record,edit,cancel_driver');
Route::get('/destroy/cancel_driver/{id}', [\App\Http\Controllers\MyCancel_DriverController::class,'destroy'])->name("record.cancel_driver.destroy")->middleware('admin-access:record,delete,cancel_driver');
Route::get('/sort/cancel_driver', [\App\Http\Controllers\MyCancel_DriverController::class,'sort'])->name("record.cancel_driver.sort")->middleware('admin-access:record,store,cancel_driver');
Route::get('/export/cancel_driver/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCancel_DriverController::class,'export'])->name("record.cancel_driver.export")->middleware('admin-access:record,show,cancel_driver');
Route::get('/pdf/cancel_driver/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCancel_DriverController::class,'pdf'])->name("record.cancel_driver.pdf")->middleware('admin-access:record,show,cancel_driver');
Route::post('/import/cancel_driver/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyCancel_DriverController::class,'import'])->name("record.cancel_driver.import")->middleware('admin-access:record,store,cancel_driver');





Route::get('records/info_bank/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyInfo_BankController::class,'index'])->name("record.info_bank.index")->middleware('admin-access:record,show,info_bank');
Route::get('pagination/info_bank/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyInfo_BankController::class,'pagination'])->name("record.info_bank.pagination")->middleware('admin-access:record,show,info_bank');
Route::get('/storeform/info_bank/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyInfo_BankController::class,'storeform'])->name("record.info_bank.storeform")->middleware('admin-access:record,store,info_bank');
Route::post('/store/info_bank/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyInfo_BankController::class,'store'])->name("record.info_bank.store")->middleware('admin-access:record,store,info_bank');
Route::get('/editform/info_bank/{id}', [\App\Http\Controllers\MyInfo_BankController::class,'editform'])->name("record.info_bank.editform")->middleware('admin-access:record,edit,info_bank');
Route::put('/update/info_bank/{id}', [\App\Http\Controllers\MyInfo_BankController::class,'edit'])->name("record.info_bank.edit")->middleware('admin-access:record,edit,info_bank');
Route::get('/destroy/info_bank/{id}', [\App\Http\Controllers\MyInfo_BankController::class,'destroy'])->name("record.info_bank.destroy")->middleware('admin-access:record,delete,info_bank');
Route::get('/sort/info_bank', [\App\Http\Controllers\MyInfo_BankController::class,'sort'])->name("record.info_bank.sort")->middleware('admin-access:record,store,info_bank');
Route::get('/export/info_bank/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyInfo_BankController::class,'export'])->name("record.info_bank.export")->middleware('admin-access:record,show,info_bank');
Route::get('/pdf/info_bank/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyInfo_BankController::class,'pdf'])->name("record.info_bank.pdf")->middleware('admin-access:record,show,info_bank');
Route::post('/import/info_bank/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyInfo_BankController::class,'import'])->name("record.info_bank.import")->middleware('admin-access:record,store,info_bank');





Route::get('records/banks',[\App\Http\Controllers\MyBanksController::class,'index'])->name("record.banks.index")->middleware('admin-access:record,show,banks');
Route::get('pagination/banks',[\App\Http\Controllers\MyBanksController::class,'pagination'])->name("record.banks.pagination")->middleware('admin-access:record,show,banks');
Route::get('/storeform/banks', [\App\Http\Controllers\MyBanksController::class,'storeform'])->name("record.banks.storeform")->middleware('admin-access:record,store,banks');
Route::post('/store/banks', [\App\Http\Controllers\MyBanksController::class,'store'])->name("record.banks.store")->middleware('admin-access:record,store,banks');
Route::get('/editform/banks/{id}', [\App\Http\Controllers\MyBanksController::class,'editform'])->name("record.banks.editform")->middleware('admin-access:record,edit,banks');
Route::put('/update/banks/{id}', [\App\Http\Controllers\MyBanksController::class,'edit'])->name("record.banks.edit")->middleware('admin-access:record,edit,banks');
Route::get('/destroy/banks/{id}', [\App\Http\Controllers\MyBanksController::class,'destroy'])->name("record.banks.destroy")->middleware('admin-access:record,delete,banks');
Route::get('/sort/banks', [\App\Http\Controllers\MyBanksController::class,'sort'])->name("record.banks.sort")->middleware('admin-access:record,store,banks');
Route::get('/export/banks',[\App\Http\Controllers\MyBanksController::class,'export'])->name("record.banks.export")->middleware('admin-access:record,show,banks');
Route::get('/pdf/banks',[\App\Http\Controllers\MyBanksController::class,'pdf'])->name("record.banks.pdf")->middleware('admin-access:record,show,banks');
Route::post('/import/banks',[\App\Http\Controllers\MyBanksController::class,'import'])->name("record.banks.import")->middleware('admin-access:record,store,banks');





Route::get('records/services_type',[\App\Http\Controllers\MyServices_TypeController::class,'index'])->name("record.services_type.index")->middleware('admin-access:record,show,services_type');
Route::get('pagination/services_type',[\App\Http\Controllers\MyServices_TypeController::class,'pagination'])->name("record.services_type.pagination")->middleware('admin-access:record,show,services_type');
Route::get('/storeform/services_type', [\App\Http\Controllers\MyServices_TypeController::class,'storeform'])->name("record.services_type.storeform")->middleware('admin-access:record,store,services_type');
Route::post('/store/services_type', [\App\Http\Controllers\MyServices_TypeController::class,'store'])->name("record.services_type.store")->middleware('admin-access:record,store,services_type');
Route::get('/editform/services_type/{id}', [\App\Http\Controllers\MyServices_TypeController::class,'editform'])->name("record.services_type.editform")->middleware('admin-access:record,edit,services_type');
Route::put('/update/services_type/{id}', [\App\Http\Controllers\MyServices_TypeController::class,'edit'])->name("record.services_type.edit")->middleware('admin-access:record,edit,services_type');
Route::get('/destroy/services_type/{id}', [\App\Http\Controllers\MyServices_TypeController::class,'destroy'])->name("record.services_type.destroy")->middleware('admin-access:record,delete,services_type');
Route::get('/sort/services_type', [\App\Http\Controllers\MyServices_TypeController::class,'sort'])->name("record.services_type.sort")->middleware('admin-access:record,store,services_type');
Route::get('/export/services_type',[\App\Http\Controllers\MyServices_TypeController::class,'export'])->name("record.services_type.export")->middleware('admin-access:record,show,services_type');
Route::get('/pdf/services_type',[\App\Http\Controllers\MyServices_TypeController::class,'pdf'])->name("record.services_type.pdf")->middleware('admin-access:record,show,services_type');
Route::post('/import/services_type',[\App\Http\Controllers\MyServices_TypeController::class,'import'])->name("record.services_type.import")->middleware('admin-access:record,store,services_type');





Route::get('records/equipment_detail/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyEquipment_DetailController::class,'index'])->name("record.equipment_detail.index")->middleware('admin-access:record,show,equipment_detail');
Route::get('pagination/equipment_detail/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyEquipment_DetailController::class,'pagination'])->name("record.equipment_detail.pagination")->middleware('admin-access:record,show,equipment_detail');
Route::get('/storeform/equipment_detail/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyEquipment_DetailController::class,'storeform'])->name("record.equipment_detail.storeform")->middleware('admin-access:record,store,equipment_detail');
Route::post('/store/equipment_detail/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyEquipment_DetailController::class,'store'])->name("record.equipment_detail.store")->middleware('admin-access:record,store,equipment_detail');
Route::get('/editform/equipment_detail/{id}', [\App\Http\Controllers\MyEquipment_DetailController::class,'editform'])->name("record.equipment_detail.editform")->middleware('admin-access:record,edit,equipment_detail');
Route::put('/update/equipment_detail/{id}', [\App\Http\Controllers\MyEquipment_DetailController::class,'edit'])->name("record.equipment_detail.edit")->middleware('admin-access:record,edit,equipment_detail');
Route::get('/destroy/equipment_detail/{id}', [\App\Http\Controllers\MyEquipment_DetailController::class,'destroy'])->name("record.equipment_detail.destroy")->middleware('admin-access:record,delete,equipment_detail');
Route::get('/sort/equipment_detail', [\App\Http\Controllers\MyEquipment_DetailController::class,'sort'])->name("record.equipment_detail.sort")->middleware('admin-access:record,store,equipment_detail');
Route::get('/export/equipment_detail/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyEquipment_DetailController::class,'export'])->name("record.equipment_detail.export")->middleware('admin-access:record,show,equipment_detail');
Route::get('/pdf/equipment_detail/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyEquipment_DetailController::class,'pdf'])->name("record.equipment_detail.pdf")->middleware('admin-access:record,show,equipment_detail');
Route::post('/import/equipment_detail/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyEquipment_DetailController::class,'import'])->name("record.equipment_detail.import")->middleware('admin-access:record,store,equipment_detail');





Route::get('records/floor_detail',[\App\Http\Controllers\MyFloor_DetailController::class,'index'])->name("record.floor_detail.index")->middleware('admin-access:record,show,floor_detail');
Route::get('pagination/floor_detail',[\App\Http\Controllers\MyFloor_DetailController::class,'pagination'])->name("record.floor_detail.pagination")->middleware('admin-access:record,show,floor_detail');
Route::get('/storeform/floor_detail', [\App\Http\Controllers\MyFloor_DetailController::class,'storeform'])->name("record.floor_detail.storeform")->middleware('admin-access:record,store,floor_detail');
Route::post('/store/floor_detail', [\App\Http\Controllers\MyFloor_DetailController::class,'store'])->name("record.floor_detail.store")->middleware('admin-access:record,store,floor_detail');
Route::get('/editform/floor_detail/{id}', [\App\Http\Controllers\MyFloor_DetailController::class,'editform'])->name("record.floor_detail.editform")->middleware('admin-access:record,edit,floor_detail');
Route::put('/update/floor_detail/{id}', [\App\Http\Controllers\MyFloor_DetailController::class,'edit'])->name("record.floor_detail.edit")->middleware('admin-access:record,edit,floor_detail');
Route::get('/destroy/floor_detail/{id}', [\App\Http\Controllers\MyFloor_DetailController::class,'destroy'])->name("record.floor_detail.destroy")->middleware('admin-access:record,delete,floor_detail');
Route::get('/sort/floor_detail', [\App\Http\Controllers\MyFloor_DetailController::class,'sort'])->name("record.floor_detail.sort")->middleware('admin-access:record,store,floor_detail');
Route::get('/export/floor_detail',[\App\Http\Controllers\MyFloor_DetailController::class,'export'])->name("record.floor_detail.export")->middleware('admin-access:record,show,floor_detail');
Route::get('/pdf/floor_detail',[\App\Http\Controllers\MyFloor_DetailController::class,'pdf'])->name("record.floor_detail.pdf")->middleware('admin-access:record,show,floor_detail');
Route::post('/import/floor_detail',[\App\Http\Controllers\MyFloor_DetailController::class,'import'])->name("record.floor_detail.import")->middleware('admin-access:record,store,floor_detail');
Route::get('/active/floor_detail/elevator/{id}', [\App\Http\Controllers\MyFloor_DetailController::class,'elevatorActive'])->name("record.floor_detail.elevator")->middleware('admin-access:record,edit,floor_detail');





Route::get('records/gift_cart',[\App\Http\Controllers\MyGift_CartController::class,'index'])->name("record.gift_cart.index")->middleware('admin-access:record,show,gift_cart');
Route::get('pagination/gift_cart',[\App\Http\Controllers\MyGift_CartController::class,'pagination'])->name("record.gift_cart.pagination")->middleware('admin-access:record,show,gift_cart');
Route::get('/storeform/gift_cart', [\App\Http\Controllers\MyGift_CartController::class,'storeform'])->name("record.gift_cart.storeform")->middleware('admin-access:record,store,gift_cart');
Route::post('/store/gift_cart', [\App\Http\Controllers\MyGift_CartController::class,'store'])->name("record.gift_cart.store")->middleware('admin-access:record,store,gift_cart');
Route::get('/editform/gift_cart/{id}', [\App\Http\Controllers\MyGift_CartController::class,'editform'])->name("record.gift_cart.editform")->middleware('admin-access:record,edit,gift_cart');
Route::put('/update/gift_cart/{id}', [\App\Http\Controllers\MyGift_CartController::class,'edit'])->name("record.gift_cart.edit")->middleware('admin-access:record,edit,gift_cart');
Route::get('/destroy/gift_cart/{id}', [\App\Http\Controllers\MyGift_CartController::class,'destroy'])->name("record.gift_cart.destroy")->middleware('admin-access:record,delete,gift_cart');
Route::get('/sort/gift_cart', [\App\Http\Controllers\MyGift_CartController::class,'sort'])->name("record.gift_cart.sort")->middleware('admin-access:record,store,gift_cart');
Route::get('/export/gift_cart',[\App\Http\Controllers\MyGift_CartController::class,'export'])->name("record.gift_cart.export")->middleware('admin-access:record,show,gift_cart');
Route::get('/pdf/gift_cart',[\App\Http\Controllers\MyGift_CartController::class,'pdf'])->name("record.gift_cart.pdf")->middleware('admin-access:record,show,gift_cart');
Route::post('/import/gift_cart',[\App\Http\Controllers\MyGift_CartController::class,'import'])->name("record.gift_cart.import")->middleware('admin-access:record,store,gift_cart');





Route::get('records/state_driver',[\App\Http\Controllers\MyState_DriverController::class,'index'])->name("record.state_driver.index")->middleware('admin-access:record,show,state_driver');
Route::get('pagination/state_driver',[\App\Http\Controllers\MyState_DriverController::class,'pagination'])->name("record.state_driver.pagination")->middleware('admin-access:record,show,state_driver');
Route::get('/storeform/state_driver', [\App\Http\Controllers\MyState_DriverController::class,'storeform'])->name("record.state_driver.storeform")->middleware('admin-access:record,store,state_driver');
Route::post('/store/state_driver', [\App\Http\Controllers\MyState_DriverController::class,'store'])->name("record.state_driver.store")->middleware('admin-access:record,store,state_driver');
Route::get('/editform/state_driver/{id}', [\App\Http\Controllers\MyState_DriverController::class,'editform'])->name("record.state_driver.editform")->middleware('admin-access:record,edit,state_driver');
Route::put('/update/state_driver/{id}', [\App\Http\Controllers\MyState_DriverController::class,'edit'])->name("record.state_driver.edit")->middleware('admin-access:record,edit,state_driver');
Route::get('/destroy/state_driver/{id}', [\App\Http\Controllers\MyState_DriverController::class,'destroy'])->name("record.state_driver.destroy")->middleware('admin-access:record,delete,state_driver');
Route::get('/sort/state_driver', [\App\Http\Controllers\MyState_DriverController::class,'sort'])->name("record.state_driver.sort")->middleware('admin-access:record,store,state_driver');
Route::get('/export/state_driver',[\App\Http\Controllers\MyState_DriverController::class,'export'])->name("record.state_driver.export")->middleware('admin-access:record,show,state_driver');
Route::get('/pdf/state_driver',[\App\Http\Controllers\MyState_DriverController::class,'pdf'])->name("record.state_driver.pdf")->middleware('admin-access:record,show,state_driver');
Route::post('/import/state_driver',[\App\Http\Controllers\MyState_DriverController::class,'import'])->name("record.state_driver.import")->middleware('admin-access:record,store,state_driver');





Route::get('records/repetitive_routes',[\App\Http\Controllers\MyRepetitive_RoutesController::class,'index'])->name("record.repetitive_routes.index")->middleware('admin-access:record,show,repetitive_routes');
Route::get('pagination/repetitive_routes',[\App\Http\Controllers\MyRepetitive_RoutesController::class,'pagination'])->name("record.repetitive_routes.pagination")->middleware('admin-access:record,show,repetitive_routes');
Route::get('/storeform/repetitive_routes', [\App\Http\Controllers\MyRepetitive_RoutesController::class,'storeform'])->name("record.repetitive_routes.storeform")->middleware('admin-access:record,store,repetitive_routes');
Route::post('/store/repetitive_routes', [\App\Http\Controllers\MyRepetitive_RoutesController::class,'store'])->name("record.repetitive_routes.store")->middleware('admin-access:record,store,repetitive_routes');
Route::get('/editform/repetitive_routes/{id}', [\App\Http\Controllers\MyRepetitive_RoutesController::class,'editform'])->name("record.repetitive_routes.editform")->middleware('admin-access:record,edit,repetitive_routes');
Route::put('/update/repetitive_routes/{id}', [\App\Http\Controllers\MyRepetitive_RoutesController::class,'edit'])->name("record.repetitive_routes.edit")->middleware('admin-access:record,edit,repetitive_routes');
Route::get('/destroy/repetitive_routes/{id}', [\App\Http\Controllers\MyRepetitive_RoutesController::class,'destroy'])->name("record.repetitive_routes.destroy")->middleware('admin-access:record,delete,repetitive_routes');
Route::get('/sort/repetitive_routes', [\App\Http\Controllers\MyRepetitive_RoutesController::class,'sort'])->name("record.repetitive_routes.sort")->middleware('admin-access:record,store,repetitive_routes');
Route::get('/export/repetitive_routes',[\App\Http\Controllers\MyRepetitive_RoutesController::class,'export'])->name("record.repetitive_routes.export")->middleware('admin-access:record,show,repetitive_routes');
Route::get('/pdf/repetitive_routes',[\App\Http\Controllers\MyRepetitive_RoutesController::class,'pdf'])->name("record.repetitive_routes.pdf")->middleware('admin-access:record,show,repetitive_routes');
Route::post('/import/repetitive_routes',[\App\Http\Controllers\MyRepetitive_RoutesController::class,'import'])->name("record.repetitive_routes.import")->middleware('admin-access:record,store,repetitive_routes');





Route::get('records/prefixes',[\App\Http\Controllers\MyPrefixesController::class,'index'])->name("record.prefixes.index")->middleware('admin-access:record,show,prefixes');
Route::get('pagination/prefixes',[\App\Http\Controllers\MyPrefixesController::class,'pagination'])->name("record.prefixes.pagination")->middleware('admin-access:record,show,prefixes');
Route::get('/storeform/prefixes', [\App\Http\Controllers\MyPrefixesController::class,'storeform'])->name("record.prefixes.storeform")->middleware('admin-access:record,store,prefixes');
Route::post('/store/prefixes', [\App\Http\Controllers\MyPrefixesController::class,'store'])->name("record.prefixes.store")->middleware('admin-access:record,store,prefixes');
Route::get('/editform/prefixes/{id}', [\App\Http\Controllers\MyPrefixesController::class,'editform'])->name("record.prefixes.editform")->middleware('admin-access:record,edit,prefixes');
Route::put('/update/prefixes/{id}', [\App\Http\Controllers\MyPrefixesController::class,'edit'])->name("record.prefixes.edit")->middleware('admin-access:record,edit,prefixes');
Route::get('/destroy/prefixes/{id}', [\App\Http\Controllers\MyPrefixesController::class,'destroy'])->name("record.prefixes.destroy")->middleware('admin-access:record,delete,prefixes');
Route::get('/sort/prefixes', [\App\Http\Controllers\MyPrefixesController::class,'sort'])->name("record.prefixes.sort")->middleware('admin-access:record,store,prefixes');
Route::get('/export/prefixes',[\App\Http\Controllers\MyPrefixesController::class,'export'])->name("record.prefixes.export")->middleware('admin-access:record,show,prefixes');
Route::get('/pdf/prefixes',[\App\Http\Controllers\MyPrefixesController::class,'pdf'])->name("record.prefixes.pdf")->middleware('admin-access:record,show,prefixes');
Route::post('/import/prefixes',[\App\Http\Controllers\MyPrefixesController::class,'import'])->name("record.prefixes.import")->middleware('admin-access:record,store,prefixes');





Route::get('records/admin_numbers',[\App\Http\Controllers\MyAdmin_NumbersController::class,'index'])->name("record.admin_numbers.index")->middleware('admin-access:record,show,admin_numbers');
Route::get('pagination/admin_numbers',[\App\Http\Controllers\MyAdmin_NumbersController::class,'pagination'])->name("record.admin_numbers.pagination")->middleware('admin-access:record,show,admin_numbers');
Route::get('/storeform/admin_numbers', [\App\Http\Controllers\MyAdmin_NumbersController::class,'storeform'])->name("record.admin_numbers.storeform")->middleware('admin-access:record,store,admin_numbers');
Route::post('/store/admin_numbers', [\App\Http\Controllers\MyAdmin_NumbersController::class,'store'])->name("record.admin_numbers.store")->middleware('admin-access:record,store,admin_numbers');
Route::get('/editform/admin_numbers/{id}', [\App\Http\Controllers\MyAdmin_NumbersController::class,'editform'])->name("record.admin_numbers.editform")->middleware('admin-access:record,edit,admin_numbers');
Route::put('/update/admin_numbers/{id}', [\App\Http\Controllers\MyAdmin_NumbersController::class,'edit'])->name("record.admin_numbers.edit")->middleware('admin-access:record,edit,admin_numbers');
Route::get('/destroy/admin_numbers/{id}', [\App\Http\Controllers\MyAdmin_NumbersController::class,'destroy'])->name("record.admin_numbers.destroy")->middleware('admin-access:record,delete,admin_numbers');
Route::get('/sort/admin_numbers', [\App\Http\Controllers\MyAdmin_NumbersController::class,'sort'])->name("record.admin_numbers.sort")->middleware('admin-access:record,store,admin_numbers');
Route::get('/export/admin_numbers',[\App\Http\Controllers\MyAdmin_NumbersController::class,'export'])->name("record.admin_numbers.export")->middleware('admin-access:record,show,admin_numbers');
Route::get('/pdf/admin_numbers',[\App\Http\Controllers\MyAdmin_NumbersController::class,'pdf'])->name("record.admin_numbers.pdf")->middleware('admin-access:record,show,admin_numbers');
Route::post('/import/admin_numbers',[\App\Http\Controllers\MyAdmin_NumbersController::class,'import'])->name("record.admin_numbers.import")->middleware('admin-access:record,store,admin_numbers');





Route::get('records/repetitive_place/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyRepetitive_PlaceController::class,'index'])->name("record.repetitive_place.index")->middleware('admin-access:record,show,repetitive_place');
Route::get('pagination/repetitive_place/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyRepetitive_PlaceController::class,'pagination'])->name("record.repetitive_place.pagination")->middleware('admin-access:record,show,repetitive_place');
Route::get('/storeform/repetitive_place/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyRepetitive_PlaceController::class,'storeform'])->name("record.repetitive_place.storeform")->middleware('admin-access:record,store,repetitive_place');
Route::post('/store/repetitive_place/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyRepetitive_PlaceController::class,'store'])->name("record.repetitive_place.store")->middleware('admin-access:record,store,repetitive_place');
Route::get('/editform/repetitive_place/{id}', [\App\Http\Controllers\MyRepetitive_PlaceController::class,'editform'])->name("record.repetitive_place.editform")->middleware('admin-access:record,edit,repetitive_place');
Route::put('/update/repetitive_place/{id}', [\App\Http\Controllers\MyRepetitive_PlaceController::class,'edit'])->name("record.repetitive_place.edit")->middleware('admin-access:record,edit,repetitive_place');
Route::get('/destroy/repetitive_place/{id}', [\App\Http\Controllers\MyRepetitive_PlaceController::class,'destroy'])->name("record.repetitive_place.destroy")->middleware('admin-access:record,delete,repetitive_place');
Route::get('/sort/repetitive_place', [\App\Http\Controllers\MyRepetitive_PlaceController::class,'sort'])->name("record.repetitive_place.sort")->middleware('admin-access:record,store,repetitive_place');
Route::get('/export/repetitive_place/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyRepetitive_PlaceController::class,'export'])->name("record.repetitive_place.export")->middleware('admin-access:record,show,repetitive_place');
Route::get('/pdf/repetitive_place/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyRepetitive_PlaceController::class,'pdf'])->name("record.repetitive_place.pdf")->middleware('admin-access:record,show,repetitive_place');
Route::post('/import/repetitive_place/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyRepetitive_PlaceController::class,'import'])->name("record.repetitive_place.import")->middleware('admin-access:record,store,repetitive_place');





Route::get('records/voip',[\App\Http\Controllers\MyVoipController::class,'index'])->name("record.voip.index")->middleware('admin-access:record,show,voip');
Route::get('pagination/voip',[\App\Http\Controllers\MyVoipController::class,'pagination'])->name("record.voip.pagination")->middleware('admin-access:record,show,voip');
Route::get('/storeform/voip', [\App\Http\Controllers\MyVoipController::class,'storeform'])->name("record.voip.storeform")->middleware('admin-access:record,store,voip');
Route::post('/store/voip', [\App\Http\Controllers\MyVoipController::class,'store'])->name("record.voip.store")->middleware('admin-access:record,store,voip');
Route::get('/editform/voip/{id}', [\App\Http\Controllers\MyVoipController::class,'editform'])->name("record.voip.editform")->middleware('admin-access:record,edit,voip');
Route::put('/update/voip/{id}', [\App\Http\Controllers\MyVoipController::class,'edit'])->name("record.voip.edit")->middleware('admin-access:record,edit,voip');
Route::get('/destroy/voip/{id}', [\App\Http\Controllers\MyVoipController::class,'destroy'])->name("record.voip.destroy")->middleware('admin-access:record,delete,voip');
Route::get('/sort/voip', [\App\Http\Controllers\MyVoipController::class,'sort'])->name("record.voip.sort")->middleware('admin-access:record,store,voip');
Route::get('/export/voip',[\App\Http\Controllers\MyVoipController::class,'export'])->name("record.voip.export")->middleware('admin-access:record,show,voip');
Route::get('/pdf/voip',[\App\Http\Controllers\MyVoipController::class,'pdf'])->name("record.voip.pdf")->middleware('admin-access:record,show,voip');
Route::post('/import/voip',[\App\Http\Controllers\MyVoipController::class,'import'])->name("record.voip.import")->middleware('admin-access:record,store,voip');





Route::get('records/rate',[\App\Http\Controllers\MyRateController::class,'index'])->name("record.rate.index")->middleware('admin-access:record,show,rate');
Route::get('pagination/rate',[\App\Http\Controllers\MyRateController::class,'pagination'])->name("record.rate.pagination")->middleware('admin-access:record,show,rate');
Route::get('/storeform/rate', [\App\Http\Controllers\MyRateController::class,'storeform'])->name("record.rate.storeform")->middleware('admin-access:record,store,rate');
Route::post('/store/rate', [\App\Http\Controllers\MyRateController::class,'store'])->name("record.rate.store")->middleware('admin-access:record,store,rate');
Route::get('/editform/rate/{id}', [\App\Http\Controllers\MyRateController::class,'editform'])->name("record.rate.editform")->middleware('admin-access:record,edit,rate');
Route::put('/update/rate/{id}', [\App\Http\Controllers\MyRateController::class,'edit'])->name("record.rate.edit")->middleware('admin-access:record,edit,rate');
Route::get('/destroy/rate/{id}', [\App\Http\Controllers\MyRateController::class,'destroy'])->name("record.rate.destroy")->middleware('admin-access:record,delete,rate');
Route::get('/sort/rate', [\App\Http\Controllers\MyRateController::class,'sort'])->name("record.rate.sort")->middleware('admin-access:record,store,rate');
Route::get('/export/rate',[\App\Http\Controllers\MyRateController::class,'export'])->name("record.rate.export")->middleware('admin-access:record,show,rate');
Route::get('/pdf/rate',[\App\Http\Controllers\MyRateController::class,'pdf'])->name("record.rate.pdf")->middleware('admin-access:record,show,rate');
Route::post('/import/rate',[\App\Http\Controllers\MyRateController::class,'import'])->name("record.rate.import")->middleware('admin-access:record,store,rate');





Route::get('records/price_detail/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyPrice_DetailController::class,'index'])->name("record.price_detail.index")->middleware('admin-access:record,show,price_detail');
Route::get('pagination/price_detail/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyPrice_DetailController::class,'pagination'])->name("record.price_detail.pagination")->middleware('admin-access:record,show,price_detail');
Route::get('/storeform/price_detail/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyPrice_DetailController::class,'storeform'])->name("record.price_detail.storeform")->middleware('admin-access:record,store,price_detail');
Route::post('/store/price_detail/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyPrice_DetailController::class,'store'])->name("record.price_detail.store")->middleware('admin-access:record,store,price_detail');
Route::get('/editform/price_detail/{id}', [\App\Http\Controllers\MyPrice_DetailController::class,'editform'])->name("record.price_detail.editform")->middleware('admin-access:record,edit,price_detail');
Route::put('/update/price_detail/{id}', [\App\Http\Controllers\MyPrice_DetailController::class,'edit'])->name("record.price_detail.edit")->middleware('admin-access:record,edit,price_detail');
Route::get('/destroy/price_detail/{id}', [\App\Http\Controllers\MyPrice_DetailController::class,'destroy'])->name("record.price_detail.destroy")->middleware('admin-access:record,delete,price_detail');
Route::get('/sort/price_detail', [\App\Http\Controllers\MyPrice_DetailController::class,'sort'])->name("record.price_detail.sort")->middleware('admin-access:record,store,price_detail');
Route::get('/export/price_detail/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyPrice_DetailController::class,'export'])->name("record.price_detail.export")->middleware('admin-access:record,show,price_detail');
Route::get('/pdf/price_detail/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyPrice_DetailController::class,'pdf'])->name("record.price_detail.pdf")->middleware('admin-access:record,show,price_detail');
Route::post('/import/price_detail/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyPrice_DetailController::class,'import'])->name("record.price_detail.import")->middleware('admin-access:record,store,price_detail');





Route::get('records/support',[\App\Http\Controllers\MySupportController::class,'index'])->name("record.support.index")->middleware('admin-access:record,show,support');
Route::get('pagination/support',[\App\Http\Controllers\MySupportController::class,'pagination'])->name("record.support.pagination")->middleware('admin-access:record,show,support');
Route::get('/storeform/support', [\App\Http\Controllers\MySupportController::class,'storeform'])->name("record.support.storeform")->middleware('admin-access:record,store,support');
Route::post('/store/support', [\App\Http\Controllers\MySupportController::class,'store'])->name("record.support.store")->middleware('admin-access:record,store,support');
Route::get('/editform/support/{id}', [\App\Http\Controllers\MySupportController::class,'editform'])->name("record.support.editform")->middleware('admin-access:record,edit,support');
Route::put('/update/support/{id}', [\App\Http\Controllers\MySupportController::class,'edit'])->name("record.support.edit")->middleware('admin-access:record,edit,support');
Route::get('/destroy/support/{id}', [\App\Http\Controllers\MySupportController::class,'destroy'])->name("record.support.destroy")->middleware('admin-access:record,delete,support');
Route::get('/sort/support', [\App\Http\Controllers\MySupportController::class,'sort'])->name("record.support.sort")->middleware('admin-access:record,store,support');
Route::get('/export/support',[\App\Http\Controllers\MySupportController::class,'export'])->name("record.support.export")->middleware('admin-access:record,show,support');
Route::get('/pdf/support',[\App\Http\Controllers\MySupportController::class,'pdf'])->name("record.support.pdf")->middleware('admin-access:record,show,support');
Route::post('/import/support',[\App\Http\Controllers\MySupportController::class,'import'])->name("record.support.import")->middleware('admin-access:record,store,support');





Route::get('records/questions',[\App\Http\Controllers\MyQuestionsController::class,'index'])->name("record.questions.index")->middleware('admin-access:record,show,questions');
Route::get('pagination/questions',[\App\Http\Controllers\MyQuestionsController::class,'pagination'])->name("record.questions.pagination")->middleware('admin-access:record,show,questions');
Route::get('/storeform/questions', [\App\Http\Controllers\MyQuestionsController::class,'storeform'])->name("record.questions.storeform")->middleware('admin-access:record,store,questions');
Route::post('/store/questions', [\App\Http\Controllers\MyQuestionsController::class,'store'])->name("record.questions.store")->middleware('admin-access:record,store,questions');
Route::get('/editform/questions/{id}', [\App\Http\Controllers\MyQuestionsController::class,'editform'])->name("record.questions.editform")->middleware('admin-access:record,edit,questions');
Route::put('/update/questions/{id}', [\App\Http\Controllers\MyQuestionsController::class,'edit'])->name("record.questions.edit")->middleware('admin-access:record,edit,questions');
Route::get('/destroy/questions/{id}', [\App\Http\Controllers\MyQuestionsController::class,'destroy'])->name("record.questions.destroy")->middleware('admin-access:record,delete,questions');
Route::get('/sort/questions', [\App\Http\Controllers\MyQuestionsController::class,'sort'])->name("record.questions.sort")->middleware('admin-access:record,store,questions');
Route::get('/export/questions',[\App\Http\Controllers\MyQuestionsController::class,'export'])->name("record.questions.export")->middleware('admin-access:record,show,questions');
Route::get('/pdf/questions',[\App\Http\Controllers\MyQuestionsController::class,'pdf'])->name("record.questions.pdf")->middleware('admin-access:record,show,questions');
Route::post('/import/questions',[\App\Http\Controllers\MyQuestionsController::class,'import'])->name("record.questions.import")->middleware('admin-access:record,store,questions');





Route::get('records/terms_and_conditions',[\App\Http\Controllers\MyTerms_And_ConditionsController::class,'index'])->name("record.terms_and_conditions.index")->middleware('admin-access:record,show,terms_and_conditions');
Route::get('pagination/terms_and_conditions',[\App\Http\Controllers\MyTerms_And_ConditionsController::class,'pagination'])->name("record.terms_and_conditions.pagination")->middleware('admin-access:record,show,terms_and_conditions');
Route::get('/storeform/terms_and_conditions', [\App\Http\Controllers\MyTerms_And_ConditionsController::class,'storeform'])->name("record.terms_and_conditions.storeform")->middleware('admin-access:record,store,terms_and_conditions');
Route::post('/store/terms_and_conditions', [\App\Http\Controllers\MyTerms_And_ConditionsController::class,'store'])->name("record.terms_and_conditions.store")->middleware('admin-access:record,store,terms_and_conditions');
Route::get('/editform/terms_and_conditions/{id}', [\App\Http\Controllers\MyTerms_And_ConditionsController::class,'editform'])->name("record.terms_and_conditions.editform")->middleware('admin-access:record,edit,terms_and_conditions');
Route::put('/update/terms_and_conditions/{id}', [\App\Http\Controllers\MyTerms_And_ConditionsController::class,'edit'])->name("record.terms_and_conditions.edit")->middleware('admin-access:record,edit,terms_and_conditions');
Route::get('/destroy/terms_and_conditions/{id}', [\App\Http\Controllers\MyTerms_And_ConditionsController::class,'destroy'])->name("record.terms_and_conditions.destroy")->middleware('admin-access:record,delete,terms_and_conditions');
Route::get('/sort/terms_and_conditions', [\App\Http\Controllers\MyTerms_And_ConditionsController::class,'sort'])->name("record.terms_and_conditions.sort")->middleware('admin-access:record,store,terms_and_conditions');
Route::get('/export/terms_and_conditions',[\App\Http\Controllers\MyTerms_And_ConditionsController::class,'export'])->name("record.terms_and_conditions.export")->middleware('admin-access:record,show,terms_and_conditions');
Route::get('/pdf/terms_and_conditions',[\App\Http\Controllers\MyTerms_And_ConditionsController::class,'pdf'])->name("record.terms_and_conditions.pdf")->middleware('admin-access:record,show,terms_and_conditions');
Route::post('/import/terms_and_conditions',[\App\Http\Controllers\MyTerms_And_ConditionsController::class,'import'])->name("record.terms_and_conditions.import")->middleware('admin-access:record,store,terms_and_conditions');





Route::get('records/limit',[\App\Http\Controllers\MyLimitController::class,'index'])->name("record.limit.index")->middleware('admin-access:record,show,limit');
Route::get('pagination/limit',[\App\Http\Controllers\MyLimitController::class,'pagination'])->name("record.limit.pagination")->middleware('admin-access:record,show,limit');
Route::get('/storeform/limit', [\App\Http\Controllers\MyLimitController::class,'storeform'])->name("record.limit.storeform")->middleware('admin-access:record,store,limit');
Route::post('/store/limit', [\App\Http\Controllers\MyLimitController::class,'store'])->name("record.limit.store")->middleware('admin-access:record,store,limit');
Route::get('/editform/limit/{id}', [\App\Http\Controllers\MyLimitController::class,'editform'])->name("record.limit.editform")->middleware('admin-access:record,edit,limit');
Route::put('/update/limit/{id}', [\App\Http\Controllers\MyLimitController::class,'edit'])->name("record.limit.edit")->middleware('admin-access:record,edit,limit');
Route::get('/destroy/limit/{id}', [\App\Http\Controllers\MyLimitController::class,'destroy'])->name("record.limit.destroy")->middleware('admin-access:record,delete,limit');
Route::get('/sort/limit', [\App\Http\Controllers\MyLimitController::class,'sort'])->name("record.limit.sort")->middleware('admin-access:record,store,limit');
Route::get('/export/limit',[\App\Http\Controllers\MyLimitController::class,'export'])->name("record.limit.export")->middleware('admin-access:record,show,limit');
Route::get('/pdf/limit',[\App\Http\Controllers\MyLimitController::class,'pdf'])->name("record.limit.pdf")->middleware('admin-access:record,show,limit');
Route::post('/import/limit',[\App\Http\Controllers\MyLimitController::class,'import'])->name("record.limit.import")->middleware('admin-access:record,store,limit');





Route::get('records/test',[\App\Http\Controllers\MyTestController::class,'index'])->name("record.test.index")->middleware('admin-access:record,show,test');
Route::get('pagination/test',[\App\Http\Controllers\MyTestController::class,'pagination'])->name("record.test.pagination")->middleware('admin-access:record,show,test');
Route::get('/storeform/test', [\App\Http\Controllers\MyTestController::class,'storeform'])->name("record.test.storeform")->middleware('admin-access:record,store,test');
Route::post('/store/test', [\App\Http\Controllers\MyTestController::class,'store'])->name("record.test.store")->middleware('admin-access:record,store,test');
Route::get('/editform/test/{id}', [\App\Http\Controllers\MyTestController::class,'editform'])->name("record.test.editform")->middleware('admin-access:record,edit,test');
Route::put('/update/test/{id}', [\App\Http\Controllers\MyTestController::class,'edit'])->name("record.test.edit")->middleware('admin-access:record,edit,test');
Route::get('/destroy/test/{id}', [\App\Http\Controllers\MyTestController::class,'destroy'])->name("record.test.destroy")->middleware('admin-access:record,delete,test');
Route::get('/sort/test', [\App\Http\Controllers\MyTestController::class,'sort'])->name("record.test.sort")->middleware('admin-access:record,store,test');
Route::get('/export/test',[\App\Http\Controllers\MyTestController::class,'export'])->name("record.test.export")->middleware('admin-access:record,show,test');
Route::get('/pdf/test',[\App\Http\Controllers\MyTestController::class,'pdf'])->name("record.test.pdf")->middleware('admin-access:record,show,test');
Route::post('/import/test',[\App\Http\Controllers\MyTestController::class,'import'])->name("record.test.import")->middleware('admin-access:record,store,test');





Route::get('records/rate_user/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyRate_UserController::class,'index'])->name("record.rate_user.index")->middleware('admin-access:record,show,rate_user');
Route::get('pagination/rate_user/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyRate_UserController::class,'pagination'])->name("record.rate_user.pagination")->middleware('admin-access:record,show,rate_user');
Route::get('/storeform/rate_user/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyRate_UserController::class,'storeform'])->name("record.rate_user.storeform")->middleware('admin-access:record,store,rate_user');
Route::post('/store/rate_user/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyRate_UserController::class,'store'])->name("record.rate_user.store")->middleware('admin-access:record,store,rate_user');
Route::get('/editform/rate_user/{id}', [\App\Http\Controllers\MyRate_UserController::class,'editform'])->name("record.rate_user.editform")->middleware('admin-access:record,edit,rate_user');
Route::put('/update/rate_user/{id}', [\App\Http\Controllers\MyRate_UserController::class,'edit'])->name("record.rate_user.edit")->middleware('admin-access:record,edit,rate_user');
Route::get('/destroy/rate_user/{id}', [\App\Http\Controllers\MyRate_UserController::class,'destroy'])->name("record.rate_user.destroy")->middleware('admin-access:record,delete,rate_user');
Route::get('/sort/rate_user', [\App\Http\Controllers\MyRate_UserController::class,'sort'])->name("record.rate_user.sort")->middleware('admin-access:record,store,rate_user');
Route::get('/export/rate_user/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyRate_UserController::class,'export'])->name("record.rate_user.export")->middleware('admin-access:record,show,rate_user');
Route::get('/pdf/rate_user/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyRate_UserController::class,'pdf'])->name("record.rate_user.pdf")->middleware('admin-access:record,show,rate_user');
Route::post('/import/rate_user/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyRate_UserController::class,'import'])->name("record.rate_user.import")->middleware('admin-access:record,store,rate_user');





Route::get('records/condition_rate',[\App\Http\Controllers\MyCondition_RateController::class,'index'])->name("record.condition_rate.index")->middleware('admin-access:record,show,condition_rate');
Route::get('pagination/condition_rate',[\App\Http\Controllers\MyCondition_RateController::class,'pagination'])->name("record.condition_rate.pagination")->middleware('admin-access:record,show,condition_rate');
Route::get('/storeform/condition_rate', [\App\Http\Controllers\MyCondition_RateController::class,'storeform'])->name("record.condition_rate.storeform")->middleware('admin-access:record,store,condition_rate');
Route::post('/store/condition_rate', [\App\Http\Controllers\MyCondition_RateController::class,'store'])->name("record.condition_rate.store")->middleware('admin-access:record,store,condition_rate');
Route::get('/editform/condition_rate/{id}', [\App\Http\Controllers\MyCondition_RateController::class,'editform'])->name("record.condition_rate.editform")->middleware('admin-access:record,edit,condition_rate');
Route::put('/update/condition_rate/{id}', [\App\Http\Controllers\MyCondition_RateController::class,'edit'])->name("record.condition_rate.edit")->middleware('admin-access:record,edit,condition_rate');
Route::get('/destroy/condition_rate/{id}', [\App\Http\Controllers\MyCondition_RateController::class,'destroy'])->name("record.condition_rate.destroy")->middleware('admin-access:record,delete,condition_rate');
Route::get('/sort/condition_rate', [\App\Http\Controllers\MyCondition_RateController::class,'sort'])->name("record.condition_rate.sort")->middleware('admin-access:record,store,condition_rate');
Route::get('/export/condition_rate',[\App\Http\Controllers\MyCondition_RateController::class,'export'])->name("record.condition_rate.export")->middleware('admin-access:record,show,condition_rate');
Route::get('/pdf/condition_rate',[\App\Http\Controllers\MyCondition_RateController::class,'pdf'])->name("record.condition_rate.pdf")->middleware('admin-access:record,show,condition_rate');
Route::post('/import/condition_rate',[\App\Http\Controllers\MyCondition_RateController::class,'import'])->name("record.condition_rate.import")->middleware('admin-access:record,store,condition_rate');





Route::get('records/driver_agency',[\App\Http\Controllers\MyDriver_AgencyController::class,'index'])->name("record.driver_agency.index")->middleware('admin-access:record,show,driver_agency');
Route::get('pagination/driver_agency',[\App\Http\Controllers\MyDriver_AgencyController::class,'pagination'])->name("record.driver_agency.pagination")->middleware('admin-access:record,show,driver_agency');
Route::get('/storeform/driver_agency', [\App\Http\Controllers\MyDriver_AgencyController::class,'storeform'])->name("record.driver_agency.storeform")->middleware('admin-access:record,store,driver_agency');
Route::post('/store/driver_agency', [\App\Http\Controllers\MyDriver_AgencyController::class,'store'])->name("record.driver_agency.store")->middleware('admin-access:record,store,driver_agency');
Route::get('/editform/driver_agency/{id}', [\App\Http\Controllers\MyDriver_AgencyController::class,'editform'])->name("record.driver_agency.editform")->middleware('admin-access:record,edit,driver_agency');
Route::put('/update/driver_agency/{id}', [\App\Http\Controllers\MyDriver_AgencyController::class,'edit'])->name("record.driver_agency.edit")->middleware('admin-access:record,edit,driver_agency');
Route::get('/destroy/driver_agency/{id}', [\App\Http\Controllers\MyDriver_AgencyController::class,'destroy'])->name("record.driver_agency.destroy")->middleware('admin-access:record,delete,driver_agency');
Route::get('/sort/driver_agency', [\App\Http\Controllers\MyDriver_AgencyController::class,'sort'])->name("record.driver_agency.sort")->middleware('admin-access:record,store,driver_agency');
Route::get('/export/driver_agency',[\App\Http\Controllers\MyDriver_AgencyController::class,'export'])->name("record.driver_agency.export")->middleware('admin-access:record,show,driver_agency');
Route::get('/pdf/driver_agency',[\App\Http\Controllers\MyDriver_AgencyController::class,'pdf'])->name("record.driver_agency.pdf")->middleware('admin-access:record,show,driver_agency');
Route::post('/import/driver_agency',[\App\Http\Controllers\MyDriver_AgencyController::class,'import'])->name("record.driver_agency.import")->middleware('admin-access:record,store,driver_agency');





Route::get('records/accepted_order',[\App\Http\Controllers\MyAccepted_OrderController::class,'index'])->name("record.accepted_order.index")->middleware('admin-access:record,show,accepted_order');
Route::get('pagination/accepted_order',[\App\Http\Controllers\MyAccepted_OrderController::class,'pagination'])->name("record.accepted_order.pagination")->middleware('admin-access:record,show,accepted_order');
Route::get('/storeform/accepted_order', [\App\Http\Controllers\MyAccepted_OrderController::class,'storeform'])->name("record.accepted_order.storeform")->middleware('admin-access:record,store,accepted_order');
Route::post('/store/accepted_order', [\App\Http\Controllers\MyAccepted_OrderController::class,'store'])->name("record.accepted_order.store")->middleware('admin-access:record,store,accepted_order');
Route::get('/editform/accepted_order/{id}', [\App\Http\Controllers\MyAccepted_OrderController::class,'editform'])->name("record.accepted_order.editform")->middleware('admin-access:record,edit,accepted_order');
Route::put('/update/accepted_order/{id}', [\App\Http\Controllers\MyAccepted_OrderController::class,'edit'])->name("record.accepted_order.edit")->middleware('admin-access:record,edit,accepted_order');
Route::get('/destroy/accepted_order/{id}', [\App\Http\Controllers\MyAccepted_OrderController::class,'destroy'])->name("record.accepted_order.destroy")->middleware('admin-access:record,delete,accepted_order');
Route::get('/sort/accepted_order', [\App\Http\Controllers\MyAccepted_OrderController::class,'sort'])->name("record.accepted_order.sort")->middleware('admin-access:record,store,accepted_order');
Route::get('/export/accepted_order',[\App\Http\Controllers\MyAccepted_OrderController::class,'export'])->name("record.accepted_order.export")->middleware('admin-access:record,show,accepted_order');
Route::get('/pdf/accepted_order',[\App\Http\Controllers\MyAccepted_OrderController::class,'pdf'])->name("record.accepted_order.pdf")->middleware('admin-access:record,show,accepted_order');
Route::post('/import/accepted_order',[\App\Http\Controllers\MyAccepted_OrderController::class,'import'])->name("record.accepted_order.import")->middleware('admin-access:record,store,accepted_order');





Route::get('records/rejected_order',[\App\Http\Controllers\MyRejected_OrderController::class,'index'])->name("record.rejected_order.index")->middleware('admin-access:record,show,rejected_order');
Route::get('pagination/rejected_order',[\App\Http\Controllers\MyRejected_OrderController::class,'pagination'])->name("record.rejected_order.pagination")->middleware('admin-access:record,show,rejected_order');
Route::get('/storeform/rejected_order', [\App\Http\Controllers\MyRejected_OrderController::class,'storeform'])->name("record.rejected_order.storeform")->middleware('admin-access:record,store,rejected_order');
Route::post('/store/rejected_order', [\App\Http\Controllers\MyRejected_OrderController::class,'store'])->name("record.rejected_order.store")->middleware('admin-access:record,store,rejected_order');
Route::get('/editform/rejected_order/{id}', [\App\Http\Controllers\MyRejected_OrderController::class,'editform'])->name("record.rejected_order.editform")->middleware('admin-access:record,edit,rejected_order');
Route::put('/update/rejected_order/{id}', [\App\Http\Controllers\MyRejected_OrderController::class,'edit'])->name("record.rejected_order.edit")->middleware('admin-access:record,edit,rejected_order');
Route::get('/destroy/rejected_order/{id}', [\App\Http\Controllers\MyRejected_OrderController::class,'destroy'])->name("record.rejected_order.destroy")->middleware('admin-access:record,delete,rejected_order');
Route::get('/sort/rejected_order', [\App\Http\Controllers\MyRejected_OrderController::class,'sort'])->name("record.rejected_order.sort")->middleware('admin-access:record,store,rejected_order');
Route::get('/export/rejected_order',[\App\Http\Controllers\MyRejected_OrderController::class,'export'])->name("record.rejected_order.export")->middleware('admin-access:record,show,rejected_order');
Route::get('/pdf/rejected_order',[\App\Http\Controllers\MyRejected_OrderController::class,'pdf'])->name("record.rejected_order.pdf")->middleware('admin-access:record,show,rejected_order');
Route::post('/import/rejected_order',[\App\Http\Controllers\MyRejected_OrderController::class,'import'])->name("record.rejected_order.import")->middleware('admin-access:record,store,rejected_order');





Route::get('records/financial_report_agency',[\App\Http\Controllers\MyFinancial_Report_AgencyController::class,'index'])->name("record.financial_report_agency.index")->middleware('admin-access:record,show,financial_report_agency');
Route::get('pagination/financial_report_agency',[\App\Http\Controllers\MyFinancial_Report_AgencyController::class,'pagination'])->name("record.financial_report_agency.pagination")->middleware('admin-access:record,show,financial_report_agency');
Route::get('/storeform/financial_report_agency', [\App\Http\Controllers\MyFinancial_Report_AgencyController::class,'storeform'])->name("record.financial_report_agency.storeform")->middleware('admin-access:record,store,financial_report_agency');
Route::post('/store/financial_report_agency', [\App\Http\Controllers\MyFinancial_Report_AgencyController::class,'store'])->name("record.financial_report_agency.store")->middleware('admin-access:record,store,financial_report_agency');
Route::get('/editform/financial_report_agency/{id}', [\App\Http\Controllers\MyFinancial_Report_AgencyController::class,'editform'])->name("record.financial_report_agency.editform")->middleware('admin-access:record,edit,financial_report_agency');
Route::put('/update/financial_report_agency/{id}', [\App\Http\Controllers\MyFinancial_Report_AgencyController::class,'edit'])->name("record.financial_report_agency.edit")->middleware('admin-access:record,edit,financial_report_agency');
Route::get('/destroy/financial_report_agency/{id}', [\App\Http\Controllers\MyFinancial_Report_AgencyController::class,'destroy'])->name("record.financial_report_agency.destroy")->middleware('admin-access:record,delete,financial_report_agency');
Route::get('/sort/financial_report_agency', [\App\Http\Controllers\MyFinancial_Report_AgencyController::class,'sort'])->name("record.financial_report_agency.sort")->middleware('admin-access:record,store,financial_report_agency');
Route::get('/export/financial_report_agency',[\App\Http\Controllers\MyFinancial_Report_AgencyController::class,'export'])->name("record.financial_report_agency.export")->middleware('admin-access:record,show,financial_report_agency');
Route::get('/pdf/financial_report_agency',[\App\Http\Controllers\MyFinancial_Report_AgencyController::class,'pdf'])->name("record.financial_report_agency.pdf")->middleware('admin-access:record,show,financial_report_agency');
Route::post('/import/financial_report_agency',[\App\Http\Controllers\MyFinancial_Report_AgencyController::class,'import'])->name("record.financial_report_agency.import")->middleware('admin-access:record,store,financial_report_agency');





Route::get('records/request_order',[\App\Http\Controllers\MyRequest_OrderController::class,'index'])->name("record.request_order.index")->middleware('admin-access:record,show,request_order');
Route::get('pagination/request_order',[\App\Http\Controllers\MyRequest_OrderController::class,'pagination'])->name("record.request_order.pagination")->middleware('admin-access:record,show,request_order');
Route::get('/storeform/request_order', [\App\Http\Controllers\MyRequest_OrderController::class,'storeform'])->name("record.request_order.storeform")->middleware('admin-access:record,store,request_order');
Route::post('/store/request_order', [\App\Http\Controllers\MyRequest_OrderController::class,'store'])->name("record.request_order.store")->middleware('admin-access:record,store,request_order');
Route::get('/editform/request_order/{id}', [\App\Http\Controllers\MyRequest_OrderController::class,'editform'])->name("record.request_order.editform")->middleware('admin-access:record,edit,request_order');
Route::put('/update/request_order/{id}', [\App\Http\Controllers\MyRequest_OrderController::class,'edit'])->name("record.request_order.edit")->middleware('admin-access:record,edit,request_order');
Route::get('/destroy/request_order/{id}', [\App\Http\Controllers\MyRequest_OrderController::class,'destroy'])->name("record.request_order.destroy")->middleware('admin-access:record,delete,request_order');
Route::get('/sort/request_order', [\App\Http\Controllers\MyRequest_OrderController::class,'sort'])->name("record.request_order.sort")->middleware('admin-access:record,store,request_order');
Route::get('/export/request_order',[\App\Http\Controllers\MyRequest_OrderController::class,'export'])->name("record.request_order.export")->middleware('admin-access:record,show,request_order');
Route::get('/pdf/request_order',[\App\Http\Controllers\MyRequest_OrderController::class,'pdf'])->name("record.request_order.pdf")->middleware('admin-access:record,show,request_order');
Route::post('/import/request_order',[\App\Http\Controllers\MyRequest_OrderController::class,'import'])->name("record.request_order.import")->middleware('admin-access:record,store,request_order');





Route::get('records/discount_order/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyDiscount_OrderController::class,'index'])->name("record.discount_order.index")->middleware('admin-access:record,show,discount_order');
Route::get('pagination/discount_order/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyDiscount_OrderController::class,'pagination'])->name("record.discount_order.pagination")->middleware('admin-access:record,show,discount_order');
Route::get('/storeform/discount_order/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyDiscount_OrderController::class,'storeform'])->name("record.discount_order.storeform")->middleware('admin-access:record,store,discount_order');
Route::post('/store/discount_order/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyDiscount_OrderController::class,'store'])->name("record.discount_order.store")->middleware('admin-access:record,store,discount_order');
Route::get('/editform/discount_order/{id}', [\App\Http\Controllers\MyDiscount_OrderController::class,'editform'])->name("record.discount_order.editform")->middleware('admin-access:record,edit,discount_order');
Route::put('/update/discount_order/{id}', [\App\Http\Controllers\MyDiscount_OrderController::class,'edit'])->name("record.discount_order.edit")->middleware('admin-access:record,edit,discount_order');
Route::get('/destroy/discount_order/{id}', [\App\Http\Controllers\MyDiscount_OrderController::class,'destroy'])->name("record.discount_order.destroy")->middleware('admin-access:record,delete,discount_order');
Route::get('/sort/discount_order', [\App\Http\Controllers\MyDiscount_OrderController::class,'sort'])->name("record.discount_order.sort")->middleware('admin-access:record,store,discount_order');
Route::get('/export/discount_order/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyDiscount_OrderController::class,'export'])->name("record.discount_order.export")->middleware('admin-access:record,show,discount_order');
Route::get('/pdf/discount_order/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyDiscount_OrderController::class,'pdf'])->name("record.discount_order.pdf")->middleware('admin-access:record,show,discount_order');
Route::post('/import/discount_order/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyDiscount_OrderController::class,'import'])->name("record.discount_order.import")->middleware('admin-access:record,store,discount_order');





Route::get('records/generate_code',[\App\Http\Controllers\MyGenerate_CodeController::class,'index'])->name("record.generate_code.index")->middleware('admin-access:record,show,generate_code');
Route::get('pagination/generate_code',[\App\Http\Controllers\MyGenerate_CodeController::class,'pagination'])->name("record.generate_code.pagination")->middleware('admin-access:record,show,generate_code');
Route::get('/storeform/generate_code', [\App\Http\Controllers\MyGenerate_CodeController::class,'storeform'])->name("record.generate_code.storeform")->middleware('admin-access:record,store,generate_code');
Route::post('/store/generate_code', [\App\Http\Controllers\MyGenerate_CodeController::class,'store'])->name("record.generate_code.store")->middleware('admin-access:record,store,generate_code');
Route::get('/editform/generate_code/{id}', [\App\Http\Controllers\MyGenerate_CodeController::class,'editform'])->name("record.generate_code.editform")->middleware('admin-access:record,edit,generate_code');
Route::put('/update/generate_code/{id}', [\App\Http\Controllers\MyGenerate_CodeController::class,'edit'])->name("record.generate_code.edit")->middleware('admin-access:record,edit,generate_code');
Route::get('/destroy/generate_code/{id}', [\App\Http\Controllers\MyGenerate_CodeController::class,'destroy'])->name("record.generate_code.destroy")->middleware('admin-access:record,delete,generate_code');
Route::get('/sort/generate_code', [\App\Http\Controllers\MyGenerate_CodeController::class,'sort'])->name("record.generate_code.sort")->middleware('admin-access:record,store,generate_code');
Route::get('/export/generate_code',[\App\Http\Controllers\MyGenerate_CodeController::class,'export'])->name("record.generate_code.export")->middleware('admin-access:record,show,generate_code');
Route::get('/pdf/generate_code',[\App\Http\Controllers\MyGenerate_CodeController::class,'pdf'])->name("record.generate_code.pdf")->middleware('admin-access:record,show,generate_code');
Route::post('/import/generate_code',[\App\Http\Controllers\MyGenerate_CodeController::class,'import'])->name("record.generate_code.import")->middleware('admin-access:record,store,generate_code');





Route::get('records/info_code/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyInfo_CodeController::class,'index'])->name("record.info_code.index")->middleware('admin-access:record,show,info_code');
Route::get('pagination/info_code/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyInfo_CodeController::class,'pagination'])->name("record.info_code.pagination")->middleware('admin-access:record,show,info_code');
Route::get('/storeform/info_code/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyInfo_CodeController::class,'storeform'])->name("record.info_code.storeform")->middleware('admin-access:record,store,info_code');
Route::post('/store/info_code/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyInfo_CodeController::class,'store'])->name("record.info_code.store")->middleware('admin-access:record,store,info_code');
Route::get('/editform/info_code/{id}', [\App\Http\Controllers\MyInfo_CodeController::class,'editform'])->name("record.info_code.editform")->middleware('admin-access:record,edit,info_code');
Route::put('/update/info_code/{id}', [\App\Http\Controllers\MyInfo_CodeController::class,'edit'])->name("record.info_code.edit")->middleware('admin-access:record,edit,info_code');
Route::get('/destroy/info_code/{id}', [\App\Http\Controllers\MyInfo_CodeController::class,'destroy'])->name("record.info_code.destroy")->middleware('admin-access:record,delete,info_code');
Route::get('/sort/info_code', [\App\Http\Controllers\MyInfo_CodeController::class,'sort'])->name("record.info_code.sort")->middleware('admin-access:record,store,info_code');
Route::get('/export/info_code/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyInfo_CodeController::class,'export'])->name("record.info_code.export")->middleware('admin-access:record,show,info_code');
Route::get('/pdf/info_code/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyInfo_CodeController::class,'pdf'])->name("record.info_code.pdf")->middleware('admin-access:record,show,info_code');
Route::post('/import/info_code/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyInfo_CodeController::class,'import'])->name("record.info_code.import")->middleware('admin-access:record,store,info_code');
Route::get('/active/info_code/used/{id}', [\App\Http\Controllers\MyInfo_CodeController::class,'usedActive'])->name("record.info_code.used")->middleware('admin-access:record,edit,info_code');





Route::get('records/account_check',[\App\Http\Controllers\MyAccount_CheckController::class,'index'])->name("record.account_check.index")->middleware('admin-access:record,show,account_check');
Route::get('pagination/account_check',[\App\Http\Controllers\MyAccount_CheckController::class,'pagination'])->name("record.account_check.pagination")->middleware('admin-access:record,show,account_check');
Route::get('/storeform/account_check', [\App\Http\Controllers\MyAccount_CheckController::class,'storeform'])->name("record.account_check.storeform")->middleware('admin-access:record,store,account_check');
Route::post('/store/account_check', [\App\Http\Controllers\MyAccount_CheckController::class,'store'])->name("record.account_check.store")->middleware('admin-access:record,store,account_check');
Route::get('/editform/account_check/{id}', [\App\Http\Controllers\MyAccount_CheckController::class,'editform'])->name("record.account_check.editform")->middleware('admin-access:record,edit,account_check');
Route::put('/update/account_check/{id}', [\App\Http\Controllers\MyAccount_CheckController::class,'edit'])->name("record.account_check.edit")->middleware('admin-access:record,edit,account_check');
Route::get('/destroy/account_check/{id}', [\App\Http\Controllers\MyAccount_CheckController::class,'destroy'])->name("record.account_check.destroy")->middleware('admin-access:record,delete,account_check');
Route::get('/sort/account_check', [\App\Http\Controllers\MyAccount_CheckController::class,'sort'])->name("record.account_check.sort")->middleware('admin-access:record,store,account_check');
Route::get('/export/account_check',[\App\Http\Controllers\MyAccount_CheckController::class,'export'])->name("record.account_check.export")->middleware('admin-access:record,show,account_check');
Route::get('/pdf/account_check',[\App\Http\Controllers\MyAccount_CheckController::class,'pdf'])->name("record.account_check.pdf")->middleware('admin-access:record,show,account_check');
Route::post('/import/account_check',[\App\Http\Controllers\MyAccount_CheckController::class,'import'])->name("record.account_check.import")->middleware('admin-access:record,store,account_check');





Route::get('records/generate_code_driver',[\App\Http\Controllers\MyGenerate_Code_DriverController::class,'index'])->name("record.generate_code_driver.index")->middleware('admin-access:record,show,generate_code_driver');
Route::get('pagination/generate_code_driver',[\App\Http\Controllers\MyGenerate_Code_DriverController::class,'pagination'])->name("record.generate_code_driver.pagination")->middleware('admin-access:record,show,generate_code_driver');
Route::get('/storeform/generate_code_driver', [\App\Http\Controllers\MyGenerate_Code_DriverController::class,'storeform'])->name("record.generate_code_driver.storeform")->middleware('admin-access:record,store,generate_code_driver');
Route::post('/store/generate_code_driver', [\App\Http\Controllers\MyGenerate_Code_DriverController::class,'store'])->name("record.generate_code_driver.store")->middleware('admin-access:record,store,generate_code_driver');
Route::get('/editform/generate_code_driver/{id}', [\App\Http\Controllers\MyGenerate_Code_DriverController::class,'editform'])->name("record.generate_code_driver.editform")->middleware('admin-access:record,edit,generate_code_driver');
Route::put('/update/generate_code_driver/{id}', [\App\Http\Controllers\MyGenerate_Code_DriverController::class,'edit'])->name("record.generate_code_driver.edit")->middleware('admin-access:record,edit,generate_code_driver');
Route::get('/destroy/generate_code_driver/{id}', [\App\Http\Controllers\MyGenerate_Code_DriverController::class,'destroy'])->name("record.generate_code_driver.destroy")->middleware('admin-access:record,delete,generate_code_driver');
Route::get('/sort/generate_code_driver', [\App\Http\Controllers\MyGenerate_Code_DriverController::class,'sort'])->name("record.generate_code_driver.sort")->middleware('admin-access:record,store,generate_code_driver');
Route::get('/export/generate_code_driver',[\App\Http\Controllers\MyGenerate_Code_DriverController::class,'export'])->name("record.generate_code_driver.export")->middleware('admin-access:record,show,generate_code_driver');
Route::get('/pdf/generate_code_driver',[\App\Http\Controllers\MyGenerate_Code_DriverController::class,'pdf'])->name("record.generate_code_driver.pdf")->middleware('admin-access:record,show,generate_code_driver');
Route::post('/import/generate_code_driver',[\App\Http\Controllers\MyGenerate_Code_DriverController::class,'import'])->name("record.generate_code_driver.import")->middleware('admin-access:record,store,generate_code_driver');





Route::get('records/info_code_driver/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyInfo_Code_DriverController::class,'index'])->name("record.info_code_driver.index")->middleware('admin-access:record,show,info_code_driver');
Route::get('pagination/info_code_driver/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyInfo_Code_DriverController::class,'pagination'])->name("record.info_code_driver.pagination")->middleware('admin-access:record,show,info_code_driver');
Route::get('/storeform/info_code_driver/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyInfo_Code_DriverController::class,'storeform'])->name("record.info_code_driver.storeform")->middleware('admin-access:record,store,info_code_driver');
Route::post('/store/info_code_driver/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyInfo_Code_DriverController::class,'store'])->name("record.info_code_driver.store")->middleware('admin-access:record,store,info_code_driver');
Route::get('/editform/info_code_driver/{id}', [\App\Http\Controllers\MyInfo_Code_DriverController::class,'editform'])->name("record.info_code_driver.editform")->middleware('admin-access:record,edit,info_code_driver');
Route::put('/update/info_code_driver/{id}', [\App\Http\Controllers\MyInfo_Code_DriverController::class,'edit'])->name("record.info_code_driver.edit")->middleware('admin-access:record,edit,info_code_driver');
Route::get('/destroy/info_code_driver/{id}', [\App\Http\Controllers\MyInfo_Code_DriverController::class,'destroy'])->name("record.info_code_driver.destroy")->middleware('admin-access:record,delete,info_code_driver');
Route::get('/sort/info_code_driver', [\App\Http\Controllers\MyInfo_Code_DriverController::class,'sort'])->name("record.info_code_driver.sort")->middleware('admin-access:record,store,info_code_driver');
Route::get('/export/info_code_driver/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyInfo_Code_DriverController::class,'export'])->name("record.info_code_driver.export")->middleware('admin-access:record,show,info_code_driver');
Route::get('/pdf/info_code_driver/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyInfo_Code_DriverController::class,'pdf'])->name("record.info_code_driver.pdf")->middleware('admin-access:record,show,info_code_driver');
Route::post('/import/info_code_driver/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyInfo_Code_DriverController::class,'import'])->name("record.info_code_driver.import")->middleware('admin-access:record,store,info_code_driver');
Route::get('/active/info_code_driver/used/{id}', [\App\Http\Controllers\MyInfo_Code_DriverController::class,'usedActive'])->name("record.info_code_driver.used")->middleware('admin-access:record,edit,info_code_driver');





Route::get('records/minimum_price_driver',[\App\Http\Controllers\MyMinimum_Price_DriverController::class,'index'])->name("record.minimum_price_driver.index")->middleware('admin-access:record,show,minimum_price_driver');
Route::get('pagination/minimum_price_driver',[\App\Http\Controllers\MyMinimum_Price_DriverController::class,'pagination'])->name("record.minimum_price_driver.pagination")->middleware('admin-access:record,show,minimum_price_driver');
Route::get('/storeform/minimum_price_driver', [\App\Http\Controllers\MyMinimum_Price_DriverController::class,'storeform'])->name("record.minimum_price_driver.storeform")->middleware('admin-access:record,store,minimum_price_driver');
Route::post('/store/minimum_price_driver', [\App\Http\Controllers\MyMinimum_Price_DriverController::class,'store'])->name("record.minimum_price_driver.store")->middleware('admin-access:record,store,minimum_price_driver');
Route::get('/editform/minimum_price_driver/{id}', [\App\Http\Controllers\MyMinimum_Price_DriverController::class,'editform'])->name("record.minimum_price_driver.editform")->middleware('admin-access:record,edit,minimum_price_driver');
Route::put('/update/minimum_price_driver/{id}', [\App\Http\Controllers\MyMinimum_Price_DriverController::class,'edit'])->name("record.minimum_price_driver.edit")->middleware('admin-access:record,edit,minimum_price_driver');
Route::get('/destroy/minimum_price_driver/{id}', [\App\Http\Controllers\MyMinimum_Price_DriverController::class,'destroy'])->name("record.minimum_price_driver.destroy")->middleware('admin-access:record,delete,minimum_price_driver');
Route::get('/sort/minimum_price_driver', [\App\Http\Controllers\MyMinimum_Price_DriverController::class,'sort'])->name("record.minimum_price_driver.sort")->middleware('admin-access:record,store,minimum_price_driver');
Route::get('/export/minimum_price_driver',[\App\Http\Controllers\MyMinimum_Price_DriverController::class,'export'])->name("record.minimum_price_driver.export")->middleware('admin-access:record,show,minimum_price_driver');
Route::get('/pdf/minimum_price_driver',[\App\Http\Controllers\MyMinimum_Price_DriverController::class,'pdf'])->name("record.minimum_price_driver.pdf")->middleware('admin-access:record,show,minimum_price_driver');
Route::post('/import/minimum_price_driver',[\App\Http\Controllers\MyMinimum_Price_DriverController::class,'import'])->name("record.minimum_price_driver.import")->middleware('admin-access:record,store,minimum_price_driver');





Route::get('records/service_place_repitive',[\App\Http\Controllers\MyService_Place_RepitiveController::class,'index'])->name("record.service_place_repitive.index")->middleware('admin-access:record,show,service_place_repitive');
Route::get('pagination/service_place_repitive',[\App\Http\Controllers\MyService_Place_RepitiveController::class,'pagination'])->name("record.service_place_repitive.pagination")->middleware('admin-access:record,show,service_place_repitive');
Route::get('/storeform/service_place_repitive', [\App\Http\Controllers\MyService_Place_RepitiveController::class,'storeform'])->name("record.service_place_repitive.storeform")->middleware('admin-access:record,store,service_place_repitive');
Route::post('/store/service_place_repitive', [\App\Http\Controllers\MyService_Place_RepitiveController::class,'store'])->name("record.service_place_repitive.store")->middleware('admin-access:record,store,service_place_repitive');
Route::get('/editform/service_place_repitive/{id}', [\App\Http\Controllers\MyService_Place_RepitiveController::class,'editform'])->name("record.service_place_repitive.editform")->middleware('admin-access:record,edit,service_place_repitive');
Route::put('/update/service_place_repitive/{id}', [\App\Http\Controllers\MyService_Place_RepitiveController::class,'edit'])->name("record.service_place_repitive.edit")->middleware('admin-access:record,edit,service_place_repitive');
Route::get('/destroy/service_place_repitive/{id}', [\App\Http\Controllers\MyService_Place_RepitiveController::class,'destroy'])->name("record.service_place_repitive.destroy")->middleware('admin-access:record,delete,service_place_repitive');
Route::get('/sort/service_place_repitive', [\App\Http\Controllers\MyService_Place_RepitiveController::class,'sort'])->name("record.service_place_repitive.sort")->middleware('admin-access:record,store,service_place_repitive');
Route::get('/export/service_place_repitive',[\App\Http\Controllers\MyService_Place_RepitiveController::class,'export'])->name("record.service_place_repitive.export")->middleware('admin-access:record,show,service_place_repitive');
Route::get('/pdf/service_place_repitive',[\App\Http\Controllers\MyService_Place_RepitiveController::class,'pdf'])->name("record.service_place_repitive.pdf")->middleware('admin-access:record,show,service_place_repitive');
Route::post('/import/service_place_repitive',[\App\Http\Controllers\MyService_Place_RepitiveController::class,'import'])->name("record.service_place_repitive.import")->middleware('admin-access:record,store,service_place_repitive');





Route::get('records/drivers_send/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyDrivers_SendController::class,'index'])->name("record.drivers_send.index")->middleware('admin-access:record,show,drivers_send');
Route::get('pagination/drivers_send/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyDrivers_SendController::class,'pagination'])->name("record.drivers_send.pagination")->middleware('admin-access:record,show,drivers_send');
Route::get('/storeform/drivers_send/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyDrivers_SendController::class,'storeform'])->name("record.drivers_send.storeform")->middleware('admin-access:record,store,drivers_send');
Route::post('/store/drivers_send/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyDrivers_SendController::class,'store'])->name("record.drivers_send.store")->middleware('admin-access:record,store,drivers_send');
Route::get('/editform/drivers_send/{id}', [\App\Http\Controllers\MyDrivers_SendController::class,'editform'])->name("record.drivers_send.editform")->middleware('admin-access:record,edit,drivers_send');
Route::put('/update/drivers_send/{id}', [\App\Http\Controllers\MyDrivers_SendController::class,'edit'])->name("record.drivers_send.edit")->middleware('admin-access:record,edit,drivers_send');
Route::get('/destroy/drivers_send/{id}', [\App\Http\Controllers\MyDrivers_SendController::class,'destroy'])->name("record.drivers_send.destroy")->middleware('admin-access:record,delete,drivers_send');
Route::get('/sort/drivers_send', [\App\Http\Controllers\MyDrivers_SendController::class,'sort'])->name("record.drivers_send.sort")->middleware('admin-access:record,store,drivers_send');
Route::get('/export/drivers_send/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyDrivers_SendController::class,'export'])->name("record.drivers_send.export")->middleware('admin-access:record,show,drivers_send');
Route::get('/pdf/drivers_send/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyDrivers_SendController::class,'pdf'])->name("record.drivers_send.pdf")->middleware('admin-access:record,show,drivers_send');
Route::post('/import/drivers_send/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyDrivers_SendController::class,'import'])->name("record.drivers_send.import")->middleware('admin-access:record,store,drivers_send');





Route::get('records/message/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyMessageController::class,'index'])->name("record.message.index")->middleware('admin-access:record,show,message');
Route::get('pagination/message/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyMessageController::class,'pagination'])->name("record.message.pagination")->middleware('admin-access:record,show,message');
Route::get('/storeform/message/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyMessageController::class,'storeform'])->name("record.message.storeform")->middleware('admin-access:record,store,message');
Route::post('/store/message/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyMessageController::class,'store'])->name("record.message.store")->middleware('admin-access:record,store,message');
Route::get('/editform/message/{id}', [\App\Http\Controllers\MyMessageController::class,'editform'])->name("record.message.editform")->middleware('admin-access:record,edit,message');
Route::put('/update/message/{id}', [\App\Http\Controllers\MyMessageController::class,'edit'])->name("record.message.edit")->middleware('admin-access:record,edit,message');
Route::get('/destroy/message/{id}', [\App\Http\Controllers\MyMessageController::class,'destroy'])->name("record.message.destroy")->middleware('admin-access:record,delete,message');
Route::get('/sort/message', [\App\Http\Controllers\MyMessageController::class,'sort'])->name("record.message.sort")->middleware('admin-access:record,store,message');
Route::get('/export/message/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyMessageController::class,'export'])->name("record.message.export")->middleware('admin-access:record,show,message');
Route::get('/pdf/message/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyMessageController::class,'pdf'])->name("record.message.pdf")->middleware('admin-access:record,show,message');
Route::post('/import/message/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyMessageController::class,'import'])->name("record.message.import")->middleware('admin-access:record,store,message');
Route::get('/active/message/user_sent/{id}', [\App\Http\Controllers\MyMessageController::class,'user_sentActive'])->name("record.message.user_sent")->middleware('admin-access:record,edit,message');
Route::get('/active/message/driver_sent/{id}', [\App\Http\Controllers\MyMessageController::class,'driver_sentActive'])->name("record.message.driver_sent")->middleware('admin-access:record,edit,message');





Route::get('records/taxi_options/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyTaxi_OptionsController::class,'index'])->name("record.taxi_options.index")->middleware('admin-access:record,show,taxi_options');
Route::get('pagination/taxi_options/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyTaxi_OptionsController::class,'pagination'])->name("record.taxi_options.pagination")->middleware('admin-access:record,show,taxi_options');
Route::get('/storeform/taxi_options/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyTaxi_OptionsController::class,'storeform'])->name("record.taxi_options.storeform")->middleware('admin-access:record,store,taxi_options');
Route::post('/store/taxi_options/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyTaxi_OptionsController::class,'store'])->name("record.taxi_options.store")->middleware('admin-access:record,store,taxi_options');
Route::get('/editform/taxi_options/{id}', [\App\Http\Controllers\MyTaxi_OptionsController::class,'editform'])->name("record.taxi_options.editform")->middleware('admin-access:record,edit,taxi_options');
Route::put('/update/taxi_options/{id}', [\App\Http\Controllers\MyTaxi_OptionsController::class,'edit'])->name("record.taxi_options.edit")->middleware('admin-access:record,edit,taxi_options');
Route::get('/destroy/taxi_options/{id}', [\App\Http\Controllers\MyTaxi_OptionsController::class,'destroy'])->name("record.taxi_options.destroy")->middleware('admin-access:record,delete,taxi_options');
Route::get('/sort/taxi_options', [\App\Http\Controllers\MyTaxi_OptionsController::class,'sort'])->name("record.taxi_options.sort")->middleware('admin-access:record,store,taxi_options');
Route::get('/export/taxi_options/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyTaxi_OptionsController::class,'export'])->name("record.taxi_options.export")->middleware('admin-access:record,show,taxi_options');
Route::get('/pdf/taxi_options/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyTaxi_OptionsController::class,'pdf'])->name("record.taxi_options.pdf")->middleware('admin-access:record,show,taxi_options');
Route::post('/import/taxi_options/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyTaxi_OptionsController::class,'import'])->name("record.taxi_options.import")->middleware('admin-access:record,store,taxi_options');





Route::get('records/stop_without_driver/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyStop_Without_DriverController::class,'index'])->name("record.stop_without_driver.index")->middleware('admin-access:record,show,stop_without_driver');
Route::get('pagination/stop_without_driver/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyStop_Without_DriverController::class,'pagination'])->name("record.stop_without_driver.pagination")->middleware('admin-access:record,show,stop_without_driver');
Route::get('/storeform/stop_without_driver/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyStop_Without_DriverController::class,'storeform'])->name("record.stop_without_driver.storeform")->middleware('admin-access:record,store,stop_without_driver');
Route::post('/store/stop_without_driver/{parentSlug?}/{parentId?}', [\App\Http\Controllers\MyStop_Without_DriverController::class,'store'])->name("record.stop_without_driver.store")->middleware('admin-access:record,store,stop_without_driver');
Route::get('/editform/stop_without_driver/{id}', [\App\Http\Controllers\MyStop_Without_DriverController::class,'editform'])->name("record.stop_without_driver.editform")->middleware('admin-access:record,edit,stop_without_driver');
Route::put('/update/stop_without_driver/{id}', [\App\Http\Controllers\MyStop_Without_DriverController::class,'edit'])->name("record.stop_without_driver.edit")->middleware('admin-access:record,edit,stop_without_driver');
Route::get('/destroy/stop_without_driver/{id}', [\App\Http\Controllers\MyStop_Without_DriverController::class,'destroy'])->name("record.stop_without_driver.destroy")->middleware('admin-access:record,delete,stop_without_driver');
Route::get('/sort/stop_without_driver', [\App\Http\Controllers\MyStop_Without_DriverController::class,'sort'])->name("record.stop_without_driver.sort")->middleware('admin-access:record,store,stop_without_driver');
Route::get('/export/stop_without_driver/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyStop_Without_DriverController::class,'export'])->name("record.stop_without_driver.export")->middleware('admin-access:record,show,stop_without_driver');
Route::get('/pdf/stop_without_driver/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyStop_Without_DriverController::class,'pdf'])->name("record.stop_without_driver.pdf")->middleware('admin-access:record,show,stop_without_driver');
Route::post('/import/stop_without_driver/{parentSlug?}/{parentId?}',[\App\Http\Controllers\MyStop_Without_DriverController::class,'import'])->name("record.stop_without_driver.import")->middleware('admin-access:record,store,stop_without_driver');
