<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Linhacriativa;
use App\Models\Portal;
use App\Models\Campanha;

class LinhacriativaController extends Controller
{
    public function __construct(Linhacriativa $linhacriativa, Portal $portal, Campanha $campanha)
    {
        $this->linhacriativa = $linhacriativa;
        $this->portal = $portal;
        $this->campanha = $campanha;
        $this->campanhas = $this->campanha->get();
        $this->middleware('auth');
    }

    public function Index($campanha_id, $portal_id)
    {   
        $alerta = array(['msg'=> session()->pull('msg')]);
        if(!empty($alerta[0]['msg']))
        {
            alert()->info($alerta[0]['msg']);
        }
        
        $linhacriativas = $this->linhacriativa->where('portal_id', $portal_id)->where('campanha_id', $campanha_id)->paginate(10);
        $campanhas = $this->campanhas;
        return view('linhacriativa.index', compact('linhacriativas', 'portal_id', 'campanha_id', 'campanhas', 'alerta'));
    }

    public function Criar($campanha_id, $portal_id)
    {
        $campanhas = $this->campanhas;
        return view('linhacriativa.criar', compact('portal_id', 'campanha_id', 'campanhas'));
    }

     public function Editar($id)
    {
        $linhacriativa = $this->linhacriativa->find($id);
        $campanhas = $this->campanhas;
        return view('linhacriativa.criar', compact('linhacriativa', 'campanhas'));
    }

    public function Salvar(Request $request)
    {
        $this->validate($request, $this->linhacriativa->rules);

        $form = $request->all();
        //Salvar
        if(empty($request->id)){
            $linhacriativa = $this->linhacriativa->create($form);
            if($linhacriativa){
                session()->put('msg', 'Linha criativa criada com sucesso!');
            }
            else{
                session()->put('msg', 'Erro!');
            }
        } 
        //Editar
        else{
            $linhacriativa = $this->linhacriativa->find($request->id);
            $update = $linhacriativa->update($form);
            if($update){
                session()->put('msg', 'Linha criativa editada com sucesso!');    
            }
            else
            {
                session()->put('msg', 'Erro!');
            }

        }
        return redirect()->action('LinhacriativaController@Index', ['campanha_id' => $request->campanha_id, 'portal_id' => $request->portal_id]);
    }

    public function Excluir($id)
    {
        $linhacriativa = $this->linhacriativa->find($id);
        $portal_id = $linhacriativa->portal_id;
        $linhacriativa->delete();
        session()->put('msg', 'Linha criativa excluida com sucesso!');
        return redirect()->action('LinhacriativaController@Index', ['portal_id' => $portal_id]);
    }
}
