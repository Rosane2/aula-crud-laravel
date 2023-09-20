<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SemestreController extends Controller
{
    public function index(Request $request) {

	    $pesquisa = $request->pesquisar;
				 		 
		if (!empty($pesquisa)) {
			$find = DB::select('SELECT * FROM semestre WHERE anosemestre ilike ? ORDER BY ativo DESC, anosemestre', [$pesquisa.'%']);
            if (empty($find)) {
                $find[0] = (object)array('anosemestre'=>'Ano Semestre nao encontrado!!!', 'ativo'=>'0');
            }
        } else {		
			$find = DB::select('SELECT * FROM semestre ORDER BY ativo DESC, anosemestre'); 
            if (empty($find)) {
                $find[0] = (object)array('anosemestre'=>'Sem dados para listar!!!', 'ativo'=>'0');
            }
        }
		
		return view('pages.semestre.paginacao', ['find' => $find]); 
	}

	public function delete(Request $request) {
        $id           = $request->id;
        $ativo        = 'N'; 
        $retorno =  DB::update('UPDATE semestre SET ativo = ? WHERE anosemestre = ?', [$ativo, $id]);		
        return response()->json(['success' => true]);	
   }

   public function habilitar(Request $request) {
       $id           = $request->id;
       $ativo        = 'S'; 
       $retorno =  DB::update('UPDATE semestre SET ativo = ? WHERE anosemestre = ?', [$ativo, $id]);		
       return response()->json(['success' => true]);	
  }

   public function listar() {		
        $dados = DB::select('SELECT * FROM semestre ORDER BY ativo DESC, anosemestre DESC');
        return $dados;
   }

   public function carregar($id) {		
        $dados = DB::select("SELECT * FROM semestre WHERE anosemestre = :id", ['id' => $id]);
        return $dados;
   }

   public function cadastrarSemestre(Request $request) {		
       if($request->method() == 'POST') {
           // GRAVAR
           $dados = $request->all();
           
           $descricao    = strtoupper($dados['anosemestre']);
           
           $retorno =  DB::insert('INSERT INTO semestre (anosemestre) VALUES (:descricao)', ['descricao' => $descricao]);
           
           return redirect()->route('semestre.index');
        }

       return view('pages.semestre.create');  
   }


}
