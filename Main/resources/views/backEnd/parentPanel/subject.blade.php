@extends('backEnd.master')
@section('title')
{{$student_detail->first_name.' '.$student_detail->last_name}} @lang('common.subjects')
@endsection
@section('mainContent')
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('common.subjects')</h1>
            <div class="bc-pages">
                <a href="{{route('dashboard')}}">@lang('common.dashboard')</a>
                <a href="{{route('parent_subjects', [$student_detail->id])}}">@lang('common.subjects')</a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
       <div class="row mt-40">
            <div class="col-lg-6 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30">@lang('student.student_information')</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 mb-30">
                <!-- Start Student Meta Information -->
                <div class="student-meta-box">
                    <div class="student-meta-top"></div>
                    <img class="student-meta-img img-100" src="{{asset($student_detail->student_photo)}}" alt="">
                    <div class="white-box radius-t-y-0">
                        <div class="single-meta mt-10">
                            <div class="d-flex justify-content-between">
                                <div class="name">
                                    @lang('student.student_name')
                                </div>
                                <div class="value">
                                    {{$student_detail->first_name.' '.$student_detail->last_name}}
                                </div>
                            </div>
                        </div>
                        <div class="single-meta">
                            <div class="d-flex justify-content-between">
                                <div class="name">
                                    @lang('student.admission_no')
                                </div>
                                <div class="value">
                                    {{$student_detail->admission_no}}
                                </div>
                            </div>
                        </div>
                        <div class="single-meta">
                            <div class="d-flex justify-content-between">
                                <div class="name">
                                    @lang('student.roll_number')
                                </div>
                                <div class="value">
                                     {{$student_detail->roll_no}}
                                </div>
                            </div>
                        </div>
                        <div class="single-meta">
                            <div class="d-flex justify-content-between">
                                <div class="name">
                                    @lang('common.class')
                                </div>
                                <div class="value">
                                   {{$student_detail->class !=""?$student_detail->class->class_name:""}} ({{$student_detail->session !=""?$student_detail->session->session:""}})
                                </div>
                            </div>
                        </div>
                        <div class="single-meta">
                            <div class="d-flex justify-content-between">
                                <div class="name">
                                    @lang('common.section')
                                </div>
                                <div class="value">
                                    {{$student_detail->section !=""?$student_detail->section->section_name:""}}
                                </div>
                            </div>
                        </div>
                        <div class="single-meta">
                            <div class="d-flex justify-content-between">
                                <div class="name">
                                    @lang('common.gender')
                                </div>
                                <div class="value">
                                    {{$student_detail->gender !=""?$student_detail->gender->base_setup_name:""}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Student Meta Information -->

            </div>
            <div class="col-lg-9">

                <div class="row">
                    <div class="col-lg-12">

                        <table class="display school-table school-table-style" cellspacing="0" width="100%">

                            <thead>
                                <tr>
                                    <th>@lang('common.subjects')</th>
                                    <th>@lang('student.teachers')</th>
                                    <th>@lang('academics.subject_type')</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($assignSubjects as $assignSubject)
                                <tr>
                                    <td>{{$assignSubject->subject_id != ""? $assignSubject->subject->subject_name:''}}</td>
                                    <td>{{$assignSubject->teacher_id != ""? $assignSubject->teacher->full_name:''}}</td>
                                    <td>{{$assignSubject->subject->subject_type == "T"? 'Theory': 'Practical'}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
