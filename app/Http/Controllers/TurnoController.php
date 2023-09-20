<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TurnoController extends Controller
{

    public function index(Request $request) {

	    $pesquisa = $request->pesquisar;
				 		 
		if (!empty($pesquisa)) {
			$find = DB::select('SELECT * FROM turno WHERE descricao ilike ? ORDER BY ativo DESC, descricao', [$pesquisa.'%']);
            if (empty($find)) {
                $find[0] = (object)array('descricao'=>'Turno nao encontrado!!!', 'ativo'=>'0');
            }
        } else {		
			$find = DB::select('SELECT * FROM turno ORDER BY ativo DESC, descricao'); 
            if (empty($find)) {
                $find[0] = (object)array('descriao'=>'Sem dados para listar!!!', 'ativo'=>'0');
            }
        }
		
		return view('pages.turno.paginacao', ['find' => $find]); 
	}

	public function delete(Request $request) {
        $id           = $request->id;
        $ativo        = 'N'; 
        $retorno =  DB::update('UPDATE turno SET ativo = ? WHERE id = ?', [$ativo, $id]);		
        return response()->json(['success' => true]);	
    }

    public function habilitar(Request $request) {
       $id           = $request->id;
       $ativo        = 'S'; 
       $retorno =  DB::update('UPDATE turno SET ativo = ? WHERE id = ?', [$ativo, $id]);		
       return response()->json(['success' => true]);	
    }

    public function listar() {		
        $dados = DB::select('SELECT * FROM turno ORDER BY ativo DESC, id');
        return $dados;
    }

    public function carregar($id) {		
        $dados = DB::select("SELECT * FROM turno WHERE id = :id", ['id' => $id]);
        return $dados;
    }  
    
	public function cadastrarTurno(Request $request) {		

		if($request->method() == 'POST') {

			// GRAVAR
			$dados = $request->all();
			
			$descricao    = strtoupper($dados['descricao']);
			
			$retorno =  DB::insert('INSERT INTO turno (descricao) VALUES (:descricao)', ['descricao' => $descricao]);
			
			return redirect()->route('turno.index');
		}

		return view('pages.turno.create');  
	}
    
	public function atualizarTurno(Request $request, $id) {
        		
		if($request->method() == 'PUT') {
			$dados = $request->all();
					
			$descricao    = strtoupper($dados['descricao']);
			
			$retorno =  DB::update('UPDATE turno SET descricao = ? WHERE id = ?', [$descricao, $id]);		 
			
            return redirect()->route('turno.index');
        }
        

		$find = $this->carregar($id); 
		$find = $find[0];
		
		return view('pages.turno.atualiza', ['find' => $find]);  
        
   } 
    
}
