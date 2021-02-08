<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    private $where;

    /**
     * @param $id
     * @param $name
     */
    public function show($id)
    {

        $user = User::findOrFail($id)->recipesPaginate();

        $user_title = User::findOrFail($id);

        return view('users.index' )
            ->with('title', $user_title->name)
            ->with('recipes', $user);

    }

    /**
     * @param $id
     * @param $name
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id, $name)
    {
        $user = User::whereName( iconv("UTF-8", "ASCII//TRANSLIT", urldecode($name)) )->firstOrFail();

        $this->authorize('is-user', $user); // only owner can see edit form

        return view('users.edit')->with('user', $user);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->authorize('is-user', $user);

        $validator = $this->validator($request->all());

        if ( $validator->fails() ) {
            return back()->withErrors($validator)->withInput();
        }

        // update user name
        $user->name = trim($request->get('name')) ;

        // update user email
        $user->email = $request->get('email');

        // change password
        if ($request->get('password')) {
            $user->password = bcrypt( $request->get('password') );
        }

        $user->save();

        flash()->success('Profil zmenený.' . '<span class="close pull-right">X</span>');

        return redirect('/');



    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'confirmed|min:6'


        ]);
    }


}
	