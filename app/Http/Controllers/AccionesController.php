<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Producto;
use App\Models\Multimedio;
use App\Models\Respuesta;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccionesController extends Controller
{
    //
    public function showProducto($id){

        $sl  = Producto::find($id);
        $photos = Multimedio::where('productos_id',$sl->id)->get();
        

        $qry = DB::table('comentarios')
        ->join('users','comentarios.user_id','=','users.id')
        ->select('comentarios.id','comentarios.comentario','comentarios.user_id','comentarios.created_at','users.name')
        ->where('comentarios.productos_id','=',$id)
        ->get();
        
        

        $cs = json_decode(json_encode($qry), true);
        

        
        
        $qry = DB::table('respuestas')
        ->join('users','respuestas.user_id','=','users.id')
        ->select('respuestas.id','respuestas.comentarios_id','respuestas.respuesta','respuestas.user_id','respuestas.created_at','users.name',)
        ->get();
        
        $rs = json_decode(json_encode($qry), true);

        

        if(!Auth::check()){
            $id = 0;
        return view('cliente.acciones.mostrarProducto',compact('sl','id','photos','cs','rs'));
        }else{
            $id = auth::user()->id;
        return view('cliente.acciones.mostrarProducto',compact('sl','id','photos','cs','rs'));
        }        
    
    }

    public function addCommentary(Request $request){
        $c = new Comentario();
        $c->comentario = $request->Comentario;
        $c->user_id = $request->id_user;
        $c->productos_id = $request->id_producto;
        $c->created_at = date('Y-m-d');
        $c->save();
        
        return redirect('Showproducto/'.$request->id_producto);
    }

    public function deleteCommentary(Request $request, $id){
        $cs = Comentario::find($id);
        $cs->delete();
        return redirect('Showproducto/'.$request->id_producto);
    }

    public function addResponse(Request $request,$id){
        $r= new Respuesta();
        $r->respuesta = $request->Respuesta;
        $r->user_id = $request->id_user;
        $r->comentarios_id = $id;
        $r->created_at = date('Y-m-d');
        $r->save();

        return redirect('Showproducto/'.$request->id_producto);
    }

    public function deleteResponse(Request $request, $id){
        $rs = Respuesta::find($id);
        $rs->delete();
        return redirect('Showproducto/'.$request->id_producto);
    }

    //con esta funcion convierto al cliente a vendedor
    public function clienteVendedor(Request $request, $id){
        $us = User::find($id);
        $us->rol = $request->input('rol');
        $us->save();
        return redirect('/');
    }

}
