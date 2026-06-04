<?php

use App\Models\User;
use App\Models\Agenda;
use App\Models\Slider;
use App\Models\Ourteam;
use App\Models\Partner;
use App\Models\Category;
use App\Models\Identity;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProspekController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\TimelineController;


use App\Http\Controllers\UnggulanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\Post\AgendaController;
use App\Http\Controllers\TestimoniesController;
use App\Http\Controllers\ArchievementController;
use App\Http\Controllers\FaqCategoriesController;
use App\Http\Controllers\Profile\AboutController;
use App\Http\Controllers\Profile\OurteamController;
use App\Http\Controllers\Profile\PartnerController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Profile\DataValueController;
use App\Http\Controllers\Setting_menu\MetaController;
use App\Http\Controllers\StudentActivitiesController;

use App\Http\Controllers\Setting_menu\SliderController;
use App\Http\Controllers\Profile\LegalDocumentController;
use App\Http\Controllers\Setting_menu\IdentityController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Setting_menu\SideBannerController;


Route::get('/login', function () {
    return view('/auth/login');
})->name('login');

Route::get('/', function () {
    return redirect()->route('login');
});

    // Route::middleware('auth')->group(function () {
    //        // 2FA
    // Route::get('/two-factor', [TwoFactorController::class, 'index'])->name('two-factor.index');
    // Route::post('/two-factor', [TwoFactorController::class, 'verify'])->name('two-factor.verify'); 
    // });


