<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use DB;
Use App\Empresa;
Use App\User;
use App\Http\Controllers\Auth;
use Illuminate\Validation\ValidationException;
use mysql_xdevapi\CollectionFind;


class UsuariosController extends Controller
{

    public function index()
    {
        $usuario = User::all();

        return view('perfil',
            [
                'usuario'=>$usuario,
            ]);
    }
    public function listaUsuarios()
    {
        //
        $usuario = User::with('getEmpresa')->get();
        //dd($usuario);
        return view('adminListaUsuarios',
            [
                'usuario'=>$usuario,
            ]);
    }
    protected function getIsAdmin(){
        $usuario = User::all();
        return $usuario;
    }

    public function habilitarUsuario($id)
    {
        //
        $usuario = User::find($id);
        $usuario->validado = 1;
        $usuario->save();
        $usuario = User::all();

        return view('adminListaUsuarios',
            [
                'usuario'=>$usuario,
            ]);
    }

    public function inhabilitarUsuario($id)
    {
        $usuario = User::find($id);
        $usuario->validado = 0;
        $usuario->save();
        $usuario = User::all();

        return view('adminListaUsuarios',
            [
                'usuario'=>$usuario,
            ]);
    }

    public function asignarEmpresa($id)
    {

        if(User::find($id)) {

            $user = User::find($id);
            //dd($user/*->cuilEmpresa*/);

            //$empresa = Empresa::where('empCuil','=', $user->cuilEmpresa);
            $empresa = DB::table('empresas')
                ->where('empCuil', '=', $user->cuilEmpresa)->get();

            //dd($empresa[0]->empCuil/*->items->empNombre*/);


            //COMPRUEBO SI EL user COLOCÓ EL CUIL CORRESPONDIENTE A LA EMPRESA QUE SE LE QUIERE ASIGNAR
            if (isset($user->cuilEmpresa) == isset($empresa[0]->empCuil) && $user->validado) {

                $user->usrIdEmpresa = $empresa[0]->empId;
                $user->save();
                return redirect('/admin/adminListaUsuarios')->with('mensaje', 'Empresa asignada con éxito');

            } else {
                return redirect('/admin/adminListaUsuarios')
                    ->with('mensaje', 'Ha ocurrido un error al asignar la empresa,
                    verifique que el CUIL está bien escrito en los datos del usuario,
                    que esté habilitado y que la empresa es socio.');
            }
        }
    }

    public function edit()
    {
        $id = auth()->user()->usrId;
        $usuario = User::find($id);
        //dd($usuario);
        $usuario = User::find($id);

        return view('formModificarDatos',
            [
                'usuario'=>$usuario
            ]);
    }

    public function update(Request $request)
    {
        $id = auth()->user()->usrId;
        $usuario = User::find($id);

        //dd($request);
        //dd($usuario);
        //imagen
        $validacion = $request->validate([
            'prdImagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = 'sinAvatar.png';
        if ($request->file('avatar')) {
            //$imageName = time().'.'.request()->avatar->getClientOriginalExtension();
            $imagen = $request->file('avatar');
            //$imagen->getClientOriginalExtension();
            $imageName = $request->avatar->getClientOriginalName();
            $request->avatar->move(public_path('images/avatares'), $imageName);
        }

        $usuario->email = $request->input('email');
        $usuario->celular = $request->input('celular');
        $usuario->avatar = $imageName;
        $usuario->save();

        return redirect('/perfil')
            ->with('mensaje', 'Datos de '.$usuario->nombre.' modificados con éxito');
    }

}



