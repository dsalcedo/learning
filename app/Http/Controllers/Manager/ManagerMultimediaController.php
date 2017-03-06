<?php

namespace App\Http\Controllers\Manager;

use App\Modelos\Sistema\Multimedios;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerMultimediaController extends Controller
{
    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function index()
    {
        return view('manager.multimedia.index');
    }

    public function filesizeFormatted($size)
    {
        $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $power = $size > 0 ? floor(log($size, 1024)) : 0;

        return ['peso'=>number_format($size / pow(1024, $power), 2, '.', ',') , 'formato'=>$units[$power]];
    }

    public function upload(Request $request)
    {

        if (!$request->hasFile('media')) {
            return redirect()->back();
        }

        $archivo =  $this->filesizeFormatted($request->media->getClientSize());

        if(!in_array($archivo['formato'], ['B', 'KB', 'MB']) ){
            return redirect()->back();
        }

        if($archivo['formato'] == 'MB' && $archivo['peso'] > 2){
            return redirect()->back();
        }

        $name = $request->media->getClientOriginalName();
        $ext  = $request->media->getClientOriginalExtension();
        $pattern = [' '=>'', '%'=>'', '$'=>''];

        $nombre = time().'_'. strtolower( strtr( $name, $pattern) );

        $path = $path = $request->media->storeAs($request->get('tipo'), $nombre, 'multimedia');

        Multimedios::create([
            'tipo' => $request->get('tipo'),
            'nombre' =>  $request->get('nombre'),
            'media' => $path
        ]);

        return redirect()->route('manage.multimedia');

    }
}
