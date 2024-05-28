<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();

        $data = [
            'comics' => $comics
        ];

        return view('comics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all();
        $this->validator($formData);

        $formData = $request->all();

        $newComic = new Comic();
        // $newComic->title = $formData['title'];
        // $newComic->description = $formData['description'];
        // $newComic->thumb = $formData['thumb'];
        // $newComic->price = $formData['price'];
        // $newComic->series = $formData['series'];
        // $newComic->sale_date = $formData['sale_date'];
        // $newComic->type = $formData['type'];
        $newComic->fill($formData);
        $newComic->save();

        return redirect()->route('comics.show', ['comic' => $newComic->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);

        $data = [
            'comic' => $comic
        ];

        return view('comics.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);

        $data = [
            'comic' => $comic
        ];

        return view('comics.edit', $data);
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
        $comic = Comic::findOrFail($id);
        $formData = $request->all();

       $comic->update($formData);

       $formData = $request->all();
        $this->validator($formData);

       return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();

        return redirect()->route('comics.index');
    }

    private function validator($data){
        $validator = Validator::make(
        $data,
        [
            'title' => 'required|min:5|max:100',
            'description' => 'required|min:10|max:2000',
            'thumb' => 'required|max: 250',
            'price' => 'required|decimal:2|numeric|max:999999.99',
            'type' => 'required|min:4|max:50',
            'series' => 'required|min:4|max:50',
            'sale_date' => 'required|date'
        ],
        [
            'title.required' => 'Il campo titolo è obbligatorio',
            'title.max' => 'Il campo titolo non può avere più di 50 caratteri',
            'title.min' => 'Il campo titolo deve avere almeno 5 caratteri',
            'description.required' => 'Il campo descrizione è obbligatorio',
            'description.max' => 'Il campo descrizione non può avere più di 2000 caratteri',
            'description.min' => 'Il campo descrizione deve avere almeno 10 caratteri',
            'thumb.required' => 'Il campo immagine è obbligatorio',
            'thumb.max' => 'Il campo immagine non può avere più di 250 caratteri',
            'price.required' => 'Il campo prezzo è obbligatorio',
            'price.decimal' => 'Il campo prezzo deve avere 2 decimali',
            'type.required' => 'Il campo tipo è obbligatorio',
            'type.max' => 'Il campo tipo non può avere più di 50 caratteri',
            'type.min' => 'Il campo tipo deve avere almeno 4 caratteri',
            'series.required' => 'Il campo serie è obbligatorio',
            'series.max' => 'Il campo serie non può avere più di 50 caratteri',
            'series.min' => 'Il campo serie deve avere almeno 4 caratteri',
            'sale_date.required' => 'Il campo data è obbligatorio'

        ]

        )->validate();

        return $validator;
    }
}
