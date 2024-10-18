<tr>
    <td>{{ $title->id }}</td>
    <td>{{ $title->title_s7 }}</td>
    <td>{{ implode(' | ', $title->toas->pluck('building_name')->toArray()) }}</td>
    <td>{{ is_null($title->displayed_location) ? 'Không xác định' : $title->displayed_location }}</td>
    <td>
        <button class="btn btn-danger btn-delete" data-id="{{ $title->id }}" onclick="deleteConfirmation({{ $title->id }})">
            <i class="fa-solid fa-trash"></i>
        </button>
        <button class="btn btn-warning btn-edit" data-id="{{ $title->id }}">
            <i class="fa-solid fa-pen-to-square"></i>
        </button>
    </td>
</tr>
