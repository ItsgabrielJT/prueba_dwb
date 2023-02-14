<?php

namespace App\Http\Controllers;

use App\Models\Form_contacto;
use App\Http\Requests\UpdateForm_contactoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class FormContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $forms = Form_contacto::all();

        return view('Form.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreForm_contactoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messeges= $this->validateData($request->all());
        $status = count($messeges)==0;

        if ($status) {

            $form = new Form_contacto;
            $form->Nombre = $request->Nombre;
            $form->telefono = $request->telefono;
            $form->descripcion = $request->descripcion;
            $form->email = $request->email;

            if ($request->hasFile('Imagen')) {
                $file = request()->file('Imagen');
                $obj = Cloudinary::upload($file->getRealPath(), ['folder' => 'products']);
                $public_id = $obj->getPublicId();
                $url = $obj->getSecurePath();
                $form->url=$url;
                $form->public_id=$public_id;
            }else{
                $form->url='https://static.vecteezy.com/system/resources/previews/003/611/119/original/do-not-record-images-no-photography-sign-free-vector.jpg';
                $form->public_id='none';
            }
            $form->save();
        }

        return view('Form.confirm',compact('messeges','status'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form_contacto  $form_contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Form_contacto $form_contacto)
    {
        $form = Form_contacto::find(1);
        return view('Form.show', compact('form') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form_contacto  $form_contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(Form_contacto $form_contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateForm_contactoRequest  $request
     * @param  \App\Models\Form_contacto  $form_contacto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateForm_contactoRequest $request, Form_contacto $form_contacto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form_contacto  $form_contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form_contacto $form_contacto)
    {
        //
    }


    
    public function validateData($data)
    {
        // dd($data);
        $messages = [
            'email.required'            =>  'El email es requerido.',
            'email.email'               =>  'El correo electrónico debe estar escrito en un formáto correcto',
            'telefono.required'         =>  'El telefono es requerida.',
            'descripcion.required'      =>  'La descripcion del mensaje es requerido.',
            'Nombre.required'           =>  'El nombre es requerido.',
        ];

        $validate = [
            'email'             =>  'required|email',
            'telefono'          =>  'required',
            'descripcion'        =>  'required',
            'Nombre' =>  'required'
        ];

        $validator = Validator::make($data, $validate, $messages);
        // dd($validator->fails());

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
        }else{
            $messages=[];
        }

        return $messages;
    }
}
