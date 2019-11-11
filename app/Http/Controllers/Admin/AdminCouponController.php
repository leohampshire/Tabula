<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Coupon;
use App\Category;
use App\Course;
use App\Services\CouponService;
use Auth;
class AdminCouponController extends Controller
{
	public function index()
	{
		return view('admin.pages.coupon.index')
		->with('coupons', Coupon::all());

	}

	public function search(Request $request)
	{
        $search = array();  
        if ($request->type == 'produto') {
            $searchs = Course::where('name', 'like', '%'.$request->searchTerm.'%');
           
        }elseif ($request->type == 'macrotema') {
            $searchs = Category::where('name', 'like', '%'.$request->searchTerm.'%')->whereNull('category_id');
        }else{
            $searchs = Category::where('name', 'like', '%'.$request->searchTerm.'%')->where('category_id', '<>', '');
        }

        if ($searchs->count() != 0) {
            foreach ($searchs->get() as $sch) {
                $search[] = ['id' => $sch->id, 'text' => $sch->name];
            }       
        }

        return json_encode($search);
	}

	public function create()
	{
        return view('admin.pages.coupon.create');
	}

	public function store(Request $request)
	{
		//valida os campos digitados
    	$this->validate($request, [
            'type_discount' => 'required',
            'type_coupon'   => 'required',
    		'value_coupon'  => 'required',
    		'cod_coupon'    => 'required|unique:coupons|max:100'
    	]);
        if ($request->type_discount == 'porcentagem') {
            $this->validate($request, [
                'value_coupon' => 'max:100',
            ]);
        }
            
        $coupon = new Coupon;
        $this->couponGenerate($coupon, $request);

    	return redirect(route('admin.coupon.index'))->with('success', 'Cupom criado com sucesso');
	}

	public function edit($id, CouponService $sv)
	{
        $coupon = Coupon::find($id);
        $coupon->value_coupon = number_format($coupon->value_coupon, 2, ',', '.');
        $coupon->type_id = unserialize($coupon->type_id) == null ? [] : unserialize($coupon->type_id) ;
        $coupon->type = $sv->getTypeCoupon($coupon->type_id, $coupon->type_coupon);
    	return view('admin.pages.coupon.edit')
    	->with('coupon', $coupon)
        ->with('courseCoupons', Course::all())
        ->with('category', Category::all());
	}

	public function update(Request $request)
	{
		//valida os campos digitados
    	$this->validate($request, [
    		'value_coupon'  => 'required|max:100',
    		'cod_coupon'  	=> [
                'required', 'max:100',
                Rule::unique('coupons')->ignore($request->id)
            ],
    	]);
        if ($request->type_discount == 'porcentagem') {
            $this->validate($request, [
                'value_coupon' => 'max:100',
            ]);
        }

          
        $coupon = Coupon::find($request->id);
        $this->couponGenerate($coupon, $request);

        return redirect(route('admin.coupon.index'))->with('success', 'Cupom editado com sucesso');
	}

	public function delete($id)
	{
		$coupon = Coupon::find($id);

        $coupon->delete();

        return redirect()->back()->with('success', 'Cupom removido com sucesso');
	}

    private function couponGenerate(Coupon $coupon, Request $request)
    {
        $auth = Auth::guard('admin')->user();
        $coupon->cod_coupon       = $request->cod_coupon;
        $coupon->desc_coupon      = $request->desc_coupon;
        $coupon->type_coupon      = $request->type_coupon;
        $coupon->type_discount    = $request->type_discount;
        $coupon->limit            = $request->limit;
        $coupon->value_coupon     = str_replace(',', '.', str_replace('.', '', $request->value_coupon));
        $coupon->active           = 1;
        $coupon->type_id          = serialize($request->type_id);
        $coupon->user_id          = $auth->id;

        $coupon->save();
    }

}
