<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ChefRegister;

class ChefRequest extends Mailable
{
    use Queueable, SerializesModels;
    public $chefRequest;
    

    
    public function __construct(ChefRegister $chefRequest)
    {
        $this->chefRequest = $chefRequest;
    }

    
     
    public function build()
    {
        return $this->markdown('emails.chefRequest');
    }
}
