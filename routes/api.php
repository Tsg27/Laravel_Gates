<?php

//use Illuminate\Http\Request;
//use App\Http\Controllers\ApiProdutos;
//use Illuminate\Support\Facades\Route;



//Route::get('/produtos', [ApiProdutos::class, 'index']); //Exibir produtos
//Route::put('/produtos/{id}', [ApiProdutos::class, 'update']); // Atualizar produto
//Route::delete('/produtos/{id}', [ApiProdutos::class, 'destroy']); // Deletar item


Route::apiResource('produtos', 'App\Http\Controllers\ApiProdutos');