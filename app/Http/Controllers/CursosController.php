<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CursosController extends Controller
{
    public function __construct()   {
		
    }
	
	public function index(Request $request) {
	    $pesquisa = $request->pesquisar;
				 		 
		if (!empty($pesquisa)) {
			$findCurso = DB::select('SELECT * FROM curso WHERE nomecurso ilike ? ORDER BY ativo, nomecurso DESC', [$pesquisa]); 
		} else {		
			$findCurso = DB::select('SELECT * FROM curso ORDER BY ativo DESC, nomecurso'); 
		}
		
		if (empty($findCurso)) {
			$findCurso[0] = (object)array('nomecurso'=>'Nome do curso nao encontrado!!!', 'cargahoraria'=>'0', 'ativo'=>'0');
		}
		
		return view('pages.cursos.paginacao', ['findCurso' => $findCurso]);
	}
	
	public function delete(Request $request) {
		 $id           = $request->id;
		 $ativo        = 'N'; 
		 $retorno =  DB::update('UPDATE curso SET ativo = ? WHERE id = ?', [$ativo, $id]);		
		 return response()->json(['success' => true]);	
	}

	public function habilitar(Request $request) {
		$id           = $request->id;
		$ativo        = 'S'; 
		$retorno =  DB::update('UPDATE curso SET ativo = ? WHERE id = ?', [$ativo, $id]);		
		return response()->json(['success' => true]);	
   }

	public function listar() {		
		 $dados = DB::select('SELECT * FROM curso ORDER BY ativo DESC, nomecurso');
		 return $dados;
	}

	public function carregar($id) {		
		 $dados = DB::select("SELECT * FROM curso WHERE id = :id", ['id' => $id]);
		 return $dados;
	}

	public function cadastrarCurso(Request $request) {		

		if($request->method() == 'POST') {
			// GRAVAR
			$dados = $request->all();
			
			$nomecurso    = strtoupper($dados['nomecurso']);
			$cargahoraria = $dados['cargahoraria'];
			
			$retorno =  DB::insert('INSERT INTO curso (nomecurso, cargahoraria) VALUES (:nomecurso, :cargahoraria)', ['nomecurso' => $nomecurso, 'cargahoraria' => $cargahoraria]);
			
			return redirect()->route('curso.index');
		}

		return view('pages.cursos.create');  
	}

	public function atualizarCurso(Request $request, $id) {
		
		if($request->method() == 'PUT') {
			$dados = $request->all();
					
			$nomecurso    = strtoupper($dados['nomecurso']);
			$cargahoraria = $dados['cargahoraria'];
			
			$retorno =  DB::update('UPDATE curso SET nomecurso = ?, cargahoraria = ? WHERE id = ?', [$nomecurso, $cargahoraria, $id]);		 
			
			return redirect()->route('curso.index');
		}
	
		$findCurso = $this->carregar($id); 
		$findCurso = $findCurso[0];
		
		return view('pages.cursos.atualiza', ['findCurso' => $findCurso]);  
   }

}
