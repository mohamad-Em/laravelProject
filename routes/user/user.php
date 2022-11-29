<?php

use App\Http\Controllers\user\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
Route::namespace('user')->group(function(){
    Route::get('loginUser',[UserController::class,'loginForm'])->name('loginUser');
    Route::post('saveUser',[UserController::class,'saveUser'])->name('saveUser');
    Route::get('newAccount',[UserController::class,'newAccount'])->name('newAccount');
    Route::post('createAccount',[UserController::class,'createAccount'])->name('createAccount');
});
Route::group(['namespace' => 'user', 'middleware' => 'User'],function(){
    Route::get('mainPage',[UserController::class,'mainPage'])->name('mainPage');
    Route::get('userInfo',[UserController::class,'userInfo'])->name('userInfo');
    Route::get('editUser/{ID}',[UserController::class,'editUser'])->name('editUser');
    Route::post('updateUser/{ID}',[UserController::class,'updateUser'])->name('updateUser');
    Route::get('allUser',[UserController::class,'allUser'])->name('allUser');
    Route::get('showUser/{ID}',[UserController::class,'showUser'])->name('showUser');
    Route::get('logoutUser',[UserController::class,'logoutUser'])->name('logoutUser');
    Route::get('addPostUser/{ID}',[UserController::class,'addPostUser'])->name('addPostUser');
    Route::post('savePostUser',[UserController::class,'savePostUser'])->name('savePostUser');
    Route::get('showComment/{ID}',[UserController::class,'showComment'])->name('showComment');
    Route::post('saveReplyUser/{ID}',[UserController::class,'saveReplyUser'])->name('saveReplyUser');
    Route::get('editPostUser/{ID}',[UserController::class,'editPostUser'])->name('editPostUser');
    Route::get('allPostsUser',[UserController::class,'allPostsUser'])->name('allPostsUser');
    Route::get('viewPostUser/{ID}',[UserController::class,'viewPostUser'])->name('viewPostUser');
    Route::post('commentPost/{ID}',[UserController::class,'commentPost'])->name('commentPost');
    Route::get('deleteMyComment/{ID}',[UserController::class,'deleteMyComment'])->name('deleteMyComment');
    Route::get('showCommentMyPost/{ID}',[UserController::class,'showCommentMyPost'])->name('showCommentMyPost');
    Route::post('saveReplyMe/{ID}',[UserController::class,'saveReplyMe'])->name('saveReplyMe');
    Route::get('showMyReply/{ID}',[UserController::class,'showMyReply'])->name('showMyReply');
    Route::post('updatePostUser/{ID}',[UserController::class,'updatePostUser'])->name('updatePostUser');
    Route::get('deletetMyPost/{ID}',[UserController::class,'deletetMyPost'])->name('deletetMyPost');
    Route::post('sendMessage/{ID}',[UserController::class,'sendMessage'])->name('sendMessage');
    Route::get('viewMessage/{ID}',[UserController::class,'viewMessage'])->name('viewMessage');
    Route::post('replyMessage/{ID}',[UserController::class,'replyMessage'])->name('replyMessage');
    Route::get('deleteMessage/{ID}',[UserController::class,'deleteMessage'])->name('deleteMessage');
    Route::get('addFriend/{ID}',[UserController::class,'addFriend'])->name('addFriend');
    Route::get('approvedFriend/{ID}',[UserController::class,'approvedFriend'])->name('approvedFriend');
    Route::get('unApprovedFriend/{ID}',[UserController::class,'unApprovedFriend'])->name('unApprovedFriend');
    Route::get('deleteFriend/{ID}',[UserController::class,'deleteFriend'])->name('deleteFriend');
    Route::get('addComplaints/{ID}',[UserController::class,'addComplaints'])->name('addComplaints');
    Route::post('saveComplaint/{ID}',[UserController::class,'saveComplaint'])->name('saveComplaint');
    Route::get('showReplyComplaint/{ID}',[UserController::class,'showReplyComplaint'])->name('showReplyComplaint');
    Route::get('deleteComplaint/{ID}',[UserController::class,'deleteComplaint'])->name('deleteComplaint');
});
