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

Route::get('/', function () {
	return redirect( 'admin/dashboard');
});

Route::get('/admin/dashboard', function () {
    return view('admin.pages.index');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
  Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('dashboard');
  //Categorias
  Route::group(['prefix' => 'categoria', 'as' => 'category.'], function(){
      Route::get('/index', 'Admin\AdminCategoryController@index')->name('index');
      Route::get('/create', 'Admin\AdminCategoryController@create')->name('create');
      Route::post('/store', 'Admin\AdminCategoryController@store')->name('store');
      Route::get('/edit/{id}', 'Admin\AdminCategoryController@edit')->name('edit');
      Route::post('/update', 'Admin\AdminCategoryController@update')->name('update');
      Route::get('/delete/{id}', 'Admin\AdminCategoryController@delete')->name('delete');
  });
  //Subcategorias
  Route::group(['prefix' => 'subcategoria', 'as' => 'subcategory.'], function(){
      Route::get('/index', 'Admin\AdminSubcategoryController@index')->name('index');
      Route::get('/create', 'Admin\AdminSubcategoryController@create')->name('create');
      Route::post('/store', 'Admin\AdminSubcategoryController@store')->name('store');
      Route::get('/edit/{id}', 'Admin\AdminSubcategoryController@edit')->name('edit');
      Route::post('/update', 'Admin\AdminSubcategoryController@update')->name('update');
      Route::get('/delete/{id}', 'Admin\AdminSubcategoryController@delete')->name('delete');
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


  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'teacher', 'as' => 'teacher.'], function () {
  Route::get('/login', 'TeacherAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'TeacherAuth\LoginController@login');
  Route::post('/logout', 'TeacherAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'TeacherAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'TeacherAuth\RegisterController@register');

  Route::post('/password/email', 'TeacherAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'TeacherAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'TeacherAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'TeacherAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'student', 'as' => 'student.'], function () {
  Route::get('/login', 'StudentAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'StudentAuth\LoginController@login');
  Route::post('/logout', 'StudentAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'StudentAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'StudentAuth\RegisterController@register');

  Route::post('/password/email', 'StudentAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'StudentAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'StudentAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'StudentAuth\ResetPasswordController@showResetForm');
});


//Empresa
Route::group(['prefix' => 'company', 'as' => 'company.'], function () {
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
