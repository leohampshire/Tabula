<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\CustomClasses\vimeo_tools;
use App\CourseItemChapter;
use App\CourseItemType;
use App\Notification;
use App\Certificate;
use App\CourseItem;
use App\CourseUser;
use App\TestItem;
use App\Category;
use App\Course;
use App\User;
use Session;
use Image;
use Auth;
use PDF;

class AdminCourseController extends Controller
{
	public function index(Request $request)
	{

        $courses = new Course;

        if($request->has('name')){
            if(request('name') != ''){
                $courses = $courses->where('name', 'like', request('name') . '%');
            }
        }
        $courses = $courses->orderBy('name', 'asc')->paginate(20);
		return view('admin.pages.course.index')->with('courses', $courses);
	}

	public function SubCourse(Request $request)
	{
		$data = Category::where('category_id', $request->categId)->get();
        return json_encode($data);
	}

    public function avaliable($id)
    {
        $course = Course::find($id);
        $avaliable = $course->avaliable;
        if ($course->avaliable == 1 || $course->avaliable == 3) {
            $course->avaliable = 2;
            Session::flash('success', 'Curso disponibilizado');
        }else{
            $course->avaliable = 1;
            Session::flash('success', 'Curso Removido');
        }

        if($avaliable >2 && $course->course_type == 2){
            $notification = new Notification;
            $notification->type_notification = "Curso disponibilizado";
            $notification->desc_notification = "Curso liberado pelos nossos adminstradores.";
            $notification->status = 1;
            $notification->user_id = $course->user_id_owner;
            $notification->save();
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
            'desc'        => 'required|max:1500',
            'price'       => 'required',
            'category_id' => 'required',
            'thumb_img'   => 'mimes:jpeg, png, jpg, bmp',
            'video'		  => 'mimes:mp4, mkv',
            'requirements'=> 'max:10000'	,
            'timeM'       => 'max:59',
        ]);

        //Chama o objeto
        $course = new Course();
        //Vincula as variaveis 
        $course->name               = $request->name;
        $course->desc               = $request->desc;
        $course->price              = str_replace(',', '.', str_replace('.', '', $request->price));
        $course->category_id        = $request->category_id;
        $course->subcategory_id     = $request->subcategory_id;
        $course->requirements       = $request->requirements;
        $course->timeH              = $request->timeH;
        $course->timeM              = $request->timeM;
        $course->total_class        = 0;
        
        $course->urn = $this->urnValidate($request->name);
        //valida a foto de capa
        if($request->thumb_img != ''){
            $course->thumb_img      = $this->thumbImgValidate($request);
        }else{
            $course->thumb_img      = 'course.jpg';
        }

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
		if (Auth::guard('admin')->user()) {
            $course->course_type        = 1;
            $auth = Auth::guard('admin')->user();
            $course->user_id_owner      = $auth->id;
        }elseif(Auth::guard('user')->user()){
            $course->course_type        = 2;
            $auth = Auth::guard('user')->user();
            $course->user_id_owner      = $auth->id;
        }
        $course->avaliable = 1;
        $course->save();

