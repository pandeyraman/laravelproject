@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Deerwalk Sifal School Marksheet Generator</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{--<a href="{{route('student.create')}}"><button class="btn btn-primary"> Add Student</button> </a>--}}
                        {{--<a href="{{route('student.index')}}"><button class="btn btn-primary"> View Student</button> </a>--}}
                        {{--<a href="{{route('teacher.create')}}"><button class="btn btn-secondary"> Add Teacher</button> </a>--}}
                        {{--<a href="{{route('teacher.index')}}"><button class="btn btn-secondary"> View Teacher</button> </a>--}}
                        {{--<a href="{{route('subject.create')}}"><button class="btn btn-secondary"> Create Subject</button> </a>--}}
                        {{--<a href="{{route('subject.index')}}"><button class="btn btn-secondary"> View Subject</button> </a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
