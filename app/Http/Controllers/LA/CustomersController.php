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

use App\Models\Customer;

class CustomersController extends Controller
{
	public $show_action = true;
	public $view_col = 'name';
	public $listing_cols = ['id', 'code', 'name', 'group', 'local', 'contract', 'agency', 'IsActive', 'nameinvoice', 'address', 'taxcode', 'contractnumber', 'expirationdate', 'unit', 'currency'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Customers', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Customers', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Customers.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Customers');
		
		$list = DB::table('employees')->where('id', Auth::user()->context_id)->pluck('airport');
		
		$airport = DB::table('Airports')->whereIn('id', StrArr2Arr($list[0]))->orderByRaw(\DB::raw("FIELD(id, ".substr($list[0], 1, strlen($list[0]) - 2).")"))->lists('name', 'id');
		
		if(Module::hasAccess($module->id)) {
			return View('la.customers.index', [
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
	 * Show the form for creating a new customer.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created customer in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Customers", "create")) {
		
			$rules = Module::validateRules("Customers", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			if ($request->input('agency') == 0){
				$request->merge([
					'agency' => null 
				]);	
			}
			
			$insert_id = Module::insert("Customers", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.customers.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified customer.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Customers", "view")) {
			
			$customer = Customer::find($id);
			if(isset($customer->id)) {
				$module = Module::get('Customers');
				$module->row = $customer;
				
				return view('la.customers.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('customer', $customer);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("customer"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified customer.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Customers", "edit")) {			
			$customer = Customer::find($id);
			if(isset($customer->id)) {	
				$module = Module::get('Customers');
				
				$module->row = $customer;
			
				$agency = DB::table('Customers')->where(['airport' => $customer->airport, 'group' => 1])->lists('name', 'id');
				
				$agency["0"] = "Không qua đại lý";
				
				ksort($agency);
				
				return view('la.customers.edit', [
					'module' => $module,
					'agency' => $agency,
					'view_col' => $this->view_col,
				])->with('customer', $customer);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("customer"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified customer in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Customers", "edit")) {
			
			$rules = Module::validateRules("Customers", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			if ($request->input('agency') == 0){
				$request->merge([
					'agency' => null 
				]);	
			}
			
			$insert_id = Module::updateRow("Customers", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.customers.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified customer from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Customers", "delete")) {
			Customer::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.customers.index');
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
		if(Module::hasAccess("Customers", "create")) {
			$module = Module::get('Customers');
			
			$airport = DB::table('Airports')->where('id', $id)->lists('name', 'id');
			
			$agency = DB::table('Customers')->where(['airport' => $id, 'group' => 1])->lists('name', 'id');
			
			$agency["0"] = "Không qua đại lý";
			
			ksort($agency);
			
			return View('la.customers.add', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module,
				'airport' => $airport,
				'agency' => $agency
			]);return $agency;
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
	
	/**
	 * Import Ajax
	 *
	 * @return
	 */
	public function importajax(Request $request)
	{
		$dataCustomers = $request->input('dataCustomers');
		
		foreach( $dataCustomers as $data )
		{
			if($data['agency'] == ""){
				$data['agency'] = null;
			}else{
				$agency = DB::table('customers')->where('name', $data['agency'])->first();
				if($agency !== null){
					$data['agency'] = $agency->id;
				}else{
					$data['agency'] = null;
				}
			}
			
			if($data['expirationdate'] == ""){
				$data['expirationdate'] = null;
			}
			
			$UpdateOrInsert = DB::table('customers')->where(['code' => $data['code'], 'airport' => $data['airport']]);
			
			if($UpdateOrInsert->count() == 0){
				$insertid = DB::table('customers')->insertGetId($data);
			}else{
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
		$values = DB::table('customers')->select($this->listing_cols)->where('airport', $id)->whereNull('deleted_at');
		
		$out = Datatables::of($values)->make();
		
		$data = $out->getData();
		
		$fields_popup = ModuleFields::getModuleFields('Customers');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($col == "group") {
					$data->data[$i][] = DB::table('customers')->select('id', 'name')->where('agency', $data->data[$i][0])->get();
				}
				if($col == "agency") {
					if($data->data[$i][$j] == ""){
						$data->data[$i][] = "";
					}else{
						$data->data[$i][] = DB::table('customers')->select('nameinvoice')->where('id', $data->data[$i][$j])->first()->nameinvoice;
						$data->data[$i][] = DB::table('customers')->where('agency', $data->data[$i][$j])->lists('name', 'id');
					}
				}
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
			}
		}
		
		$out->setData($data);
		
		return $out;
	}
}