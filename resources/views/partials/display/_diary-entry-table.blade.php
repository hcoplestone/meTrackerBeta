<table class="table table-striped table-borderless table-hover table-vcenter mb-20">
    <thead class="thead-light">
    <tr>
        <th>Date</th>
        <th class="d-none d-sm-table-cell">Mood</th>
        <th class="text-center" style="width: 80px;">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($diaryEntries as $entry)
        <tr>
            <td class="font-w600">
                {{ $entry->created_at->format('F j, Y, g:i a') }}
            </td>
            <td class="d-none d-sm-table-cell">
                {{ ucfirst($entry->getHumanMood()) }}
            </td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="{{ $linkPrefix }}/{{ $entry->id }}">
                        <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="View">
                            <i class="fa fa-eye"></i>
                        </button>
                    </a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>