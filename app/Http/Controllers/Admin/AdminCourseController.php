<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Course;
use App\Category;
use App\CourseItemChapter;
use App\CourseItemType;
use App\CourseItem;
use App\TestItem;
use Session;
use Auth;
class AdminCourseController extends Controller
{
	public function index(Request $request)
	{
		return view('admin.pages.course.index')->with('courses', Course::all());
	}

	public function SubCourse(Request $request)
	{
		$data = Category::where('category_id', $request->categId)->get();
        return json_encode($data);
	}

    public function avaliable($id)
    {
        $course = Course::find($id);
        if ($course->avaliable == 1) {
            $course->avaliable = 2;
            Session::flash('success', 'Curso disponibilizado');
        }else{
            $course->avaliable = 1;
            Session::flash('success', 'Curso Removido');
        }
        $course->save();

        return redirect()->back();
    }

	public function create()
	{
		return view('admin.pages.course.create')->with('categories', Category::all());
	}

	public function store(Request $request)
	{

		$this->validate($request, [
            'name'        => 'required|max:100',
            'desc'        => 'required',
            'price'       => 'required',
            'featured'    => 'required',
            'category_id' => 'required',
            'thumb_img'   => 'mimes:jpeg, png, jpg, bmp',
            'video'		  => 'mimes:mp4, mkv'	
        ]);

        //Chama o objeto
        $course = new Course();
        //Vincula as variaveis 
        $course->name               = $request->name;
        $course->desc               = $request->desc;
        $course->price              = str_replace(',', '.', str_replace('.', '', $request->price));
        $course->category_id        = $request->category_id;
        $course->subcategory_id     = $request->subcategory_id;
        $course->featured           = $request->featured;
        $course->requirements       = $request->requirements;
        $course->total_class        = 0;
        $course->course_type        = 1;
		
		$auth = Auth::guard('admin')->user();
        $course->user_id_owner      = $auth->id;
        
        $urn 		= '';
        $urns 		= explode(' ', $request->name);
        for($i = 0; $i < sizeof($urns); $i++){
            $urn 	=  substr("{$urn}-{$urns[$i]}", 1);  
        }
        $urns = 1;
        while ($urns != 0) {
            $urn    = $urn.'-'.$urns;
            $urns   = Course::where('urn', $urn)->count();
        }
        $course->urn        = strtolower($urn); 

        //valida a foto de capa
        if($request->thumb_img != '')
        {
            $arq_img = $request->file('thumb_img');
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
                    $count  = Course::where('thumb_img', $str)->count();
                }
            }
            $arq_img_name = $str.'.'.$type;
            $arq_img->move('images/aulas', $arq_img); 

