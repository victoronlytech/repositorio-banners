<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formato;
use App\Models\Medida;
use App\Models\Linhacriativa;
use App\Models\Portal;
use App\Models\Campanha;

class FormatoController extends Controller
{
    public function __construct(Formato $formato, Medida $medida, Linhacriativa $linhacriativa, Portal $portal, Campanha $campanha)
    {
        $this->middleware('auth');
        $this->formato = $formato;
        $this->medida = $medida;
        $this->linhacriativa = $linhacriativa;
        $this->portal = $portal;
        $this->campanha = $campanha;
        $this->campanhas = $this->campanha->get();
    }

    public function Index($linhacriativa_id)
    {   
        $alerta = array(['msg'=> session()->pull('msg')]);
        if(!empty($alerta[0]['msg']))
        {
            alert()->info($alerta[0]['msg']);
        }

        $formatos = $this->formato->where('linhacriativa_id', $linhacriativa_id)->paginate(10);
        $portal_id = $this->linhacriativa->find($linhacriativa_id)->portal_id;
        $campanha_id = $this->portal->find($portal_id)->campanha_id;
        $campanhas = $this->campanhas;

        return view('formato.index', compact('formatos', 'linhacriativa_id', 'portal_id', 'campanha_id', 'campanha', 'alerta'));
    }

    public function Criar($linhacriativa_id)
    {
        $medidas = $this->medida->all();
        $campanhas = $this->campanhas;
        return view('formato.criar', compact('linhacriativa_id', 'medidas', 'campanhas'));
    }

     public function Editar($id)
    {
        $medidas = $this->medida->all();
        $formato = $this->formato->find($id);
        $campanhas = $this->campanhas;
        return view('formato.criar', compact('formato', 'medidas', 'campanhas'));
    }

    public function Salvar(Request $request)
    {
        $this->validate($request, $this->formato->rules);

        $portal_id = $this->linhacriativa->find($request->linhacriativa_id)->portal_id;

        $form = $request->all();
        //Salvar
        if(empty($request->id)){
            $formato = $this->formato->create($form);
            if($formato){
                session()->put('msg', 'Formato criado com sucesso!');
            }
            else{
                session()->put('msg', 'Erro!');
            }
        } 
        //Editar
        else{
            $formato = $this->formato->find($request->id);
            $update = $formato->update($form);
            if($update){
                session()->put('msg', 'Formato editado com sucesso!');    
            }
            else
            {
                session()->put('msg', 'Erro!');
            }

        }
        return redirect()->action('FormatoController@Index', ['linhacriativa_id' => $request->linhacriativa_id]);
    }

    public function Excluir($id)
    {
        $formato = $this->formato->find($id);
        $linhacriativa_id = $formato->linhacriativa_id;
        $formato->delete();
        session()->put('msg', 'Formato excluido com sucesso!');
        return redirect()->action('FormatoController@Index', ['linhacriativa_id' => $linhacriativa_id]);
    }
}
