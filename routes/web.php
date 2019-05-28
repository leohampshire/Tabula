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



Route::group(['prefix' => 'curso', 'as' => 'course.'], function(){
  Route::post('/checked', 'User\CourseController@classChecked')->name('checked');
  Route::post('pergunta', 'User\CourseController@question')->name('question');
  Route::get('/item/', 'User\CourseController@getClass')->name('getclass');
  Route::post('/test/', 'User\CourseController@testValidate')->name('test');
  Route::get('/aula/{id}', 'User\CourseController@class')->name('class');
  Route::get('/forum/{id}', 'User\CourseController@forum')->name('forum');
  Route::get('/{urn}', 'User\CourseController@course')->name('single');
});


Route::group(['prefix' => 'user', 'as' => 'user.'], function(){
  Route::get('/', 'User\UserController@userPanel')->name('panel');
  Route::post('/update', 'User\UserController@update')->name('update');
  Route::post('/rating', 'User\RatingController@rating')->name('rating');

  Route::get('/meus-cursos', 'User\UserController@contentMyCourses')->name('my.course');
  Route::get('/pedidos', 'User\UserController@contentOrders')->name('orders');
  Route::get('/pedido/{id}', 'User\UserController@contentThisOrder')->name('order');
  //PAINEIS VIA AJAX
  Route::get('/pessoais', 'User\UserController@contentPersonal')->name('personal');
  Route::get('/leciono', 'User\UserController@contentTeachCourse')->name('teach');

  Route::group(['prefix' => 'curso', 'as' => 'course.'], function(){
    Route::get('/criar', 'User\UserController@contentCreateCourse')->name('create');
    Route::get('/editar/{id}', 'User\UserController@contentCourseEdit')->name('edit');
    Route::get('/liberar-empresa/{course}', 'Company\CompanyController@avaliable')->name('company');
    Route::get('/liberar/{id}', 'User\CourseController@avaliable')->name('avaliable');
    Route::get('/incluir-item/{id}', 'User\UserController@contentCourseItem')->name('item');
  });
  Route::group(['prefix' => 'professor', 'as' => 'teacher.'], function(){
    Route::get('/criar', 'User\UserController@contentTeacher')->name('index');
    Route::post('/incluir', 'Company\CompanyController@include')->name('include');
    Route::get('/remover/{id}', 'Company\CompanyController@deleteTeacher')->name('delete');
  });
});

Route::get('/pesquisar/{id}', 'User\SearchController@search')->name('search.single');
Route::get('searchcat', 'User\SearchController@searchCat')->name('search.category');



Route::group(['prefix' => 'professor', 'as' => 'teacher.'], function(){
  Route::get('seja-professor', 'Teacher\TeacherController@beTeacher')->name('be');
  Route::post('store', 'Teacher\TeacherController@storeAnswer')->name('store');
  Route::get('delete/{id}', 'Teacher\TeacherController@deleteAnswer')->name('delete');
  Route::get('ver-professor', 'Teacher\TeacherController@seeTeacher')->name('see');

  //CURSOS
  Route::group(['prefix' => 'curso', 'as' => 'course.'], function(){
    Route::post('/store', 'Admin\AdminCourseController@store')->name('store');
    Route::get('subcategoria-curso', 'Admin\AdminCourseController@SubCourse')->name('subcategory');    
    Route::post('/update', 'Admin\AdminCourseController@update')->name('update');
    Route::get('/editar/{id}', 'Teacher\TeacherController@courseEdit')->name('edit');
    Route::group(['prefix'=> 'capitulo', 'as' => 'chapter.'], function(){
      Route::post('/store', 'Admin\AdminCourseController@storeChapter')->name('store');
      Route::post('/update', 'Admin\AdminCourseController@updateChapter')->name('update');
      Route::get('delete/{id}', 'Admin\AdminCourseController@deleteChapter')->name('delete');
    });
    Route::group(['prefix'=> 'item', 'as' => 'item.'], function(){
      Route::get('/prova/{id}', 'Teacher\TeacherController@createTest')->name('test');
      Route::get('/gratis/{id}', 'Admin\AdminCourseController@free')->name('free');
      Route::post('/store', 'Admin\AdminCourseController@storeItem')->name('store');
      Route::post('/update', 'Admin\AdminCourseController@updateitem')->name('update');
      Route::get('/delete/{id}', 'Admin\AdminCourseController@deleteItem')->name('delete');
    });
  });
});


