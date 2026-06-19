@extends('layouts.user')

@section('title', 'Riwayat Bacaan')

@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0">
                <h6>Riwayat Bacaan Saya</h6>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    No
                                </th>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Buku
                                </th>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Tanggal Dibaca
                                </th>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($histories as $history)
                                <tr>
                                    <td>
                                        <div class="px-3">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="px-3">
                                            <h6 class="mb-0 text-sm">
                                                {{ $history->book->title }}
                                            </h6>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="px-3">
                                            {{ \Carbon\Carbon::parse($history->viewed_at)->format('d M Y H:i') }}
                                        </div>
                                    </td>

                                    <td>
                                        <a href="{{ route('catalog.show', $history->book) }}"
                                            class="btn btn-sm bg-gradient-info mb-0">
                                            Detail
                                        </a>
                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="4" class="text-center py-4">
                                        Belum ada riwayat bacaan
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection




{{-- <x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Riwayat Bacaan
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border p-2">No</th>
                            <th class="border p-2">Judul Buku</th>
                            <th class="border p-2">Tanggal Dibaca</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($histories as $history)
                            <tr>
                                <td class="border p-2">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="border p-2">
                                    {{ $history->book->title }}
                                </td>

                                <td class="border p-2">
                                    {{ $history->viewed_at }}
                                </td>

                                <td class="border p-2">
                                    <a href="{{ route('catalog.show', $history->book) }}"
                                        class="bg-blue-500 text-white px-3 py-1 rounded">
                                        Detail
                                    </a>
                                </td>

                            </tr>
                        @empty

                            <tr>
                                <td colspan="4" class="border p-2 text-center">
                                    Belum ada riwayat bacaan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout> --}}
