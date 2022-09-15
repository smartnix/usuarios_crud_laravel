<?php

namespace App\Http\Controllers;

use App\Events\EnvioEmail;
use App\Models\Categoria;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;
/**
 * Class UsuarioController
 * @package App\Http\Controllers
 */
class UsuarioController extends Controller
{
   
    public function index(Request $request)
    {
        $search = trim($request->get('buscar'));
      
        $usuarios = Usuario::select('usuarios.*', 'categorias.nombre')
                            ->join('categorias', 'usuarios.categoria_id', '=', 'categorias.id')
                            ->where('nombres','LIKE','%'.$search.'%')
                            ->orwhere('apellidos','LIKE','%'.$search.'%')
                            ->orwhere('categorias.nombre','LIKE','%'.$search.'%')
                            ->orderBy('nombres','asc')
                            ->paginate(7);
                          
        return view('usuario/index', compact('usuarios','search'))
            ->with('i', (request()->input('page', 1) - 1) * $usuarios->perPage());
    }

   
    public function create()
    {
        $usuario = new Usuario();
        $countries = $this->getCountries();
        $arregloCategorias = $this->getCategories();
        return view('usuario.create', compact('usuario'))->with('paises', $countries)->with('categorias', $arregloCategorias);
    }

    private function getCategories()
    {
        $categories = Categoria::all();
        $arregloCategories = [];
        foreach($categories as $key => $category) {
            $arregloCategories[$category["id"]] = $category['nombre'];
        }

        return $arregloCategories;
    }

    private function getCountries()
    {

        $curl = curl_init();
        $arrayCountries = [];
        curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.first.org/data/v1/countries?region=South%20America",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }
        else{
            $countries = json_decode($response,true);
            foreach($countries["data"] as $key => $country) {
                $arrayCountries[$country['country']] = $country['country'];
            }
        } 
        return $arrayCountries;
    }
   
    public function store(Request $request)
    {
        request()->validate([
            'nombres'=>'required|regex:/^[\pL\s\-]+$/u|min:5|max:100',
            'apellidos'=>'required|regex:/^[\pL\s\-]+$/u|max:100',
            'email'=>'required|email:rfc,dns|max:150',
            'celular'=>'required|regex:/^[-0-9\+]+$/|max:10',
            'direccion'=>'required',
            'cedula'=>'required',
            'categoria_id'=>'required',
            'pais.*'=>'required|integer'
        ]);
        
        // request()->validate(Usuario::$rules);

        $usuario = Usuario::create($request->all());

        EnvioEmail::dispatch($request->nombres, $request->apellidos, $request->email);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado');
    }
   
    public function show($id)
    {
        $usuario = Usuario::find($id);

        return view('usuario.show', compact('usuario'));
    }

   
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        $countries = $this->getCountries();
        $arregloCategorias = $this->getCategories();
        return view('usuario.edit', compact('usuario'))->with('paises', $countries)->with('categorias', $arregloCategorias);
    }

   
    public function update(Request $request, Usuario $usuario)
    {
         request()->validate([
            'nombres'=>'required|regex:/^[a-zA-Z]+$/u|max:100|min:5',
            'apellidos'=>'required|regex:/^[a-zA-Z ]+$/u|max:100',
            'email'=>'required|email:rfc,dns|max:150',
            'celular'=>'required|regex:/^[-0-9\+]+$/|max:10',
            'direccion'=>'required',
            'cedula'=>'required',
            'categoria_id'=>'required',
            'pais'=>'required'
        ]);
        
        // request()->validate(Usuario::$rules);

        $usuario->update($request->all());

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado!');
    }

  
    public function destroy($id)
    {
        $usuario = Usuario::find($id)->delete();

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario Eliminado');
    }
}
