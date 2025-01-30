<?php

namespace App\Http\Controllers;
use App\Models\Api_produtos;
use Illuminate\Http\Request;

class ApiProdutos extends Controller
{

    /**
     * Exibir listagem de produtos.
     */
    public function index() {
        return Api_produtos::all();
    }

    
    /**
     * Atualizar produto.
     */
    public function update(Request $request) {

        // Busca o produto pelo ID
        $produto = Api_produtos::find($request->id);
        if(!$produto ) {
            return response()->json(['message' => 'Produto não atualizado'], 404);
        }

        $produto->nome = $request->nome;
        $produto->categoria = $request->categoria;
        $produto->validade = $request->validade;
        $produto->valor = $request->valor;

        // Salva as alterações no banco de dados
        $produto->save();

        // Retorna uma resposta de sucesso
        return response()->json(['message' => 'Produto atualizado com sucesso'], 200);
    }


    /**
     * Deletar produto
     */
    public function destroy($id) {
        // Busca o produto pelo ID
        $produto = Api_produtos::find($id);
    
        // Verifica se o produto existe
        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
    
        // Exclui o produto
        $produto->delete();
    
        return response()->json(['message' => 'Produto excluído com sucesso'], 200);
    }


    /**
     * Exibir item por id
     */
    
     public function show($id){

        return Api_produtos::findOrFail($id);

     }



}
