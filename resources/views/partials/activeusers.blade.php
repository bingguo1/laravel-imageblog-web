<table class="table table-sm table-hover">
    <thead class="thead">
    <tr>
        <th>User Name</th>
        <th>Posts Submitted</th>
    </tr>
    </thead>
    <tbody>
    @foreach($activeusers as $activeuser)
        <tr>
            <td>{{ $activeuser->name }}</td>
            <td>{{ $activeuser->submitted_posts }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
