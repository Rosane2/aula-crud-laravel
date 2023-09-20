<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class TipostatusController extends Controller
{
    public function __construct()   {
		
    }
	
	public function index(Request $request) {

	    $pesquisa = $request->pesquisar;
				 		 
		if (!empty($pesquisa)) {
			$find = DB::select('SELECT * FROM tipostatus WHERE descricao ilike ? ORDER BY ativo, descricao DESC',  [$pesquisa.'%']);
            if (empty($find)) {
                $find[0] = (object)array('descricao'=>'Nome do status nao encontrado!!!', 'ativo'=>'0');
            }
        } else {		
			$find = DB::select('SELECT * FROM tipostatus ORDER BY ativo DESC, descricao'); 
            if (empty($find)) {
                $find[0] = (object)array('descricao'=>'Sem dados para listar!!!', 'ativo'=>'0');
            }
        }
		
		return view('pages.tipostatus.paginacao', ['find' => $find]); 
	}
	
	public function delete(Request $request) {
		 $id           = $request->id;
		 $ativo        = 'N'; 
		 $retorno =  DB::update('UPDATE tipostatus SET ativo = ? WHERE id = ?', [$ativo, $id]);		
		 return response()->json(['success' => true]);	
	}

	public function habilitar(Request $request) {
		$id           = $request->id;
		$ativo        = 'S'; 
		$retorno =  DB::update('UPDATE tipostatus SET ativo = ? WHERE id = ?', [$ativo, $id]);		
		return response()->json(['success' => true]);	
   }

	public function listar() {		
		 $dados = DB::select('SELECT * FROM tipostatus ORDER BY ativo DESC, id');
		 return $dados;
	}

	public function carregar($id) {		
		 $dados = DB::select("SELECT * FROM tipostatus WHERE id = :id", ['id' => $id]);
		 return $dados;
	}

	public function cadastrarTipostatus(Request $request) {		

		if($request->method() == 'POST') {

			// GRAVAR
			$dados = $request->all();
			
			$descricao    = strtoupper($dados['descricao']);
			
			$retorno =  DB::insert('INSERT INTO tipostatus (descricao) VALUES (:descricao)', ['descricao' => $descricao]);
			
			return redirect()->route('tipostatus.index');
		}

		return view('pages.tipostatus.create');  
	}

	public function atualizarTipostatus(Request $request, $id) {
        
		
		if($request->method() == 'PUT') {
			$dados = $request->all();
					
			$descricao    = strtoupper($dados['descricao']);
			
			$retorno =  DB::update('UPDATE tipostatus SET descricao = ? WHERE id = ?', [$descricao, $id]);		 
			
			return redirect()->route('tipostatus.index');
		}
        
		$find = $this->carregar($id); 
		$find = $find[0];
		
		return view('pages.tipostatus.atualiza', ['find' => $find]);  
        
   } 

}