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

use App\Models\TemporaryPrice;

class TemporaryPricesController extends Controller
{
	public $show_action = true;
	public $view_col = 'airport';
	public $listing_cols = ['id', 'customerlocal', 'contract', 'routetype', 'unit', 'currency', 'unitprice'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('TemporaryPrices', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('TemporaryPrices', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the TemporaryPrices.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('TemporaryPrices');
		
		$list = DB::table('employees')->where('id', Auth::user()->context_id)->pluck('airport');
		
		$airport = DB::table('Airports')->whereIn('id', StrArr2Arr($list[0]))->orderByRaw(\DB::raw("FIELD(id, ".substr($list[0], 1, strlen($list[0]) - 2).")"))->lists('name', 'id');
		
		if(Module::hasAccess($module->id)) {
			return View('la.temporaryprices.index', [
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
	 * Show the form for creating a new temporaryprice.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created temporaryprice in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("TemporaryPrices", "create")) {
		
			$rules = Module::validateRules("TemporaryPrices", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("TemporaryPrices", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.temporaryprices.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified temporaryprice.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("TemporaryPrices", "view")) {
			
			$temporaryprice = TemporaryPrice::find($id);
			if(isset($temporaryprice->id)) {
				$module = Module::get('TemporaryPrices');
				$module->row = $temporaryprice;
				
				return view('la.temporaryprices.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('temporaryprice', $temporaryprice);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("temporaryprice"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified temporaryprice.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("TemporaryPrices", "edit")) {			
			$temporaryprice = TemporaryPrice::find($id);
			if(isset($temporaryprice->id)) {	
				$module = Module::get('TemporaryPrices');
				
				$module->row = $temporaryprice;
				
				return view('la.temporaryprices.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('temporaryprice', $temporaryprice);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("temporaryprice"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified temporaryprice in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("TemporaryPrices", "edit")) {
			
			$rules = Module::validateRules("TemporaryPrices", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("TemporaryPrices", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.temporaryprices.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified temporaryprice from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("TemporaryPrices", "delete")) {
			TemporaryPrice::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.temporaryprices.index');
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
		if(Module::hasAccess("TemporaryPrices", "create")) {
			$module = Module::get('TemporaryPrices');
			
			return View('la.temporaryprices.add', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
	
	/**
	 * Add Ajax
	 *
	 * @return
	 */
	public function addajax(Request $request)
	{
		if(Module::hasAccess("TemporaryPrices", "create")) {
			
			$data = $request->input('dataAdd');
			
			$whereArray = [	'airport' => $data['airport'],
							'month' => $data['month'],
							'year' => $data['year'],
							'customerlocal' => $data['customerlocal'],
							'unit' => $data['unit'],
							'currency' => $data['currency']];
						
			if($data['customerlocal'] == 1){
				$data['contract'] = 0;
				$data['routetype'] = null;
			}else{
				$whereArray['contract'] = $data['contract'];
				$whereArray['routetype'] = $data['routetype'];
			}
			
			$CheckRecode = DB::table('temporaryprices')->where($whereArray)->whereNull('deleted_at');
			
			if($CheckRecode->count() == 0){
					$insertid = DB::table('temporaryprices')->insertGetId($data);
					return 2;
				}else{
					return 1;
			}
		}else{
			return 0;
		}
	}
	
	/**
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
	public function dtajax(Request $request)
	{	
		$whereArray = [	'airport' => $request->input('airport'),
						'month' => $request->input('month'),
						'year' => $request->input('year')];
		
		
		$values = DB::table('temporaryprices')->select($this->listing_cols)->where($whereArray)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('TemporaryPrices');
		
		for($i=0; $i < count($data->data); $i++) {
			$txtname = "";
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/temporaryprices/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				else if($col == "IsActive") {
					if($data->data[$i][$j] == 1){
						$data->data[$i][$j] = '<i class="fa fa-check-circle m--font-success" title="True" style="color:forestgreen;"></i>';	
					}else{
						$data->data[$i][$j] = '<i class="fa fa-times-circle-o m--font-success" title="True" style="color:indianred;"></i>';
					}
				}
				if($col == "Name") {
					$txtname = $data->data[$i][$j];
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				if(Module::hasAccess("TemporaryPrices", "edit") || Module::hasAccess("TemporaryPrices", "delete")) {
					$output = '<div class="btn-group"><button type="button" class="btn btn-default btn-flat btn-sm"><i class="fa fa-fw fa-cog"></i></button><button type="button" class="btn btn-default btn-flat btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button><ul class="dropdown-menu" role="menu">';
					if(Module::hasAccess("TemporaryPrices", "edit")) {
						$output .= '<li><a href="#" onclick="EditProcess('."'".url(config('laraadmin.adminRoute') . '/temporaryprices/'.$data->data[$i][0].'/edit')."'".')"><i class="fa fa-edit"></i>Chỉnh sửa</a></li>';
					}
					if(Module::hasAccess("TemporaryPrices", "delete")) {
						$output .= '<li><a href="#" onclick="DeleteProcess('."'".url(config('laraadmin.adminRoute') . '/temporaryprices/'.$data->data[$i][0])."', '".$txtname."'".')"><i class="fa fa-trash"></i>Xóa bỏ</a></li>';
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