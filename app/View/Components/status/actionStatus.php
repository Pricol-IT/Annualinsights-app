<?php

namespace App\View\Components\status;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class actionStatus extends Component
{
    /**
     * Create a new component instance.
     */

     public $status, $id, $edit;
    public function __construct($status,$id,$edit)
    {
$this->status = $status;
$this->id = $id;
$this->edit = $edit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.status.action-status');
    }
}
