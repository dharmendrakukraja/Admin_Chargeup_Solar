<?php

use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\LevelController;
use App\Http\Middleware\IsLoggedInMiddleware;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CareerController;
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

Route::middleware([IsLoggedInMiddleware::class])->group(function(){

// Profile
Route::get('/profile/{id}', [CustomAuthController::class, 'profile'])->name('profile');
Route::get('/edit-profile/{id}', [CustomAuthController::class, 'editProfile'])->name('edit-profile');
Route::put('/update-profile/{id}', [CustomAuthController::class, 'updateProfile'])->name('update-profile');
// Employee Routes
Route::get('add-employee', [EmployeeController::class, 'addEmployee'])->name('add-employee');
Route::post('employee-add', [EmployeeController::class, 'employeeAdd'])->name('employee-add');
Route::get('employee-list', [EmployeeController::class, 'employeeList'])->name('employee-list');
Route::get('edit-employee\{id}', [EmployeeController::class, 'editEmployee'])->name('edit-employee');
Route::put('/update-employee/{id}', [EmployeeController::class, 'employeeUpdate'])->name('update-employee');
Route::post('/delete-employee/{id}', [EmployeeController::class, 'employeeDelete'])->name('delete-employee');
Route::get('employee-orders', [EmployeeController::class, 'employeeOrders'])->name('employee-orders');
Route::get('employee-order-detail/{id}', [EmployeeController::class, 'employeeOrderDetail'])->name('employee-order-detail');
Route::get('employee-order-edit/{id}', [EmployeeController::class, 'employeeOrderEdit'])->name('employee-order-edit');
Route::put('employee-order-edit/{id}', [EmployeeController::class, 'employeeOrderUpdate'])->name('employee-order-edit');

Route::get('employee-order-assign/{id}', [EmployeeController::class, 'employeeOrderAssign'])->name('employee-order-assign');
Route::put('employee-order-assign/{id}', [EmployeeController::class, 'employeeOrderAssignUpdate'])->name('employee-order-assign');

// User List
Route::get('user-list', [EmployeeController::class, 'userList'])->name('user-list');
Route::get('user-orders', [EmployeeController::class, 'userOrders'])->name('user-orders');
Route::get('user-order-detail/{id}', [EmployeeController::class, 'userOrderDetail'])->name('user-order-detail');
Route::get('user-order-edit/{id}', [EmployeeController::class, 'userOrderEdit'])->name('user-order-edit');
Route::put('user-order-edit/{id}', [EmployeeController::class, 'userOrderUpdate'])->name('user-order-edit');
Route::get('user-list-pdf', [EmployeeController::class, 'userListPDF'])->name('user-list-pdf');

Route::get('user-order-assign/{id}', [EmployeeController::class, 'userOrderAssign'])->name('user-order-assign');
Route::put('user-order-assign/{id}', [EmployeeController::class, 'userOrderAssignUpdate'])->name('user-order-assign');

//

// Building Type Routes
Route::get('add-building-type', [EmployeeController::class, 'addBuildingType'])->name('add-building-type');
Route::post('building-type-add', [EmployeeController::class, 'buildingTypeAdd'])->name('building-type-add');
Route::get('building-list', [EmployeeController::class, 'buildingList'])->name('building-list');
Route::get('edit-building\{id}', [EmployeeController::class, 'editBuilding'])->name('edit-building');
Route::put('/update-building/{id}', [EmployeeController::class, 'buildingUpdate'])->name('update-building');
Route::post('delete-building', [EmployeeController::class, 'buildingDelete'])->name('delete-building');

// Solar Type Routes
Route::get('add-solar-type', [EmployeeController::class, 'addSolarType'])->name('add-solar-type');
Route::post('solar-type-add', [EmployeeController::class, 'solarTypeAdd'])->name('solar-type-add');
Route::get('solar-list', [EmployeeController::class, 'solarList'])->name('solar-list');
Route::get('edit-solar\{id}', [EmployeeController::class, 'editSolar'])->name('edit-solar');
Route::put('/update-solar/{id}', [EmployeeController::class, 'solarUpdate'])->name('update-solar');
Route::post('delete-solar', [EmployeeController::class, 'solarDelete'])->name('delete-solar');

// Employee Notifications
Route::get('add-employee-notification', [NotificationController::class, 'addEmployeeNotification'])->name('add-employee-notification');
Route::post('add-employee-notification', [NotificationController::class, 'employeeNotificationAdd'])->name('add-employee-notification');
Route::get('employee-notification-list', [NotificationController::class, 'employeeNotificationList'])->name('employee-notification-list');
Route::post('delete-employee-notification', [NotificationController::class, 'deleteEmployeeNotification'])->name('delete-employee-notification');

// User Notification
Route::get('add-user-notification', [NotificationController::class, 'addUserNotification'])->name('add-user-notification');
Route::post('add-user-notification', [NotificationController::class, 'userNotificationAdd'])->name('add-user-notification');
Route::get('user-notification-list', [NotificationController::class, 'userNotificationList'])->name('user-notification-list');
Route::post('delete-user-notification', [NotificationController::class, 'deleteUserNotification'])->name('delete-user-list');

Route::get('send-email-file-attacment', [NotificationController::class, 'send_mail'])->name('send-email-file-attacment');

// Rosource Routes
Route::get('add-resource', [ResourceController::class, 'addResource'])->name('add-resource');
Route::post('add-resource', [ResourceController::class, 'resourceAdd'])->name('add-resource');
Route::get('resource-list', [ResourceController::class, 'resourceList'])->name('resource-list');
Route::get('edit-resource/{id}', [ResourceController::class, 'editResource'])->name('edit-resource');
Route::put('/update-resource/{id}', [ResourceController::class, 'updateResource'])->name('update-resource');
Route::post('delete-resource-list', [ResourceController::class, 'resourceDelete'])->name('delete-resource-list');

// Career Routes 
Route::get('career-list', [CareerController::class, 'careerList'])->name('career-list');
Route::get('detail-career/{id}', [CareerController::class, 'detailCareer'])->name('detail-career');
Route::post('delete-career-list', [CareerController::class, 'careerDelete'])->name('delete-career-list');


// Announcement Routes
Route::get('add-announcement', [AnnouncementController::class, 'addAnnouncement'])->name('add-announcement');
Route::post('add-announcement', [AnnouncementController::class, 'announcementAdd'])->name('add-announcement');
Route::get('announcement-list', [AnnouncementController::class, 'announcementList'])->name('announcement-list');
Route::get('edit-announcement/{id}', [AnnouncementController::class, 'editAnnouncement'])->name('edit-announcement');
Route::put('/update-announcement/{id}', [AnnouncementController::class, 'updateAnnouncement'])->name('update-announcement');
Route::post('delete-announcement-list', [AnnouncementController::class, 'announcementDelete'])->name('delete-announcement-list');


///////


});








