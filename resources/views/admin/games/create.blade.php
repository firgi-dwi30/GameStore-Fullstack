@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">🎮 Tambah Game Baru</h4>
        </div>

        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong> Periksa kembali inputan kamu:
                    <ul class="mt-2 mb-0">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- TITLE --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Game</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                {{-- DEVELOPER --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Developer</label>
                    <input type="text" name="developer" class="form-control" required>
                </div>

                {{-- DESCRIPTION --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="description" rows="4" class="form-control"></textarea>
                </div>

                {{-- GENRES --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Genre</label><br>
                    @php
                        $genreList = ['Action','Adventure','RPG','MOBA','Sports','Puzzle','Horror','Racing','Strategy','Simulation','Casual', 'Teka-Teki', 'Misterius', 'Modern', 'Kriminal', 'Anime', 'Bertempur', 'Immersive', 'Stategi'];
                    @endphp

                    @foreach($genreList as $g)
                        <label class="me-3">
                            <input type="checkbox" name="genres[]" value="{{ $g }}"> {{ $g }}
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
                            <input type="checkbox" name="modes[]" value="{{ $m }}"> {{ $m }}
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
                            <input type="checkbox" name="platforms[]" value="{{ $p }}"> {{ $p }}
                        </label>
                    @endforeach
                </div>

                {{-- COVER --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Upload Cover</label>
                    <input type="file" name="cover" class="form-control">
                </div>

                <button class="btn btn-primary w-100">+ Tambah Game</button>

            </form>
        </div>
    </div>
</div>
@endsection
