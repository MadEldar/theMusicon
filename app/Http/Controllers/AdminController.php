<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        return view ('admin/index', [
            'title' => 'Dashboard | theMusicon Admin'
        ]);
    }

    public function table() {
        return view ('admin/table', [
            'title' => 'table | theMusicon Admin'
        ]);
    }

    public function users() {
        return view ('admin/user', [
            'title' => 'Users | theMusicon Admin',
            'users' => User::where('user_role', 1)->get()
        ]);
    }

    public function user_edit(EditUserRequest $req) {
        $req->validate([]);
        $user = User::find($req->get('id'))->update([
            'first_name' => $req->get('first_name'),
            'last_name' => $req->get('last_name'),
            'user_email' => $req->get('user_email'),
            'user_status' => $req->get('user_status'),
        ]);
        return redirect('/administrator/users')->with('message', [
            'type' => 'success',
            'message' => 'Edit user successfully'
        ]);
    }

    public function albums() {
        return view ('admin/albums', [
            'title' => 'albums | theMusicon Admin'
        ]);
    }

    public function song() {
        return view ('admin/song', [
            'title' => 'song | theMusicon Admin'
        ]);
    }
}
