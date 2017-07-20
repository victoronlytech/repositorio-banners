<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medida;
use App\Models\Campanha;

class MedidaController extends Controller
{
    public function __construct(Medida $medida, Campanha $campanha)
    {
        $this->medida = $medida;
        $this->campanha = $campanha;
        $this->campanhas = $this->campanha->get();
        $this->middleware('auth');
    }

    public function Index()
    {   
        $alerta = array(['msg'=> session()->pull('msg')]);
        if(!empty($alerta[0]['msg']))
        {
            alert()->info($alerta[0]['msg']);
        }
        $medidas = $this->medida->paginate(10);
        $campanhas = $this->campanhas;
        return view('medida.index', compact('medidas', 'campanhas', 'alerta'));
    }

    public function Criar()
    {
        $campanhas = $this->campanhas;
        return view('medida.criar', compact('campanhas'));
    }

    public function Editar($id)
    {
        $campanhas = $this->campanhas;
        $medida = $this->medida->find($id);
        return view('medida.criar', compact('medida', 'campanhas'));
    }

    public function Salvar(Request $request)
    {
        $this->validate($request, $this->medida->rules);

        $form = $request->all();
        //Salvar
        if(empty($request->id)){
            $medida = $this->medida->create($form);
            if($medida){
                session()->put('msg', 'Medida criada com sucesso!');
            }
            else{
                session()->put('msg', 'Erro!');
            }
        } 
        //Editar
        else{
            $medida = $this->medida->find($request->id);
            $update = $medida->update($form);
            if($update){
                session()->put('msg', 'Medida editada com sucesso!');    
            }
            else
            {
                session()->put('msg', 'Erro!');
            }

        }
        return redirect()->action('MedidaController@Index');
    }

    public function Excluir($id)
    {
        $this->medida->find($id)->delete();
        session()->put('msg', 'Medida excluida com sucesso!');
        return redirect()->action('MedidaController@Index');
    }
}
