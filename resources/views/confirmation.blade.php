<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Confirmation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
{{--                    {{ __("You're logged in!") }}--}}

                    <table class="table-fixed border-collapse border border-slate-400" style="width: 100%;">
                        <caption class="caption-top">
                            Documents for work
                        </caption>
                        <thead>
                        <tr>
                            <th class="border border-slate-300" style="max-width: 50%;">Document</th>
                            <th class="border border-slate-300" style="max-width: 25%;">Download link</th>
                            <th class="border border-slate-300" style="max-width: 15%;">Confirmation data</th>
                            <th class="border border-slate-300" style="max-width: 10%;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($confirmations as $item)
                            <tr>
                                <td class="border border-slate-300">{{ $item->file->screen_name }}</td>
                                <td class="border border-slate-300"><a href="/download/{{ $item->file->id }}">Download file</a></td>
                                <td class="border border-slate-300">{{ $item->confirmed_at }}</td>
                                <td class="border border-slate-300">
                                    @if ($item->confirmed_at == "")
                                        <a href="{{ URL::signedRoute('confirmation', ['id' => $item->id]) }}">
                                            <button type="button" class="bg-red-500 px-2 py-2">Confirm</button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
