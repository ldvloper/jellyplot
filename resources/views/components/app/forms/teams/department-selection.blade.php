<div>
    @foreach($departments as $department)
            <option value="{{ $department->id }}">{{$department->name_show}}</option>
    @endforeach
</div>
