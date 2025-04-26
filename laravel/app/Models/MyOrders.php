<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyOrders extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_orders';
    }
    //start
    public static function callPrivate($source,$target)
    {
        $ami = new Ami();
        $voip=db('voip')->findRecord(1);
        if($voip!=null) {
            if ($ami->connect($voip->ip . ':' . $voip->port, $voip->user_name, $voip->pass, 'off') === false) {
                return false;
            }
            $result = $ami->sendRequest('Originate', [
                'Channel' => 'SIP/'.$voip->trank.'/'.$voip->gateway.$source,
                'Exten' => $voip->gateway.$target,
                'Context' => 'DialOut',
                'Priority' => '1',
            ]);
//    $result = $ami->command($originateRequest);
            $ami->disconnect();
            return true;
        }
        return false;
    }
    //end


}
