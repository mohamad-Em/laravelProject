<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\LoginRequest as AdminLoginRequest;
use App\Http\Requests\admin\NewsRequest;
use App\Http\Requests\admin\PostRequest;
use App\Models\Admin;
use App\Models\Complaint;
use App\Models\News;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('admin.loginForm');
    }
    public function save(AdminLoginRequest $request)
    {
        $login = Admin::where([
            'adminEmail' => $request->adminEmail,
            'adminPassword' =>sha1($request->adminPassword),
        ])->get();
        if(count($login) > 0) {
            session(['ID' => $login[0]->adminID]);
            session(['Name' => $login[0]->adminName]);
            session(['Email' => $login[0]->adminEmail]);
            session(['Fullname' => $login[0]->adminFullname]);

            return redirect()->intended(default:'dashboard');
        }


    }
    public function dashboard()
    {


        return view('admin.dashboard');
    }
    public function myInfo()
    {
        $info = Admin::where([
                'adminID' => session::get('adminID'),
                'adminName' => session::get('adminName'),
                'adminEmail' => session::get('adminEmail'),
                'adminFullname' => session::get('adminFullname'),
            ])->get();
            $ID = session::get('ID');
            $adminPosts = DB::table('admin')
                    ->join('post','admin.adminID','=','post.adminID')
                    ->where('admin.adminID',$ID)
                    ->select('postID','postTitle','postDecraption','postDate')
                    ->get();
            $adminNewss = DB::table('admin')
                    ->join('news','admin.adminID','=','news.adminID')
                    ->where('admin.adminID',$ID)
                    ->select('newsID','newsTitle','newsDescraption','newsDate')
                    ->get();
        return view('admin.myProfile',compact('info','adminPosts','adminNewss'));
    }
    public function editAdmin($ID)
    {
        $Edit = Admin::where('adminID',$ID)->get();
        return view('admin.editForm',compact('Edit'));
    }
    public function update(Request $request,$ID)
    {
        $update = Admin::where('adminID',$ID)->update([
            'adminName' => $request->adminName,
            'adminEmail' => $request->adminEmail,
            'adminPassword' =>sha1($request->adminPassword),
            'adminFullname' => $request->adminFullname,
        ]);
        if($update)
        {
            session::flush();
            Auth::logout();
            return redirect()->route('loginForm');
        }
    }
    public function logout()
    {
        session::flush();
        Auth::logout();
        return redirect()->route('loginForm');
    }
    public function users()
    {
        $users = User::all();
        return view('admin.users',compact('users'));
    }
    public function approve($ID)
    {
        $approve = User::where('userID',$ID)->update([
            'userStats' => 2
        ]);
        if($approve)
        {
            return redirect()->route('users');
        }
    }
    public function unApprove($ID)
    {
        $unApprove = User::where('userID',$ID)->update([
            'userStats' =>1
        ]);
        if($unApprove)
        {
            return redirect()->route('users');
        }
    }
    public function viewUser($ID)
    {
        $user = User::where('userID',$ID)->get();
        $postsUser = DB::table('user')
                    ->join('post','user.userID','=','post.userID')
                    ->where('user.userID',$ID)
                    ->get();
        return view('admin.viewUser',compact('user','postsUser'));
    }
    public function deletePost($ID)
    {
        $deletePost = Post::where('postID',$ID)->delete();
        if($deletePost) {
            return redirect()->route('users');
        }
    }
    public function delete($ID)
    {
        $delete = User::where('userID',$ID)->delete();
        if($delete) {
            return redirect()->route('users');
        }
    }
    public function addPost($ID)
    {
        $ID = Session::get('ID');
        return view('admin.addPost',compact('ID'));
    }
    public function savePost(PostRequest $request,$ID)
    {
        $ID = Session::get('ID');
        $savePost = Post::create([
            'postTitle' => $request->postTitle,
            'postDecraption' => $request->postDecraption,
            'postStatus' => 2,
            'adminID' => $ID,
        ]);
        if($savePost) {
            return redirect()->route('myInfo',$ID);
        }
    }
    public function deletePostAdmin($ID)
    {
        $adminID = Session::get('ID');
        $deletePostAdmin = Post::where('postID',$ID)->delete();
        if($deletePostAdmin)
        {
            return redirect()->route('myInfo',$adminID);
        }
    }
    public function addNews($ID)
    {
        $ID = Session::get('ID');
        return view('admin.addNews',compact('ID'));
    }
    public function saveNews(NewsRequest $request, $ID)
    {
        $ID = Session::get('ID');
        $saveNews = News::create([
            'newsTitle' => $request->newsTitle,
            'newsDescraption' => $request->newsDescraption,
            'adminID' => $ID
        ]);
        if($saveNews)
        {
            return redirect()->route('myInfo',$ID);
        }
    }
    public function deleteNews($ID)
    {
        $adminID = Session::get('ID');
        $deleteNews = News::where('newsID',$ID)->delete();
        if($deleteNews)
        {
            return redirect()->route('myInfo',$adminID);
        }
    }
    public function commentsPost($ID)
    {
        $adminID = Session::get('ID');
        $commentPosts = DB::table('user')
                    ->join('comment','user.userID','=','comment.userID')
                    ->join('post','post.postID','=','comment.postID')
                    ->where('post.postID',$ID)
                    ->select('userName','postTitle','postDecraption','commentTitle','commentID','commentDate')
                    ->get();
        $replyCommects = DB::table('admin')
                    ->join('reply','admin.adminID','=','reply.adminID')
                    ->join('comment','comment.commentID','=','reply.commentID')
                    ->join('post','post.postID','=','comment.postID')
                    ->where('admin.adminID',$adminID)
                    ->where('post.postID',$ID)
                    ->select('replyID','adminName','replyTitle','replyDate')
                    ->get();
        return view('admin.commentsPost',compact('ID','commentPosts','replyCommects'));
    }
    public function saveReply(Request $request,$ID)
    {
        $adminID = Session::get('ID');
        $saveReply = Reply::create([
            'replyTitle' =>$request->replyTitle,
            'adminID' => $adminID,
            'commentID' => $ID
        ]);
        if($saveReply)
        {
            return redirect()->route('myInfo',$adminID);
        }
    }
    public function deleteReply($ID)
    {
        $adminID = Session::get('ID');
        $deleteReply = Reply::where('replyID',$ID)->delete();
        if($deleteReply)
        {
            return redirect()->route('myInfo',$adminID);
        }
    }
    public function commentsNews($ID)
    {
        $adminID = Session::get('ID');
        $commentNewss = DB::table('user')
                    ->join('comment','user.userID','=','comment.userID')
                    ->join('news','news.newsID','=','comment.newsID')
                    ->where('news.newsID',$ID)
                    ->select('commentID','userName','newsTitle','newsDescraption','newsDate','commentTitle','commentDate')
                    ->get();
        $replyNewss = DB::table('admin')
                    ->join('reply','admin.adminID','=','reply.adminID')
                    ->join('comment','comment.commentID','=','reply.commentID')
                    ->join('news','news.newsID','=','comment.newsID')
                    ->where('admin.adminID',$adminID)
                    ->where('news.newsID',$ID)
                    ->select('replyID','adminName','replyTitle','replyDate')
                    ->get();
        return view('admin.commentsNews',compact('ID','commentNewss','replyNewss'));
    }
    public function saveReplyNews(Request $request , $ID)
    {
        $adminID = Session::get('ID');
        $saveReplyNews = Reply::create([
            'replyTitle' => $request->replyTitle,
            'adminID' => $adminID,
            'commentID' => $ID
        ]);
        if($saveReplyNews)
        {
            return redirect()->route('myInfo',$adminID);
        }
    }
    public function allPosts()
    {
        $allPosts = DB::table('user')
                ->join('post','user.userID','=','post.userID')
                ->get();
        return view('admin.allPosts',compact('allPosts'));
    }
    public function approvePost($ID)
    {
        $approvePost = Post::where('postID',$ID)->update([
            'postStatus' => 2
        ]);
        if($approvePost)
        {
            return redirect()->route('allPosts');
        }
    }
    public function unApprovePost($ID)
    {
        $approvePost = Post::where('postID',$ID)->update([
            'postStatus' => 1
        ]);
        if($approvePost)
        {
            return redirect()->route('allPosts');
        }
    }
    public function viewPost($ID)
    {
        $viewPost = Post::where('postID',$ID)->get();
        return view('admin.viewPost',compact('viewPost'));
    }

    public function delPost($ID)
    {
        $delPost = Post::where('postID',$ID)->delete();
        if($delPost)
        {
            return redirect()->route('allPosts');
        }

    }
    public function allComplaints()
    {
        $allComplaints = DB::table('user')
                    ->join('complaints','user.userID','=','complaints.userID')
                    ->get();
        return view('admin.allComplaints',compact('allComplaints'));
    }
    public function viewComplaint($ID)
    {
        $viewComplaint = Complaint::where('complaintID',$ID)->get();
        $replyComs = DB::table('complaints')
                    ->join('reply','complaints.complaintID','=','reply.complaintID')
                    ->where('complaints.complaintID',$ID)
                    ->get();
        return view('admin.viewComplaint',compact('ID','viewComplaint','replyComs'));
    }
    public function deleteComplaint($ID)
    {
        $deleteComplaint = Complaint::where('complaintID',$ID)->delete();
        if($deleteComplaint)
        {
            return redirect()->route('allComplaints');
        }
    }
    public function replyComplaint(Request $request,$ID)
    {
        $adminID = Session::get('ID');
        $replyComplaint = Reply::create([
            'replyTitle' => $request->replyTitle,
            'adminID' => $adminID,
            'complaintID' => $ID
        ]);
        if($replyComplaint)
        {
            return redirect()->route('viewComplaint',$ID);
        }
    }
    public function deleteReplyComp($ID)
    {
        $deleteReplyComp = Reply::where('replyID',$ID)->delete();
        if($deleteReplyComp)
        {
            return redirect()->route('allComplaints');
        }
    }
}
