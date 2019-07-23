<?php
use App\{Course,CourseItemChapter, CourseUser};
use App\CourseItem;
use Illuminate\Http\Request;
function fileGenerate(Request $request)
{

    if ($request->item_type_id == 1) {
        $request->validate([
            'file' => 'mimes:mp4,avi,mpg,mkv',
        ]);
    } elseif ($request->item_type_id == 2) {
        $request->validate([
            'file' => 'mimes:jpeg,bmp,png,jpg,gif,svg',
        ]);
    } elseif ($request->item_type_id == 4) {
        $request->validate([
            'file' => 'mimes:mid,mp3,ogg,wav,mpga,mp2,mp2a,m2a,m3a',
        ]);
    } elseif ($request->item_type_id == 5) {
        $request->validate([
            'file' => 'required|mimes:rar,pdf,xlsx,xls,ppt,pptx,doc,docx,otp,odp,ods,odt,pps,psd,jpeg,jpg,png',
        ]);
    }
    $attach_file = $request->file('file');
    $extension = $request->file->getClientOriginalExtension();
    //Gera string aleatória
    $count = 1;
    while ($count != 0) {

        for ($i = 0; $i < 7; $i++) {
            $str = sortNameGenerate();
            $count = CourseItem::where('path', $str)->count();
        }
    }
    $attach_file_name = $str;
    $attach_file_name = $attach_file_name . "." . $extension;
    $attachment = "uploads/archives/{$attach_file_name}";
    $attach_file->move('uploads/archives', $attach_file_name);
    //Vimeo upload
    if ($request->vimeo == 'on') {
        $vimeo_result = vimeo_tools::Upload_Video($attachment, $attach_file_name);
        $path = $vimeo_result;
    } else {
        $path = $attach_file_name;
    }
    return $path;
}

function sortNameGenerate()
{
    $str = "";
    $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
    $max = count($characters) - 1;

    for ($i = 0; $i < 7; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
}

function vinculaAluno()
{
    // $courses = Course::all();
    // foreach ($courses as $course) {
    //     $users = DB::table('wp_usermeta')->where('meta_key', $course->id)->get();
    //     if(count($users) > 0){
    //         foreach($users as $user)
    //         {

    //             $date = date('Y-m-d', strtotime('+6 month'));
    //             CourseUser::create([
    //                 'user_id'   => $user->user_id,
    //                 'course_id' => $course->id,
    //                 'progress'  => 0,
    //                 'expired'   => $date
    //             ]);
    //         }
    //     }
    // }
}

function corrigeCaractere()
{
    $courses = Course::all();
    $chapters = CourseItemChapter::all();
    $items = CourseItem::all();
    
    foreach ($courses as $course) {
        $course->desc = caracteres($course->desc);
        $course->save();
    }
    foreach ($chapters as $chapter) {
        $chapter->name = caracteres($chapter->name);
        $chapter->desc = caracteres($chapter->desc);
        $chapter->save();
    }
    foreach ($items as $item) {
        $item->name = caracteres($item->name);
        $item->desc = caracteres($item->desc);
        $course->save();
    }
    return dd('teste');
}
function caracteres($string)
{
    $string = str_replace('ÃƒÆ’Ã‚Â£', 'ã', $string);
    $string = str_replace('ÃƒÆ’Ã‚Â¢', 'â', $string);
    $string = str_replace('ÃƒÆ’Ã‚Â¡', 'á', $string);
    $string = str_replace('ÃƒÆ’Ã‚Â©', 'é', $string);
    $string = str_replace('ÃƒÆ’Ã‚Âª', 'ê', $string);
    $string = str_replace('ÃƒÆ’Ã‚Â­', 'í', $string);
    $string = str_replace('ÃƒÆ’Ã‚Â³', 'ó', $string);
    $string = str_replace('ÃƒÆ’Ã‚Â´', 'ô', $string);
    $string = str_replace('ÃƒÆ’Ã‚Âµ', 'õ', $string);
    $string = str_replace('ÃƒÆ’Ã‚Âº', 'ú', $string);
    $string = str_replace('ÃƒÆ’Ã‚Â§', 'ç', $string);
    $string = str_replace('ÃƒÆ’Ã¢â‚¬Â°', 'É', $string);
    $string = str_replace('ÃƒÆ’Ã‚Â§', 'ç', $string);
    return $string;
}

function geraAula()
{
    $courses = Course::get();
    foreach ($courses as $course) {

        $post = DB::table('wp_postmeta')->where('post_id', $course->id)->where('meta_key', 'vibe_course_curriculum')->first();
        $capitulo_atual = null;
        $metas = unserialize($post->meta_value);
        $count = 0;
        if($metas == null){
            continue;
        }
        foreach ($metas as $meta) {
            $count++;
            $aula = DB::table('wp_posts')->where('id', $meta)->first();
            if ($aula == null) {
                $order = CourseItemChapter::count();
                $chapter = new CourseItemChapter;
                $chapter->name = $meta;
                $chapter->desc = $meta;
                $chapter->course_id = $course->id;
                $chapter->order = $order;
                $chapter->save();

                $capitulo_atual = $chapter->id;
                continue;
            } elseif ($count == 1) {
                $order = CourseItemChapter::count();
                $chapter = new CourseItemChapter;
                $chapter->name = 'Aula 1';
                $chapter->desc = 'Aula 1';
                $chapter->course_id = $course->id;
                $chapter->order = $order;
                $chapter->save();
                $capitulo_atual = $chapter->id;
            }
            if ($aula->post_type == 'unit') {

                $total_class = 0;
                $item = new CourseItem;
                $item->name = $aula->post_title;
                $item->course_item_chapter_id = $capitulo_atual;
                $item->desc = $aula->post_content;
                if (strpos($aula->post_content, 'vimeo')) {
                    $item->course_item_types_id = 1;
                    $item->path = geraPath($aula->post_content);
                } else {
                    $item->course_item_types_id = 3;
                }
                $order = CourseItem::count();

                $item->order = $order;

                $item->save();

                foreach ($course->course_item_chapters as $chapter) {
                    $total_class += count($chapter->course_item
                            ->where('course_item_types_id', '<', 5));
                }
                $course->update([
                    'total_class' => $total_class,
                ]);
                continue;
            }
            if ($aula->post_type == 'quiz') {

                $total_class = 0;
                $item = new CourseItem;
                $item->name = $aula->post_title;
                $item->course_item_chapter_id = $capitulo_atual;
                $item->desc = $aula->post_content;
                $item->course_item_types_id = 6;
                $order = CourseItem::count();

                $item->order = $order;

                $item->save();
                continue;
            }
        }
    }
}

function geraPath($var)
{
    $total = strlen($var);
    $posicao = strpos($var, 'https://player.vimeo.com/video/'); 

    $new_position = ($posicao+40) - $total;
    $teste = substr($var, ($posicao),($new_position));
    $teste = str_replace("[/embed]", "", $teste);
    return $teste;
}