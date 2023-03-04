<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreImageController extends Controller
{
    public function StoreImage(Request $request){
        $disk = Storage::build(['root' => public_path(), 'driver'=>'local']);

        $tempfn = $request->file('file')->store('uploads');
        $tempfn =  storage_path('/app/'.$tempfn);
        $fn = $request->input('filename',uniqid());
       // $disk->put($fn, );
        $fullfn = public_path($fn);

      //  $disk->makeDirectory($fullfn);

        copy($tempfn, $fullfn);

        return Response()->JSON(['filename' => $fullfn]);
    }
}
