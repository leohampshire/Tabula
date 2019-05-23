<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Promotion;

class AdminPromotionController extends Controller
{
	public function index(Request $request)
	{
		return view('admin.pages.promotion.index')
		->with('promotions', Promotion::all());
	}

	public function create()
	{
		return view('admin.pages.promotion.create');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
    		'file'	=> 'required',
    	]);   
 		
    	
 		$promotion = new Promotion;

 		$promotion->url 		= $request->url;
 		$promotion->file 		= $this->nameGenerate($request);
 		$promotion->type 		= $this->type($request->file);
 		if ($promotion->type == 'video') {
 			$promotion->url == NULL;
 		}
 		$promotion->save();

    	return redirect(route('admin.promotion.index'))->with('success', 'Promoção incluida com sucesso');
	}

	public function edit(Promotion $promotion)
	{
	return view('admin.pages.promotion.edit')->with('promotion', $promotion);
	}

	public function update(Request $request)
	{
		$promotion = Promotion::find($request->id);
		if ($request->file != '') {
			$promotion->file = $this->nameGenerate($request);
			$promotion->type = $this->type($request->file);
		}
		$promotion->url 	 = $request->url;
		$promotion->save();
		return redirect()->back()->with('success', 'Promoção atualizada!');
	}

	public function delete(Promotion $promotion)
	{
		$promotion->delete();
		return redirect()->back()->with('success', 'Promoção excluída!');
	}

	private function nameGenerate(Request $request)
    {
        $arq_img = $request->file('file');
        $name    = basename($arq_img->getClientOriginalName());
        $type    = strtolower(pathinfo($name,PATHINFO_EXTENSION));
        $count = 1;
        //Gera string aleatória

        while($count != 0){
            $str            = "";
            $characters     = array_merge(range('A','Z'), range('a','z'), range('0','9'));
            $max            = count($characters) - 1;

            for ($i = 0; $i < 7; $i++) {
                $rand   = mt_rand(0, $max);
                $str   .= $characters[$rand];
                $count  = Promotion::where('file', $str)->count();
            }
        }
        $arq_img_name = $str.'.'.$type;
        $arq_img->move('images/promotion', $arq_img_name); 

        return $arq_img_name;  
    }

    private function type($file)
    {
    	$type = basename($file->getClientOriginalName());
    	if ($type == 'png' || $type == 'jpg' || $type == 'jpeg' || $type == 'gif' || $type == 'svg') {
    		return 'image';
    	}
    	return 'video';
    }

}
