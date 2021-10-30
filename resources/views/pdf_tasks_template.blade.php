<table class="table table-striped">

    <tr>
        <th> ID </th>
        <th> Title </th>
        <th>Owner name and surname</th>
        <th> Description </th>
        <th> Type </th>
        <th> Start date </th>
        <th> End date </th>
    </tr>

    @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->id }} </td>
            <td>{{ $task->title }} </td>
            <td>{{ $task->ownerType->name}} {{ $task->ownerType->surname}}</td>
            <td>{!! $task->description !!} </td>
            <td>{{ $task->taskType->title }}</td>
            <td>{{ $task->start_date }} </td>
            <td>{{ $task->end_date }} </td>
    @endforeach
</table>

</div>
