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

use App\Models\PaymentUnit;

class PaymentUnitsController extends Controller
{
	public $show_action = true;
	public $view_col = 'name';
	public $listing_cols = ['id', 'name', 'description', 'IsActive'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('PaymentUnits', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('PaymentUnits', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the PaymentUnits.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('PaymentUnits');
		
		if(Module::hasAccess($module->id)) {
			return View('la.paymentunits.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new paymentunit.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created paymentunit in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("PaymentUnits", "create")) {
		
			$rules = Module::validateRules("PaymentUnits", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("PaymentUnits", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.paymentunits.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified paymentunit.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("PaymentUnits", "view")) {
			
			$paymentunit = PaymentUnit::find($id);
			if(isset($paymentunit->id)) {
				$module = Module::get('PaymentUnits');
				$module->row = $paymentunit;
				
				return view('la.paymentunits.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('paymentunit', $paymentunit);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("paymentunit"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified paymentunit.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("PaymentUnits", "edit")) {			
			$paymentunit = PaymentUnit::find($id);
			if(isset($paymentunit->id)) {	
				$module = Module::get('PaymentUnits');
				
				$module->row = $paymentunit;
				
				return view('la.paymentunits.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('paymentunit', $paymentunit);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("paymentunit"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified paymentunit in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("PaymentUnits", "edit")) {
			
			$rules = Module::validateRules("PaymentUnits", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("PaymentUnits", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.paymentunits.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified paymentunit from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("PaymentUnits", "delete")) {
			PaymentUnit::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.paymentunits.index');
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
		if(Module::hasAccess("PaymentUnits", "create")) {
			$module = Module::get('PaymentUnits');
			
			return View('la.paymentunits.add', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
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
	public function dtajax()
	{
		$values = DB::table('paymentunits')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('PaymentUnits');
		
		for($i=0; $i < count($data->data); $i++) {
			$txtname = "";
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == "name") {
					$txtname = $data->data[$i][$j];
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/paymentunits/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				else if($col == "IsActive") {
					if($data->data[$i][$j] == 1){
						$data->data[$i][$j] = '<i class="fa fa-check-circle m--font-success" title="True" style="color:forestgreen;"></i>';	
					}else{
						$data->data[$i][$j] = '<i class="fa fa-times-circle-o m--font-success" title="True" style="color:indianred;"></i>';
					}
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				if(Module::hasAccess("PaymentUnits", "edit") || Module::hasAccess("PaymentUnits", "delete")) {
					$output = '<div class="btn-group"><button type="button" class="btn btn-default btn-flat btn-sm"><i class="fa fa-fw fa-cog"></i></button><button type="button" class="btn btn-default btn-flat btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button><ul class="dropdown-menu" role="menu">';
					if(Module::hasAccess("PaymentUnits", "edit")) {
						$output .= '<li><a href="#" onclick="EditProcess('."'".url(config('laraadmin.adminRoute') . '/paymentunits/'.$data->data[$i][0].'/edit')."'".')"><i class="fa fa-edit"></i>Chỉnh sửa</a></li>';
					}
					if(Module::hasAccess("PaymentUnits", "delete")) {
						$output .= '<li><a href="#" onclick="DeleteProcess('."'".url(config('laraadmin.adminRoute') . '/paymentunits/'.$data->data[$i][0])."', '".$txtname."'".')"><i class="fa fa-trash"></i>Xóa bỏ</a></li>';
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