<?php
use Illuminate\Http\Request;
use App\CourseItem;

function fileGenerate(Request $request)
{

    if ($request->item_type_id == 1) {
        $request->validate([
            'file'      => 'mimes:mp4,avi,mpg,mkv'
        ]);
    }elseif($request->item_type_id == 2){
        $request->validate([
            'file'      => 'mimes:jpeg,bmp,png,jpg,gif,svg'
        ]);
    }elseif ($request->item_type_id == 4) {
        $request->validate([
            'file'      => 'mimes:mid,mp3,ogg,wav,mpga,mp2,mp2a,m2a,m3a'
        ]);
    }elseif ($request->item_type_id == 5) {
        $request->validate([
            'file'      => 'required|mimes:rar,pdf,xlsx,xls,ppt,pptx,doc,docx,otp,odp,ods,odt,pps,psd,jpeg,jpg,png'
        ]);
    }
    $attach_file = $request->file('file');
    $extension = $request->file->getClientOriginalExtension();
    //Gera string aleatória
    $count = 1;
    while($count != 0){
        
        for ($i = 0; $i < 7; $i++) {
            $str = sortNameGenerate();
            $count  = CourseItem::where('path', $str)->count();
        }
    }
    $attach_file_name = $str;
    $attach_file_name =  $attach_file_name.".".$extension;
    $attachment = "uploads/archives/{$attach_file_name}";
    $attach_file->move('uploads/archives', $attach_file_name);
    //Vimeo upload
    if($request->vimeo == 'on'){                
        $vimeo_result = vimeo_tools::Upload_Video($attachment, $attach_file_name);                
        $path = $vimeo_result;
    }
    else {                
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