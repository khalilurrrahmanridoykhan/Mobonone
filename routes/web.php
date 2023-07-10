<?php

use App\Http\Controllers\Admin\mobozone\pages\adminBlogController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Faculty\Auth\AuthenticatedSessionController as FacultyAuthenticatedSessionController;
use App\Http\Controllers\Faculty\HomeController as FacultyHomeController;
use App\Http\Controllers\Faculty\Auth\RegisteredUserController;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\admin\mobozone\pages\AdminBolgCatagoryController;
use App\Http\Controllers\admin\mobozone\pages\AdminBrandController;
use App\Http\Controllers\admin\mobozone\pages\AdminCategoryController;
use App\Http\Controllers\admin\mobozone\pages\AdminProductController;
use App\Http\Controllers\Admin\mobozone\pages\EditorBlogCatagoryContorller;
use App\Http\Controllers\Admin\mobozone\pages\EditorBrandContorller;
use App\Http\Controllers\Admin\mobozone\pages\EditorCatatoryContorller;
use App\Http\Controllers\Admin\mobozone\pages\EditorController;
use App\Http\Controllers\Admin\mobozone\pages\EditorProductContorller;
use App\Http\Controllers\Admin\mobozone\pages\HomePageHeroSliderController;
use App\Http\Controllers\Admin\mobozone\pages\ManuContoller;
use App\Http\Controllers\Admin\mobozone\pages\UserController as PagesUserController;
use App\Http\Controllers\Admin\Pages\CourseController;
use App\Http\Controllers\Admin\Pages\CourseFacultyAssignment;
use App\Http\Controllers\Admin\Pages\DashbordConoller;
use App\Http\Controllers\Admin\Pages\FacultyController;
use App\Http\Controllers\Admin\Pages\ParalalCourseController;
use App\Http\Controllers\Admin\Pages\SectionCOntoller;
use App\Http\Controllers\admin\pages\SemesterDropContoller;
use App\Http\Controllers\admin\pages\SettingContoller;
use App\Http\Controllers\Admin\Pages\TimeSlotContoller;
use App\Http\Controllers\Admin\Pages\UniOtherInforContoller;
use App\Http\Controllers\Admin\Pages\UserController;
use App\Http\Controllers\fontend\BlogController;
use App\Http\Controllers\fontend\HomeController as FontendHomeController;
use App\Http\Controllers\fontend\mobozone\BlogCatagoryController;
use App\Http\Controllers\fontend\mobozone\FeaturedCategoryController;
use App\Http\Controllers\fontend\mobozone\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TempImageFacultyContoller;
use App\Http\Controllers\TempImageUserContoller;
use App\Http\Controllers\user\pages\UserAdvisingController;
use App\Http\Controllers\user\pages\UserAdvisingRulesContoller;
use App\Http\Controllers\user\pages\UserConvocationApplicationController;
use App\Http\Controllers\User\Pages\UserCourseOfferedContoller;
use App\Http\Controllers\user\pages\UserCurriculumnContoller;
use App\Http\Controllers\User\Pages\UserSemesterDropContoller;
use App\Http\Controllers\User\UserDeshbordContoller;
use App\Models\Temp_image_user;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])
    ->name('admin.login')
    ->middleware('guest:admin');

