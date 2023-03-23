<?php

namespace App\Http\Controllers\Instructor;

use App\Events\AnnouncementShared;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnnouncementPostRequest;
use App\Models\Announcement;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {
        return view('instructor.course.announcement.index', ['course' => $course]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        return view('instructor.course.announcement.create', ['course' => $course]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementPostRequest $request, Course $course)
    {
        $data = $request->validated();

        $announcement = new Announcement();

        $announcement->course_id = $course->id;

        $announcement->title = htmlspecialchars($data['title']);

        $announcement->content = htmlspecialchars($data['content']);

        $announcement->status = $data['status'];

        $announcement->save();

        AnnouncementShared::dispatchIf($announcement->status == 'active' ? true : false, $announcement, $course);

        Session::put('message', $announcement->title . " başlıklı duyuru " . $course->name . ' isimli sınıfa başarıyla eklendi.');
        return redirect()->route('courses.announcements.index', ['course' => $course]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Announcement $announcement)
    {
        return view('instructor.course.announcement.detail', ['course' => $course, 'announcement' => $announcement]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Announcement $announcement)
    {
        return view('instructor.course.announcement.edit', ['course' => $course, 'announcement' => $announcement]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnnouncementPostRequest $request, Course $course, Announcement $announcement)
    {
        $data = $request->validated();

        $announcement->course_id = $course->id;

        $announcement->title = htmlspecialchars($data['title']);

        $announcement->content = htmlspecialchars($data['content']);

        $announcement->status = $data['status'];

        $announcement->save();

        Session::put('message', 'Duyuru başarılı bir şekilde güncellendi.');
        return redirect()->route('courses.announcements.show', ['course' => $course, 'announcement' => $announcement]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Announcement $announcement)
    {
    }
}
