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
//Route::get('search', 'SearchController@getSearch');
Route::get('search/name', 'SearchController@getSearchAjax')->name('search');
Route::get('search2/name', 'SearchController@getSearchAjax2')->name('search2');

Route::post('uploadimage','uploadimg@upload_image')->name('uploadimage');
Route::post('uploadvideo','uploadimg@uploadvideo')->name('uploadvideo');
Route::post('uploadfile','uploadimg@uploadfile')->name('uploadfile');


Route::post('uploadlistimage','uploadimg@uploadlistimage')->name('uploadlistimage');

Route::group(['namespace'=>'Home'],function(){
	Route::group(['prefix'=>'/','middleware'=>'CheckLogedIn'],function(){
		Route::get('/','UserController@getLogin');
		Route::post('/','UserController@postLogin');

	   });
     
     Route::get('logout','HomeController@getLogout');

	 Route::group(['prefix'=> 'home','middleware'=>'CheckLogedOut'],function(){
			Route::get('/','HomeController@getHome');
			

			Route::get('loadscanqr','HomeController@loadscanqr');
			Route::get('getInfoAccountAjax','HomeController@getInfoAccountAjax');
			
			Route::get('updateAccount','HomeController@updateAccount');

			Route::get('loginstep2','HomeController@loginstep2');
            
            Route::get('delete/{id}','HomeController@getDeleteUser');

            Route::get('getCookie','HomeController@getCookie');


		    Route::post('add','HomeController@postAddAcount');

		    Route::get('searchAccountBycate','HomeController@searchAccountBycate');
		    Route::get('searchAccount2Bycate','HomeController@searchAccount2Bycate');

		    Route::get('searchAccountByname','HomeController@searchAccountByname');
		    Route::get('searchAccountByname2','HomeController@searchAccountByname2');

		    Route::post('deleteAccountProf','HomeController@deleteAccountProf');
		    Route::post('deleteAccountOA','HomeController@deleteAccountOA');
		    Route::post('updateInfo','HomeController@updateInfo');
		    Route::post('saveProxy','HomeController@saveProxy');
		    Route::post('saveSettingProxy','HomeController@saveSettingProxy');



            Route::group(['prefix'=>'categories'],function(){
				Route::get('/','Categories@getCategories');
				Route::post('/','Categories@postCategories');

				Route::get('getInfoCategoryAjax','Categories@getinforCategory');
				Route::get('getUpdateCategory','Categories@getUpdateCategory');
                
				Route::get('edit/{id}','Categories@getEditCategories');
				Route::get('delete/{id}','Categories@deleteById');

				Route::post('deleteCateAc','Categories@deleteCateAc');
				Route::post('addNameCate','Categories@addName_cate');
	
           });
           

			Route::group(['prefix'=>'zaloacounts'],function(){
				Route::get('/','AcountController@getAcount');

				Route::get('add','AcountController@getAddAcount');
				Route::post('add','AcountController@postAddAcount');

				Route::get('edit/{id}','AcountController@getEditAcount');
				Route::post('edit/{id}','AcountController@postEditAcount');

				Route::get('delete/{id}','AcountController@getDeleteAcount');
			});
		});


});



// Route::group(['namespace'=>'Upload'],function(){
// 	Route::group(['prefix'=>'upload'],function(){
               
// 		   });
// });	
Route::group(['namespace'=>'Post'],function(){
	Route::group(['prefix'=>'posts'],function(){
		Route::get('profile','PostController@getProfile');
		
        Route::get('list_posts','PostController@getListPost');
        Route::get('list_posts/delete/{id}','PostController@getDeletePost');

        Route::get('category','PostController@getCategory');
        Route::post('category','PostController@getAddCategory');

        Route::get('getInfoCategoryAjax','category@getInfoCategoryAjax');
         Route::get('getUpdateCategory','category@getUpdateCategory');
         Route::get('delete/{id}','category@deleteById');


        Route::get('getPostProfile','PostController@getPostProfile');
        Route::post('getPostProfile','PostController@getPostProfile');
        
        Route::get('get_url_info','PostController@get_url_info');


        Route::get('createpost','PostController@createpost');
        Route::post('createpost','PostController@createpost');

        Route::post('addPostImage','PostController@potcreatepost');
        Route::post('addPostVideo','PostController@createPostVideo');

        Route::get('addNewPost','PostController@addNewPost');
        Route::post('addNewPost','PostController@addNewPost');

        Route::get('selectListPost','PostController@selectListPost');

        Route::get('send_post_oa','post_OA@sendPostOa');
        
        Route::post('postCreateCart','PostController@postCreateCart');
        
        Route::post('deleteAllListPost','PostController@deleteAllListPost');

        
        Route::post('schedulesadd','PostController@schedulesadd');
        Route::post('updateStop','PostController@updateStop');
        
        Route::post('sendPostStatus','PostController@sendPostStatus');
       

	   });
});
Route::group(['namespace'=>'Profile'],function(){
        Route::group(['prefix'=>'profile'],function(){
        	Route::get('history','history@list_post_history');
        	Route::post('deleteHisrotyProf','history@deleteHistory');

        	Route::get('Schedulerhistory','history@Schedulerhistory');
        	Route::post('deleteSchedulePrf','history@deleteSchedulePrf');

        });
});

