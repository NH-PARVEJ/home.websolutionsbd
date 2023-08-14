<?php
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\DesignationController;
use App\Http\Controllers\Backend\DashboardContarller;
use App\Http\Controllers\Backend\AttendanceController;
use App\Http\Controllers\Frontend\UserAttendanceController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\ScreenshotController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\LeaveController;
use App\Http\Controllers\Backend\LoanController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\TargetController;
use App\Http\Controllers\Backend\SidebarController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Frontend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
    
Route::get('/', [UserController::class, "user_control_panel"])->name('user.control.panel');
    Route::prefix('user')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/edit/{id}', [UserDashboardController::class, 'edit'])->name('user.profile.edit');
    Route::post('/update/{id}', [UserDashboardController::class, 'update'])->name('user.profile.update');
    Route::prefix('/attendance')->group(function () {
    Route::get('manage', [UserAttendanceController::class, 'attendance'])->name('user.attendance.manage');
    Route::post('store', [UserAttendanceController::class, 'store'])->name('user.attendance.store');
    });
    Route::prefix('/screenshot')->group(function () {
    Route::get('manage', [ScreenshotController::class, 'user_screenshot'])->name('user.screenshot.manage');
    });
    Route::prefix('/leave')->group(function () {
    Route::get('manage', [LeaveController::class, 'user_leave'])->name('user.leave.manage');
    Route::post('store', [LeaveController::class, 'store'])->name('leave.store');
    Route::get('edit/{id}', [LeaveController::class, 'user_edit'])->name('user.leave.edit');
    Route::post('update/{id}', [LeaveController::class, 'user_update'])->name('user.leave.update');
    Route::post('destroy/{id}', [LeaveController::class, 'user_destroy'])->name('user.leave.destroy');
    });
    Route::prefix('/loan')->group(function () {
    Route::get('manage', [LoanController::class, 'user_loan'])->name('user.loan.manage');
    Route::post('store', [LoanController::class, 'store'])->name('loan.store');
    Route::get('edit/{id}', [LoanController::class, 'user_edit'])->name('user.loan.edit');
    Route::post('update/{id}', [LoanController::class, 'user_update'])->name('user.loan.update');
    Route::post('destroy/{id}', [LoanController::class, 'user_destroy'])->name('user.loan.destroy');
    });
    Route::prefix('/project')->group(function () {
    Route::get('manage', [ProjectController::class, 'user_project'])->name('user.project.manage');
    });
})->middleware('auth');
/*
|--------------------------------------------------------------------------
|Backend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('auth', 'IsAdmin')->group(function () {
    Route::get('/admin/dashboard', [DashboardContarller::class, 'dashboard'])->name('admin.dashboard');
    Route::prefix('/employee')->group(function () {
    Route::get('manage', [UserController::class, 'user'])->name('user.manage');
    Route::get('profile/{id}', [UserController::class, 'user_profile'])->name('user.profile');
    Route::get('create', [UserController::class, 'create'])->name('user.create');
    Route::post('store', [UserController::class, 'store'])->name('user.store');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::post('destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });
    Route::prefix('/attendance')->group(function () {
    Route::get('manage', [AttendanceController::class, 'attendance'])->name('admin.attendance.manage');
    Route::post('store', [AttendanceController::class, 'store'])->name('admin.attendance.store');
    });
    Route::prefix('/leave')->group(function () {
    Route::get('manage', [LeaveController::class, 'admin_leave'])->name('admin.leave.manage');
    Route::get('edit/{id}', [LeaveController::class, 'admin_edit'])->name('admin.leave.edit');
    Route::post('update/{id}', [LeaveController::class, 'admin_update'])->name('admin.leave.update');
    Route::post('destroy/{id}', [LeaveController::class, 'admin_destroy'])->name('admin.leave.destroy');
    });
    Route::prefix('/loan')->group(function () {
    Route::get('manage', [LoanController::class, 'admin_loan'])->name('admin.loan.manage');
    Route::get('edit/{id}', [LoanController::class, 'admin_edit'])->name('admin.loan.edit');
    Route::post('update/{id}', [LoanController::class, 'admin_update'])->name('admin.loan.update');
    Route::post('destroy/{id}', [LoanController::class, 'admin_destroy'])->name('admin.loan.destroy');
    });
    Route::prefix('/project')->group(function () {
    Route::get('manage', [ProjectController::class, 'admin_project'])->name('admin.project.manage');
    Route::get('create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('store', [ProjectController::class, 'store'])->name('project.store');
    Route::get('edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::post('update/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::post('destroy/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
    });
    Route::prefix('/settings')->group(function () {
    Route::get('manage', [SettingsController::class, 'settings'])->name('settings.manage');
    Route::post('store', [SettingsController::class, 'store'])->name('settings.store');
    Route::get('edit', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::post('update', [SettingsController::class, 'update'])->name('settings.update');
    Route::post('destroy', [SettingsController::class, 'destroy'])->name('settings.delete');
    });
    Route::prefix('/screenshot')->group(function () {
    Route::get('manage', [ScreenshotController::class, 'admin_screenshot'])->name('admin.screenshot.manage');
    // Route::post('store', [ScreenshotController::class, 'store'])->name('user.attendance.store');
    });
    Route::prefix('/target')->group(function () {
    Route::get('manage', [TargetController::class, 'target'])->name('target.manage');
    Route::post('store', [TargetController::class, 'store'])->name('target.store');
    Route::get('edit/{id}', [TargetController::class, 'edit'])->name('target.edit');
    Route::post('update/{id}', [TargetController::class, 'update'])->name('target.update');
    Route::post('destroy/{id}', [TargetController::class, 'destroy'])->name('target.destroy');
    });
    Route::prefix('/department')->group(function () {
    Route::get('manage', [DepartmentController::class, 'department'])->name('department.manage');
    Route::post('store', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::post('update/{id}', [DepartmentController::class, 'update'])->name('department.update');
    Route::post('destroy/{id}', [DepartmentController::class, 'destroy'])->name('department.destroy');
    });
    Route::prefix('/designation')->group(function () {
    Route::get('manage', [DesignationController::class, 'designation'])->name('designation.manage');
    Route::post('store', [DesignationController::class, 'store'])->name('designation.store');
    Route::get('edit/{id}', [DesignationController::class, 'edit'])->name('designation.edit');
    Route::post('update/{id}', [DesignationController::class, 'update'])->name('designation.update');
    Route::post('destroy/{id}', [DesignationController::class, 'destroy'])->name('designation.destroy');
    });
});
require __DIR__.'/auth.php';