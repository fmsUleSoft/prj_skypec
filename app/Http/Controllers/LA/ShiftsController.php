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

use App\Models\Shift;

class ShiftsController extends Controller
{
	public $show_action = true;
	public $view_col = 'name';
	public $listing_cols = ['id', 'airport', 'name', 'time_start', 'time_end', 'nextday', 'description', 'IsActive'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Shifts', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Shifts', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Shifts.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Shifts');
		
		$list = DB::table('employees')->where('id', Auth::user()->context_id)->pluck('airport');
		
		$airport = DB::table('Airports')->whereIn('id', StrArr2Arr($list[0]))->orderByRaw(\DB::raw("FIELD(id, ".substr($list[0], 1, strlen($list[0]) - 2).")"))->lists('Name', 'id');
		
		if(Module::hasAccess($module->id)) {
			return View('la.shifts.index', [
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
	 * Show the form for creating a new shift.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created shift in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Shifts", "create")) {
		
			$rules = Module::validateRules("Shifts", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$request->merge([
				'time_start' => strtotime($request->input('time_start')) - strtotime('today'),
				'time_end' => strtotime($request->input('time_end')) - strtotime('today'),
			]);
			
			$insert_id = Module::insert("Shifts", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.shifts.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified shift.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Shifts", "view")) {
			
			$shift = Shift::find($id);
			if(isset($shift->id)) {
				$module = Module::get('Shifts');
				$module->row = $shift;
				
				return view('la.shifts.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('shift', $shift);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("shift"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified shift.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Shifts", "edit")) {			
			$shift = Shift::find($id);
			if(isset($shift->id)) {	
			
				$list = DB::table('employees')->where('id', Auth::user()->context_id)->pluck('airport');
		
				$airport = DB::table('Airports')->whereIn('id', StrArr2Arr($list[0]))->orderByRaw(\DB::raw("FIELD(id, ".substr($list[0], 1, strlen($list[0]) - 2).")"))->lists('Name', 'id');
				
				$module = Module::get('Shifts');
				
				$module->row = $shift;
				
				return view('la.shifts.edit', [
					'module' => $module,
					'airport' => $airport,
					'view_col' => $this->view_col,
				])->with('shift', $shift);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("shift"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified shift in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Shifts", "edit")) {
			
			$rules = Module::validateRules("Shifts", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$request->merge([
				'time_start' => strtotime($request->input('time_start')) - strtotime('today'),
				'time_end' => strtotime($request->input('time_end')) - strtotime('today'),
			]);
			
			$insert_id = Module::updateRow("Shifts", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.shifts.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified shift from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Shifts", "delete")) {
			Shift::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.shifts.index');
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
	
	/**
	 * Show the form for creating a new truck.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function FormAdd()
	{
		if(Module::hasAccess("Shifts", "create")) {
			$module = Module::get('Shifts');
			
			$list = DB::table('employees')->where('id', Auth::user()->context_id)->pluck('airport');
		
			$airport = DB::table('Airports')->whereIn('id', StrArr2Arr($list[0]))->orderByRaw(\DB::raw("FIELD(id, ".substr($list[0], 1, strlen($list[0]) - 2).")"))->lists('Name', 'id');
			
			return View('la.shifts.add', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'airport' => $airport,
				'module' => $module
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
	public function dtajax($id)
	{
		$values = DB::table('shifts')->select($this->listing_cols)->where('airport', $id)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Shifts');
		
		for($i=0; $i < count($data->data); $i++) {
			$txtname = "";
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/shifts/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				else if($col == "IsActive") {
					if($data->data[$i][$j] == 1){
						$data->data[$i][$j] = '<div class="Switch Round Off" style="vertical-align:top"><div class="Toggle"></div></div>';	
					}else{
						$data->data[$i][$j] = '<div class="Switch Round On" style="vertical-align:top"><div class="Toggle"></div></div>';
					}
				}
				if($col == "Name") {
					$txtname = $data->data[$i][$j];
				}
				if($col == "time_start") {
					$data->data[$i][$j] = gmdate('H:i', $data->data[$i][$j]);	
				}
				if($col == "time_end") {
					if($data->data[$i][$j+1] == 0){
						$data->data[$i][$j] = gmdate('H:i', $data->data[$i][$j]);		
					}else{
						$data->data[$i][$j] = gmdate('H:i', $data->data[$i][$j]) . '+';	
					}

				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				if(Module::hasAccess("Shifts", "edit") || Module::hasAccess("Shifts", "delete")) {
					$output = '<div class="btn-group"><button type="button" class="btn btn-default btn-flat btn-sm"><i class="fa fa-fw fa-cog"></i></button><button type="button" class="btn btn-default btn-flat btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button><ul class="dropdown-menu" role="menu">';
					if(Module::hasAccess("Shifts", "edit")) {
						$output .= '<li><a href="#" onclick="EditProcess('."'".url(config('laraadmin.adminRoute') . '/shifts/'.$data->data[$i][0].'/edit')."'".')"><i class="fa fa-edit"></i>Chỉnh sửa</a></li>';
					}
					if(Module::hasAccess("Shifts", "delete")) {
						$output .= '<li><a href="#" onclick="DeleteProcess('."'".url(config('laraadmin.adminRoute') . '/shifts/'.$data->data[$i][0])."', '".$txtname."'".')"><i class="fa fa-trash"></i>Xóa bỏ</a></li>';
					}
					$output .= '</ul></div>';
					$data->data[$i][] = (string)$output;
				}
			}
		}
		$out->setData($data);
		return $out;
	}
}