Route::get('index', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'clients'])->name('login');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

// Route::get('/login', function () {
//     return view('login');
// });
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::post('store-employee', [EmployeeController::class, 'store'])->name('store.employee');

Route::get('employees-list', [EmployeeController::class, 'index'])->name('employees-list');
Route::get('edit-employee/{id}', [EmployeeController::class, 'edit']);
Route::post('update-employee/{id}', [EmployeeController::class, 'update'])->name('update.employee');

Route::post('/getEmployeeInactive', [EmployeeController::class, 'inactive']);

// Route::get('edit-employee/{id}', [EmployeeController::class, 'edit']);

// Route::get('profile/{id}', [EmployeeController::class, 'profile']);

//id='+val,

Route::get('/', function () {
        return view('login');
    });

    Route::get('/home', function () {
        return view('login');
    });



Route::get('/index', function () {
    return view('index');
})->name('page');

Route::get('/employee-dashboard', function () {
    return view('employee-dashboard');
})->name('employee-dashboard');


Route::get('/chat', function () {
    return view('chat');
});
Route::get('/voice-call', function () {
    return view('voice-call');
});
Route::get('/video-call', function () {
    return view('video-call');
});
Route::get('/outgoing-call', function () {
    return view('outgoing-call');
});
Route::get('/incoming-call', function () {
    return view('incoming-call');
});
Route::get('/events', function () {
    return view('events');
});
Route::get('/contacts', function () {
    return view('contacts');
});
Route::get('/inbox', function () {
    return view('inbox');
});
Route::get('/file-manager', function () {
    return view('file-manager');
});
Route::get('/employees', function () {
    return view('employees');
});
Route::get('/holidays', function () {
    return view('holidays');
});
Route::get('/leaves', function () {
    return view('leaves');
});
Route::get('/leaves-employee', function () {
    return view('leaves-employee');
});
Route::get('/leave-settings', function () {
    return view('leave-settings');
});
Route::get('/attendance', function () {
    return view('attendance');
});
Route::get('/attendance-employee', function () {
    return view('attendance-employee');
});
Route::get('/departments', function () {
    return view('departments');
});
Route::get('/designations', function () {
    return view('designations');
});
Route::get('/timesheet', function () {
    return view('timesheet');
});
Route::get('/overtime', function () {
    return view('overtime');
});
Route::get('/clients', function () {
    return view('clients');
});
Route::get('/projects', function () {
    return view('projects');
});
Route::get('/tasks', function () {
    return view('tasks');
});
Route::get('/task-board', function () {
    return view('task-board');
});
Route::get('/leads', function () {
    return view('leads');
});
Route::get('/tickets', function () {
    return view('tickets');
});
Route::get('/estimates', function () {
    return view('estimates');
});
Route::get('/invoices', function () {
    return view('invoices');
});
Route::get('/payments', function () {
    return view('payments');
});
Route::get('/expenses', function () {
    return view('expenses');
});
Route::get('/provident-fund', function () {
    return view('provident-fund');
});
Route::get('/taxes', function () {
    return view('taxes');
});
Route::get('/salary', function () {
    return view('salary');
});
Route::get('/salary-view', function () {
    return view('salary-view');
});
Route::get('/payroll-items', function () {
    return view('payroll-items');
});
Route::get('/policies', function () {
    return view('policies');
});
Route::get('/expense-reports', function () {
    return view('expense-reports');
});
Route::get('/invoice-reports', function () {
    return view('invoice-reports');
});
Route::get('/performance-indicator', function () {
    return view('performance-indicator');
});
Route::get('/performance', function () {
    return view('performance');
});
Route::get('/performance-appraisal', function () {
    return view('performance-appraisal');
});
Route::get('/goal-tracking', function () {
    return view('goal-tracking');
});
Route::get('/goal-type', function () {
    return view('goal-type');
});
Route::get('/training', function () {
    return view('training');
});
Route::get('/trainers', function () {
    return view('trainers');
});
Route::get('/training-type', function () {
    return view('training-type');
});
Route::get('/promotion', function () {
    return view('promotion');
});
Route::get('/resignation', function () {
    return view('resignation');
});
Route::get('/termination', function () {
    return view('termination');
});
Route::get('/assets1', function () {
    return view('assets1');
});
Route::get('/jobs', function () {
    return view('jobs');
});
Route::get('/job-applicants', function () {
    return view('job-applicants');
});
Route::get('/knowledgebase', function () {
    return view('knowledgebase');
});
Route::get('/activities', function () {
    return view('activities');
});
Route::get('/users', function () {
    return view('users');
});
Route::get('/settings', function () {
    return view('settings');
});
Route::get('/localization', function () {
    return view('localization');
});
Route::get('/theme-settings', function () {
    return view('theme-settings');
});
Route::get('/roles-permissions', function () {
    return view('roles-permissions');
});
Route::get('/email-settings', function () {
    return view('email-settings');
});
Route::get('/invoice-settings', function () {
    return view('invoice-settings');
});
Route::get('/salary-settings', function () {
    return view('salary-settings');
});
Route::get('/notifications-settings', function () {
    return view('notifications-settings');
});
Route::get('/change-password', function () {
    return view('change-password');
});
Route::get('/leave-type', function () {
    return view('leave-type');
});

