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

           
        /*********------------Front-------------------**********
        **----------***------------View------------***--------*/



  /***Get All Pages With all Content [Start Work with pagesController]*****/

Route::get('/',[
	'uses'=>'pagesController@getIndex',
	'as'=>'home.index'
]);
Route::get('/blog',[
	'uses'=>'pagesController@getBlogPage',
	'as'=>'blog.index'
]);

Route::get('/about',[
  'uses'=>'pagesController@getAbout',
  'as'=>'pages.about'
]);
Route::get('/privacy-policy',[
  'uses'=>'pagesController@getPrivacyPolicy',
  'as'=>'pages.privacypolicy'
]);
Route::get('/our-loyality',[
  'uses'=>'pagesController@getOurLoyality',
  'as'=>'pages.ourloyality'
]);
Route::get('/terms-condition',[
  'uses'=>'pagesController@getTermsandCondition',
  'as'=>'pages.termscondition'
]);
Route::get('/contact',[
  'uses'=>'pagesController@getContact',
  'as'=>'pages.contact'
]);
Route::post('/contact',[
  'uses'=>'pagesController@postContact',
  'as'=>'pages.contact'
]);

 /***[End Work with pagesController]*****/

  /**Get Single Page Start**/
  Route::get('/blog/{id}',['uses'=>'blogController@getSinglepost', 'as'=>'blog.single']);
  /**Get Single Page End**/

/**Category**/
  Route::get('/category/{name}',['uses'=>'blogController@getCategoryPage', 'as'=>'blog.category']);
  /**Category**/

  /**Search**/
  Route::post('/search',['uses'=>'blogController@postSearchData', 'as'=>'blog.search']);
  Route::post('/search/category/{name}',['uses'=>'blogController@postSearchByCategory', 'as'=>'blog.searchcategory']);
  /**Search**/

  











/*********------------ADMIN-------------------**********
        **----------***------------PANEL------------***--------*/


Route::group(['middleware'=>'auth'],function(){

Route::get('/myadmin',[
	'uses'=>'AdminController@getIndex',
	'as'  => 'admin.index'
]);
Route::get('/logout',[
	'uses'=>'AdminController@getLogOut',
	'as'  => 'admin.logout'
]);

     /**Blog Post Start**/
Route::resource('posts','PostController');
      /**Blog Post End**/

      /**Category Start**/
Route::resource('categories','CategoryController');
      /**Category End**/

      /**Category Start**/
Route::resource('tags','TagController');
      /**Category End**/

      /**Featured Block Start**/
Route::resource('featuredblocks','FeaturedBlockController');
      /**Featured Block End**/

      /**Slider Start**/
Route::resource('sliders','SliderController');
      /**Slider End**/

      /**Featured Item Start**/
Route::resource('featureditemsleft','FtItemLeftController');
Route::get('/ftitemlh/heading',['uses'=>'AdminOptionController@getFtitemleftheading', 'as'=>'fi.ftlhead']);
Route::post('/ftitemlh/heading',['uses'=>'AdminOptionController@postFtitemleftheading', 'as'=>'fi.ftlhead']);

Route::resource('featureditemsright','ftItemRightController');
Route::get('/ftitrh/heading',['uses'=>'AdminOptionController@getFtitemRightheading', 'as'=>'fi.ftrhead']);
Route::post('/ftitrh/heading',['uses'=>'AdminOptionController@postFtitemRightheading', 'as'=>'fi.ftrhead']);
      /**Featured Item End**/
       
      /**For Pages Modification Start**/
Route::get('/pages/about',['uses'=>'AdminOptionController@getInsertDataAboutPage', 'as'=>'pages.aboutinsert']);
Route::post('/pages/about',['uses'=>'AdminOptionController@postInsertDataAboutPage', 'as'=>'pages.aboutinsert']);


Route::get('/pages/privacy-policy',['uses'=>'AdminOptionController@getprivacyplicypage', 'as'=>'pages.prpo']);
Route::post('/pages/privacy-policy',['uses'=>'AdminOptionController@postprivacyplicypage', 'as'=>'pages.prpo']);

Route::get('/pages/our-loyality',['uses'=>'AdminOptionController@getLoyalitypage', 'as'=>'pages.loyality']);
Route::post('/pages/our-loyality',['uses'=>'AdminOptionController@postLoyalitypage', 'as'=>'pages.loyality']);

Route::get('/pages/terms-condition',['uses'=>'AdminOptionController@getTermPage', 'as'=>'pages.termcon']);
Route::post('/pages/terms-condition',['uses'=>'AdminOptionController@postTermPage', 'as'=>'pages.termcon']);
     /**For Pages Modification End**/

    /**For Site Options Start**/
Route::get('/options',['uses'=>'AdminOptionController@getOptionsPage', 'as'=>'site.options']);
Route::post('/options',['uses'=>'AdminOptionController@postOptionsPage', 'as'=>'site.options']);
    /**For Site Options End**/

   /**For Social Site Link Start**/
Route::resource('social-site','SocialSiteController');
   /**For Social Site Link End**/

   /**For Contact Page Start**/
Route::get('/admin-contact',['uses'=>'AdminContactController@getContact', 'as'=>'admin.contact']);
Route::get('/admin-contact/{id}',['uses'=>'AdminContactController@getReadContactMessage', 'as'=>'admin.readmsg']);
Route::get('mailbox/composer',['uses'=>'AdminContactController@getComposerPage', 'as'=>'contact.composer']);
Route::get('mailbox/reply/{id}',['uses'=>'AdminContactController@getReplyPage', 'as'=>'contact.reply']);
Route::post('sendcomposemsg',['uses'=>'AdminContactController@postSendComposeMsg', 'as'=>'send.comopose']);
   /**For Contact Page End**/


});


/***Login & Register Start*****/ 
Route::group(['middleware'=>'guest'],function(){

Route::get('/register',[
	'uses'=>'AdminController@getRegister',
	'as'  => 'admin.register'
]);
Route::post('/register',[
	'uses'=>'AdminController@postRegister',
	'as'  => 'admin.register'
]);
Route::get('/login',[
	'uses'=>'AdminController@getLogin',
	'as'  => 'admin.login'
]);
Route::post('/login',[
	'uses'=>'AdminController@postLogin',
	'as'  => 'admin.login'
]);

//Reset Password Routes

Route::get('password/reset',['as'=>'password.reset','uses'=>'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/email',['as'=>'password.email','uses'=>'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset/{token?}',['as'=>'password.resetform','uses'=>'Auth\ResetPasswordController@showResetForm']);
Route::post('password/reset',['as'=>'password.nowreset','uses'=>'Auth\ResetPasswordController@reset']);

});

/***Login & Register End*****/ 