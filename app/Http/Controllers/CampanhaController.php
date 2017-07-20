<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campanha;

class CampanhaController extends Controller
{
    public function __construct(Campanha $campanha)
    {
        $this->campanha = $campanha;
        $this->campanhas = $this->campanha->get();
        $this->middleware('auth');
    }

    public function Index()
    {   
        $alerta = array(['msg'=> session()->pull('msg')]);

        if(!empty($alerta[0]['msg']))
        {
            alert()->success($alerta[0]['msg']);
        }

        $campanhas = $this->campanhas;
        return view('campanha.index', compact('campanhas', 'alerta'));
    }

    public function Criar()
    {
        $campanhas = $this->campanhas;
        return view('campanha.criar', compact('campanhas'));
    }

    public function Editar($id)
    {
        $campanhas = $this->campanhas;
        $campanha = $this->campanha->find($id);
        return view('campanha.criar', compact('campanha', 'campanhas'));
    }

    public function Salvar(Request $request)
    {
        $this->validate($request, $this->campanha->rules);

        $form = $request->all();

        $nome_arquivo = time().'.'.$request->file('imagem')->getClientOriginalExtension();
        $request->file('imagem')->move('imagens', $nome_arquivo);

        $form['imagem'] = $nome_arquivo;

        //Salvar
        if(empty($request->id)){
            $campanha = $this->campanha->create($form);
            if($campanha){
                session()->put('msg', 'Campanha criada com sucesso!');
            }
            else{
                session()->put('msg', 'Erro!');
            }
        } 
        //Editar
        else{
            $campanha = $this->campanha->find($request->id);
            $update = $campanha->update($form);
            if($update){
                session()->put('msg', 'Campanha editada com sucesso!');    
            }
            else
            {
                session()->put('msg', 'Erro!');
            }

        }
        return redirect()->action('CampanhaController@Index');
    }

    public function Excluir($id)
    {
        $this->campanha->find($id)->delete();
        session()->put('msg', 'Campanha excluida com sucesso!');
        return redirect()->action('CampanhaController@Index');
    }
}
