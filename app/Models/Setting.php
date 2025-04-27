<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    protected $table = "settings";


    public function deleteIcons()
    {
        if($this->favicon!=null) {
            Storage::disk('setting')->deleteDirectory($this->lang_abbr);
        }

    }

    public function deleteLogo()
    {
        if($this->logo!=null){
            $logoName=last(explode('/',$this->logo));
            Storage::disk('setting')->delete('logo/'.$logoName);
        }
    }


}
