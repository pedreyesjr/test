<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\NiceAction;
use App\NiceActionLog;
use DB;

class NiceActionController extends Controller
{

	public function getHome(){
		// $actions = NiceAction::all();
		$actions = DB::table('nice_actions')->get();

		$log_actions = NiceActionLog::all();
		// echo '<pre>';
		// print_r($actions);
		// print_r($log_actions);
		// exit;
		return view('home',['actions' => $actions,'log_actions' => $log_actions]);
	}



    public function getNiceAction($action,$name = null){

    	if($name === null){
    		$name = 'you';
    	}

    	$nice_action = NiceAction::where('name',$action)->first();
    	$nice_action_log = new NiceActionLog();
    	$nice_action->log_actions()->save($nice_action_log);

		return view('actions.nice',['action'=>$action,'name'=>$name]);
	}

	public function postInsertNiceAction(Request $request){
		
		$this->validate($request,[
			'name' => 'required|alpha|unique:nice_actions',
			'niceness' => 'required|numeric'
		]);

		$action = new NiceAction();

		$action->name = $request['name'];
		$action->niceness = $request['niceness'];
		$action->save();	

		$actions = NiceAction::all();

		return redirect()->route('home',['actions'=>$actions]);
	}
}
