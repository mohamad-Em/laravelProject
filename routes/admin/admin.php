<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;
Route::namespace('admin')->group(function(){
    Route::get('loginForm',[AdminController::class,'loginForm'])->name('loginForm');
    Route::post('save',[AdminController::class,'save'])->name('save');
});
Route::group(['namespace' => 'admin', 'middleware' => 'Admin'],function(){
    Route::get('dashboard',[AdminController::class,'dashboard']);
    Route::get('myInfo',[AdminController::class,'myInfo'])->name('myInfo');
    Route::get('editAdmin/{ID}',[AdminController::class,'editAdmin'])->name('editAdmin');
    Route::post('update/{ID}',[AdminController::class,'update'])->name('update');
    Route::get('logout',[AdminController::class,'logout'])->name('logout');
    Route::get('users',[AdminController::class,'users'])->name('users');
    Route::get('approve/{ID}',[AdminController::class,'approve'])->name('approve');
    Route::get('unApprove/{ID}',[AdminController::class,'unApprove'])->name('unApprove');
    Route::get('viewUser/{ID}',[AdminController::class,'viewUser'])->name('viewUser');
    Route::get('delete/{ID}',[AdminController::class,'delete'])->name('delete');
    Route::get('deletePost/{ID}',[AdminController::class,'deletePost'])->name('deletePost');
    Route::get('addPost/{ID}',[AdminController::class,'addPost'])->name('addPost');
    Route::post('savePost/{ID}',[AdminController::class,'savePost'])->name('savePost');
    Route::get('deletePostAdmin/{ID}',[AdminController::class,'deletePostAdmin'])->name('deletePostAdmin');
    Route::get('addNews/{ID}',[AdminController::class,'addNews'])->name('addNews');
    Route::post('saveNews/{ID}',[AdminController::class,'saveNews'])->name('saveNews');
    Route::get('deleteNews/{ID}',[AdminController::class,'deleteNews'])->name('deleteNews');
    Route::get('commentsPost/{ID}',[AdminController::class,'commentsPost'])->name('commentsPost');
    Route::post('saveReply/{ID}',[AdminController::class,'saveReply'])->name('saveReply');
    Route::get('deleteReply/{ID}',[AdminController::class,'deleteReply'])->name('deleteReply');
    Route::get('commentsNews/{ID}',[AdminController::class,'commentsNews'])->name('commentsNews');
    Route::post('saveReplyNews/{ID}',[AdminController::class,'saveReplyNews'])->name('saveReplyNews');
    Route::get('allPosts',[AdminController::class,'allPosts'])->name('allPosts');
    Route::get('approvePost/{ID}',[AdminController::class,'approvePost'])->name('approvePost');
    Route::get('unApprovePost/{ID}',[AdminController::class,'unApprovePost'])->name('unApprovePost');
    Route::get('viewPost/{ID}',[AdminController::class,'viewPost'])->name('viewPost');
    Route::get('delPost/{ID}',[AdminController::class,'delPost'])->name('delPost');
    Route::get('allComplaints',[AdminController::class,'allComplaints'])->name('allComplaints');
    Route::get('viewComplaint/{ID}',[AdminController::class,'viewComplaint'])->name('viewComplaint');
    Route::post('replyComplaint/{ID}',[AdminController::class,'replyComplaint'])->name('replyComplaint');
    Route::get('deleteReplyComp/{ID}',[AdminController::class,'deleteReplyComp'])->name('deleteReplyComp');
    Route::get('deleteComplaint/{ID}',[AdminController::class,'deleteComplaint'])->name('deleteComplaint');
});
