<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comprador;
use App\Models\vendedor;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function edit(Request $request, $id)
    {
        dd($request->newname);
        $request->validate([
            'newname' => 'required',
            'newusername' => 'required',
        ]);

        dd($request->newname);
        
        // Ahora, $producto contiene toda la información del producto
        $user = User::find($id);;
        
        $user->name = $request->newname;
        
        $user->save();
        
        if($user->user_type == 'comprador')
        {
            // Obtén el comprador que corresponde al usuario autenticado
            $comprador = Comprador::where('user_id', $user->id)->first();
            
            if($comprador){
                $comprador->nombre_usuario = $request->newusername;
                $comprador->save();
            }
        }
        else
        {
            $vendedor = vendedor::where('user_id', $user->id)->first();
            if($vendedor){
                $vendedor->nombre_usuario = $request->newusername;
                $vendedor->save();
            }
        }
        
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
