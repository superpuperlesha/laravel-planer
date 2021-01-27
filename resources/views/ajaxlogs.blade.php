<div class="container">
    <div class="row">
        <table class="table table-hover text-nowrap table-bordered">
            <tr>
                <th class="text-left bg-secondary text-white">Date</th>
                <th class="text-left bg-secondary text-white">Title</th>
                <th class="text-left bg-secondary text-white">Content</th>
            </tr>
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $log->created_at }}</td>
                    <td>{!! $log->log_title !!}</td>
                    <td>{!! $log->log_content !!}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
