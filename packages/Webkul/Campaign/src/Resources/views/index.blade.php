<x-admin::layouts>
    <x-slot:title>
        @lang('campaign::app.campaign.index.title')
        </x-slot>

        <v-qoute>
            <div class="flex flex-col gap-4">
                <div class="flex items-center justify-between rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
                    <div class="flex flex-col gap-2">
                        <div class="flex cursor-pointer items-center">
                            <!-- Bredcrumbs -->
                            <x-admin::breadcrumbs name="campaign" />
                        </div>

                        <div class="text-xl font-bold dark:text-white">
                            @lang('campaign::app.campaign.index.title')
                        </div>
                    </div>

                    <div class="flex items-center gap-x-2.5">
                        <!-- Create button for Campaign -->
                        <div class="flex items-center gap-x-2.5">
{{--                            @if (bouncer()->hasPermission('quotes.create'))--}}
                                <a
                                    href="{{ route('admin.campaign.create') }}"
                                    class="primary-button"
                                >
                                    @lang('campaign::app.campaign.index.create-btn')
                                </a>
{{--                            @endif--}}
                        </div>
                    </div>
                </div>


                <!-- DataGrid Shimmer -->
                <x-admin::datagrid :src="route('admin.campaign.index')">
                    <!-- DataGrid Shimmer -->
                    <x-admin::shimmer.datagrid />
                </x-admin::datagrid>
            </div>
        </v-qoute>
</x-admin::layouts>
