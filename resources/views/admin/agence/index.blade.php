<tbody>
    @if(isset($agences) && $agences->count() > 0)
        @foreach ($agences as $agence)
            <tr>
                <td>{{ $agence->name }}</td>
                <td>{{ $agence->email }}</td>
                <td>
                    <a href="{{ URL('admin/agence/edit/' . $agence->id) }}">
                        <button type="button" class="btn btn-secondary">Modifier</button>
                    </a>
                    <a href="{{ url('/admin/agence/delete/' . $agence->id) }}">
                        <button type="button" class="btn btn-danger">Supprimer</button>
                    </a>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="3" class="text-center">Aucune agence trouvée.</td>
        </tr>
    @endif
</tbody>
