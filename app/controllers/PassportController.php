<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PassportController
 *
 * @author avew
 */
class PassportController extends BaseController {

    protected $passport;

    public function __construct(Passport $passport) {
        $this->passport = $passport;
    }

    public function getIndex() {
        //test route
        //return 'Hello passport';

        $passports = Passport::all();
        return View::make('passports.index', compact('passports'));
    }

    public function getCreate() {
        //menampilkan field ke select
        //$user = DB::table('users')->lists('real_name');
        $user = User::lists('real_name', 'id');
        return View::make('passports.create', compact('user'));
    }

    public function postCreate() {
        //Test Route
        //return 'Hello post password';

        $rules = array(
            'user_id' => 'required|unique:passports',
            'number' => 'required',
        );
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails()) {
            return Redirect::back()->withInput()
                            ->withErrors($validation)
                            ->with('message', 'There were validation errors.');
        }
        // create a user passport
        $passport = new Passport;
        $passport->user_id = Input::get('user_id');
        $passport->number = Input::get('number');

        $passport->save();
        return Redirect::route('passports');
    }

    public function getDelete($id) {
        $passport = Passport::find($id);

        if (is_null($passport)) {
            return Redirect::to('passports')->with('message', 'User Passports not found');
        }

        $passport->delete();

        return Redirect::to('passports');
    }

    public function getUpdate($id) {
        $passport = Passport::find($id);
        
        if (is_null($passport)) {
            return Redirect::to('passports');
        }

        return View::make('passports.update', compact('passport'));
    }

    public function postUpdate($id) {
        $passport = Passport::find($id);

        if (is_null($passport)) {
            return Redirect::to('passports');
        }

        $passport->user_id = Input::get('user_id');
        $passport->number = Input::get('number');


        $passport->save();

        return Redirect::to('passports');
    }

}

?>
