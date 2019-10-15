<?php

namespace App\Http\Controllers;

use App\Support;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Requestinput;
use Illuminate\Support\Str;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // view index.blade
        // var = class::property

        $supports = Support::orderBy('id','DESC')->paginate(3);
        return view('support.index',compact('supports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //view create.blade
        return view('support.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //Support::create($request->all());
        $entrada=$request->all();
        
        //si hay información en input de imagen
        if ($archivo=$request->file('file'))
        {
            //nombre de la imagen 
            $nombre=$archivo->getClientOriginalName();
            //string randon para que no haya problemas con la imagen
            $nombre = Str::random(40) ;
            //mueva ese archivo
            $archivo->move('images',$nombre);
            //guardamos el nombre en el campo BD
            $entrada['file']=$nombre;
        } else
        {
            $category=$request->input('category');
            if ($category=="CRM") {
                $nombre="CRM.jpg";
                $entrada['file']=$nombre;
            }else if ($category=="Contacto") {
                $nombre="Contacto.jpg";           
                $entrada['file']=$nombre;
            }else if ($category=="Factura Fisica") {
                $nombre="facturafisica.png";
                $entrada['file']=$nombre;
            }else if ($category=="Facturación Electrónica") {
                $nombre="facturacionelectronica.jpg";
                $entrada['file']=$nombre;
            }else{

            }

        }

        Support::create($entrada);
        Session::flash('message','Pregunta creada correctamente');
        return redirect()->route('supports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\support  $support
     * @return \Illuminate\Http\Response
     */
    public function show(support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\support  $support
     * @return \Illuminate\Http\Response
     */
    public function edit(support $support)
    {
        return  view('support.edit',compact('support'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\support  $support
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Support $support)
    {
        $request->validate([
            'category'=>'required',
            'question'=>'required',
            'solution'=>'required',
        ]);
        $support->update($request->all());

        Session::flash('message','Pregunta actualizada correctamente');
        return redirect()->route('supports.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\support  $support
     * @return \Illuminate\Http\Response
     */
    public function destroy(Support $support)
    {
        $support->delete();
        Session::flash('message','Pregunta eliminada correctamente');
        return redirect()->route('supports.index');
    }
}
