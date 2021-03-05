<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\PuestosFeria;
use App\Models\Comuna;
use App\Models\Direccion;
use App\Models\Rol;
use App\Models\Permiso;
use App\Models\PermisoRols;
use App\Models\UnidadesMedida;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Producto;
use App\Models\Promocion;
use App\Models\ProductoPromocion;
use Validator;
use App\Models\UsuarioProducto;
use App\Models\RolUsuario;
class MainController extends Controller
{
    public function checkLogin(Request $request)
    {
        // Valida que ingresen email y contraseña
    	$request->validate([
		    'email' => 'required',
		    'contraseña' => 'required',
		]);

        //Se obtiene el usuario si es que existe en formate json
    	$usuario=Usuario::all()->where('email',$request->email)->where('contraseña',$request->contraseña);
        
        //Se pasa a array para ver si está vacío
        $data = json_decode($usuario, true);

    	if(!empty($data)){

            //Se obtiene el campo id
            $usuario_id = array_column($data, 'id')[0];

    		return redirect('main/successLogin/'.$usuario_id);
    	}
    	else{
    		return back()->withErrors(['message' => 'Datos de ingreso inválidos']);
    	}
    }

    public function successLogin($id_usuario){
    	return view('successLogin')->with('usuario',$id_usuario);
    }

    public function registro(Request $request){
        $request->validate([
            'email' => 'required',
            'contraseña' => 'required',
            'nombre' => 'required',
            'rut' => 'required',
            'comuna' => 'required',
            'calle' => 'required',
            'numero' => 'required',
            'telefono' => 'required',
            'nombre_rol' => 'required',           
        ]);
        $falla=FALSE;
        $mensaje="";
        
        //Impide la creación de usuarios repetidos por email, nombre o rut
        $existe_usuario1=Usuario::all()->where('email',$request->email)->first();
        $existe_usuario2=Usuario::all()->where('nombre', $request->nombre)->first();
        $existe_usuario3=Usuario::all()->where('rut', $request->rut)->first();
                        
        if($existe_usuario1!=NULL || $existe_usuario2!=NULL || $existe_usuario3!=NULL){
            $falla=TRUE;
            $mensaje="El usuario ya existe ";
            return redirect('/')->with('mensaje', $mensaje); 
        }
        //Crea registro en tabla usuarios
        app('App\Http\Controllers\UsuarioController')->store($request);
        
        //Busca el usuario recién creado
        $usuario=Usuario::all()->where('email',$request->email)->first();

        //$determina si realmente se creó el usuario y toma el id
        if($usuario!=NULL){
            $usuario_id = $usuario->id;
        }
        else{
            $mensaje=$mensaje."1 ";
            $usuario_id = '0';
            $falla=TRUE;
            return redirect('/')->with('mensaje', $mensaje);
        }

        //creacion y comprobacion Comuna
        app('App\Http\Controllers\ComunaController')->store($request);
        $comuna=Comuna::all()->where('comuna',$request->comuna)->first();

        if($comuna!=NULL){
            $comuna_id = $comuna->id;
        }
        else{
            $mensaje=$mensaje."2 ";
            $comuna_id = '0';
            $falla=TRUE;
        }
        //creacion y comprobacion Rol
        app('App\Http\Controllers\RolController')->store($request);
        $rol=Rol::all()->where('nombre_rol',$request->nombre_rol)->first();

        if($comuna!=NULL){
            $rol_id = $rol->id;
        }
        else{
            $mensaje=$mensaje."3 ";
            $rol_id = '0';
            $falla=TRUE;
        }
        
        //creacion y comprobacion Direccion
        app('App\Http\Controllers\DireccionController')->store($request,$comuna_id,$usuario_id);
        $direccion=Direccion::all()->where('id_usuarios',$usuario_id)->where('id_comunas',$comuna_id)->first();

        if($direccion!=NULL){
            $direccion_id = $direccion->id;
        }
        else{
            $mensaje=$mensaje."4 ";
            $direccion_id = '0';
            $falla=TRUE;
        }

        //creacion y comprobacion RolUsuario
        app('App\Http\Controllers\RolUsuarioController')->store($request,$rol_id,$usuario_id);
        $rolusuario=RolUsuario::all()->where('id_usuarios',$usuario_id)
                                    ->where('id_rols',$rol_id)->first();

        if($rolusuario!=NULL){
            $rolusuario_id = $rolusuario->id;
        }
        else{
            $mensaje=$mensaje."5 ";
            $rolusuario_id = '0';
            $falla=TRUE;
        }
        //Determina el mensaje
        if(!$falla){
            $mensaje=$mensaje.'Se ha creado la cuenta id:'.$usuario_id;   
        }
        else{
            $mensaje=$mensaje.'Hubo problemas';
        }
        
        return redirect('/')->with('mensaje', $mensaje);
    }

