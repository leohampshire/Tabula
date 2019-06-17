<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use Auth;

class CouponController extends Controller
{
    public function search(Request $request)
    {
        $search = array();
        $auth = Auth::guard('user')->user();
        $searchs = Course::where('name', 'like', '%'.$request->searchTerm.'%')->where('user_id_owner', $auth->id);

        if ($searchs->count() != 0) {
            foreach ($searchs->get() as $sch) {
                $search[] = ['id' => $sch->id, 'text' => $sch->name];
            }       
        }

        return json_encode($search);
    }

    public function store(Request $request)
    {
        return dd($request);
        //valida os campos digitados
    	$this->validate($request, [
            'type_discount' => 'required',
    		'value_coupon'  => 'required',
    		'desc_coupon'   => 'required',
    		'cod_coupon'    => 'required|unique:coupons|max:100'
    	]);
        if ($request->type_discount == 'porcentagem') {
            $this->validate($request, [
                'value_coupon' => 'max:100',
            ]);
        }
        $request['type_coupon']  = 'produto';
        $coupon = new Coupon;
        $this->couponGenerate($coupon, $request);

    	return redirect(route('admin.coupon.index'))->with('success', 'Cupom criado com sucesso');
    }

    private function couponGenerate(Coupon $coupon, Request $request)
    {
        $auth = Auth::guard('user')->user();
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
