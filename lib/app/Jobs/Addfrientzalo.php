<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Addfrientzalo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    protected $phonesave ;
    protected $id;
    protected $id_profile;
    protected $noidung;
    protected $emei;
    protected $cookie;
    protected $serectkey;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($phonesave, $id, $id_profile, $noidung, $emei, $cookie, $serectkey)
    {
        $this->phonesave = $phonesave;
        $this->id = $id;
        $this->id_profile = $id_profile;
        $this->noidung = $noidung;
        $this->emei = $emei;
        $this->cookie = $cookie;
        $this->serectkey= $serectkey ;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
         $dataResponse = $this->Addfrient($this->phonesave, $this->id, $this->id_profile, $this->noidung,$this->emei, $this->cookie,$this->serectkey);
    }

    public function Addfrient($phonesave, $id, $id_profile, $noidung, $emei, $cookie , $serectkey){

                 $result = array(
                    'code'=>200,
                    'listphone' => $phonesave,
                    'id_profile' => $id_profile,
                    'noidung' => $noidung,
                    'emei' => $emei,
                    'cookie' => $cookie,
                    'serectkey' => $serectkey,
                    'id_user' =>$id
                );
                 dd($result);
                
           }
    
}
