
<style>
    .styled-table {
        border-collapse: collapse;
        margin: 5px 0;
        font-size: 0.9em;
        font-family: dejavu serif;
        font-size: 13px;
        width: 100%;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .styled-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;

    }

    .styled-table th,
    .styled-table td {
        padding: 10px 10px;
        border: 2px solid #000000;
        text-align: left;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }
    </style>

<table class="styled-table">
<thead>
    <tr>
        <th> ID </th>
        <th> Title </th>
        <th>Owner name and surname</th>
        <th> Description </th>
        <th> Type </th>
        <th> Start date </th>
        <th> End date </th>
    </tr>
</thead>

        <tbody>
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
        </tbody>

</table>

</div>