            $course->thumb_img      = $arq_img_name;  
        }
        else
            $course->thumb_img      = 'e-learning.jpg';

        //Valida o video     
        if($request->video != '')
        {
            $arq_video  = $request->file('video');
            $name = basename($arq_video->getClientOriginalName());
            $type = strtolower(pathinfo($name,PATHINFO_EXTENSION));
            $count = 1;
            while($count != 0){
                $str            = "";
                $characters     = array_merge(range('A','Z'), range('a','z'), range('0','9'));
                $max            = count($characters) - 1;

                for ($i = 0; $i < 7; $i++) {
                    $rand   = mt_rand(0, $max);
                    $str   .= $characters[$rand];
                    $count  = Course::where('video', $str)->count();
                }
            }
            $arq_video_name = $str.'.'.$type;
            
            $arq_video->move('images/thumbvideo', $arq_video_name); 
            $course->video = $arq_video_name;  
        }
        $course->avaliable = 1;
        $course->save();

        $course               = Course::find($course->id);
        $categories           = Category::all();
        $course_items_chapter = CourseItemChapter::all();

        return redirect(route('admin.course.edit', ['id' => $course->id]))
        ->with('success', 'Curso criado com sucesso')
        ->with('course', $course)
        ->with('categories', $categories)
        ->with('course_items_chapter', $course_items_chapter);
	}

	public function edit($id)
	{
		$course = Course::find($id);
		$course->price = number_format($course->price, 2, ',', '.');

        $chapters = CourseItemChapter::where('course_id', $id)->orderBy('order', 'asc')->get();
		return view('admin.pages.course.edit')
		->with('categories', Category::all())
        ->with('chapters', $chapters)
		->with('course', $course);
	}

	public function update(Request $request)
	{
		$this->validate($request, [
            'name'        => 'required|max:100',
            'desc'        => 'required',
            'price'       => 'required',
            'urn'  		  => [
                'required',
                Rule::unique('courses')->ignore($request->id)
            ],
            'featured'    => 'required',
            'category_id' => 'required',
            'thumb_img'   => 'mimes:jpeg, png, jpg, bmp',
            'video'		  => 'mimes:mp4, mkv'	
        ]);

        //Chama o objeto
        $course = Course::find($request->id);
        //Vincula as variaveis 
        $course->name               = $request->name;
        $course->desc               = $request->desc;
        $course->price              = str_replace(',', '.', str_replace('.', '', $request->price));
        $course->category_id        = $request->category_id;
        $course->subcategory_id     = $request->subcategory_id;
        $course->featured           = $request->featured;
        $course->requirements       = $request->requirements;
        $course->total_class        = 0;
        $course->urn 				= $request->urn;
		
		$auth = Auth::guard('admin')->user();
        $course->user_id_owner      = $auth->id;
        
        //valida a foto de capa
        if($request->thumb_img != '')
        {
            $arq_img = $request->file('thumb_img');
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
                    $count  = Course::where('thumb_img', $str)->count();
                }
            }
            $arq_img_name = $str.'.'.$type;
            $arq_img->move('images/aulas', $arq_img); 

            $course->thumb_img      = $arq_img_name;  
        }
        else
            $course->thumb_img      = 'e-learning.jpg';

        //Valida o video     
        if($request->video != '')
        {
            $arq_video  = $request->file('video');
            $name = basename($arq_video->getClientOriginalName());
            $type = strtolower(pathinfo($name,PATHINFO_EXTENSION));
            $count = 1;
            while($count != 0){
                $str            = "";
                $characters     = array_merge(range('A','Z'), range('a','z'), range('0','9'));
                $max            = count($characters) - 1;

                for ($i = 0; $i < 7; $i++) {
                    $rand   = mt_rand(0, $max);
                    $str   .= $characters[$rand];
                    $count  = Course::where('video', $str)->count();
                }
            }
            $arq_video_name = $str.'.'.$type;
            
            $arq_video->move('images/thumbvideo', $arq_video_name); 
            $course->video = $arq_video_name;  
        }

        $course->avaliable = 1;
        $course->save();

        $course             = Course::find($course->id);
        $categories         = Category::all();
        $course_items_chapter = CourseItemChapter::all();

        return redirect()->back()
        ->with('success', 'Curso Editado com sucesso');
	}

	public function delete($id)
	{

	}

    public function free($id)
    {
        $item = CourseItem::find($id);
        if ($item->free_item == NULL || $item->free_item == '') {
            $item->free_item = 1;
        }else{
            $item->free_item = NULL;
        }
        $item->save();

        return redirect()->back()->with('success', 'Aula gratuita alterada!');
    }
    public function storeChapter(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'desc'      => 'required'
        ]);


        $order = CourseItemChapter::count();

        $chapter             = new CourseItemChapter;
        $chapter->name       = $request->name;
        $chapter->desc       = $request->desc;
        $chapter->course_id  = $request->course_id;
        $chapter->order      = $order;
        $chapter->save();

        return redirect()->back()->with('success', 'Capítulo adicionado com sucesso');
    }
    public function updateChapter(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'desc'      => 'required'
        ]);


        $chapter             = CourseItemChapter::find($request->id);
        $course              = Course::find($chapter->course_id);
        $course->avaliable   = 1;
        $chapter->name       = $request->name;
        $chapter->desc       = $request->desc;
        $chapter->course_id  = $request->course_id;
        $chapter->save();
        $course->save();

        return redirect()->back()->with('success', 'Capítulo editado com sucesso');
    }

    public function deleteChapter($id)
    {
    	$chapter = CourseItemChapter::find($id);

        foreach ($chapter->course_item as $item)
        {
            $items = TestItem::where('course_item_id', $item->id);
       
            if ($items->count() > 0) {
                foreach ($items->get() as $i) {
                   $i->forceDelete();
                }
            }
            if ($item->course_item_parent()->count() > 0) {
                foreach ($item->course_item_parent as $it) {
                    $it->forceDelete();
                }
            }
            $item->forceDelete();
        }

        $chapter->delete();
        return redirect()->back()
        ->with('success', 'Capítulo e itens relacionados excluidos com sucesso!');
    }

    public function itemChapter($id)
    {
        $chapter  = CourseItemChapter::find($id);
        $course   = Course::find($chapter->course_id);

        return view('admin.pages.course.class.index')
        ->with('item_types', CourseItemType::all())
        ->with('chapter', $chapter)
        ->with('course', $course);
    }

    public function storeItem(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'desc'      => 'max:400'
        ]);
        $item = new CourseItem;
        $item->name                     = $request->name;
        $item->course_item_chapter_id   = $request->chapter_id;
        $item->course_item_types_id     = $request->item_type_id;
        if ($request->item_type_id < 6) {
                $item->desc             = $request->desc;
        }
        if(isset($request->file))
        {
            $arq = $request->file('file');
            $this->validate($request, [
                'file'      => 'mimes:jpeg,bmp,png,jpg,pdf,mp4'
            ]);
            $attach_file = $request->file;
            //Gera string aleatória
            $count = 1;
            while($count != 0){
                $str            = "";
                $characters     = array_merge(range('A','Z'), range('a','z'), range('0','9'));
                $max            = count($characters) - 1;
                
                for ($i = 0; $i < 7; $i++) {
                    $rand   = mt_rand(0, $max);
                    $str   .= $characters[$rand];
                    $count  = CourseItem::where('path', $str)->count();
                }
            }
            $attach_file_name = $str;
            $attach_file_name =  $attach_file_name.".".pathinfo($attach_file->getClientOriginalName(),PATHINFO_EXTENSION);
            $attach_file->move('uploads/archives', $attach_file_name); 

            $item->path    = $attach_file_name;
            //Vimeo upload
            if($request->vimeo == 'on'){                
                $vimeo_result = vimeo_tools::Upload_Video($attach_file_name,$item);                
                $item->path = $vimeo_result;
            }
            else {                
                $item->path = $attach_file_name;       
            }
        }

        $order = CourseItem::count();
        
        $item->order = $order;
