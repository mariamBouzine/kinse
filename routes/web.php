<?php

use App\Http\Controllers\service\offerManage;
use App\Http\Controllers\service\serviceManage;
use Illuminate\Support\Facades\Route;

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

$controller_path = 'App\Http\Controllers';

// Main Page Route
// Auth::routes();
Route::get('/', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');
Route::get('/dashboard/dashboards-analytics', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');
Route::get('/dashboard/crm', $controller_path . '\dashboard\Crm@index')->name('dashboard-crm');
//Appointment
Route::get('/appointment/appointment-manage', $controller_path . '\appointment\appointmentManage@index')->name('appointment-manage');
Route::post('/appointment/appointment-manage', $controller_path . '\appointment\appointmentManage@filterByDate')->name('appointments.filter');
Route::post('/appointment/appointment-manage/{id}', $controller_path . '\appointment\appointmentManage@handleAppointment')->name('appointments.handleAppointment');
//patients
Route::get('/patients/patients-manage', $controller_path . '\patients\patientsManage@index')->name('patients-manage');
//wallet
Route::get('/wallet/wallet-manage', $controller_path . '\wallet\walletManage@index')->name('wallet-manage');
//service
Route::delete('/service/service-manage/{id}', $controller_path .'\service\serviceManage@destroy')->name('service.destroy');
Route::get('/offer/offer-manage/restore/{id}',  $controller_path .'\service\serviceManage@restore')->name('service.restore');
Route::post('/service',  $controller_path .'\service\serviceManage@store');
Route::get('/service/service-manage/{id}', $controller_path .'\service\serviceManage@edit')->name('service.edit');
Route::get('/service/service-manage', $controller_path . '\service\serviceManage@index')->name('pages-service-service-manage');
Route::put('/service/service-manage/{id}', $controller_path . '\service\serviceManage@update')->name('service.update');
// Route::resource('/service','serviceManage');
//offer
Route::get('/service/offer-manage', $controller_path . '\service\offerManage@index')->name('pages-service-offer-manage');
Route::post('/offer',  $controller_path .'\service\offerManage@store');
Route::get('/offer/offer-manage/{id}/restore',  $controller_path .'\service\offerManage@restore')->name('offer.restore');
Route::delete('/service/service-manage/{id}/destroyoffer', $controller_path .'\service\offerManage@destroy')->name('offer.destroy');
Route::get('/service/service-manage/{id}/edit',  $controller_path .'\service\offerManage@edit')->name('offer.edit');
Route::put('/service/service-manage/update/{id}', $controller_path .'\service\offerManage@update')->name('offer.update');

//staff
Route::get('/staff/Staff-manage', $controller_path . '\staff\staffManage@index')->name('Staff-manage-Staff');
Route::post('/staff',  $controller_path .'\staff\staffManage@store')->name('staff.index');
Route::get('/staff/Staff-manage/{id}/restore',  $controller_path .'\staff\staffManage@restore')->name('staff.restore');
Route::delete('/staff/Staff-manage/{id}/destroystaff', $controller_path .'\staff\staffManage@destroy')->name('staff.destroy');
Route::put('/staff/Staff-manage/update/{id}', $controller_path .'\staff\staffManage@update')->name('staff.update');

//coaches
Route::get('/staff/Coaches-list', $controller_path . '\staff\CoachesListManage@index')->name('Staff-Coaches-list');
Route::put('/staff/Coaches-list/{id}/accept', $controller_path .'\staff\CoachesListManage@accept')->name('staff.accept');
Route::put('/staff/Coaches-list/{id}/reject', $controller_path .'\staff\CoachesListManage@reject')->name('staff.reject');

// layout
Route::get('/layouts/without-menu', $controller_path . '\layouts\WithoutMenu@index')->name('layouts-without-menu');
Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name('layouts-without-navbar');
Route::get('/layouts/fluid', $controller_path . '\layouts\Fluid@index')->name('layouts-fluid');
Route::get('/layouts/container', $controller_path . '\layouts\Container@index')->name('layouts-container');
Route::get('/layouts/blank', $controller_path . '\layouts\Blank@index')->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', $controller_path . '\pages\AccountSettingsAccount@index')->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', $controller_path . '\pages\AccountSettingsNotifications@index')->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', $controller_path . '\pages\AccountSettingsConnections@index')->name('pages-account-settings-connections');
Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', $controller_path . '\authentications\ForgotPasswordBasic@index')->name('auth-reset-password-basic');

// cards
Route::get('/cards/basic', $controller_path . '\cards\CardBasic@index')->name('cards-basic');

// User Interface
Route::get('/ui/accordion', $controller_path . '\user_interface\Accordion@index')->name('ui-accordion');
Route::get('/ui/alerts', $controller_path . '\user_interface\Alerts@index')->name('ui-alerts');
Route::get('/ui/badges', $controller_path . '\user_interface\Badges@index')->name('ui-badges');
Route::get('/ui/buttons', $controller_path . '\user_interface\Buttons@index')->name('ui-buttons');
Route::get('/ui/carousel', $controller_path . '\user_interface\Carousel@index')->name('ui-carousel');
Route::get('/ui/collapse', $controller_path . '\user_interface\Collapse@index')->name('ui-collapse');
Route::get('/ui/dropdowns', $controller_path . '\user_interface\Dropdowns@index')->name('ui-dropdowns');
Route::get('/ui/footer', $controller_path . '\user_interface\Footer@index')->name('ui-footer');
Route::get('/ui/list-groups', $controller_path . '\user_interface\ListGroups@index')->name('ui-list-groups');
Route::get('/ui/modals', $controller_path . '\user_interface\Modals@index')->name('ui-modals');
Route::get('/ui/navbar', $controller_path . '\user_interface\Navbar@index')->name('ui-navbar');
Route::get('/ui/offcanvas', $controller_path . '\user_interface\Offcanvas@index')->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', $controller_path . '\user_interface\PaginationBreadcrumbs@index')->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', $controller_path . '\user_interface\Progress@index')->name('ui-progress');
Route::get('/ui/spinners', $controller_path . '\user_interface\Spinners@index')->name('ui-spinners');
Route::get('/ui/tabs-pills', $controller_path . '\user_interface\TabsPills@index')->name('ui-tabs-pills');
Route::get('/ui/toasts', $controller_path . '\user_interface\Toasts@index')->name('ui-toasts');
Route::get('/ui/tooltips-popovers', $controller_path . '\user_interface\TooltipsPopovers@index')->name('ui-tooltips-popovers');
Route::get('/ui/typography', $controller_path . '\user_interface\Typography@index')->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', $controller_path . '\extended_ui\PerfectScrollbar@index')->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', $controller_path . '\extended_ui\TextDivider@index')->name('extended-ui-text-divider');

// icons
Route::get('/icons/boxicons', $controller_path . '\icons\Boxicons@index')->name('icons-boxicons');

// form elements
Route::get('/forms/basic-inputs', $controller_path . '\form_elements\BasicInput@index')->name('forms-basic-inputs');
Route::get('/forms/input-groups', $controller_path . '\form_elements\InputGroups@index')->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', $controller_path . '\form_layouts\VerticalForm@index')->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', $controller_path . '\form_layouts\HorizontalForm@index')->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', $controller_path . '\tables\Basic@index')->name('tables-basic');
Route::get('/tables/datatables-basic',  $controller_path . '\tables\DatatableBasic@index')->name('tables-datatables-basic');


