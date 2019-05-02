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
Route::get('/', 'User\HomeController@index')->name('index');


Route::get('curso/{urn}', 'User\CourseController@course')->name('course');



Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware' => ['admin']], function () {
  Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('dashboard');
  //Usuários
  Route::group(['prefix' => 'usuario', 'as' => 'user.'], function(){
      Route::get('/', 'Admin\AdminUserController@index')->name('index');
      Route::get('/create', 'Admin\AdminUserController@create')->name('create');
      Route::post('/store', 'Admin\AdminUserController@store')->name('store');
      Route::get('/edit/{id}/{type_id}', 'Admin\AdminUserController@edit')->name('edit');
      Route::get('/update/{id}/{type_id}', 'Admin\AdminUserController@update')->name('update');
      Route::get('/delete/{id}/{type_id}', 'Admin\AdminUserController@delete')->name('delete');
  });

  //Usuários
  Route::group(['prefix' => 'empresa', 'as' => 'company.'], function(){
      Route::get('/', 'Admin\AdminCompanyController@index')->name('index');
      Route::get('/create', 'Admin\AdminCompanyController@create')->name('create');
      Route::post('/incluir', 'Admin\AdminCompanyController@include')->name('include');
      Route::post('/store', 'Admin\AdminCompanyController@store')->name('store');
      Route::get('/edit/{id}', 'Admin\AdminCompanyController@edit')->name('edit');
      Route::post('/update/{id}', 'Admin\AdminCompanyController@update')->name('update');
      Route::get('/delete/{id}', 'Admin\AdminCompanyController@delete')->name('delete');
  });
  //Categorias
  Route::group(['prefix' => 'categoria', 'as' => 'category.'], function(){
      Route::get('/', 'Admin\AdminCategoryController@index')->name('index');
      Route::get('/create', 'Admin\AdminCategoryController@create')->name('create');
      Route::post('/store', 'Admin\AdminCategoryController@store')->name('store');
      Route::get('/edit/{id}', 'Admin\AdminCategoryController@edit')->name('edit');
      Route::post('/update', 'Admin\AdminCategoryController@update')->name('update');
      Route::get('/delete/{id}', 'Admin\AdminCategoryController@delete')->name('delete');
  });
  //Subcategorias
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
  //Cursos
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
      //capitulos do curso
      Route::group(['prefix'=> 'capitulo', 'as' => 'chapter.'], function(){
        Route::post('/store', 'Admin\AdminCourseController@storeChapter')->name('store');
        Route::post('/update', 'Admin\AdminCourseController@updateChapter')->name('update');
        Route::get('/delete/{id}', 'Admin\AdminCourseController@deleteChapter')->name('delete');
        Route::get('/item/{id}', 'Admin\AdminCourseController@itemChapter')->name('item');
      });
      //Itens do curso
      Route::group(['prefix'=> 'item', 'as' => 'item.'], function(){
        Route::get('/prova/{id}', 'Admin\AdminCourseController@createTest')->name('test');
        Route::get('/gratis/{id}', 'Admin\AdminCourseController@free')->name('free');
        Route::post('/store', 'Admin\AdminCourseController@storeItem')->name('store');
        Route::post('/update', 'Admin\AdminCourseController@updateitem')->name('update');
        Route::get('/delete/{id}', 'Admin\AdminCourseController@deleteItem')->name('delete');
      });
  });
  //Cupons
  Route::group(['prefix' => 'cupom', 'as' => 'coupon.'], function(){
    Route::get('/index', 'Admin\AdminCouponController@index')->name('index');
    Route::post('/pesquisar', 'Admin\AdminCouponController@search')->name('search');
    Route::get('/create', 'Admin\AdminCouponController@create')->name('create');
    Route::post('/store', 'Admin\AdminCouponController@store')->name('store');
    Route::get('/edit/{id}', 'Admin\AdminCouponController@edit')->name('edit');
    Route::post('/update', 'Admin\AdminCouponController@update')->name('update');
    Route::get('/delete/{id}', 'Admin\AdminCouponController@delete')->name('delete');
  });

    //Seos
  Route::group(['prefix' => 'seo', 'as' => 'seo.'], function(){
    Route::get('/index', 'Admin\AdminSeoController@index')->name('index');
    Route::post('/pesquisar', 'Admin\AdminSeoController@search')->name('search');
    Route::get('/create', 'Admin\AdminSeoController@create')->name('create');
    Route::post('/store', 'Admin\AdminSeoController@store')->name('store');
    Route::get('/edit/{id}', 'Admin\AdminSeoController@edit')->name('edit');
    Route::post('/update', 'Admin\AdminSeoController@update')->name('update');
    Route::get('/delete/{id}', 'Admin\AdminSeoController@delete')->name('delete');
  });




  //Categorias Blog
  Route::group(['prefix' => 'categoria-blog', 'as' => 'categ.blog.'], function(){
      Route::get('/index', 'Admin\AdminBlogController@indexCateg')->name('index');
      Route::get('/create', 'Admin\AdminBlogController@createCateg')->name('create');
      Route::post('/store', 'Admin\AdminBlogController@storeCateg')->name('store');
      Route::get('/edit/{id}', 'Admin\AdminBlogController@editCateg')->name('edit');
      Route::post('/update', 'Admin\AdminBlogController@updateCateg')->name('update');
      Route::get('/delete/{id}', 'Admin\AdminBlogController@deleteCateg')->name('delete');
  });
  //Posts Blog
  Route::group(['prefix' => 'post-blog', 'as' => 'post.blog.'], function(){
      Route::get('/index', 'Admin\AdminBlogController@indexPost')->name('index');
      Route::get('/create', 'Admin\AdminBlogController@createPost')->name('create');
      Route::post('/store', 'Admin\AdminBlogController@storePost')->name('store');
      Route::get('/edit/{id}', 'Admin\AdminBlogController@editPost')->name('edit');
      Route::post('/update', 'Admin\AdminBlogController@updatePost')->name('update');
      Route::get('/delete/{id}', 'Admin\AdminBlogController@deletePost')->name('delete');
  });

  //Paginas
  Route::group(['prefix' => 'paginas', 'as' => 'page.'], function(){
      Route::get('/index', 'Admin\AdminPageController@index')->name('index');
      Route::get('/edit/{id}', 'Admin\AdminPageController@edit')->name('edit');
      Route::post('/update', 'Admin\AdminPageController@update')->name('update');
  });
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
  //login
  Route::get('/', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::get('/logout', 'AdminAuth\LoginController@logout')->name('logout');
//Registro
  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');
//Recuperacao de senha
  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});


Route::group(['prefix' => 'user'], function () {
  Route::get('/login', 'UserAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'UserAuth\LoginController@login');
  Route::post('/logout', 'UserAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'UserAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'UserAuth\RegisterController@register');

  Route::post('/password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'UserAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'company'], function () {
  Route::get('/login', 'CompanyAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'CompanyAuth\LoginController@login');
  Route::post('/logout', 'CompanyAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'CompanyAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'CompanyAuth\RegisterController@register');

  Route::post('/password/email', 'CompanyAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'CompanyAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'CompanyAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'CompanyAuth\ResetPasswordController@showResetForm');
});
