<?php

namespace App\Http\Controllers;

use App\Livro;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\LivroCollection;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // RETORNO COM JSON ------------------------------
        // $livros = Livro::select('id', 'nome', 'subtitulo', 'autor', 'ano_lancamento')->get();
        // return response()->json($livros, 200);
        // -----------------------------------------------
        
        // $livros = DB::table('livros')->simplePaginate(50);
        // return view('livro.index', compact('livros'));

        // API
        // return new LivroCollection(Livro::all());
        return new LivroCollection(Livro::paginate(20));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livro/indexe');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Livro::create([
        //     'nome' => $request->nome,
        //     'subtitulo' => $request->subtitulo,
        //     'autor' => $request->autor,
        //     'ano_lancamento' => $request->ano_lancamento,
        // ]);

        // return redirect('/livro');

        // API ----------------------------
        $livro = new Livro([
            'nome' => $request->nome,
            'subtitulo' => $request->subtitulo,
            'autor' => $request->autor,
            'ano_lancamento' => $request->ano_lancamento,
        ]);

        $livro->save();

        return response()->json('success');
        // -------------------------------------
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "aqui";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // API
        $livro = Livro::find($id);
        return response()->json($livro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // API
        $livro = Livro::find($id);

        $livro->update($request->all());

        return response()->json('successfully updated');
    }

    public function delete()
    {
        // API
        $livro = Livro::find($id);

        $livro->delete();

        return response()->json('successfully deleted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Livro::destroy($id);
        

        return redirect('/livro'); 
    }
}
