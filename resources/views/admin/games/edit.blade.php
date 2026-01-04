@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-warning">
            <h4 class="mb-0">✏️ Edit Game</h4>
        </div>

        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- TITLE --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Game</label>
                    <input type="text" name="title" class="form-control" value="{{ $game->title }}">
                </div>

                {{-- DEVELOPER --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Developer</label>
                    <input type="text" name="developer" class="form-control" value="{{ $game->developer }}">
                </div>

                {{-- DESCRIPTION --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="description" rows="4" class="form-control">{{ $game->description }}</textarea>
                </div>

                {{-- GENRES --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Genre</label><br>
                    @php
                        $genreList = ['Action','Adventure','RPG','MOBA','Sports','Puzzle','Horror','Racing','Strategy','Simulation','Casual', 'Teka-Teki', 'Misterius', 'Modern', 'Kriminal', 'Anime', 'Bertempur', 'Immersive', 'Stategi'];
                    @endphp
                    @foreach($genreList as $g)
                        <label class="me-3">
                            <input type="checkbox" name="genres[]" value="{{ $g }}"
                                {{ in_array($g, $game->genres ?? []) ? 'checked' : '' }}>
                            {{ $g }}
                        </label>
                    @endforeach
                </div>

                {{-- MODES --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Mode</label><br>
                    @php
                        $modeList = ['Singleplayer','Multiplayer','Online','Offline','Co-op'];
                    @endphp
                    @foreach($modeList as $m)
                        <label class="me-3">
                            <input type="checkbox" name="modes[]" value="{{ $m }}"
                                {{ in_array($m, $game->modes ?? []) ? 'checked' : '' }}>
                            {{ $m }}
                        </label>
                    @endforeach
                </div>

                {{-- PLATFORMS --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Platform</label><br>
                    @php
                        $platformList = ['Android','iOS','Windows','Mac','PlayStation','Xbox','Nintendo'];
                    @endphp
                    @foreach($platformList as $p)
                        <label class="me-3">
                            <input type="checkbox" name="platforms[]" value="{{ $p }}"
                                {{ in_array($p, $game->platforms ?? []) ? 'checked' : '' }}>
                            {{ $p }}
                        </label>
                    @endforeach
                </div>

                {{-- COVER --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Cover Sekarang</label><br>
                    @if($game->cover)
                        <img src="{{ asset('storage/'.$game->cover) }}" width="120" class="rounded mb-2">
                    @else
                        <p class="text-muted">Tidak ada cover</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Ganti Cover (Opsional)</label>
                    <input type="file" name="cover" class="form-control">
                </div>

                <button class="btn btn-warning w-100">Update Game</button>

            </form>
        </div>
    </div>
</div>
@endsection