Route::group(['namespace'=>'Official'],function(){
        Route::group(['prefix'=>'official'],function(){
        	Route::get('history','history@list_post_history');
        	//Route::post('deleteHisrotyProf','history@deleteHistory');

        	Route::get('Schedulerhistory','history@Schedulerhistory');
        	Route::post('deleteScheduleOA','history@deleteScheduleOA');

        });
});

Route::group(['namespace'=>'thong_ke'],function(){
	Route::group(['prefix'=>'thong_ke'],function(){
		Route::get('statistical','thong_ke@getStatistical');
		
        
	   });
});

Route::group(['namespace'=>'chat'],function(){
	Route::group(['prefix'=>'chat'],function(){
		Route::get('chatprofile','chatprofile@getchatProfile');
		Route::get('chatprofile_test','chatprofile@getchatProfile_test');
		Route::post('savemess','chatprofile@savemess');

		Route::post('postimage','chatprofile@postimage');
		Route::post('postimagezalo','chatprofile@postimagezalo');

		Route::post('sendreplyimage','chatOA@sendreplyimage');
		Route::get('chatoa','chatOA@getchatOA');

		Route::get('ajaxLoadAllData','chatOA@ajaxLoadAllData');
		Route::get('ajaxgetinboxid1','chatOA@ajaxgetinboxid1');

		Route::post('ajaxloadinboxbyid','chatOA@ajaxloadinboxbyid');

		Route::get('sendreply','chatOA@sendreply');

		Route::post('inboxpopup','chatprofile@inboxpopup');

		Route::post('postfile','chatprofile@postfile');
		Route::post('sendfile','chatprofile@sendfile');

		Route::post('newmesssample','chatprofile@newmesssample');
		
		Route::post('getdatamess','chatprofile@getdatamess');
		Route::post('deletemess','chatprofile@deletemess');
		Route::post('postimagechiendich','chatprofile@postimagechiendich');

		Route::post('dongboGroup','chatprofile@dongboGroup');
		Route::post('getdatafriend','chatprofile@getdatafriend');
		Route::post('dongbolistGroup','chatprofile@dongbolistGroup');
		Route::post('getdatagroup','chatprofile@getdatagroup');
		
		Route::post('postimagegourp','chatprofile@postimagegourp');
		Route::post('sendimggroup','chatprofile@sendimggroup');

		Route::post('getInforAccount','chatprofile@getInforAccount');

		Route::post('submitFormOA','chatOA@submitFormOA');

		Route::post('getDataById','chatOA@getDataById');
		Route::post('submitEditForm','chatOA@submitEditForm');
		
		Route::post('getListLichHen','chatOA@getListLichHen');
		Route::post('del_lichhen','chatOA@del_lichhen');


	   });
});

Route::group(['namespace'=>'Chiendich'],function(){
	Route::group(['prefix'=>'chiendich'],function(){
		Route::get('/','Chiendich@index');
		Route::post('submitsave','Chiendich@submitsave');

		Route::get('history','Chiendich@history');

		Route::post('getDataZaloOa','Chiendich@getDataZaloOa');
		Route::post('getDataSendSK','Chiendich@getDataSendSK');
		
		Route::post('getNguoiQuanTam','Chiendich@getNguoiQuanTam');
		
		Route::post('sendMessageOA','Chiendich@sendMessageOA');
		Route::post('sendMessageImgOA','Chiendich@sendMessageImgOA');
		
		
        
	   });
});

Route::group(['namespace'=>'Chatbot'],function(){
	Route::group(['prefix'=>'chatbot'],function(){
		Route::get('/','chatbot@getChatbot');
		Route::get('getById','chatbot@getAccountById');
		Route::get('add','chatbot@add');
		Route::get('get','chatbot@get');
		Route::get('updateChatbot','chatbot@updateChatbot');

		Route::post('deleteAll','chatbot@deleteAll');

         
		Route::get('addchatbot','chatbot@getChatbot');
		Route::get('getInfoChatbotAjax','chatbot@getInfoChatbotAjax');
        
	   });
});

