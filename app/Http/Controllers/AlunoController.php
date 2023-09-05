<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller
{

    public function __construct()   {
        
    }

    public function index(Request $request) {

	    $pesquisa = $request->pesquisar;
				 		 
		if (!empty($pesquisa)) {
			$find = DB::select('SELECT * FROM aluno INNER JOIN tipostatus ON aluno.idstatus_atual=tipostatus.id WHERE nomedoaluno ilike ? ORDER BY aluno.ativo DESC, matricula', [$pesquisa]); 
            if (empty($find)) {
                $find[0] = (object)array('nomedoaluno'=>'Aluno nao encontrado!!!', 'ativo'=>'0');
            }
        } else {		
			$find = DB::select('SELECT * FROM aluno INNER JOIN tipostatus ON aluno.idstatus_atual=tipostatus.id ORDER BY aluno.ativo DESC, matricula'); 
            if (empty($find)) {
                $find[0] = (object)array('nomedoaluno'=>'Sem dados para listar!!!', 'ativo'=>'0');
            }
        }
		
        return view('pages.aluno.paginacao', ['find' => $find]); 
	}

	public function delete(Request $request) {
        $id           = $request->id;
        $ativo        = 'N'; 
        $retorno =  DB::update('UPDATE aluno SET ativo = ? WHERE id = ?', [$ativo, $id]);		
        return response()->json(['success' => true]);	
    }

    public function habilitar(Request $request) {
       $id           = $request->id;
       $ativo        = 'S'; 
       $retorno =  DB::update('UPDATE aluno SET ativo = ? WHERE id = ?', [$ativo, $id]);		
       return response()->json(['success' => true]);	
    }

    
    public function listar() {		
        $dados = DB::select('SELECT * FROM aluno ORDER BY ativo DESC, matricula');
        return $dados;
    }

    public function carregar($id) {		
        $dados = DB::select("SELECT * FROM aluno WHERE matricula = :id", ['id' => $id]);
        return $dados;
    }    

	public function cadastrarAluno(Request $request) {		

        $findTurno = DB::select('SELECT * FROM turno WHERE ativo = :status ORDER BY descricao', ['status' => 'S']); 
        $findCurso = DB::select('SELECT * FROM curso WHERE ativo = :status ORDER BY nomecurso', ['status' => 'S']);
        $findSemestre = DB::select('SELECT * FROM semestre WHERE ativo = :status ORDER BY anosemestre DESC', ['status' => 'S']);
        $findStatus = DB::select('SELECT * FROM tipostatus WHERE ativo = :status ORDER BY descricao', ['status' => 'S']); 

		if($request->method() == 'POST') {

			// GRAVAR
			$dados = $request->all();
            #dd($dados);
            $matricula             = $dados['matricula'];
            $nomedoaluno           = strtoupper($dados['nomedoaluno']);
            $cpf                   = $dados['cpf'];
            $email                 = strtolower($dados['email']);
            $celular               = $dados['celular'];
            $cep                   = $dados['cep'];
            $rua                   = strtoupper($dados['rua']);
            $numero                = $dados['numero'];
            $complemento           = strtoupper($dados['complemento']);
            $bairro                = strtoupper($dados['bairro']);
            $cidade                = strtoupper($dados['cidade']);
            $uf                    = strtoupper($dados['uf']);
            $idcurso_atual         = $dados['idcurso_atual'];
            $idturno_atual         = $dados['idturno_atual'];
            $idstatus_atual        = $dados['idstatus_atual'];
            $anosemestre_primeiro  = $dados['anosemestre_primeiro'];
            $anosemestre_ultimo    = $dados['anosemestre_ultimo'];
			
			$retorno =  DB::insert('INSERT INTO aluno (matricula, nomedoaluno, cpf, email, celular, cep, rua, numero, complemento, bairro, cidade, uf, idcurso_atual, idturno_atual, anosemestre_primeiro, anosemestre_ultimo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$matricula, $nomedoaluno, $cpf, $email, $celular, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $idcurso_atual, $idturno_atual, $anosemestre_primeiro, $anosemestre_ultimo]);
			
			return redirect()->route('aluno.index');
		}

		return view('pages.aluno.create', ['findCurso' => $findCurso, 'findTurno' => $findTurno, 'findSemestre' => $findSemestre, 'findStatus' => $findStatus]);
	}
    
	public function atualizarAluno(Request $request, $id) {
        		
		if($request->method() == 'PUT') {
			$dados = $request->all();
					
			$descricao    = strtoupper($dados['descricao']);
			
			$retorno =  DB::update('UPDATE aluno SET descricao = ? WHERE id = ?', [$descricao, $id]);		 
			
            return redirect()->route('aluno.index');
        }
        

		$find = $this->carregar($id); 
		$find = $find[0];
		
		return view('pages.aluno.atualiza', ['find' => $find]);  
        
   } 

}
