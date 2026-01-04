@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">🎮 Game List</h2>
        <a href="{{ route('games.create') }}" class="btn btn-primary">
            + Tambah Game
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Developer</th>
                        <th style="width: 160px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($games as $g)
                    <tr>
                        <td>
                            @if($g->cover)
                                <img src="{{ asset('covers/' . basename($g->cover)) }}" width="70" class="rounded">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $g->title }}</td>
                        <td>{{ $g->developer }}</td>
                        <td>
                            <a href="{{ route('games.edit', $g->id) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('games.destroy', $g->id) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus?')" 
                                        class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