Route::group(['namespace'=>'Addfriend'],function(){
	Route::group(['prefix'=>'addfriend'],function(){
		Route::get('/','AddFriend@getAddFriend');

		Route::post('checkphone','AddFriend@checkphone');

		Route::post('addchatbot','chatbot@postChatbot');
		Route::post('add','AddFriend@add');

		Route::get('friendinvitation','AddFriend@friendinvitation');
		Route::get('friendinvitationv2','AddFriend@friendinvitationv2');

		Route::get('log','AddFriend@history');

		Route::get('addHistory','AddFriend@addHistory');

		Route::post('adddataphone','AddFriend@adddataphone');
		Route::post('addgoiy','AddFriend@addgoiy');
		Route::get('td_addfriend','AddFriend@td_addfriend');
        
	   });
});


Route::group(['namespace'=>'Shop'],function(){
    Route::group(['prefix'=>'shop'],function(){ 
    	     Route::get('product','product@index');
    	     Route::get('category','category@index');
    	     Route::get('attribute','attribute@index');

    	     Route::get('addProduct','product@addProduct');

    	     Route::post('dongbo','product@dongbo');
    	     Route::post('loadproduct','product@loadproduct');
    	     Route::post('loadcategory','category@loadcategory');
    	     
    	     Route::post('loadattribute','attribute@loadattribute');
    	     
    	     Route::post('addNewProduct','product@addNewProduct');
    	     Route::post('getAccountOA','product@getAccountOA');
    	     Route::post('uploadImg','product@uploadImg');

    	     
    	 });


	});

Route::group(['namespace'=>'Order'],function(){
    Route::group(['prefix'=>'order'],function(){ 
    	     Route::get('/','order@index');
    	     Route::post('getDataOrderOa','order@getDataOrderOa');
    	     Route::post('getDataOrderLimit','order@getDataOrderLimit');

    	     Route::get('getOrder/{id}/{id_oa}','order@getOrder');

    	     Route::post('updateStatusOrder','order@updateStatusOrder');
    	     Route::post('getDataOrderOaV2','order@getDataOrderOaV2');
    	   
    	 });


	});

Route::group(['namespace'=>'Postfb'],function(){
    Route::group(['prefix'=>'postfb'],function(){ 
    	     Route::get('/','postfb@index');
    	     Route::get('scheduler','scheduler@index');
    	     Route::get('history','history@index');

    	     Route::post('addauto','postfb@addauto');
    	     Route::post('getpage','postfb@getpage');
    	     
    	     Route::post('sendpostfb','postfb@sendpostfb');
    	     Route::post('schedulerpostfb','postfb@schedulerpostfb');
    	     
    	     Route::post('updateStop','postfb@updateStop');

    	     Route::post('addtokenid','postfb@addtokenid');
    	     Route::post('gettokenfb','postfb@gettokenfb');

    	     Route::post('deleteSchedulefb','scheduler@deleteSchedulefb');
    	 });


	});

Route::group(['namespace'=>'Role'],function(){
    Route::group(['prefix'=>'role'],function(){ 
    	     Route::get('/','role@index');
    	     
    	     Route::post('add','role@add');
    	     Route::post('update','role@update');
    	     Route::post('delete','role@delete');
    	     Route::post('getDataUserNV','role@getDataUserNV');
    	     Route::post('updateInforUserNV','role@updateInforUserNV');
    	    
    	 });


	});

Route::group(['namespace'=>'Group'],function(){
    Route::group(['prefix'=>'group'],function(){ 
    	     Route::get('/','group@index');
    	     Route::post('getMemberGroup','group@getMemberGroup');

    	     Route::post('convertArrLink','group@convertArrLink');
    	     Route::post('addHistoryFriendGroup','group@addHistoryFriendGroup');
    	     Route::get('historyAddfriendGroup','group@historyAddfriendGroup');
    	     Route::get('historySendGroup','group@historySendGroup');
    	     Route::get('historyJoinGroupByLink','group@historyJoinGroupByLink');
    	     Route::post('historyAddLinkGroup','group@historyAddLinkGroup');

    	 });


	});

Route::group(['namespace'=>'Setting'],function(){
    Route::group(['prefix'=>'setting'],function(){ 

    	     Route::get('/','setting@index');
    	     Route::post('loginApiDomain','setting@loginApiDomain');
    	     
    	     Route::post('loginStep2','setting@loginStep2');
             
    	 });


	});



