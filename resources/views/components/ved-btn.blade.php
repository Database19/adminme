@props(['id'])

@php
    $baseRoute = explode('.', Route::current()->getName())[0];
@endphp

<td class="px-4 py-2 text-center">
    <a href="{{ route($baseRoute.'.show', $id) }}" class="btn-ved btn-secondary">View</a>
    <a href="{{ route($baseRoute.'.edit', $id) }}" class="btn-ved btn-info">Edit</a>
    <a href="{{ route($baseRoute.'.destroy', $id) }}" class="btn-ved btn-danger">Delete</a>
</td>
