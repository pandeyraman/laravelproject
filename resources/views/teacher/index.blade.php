@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-header">
                        <div class="text-right"> <a href="{{route('teacher.create')}}" class="btn btn-primary text-right">Add New Teacher</a></div>
                    </div>


                    <div class="table">
                        <table class="table table-bordered table-striped table-hover ">
                            <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Teacher Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Class->Subject</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count = 1; ?>
                            @if(!empty($teachers))
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{ $count++ }}</td>

                                    <td>{{ $teacher->teacher_name }}</td>
                                    <td>{{ $teacher->address }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>{{ $teacher->contact }}</td>
                                    <td>
                                            @foreach($teacher->grades as $aa)
                                                <?php $class = $aa->class_no ?>
                                            @endforeach
                                            @foreach($teacher->subjects as $bb)
                                                    <?php $subject = $bb->subject_name; ?>
                                            @endforeach
                                        {{$class.'->'.$subject}}
                                    </td>
                                    <td><a href="{{action('TeacherController@edit', $teacher->id)}}" class="btn btn-warning">Edit</a></td>
                                    <td>
                                        <form action="{{action('TeacherController@destroy', $teacher->id)}}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" onclick="return confirm('Are you Sure?')" type="submit">Delete</button>
                                        </form>

                                    </td>
                                    {{--<td>--}}
                                        {{--<form action="/edit/teacher/{{$teacher->id}}" method="post">--}}
                                            {{--@csrf--}}
                                            {{--<input type="submit" class="btn btn-primary" value="EDIT">--}}
                                        {{--</form>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<form action="/delete/teacher/{{$teacher->id}}" method="post">--}}
                                            {{--<input type="submit" class="btn btn-danger" value="DELETE">--}}
                                        {{--</form>--}}
                                    {{--</td>--}}
                                </tr>
                            @endforeach
                            @else
                            <tr><td>NO data found</td></tr>
                             @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection