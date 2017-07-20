<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peca;
use App\Models\Formato;
use App\Models\Linhacriativa;
use App\Models\Portal;
use App\Models\Campanha;
use ZipArchive;

class PecaController extends Controller
{
    public function __construct(Peca $peca, Formato $formato, Linhacriativa $linhacriativa, Portal $portal, Campanha $campanha)
    {
        $this->peca = $peca;
        $this->formato = $formato;
        $this->linhacriativa = $linhacriativa;
        $this->portal = $portal;
        $this->campanha = $campanha;
        $this->campanhas = $this->campanha->get();
        $this->middleware('auth');
    }

    public function Index($formato_id)
    {   
        $alerta = array(['msg'=> session()->pull('msg')]);
        if(!empty($alerta[0]['msg']))
        {
            alert()->info($alerta[0]['msg']);
        }
        
        $pecas = $this->peca->where('formato_id', $formato_id)->paginate(10);
        
        $linhacriativa_id = 0;
        if(count($pecas) > 0){
            $linhacriativa_id = $pecas[0]->formato->linhacriativa_id;
        }
        else{
            $linhacriativa_id = $this->formato->find($formato_id)->linhacriativa_id;
        }

        $linhacriativa = $this->linhacriativa->find($linhacriativa_id);
        $portal_id = $linhacriativa->portal_id;
        $campanha_id = $linhacriativa->campanha_id;
        $campanhas = $this->campanhas;

        return view('peca.index', compact('pecas', 'linhacriativa_id', 'formato_id', 'portal_id', 'campanha_id', 'alerta', 'campanhas'));
    }

    public function Criar($formato_id)
    {
        $linhacriativa_id = $this->formato->find($formato_id)->linhacriativa_id;
        $campanhas = $this->campanhas;
        return view('peca.criar', compact('formato_id', 'linhacriativa_id', 'campanhas'));
    }

    public function Editar($id)
    {
        $peca = $this->peca->find($id);
        $campanhas = $this->campanhas;
        return view('peca.criar', compact('peca', 'campanhas'));
    }

    public function Salvar(Request $request)
    {
        $this->validate($request, $this->peca->rules);
        $arquivoZip = $request->file('arquivo');
        

        // $nomeArquivo = date("dmyHms");
        $form = $request->all();

        //--
        $nome_arquivo = time();

        //Remover aquivos do zip
        $zip = new ZipArchive;
        $zip->open($request->file('arquivo'));
        $zip->extractTo('banners/'.$nome_arquivo.'/');
        $zip->close();

        $request->file('arquivo')->move('banners/'.$nome_arquivo, $nome_arquivo.'.'.$request->file('arquivo')->getClientOriginalExtension());
        //--
        
        // $path = $request->file('arquivo')->store($nomeArquivo);

        $nomeOriginal = $request->file('arquivo')->getClientOriginalName();

        $nomeOriginal = str_replace('.zip', '', $nomeOriginal);

        

        // $pasta = explode('/', $path)[0];

        $form['arquivo'] = $nome_arquivo.'.zip';
        $form['nome_original'] = $nomeOriginal;
        $form['pasta'] = $nome_arquivo;

        //Salvar
        if(empty($request->id)){
            $peca = $this->peca->create($form);
            if($peca){
                session()->put('msg', 'Peça criada com sucesso!');
            }
            else{
                session()->put('msg', 'Erro!');
            }
        } 
        //Editar
        else{
            $peca = $this->peca->find($request->id);
            $update = $peca->update($form);
            if($update){
                session()->put('msg', 'Peça editada com sucesso!');    
            }
            else
            {
                session()->put('msg', 'Erro!');
            }

        }
        return redirect()->action('PecaController@Index', ['formato_id' => $request->formato_id]);
    }

    public function Excluir($id)
    {
        $peca = $this->peca->find($id);
        $formato_id = $peca->formato_id;
        $peca->delete();
        session()->put('msg', 'Peça excluida com sucesso!');
        return redirect()->action('PecaController@Index', ['formato_id' => $formato_id]);
    }
}
