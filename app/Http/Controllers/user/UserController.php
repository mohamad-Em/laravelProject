<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\ComplaintRequest;
use App\Http\Requests\user\loginRequest;
use App\Http\Requests\user\PostRequest;
use App\Http\Requests\user\RegisterRequest;
use App\Models\Comment;
use App\Models\Complaint;
use App\Models\Friend;
use App\Models\Message;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\BinaryOp\NotEqual;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('user.loginForm');
    }
    public function saveUser(loginRequest $request)
    {
        $login = User::where([
            'userEmail' => $request->userEmail,
            'userPassword' =>sha1($request->userPassword),
            'userStats' => 2
        ])->get();
        if(count($login) > 0) {
            session(['ID' => $login[0]->userID]);
            session(['Name' => $login[0]->userName]);
            session(['userEmail' => $login[0]->userEmail]);
            session(['Fullname' => $login[0]->userFullname]);
            return redirect()->intended(default:'mainPage');
        } else {
            return redirect()->route('loginUser');
        }
    }
    public function newAccount()
    {
        return view('user.newAccount');
    }
    public function createAccount(RegisterRequest $request)
    {
        $createAccount = User::create([
            'userName' => $request->userName,
            'userEmail' => $request->userEmail,
            'userPassword' =>sha1($request->userPassword),
            'userFullname' => $request->userFullname,

            'userStats' => 1
        ]);
        if($createAccount)
        {
            return view('user.loginForm');
        }
    }
    public function mainPage()
    {
        $userID = Session::get('ID');
        return view('user.mainPage',compact('userID'));
    }
    public function userInfo()
    {
        $userInfo = User::where([
            'userID' => Session::get('ID'),
            'userName' => Session::get('Name'),
            'userEmail' => Session::get('Email'),
            'userFullname' => Session::get('Fullname'),

        ])->get();
        $userID = Session::get('ID');
        $myPosts = DB::table('user')
                ->join('post','user.userID','=','post.userID')
                ->where('user.userID',$userID)
                ->select('userName','postID','postTitle','postDecraption','postDate','postStatus')
                ->get();
        $myMessages = DB::table('user')
                ->join('message','user.userID','=','message.messageSender')
                ->where('user.userID','!=',$userID)
                ->get();
        $myFriends = DB::table('user')
                ->join('friend','user.userID','=','friend.sendingUser')
                ->where('user.userID','!=',$userID)
                ->select('userID','userName','userEmail','userFullname','friendID','friendStatus')
                ->get();
        $mycomplaints = DB::table('user')
                    ->join('complaint','user.userID','=','complaint.userID')
                    ->where('user.userID',$userID)
                    ->select('complaintID','complaintTitle','complaintDate')
                    ->get();
        $replyComplaints = DB::table('complaint')
                    ->join('reply','complaint.complaintID','=','reply.complaintID')
                    ->where('reply.complaintID','=','complaints.complaintID')
                    ->select('replyTitle','replyDate')
                    ->get();
        return view('user.information',compact('userInfo','myPosts','myMessages','myFriends','mycomplaints','replyComplaints'));
    }
    public function editUser($ID)
    {
        $editUser = User::where('userID',$ID)->get();
        return view('user.userEdit',compact('editUser'));
    }
    public function updateUser(Request $request,$ID)
    {
        $updateUser = User::where('userID',$ID)->update([
            'userName' => $request->userName,
            'userEmail' => $request->userEmail,
            'userFullname' => $request->userFullname,
        ]);
        if($updateUser)
        {
            session::flush();
            Auth::logout();
            return redirect()->route('loginUser');
        }
    }
    public function allUser()
    {
        $userID = Session::get('ID');
        $allUsers = DB::table('user')->where('userID','!=',$userID)->where('userStats',2)->get();
        return view('user.allUser',compact('allUsers'));
    }
    public function showUser($ID)
    {

        $showUser = User::Where('userID',$ID)->get();
        $postUsers = DB::table('user')
                    ->join('post','user.userID','=','post.userID')
                    ->where('user.userID',$ID)
                    ->where('post.postStatus',2)
                    ->select('postID','postTitle','postDecraption','postDate','postStatus')
                    ->get();
        return view('user.showUser',compact('showUser','postUsers'));
    }
    public function addPostUser($ID)
    {
        return view('user.addPostUser');
    }
    public function savePostUser(PostRequest $request)
    {
        $userID = Session::get('ID');
        $savePostUser = Post::create([
            'postTitle' => $request->postTitle,
            'postDecraption' => $request->postDecraption,
            'postStatus' => 1,
            'userID' => $userID
        ]);
        if($savePostUser)
        {
            return redirect()->route('userInfo',$userID);
        }
    }
    public function showComment($ID)
    {
        $showComments = DB::table('user')
                ->join('comment','user.userID','=','comment.userID')
                ->join('post','post.postID','=','comment.postID')
                ->where('post.postID',$ID)
                ->select('commentID','commentTitle','commentDate','userName')
                ->get();

        return view('user.showComment',compact('showComments'));
    }
    public function saveReplyUser(Request $request,$ID)
    {
        $userID = Session::get('ID');
        $replyCommentUser = Reply::create([
            'replyTitle' => $request->replyTitle,
            'adminID' => null,
            'userID' => Session::get('ID'),
            'commentID' => $ID,
        ]);
        if($replyCommentUser)
        {
            return redirect()->route('userInfo',$userID);
        }
    }

    public function allPostsUser()
    {
        $userID = Session::get('ID');
        $allPostsUser = DB::table('user')
                    ->join('post','user.userID','=','post.userID')
                    ->where('user.userID','!=',$userID)
                    ->where('post.postStatus',2)
                    ->select('postID','postTitle','postDecraption','postDate','userName')
                    ->get();
        return view('user.allPostsUser',compact('allPostsUser'));
    }
    public function viewPostUser($ID)
    {
        $viewPostUser = Post::where('postID',$ID)->get();
        $allCommentPosts = DB::table('post')
                    ->join('comment','post.postID','=','comment.postID')
                    ->join('user','user.userID','comment.userID')
                    ->where('post.postID',$ID)
                    ->select('commentID','commentTitle','commentDate','comment.userID','userName')
                    ->get();
        return view('user.viewPostUser',compact('viewPostUser','allCommentPosts'));
    }
    public function commentPost(Request $request,$ID)
    {
        $userID = Session::get('ID');
        $commentPost = Comment::create([
            'commentTitle' => $request->commentTitle,
            'userID' =>  $userID,
            'postID' => $ID
        ]);
        if($commentPost) {
            return redirect()->route('viewPostUser',$ID);
        }
    }
    public function deleteMyComment($ID)
    {
        $deleteMyComment = Comment::where('commentID',$ID)->delete();
        if($deleteMyComment)
        {
            return redirect()->route('allPostsUser');
        }
    }
    public function showCommentMyPost($ID)
    {
        $showComments = DB::table('user')
        ->join('comment','user.userID','=','comment.userID')
        ->join('post','post.postID','=','comment.postID')
        ->where('post.postID',$ID)
        ->select('commentID','commentTitle','commentDate','userName')
        ->get();
        $userID = Session::get('ID');

        return view('user.showCommentMyPost',compact('showComments'));

    }
    public function saveReplyMe(Request $request,$ID)
    {
        $userID = Session::get('ID');
        $saveReplyMe = Reply::create([
            'replyTitle' => $request->replyTitle,
            'userID' => $userID,
            'commentID' => $ID
        ]);
        if($saveReplyMe)
        {
            return redirect()->route('userInfo',$userID);
        }
    }
    public function editPostUser($ID)
    {
        $editPostUser = Post::where('postID',$ID)->get();
        return view('user.editPostUser',compact('editPostUser'));
    }
    public function updatePostUser(Request $request, $ID)
    {
        $userID = Session::get('ID');
        $updatePostUser = Post::where('postID',$ID)->update([
            'postTitle' => $request->postTitle,
            'postDecraption' => $request->postDecraption
        ]);
        if($updatePostUser)
        {
            return redirect()->route('userInfo',$userID);
        }
    }
    public function deletetMyPost($ID)
    {
        $userID = Session::get('ID');
        $deletetMyPost = Post::Where('postID',$ID)->delete();
        if($deletetMyPost)
        {
            return redirect()->route('userInfo',$userID);
        }
    }
    public function sendMessage(Request $request,$ID)
    {
        $userID = Session::get('ID');
        $sendMessage = Message::create([
            'messageTitle' => $request->messageTitle,
            'messageSender' => $userID,
            'userID' => $ID
        ]);
        if($sendMessage)
        {
            return redirect()->route('allUser');
        }
    }
    public function viewMessage($ID)
    {
        $viewMessage = Message::where('messageID',$ID)->get();
        $viewReplyMessages = DB::table('message')
                    ->join('reply','message.messageID','=','reply.messageID')
                    ->where('message.messageID',$ID)
                    ->get();
        return view('user.viewMessage',compact('viewMessage','viewReplyMessages'));
    }
    public function replyMessage(Request $request,$ID)
    {
        $userID = Session::get('ID');
        $replyMessage = Reply::create([
            'replyTitle' => $request->replyTitle,
            'userID' => $userID,
            'messageID' => $ID
        ]);
        if($replyMessage)
        {
            return redirect()->route('userInfo',$userID);
        }
    }
    public function deleteMessage($ID)
    {
        $userID = Session::get('ID');
        $deleteMessage = Message::where('messageID',$ID)->delete();
        if($deleteMessage)
        {
            return redirect()->route('userInfo',$userID);
        }
    }
    public function addFriend($ID)
    {
        $userID = Session::get('ID');
        $addFriend = Friend::create([
            'friendStatus' => 1,
            'futureUser' => $ID,
            'sendingUser' => $userID
        ]);
        if($addFriend)
        {
            return redirect()->route('allUser');
        }
    }
    public function approvedFriend($ID)
    {
        $userID = Session::get('ID');
        $approvedFriend = Friend::where('friendID',$ID)->update([
            'friendStatus' => 2
        ]);
        if($approvedFriend)
        {
            return redirect()->route('userInfo',$userID);
        }
    }
    public function unApprovedFriend($ID)
    {
        $userID = Session::get('ID');
        $unApprovedFriend = Friend::where('friendID',$ID)->update([
            'friendStatus' => 1
        ]);
        if($unApprovedFriend)
        {
            return redirect()->route('userInfo',$userID);
        }
    }
    public function deleteFriend($ID)
    {
        $userID = Session::get('ID');
        $deleteFriend = Friend::where('friendID',$ID)->delete();
        if($deleteFriend)
        {
            return redirect()->route('userInfo',$userID);
        }
    }
    public function addComplaints($ID)
    {
        $ID = Session::get('ID');
        return view('user.addComplaints',compact('ID'));
    }
    public function saveComplaint(ComplaintRequest $request,$ID)
    {
        $ID = Session::get('ID');
        $saveComplaint = Complaint::create([
            'complaintTitle' => $request->complaintTitle,
            'userID' => $ID
        ]);
        if($saveComplaint)
        {
            return redirect()->route('userInfo',$ID);
        }
    }
    public function showReplyComplaint($ID)
    {
        $Complaint = Complaint::where('complaintID',$ID)->get();
        $showReplys = DB::table('complaint')
                ->join('reply','complaint.complaintID','=','reply.complaintID')
                ->where('complaint.complaintID',$ID)
                ->select('replyID','replyTitle','replyDate')
                ->get();
        return view('user.showReplyComplaint',compact('Complaint','showReplys'));
    }
    public function deleteComplaint($ID)
    {
        $userID = Session::get('ID');
        $deleteComplaint = Complaint::where('complaintID',$ID)->delete();
        if($deleteComplaint)
        {
            return redirect()->route('userInfo',$userID);
        }
    }
    public function logoutUser()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('loginUser');
    }
}
