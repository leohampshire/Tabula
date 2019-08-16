<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{User, CourseUser, Certificate, Course};
use App\{CourseItemUser, CourseItem};
use PDF;


class StudentController extends Controller
{
    public function certificate(User $student, Course $course)
    {
        $progress = $student->progress()->find($course->id)->pivot->progress; 
        if ($progress != $course->total_class) {
            return redirect()->back()->with('warning', 'Curso ainda não finalizado para gerar o certificado.');
        }
        $path = public_path()."/uploads/archives/";
        $certificate_name = "{$student->id}_{$course->id}_{$course->name}.pdf";
        
        Certificate::updateOrCreate(
            ['path'      => $certificate_name],
            ['user_id'   => $student->id,
            'course_id' => $course->id]
        );

        $teacher = User::find($course->user_id_owner);
        $now = date("Y-m-d H:i:s");
        $data = [
            'date'      => $now,
            'student'   => $student,
            'course'    => $course,
            'teacher'   => $teacher,
            'company'   => $teacher->company,
            'hour'      => $course->timeH,
            'minute'    => $course->timeM,
            ];
        $pdf = PDF::loadView('admin.pages.course.student.certificate', $data);
        $pdf->save("{$path}{$certificate_name}");

        return redirect()->back()->with('success', 'Certificado gerado e enviado para o Aluno');
    }

    public function studentRestart($course_id, $user_id)
    {
        CourseUser::where('course_id', $course_id)->where('user_id', $user_id)->update([
            'progress' => 0,
        ]);
        $course = Course::find($course_id);
        foreach ($course->course_item_chapters as $chapter) {
            CourseItemUser::where('course_chapter_id', $chapter->id)->where('user_id', $user_id)->delete();
        }
        return redirect()->back()->with('success', 'Progresso Reiniciado');
    }

    public function test(User $student, $course_id)
    {
        // $tests = $student->tests()->where('course_item_id', $course_id)->get();

        $course = Course::find($course_id);
        $test = $student->tests()->first();
        if(!$test){
            return redirect()->back()->with('warning', 'Este aluno não possui nenhum teste para apresentar');
        }
        
        $item = CourseItem::find($test->course_item_id);
        
        $items = CourseItem::where('course_items_parent', $item->id)->get();
        $answers = $test->tests;   
        return view('admin.pages.course.student.tests')
        ->with('items', $items)
        ->with('item', $item)
        ->with('answers', $answers)
        ->with('tests', $student->tests)
        ->with('student', $student);
    }

    public function student($id)
    {
        $course = Course::find($id);
        return view('admin.pages.course.student.index')
        ->with('course', $course);
    }
    public function studentInclude(Request $request)
    {
        $student = User::where('email', $request->email)->first();

        $date = date('Y-m-d', strtotime('+6 month'));
        if($student){
            if (count($student->myCourses->where('id', $request->id)) == 0) {
                CourseUser::create([
                    'user_id'   => $student->id,
                    'course_id' => $request->id,
                    'progress'  => 0,
                    'expired'   => $date
                ]);
                return redirect()->back()->with('success', 'Aluno Incluso ao seu curso');
            }
        }
        return redirect()->back()->with('warning', 'Usuário já vinculado ao curso ou inexistente');
    }
}