Route::middleware(['auth'])->group(function () {

// dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
    Route::put('/profile/update/{user}', [ProfileController::class, 'update'])->name('profile.update');


    Route::get('/data_value', [DataValueController::class, 'index'])->name('dataValue.index');
    Route::put('/data_value', [DataValueController::class, 'update'])->name('dataValue.update');
    // POST

    Route::get('/view_post', [PostController::class, 'index'])->name('posts.index');

    Route::get('/create_post', [PostController::class, 'create'])->name('posts.create');

    Route::post('/upload_post', [PostController::class, 'store'])->name('posts.store');

    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}/delete', [PostController::class, 'destroy'])->name('post.delete');

    // Categories
    Route::get('/view_category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create_category', [CategoryController::class, 'create'])->name('category.create');

    Route::post('/upload_category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}/delete', [CategoryController::class, 'destroy'])->name('category.delete');




    // Menu Setting
    // Identity
    Route::get('/identity', [IdentityController::class, 'index'])->name('identity.index');
    Route::post('/identityStore', [IdentityController::class, 'store'])->name('identity.store');
    Route::put('/identityUpdate', [IdentityController::class, 'update'])->name('identity.update');

    // Side Banner 
    Route::get('/side_banner', [SideBannerController::class, 'index'])->name('sideBanner.index');
    Route::post('/side_bannerStore', [SideBannerController::class, 'store'])->name('sideBanner.store');
    Route::put('/side_bannerUpdate', [SideBannerController::class, 'update'])->name('sideBanner.update');

    // Sliders
    Route::get('/view_slider', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/create_slider', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/upload_slider', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('/slider/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('/slider/{id}/delete', [SliderController::class, 'destroy'])->name('slider.delete');


    // Meta
    Route::get('/view_meta', [MetaController::class, 'index'])->name('meta.index');
    Route::put('/meta', [MetaController::class, 'update'])->name('meta.update');

    Route::get('/view_google', [MetaController::class, 'google'])->name('google.index');
    Route::put('/google', [MetaController::class, 'googleUpdate'])->name('google.update');

    Route::get('/view_chat', [MetaController::class, 'chat'])->name('chat.index');
    Route::put('/chat', [MetaController::class, 'chatUpdate'])->name('chat.update');


    // Menu Profile
    // About Us
    Route::get('/view_ourteam', [OurteamController::class, 'index'])->name('ourteam.index');
    Route::get('/create_ourteam', [OurteamController::class, 'create'])->name('ourteam.create');
    Route::post('/upload_ourteam', [OurteamController::class, 'store'])->name('ourteam.store');
    Route::get('/ourteam/{id}/edit', [OurteamController::class, 'edit'])->name('ourteam.edit');
    Route::put('/ourteam/{id}', [OurteamController::class, 'update'])->name('ourteam.update');
    Route::delete('/ourteam/{id}/delete', [OurteamController::class, 'destroy'])->name('ourteam.delete');

    // Partners
    Route::get('/view_partner', [PartnerController::class, 'index'])->name('partner.index');
    Route::get('/create_partner', [PartnerController::class, 'create'])->name('partner.create');
    Route::post('/upload_partner', [PartnerController::class, 'store'])->name('partner.store');
    Route::get('/partner/{id}/edit', [PartnerController::class, 'edit'])->name('partner.edit');
    Route::put('/partner/{id}', [PartnerController::class, 'update'])->name('partner.update');
    Route::delete('/partner/{id}/delete', [PartnerController::class, 'destroy'])->name('partner.delete');


    // Legal Documents
    Route::get('/view_document', [LegalDocumentController::class, 'index'])->name('legalDocument.index');
    Route::get('/create_document', [LegalDocumentController::class, 'create'])->name('legalDocument.create');
    Route::post('/upload_document', [LegalDocumentController::class, 'store'])->name('legalDocument.store');
    Route::get('/document/{id}/edit', [LegalDocumentController::class, 'edit'])->name('legalDocument.edit');
    Route::put('/document/{id}', [LegalDocumentController::class, 'update'])->name('legalDocument.update');
    Route::delete('/document/{id}/delete', [LegalDocumentController::class, 'destroy'])->name('legalDocument.delete');

    // Users
    Route::resources([
        'users' => UsersController::class,
    ]);

    // Departement
    Route::resources([
        'departement' => DepartementController::class,
    ]);
    Route::get('/departement/step2/{id}', [DepartementController::class, 'step2'])->name('departement.step2');
    Route::get('/departement/step3/{id}', [DepartementController::class, 'step3'])->name('departement.step3');
    Route::put('/departement/step2/update/{id}', [DepartementController::class, 'step2Update'])->name('departement.update.step2');
    Route::put('/departement/step3/update/{id}', [DepartementController::class, 'step3Update'])->name('departement.update.step3');

    // USP
    Route::resources([
        'unggulan' => UnggulanController::class,
    ]);
    
    // prospek
    Route::resources([
        'prospek' => ProspekController::class,
    ]);
    
    // Kurikulum
    Route::resources([
        'kurikulum' => KurikulumController::class,
    ]);

    // Fasilitas
    Route::resources([
        'fasilitas' => FacilityController::class,
    ]);

    // achievement
    Route::resources([
        'achievement' => ArchievementController::class,
    ]);

    // achievement
    Route::resources([
        'organization' => StudentActivitiesController::class,
    ]);

    // achievement
    Route::resources([
        'testimoni' => TestimoniesController::class,
    ]);

    // suport
    Route::resources([
        'suport' => SupportController::class,
    ]);

    // suport
    Route::resources([
        'portofolio' => PortofolioController::class,
    ]);

    // FAQs
    Route::resources([
        'faq' => FaqsController::class,
    ]);
    // Jurnals
    Route::resources([
        'jurnal' => JurnalController::class,
    ]);

    // Timelines
    Route::resources([
        'timeline' => TimelineController::class,
    ]);

    // FAQ Categories
    Route::resources([
        'faqcategories' => FaqCategoriesController::class,
    ]);

    // Faculty
    Route::resources([
        'faculty' => FacultyController::class,
    ]);
    Route::get('/faculty/step2/{id}', [FacultyController::class, 'step2'])->name('faculty.step2');
    Route::get('/faculty/step3/{id}', [FacultyController::class, 'step3'])->name('faculty.step3');
    Route::put('/faculty/step2/update/{id}', [FacultyController::class, 'step2Update'])->name('faculty.update.step2');
    Route::put('/faculty/step3/update/{id}', [FacultyController::class, 'step3Update'])->name('faculty.update.step3');

    Route::get('/view_agenda', [AgendaController::class, 'index'])->name('agenda.index');
    Route::get('/create_agenda', [AgendaController::class, 'create'])->name('agenda.create');
    Route::post('/upload_agenda', [AgendaController::class, 'store'])->name('agenda.store');
    Route::get('/agenda/{id}/edit', [AgendaController::class, 'edit'])->name('agenda.edit');
    Route::put('/agenda/{id}', [AgendaController::class, 'update'])->name('agenda.update');
    Route::delete('/agenda/{id}/delete', [AgendaController::class, 'destroy'])->name('agenda.delete');
});