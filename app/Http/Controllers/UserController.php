<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comprador;
use App\Models\vendedor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function edit(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $user->name = $request->nombre;
        $contra1 = $request->contra;
        $contra2 = $request->contra2;

        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'contra' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    if ($value !== $request->contra2) {
                        $fail('Las contraseñas no coinciden.');
                    }
                },
            ],
            'contra2' => 'required',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'contra.required' => 'La contraseña es obligatoria.',
            'contra2.required' => 'La confirmación de la contraseña es obligatoria.',
        ]);
        
        if ($validator->fails()) {
            return redirect()->route('User.show_user_info')
                ->withErrors($validator)
                ->withInput()
                ->with(['user' => $user]);
        }

        $user->password = Hash::make($contra1);
        
        $user->save();
        return redirect()->route('User.show_user_info')->with(['user' => $user, 'success' => 'Información actualizada!']);
    }

    public function show_user_info()
    {
        $user = auth()->User();
        return view('editUser', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/');
    }
}