//Controle de avaliação
        if ($request->item_type_id >6 ) {
            $item->course_items_parent  = $request->item_parent;
        }
        $item->save();
        if ($request->item_type_id == 8) {
            $item->course_items_parent  = $request->item_parent;
            $itemTest                   = new TestItem;
            $itemTest->course_item_id   = $item->id;
            $itemTest->answer           = $request->trueFalse;
            $itemTest->save();

        }elseif($request->item_type_id == 7){
            $item->course_items_parent  = $request->item_parent;

            foreach ($request->afirmacao as $key => $afirmacao) {
                $itemTest               = new TestItem;
                $itemTest->desc         = $afirmacao;
                $itemTest->course_item_id   = $item->id;
                if(in_array($key, $request->verdadeira)){
                    $itemTest->answer   = 1;
                }else{
                    $itemTest->answer   = 0;
                }
                $itemTest->save();
            }
        }elseif($request->item_type_id == 9){
            $item->course_items_parent  = $request->item_parent;

            foreach ($request->afirma as $key => $afirma) {
                $itemTest               = new TestItem;
                $itemTest->desc         = $afirma;
                $itemTest->course_item_id   = $item->id;
                if($key === $request->verdadeira){
                    $itemTest->answer   = 1;
                }else{
                    $itemTest->answer   = 0;
                }
                $itemTest->save();
            }
        }elseif($request->item_type_id == 10){
            $item->course_items_parent  = $request->item_parent;
            $itemTest                   = new TestItem;
            $itemTest->course_item_id   = $item->id;
            $itemTest->desc             = $request->desc;
            $itemTest->save();
        }

        $total_class = CourseItem::where('course_item_chapter_id', $request->chapter_id)
        ->where('course_item_types_id', '<>', 5)->count();
        
        Course::where('id', $request->course_id)->update([
            'total_class' => $total_class,
        ]);

        Session::flash('success', 'Conteúdo adicionado com sucesso.');
        return redirect()->back();
    }

    public function createTest($id)
    {
        $item_parent  = CourseItem::find($id);
        $chapter  = CourseItemChapter::find($item_parent->course_item_chapter_id);
        $course   = Course::find($chapter->course_id);
        $items = CourseItem::where('course_items_parent', $id)->get();

        return view('admin.pages.course.class.test')
        ->with('item_types', CourseItemType::all())
        ->with('items', $items)
        ->with('item_parent', $item_parent)
        ->with('chapter', $chapter)
        ->with('course', $course);
    }

    public function updateItem(Request $request)
    {

    }
    public function deleteItem($id)
    {
        $item = CourseItem::find($id);
        $items = TestItem::where('course_item_id', $item->id);
        if ($item->course_item_parent()->count() > 0) {
            foreach ($item->course_item_parent as $it) {
                $it->forceDelete();
            }
        }
        if ($items->count() > 0) {
            foreach ($items->get() as $i) {
               $i->forceDelete();
            }
        }
        $item->delete();
        return redirect()->back()->with('success', 'Conteúdo excluidos com sucesso.');
    }

    public function indexAnalyze()
    {
        return view('admin.pages.course.analyze.index')->with('courses', Course::all());
    }
    public function show()
    {
        
    }

}
