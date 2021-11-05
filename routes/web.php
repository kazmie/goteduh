<?php

Route::get('/', 'App\Http\Controllers\Pages\HomeController@index')->name('public.home');
Route::post('/packages', 'App\Http\Controllers\Pages\HomeController@packages')->name('public.packages');
Route::post('/packages/filter', 'App\Http\Controllers\Pages\HomeController@filterPackages')->name('public.packages.filter');

Route::post('/details', 'App\Http\Controllers\Pages\HomeController@details')->name('public.details');
Route::post('/details/search', 'App\Http\Controllers\Pages\HomeController@searchNric')->name('public.search.detail');

Route::post('/payment', 'App\Http\Controllers\Pages\HomeController@payment')->name('public.payment');
Route::post('/payment-redirect', 'App\Http\Controllers\Pages\HomeController@openPayment')->name('public.open.payment');
Route::post('/beneficiary', 'App\Http\Controllers\Pages\HomeController@beneficiary')->name('public.beneficiary');
Route::get('/payment/result', 'App\Http\Controllers\Pages\HomeController@paymentRedirect')->name('public.payment.result');
Route::get('/payment/result/redirect/', 'App\Http\Controllers\Pages\HomeController@paymentRedirect')->name('public.payment.redirect.result');
Route::post('/benificiary', 'App\Http\Controllers\Pages\HomeController@storeBenificiary')->name('public.store.benificiary');
Route::get('/complete', 'App\Http\Controllers\Pages\HomeController@complete')->name('public.complete');
Route::get('/download/policy', 'App\Http\Controllers\Pages\HomeController@policyDownload')->name('public.home.download.policy');
Route::get('/completed', 'App\Http\Controllers\Pages\HomeController@completePayment')->name('public.completed');

Route::get('/claims', 'App\Http\Controllers\Pages\ClaimController@index')->name('public.claim');
Route::post('/claims', 'App\Http\Controllers\Pages\ClaimController@detail')->name('public.claim.detail');
Route::get('/claims/new/{userid}/{id}', 'App\Http\Controllers\Pages\ClaimController@new')->name('public.claim.new');
Route::post('/claims/new', 'App\Http\Controllers\Pages\ClaimController@store')->name('public.claim.store');
Route::get('/claims/documents/{id}', 'App\Http\Controllers\Pages\ClaimController@uploadDocuments')->name('public.claim.documents');
Route::post('/claims/documents/', 'App\Http\Controllers\Pages\ClaimController@saveDocuments')->name('public.claim.save.documents');
Route::post('/claims/completed/', 'App\Http\Controllers\Pages\ClaimController@complete')->name('public.claim.complete');

//Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin-login', 'App\Http\Controllers\Auth\AdminLoginController@showLoginForm');
Route::post('admin-login', 'App\Http\Controllers\Auth\AdminLoginController@login')->name('admin.login');
Route::get('admin-register', 'App\Http\Controllers\Auth\AdminLoginController@showRegisterPage');
Route::post('admin-register', 'App\Http\Controllers\Auth\AdminLoginController@register')->name('admin.register');

