<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use  \Http\Request;
use App\Http\Requests;
use App\Notebook;
use Illuminate\Support\Facades\Auth;



class NotebooksController extends Controller
{
	public function index()
	{
		$user = Auth::user();
        $notebooks = $user->notebooks;
        return view('notebooks.index', compact('notebooks'));
	}

	public function create()
	{
		return view('notebooks.create');
	}

    public function store(Request $request)
    {
		$dataInput = $request->all();
		$user = Auth::user();
		$notebooks = $user->notebooks()->create($dataInput);
	
		return redirect('/notebooks');
	}

	public function edit($id)
	{
		$user = Auth::user();
		$notebook = $user->notebooks()->find($id);
		// print_r($notebook);exit;
		return view('notebooks.edit')->with('notebook',$notebook);
	}

	public function update(Request $request,$id)
	{
		$user = Auth::user();
		$notebook = $user->notebooks()->find($id);
		$notebook->update($request->all());

		return redirect('/notebooks');
		
	}

	public function destroy($id)
	{
		$user = Auth::user();
		$notebook = $user->notebooks()->find($id);
		$notebook->delete();
		return redirect('/notebooks'); 
	}

	public function show($id)
	{
		$notebook =  Notebook::findOrFail($id);
		//print_r($notebook);exit;
		$notes = $notebook->notes;
		//var_dump($notes);exit;
		return view('notes.index',compact('notes', 'notebook'));
	}
}
 