Route::get('/client-profile', function () {
    return view('client-profile');
});

Route::get('/register', function () {
    return view('register');
});
Route::get('/forgot-password', function () {
    return view('forgot-password');
});
Route::get('/otp', function () {
    return view('otp');
});
Route::get('/lock-screen', function () {
    return view('lock-screen');
});
Route::get('/error-404', function () {
    return view('error-404');
});
Route::get('/error-500', function () {
    return view('error-500');
});
Route::get('/subscriptions', function () {
    return view('subscriptions');
});
Route::get('/subscriptions-company', function () {
    return view('subscriptions-company');
});
Route::get('/subscribed-companies', function () {
    return view('subscribed-companies');
});
Route::get('/search', function () {
    return view('search');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});
Route::get('/blank-page', function () {
    return view('blank-page');
});
Route::get('/components', function () {
    return view('components');
});
Route::get('/form-basic-inputs', function () {
    return view('form-basic-inputs');
});
Route::get('/form-input-groups', function () {
    return view('form-input-groups');
});
Route::get('/form-horizontal', function () {
    return view('form-horizontal');
});
Route::get('/form-vertical', function () {
    return view('form-vertical');
});
Route::get('/form-mask', function () {
    return view('form-mask');
});
Route::get('/form-validation', function () {
    return view('form-validation');
});
Route::get('/tables-basic', function () {
    return view('tables-basic');
});
Route::get('/data-tables', function () {
    return view('data-tables');
});
Route::get('/create-estimate', function () {
    return view('create-estimate');
});
Route::get('/create-invoice', function () {
    return view('create-invoice');
});
Route::get('/clients-list', function () {
    return view('clients-list');
});
Route::get('/compose', function () {
    return view('compose');
});
Route::get('/edit-estimate', function () {
    return view('edit-estimate');
});
Route::get('/edit-invoice', function () {
    return view('edit-invoice');
});
Route::get('/estimate-view', function () {
    return view('estimate-view');
});
Route::get('/job-view', function () {
    return view('job-view');
});
Route::get('/job-list', function () {
    return view('job-list');
});
Route::get('/job-details', function () {
    return view('job-details');
});
Route::get('/knowledgebase-view', function () {
    return view('knowledgebase-view');
});
Route::get('/mail-view', function () {
    return view('mail-view');
});
Route::get('/project-list', function () {
    return view('project-list');
});
Route::get('/project-view', function () {
    return view('project-view');
});
Route::get('/ticket-view', function () {
    return view('ticket-view');
});
Route::get('/invoice-view', function () {
    return view('invoice-view');
});
// Route::get('/employees-list', function () {
//     return view('employees-list');
// });