Route::group(['prefix' => 'admin', 'middleware' => 'assign.guard:admin,/admin-login'], function () {

//admin controller
    Route::get('/', 'App\Http\Controllers\Admin\DashboardController@index')->name('admin-dashboard');
    Route::get('/dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('admin-dashboard');

//insurance
    Route::get('/insurance/product', 'App\Http\Controllers\Admin\InsuranceController@index')->name('admin-insurance-product');
    Route::get('/insurance/product/new', 'App\Http\Controllers\Admin\InsuranceController@create')->name('admin-insurance-product-new');
    Route::get('/insurance/product/changeStatus', 'App\Http\Controllers\Admin\InsuranceController@changeStatus')->name('admin-insurance-product-changeStatus');
    Route::post('/insurance/product/new', 'App\Http\Controllers\Admin\InsuranceController@store')->name('admin-insurance-product-save');
    Route::get('/insurance/product/edit/{id}', 'App\Http\Controllers\Admin\InsuranceController@edit')->name('admin-insurance-product-edit');
    Route::post('/insurance/product/edit', 'App\Http\Controllers\Admin\InsuranceController@update')->name('admin-insurance-product-update');
    Route::post('/insurance/product/delete', 'App\Http\Controllers\Admin\InsuranceController@deleteProduct')->name('admin-insurance-product-delete');

    Route::get('/insurance/product/benefit/{id}', 'App\Http\Controllers\Admin\InsuranceController@showBenefit')->name('admin-insurance-product-show-benefit');
    Route::post('/insurance/product/benefit/add', 'App\Http\Controllers\Admin\InsuranceController@addBenefit')->name('admin-insurance-product-add-benefit');
    Route::post('/insurance/product/benefit/delete', 'App\Http\Controllers\Admin\InsuranceController@deleteBenefit')->name('admin-insurance-product-delete-benefit');
    Route::get('/insurance/product/benefit/edit/{product_id}/{id}', 'App\Http\Controllers\Admin\InsuranceController@editBenefit')->name('admin-insurance-product-edit-benefit');
    Route::post('/insurance/product/benefit/edit', 'App\Http\Controllers\Admin\InsuranceController@updateBenefit')->name('admin-insurance-product-update-benefit');


    Route::get('/insurance/product/package/{id}', 'App\Http\Controllers\Admin\InsuranceController@showPackage')->name('admin-insurance-product-show-package');
    Route::post('/insurance/product/package/add', 'App\Http\Controllers\Admin\InsuranceController@addPackage')->name('admin-insurance-product-add-package');
    Route::get('/insurance/product/package/edit/{product_id}/{id}', 'App\Http\Controllers\Admin\InsuranceController@editPackage')->name('admin-insurance-product-edit-package');
    Route::get('/insurance/product/packageExtra/edit/{product_id}/{id}', 'App\Http\Controllers\Admin\InsuranceController@editPackageExtra')->name('admin-insurance-product-edit-packageExtra');
    Route::get('/insurance/product/package/duplicate/{product_id}/{id}', 'App\Http\Controllers\Admin\InsuranceController@duplicate')->name('admin-insurance-product-duplicate-package');
    Route::get('/insurance/product/packageExtra/duplicate/{product_id}/{id}', 'App\Http\Controllers\Admin\InsuranceController@duplicateExtra')->name('admin-insurance-product-duplicate-packageExtra');
    Route::post('/insurance/product/package/edit/', 'App\Http\Controllers\Admin\InsuranceController@updatePackage')->name('admin-insurance-product-update-package');
    Route::post('/insurance/product/packageExtra/edit/', 'App\Http\Controllers\Admin\InsuranceController@updatePackageExtra')->name('admin-insurance-product-update-packageExtra');
    Route::post('/insurance/product/package/duplicate', 'App\Http\Controllers\Admin\InsuranceController@saveDuplicate')->name('admin-insurance-product-duplicatePackage-package');
    Route::post('/insurance/product/packageExtra/duplicate', 'App\Http\Controllers\Admin\InsuranceController@saveDuplicateExtra')->name('admin-insurance-product-duplicatePackageExtra-package');
    Route::post('/insurance/product/package/add/extra', 'App\Http\Controllers\Admin\InsuranceController@addPackageExtra')->name('admin-insurance-product-add-package-extra');
    Route::post('/insurance/product/package/delete', 'App\Http\Controllers\Admin\InsuranceController@deletePackage')->name('admin-insurance-product-delete-package');
    Route::post('/insurance/product/package/delete/extra', 'App\Http\Controllers\Admin\InsuranceController@deletePackageExtra')->name('admin-insurance-product-delete-package-extra');
    Route::post('/insurance/product/package/check/region', 'App\Http\Controllers\Admin\InsuranceController@checkRegion')->name('admin-insurance-product-check-region');
    Route::post('/insurance/product/package/filter', 'App\Http\Controllers\Admin\InsuranceController@filterPackage')->name('admin-insurance-product-package.filter');

    Route::post('/insurance/product/productdisclosure/add', 'App\Http\Controllers\Admin\InsuranceController@addPackage')->name('admin-insurance-product-add-package');

    Route::get('/insurance/product/category', 'App\Http\Controllers\Admin\CategoryController@index')->name('admin-insurance-category');
    Route::get('/insurance/product/category/add', 'App\Http\Controllers\Admin\CategoryController@create')->name('admin-insurance-category-new');
    Route::post('/insurance/product/category/add', 'App\Http\Controllers\Admin\CategoryController@save')->name('admin-insurance-category-save');
    Route::get('/insurance/product/category/edit/{id}', 'App\Http\Controllers\Admin\CategoryController@edit')->name('admin-insurance-category-edit');
    Route::post('/insurance/product/category/edit/', 'App\Http\Controllers\Admin\CategoryController@update')->name('admin-insurance-category-update');
    Route::post('/insurance/product/category/delete/', 'App\Http\Controllers\Admin\CategoryController@delete')->name('admin-insurance-category-delete');
   
    Route::get('/insurance/product/plan', 'App\Http\Controllers\Admin\PlanController@index')->name('admin-insurance-plan');
    Route::get('/insurance/product/plan/add', 'App\Http\Controllers\Admin\PlanController@create')->name('admin-insurance-plan-new');
    Route::post('/insurance/product/plan/add', 'App\Http\Controllers\Admin\PlanController@save')->name('admin-insurance-plan-save');
    Route::get('/insurance/product/plan/edit/{id}', 'App\Http\Controllers\Admin\PlanController@edit')->name('admin-insurance-plan-edit');
    Route::post('/insurance/product/plan/delete/', 'App\Http\Controllers\Admin\PlanController@delete')->name('admin-insurance-plan-delete');
  
//sales
    Route::get('/insurance/product/sales', 'App\Http\Controllers\Admin\EnrollmentController@index')->name('admin-insurance.sales');
    Route::get('/insurance/product/sales/{id}', 'App\Http\Controllers\Admin\EnrollmentController@view')->name('admin-insurance.view');
    Route::post('/insurance/product/sales', 'App\Http\Controllers\Admin\EnrollmentController@filterDate')->name('admin-insurance.filter');
    Route::post('/insurance/product/download', 'App\Http\Controllers\Admin\EnrollmentController@exportSales')->name('admin-insurance.download');
    Route::post('/insurance/product/mark-exported', 'App\Http\Controllers\Admin\EnrollmentController@makeExported')->name('admin-insurance.enrollment.exported');
    Route::post('/insurance/company/exported', 'App\Http\Controllers\Admin\EnrollmentController@Exported')->name('admin-insurance-policy-export');

//company
    Route::get('/insurance/company', 'App\Http\Controllers\Admin\CompanyController@index')->name('admin-insurance-company');
    Route::get('/insurance/company/new', 'App\Http\Controllers\Admin\CompanyController@create')->name('admin-insurance-company-new');
    Route::post('/insurance/company/new', 'App\Http\Controllers\Admin\CompanyController@store')->name('admin-insurance-company-save');
    Route::get('/insurance/company/edit/{id}', 'App\Http\Controllers\Admin\CompanyController@edit')->name('admin-insurance-company-edit');
    Route::post('/insurance/company/edit', 'App\Http\Controllers\Admin\CompanyController@update')->name('admin-insurance-company-update');
//benefit
    Route::get('/benefit', 'App\Http\Controllers\Admin\BenefitController@index')->name('admin-insurance-benefit');
    Route::get('/benefit/new', 'App\Http\Controllers\Admin\BenefitController@create')->name('admin-insurance-benefit-new');
    Route::post('/benefit/new', 'App\Http\Controllers\Admin\BenefitController@store')->name('admin-insurance-benefit-save');
    Route::get('/benefit/edit/{id}', 'App\Http\Controllers\Admin\BenefitController@edit')->name('admin-insurance-benefit-edit');
    Route::post('/benefit/edit', 'App\Http\Controllers\Admin\BenefitController@update')->name('admin-insurance-benefit-update');
    Route::post('/benefit/', 'App\Http\Controllers\Admin\BenefitController@delete')->name('admin-insurance-benefit-delete');
//claimType
    Route::get('/claimType', 'App\Http\Controllers\Admin\ClaimTypeController@index')->name('admin-insurance-claimType');
    Route::get('/claimType/new', 'App\Http\Controllers\Admin\ClaimTypeController@create')->name('admin-insurance-claimType-new');
    Route::post('/claimType/new', 'App\Http\Controllers\Admin\ClaimTypeController@store')->name('admin-insurance-claimType-save');
    Route::get('/claimType/edit/{id}', 'App\Http\Controllers\Admin\ClaimTypeController@edit')->name('admin-insurance-claimType-edit');
    Route::post('/claimType/edit', 'App\Http\Controllers\Admin\ClaimTypeController@update')->name('admin-insurance-claimType-update');
    Route::post('/claimType/', 'App\Http\Controllers\Admin\ClaimTypeController@delete')->name('admin-insurance-claimType-delete');

//Region
    Route::get('/region', 'App\Http\Controllers\Admin\RegionController@index')->name('admin-insurance-region');
    Route::post('/region/new', 'App\Http\Controllers\Admin\RegionController@store')->name('admin-insurance-region-save');
    Route::post('/region/', 'App\Http\Controllers\Admin\RegionController@delete')->name('admin-insurance-region-delete');
    Route::get('/region/edit/{id}', 'App\Http\Controllers\Admin\RegionController@edit')->name('admin-insurance-region-edit');
    Route::post('/region/edit', 'App\Http\Controllers\Admin\RegionController@update')->name('admin-insurance-region-update');
    Route::post('/region/duplicate', 'App\Http\Controllers\Admin\RegionController@saveRegionDuplicate')->name('admin-insurance-region-duplicateRegion');
    Route::get('/region/duplicate/{id}', 'App\Http\Controllers\Admin\RegionController@RegionDuplicate')->name('admin-insurance-region-duplicate');

//claims
    Route::get('/claims', 'App\Http\Controllers\Admin\ClaimController@index')->name('admin.claim');
    Route::get('/claims/view/{id}', 'App\Http\Controllers\Admin\ClaimController@view')->name('admin.claim.view');
    Route::get('/claims/download', 'App\Http\Controllers\Admin\ClaimController@exportClaims')->name('admin-claim.download');
    Route::get('/claims/mark-exported', 'App\Http\Controllers\Admin\ClaimController@makeExportedClaim')->name('admin-insurance.exported');
    Route::post('/claims', 'App\Http\Controllers\Admin\ClaimController@filterClaims')->name('admin.claim.filter');
    Route::post('/claims/update/status', 'App\Http\Controllers\Admin\ClaimController@updateStatus')->name('admin.claim.updatestatus');
    Route::get('/download/claimpolicy', 'App\Http\Controllers\Admin\ClaimController@claimpolicyDownload')->name('public.home.download.claimpolicy');


    Route::get('/reports', 'App\Http\Controllers\Admin\ReportController@index')->name('admin.report');
    

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
