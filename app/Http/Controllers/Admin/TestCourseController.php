<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Http\Controllers\Controller;
use App\{CourseItem, TestItem, Test};

class TestCourseController extends Controller
{
    public function store(ItemRequest $request)
    {
        $item = new CourseItem;
        $item->name                     = $request->name;
        $item->course_item_chapter_id   = $request->chapter_id;
        $item->course_item_types_id     = $request->item_type_id;
        if ($request->item_type_id < 6) {
                $item->desc             = $request->desc;
        }
        if(isset($request->file)){
            $item->path = $this->strVideoGenerate($request);
        }

        $order = CourseItem::count();
        
        $item->order = $order;
        //Controle de avaliação
        if ($request->item_type_id >6 ) {
            $item->course_items_parent  = $request->item_parent;
        }
        
        $item->save();

        if ($request->item_type_id == 8) {
            $itemTest                   = new TestItem;
            $itemTest->course_item_id   = $item->id;
            $itemTest->answer           = $request->trueFalse;
            $itemTest->save();

        }elseif($request->item_type_id == 7){

            foreach ($request->afirmacao as $key => $afirmacao) {
                if(!$afirmacao){
                    continue;
                }
                $itemTest                   = new TestItem;
                $itemTest->desc             = $afirmacao;
                $itemTest->course_item_id   = $item->id;
                if(in_array($key, $request->verdadeira)){
                    $itemTest->answer       = 1;
                }else{
                    $itemTest->answer       = 0;
                }
                $itemTest->save();
            }
        }elseif($request->item_type_id == 9){
            foreach ($request->afirma as $key => $afirma) {
                if(!$afirma){
                    continue;
                }
                $itemTest               = new TestItem;
                $itemTest->desc         = $afirma;
                $itemTest->course_item_id   = $item->id;
                if($key == $request->verdadeira){
                    $itemTest->answer   = 1;
                }else{
                    $itemTest->answer   = 0;
                }
                $itemTest->save();
            }
        }elseif($request->item_type_id == 10){
            $itemTest                   = new TestItem;
            $itemTest->course_item_id   = $item->id;
            $itemTest->desc             = $request->desc;
            $itemTest->save();
        }

        return redirect()->back()->with('success', 'Conteúdo Adicionado com sucesso');
    }

    public function edit(Request $request)
    {
        $item = CourseItem::find($request->item);
        switch ($item->course_item_types_id) {
            case 7:
                return view('admin.blocks.alt_mult')->with('item', $item);
                break;
            case 8:
                return view('admin.blocks.truefalse')->with('item', $item);
                break;
            case 9:
                return view('admin.blocks.alternativas')->with('item', $item);
                break;
            case 10:
                return view('admin.blocks.dissertativa')->with('item', $item);
                break;
            
            default:
                break;
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $item = CourseItem::find($request->id);
        
        $item->name = $request->name;
        $item->save();
        $course_id = $item->course_item_chapter->course->id; 
        $makeTest = Test::where('course_item_id', $course_id)->count();
        if($makeTest){
            return redirect()->back()->with('warning', 'Existem prova feitas pelos alunos, não sendo possível editar quaisquer questões');
        }
        $item->test()->delete();  

        if ($item->course_item_types_id == 8) {
            $itemTest                   = new TestItem;
            $itemTest->course_item_id   = $item->id;
            $itemTest->answer           = $request->trueFalse;
            $itemTest->save();

        }elseif($item->course_item_types_id == 7){

            foreach ($request->afirmacao as $key => $afirmacao) {
                if(!$afirmacao){
                    continue;
                }
                $itemTest                   = new TestItem;
                $itemTest->desc             = $afirmacao;
                $itemTest->course_item_id   = $item->id;
                if(in_array($key, $request->verdadeira)){
                    $itemTest->answer       = 1;
                }else{
                    $itemTest->answer       = 0;
                }
                $itemTest->save();
            }
        }elseif($item->course_item_types_id == 9){
            foreach ($request->afirma as $key => $afirma) {
                if(!$afirma){
                    continue;
                }
                $itemTest               = new TestItem;
                $itemTest->desc         = $afirma;
                $itemTest->course_item_id   = $item->id;
                if($key == $request->verdadeira){
                    $itemTest->answer   = 1;
                }else{
                    $itemTest->answer   = 0;
                }
                $itemTest->save();
            }
        }elseif($item->course_item_types_id == 10){
            $itemTest                   = new TestItem;
            $itemTest->course_item_id   = $item->id;
            $itemTest->desc             = $request->desc;
            $itemTest->save();
        }
        return redirect()->back()->with('success', 'Conteúdo Alterado com sucesso');
        
    }
}