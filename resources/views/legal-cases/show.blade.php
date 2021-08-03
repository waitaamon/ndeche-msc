<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900"> {{ _($legalCase->title) }}</h1>
    </x-slot>

    <div class="bg-white overflow-hidden shadow sm:rounded-lg">
        <div class="p-4 bg-white shadow overflow-hidden sm:rounded-lg">
            @if(auth()->user()->can('investigate legal case') && $legalCase->status == 'new')
                @livewire('investigator-actions', ['legalCase' => $legalCase])
            @endif
            @if(auth()->user()->can('assign judicial officer') && $legalCase->status == 'published to judiciary')
                @livewire('judicial-admin-actions', ['legalCase' => $legalCase])
            @endif
            @if(auth()->user()->can('prosecute legal case') && $legalCase->status == 'assigned to judicial officer')
                @livewire('judicial-officer-actions', ['legalCase' => $legalCase])
            @endif
            @if(auth()->user()->can('publish legal case to public') && $legalCase->status == 'concluded')
                <a href="/publish-to-public/{{ $legalCase->id }}" class="text-red-500 hover:text-red-600">Publish to
                    public</a>
            @endif
            @if(auth()->user()->can('publish legal case to public') && $legalCase->status == 'published to public')
                <a href="/unpublish-to-public/{{ $legalCase->id }}" class="text-red-500 hover:text-red-600">Un Publish</a>
            @endif
        </div>
    </div>

    <div class="py-12">
        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ $legalCase->institution->name }} Legal Case
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Legal case details and actions.
                    </p>
                </div>
                <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Institution Name
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $legalCase->institution->name }}
                            </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Title
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $legalCase->title }}
                            </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Created By
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $legalCase->user->name }}
                            </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Investigator
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $legalCase->investigator->name }}
                            </dd>
                        </div>
                        @if($legalCase->judicialOfficer()->exists())
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Judicial Officer
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $legalCase->judicialOfficer->name }}
                                </dd>
                            </div>
                        @endif
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Case Status
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $legalCase->status }}
                            </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Case description
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $legalCase->description }}
                            </dd>
                        </div>
                        @if($legalCase->investigator_remarks)
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Case investigator remarks
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $legalCase->investigator_remarks }}
                                </dd>
                            </div>
                        @endif
                        @if($legalCase->judicial_officer_remarks)
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Case judicial officer remarks
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $legalCase->judicial_officer_remarks }}
                                </dd>
                            </div>
                        @endif
                        @if($legalCase->judge_remarks)
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Case judge remarks
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $legalCase->judge_remarks }}
                                </dd>
                            </div>
                        @endif
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
            <div class="p-4 bg-white shadow overflow-hidden sm:rounded-lg">
                <h4>Associated System Logs</h4>

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Received At
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Device Reported Time
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Host IP
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tag
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Message
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                    @foreach($systemEvents as $sysEvents)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $sysEvents->ReceivedAt }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $sysEvents->DeviceReportedTime }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $sysEvents->FromHost }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $sysEvents->SysLogTag }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 ">
                                <p class="break-all">{{ $sysEvents->Message }}</p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="py-4">
                    {{ $systemEvents->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