//CARRINHO
Route::group(['prefix' => 'comprar', 'as' => 'cart.'], function(){
  Route::get('/checkout', 'User\CartController@checkout')->name('checkout');
  Route::get('/inserir/sessao', 'User\CartController@sessionCourseIntoCart')->name('session');
  Route::get('/inserir/{id}/carrinho', 'User\CartController@insertCourseIntoCart')->name('insert');
  Route::get('/inserir/{id}/remover', 'User\CartController@removeCourseIntoCart')->name('remove');
  Route::get('/inserir/{id}/finalizar', 'User\CartController@insertCourseIntoFinish')->name('finish');

});



Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware' => ['admin']], function () {
  Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('dashboard');
  //USUARIOS ADMIN
  Route::group(['prefix' => 'usuario', 'as' => 'user.'], function(){
      Route::get('/', 'Admin\AdminUserController@index')->name('index');
      Route::get('/create', 'Admin\AdminUserController@create')->name('create');
      Route::post('/store', 'Admin\AdminUserController@store')->name('store');
      Route::get('/edit/{id}/', 'Admin\AdminUserController@edit')->name('edit');
      Route::post('/update/{id}/', 'Admin\AdminUserController@update')->name('update');
      Route::get('/delete/{id}/', 'Admin\AdminUserController@delete')->name('delete');
  });
  //ADMINISTRADORES ADMIN
  Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
      Route::get('/', 'Admin\AdminController@index')->name('index');
      Route::get('/create', 'Admin\AdminController@create')->name('create');
      Route::post('/store', 'Admin\AdminController@store')->name('store');
      Route::get('/edit/{id}/', 'Admin\AdminController@edit')->name('edit');
      Route::post('/update/{id}/', 'Admin\AdminController@update')->name('update');
      Route::get('/delete/{id}/', 'Admin\AdminController@delete')->name('delete');
  });

  Route::group(['prefix' => 'configuracao', 'as' => 'configuration.'], function(){
      Route::get('/', 'Admin\AdminController@configuration')->name('index');
      Route::get('/taxa', 'Admin\AdminController@taxa')->name('taxa');
      Route::post('/taxa', 'Admin\AdminController@taxaUpdate');
      Route::post('/update/', 'Admin\AdminController@update')->name('update');
  });

  //EMPRESAS ADMIN
  Route::group(['prefix' => 'empresa', 'as' => 'company.'], function(){
      Route::get('/', 'Admin\AdminCompanyController@index')->name('index');
      Route::get('/create', 'Admin\AdminCompanyController@create')->name('create');
      Route::post('/incluir', 'Admin\AdminCompanyController@include')->name('include');
      Route::post('/store', 'Admin\AdminCompanyController@store')->name('store');
      Route::get('/edit/{id}', 'Admin\AdminCompanyController@edit')->name('edit');
      Route::post('/update/{id}', 'Admin\AdminCompanyController@update')->name('update');
      Route::get('/delete/{id}', 'Admin\AdminCompanyController@delete')->name('delete');
  });
  //CATEGORIAS ADMIN
  Route::group(['prefix' => 'categoria', 'as' => 'category.'], function(){
      Route::get('/', 'Admin\AdminCategoryController@index')->name('index');
      Route::get('/create', 'Admin\AdminCategoryController@create')->name('create');
      Route::post('/store', 'Admin\AdminCategoryController@store')->name('store');
      Route::get('/edit/{id}', 'Admin\AdminCategoryController@edit')->name('edit');
      Route::post('/update', 'Admin\AdminCategoryController@update')->name('update');
      Route::get('/delete/{id}', 'Admin\AdminCategoryController@delete')->name('delete');
  });
  //SUBCATEGORIAS ADMIN
  Route::group(['prefix' => 'subcategoria', 'as' => 'subcategory.'], function(){
      Route::get('/', 'Admin\AdminSubcategoryController@index')->name('index');
      Route::get('/create', 'Admin\AdminSubcategoryController@create')->name('create');
      Route::post('/store', 'Admin\AdminSubcategoryController@store')->name('store');
      Route::get('/edit/{id}', 'Admin\AdminSubcategoryController@edit')->name('edit');
      Route::post('/update', 'Admin\AdminSubcategoryController@update')->name('update');
      Route::get('/delete/{id}', 'Admin\AdminSubcategoryController@delete')->name('delete');
  });
  Route::group(['prefix' =>'analise', 'as' => 'analyze.'], function(){
    Route::get('/', 'Admin\AdminCourseController@indexAnalyze')->name('index');
  });
  //CURSOS ADMIN
  Route::group(['prefix' => 'curso', 'as' => 'course.'], function(){
      Route::get('/', 'Admin\AdminCourseController@index')->name('index');
      Route::get('subcategoria-curso', 'Admin\AdminCourseController@SubCourse')->name('subcategory');
      Route::get('/create', 'Admin\AdminCourseController@create')->name('create');
      Route::post('/store', 'Admin\AdminCourseController@store')->name('store');
      Route::get('/editar/{id}', 'Admin\AdminCourseController@edit')->name('edit');
      Route::get('/disponibilizar/{id}', 'Admin\AdminCourseController@avaliable')->name('avaliable');
      Route::get('/visualizar/{id}', 'Admin\AdminCourseController@show')->name('show');
      Route::post('/update', 'Admin\AdminCourseController@update')->name('update');
      Route::get('/delete/{id}', 'Admin\AdminCourseController@delete')->name('delete');
      Route::get('/aluno/{id}', 'Admin\AdminCourseController@student')->name('student');
      Route::group(['prefix'=> 'aluno', 'as' => 'student.'], function(){
        Route::post('incluir/', 'Admin\AdminCourseController@studentInclude')->name('include');
        Route::get('certificado/{student}/{course}', 'Admin\AdminCourseController@certificate')->name('certificate');
        Route::get('reiniciar/{course_id}/{user_id}', 'Admin\AdminCourseController@studentRestart')->name('restart');
      });
      //CAPITULOS CURSO ADMIN
      Route::group(['prefix'=> 'capitulo', 'as' => 'chapter.'], function(){
        Route::post('/store', 'Admin\AdminCourseController@storeChapter')->name('store');
        Route::post('/update', 'Admin\AdminCourseController@updateChapter')->name('update');
        Route::get('/delete/{id}', 'Admin\AdminCourseController@deleteChapter')->name('delete');
        Route::get('/item/{id}', 'Admin\AdminCourseController@itemChapter')->name('item');
      });
      //ITENS CURSO ADMIN
      Route::group(['prefix'=> 'item', 'as' => 'item.'], function(){
        Route::get('/prova/{id}', 'Admin\AdminCourseController@createTest')->name('test');
        Route::get('/gratis/{id}', 'Admin\AdminCourseController@free')->name('free');
        Route::post('/store', 'Admin\AdminCourseController@storeItem')->name('store');
        Route::post('/update', 'Admin\AdminCourseController@updateitem')->name('update');
        Route::get('/delete/{id}', 'Admin\AdminCourseController@deleteItem')->name('delete');
      });
  });
  //CUPONS ADMIN
  Route::group(['prefix' => 'cupom', 'as' => 'coupon.'], function(){
    Route::get('/index', 'Admin\AdminCouponController@index')->name('index');
    Route::post('/pesquisar', 'Admin\AdminCouponController@search')->name('search');
    Route::get('/create', 'Admin\AdminCouponController@create')->name('create');
    Route::post('/store', 'Admin\AdminCouponController@store')->name('store');
    Route::get('/edit/{id}', 'Admin\AdminCouponController@edit')->name('edit');
    Route::post('/update', 'Admin\AdminCouponController@update')->name('update');
    Route::get('/delete/{id}', 'Admin\AdminCouponController@delete')->name('delete');
  });

    //SEOS ADMIN
  Route::group(['prefix' => 'seo', 'as' => 'seo.'], function(){
    Route::get('/index', 'Admin\AdminSeoController@index')->name('index');
    Route::get('/create', 'Admin\AdminSeoController@create')->name('create');
    Route::post('/store', 'Admin\AdminSeoController@store')->name('store');
    Route::get('/edit/{id}', 'Admin\AdminSeoController@edit')->name('edit');
    Route::post('/update', 'Admin\AdminSeoController@update')->name('update');
    Route::get('/delete/{id}', 'Admin\AdminSeoController@delete')->name('delete');
  });
    //PROMOCOES ADMIN
  Route::group(['prefix' => 'promocao', 'as' => 'promotion.'], function(){
    Route::get('/index', 'Admin\AdminPromotionController@index')->name('index');
    Route::get('/create', 'Admin\AdminPromotionController@create')->name('create');
    Route::post('/store', 'Admin\AdminPromotionController@store')->name('store');
    Route::get('/edit/{promotion}', 'Admin\AdminPromotionController@edit')->name('edit');
    Route::post('/update', 'Admin\AdminPromotionController@update')->name('update');
    Route::get('/delete/{promotion}', 'Admin\AdminPromotionController@delete')->name('delete');
  });

  //CATEGORIAS BLOG ADMIN
  Route::group(['prefix' => 'categoria-blog', 'as' => 'categ.blog.'], function(){
      Route::get('/index', 'Admin\AdminBlogController@indexCateg')->name('index');
      Route::get('/create', 'Admin\AdminBlogController@createCateg')->name('create');
      Route::post('/store', 'Admin\AdminBlogController@storeCateg')->name('store');
      Route::get('/edit/{id}', 'Admin\AdminBlogController@editCateg')->name('edit');
      Route::post('/update', 'Admin\AdminBlogController@updateCateg')->name('update');
      Route::get('/delete/{id}', 'Admin\AdminBlogController@deleteCateg')->name('delete');
  });
  //POSTS ADMIN
  Route::group(['prefix' => 'post-blog', 'as' => 'post.blog.'], function(){
      Route::get('/index', 'Admin\AdminBlogController@indexPost')->name('index');
      Route::get('/create', 'Admin\AdminBlogController@createPost')->name('create');
      Route::post('/store', 'Admin\AdminBlogController@storePost')->name('store');
      Route::get('/edit/{id}', 'Admin\AdminBlogController@editPost')->name('edit');
      Route::post('/update', 'Admin\AdminBlogController@updatePost')->name('update');
      Route::get('/delete/{id}', 'Admin\AdminBlogController@deletePost')->name('delete');
  });

  //PAGINAS ADMIN
  Route::group(['prefix' => 'paginas', 'as' => 'page.'], function(){
      Route::get('/index', 'Admin\AdminPageController@index')->name('index');
      Route::get('/edit/{id}', 'Admin\AdminPageController@edit')->name('edit');
      Route::post('/update', 'Admin\AdminPageController@update')->name('update');
  });
});
//AUTH ADMIN
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
  //LOGIN ADMIN
  Route::get('/', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::get('/logout', 'AdminAuth\LoginController@logout')->name('logout');
//REGISTRO ADMIN
  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');
//RECUPERACAO DE SENHA ADMIN
  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'user'], function () {
  Route::get('/login', 'UserAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'UserAuth\LoginController@login');
  Route::get('/logout', 'UserAuth\LoginController@logout')->name('user.logout');

  Route::get('/register', 'UserAuth\RegisterController@showRegistrationForm')->name('user.register');
  Route::post('/register', 'UserAuth\RegisterController@register');

  Route::post('/password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'UserAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'empresa', 'as' => 'company.'], function () {
  Route::get('/', 'User\UserController@userPanel')->name('panel');
  Route::get('/register', 'UserAuth\RegisterController@showRegistrationCompany')->name('register');
  
});



Route::group(['prefix' => 'company'], function () {
  Route::get('/login', 'CompanyAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'CompanyAuth\LoginController@login');
  Route::post('/logout', 'CompanyAuth\LoginController@logout')->name('logout');

  Route::post('/register', 'CompanyAuth\RegisterController@register');

  Route::post('/password/email', 'CompanyAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'CompanyAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'CompanyAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'CompanyAuth\ResetPasswordController@showResetForm');
});

Route::get('/', 'User\HomeController@index')->name('home');
Route::get('todos-professores', 'User\HomeController@allTeachers')->name('all-teachers');
Route::get('todas-empresas', 'User\HomeController@allCompanies')->name('all-companies');
Route::get('professor/{id}', 'User\HomeController@teacher')->name('teacher');
Route::get('empresa/{id}', 'User\HomeController@company')->name('company');

Route::get('/carrinho', 'User\CartController@cart')->name('cart');
Route::post('/carrinho/cupom', 'User\CartController@coupon')->name('coupon');
Route::post('/transaction', 'User\TransactionController@statusTransaction')->name('transaction');
Route::get('/categoria/{urn}', 'User\CategoryController@category')->name('category');
Route::get('/{urn}', 'User\HomeController@pages')->name('page');

Route::get('facebook', function () {
    return view('facebook');
});

Route::get('auth/facebook', 'Admin\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Admin\FacebookController@handleFacebookCallback');

Route::post('transaction/pagarme', 'User\TransactionController@pagarme');
Route::get('transaction/callback', 'User\TransactionController@callback')->name('callback');
Route::post('dados-bancarios/', 'User\TransactionController@getRecipient')->name('bank-data');