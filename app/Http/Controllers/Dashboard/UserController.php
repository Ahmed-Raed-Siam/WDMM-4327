<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        //
//        $users = DB::table('users')->paginate(10);
        $users = DB::table('users')->whereNull('deleted_at')->paginate(10);
//        $users = User::withTrashed();
//        $users = User::withoutTrashed()->paginate(10);
        return response()->view('dashboard.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return response()->view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Get all inputs from the form
        $input = $request->all();
        // Validate inputs
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        // Create instance from user model
        $user = new user();
        $user_name = $input['username'];
        $email = $input['email'];
        $password = $input['password'];
        $user->name = $user_name;
        $user->email = $email;
        $user->password = $password;
//        print_r($input);
//        dd($input);

        // Insert in Database
        $user->save();

        // Get Last ID || User ID
        $user_id = User::all()->last();
        // Status for Adding the New User To The System!
        $alert_status = 'alert-success';
        // Msg
        $msg = 'New User Added Successfully.';
        // Pref
        $pref = "You Add $user_name As New User To The System!<br>His ID : {$user_id['id']} ,His Email : $email . ";
        $status = ['alert_status' => $alert_status, 'msg' => $msg, 'pref' => $pref];

        return redirect()->back()->with('status', $status);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        // Find User ID
        $user = User::withoutTrashed()->findOrFail($id);
        return response()->view('dashboard.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        // Find User ID
        $user = User::withoutTrashed()->findOrFail($id);
        return response()->view('dashboard.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        // Get All Inputs From the form
        $inputs = $request->all();

        // Validate inputs
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        // Find User ID
        $user = User::withoutTrashed()->findOrFail($id);
        $user_name = $inputs['username'];
        $email = $inputs['email'];
        $password = $inputs['password'];
        $user->name = $user_name;
        $user->email = $email;
        $user->password = $password;
//        dd($input);

        // Insert in Database
        $user->save();

        // Status for Editing the User in The System!
        $alert_status = 'alert-success';
        // Msg
        $msg = "Edit User $user_name Successfully.";
        // Pref
        $pref = "You Edit $user_name User in The System!<br>His ID : {$id} ,His Email : $email . ";
        $status = ['alert_status' => $alert_status, 'msg' => $msg, 'pref' => $pref];

        return redirect()->route('dashboard.users.index')->with('status', $status);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        // Find User ID
        $user = User::findOrFail($id);
        $user_id = $id;
        $user_name = $user->name;
        $user_email = $user->email;
        $alert_status = 'alert-warning';
        // Msg
        $msg = "Delete User $user_name Successfully.";
        // Pref
        $pref = "You Delete $user_name User from The System!<br>His ID : {$user_id} ,His Email : $user_email . ";
        $status = ['alert_status' => $alert_status, 'msg' => $msg, 'pref' => $pref];

        $user->delete();
        // or
//        $user->destory();

        return redirect()->route('dashboard.users.index')->with('status', $status);
    }

    /*Trash*/
//    /**
//     * Display a listing of the resource.
//     *
//     * @return Response
//     */
//    public function users_trash_index(): Response
//    {
//        $users = User::onlyTrashed()->paginate(10);
////        $users = DB::table('users')->whereNotNull('deleted_at')->paginate(10);
//
//        return response()->view('dashboard.users.trash.index', ['users' => $users]);
//    }
//
//    /**
//     * @param int $id
//     * @return RedirectResponse
//     */
//    public function restore_user(int $id): RedirectResponse
//    {
//        // Find User ID
//        $user = User::onlyTrashed()->findOrFail($id);
//        $user_id = $id;
//        $user_name = $user->name;
//        $user_email = $user->email;
//        $alert_status = 'alert-success';
//        // Msg
//        $msg = "Restore User $user_name Successfully.";
//        // Pref
//        $pref = "You Restore $user_name User from The System!<br>His ID : {$user_id} ,His Email : $user_email . ";
//        $status = ['alert_status' => $alert_status, 'msg' => $msg, 'pref' => $pref];
//
//        /*Restore*/
//        $user->restore();
//        // Restore in one line
//        //User::withTrashed()->find($id)->restore();
//
//        return redirect()->route('dashboard.users.trash.index')->with('status', $status);
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param int $id
//     * @return Response
//     */
//    public function view_user_in_trash(int $id): Response
//    {
//        // Find User ID
//        $user = User::onlyTrashed()->findOrFail($id);
//        return response()->view('dashboard.users.trash.show', ['user' => $user]);
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param int $id
//     * @return RedirectResponse
//     */
//    public function delete_from_trash(int $id): RedirectResponse
//    {
//        // Find User ID in the trashed
//        $user = User::onlyTrashed()->findOrFail($id);
//        $user_id = $id;
//        $user_name = $user->name;
//        $user_email = $user->email;
//        $alert_status = 'alert-success';
//        // Msg
//        $msg = 'Delete User ' . $user_name . ' From The Trashed Successfully.';
//        // Pref
//        $pref = "You Delete $user_name User from The System!<br>His ID : {$user_id} ,His Email : $user_email . ";
//        $status = ['alert_status' => $alert_status, 'msg' => $msg, 'pref' => $pref];
//
//        /* Force Delete (Permanently) To delete from soft-deleted (trashed) data */
//        $user->forceDelete();
//
//        // Redirect to User Table
//        return redirect()->route('dashboard.users.trash..index')->with('status', $status);
//    }

}
