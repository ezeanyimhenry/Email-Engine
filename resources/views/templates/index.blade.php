<a href="{{ route('templates.create') }}">Create</a>
<br>
<table>
    <thead>
        <th>Title</th>
        <th>Content</th>
    </thead>
    <tbody>
        @foreach ($templates as $template)
            <tr>
                <td>{{ $template['title'] }}</td>
                <td>{{ $template['content'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>