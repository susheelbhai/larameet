<?php

namespace Susheelbhai\Larameet\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Susheelbhai\Larameet\Models\ChatMessage;

class LarameetController extends Controller
{
    function home() {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('larameet::index', compact('users'));
    }
    function chat($id) {
        $user = User::find($id);
        $messages = ChatMessage::where(function($query) {
            $query->where('sender_id', '=', Auth::user()->id)
            ->orWhere('receiver_id', '=', Auth::user()->id);
        })
        ->where(function($query) use($id) {
            $query->where('sender_id', '=', $id)
            ->orWhere('receiver_id', '=', $id);
        })
        ->get();
        return view('larameet::chat', compact('user', 'messages'));
    }
    function search(Request $request) {
        $searchValue = $request->validate([
            'search' => 'required|string|max:50',
        ]);
        $search = $searchValue['search'];
        $user = User::where('name', 'LIKE', "%{$search}%")
        ->orWhere('username', 'LIKE', "%{$search}%")
        ->get();
       return response()->json($user);
    }

    function getUser(Request $request) {
        $userId = $request->input('id');
        if ($userId) {
           $user = User::findOrFail($userId);
           $user['profileImagePath'] = asset($user['profile_pic']);
        }
        else{
            $user = Auth::user();
            $user['profileImagePath'] = asset($user['profile_pic']);
        }
        return response()->json($user);
    }
}
