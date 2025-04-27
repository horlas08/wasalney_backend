<?php

namespace App\Models;

use App\Enums\TypeField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelationCondition extends Model
{

    protected $table = 'relation_conditions';

    public function Relation(){
        return $this->belongsTo(Relation::class,'relation_id');
    }


    public static function checkConditions($relationId,$fields,$record){
        $conditions=RelationCondition::where('relation_id',$relationId)->get();
        if($conditions->count()!=0){
            $field=$fields->where('id',$conditions->first()->field_id)->first();
                    foreach ($conditions as $condition){
                        if ($field->type==TypeField::SELECT && $record->{$field->name}==$condition->record_id)
                            return true;
                        elseif ($field->type==TypeField::MULTI_SELECT && in_array($condition->record_id, $record->{$field->name}))
                            return true;
                }

            return false;
        }
        else
            return true;
    }

}
