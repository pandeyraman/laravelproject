@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <div class="text-right"> <a href="{{route('subject.create')}}" class="btn btn-primary text-right">Add New Subject</a></div>
                    </div>


                    <div class="table">
                        <table class="table table-bordered table-striped table-hover ">
                            <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Subject Name</th>
                                <th>Full Marks</th>
                                <th>Pass Marks</th>
                                <th>Theory Marks</th>
                                <th>Practical Marks</th>
                                <th>Class</th>
                                <th>Edit</th>
                                <th>Delete</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subjects as $key=>$subject)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ $subject->subject_name }}</td>
                                    <td>{{ $subject->full_marks }}</td>
                                    <td>{{ $subject->pass_marks }}</td>
                                    <td>{{ $subject->theory_marks}}</td>
                                    <td>{{ $subject->practical_marks }}</td>
                                   <td>
                                       @foreach($subject->grades as $ss)
                                        {{$ss->class_no}}
                                        @endforeach
                                       </td>
                                    <td><a href="{{action('SubjectController@edit', $subject->id)}}" class="btn btn-warning"><i class="far fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{action('SubjectController@destroy', $subject->id)}}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" onclick="return confirm('Are you Sure?')" type="submit"><i class="far fa-trash-alt"></i></button>
                                        </form>

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection