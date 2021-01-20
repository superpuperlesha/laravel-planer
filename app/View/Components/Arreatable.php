<?php
namespace App\View\Components;
use Illuminate\View\Component;
use App\Services\Wmtable;

class Arreatable extends Component{
    public function __construct(){
		
    }

    public function render(){
		$Wmtable = new Wmtable();
		return view('components.arreatable', ['Wmtable'=>$Wmtable]);
    }
}