        $course               = Course::find($course->id);
        $categories           = Category::all();
        $course_items_chapter = CourseItemChapter::all();
        if ($auth->user_type_id <= 2) {
            return redirect(route('admin.course.edit', ['id' => $course->id]))
            ->with('success', 'Curso criado com sucesso')
            ->with('course', $course)
            ->with('categories', $categories)
            ->with('course_items_chapter', $course_items_chapter);
        }else{
            return redirect(route('user.panel')."#teach")
            ->with('success', 'Curso criado com sucesso');            
        }

	}

	public function edit($id)
	{
		$course = Course::find($id);
		$course->price = number_format($course->price, 2, ',', '.');

        $chapters = CourseItemChapter::where('course_id', $id)->get();
		return view('admin.pages.course.edit')
		->with('categories', Category::all())
        ->with('chapters', $chapters)
		->with('course', $course);
	}

	public function update(Request $request)
	{
		$this->validate($request, [
            'name'        => 'required|max:100',
            'desc'        => 'required|max:1500',
            'price'       => 'required',
            'urn'  		  => [
                Rule::unique('courses')->ignore($request->id)
            ],
            'category_id' => 'required',
            'timeH'       => 'required',
            'timeM'       => 'max:59',
            'thumb_img'   => 'mimes:jpeg, png, jpg, bmp',
            'video'		  => 'mimes:mp4, mkv'	
        ]);
        $admin = Auth::guard('admin')->check();
        //Chama o objeto
        $course = Course::find($request->id);
        //Vincula as variaveis 
        $course->name               = $request->name;
        $course->desc               = $request->desc;
        $course->price              = str_replace(',', '.', str_replace('.', '', $request->price));
        $course->category_id        = $request->category_id;
        $course->subcategory_id     = $request->subcategory_id;
        $course->requirements       = $request->requirements;
        $course->timeH              = $request->timeH;
        $course->timeM              = $request->timeM;
        $course->total_class        = 0;
		
        
        if($request->thumb_img != ''){
            $course->thumb_img      = $this->thumbImgValidate($request);
        }

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
        if (Auth::guard('admin')->user()) {
            $course->featured           = $request->featured;
            $course->urn 				= $request->urn;
        }
        $course->save();
        if ($admin) {
            return redirect()->back()
            ->with('success', 'Curso Editado com sucesso');
        }
        return redirect(route('user.panel')."#teach")
        ->with('success', 'Curso Editado com sucesso');
	}

	public function delete($id)
	{
        $course = Course::find($id);

        $course->delete();

        Session::flash('success', 'Curso removido com sucesso');
        return redirect()->back();
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
            'name'      => 'required|max:100',
            'desc'      => 'required|max:1000'
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
            'name'      => 'required|max:100',
            'desc'      => 'required|max:1000'
        ]);

        $chapter             = CourseItemChapter::find($request->id);
        $course              = Course::find($chapter->course_id);
        $chapter->name       = $request->name;
        $chapter->desc       = $request->desc;
        $chapter->course_id  = $chapter->course_id;
        $chapter->save();

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
            'item_type_id'  => 'required',
            'name'          => 'required|max:200',
            'desc'          => 'nullable|max:10000'
        ]);
        $total_class = 0;
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

    public function indexAnalyze(Request $request)
    {
        $courses = new Course;

        if($request->has('name')){
            if(request('name') != ''){
                $courses = $courses->where('name', 'like', request('name') . '%');
            }
        }
        $courses = $courses->orderBy('name', 'asc')->paginate(20);
        return view('admin.pages.course.analyze.index')->with('courses', $courses);
    }
    public function show($id)
    {
        $course = Course::find($id);
     return view('admin.pages.course.show.class')->with('course', $course);   
    }

    public function urnValidate(String $name)
    {
        $urn = '';
        $i   = 0;
        $urnCourse = 1;
        while ($urnCourse > 0) {
            $urn = iconv('UTF-8', 'ASCII//TRANSLIT', $name);
            $urn = preg_replace("/[^a-zA-Z0-9\/_| -]/", '', $urn);
            $urn = strtolower(trim($urn, '-'));
            $urn = preg_replace("/[\/_| -]+/", '-', $urn);
            $urnCourse = Course::where('urn', $urn)->count();
            if ($urnCourse != 0) {
                $urn = "{$urn}-{$i}";
                $urnCourse = Course::where('urn', $urn)->count();
            }
            $i++;
        }
        return $urn;
    }

    public function thumbImgValidate(Request $request)
    {
        $originalPath = public_path().'/images/aulas/';
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
        $image = Image::make($arq_img);
        $image->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save($originalPath.$arq_img_name); 

        return $arq_img_name;  
    }

    public function strVideoGenerate(Request $request)
    {

        $arq = $request->file('file');

        if ($request->item_type_id == 1) {
            $this->validate($request, [
                'file'      => 'mimes:mp4,avi,mpg,mkv'
            ]);
        }elseif($request->item_type_id == 2){
            $this->validate($request, [
                'file'      => 'mimes:jpeg,bmp,png,jpg,gif,svg'
            ]);
        }elseif ($request->item_type_id == 4) {
            $this->validate($request, [
                'file'      => 'mimes:mid,mp3,ogg,wav,mpga,mp2,mp2a,m2a,m3a'
            ]);
        }elseif ($request->item_type_id == 5) {
            $this->validate($request, [
                'file'      => 'required|mimes:rar,pdf,xlsx,xls,ppt,pptx,doc,docx,otp,odp,ods,odt,pps,psd,jpeg,jpg,png'
            ]);
        }
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
        $attachment = "uploads/archives/{$attach_file_name}";
        $attach_file->move('uploads/archives', $attach_file_name);
        //Vimeo upload
        if($request->item_type_id == 1){          
            $vimeo_result = vimeo_tools::Upload_Video($attachment, $request->name);                
            $path = $vimeo_result;
        }
        else {                
            $path = $attach_file_name;       
        }
        return $path;
    }
}
