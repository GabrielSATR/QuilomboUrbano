<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;
use App\Models\Galeria;

class GaleriaController extends Controller
{
    
    public function create()
    {
        return view('galeria.create');
    }

    public function store(Request $request)
{
    $galeria = new Galeria;

    $galeria->titulo = $request->titulo;
    $galeria->descricao = $request->descricao;

    // Upload das imagens
    if ($request->hasFile('imagens')) {
        $imagens = $request->file('imagens');

        foreach ($imagens as $imagem) {
            if ($imagem->isValid()) {
                $nomeImagem = md5($imagem->getClientOriginalName() . strtotime("now")) . '.' . $imagem->extension();
                $imagem->move(public_path('img/galeria'), $nomeImagem);

                // Salvar o nome da imagem na galeria
                $galeria->imagens()->create([
                    'imagem' => $nomeImagem
                ]);
            }
        }
    }

    $galeria->save();

    return redirect('/galeria')->with('msg', 'Galeria criada com sucesso!');
}

public function show($id)
{
    $galeria = Galeria::findOrFail($id);

    return view('galeria.show', ['galeria' => $galeria]);
}

}