    public function crear_producto_view($id_usuario){
        return view('creacion')->with('usuario',$id_usuario);
    }
    public  function crear_producto_action(Request $request, $id_usuario){
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'tipo' => 'required',
            'cantidad' => 'required',
            'stock' => 'required',
            'descuento' => 'required',
            'tiempo' => 'required',
            'nombre_categoria' => 'required',
            'descripcion_categoria' => 'required',
            'nombre_subcategoria' => 'required',
            'descripcion_subcategoria' => 'required',           
        ]);
        $falla=FALSE;
        $mensaje="";
        //----------------------------------------------------------------------------------------------
        //Crea registro en tabla UnidadesMedida
        app('App\Http\Controllers\UnidadesMedidaController')->store($request);
        
        //Busca el registro en UnidadesMedida recién creado
        $medida=UnidadesMedida::all()->where('tipo',$request->tipo)
                                    ->where('cantidad', $request->cantidad)->first();

        //$determina si realmente se creó y toma el id
        if($medida!=NULL){
            $medida_id = $medida->id;
        }
        else{
            $mensaje=$mensaje."1 ";
            $medida_id = '0';
            $falla=TRUE;
            return redirect('/crear_producto')->with('mensaje', $mensaje);
        }
        //----------------------------------------------------------------------------------------------
        //Crea registro en tabla Categoria
        app('App\Http\Controllers\CategoriaController')->store($request);
        
        //Busca el registro en Categoria recién creado
        $categoria=Categoria::all()->where('nombre_categoria',$request->nombre_categoria)
                                    ->where('descripcion_categoria', $request->descripcion_categoria)->first();

        //$determina si realmente se creó y toma el id
        if($categoria!=NULL){
            $categoria_id = $categoria->id;
        }
        else{
            $mensaje=$mensaje."2 ";
            $categoria_id = '0';
            $falla=TRUE;
            return  redirect('/crear_producto')->with('mensaje', $mensaje);
        }
        //----------------------------------------------------------------------------------------------
        //Crea registro en tabla subcategoria
        app('App\Http\Controllers\SubcategoriaController')->store($request,$categoria_id);

        //Busca el registro en Subcategoria recién creado
        $subcategoria=Subcategoria::all()->where('nombre_subcategoria',$request->nombre_subcategoria)
                                    ->where('descripcion_subcategoria', $request->descripcion_subcategoria)
                                    ->where('id_categorias',$categoria_id)->first();

        //$determina si realmente se creó y toma el id
        if($subcategoria!=NULL){
            $subcategoria_id = $subcategoria->id;
        }
        else{
            $mensaje=$mensaje."3 ";
            $subcategoria_id = '0';
            $falla=TRUE;
            return redirect('/crear_producto')->with('mensaje', $mensaje);
        }
         //----------------------------------------------------------------------------------------------
        //Crea registro en tabla Promocion
        app('App\Http\Controllers\PromocionController')->store($request, $id_usuario);

        $promocion=Promocion::all()->where('descuento',$request->descuento)
                                    ->where('tiempo', $request->tiempo)
                                    ->where('id_usuarios', $id_usuario)->first();

        if($promocion!=NULL){
            $promocion_id=$promocion->id;
        }
        else{
            $mensaje=$mensaje."4 ";
            $promocion_id = '0';
            $falla=TRUE;
            return redirect('/crear_producto')->with('mensaje', $mensaje);
        }
         //----------------------------------------------------------------------------------------------
        //Crea registro en tabla Producto
        app('App\Http\Controllers\ProductoController')->store($request,$subcategoria_id,$medida_id);

        $producto=Producto::all()->where('nombre',$request->nombre)
                                ->where('descripcion',$request->descripcion)
                                ->where('id_subcategorias',$subcategoria_id)
                                ->where('id_unidades_medidas',$medida_id)->first();

        if($producto!=NULL){
            $producto_id= $producto->id;
        }
        else{
            $mensaje=$mensaje."5 ";
            $producto_id = '0';
            $falla=TRUE;
            return redirect('/crear_producto')->with('mensaje', $mensaje);
        }
         //----------------------------------------------------------------------------------------------
        //Crea registro en tabla ProductoPromocion
        app('App\Http\Controllers\ProductoPromocionController')->store($request,$producto_id,$promocion_id);
        $productopromocion= ProductoPromocion::all()->where('id_productos',$producto_id)
                                                    ->where('id_promocions',$promocion_id)->first();

        if($productopromocion!=NULL){
            $productopromocion_id = $productopromocion->id;
        }
        else{
            $mensaje=$mensaje."6 ";
            $productopromocion_id = '0';
            $falla=TRUE;
            return redirect('/crear_producto')->with('mensaje', $mensaje);
        }

        //----------------------------------------------------------------------------------------------
        //Crea registro en tabla UsuarioProducto
        app('App\Http\Controllers\UsuarioProductoController')->store($request,$id_usuario,$producto_id);
        $usuarioproducto= UsuarioProducto::all()->where('id_producto',$producto_id)
                                                ->where('id_usuario',$id_usuario)->first();
        if($usuarioproducto!=NULL){
            $usuarioproducto_id = $usuarioproducto->id;
        }
        else{
            $mensaje=$mensaje."7 ";
            $usuarioproducto_id = '0';
            $falla=TRUE;
            return redirect('/crear_producto')->with('mensaje', $mensaje);
        }
        //----------------------------------------------------------------------------------------------
        //Determina el mensaje
        if(!$falla){
            $mensaje=$mensaje.'Se ha creado el producto ';   
        }
        else{
            $mensaje=$mensaje.'Hubo problemas';
        }
        return app('App\Http\Controllers\MainController')->crear_producto_view($id_usuario);
        
        //return redirect('/crear_producto')->with('mensaje', $mensaje); //falta redirigir a successLogin/id_usuario

    }
}