Route::post('/admin/login/store', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/main', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');


    Route::get('/admin/dashbord', [DashbordConoller::class, 'dashbord'])->name('admin.dashbord.index');



    //HeroSlider backend pages:

    Route::get('/admin/heroslider/create', [HomePageHeroSliderController::class, 'create'])->name('admin.heroslider.create');
    Route::post('/admin/heroslider/temp', [TempImageFacultyContoller::class, 'upload'])->name('admin.heroslider.temp');
    Route::post('/admin/heroslider/save', [HomePageHeroSliderController::class, 'save'])->name('admin.heroslider.save');
    Route::get('/admin/heroslider/list', [HomePageHeroSliderController::class, 'index'])->name('admin.heroslider.index');
    Route::get('/admin/heroslider/edit/{id}', [HomePageHeroSliderController::class, 'edit'])->name('admin.heroslider.edit');
    Route::get('/admin/heroslider/delete/{id}', [HomePageHeroSliderController::class, 'delete'])->name('admin.heroslider.delete');
    Route::post('/admin/heroslider/update/{id}', [HomePageHeroSliderController::class, 'update'])->name('admin.heroslider.update');


    // Blog pages backend

    Route::get('/admin/blogs/list', [adminBlogController::class, 'index'])->name('admin.blog.index');
    Route::get('/admin/blogs/create', [adminBlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/admin/blogs/save', [adminBlogController::class, 'save'])->name('admin.blog.save');
    Route::get('/admin/blogs/edit/{id}', [adminBlogController::class, 'edit'])->name('admin.blog.edit');
    Route::post('/admin/blogs/edit/{id}', [adminBlogController::class, 'update'])->name('admin.blog.update');
    Route::get('/admin/blogs/delete/{id}', [adminBlogController::class, 'delete'])->name('admin.blog.delete');
    Route::post('/admin/temp/blog/upload',[TempImageControllerForBlog::class,'upload'])->name('admin.blog.temp');

    // Blog Comment Backend
    Route::get('/admin/blogs/comment/list', [adminBlogController::class, 'commentIndex'])->name('admin.blog.comment');
    Route::get('/admin/blogs/comment/edit/{id}', [adminBlogController::class, 'commentEdit'])->name('admin.blog.comment.edit');
    Route::post('/admin/blogs/comment/edit/{id}', [adminBlogController::class, 'commentUpdate'])->name('admin.blog.comment.update');
    Route::get('/admin/blogs/comment/delete/{id}', [adminBlogController::class, 'commentdelete'])->name('admin.blog.comment.delete');



    // Website Seeting
    Route::get('/admin/setting/listedit', [SettingContoller::class, 'indexwithedit'])->name('admin.setting.indexwithedit');
    // Route::get('/admin/setting/create', [SettingContoller::class, 'create'])->name('admin.setting.create');
    Route::post('/admin/setting/save', [SettingContoller::class, 'save'])->name('admin.setting.save');


    // Website Menu settings
    Route::get('/admin/menu/list',[ManuContoller::class, 'index'])->name('admin.manu.list');
    Route::get('/admin/menu/create',[ManuContoller::class, 'create'])->name('admin.manu.create');
    Route::post('/admin/menu/save',[ManuContoller::class, 'save'])->name('admin.manu.save');
    Route::get('/admin/menu/delete/{id}',[ManuContoller::class, 'delete'])->name('admin.manu.delte');
    Route::post('/admin/menu/savesorted',[ManuContoller::class, 'savesorted'])->name('admin.manu.savesorted');





    // category pages backend

    Route::get('/admin/category/list', [AdminCategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/admin/category/create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/admin/category/save', [AdminCategoryController::class, 'save'])->name('admin.category.save');
    Route::get('/admin/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/admin/category/edit/{id}', [AdminCategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/admin/category/delete/{id}', [AdminCategoryController::class, 'delete'])->name('admin.category.delete');



    // brand pages backend

    Route::get('/admin/brand/list', [AdminBrandController::class, 'index'])->name('admin.brand.index');
    Route::get('/admin/brand/create', [AdminBrandController::class, 'create'])->name('admin.brand.create');
    Route::post('/admin/brand/save', [AdminBrandController::class, 'save'])->name('admin.brand.save');
    Route::get('/admin/brand/edit/{id}', [AdminBrandController::class, 'edit'])->name('admin.brand.edit');
    Route::post('/admin/brand/edit/{id}', [AdminBrandController::class, 'update'])->name('admin.brand.update');
    Route::get('/admin/brand/delete/{id}', [AdminBrandController::class, 'delete'])->name('admin.brand.delete');



    // product pages backend

    Route::get('/admin/product/list', [AdminProductController::class, 'index'])->name('admin.product.index');
    Route::get('/admin/product/create', [AdminProductController::class, 'create'])->name('admin.product.create');
    Route::post('/admin/product/save', [AdminProductController::class, 'save'])->name('admin.product.save');
    Route::get('/admin/product/edit/{id}', [AdminProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/admin/product/edit/{id}', [AdminProductController::class, 'update'])->name('admin.product.update');
    Route::get('/admin/product/delete/{id}', [AdminProductController::class, 'delete'])->name('admin.product.delete');

    Route::post('/get-catagory-data', [AdminProductController::class, 'getcagorydata']);


    Route::post('/admin/user/temp', [TempImageUserContoller::class, 'upload'])->name('admin.product.temp');




    // Blog category pages backend

    Route::get('/admin/blogcategory/list', [AdminBolgCatagoryController::class, 'index'])->name('admin.blogcategory.index');
    Route::get('/admin/blogcategory/create', [AdminBolgCatagoryController::class, 'create'])->name('admin.blogcategory.create');
    Route::post('/admin/blogcategory/save', [AdminBolgCatagoryController::class, 'save'])->name('admin.blogcategory.save');
    Route::get('/admin/blogcategory/edit/{id}', [AdminBolgCatagoryController::class, 'edit'])->name('admin.blogcategory.edit');
    Route::post('/admin/blogcategory/edit/{id}', [AdminBolgCatagoryController::class, 'update'])->name('admin.blogcategory.update');
    Route::get('/admin/blogcategory/delete/{id}', [AdminBolgCatagoryController::class, 'delete'])->name('admin.blogcategory.delete');




        //Editor backend pages:

        // Route::get('/admin/editor/create', [UserController::class, 'create'])->name('admin.editor.create');
        // Route::post('/admin/editor/temp', [TempImageUserContoller::class, 'upload'])->name('admin.editor.temp');
        // Route::post('/admin/editor/save', [UserController::class, 'save'])->name('admin.editor.save');
        Route::get('/admin/editor/list', [PagesUserController::class, 'index'])->name('admin.editor.index');
        Route::get('/admin/editor/edit/{id}', [PagesUserController::class, 'edit'])->name('admin.editor.edit');
        Route::get('/admin/editor/delete/{id}', [PagesUserController::class, 'delete'])->name('admin.editor.delete');
        Route::post('/admin/editor/update/{id}', [PagesUserController::class, 'update'])->name('admin.editor.update');
});






/*
|--------------------------------------------------------------------------
| Faculty Routes
|--------------------------------------------------------------------------
*/

Route::get('/editor/login', [FacultyAuthenticatedSessionController::class, 'create'])
    ->name('faculty.login')
    ->middleware('guest:faculty');
Route::post('/editor/login/store', [FacultyAuthenticatedSessionController::class, 'store'])->name('faculty.login.store');
Route::get('/editor/register', [RegisteredUserController::class, 'create'])->name('faculty.register');
Route::post('/editor/register', [RegisteredUserController::class, 'store']);

Route::group(['middleware' => 'faculty'], function () {
    Route::get('/editor', [FacultyHomeController::class, 'index'])->name('faculty.dashboard');
    Route::post('/editor/logout', [FacultyAuthenticatedSessionController::class, 'destroy'])->name('faculty.logout');

    Route::get('/editor/edit', [PagesProfileController::class, 'editprofileindex'])->name('faculty.edit');
    // Route::get('/faculty/delete/{id}', [PagesProfileController::class, 'delete'])->name('admin.faculty.delete');
    Route::post('/editor/update', [PagesProfileController::class, 'updateprofileindex'])->name('faculty.update');


    // Editor Blog pages backend

    Route::get('/editor/blogs/list', [EditorController::class, 'index'])->name('editor.blog.index');
    Route::get('/editor/blogs/create', [EditorController::class, 'create'])->name('editor.blog.create');
    Route::post('/editor/blogs/save', [EditorController::class, 'save'])->name('editor.blog.save');
    Route::get('/editor/blogs/edit/{id}', [EditorController::class, 'edit'])->name('editor.blog.edit');
    Route::post('/editor/blogs/edit/{id}', [EditorController::class, 'update'])->name('editor.blog.update');


        // Editor category pages backend

        Route::get('/editor/category/list', [EditorCatatoryContorller::class, 'index'])->name('editor.category.index');
        Route::get('/editor/category/create', [EditorCatatoryContorller::class, 'create'])->name('editor.category.create');
        Route::post('/editor/category/save', [EditorCatatoryContorller::class, 'save'])->name('editor.category.save');
        Route::get('/editor/category/edit/{id}', [EditorCatatoryContorller::class, 'edit'])->name('editor.category.edit');
        Route::post('/editor/category/edit/{id}', [EditorCatatoryContorller::class, 'update'])->name('editor.category.update');
        Route::get('/editor/category/delete/{id}', [EditorCatatoryContorller::class, 'delete'])->name('editor.category.delete');



        // Editor brand pages backend

        Route::get('/editor/brand/list', [EditorBrandContorller::class, 'index'])->name('editor.brand.index');
        Route::get('/editor/brand/create', [EditorBrandContorller::class, 'create'])->name('editor.brand.create');
        Route::post('/editor/brand/save', [EditorBrandContorller::class, 'save'])->name('editor.brand.save');
        Route::get('/editor/brand/edit/{id}', [EditorBrandContorller::class, 'edit'])->name('editor.brand.edit');
        Route::post('/editor/brand/edit/{id}', [EditorBrandContorller::class, 'update'])->name('editor.brand.update');
        Route::get('/editor/brand/delete/{id}', [EditorBrandContorller::class, 'delete'])->name('editor.brand.delete');


    // Editor Blog category pages backend

    Route::get('/editor/blogcategory/list', [EditorBlogCatagoryContorller::class, 'index'])->name('editor.blogcategory.index');
    Route::get('/editor/blogcategory/create', [EditorBlogCatagoryContorller::class, 'create'])->name('editor.blogcategory.create');
    Route::post('/editor/blogcategory/save', [EditorBlogCatagoryContorller::class, 'save'])->name('editor.blogcategory.save');
    Route::get('/editor/blogcategory/edit/{id}', [EditorBlogCatagoryContorller::class, 'edit'])->name('editor.blogcategory.edit');
    Route::post('/editor/blogcategory/edit/{id}', [EditorBlogCatagoryContorller::class, 'update'])->name('editor.blogcategory.update');
    Route::get('/editor/blogcategory/delete/{id}', [EditorBlogCatagoryContorller::class, 'delete'])->name('editor.blogcategory.delete');










    Route::get('/editor/product/list', [EditorProductContorller::class, 'index'])->name('editor.product.index');
    Route::get('/editor/product/create', [EditorProductContorller::class, 'create'])->name('editor.product.create');
    Route::post('/editor/product/save', [EditorProductContorller::class, 'save'])->name('editor.product.save');
    Route::get('/editor/product/edit/{id}', [EditorProductContorller::class, 'edit'])->name('editor.product.edit');
    Route::post('/editor/product/edit/{id}', [EditorProductContorller::class, 'update'])->name('editor.product.update');

    Route::post('/editor-get-catagory-data', [EditorProductContorller::class, 'getcagorydata']);






    Route::post('/editor/heroslider/temp', [TempImageFacultyContoller::class, 'upload'])->name('editor.heroslider.temp');







    //Assignment Backend Pages:

    Route::post('/faculty/assignment/savefaculrysection', [CourseAssimentController::class, 'savefaculrysection'])->name('faculty.assignment.savefaculrysection');
    Route::post('/faculty/assignment/savefaculrytimeslot', [CourseAssimentController::class, 'savefaculrytimeslot'])->name('faculty.assignment.savefaculrytimeslot');
    Route::get('/faculty/assignment/edit/{id}', [CourseAssimentController::class, 'edit'])->name('faculty.assignment.edit');
    Route::get('/faculty/assignment/delete/{id}', [CourseAssimentController::class, 'delete'])->name('faculty.assignment.delete');
    Route::post('/faculty/assignment/update/{id}', [CourseFacultyAssignment::class, 'update'])->name('faculty.assignment.update');
    Route::get('/faculty/assignment/list', [CourseAssimentController::class, 'index'])->name('faculty.assignment.index');
    Route::get('/faculty/assignment/create', [CourseAssimentController::class, 'create'])->name('faculty.assignment.create');
    Route::post('/faculty/assignment/save', [CourseAssimentController::class, 'save'])->name('faculty.assignment.save');
    Route::get('/faculty/assignment/getsectionfacluty', [CourseAssimentController::class, 'getsectionfacluty'])->name('faculty.assignment.getsectionfacluty');
    Route::get('/faculty/assignment/gettimeslotfaculty', [CourseAssimentController::class, 'gettimeslotfaculty'])->name('faculty.assignment.gettimeslotfaculty');
    Route::post('/timslot-get-all-deta', [CourseAssimentController::class, 'timeslotdataget']);
    Route::post('/checkthecriditlessthe11', [CourseAssimentController::class, 'checkthecriditlessthe11']);

    //course for faculty:
    Route::get('/faculty/course/list', [CoursesController::class, 'index'])->name('faculty.courselist.index');

    // Get faculty studtnt for spicifiy course
    Route::get('/faculty/viewstudent/{id}/{course}', [CoursesController::class, 'getstudents'])->name('faculty.viewstudent.list');



});










Route::group(['middleware' => 'auth'], function () {
    Route::get('/student/dashbord', [UserDeshbordContoller::class, 'dashbord'])->name('user.dashbord.index');

});

//Fontend pages

Route::get('/', [FontendHomeController::class, 'index'])->name('fontend.home');
Route::get('/faculty/detail/{id}', [FontendHomeController::class, 'detail'])->name('fontend.faculty.detail');

Route::get('/contact', [ContactController::class, 'index'])->name('fontend.contact');

// Service pages fontend.

Route::get('/service', [ServicesController::class, 'index'])->name('fontend.service');

// Blog pages fontend.

Route::get('/blog', [BlogController::class, 'index'])->name('fontend.blog');
Route::get('/blog/detail/{id}', [BlogController::class, 'detail'])->name('fontend.blog.detail');
Route::post('/blog/savecomment', [BlogController::class, 'savecomment'])->name('fontend.blog.commentsave');
Route::get('/blog/comment/show', [BlogController::class, 'showcomment']);

// Faq pages fontend.

Route::get('/faq', [FaqController::class, 'index'])->name('fontend.faq');

// Manage Pages fontend.
// Route::get('/about',[AboutController::class, 'index'])->name('fontend.about');
Route::get('/about', [ManagePageContorller::class, 'about'])->name('fontend.about');
Route::get('/privacy', [ManagePageContorller::class, 'privacy'])->name('fontend.privacy');
Route::get('/terms', [ManagePageContorller::class, 'terms'])->name('fontend.terms');

// Product pages fontend.

Route::get('/product', [ProductController::class, 'index'])->name('fontend.product');
Route::get('/product/detail/{id}', [ProductController::class, 'detail'])->name('fontend.product.detail');



Route::get('/catagorys/detail/{id}', [FeaturedCategoryController::class, 'index'])->name('fontend.catagorys');

Route::get('blog/catagorys/detail/{id}', [BlogCatagoryController::class, 'index'])->name('fontend.catagorys');






// ..............End fontend...........//