Route::get('/add-employees', function () {
    return view('add-employees');
});

// Route::get('/edit-employee/{id}', function () {
//     return view('edit-employees');
// });

Route::get('/shift-scheduling', function () {
    return view('shift-scheduling');
});
Route::get('/shift-list', function () {
    return view('shift-list');
});
Route::get('/categories', function () {
    return view('categories');
});
Route::get('/budgets', function () {
    return view('budgets');
});
Route::get('/budget-expenses', function () {
    return view('budget-expenses');
});
Route::get('/budget-revenues', function () {
    return view('budget-revenues');
});
Route::get('/payments-reports', function () {
    return view('payments-reports');
});
Route::get('/project-reports', function () {
    return view('project-reports');
});
Route::get('/task-reports', function () {
    return view('task-reports');
});
Route::get('/user-reports', function () {
    return view('user-reports');
});
Route::get('/employee-reports', function () {
    return view('employee-reports');
});
Route::get('/payslip-reports', function () {
    return view('payslip-reports');
});
Route::get('/attendance-reports', function () {
    return view('attendance-reports');
});
Route::get('/leave-reports', function () {
    return view('leave-reports');
});
Route::get('/daily-reports', function () {
    return view('daily-reports');
});
Route::get('/user-dashboard', function () {
    return view('user-dashboard');
})->name('user-dashboard');
Route::get('/jobs-dashboard', function () {
    return view('jobs-dashboard');
})->name('jobs-dashboard');
Route::get('/manage-resumes', function () {
    return view('manage-resumes');
});
Route::get('/shortlist-candidates', function () {
    return view('shortlist-candidates');
});
Route::get('/interview-questions', function () {
    return view('interview-questions');
});
Route::get('/offer_approvals', function () {
    return view('offer_approvals');
});
Route::get('/experiance-level', function () {
    return view('experiance-level');
});
Route::get('/candidates', function () {
    return view('candidates');
});
Route::get('/schedule-timing', function () {
    return view('schedule-timing');
});
Route::get('/apptitude-result', function () {
    return view('apptitude-result');
});
Route::get('/toxbox-setting', function () {
    return view('toxbox-setting');
});
Route::get('/cron-setting', function () {
    return view('cron-setting');
});
Route::get('/performance-setting', function () {
    return view('performance-setting');
});
Route::get('/approval-setting', function () {
    return view('approval-setting');
});
Route::get('/user-all-jobs', function () {
    return view('user-all-jobs');
});
Route::get('/saved-jobs', function () {
    return view('saved-jobs');
});
Route::get('/applied-jobs', function () {
    return view('applied-jobs');
});
Route::get('/interviewing', function () {
    return view('interviewing');
});
Route::get('/offered-jobs', function () {
    return view('offered-jobs');
});
Route::get('/visited-jobs', function () {
    return view('visited-jobs');
});
Route::get('/archived-jobs', function () {
    return view('archived-jobs');
});
Route::get('/sub-category', function () {
    return view('sub-category');
});
Route::get('/job-aptitude', function () {
    return view('job-aptitude');
});
Route::get('/questions', function () {
    return view('questions');
});
