@extends('layouts.app')

@section('title', 'Pilih Poli')
@section('page_title', 'Pilih Poli')

@section('content')
<div class="container mt-4">
    <h2>Pilih Poli untuk Konsultasi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('lanjut.jadwal') }}" method="GET">
        <div class="mb-3">
            <label for="poli_id" class="form-label">Poli</label>
            <select name="poli_id" id="poli_id" class="form-select" required>
                <option value="">-- Pilih Poli --</option>
                @foreach ($polis as $poli)
                    <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Lanjut</button>
    </form>
</div>
@endsection
