@foreach($studentmarks as $studentmark)
    {{$studentmark->marks}}
    {{$studentmark->subjects()->student_name}}
@endforeach