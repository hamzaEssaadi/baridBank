<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function credits()
    {
        return $this->hasMany(Credit::class);
    }

    public function scopeClients($query, $nb)
    {
        if ($nb != 0) {
            return $this->newQuery()->selectRaw("clients.id,name,cin,tel,file,date,TIMESTAMPDIFF(month,date,now()) as duration")
                ->leftJoin('credits', 'clients.id', '=', 'credits.client_id')
                ->whereRaw("credits.date in (select min(date) from credits where clients.id=client_id) or credits.client_id is null")
                ->having('duration', '>=', $nb);
        } else {
            return $this->newQuery()->selectRaw("clients.id,name,cin,tel,file,date,TIMESTAMPDIFF(month,date,now()) as duration")
                ->leftJoin('credits', 'clients.id', '=', 'credits.client_id')
                ->whereRaw("credits.date in (select min(date) from credits where clients.id=client_id) or credits.client_id is null");
        }
    }

    public function scopeCountCredit($query, $nb)
    {
        return $this->newQuery()->selectRaw('count(*) as count')
            ->fromRaw("(select name,date,TIMESTAMPDIFF(month,date,now()) as duration from barid.clients left join credits on barid.credits.client_id=barid.clients.id
            where credits.date in (select min(date) from credits where clients.id=client_id) or credits.client_id is null
            having duration >=$nb) as b")->first()->count;
    }
}
