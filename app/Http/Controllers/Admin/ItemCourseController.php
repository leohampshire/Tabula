<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Http\Controllers\Controller;
use App\CourseItem;

class ItemCourseController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'item_type_id'  => 'required',
            'name'          => 'required|max:200',
            'desc'          => 'max:500'
        ]);
        $total_class = 0;
        $item = new CourseItem;
        $item->name                     = $request->name;
        $item->course_item_chapter_id   = $request->chapter_id;
        $item->course_item_types_id     = $request->item_type_id;
        $item->desc             = $request->desc;
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

        $course = $item->course_item_chapter->course;
        foreach ($course->course_item_chapters as $chapter) {
                $total_class += count($chapter->course_item
                    ->where('course_item_types_id', '<', 5));
        }
        $course->update([
            'total_class' => $total_class,
        ]);

        return redirect()->back()->with('success', 'Conteúdo Adicionado com sucesso');
    }

    public function update(ItemRequest $request)
    {
        $total_class = 0;
        $item = CourseItem::find($request->id);
        $item->name                     = $request->name;
        $item->course_item_types_id     = $request->item_type_id;
        $item->desc             = $request->desc;
        
        if(isset($request->file)){
            $item->path = fileGenerate($request);
        }

        $order = CourseItem::count();
        
        $item->order = $order;
        //Controle de avaliação
        if ($request->item_type_id >6 ) {
            $item->course_items_parent  = $request->item_parent;
        }
        if($request->item_type_id == 3){
            $item->path = NULL;
        }
        $item->save();
        $course = $item->course_item_chapter->course;
        foreach ($course->course_item_chapters as $chapter) {
                $total_class += count($chapter->course_item
                    ->where('course_item_types_id', '<', 5));
        }
        $course->update([
            'total_class' => $total_class,
        ]);

        return redirect()->back()->with('success', 'Conteúdo Alterado com sucesso');
    }
}
