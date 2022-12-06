<?php

namespace App\Http\Controllers;

use App\Http\Requests\Person\CreatePersonRequest;
use App\Http\Requests\Person\UpdatePersonRequest;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Person::class, 'person');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Person::where('user_id', auth()->id())->orderBy('id', 'desc')->paginate(9);
        return view('person.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePersonRequest $createPersonRequest)
    {
        $data = $createPersonRequest->validated();
        $data['img'] = $data['img']->store('public/person');
        $data['img'] = str_replace('public', 'storage', $data['img']);
        Person::create($data+['user_id'=>auth()->id()]);
        return redirect()->route('person.index')->with('success', 'Pessoa cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        return view('person.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonRequest $updatePersonRequest, Person $person)
    {
        $data = $updatePersonRequest->validated();
        if(isset($data['img'])){
            $data['img'] = $data['img']->store('public/person');
            $data['img'] = str_replace('public', 'storage', $data['img']);
        }
        $person->update($data);
        return redirect()->route('person.index')->with('success', 'Pessoa editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('person.index')->with('success', 'Pessoa deletada com sucesso!');
    }
}
