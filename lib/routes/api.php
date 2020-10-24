<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('check_login', 'check_login@check_user_login');

//phần tài khoản zalo
Route::post('postListAccountFb', 'list_account@postListAccountFb');
Route::post('postListAccountOA', 'list_account@postListAccountOA');
Route::post('updateCategoryAccount', 'list_account@updateCategoryAccount');
Route::post('addAccountZalo', 'list_account@addAccountZalo');
Route::post('deleteAccountZalo', 'list_account@deleteAccountZalo');

Route::post('listAccountNoCate', 'list_account@listAccountNoCate');
Route::post('addListAccountIntoCate', 'list_account@addListAccountIntoCate');


//phần danh mục tài khoản
Route::post('listAllCategory', 'list_category@listAllCategory');
Route::post('postAddCategory', 'list_category@postAddCategory');
Route::post('updateCategory', 'list_category@updateCategory');
Route::post('deleteCategory', 'list_category@deleteCategory');

Route::post('searchCategoryById', 'search_api@searchCategoryById');

// api phần bài viết, danh mục bài viết
Route::post('listAllPost', 'post_api@listAllPost');

Route::post('listAllCategoryPost', 'post_api@listAllCategoryPost');
Route::post('AddCategoryPost', 'post_api@AddCategoryPost');
Route::post('updateCategoryPost', 'post_api@updateCategoryPost');
Route::post('deleteCategoryPost', 'post_api@deleteCategoryPost');

//api upload apiUploadImage
Route::post('apiUploadImage', 'apiUpload@apiUploadImage');
Route::post('apiUploadVideo', 'apiUpload@apiUploadVideo');
Route::post('apiUploadfile', 'apiUpload@apiUploadfile');

//api chatbot postAddCategory
Route::post('postAddChatbot', 'apiChatbot@postAddChatbot');
Route::post('updateChatbot', 'apiChatbot@updateChatbot');
Route::post('deleteChatbot', 'apiChatbot@deleteChatbot');
Route::post('listChatbotById', 'apiChatbot@listChatbotById');

// api thêm bài bài viết
Route::post('addPostByType', 'post_api@addPostByType');
Route::post('deletePostById', 'post_api@deletePostById');
Route::post('updatePostById', 'post_api@updatePostById');

// phần đăng bài sendPostApiByType
Route::post('sendPostApiByType', 'post_api@sendPostApiByType');
Route::post('sendPostApiByTypeWeb', 'post_api@sendPostApiByTypeWeb');

// phần check phone
Route::post('checkphone', 'apiCheckphone@checkphone');
Route::post('addfriend', 'apiCheckphone@addfriend');


//phan lich su dang bai
Route::post('historyProfile', 'post_api@historyProfile');
Route::post('historyOA', 'post_api@historyOA');

//lich su ket ban theo sdt
Route::post('historyaddfriend', 'apiCheckphone@historyaddfriend');

Route::post('dataphoneuser', 'apiCheckphone@dataphoneuser');
Route::post('phoneload', 'apiCheckphone@phoneload');

Route::post('deletedataphone', 'apiCheckphone@deletedataphone');

Route::post('friendSuggest', 'apiCheckphone@friendSuggest');

Route::post('schedule_profile', 'post_api@schedule_profile');

Route::post('listScheduleProf', 'post_api@listScheduleProf');
Route::post('listScheduleOA', 'post_api@listScheduleOA');

Route::post('updateschedule', 'post_api@updateschedule');

Route::post('deleteschedule', 'post_api@deleteschedule');

Route::post('schedulePostWeb', 'post_api@schedulePostWeb');

Route::post('schedulePostFBWeb', 'post_api@schedulePostFBWeb');


//api LD
 Route::post('InsertGroupLD', 'api_LD@InsertGroupLD');
 Route::post('InsertSchedule', 'api_LD@InsertSchedule');
 Route::post('InsertDetailLD', 'api_LD@InsertDetailLD');
 Route::post('addDataZaloLD', 'api_LD@addDataZaloLD');
 Route::post('returnGetCookie', 'api_LD@returnGetCookie');
 Route::post('returnLoginStep2', 'api_LD@returnLoginStep2');
 
 Route::post('getFriendByZaloId', 'api_LD@getFriendByZaloId');

 Route::post('sendZaloCRM', 'apiCRMsendzalo@sendZaloCRM');

 Route::post('getNumberFriendAndGroup', 'api_LD@getNumberFriendAndGroup');


 /// api web zalov2
  // api addFriend group
Route::post('getDataAddFriend', 'apiWebZalov2@getDataAddFriend');




