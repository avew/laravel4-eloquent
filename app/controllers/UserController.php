<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author avew
 */
class UserController extends BaseController {

    //put your code here
    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function getIndex() {
        //return "Welcome user controller";
        $users = User::all();
        return View::make('users.index', compact('users'));
    }

    public function getCreate() {
        return View::make('users.create')->with('message', 'User Create');
    }

    public function postCreate() {
        //Test post  
        //return "The form has been post";
        
        // validate input
        $rules = array(
            'real_name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        );
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails()) {
            return Redirect::back()->withInput()
                            ->withErrors($validation)
                            ->with('message', 'There were validation errors.');
        }
        // create a user
        $user = new User;
        $user->real_name = Input::get('real_name');
        $user->email = Input::get('email');
        $user->password = Input::get('password');

        $user->save();
        return Redirect::route('users');
    }

    public function getDelete($id) {
        $user = User::find($id);

        if (is_null($user)) {
            return Redirect::to('users')->with('message', 'User not found');
        }

        $user->delete();

        return Redirect::to('users');
    }

    public function getUpdate($id) {
        $user = User::find($id);

        if (is_null($user)) {
            return Redirect::to('users');
        }

        return View::make('users.update', compact('user'));
    }

    public function postUpdate($id) {
        $user = User::find($id);

        if (is_null($user)) {
            return Redirect::to('users');
        }

        $user->real_name = Input::get('real_name');
        $user->email = Input::get('email');

        if (Input::has('password')) {
            $user->password = Input::get('password');
        }
        $user->save();

        return Redirect::to('users');
    }

}

?>
