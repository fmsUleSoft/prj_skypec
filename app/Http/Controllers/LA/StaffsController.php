<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;

use App\Models\Staff;

class StaffsController extends Controller
{
	public $show_action = true;
	public $view_col = 'name';
	public $listing_cols = ['id', 'employee_code', 'name', 'email', 'driver', 'technicaler', 'IsActive'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Staffs', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Staffs', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Staffs.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Staffs');
		
		$list = DB::table('employees')->where('id', Auth::user()->context_id)->pluck('airport');
		
		$airport = DB::table('Airports')->whereIn('id', StrArr2Arr($list[0]))->orderByRaw(\DB::raw("FIELD(id, ".substr($list[0], 1, strlen($list[0]) - 2).")"))->lists('name', 'id');
		
		if(Module::hasAccess($module->id)) {
			return View('la.staffs.index', [
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
	 * Show the form for creating a new staff.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created staff in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Staffs", "create")) {
		
			$rules = Module::validateRules("Staffs", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("Staffs", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.staffs.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified staff.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Staffs", "view")) {
			
			$staff = Staff::find($id);
			if(isset($staff->id)) {
				$module = Module::get('Staffs');
				$module->row = $staff;
				
				return view('la.staffs.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('staff', $staff);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("staff"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified staff.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Staffs", "edit")) {			
			$staff = Staff::find($id);
			if(isset($staff->id)) {	
				$module = Module::get('Staffs');
				
				$module->row = $staff;
				
				$list = DB::table('employees')->where('id', Auth::user()->context_id)->pluck('airport');
		
				$airport = DB::table('Airports')->whereIn('id', StrArr2Arr($list[0]))->orderByRaw(\DB::raw("FIELD(id, ".substr($list[0], 1, strlen($list[0]) - 2).")"))->lists('name', 'id');
				
				return view('la.staffs.edit', [
					'module' => $module,
					'airport' => $airport,
					'view_col' => $this->view_col,
				])->with('staff', $staff);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("staff"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified staff in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Staffs", "edit")) {
			
			$rules = Module::validateRules("Staffs", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("Staffs", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.staffs.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified staff from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Staffs", "delete")) {
			Staff::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.staffs.index');
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
	
	/**
	 * Show the form for creating a new truck.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function FormAdd($id)
	{
		if(Module::hasAccess("Staffs", "create")) {
			$module = Module::get('Staffs');
			
			$airport = DB::table('Airports')->where('id', $id)->lists('name', 'id');
			
			return View('la.staffs.add', [
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
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
	public function importajax(Request $request)
	{
		$password = $request->input('password');
		
		$resetPassword = $request->input('resetPassword');
		
		$dataStaffs = $request->input('dataStaffs');
		
		foreach( $dataStaffs as $data )
		{
			$UpdateOrInsert = DB::table('staffs')->where('employee_code', $data['employee_code']);
			if($UpdateOrInsert->count() == 0){
				$data['password'] = Hash::make($password);
				$insertid = DB::table('staffs')->insertGetId($data);
			}else{
				if($resetPassword == 'false'){
					$data['password'] = Hash::make($password);
				}
				$UpdateOrInsert->update($data);					
			}
		}
	}
	
	/**
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
	public function dtajax($id)
	{
		$data = DB::table('staffs')->select($this->listing_cols)->where('airport', $id)->whereNull('deleted_at')->get();

		return ['data' => $data];
	}
}