<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portal;
use App\Models\Campanha;
use App\Models\Campanha_portal;

class PortalController extends Controller
{
    public function __construct(Portal $portal, Campanha $campanha, Campanha_portal $campanha_portal)
    {
        $this->portal = $portal;
        $this->campanha_portal = $campanha_portal;
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
        
        $portais = $this->portal->paginate(10);
        $campanhas = $this->campanhas;
        return view('portal.index', compact('portais', 'alerta', 'campanhas'));
    }

    public function Criar()
    {
        $campanhas = $this->campanhas;
        return view('portal.criar', compact('campanhas'));
    }

    public function Editar($id)
    {
        $portal = $this->portal->find($id);
        $campanhas = $this->campanhas;
        return view('portal.criar', compact('portal', 'campanhas'));
    }

    public function Salvar(Request $request)
    {
        $this->validate($request, $this->portal->rules);

        $form = $request->all();

        $nome_arquivo = time().'.'.$request->file('imagem')->getClientOriginalExtension();
        $request->file('imagem')->move('imagens', $nome_arquivo);

        $form['imagem'] = $nome_arquivo;

        //Salvar
        if(empty($request->id)){
            $portal = $this->portal->create($form);
            if($portal){
                session()->put('msg', 'Portal criado com sucesso!');
            }
            else{
                session()->put('msg', 'Erro!');
            }
        } 
        //Editar
        else{
            $portal = $this->portal->find($request->id);
            $update = $portal->update($form);
            if($update){
                session()->put('msg', 'Portal editado com sucesso!');    
            }
            else
            {
                session()->put('msg', 'Erro!');
            }

        }
        return redirect()->action('PortalController@Index', ['campanha_id' => $request->campanha_id]);
    }

    public function Excluir($id)
    {
        $portal = $this->portal->find($id);
        $campanha_id = $portal->campanha_id;
        $portal->delete();
        session()->put('msg', 'Portal excluido com sucesso!');
        return redirect()->action('PortalController@Index', ['campanha_id' => $campanha_id]);
    }

    public function PortaisCampanha($campanha_id)
    {           
        $portais = $this->campanha->find($campanha_id)->portais;
        $campanhas = $this->campanhas;
        return view('portal.index', compact('portais', 'campanha_id', 'campanhas'));
    }

    public function AddPortal($campanha_id)
    {
        $portais = $this->portal->paginate(20);;
        $portais_campanha = $this->campanha->find($campanha_id)->portais;
        $campanhas = $this->campanhas;
        return view('portal.adicionar', compact('portais', 'portais_campanha', 'campanha_id', 'campanhas'));
    }

    public function SalvarPortal(Request $request)
    {
        $this->validate($request, $this->campanha_portal->rules);
        
        $form = $request->all();
        $ids = $form['portal_id'];
        $campanha = $this->campanha->find($request->campanha_id);
        $campanha->portais()->attach($ids);

        // dd($campanha);
        // die();

        // foreach ($ids as $id) {

        //     $form['portal_id'] = $id;
        //     $campanha_portal = $this->campanha_portal->create($form);
        //     if($campanha_portal){
        //         session()->put('msg', 'Dados criado com sucesso!');
        //     }
        //     else{
        //         session()->put('msg', 'Erro!');
        //     }

        // }



        // //Salvar
        // if(empty($request->id)){
        //     $portal = $this->portal->create($form);
        //     if($portal){
        //         session()->put('msg', 'Portal criado com sucesso!');
        //     }
        //     else{
        //         session()->put('msg', 'Erro!');
        //     }
        // } 
        // //Editar
        // else{
        //     $portal = $this->portal->find($request->id);
        //     $update = $portal->update($form);
        //     if($update){
        //         session()->put('msg', 'Portal editado com sucesso!');    
        //     }
        //     else
        //     {
        //         session()->put('msg', 'Erro!');
        //     }

        // }
        return redirect()->action('PortalController@PortaisCampanha', ['campanha_id' => $request->campanha_id]);
    }
}
