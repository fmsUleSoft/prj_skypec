<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;

use App\Models\TruckAssign;

class TruckAssignsController extends Controller
{
	public $show_action = true;
	public $view_col = 'date';
	public $listing_cols = ['id', 'airport', 'date', 'shift', 'truck', 'driver', 'technicaler'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('TruckAssigns', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('TruckAssigns', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the TruckAssigns.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('TruckAssigns');
		
		$list = DB::table('employees')->where('id', Auth::user()->context_id)->pluck('airport');
		
		$airport = DB::table('Airports')->whereIn('id', StrArr2Arr($list[0]))->orderByRaw(\DB::raw("FIELD(id, ".substr($list[0], 1, strlen($list[0]) - 2).")"))->lists('Name', 'id');
		
		if(Module::hasAccess($module->id)) {
			return View('la.truckassigns.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module,
				'airport' => $airport
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new truckassign.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created truckassign in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("TruckAssigns", "create")) {
		
			$rules = Module::validateRules("TruckAssigns", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("TruckAssigns", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.truckassigns.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified truckassign.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("TruckAssigns", "view")) {
			
			$truckassign = TruckAssign::find($id);
			if(isset($truckassign->id)) {
				$module = Module::get('TruckAssigns');
				$module->row = $truckassign;
				
				return view('la.truckassigns.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('truckassign', $truckassign);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("truckassign"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified truckassign.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("TruckAssigns", "edit")) {			
			$truckassign = TruckAssign::find($id);
			if(isset($truckassign->id)) {	
				$module = Module::get('TruckAssigns');
				
				$module->row = $truckassign;
				
				return view('la.truckassigns.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('truckassign', $truckassign);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("truckassign"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified truckassign in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("TruckAssigns", "edit")) {
			
			$rules = Module::validateRules("TruckAssigns", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("TruckAssigns", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.truckassigns.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified truckassign from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("TruckAssigns", "delete")) {
			TruckAssign::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.truckassigns.index');
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
	
	/**
	 * addAjax fetch
	 *
	 * @return
	 */
	public function addAjax(Request $request)
	{
		if(Module::hasAccess("TruckAssigns", "create")) {
			
			$airport = $request->input('airport');
			
			$date = $request->input('date');
			
			$shift = $request->input('shift');
			
			$whereArray = [	'airport' => $airport,
							'date' => $date,
							'shift' => $shift];
			
			$countRecord = DB::table('truckassigns')->where($whereArray)->whereNull('deleted_at')->count();
			
			if($countRecord == 0){
				return 2;
			}else{
				return 1;
			}
		}else{
			return 0;
		}
	}
	
	/**
	 * storeAjax fetch
	 *
	 * @return
	 */
	public function storeAjax(Request $request)
	{
		if(Module::hasAccess("TruckAssigns", "create")) {
			
			$addData = $request->input('addData');
			
			foreach($addData as $data)
			{
				if($data['driver'] == 0){
					$data['driver'] = null;
				}
				if($data['technicaler'] == 0){
					$data['technicaler'] = null;
				}
				
				$data['created_at'] = date('Y-m-d H:i:s');
				$data['updated_at'] = date('Y-m-d H:i:s');
				
				$insertid = DB::table('truckassigns')->insertGetId($data);
			}
			
			return 1;
			
		} else {
			return 0;
		}
	}
	
	/**
	 * updateAjax fetch
	 *
	 * @return
	 */
	public function updateAjax(Request $request)
	{
		if(Module::hasAccess("TruckAssigns", "create")) {
			
			$updateData = $request->input('updateData');
			
			foreach($updateData as $data)
			{
				if($data['driver'] == 0){
					$data['driver'] = null;
				}
				if($data['technicaler'] == 0){
					$data['technicaler'] = null;
				}
				
				$truckassign = TruckAssign::find($data['id']);

				$truckassign->truck = $data['truck'];
				$truckassign->driver = $data['driver'];
				$truckassign->technicaler = $data['technicaler'];

				$truckassign->save();
			}
			
			return 1;
			
		} else {
			return 0;
		}
	}
	
	/**
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
	public function dtshifts($id)
	{
		$shifts = DB::table('Shifts')->select('id', 'name', 'time_start', 'time_end', 'nextday')->where(['airport' => $id, 'IsActive' => 1])->get();
		
		$trucks = DB::table('Trucks')->select('id', 'name')->where(['airport' => $id, 'IsActive' => 1])->get();
				
		$drivers = DB::table('Staffs')->select('id', 'name')->where(['airport' => $id, 'driver' => 1, 'IsActive' => 1])->get();
				
		$technicalers = DB::table('Staffs')->select('id', 'name')->where(['airport' => $id, 'technicaler' => 1, 'IsActive' => 1])->get();
		
		return ['shifts' => $shifts, 'trucks' => $trucks, 'drivers' => $drivers, 'technicalers' => $technicalers];
	}
	
	/**
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
	public function dtajax(Request $request)
	{
		$whereArray = [	'airport' => $request->input('airport'),
						'date' => $request->input('date'),
						'shift' => $request->input('shift')];
						
		$data = DB::table('truckassigns')->where($whereArray)->select('id', 'truck', 'driver', 'technicaler')->whereNull('deleted_at')->get();
		
		return ['data' => $data];
	}
}