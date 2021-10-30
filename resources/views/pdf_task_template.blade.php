
    <div class="container">

        <h2>{{$task->id}}. {{$task->title}}</h2>
        <p>Company description: {!!$task->description!!}</p>
        <p>Task description: {!!$task->taskType->description!!} </p>
    </div>
