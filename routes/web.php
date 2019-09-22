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

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin'], function () {
    Route::get('company', 'Admin\AdminCompanyOperateController@getAllCompany');
    Route::post('company', 'Admin\AdminCompanyOperateController@addCompany');
    Route::delete('company', 'Admin\AdminCompanyOperateController@deleteCompanyByCompanyId');

    Route::get('customer', 'Admin\AdminCustomerController@getAllCustomersByCompanyId');
    Route::get('customer/detail', 'Admin\AdminCustomerController@getCustomerInfoByCustomerId');
    Route::post('customer', 'Admin\AdminCustomerController@addCustomer');
    Route::delete('customer', 'Admin\AdminCustomerController@deleteCustomer');
});



Route::get('/admin/person/search','Admin\AdminPersonOperateController@searchPersonalUser');
Route::get('/admin/person','Admin\AdminPersonOperateController@getAllPersonalUser');
Route::post('/admin/person','Admin\AdminPersonOperateController@addPersonalUser');
Route::post('/admin/person/state/update','Admin\AdminPersonOperateController@updatePersonalUserByUserId');




//搜索问题
Route::get('/admin/questions/search','Admin\AdminQuestionOperateController@searchQuestion');
//获取全部问题
Route::get('/admin/questions','Admin\AdminQuestionOperateController@getAllQuestions');
//通过id获取信息
Route::post('/admin/questions/detail','Admin\AdminQuestionOperateController@getQuestionDetailByQuestionId');
//通过审核
Route::post('/admin/questions/access','Admin\AdminQuestionOperateController@accessQuestionByQuestionId');
//取消通过审核
Route::post('/admin/questions/revoke','Admin\AdminQuestionOperateController@revokeQuestionByQuestionId');
//删除问题
Route::delete('/admin/questions','Admin\AdminQuestionOperateController@deleteQuestionByQuestionId');
//更新图片
Route::post('/picture/updatepicture','Picture\PictureUpdateController@updatePicture');
//输出图片
Route::GET('/picture/showpicture/{name}','Picture\PictureUpdateController@showPicture');



