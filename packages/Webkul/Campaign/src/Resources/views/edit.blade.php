<x-admin::layouts>
    <x-slot:title>
        @lang('campaign::app.campaign.index.title')
        </x-slot>

        <form action="{{route('admin.campaign.update', $campaign->id)}}" method="post">
            @csrf
            <div class="flex flex-col gap-4">
                <div class="flex items-center justify-between rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
                    <div class="flex flex-col gap-2">
                        <div class="flex cursor-pointer items-center">
                            <!-- Bredcrumbs -->
                            <x-admin::breadcrumbs name="campaign.create" />
                        </div>

                        <div class="text-xl font-bold dark:text-white">
                            @lang('campaign::app.campaign.create.title')
                        </div>
                    </div>

                    <div class="flex items-center gap-x-2.5">
                        <!-- Create button for Campaign -->
                        <div class="flex items-center gap-x-2.5">
                            <x-admin::button
                                class="primary-button"
                                :title="trans('campaign::app.campaign.create.save-btn')"
                            />
                        </div>
                    </div>
                </div>



                <div class="w-1/2 rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">

                        @if (session('status') && session('message'))
                            @if (session('status') == 'success')
                                <div class="alert alert-success">
                                    <strong>Success!</strong> {{ session('message') }}
                                </div>
                            @elseif (session('status') == 'error')
                                <div class="alert alert-danger">
                                    <strong>Error!</strong> {{ session('message') }}
                                </div>
                            @endif
                        @endif

                        {{--        name            --}}
                        <x-admin::form.control-group class="!mb-0">
                            <x-admin::form.control-group.label class="required">
                                @lang('campaign::app.campaign.create.name')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="name"
                                rules="required"
                                :label="trans('campaign::app.campaign.create.name')"
                                value="{{$campaign->name}}"
                            />
                            <x-c-error name="name"/>
                        </x-admin::form.control-group>

                        {{--        Description            --}}
                        <x-admin::form.control-group class="!mb-0">
                            <x-admin::form.control-group.label >
                                @lang('campaign::app.campaign.create.description')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="textarea"
                                name="description"
                                :label="trans('campaign::app.campaign.create.description')"
                                value="{{$campaign->description}}"
                            />

                            <x-c-error name="description"/>
                        </x-admin::form.control-group>

                        {{--        type            --}}
                        <x-admin::form.control-group class="!mb-0">
                            <x-admin::form.control-group.label class="required">
                                @lang('campaign::app.campaign.create.type')
                            </x-admin::form.control-group.label>

                            <select name="type" class="custom-select w-full rounded border border-gray-200 px-2.5 py-2 text-sm font-normal text-gray-800 transition-all hover:border-gray-400 focus:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400" id="type">
                                @foreach (\Webkul\Campaign\Enums\CampaignType::toArray() as $key=>$user)
                                    <option <?= ($campaign->type == $user) ? 'selected="selected"' : '' ?> value="{{ $key }}">
                                        @lang('campaign::app.campaign.type.'.$key)
                                    </option>
                                @endforeach
                            </select>

{{--                            <x-admin::form.control-group.control--}}
{{--                                type="select"--}}
{{--                                name="type"--}}
{{--                                id="type"--}}
{{--                            >--}}

{{--                                @foreach (\Webkul\Campaign\Enums\CampaignType::toArray() as $key=>$user)--}}
{{--                                    <option <?= ($campaign->type == $user) ? 'selected="selected"' : '' ?> value="{{ $key }}">--}}
{{--                                        @lang('campaign::app.campaign.type.'.$key)--}}
{{--                                    </option>--}}
{{--                                @endforeach--}}

{{--                            </x-admin::form.control-group.control>--}}

                            <x-c-error name="type"/>
                        </x-admin::form.control-group>


                        {{--        Message            --}}
                        <x-admin::form.control-group class="!mb-0">
                            <x-admin::form.control-group.label class="required">
                                @lang('campaign::app.campaign.create.message')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="textarea"
                                name="message"
                                :label="trans('campaign::app.campaign.create.message')"
                                value="{{$campaign->message}}"
                            />

                            <x-c-error name="message"/>
                        </x-admin::form.control-group>


                        {{--        status            --}}
                        <x-admin::form.control-group class="!mb-0">
                            <x-admin::form.control-group.label class="required">
                                @lang('campaign::app.campaign.create.status')
                            </x-admin::form.control-group.label>

                            <select name="status" class="custom-select w-full rounded border border-gray-200 px-2.5 py-2 text-sm font-normal text-gray-800 transition-all hover:border-gray-400 focus:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400" id="type">
                                @foreach (\Webkul\Campaign\Enums\CampaignStatus::toArray() as $key=>$value)
                                    <option <?= ($campaign->status == $value) ? 'selected' : '' ?> value="{{ $value }}">
                                        @lang('campaign::app.campaign.status.'.$key)
                                    </option>
                                @endforeach
                            </select>

{{--                            <x-admin::form.control-group.control--}}
{{--                                type="select"--}}
{{--                                name="status"--}}
{{--                                id="status"--}}
{{--                                rules="required"--}}
{{--                                :label="trans('campaign::app.campaign.create.status')"--}}
{{--                                :placeholder="trans('campaign::app.campaign.create.status_description')"--}}
{{--                            >--}}

{{--                                @foreach (\Webkul\Campaign\Enums\CampaignStatus::toArray() as $key=>$value)--}}
{{--                                    <option <?= ($campaign->status == $value) ? 'selected' : '' ?> value="{{ $value }}">--}}
{{--                                        @lang('campaign::app.campaign.status.'.$key)--}}
{{--                                    </option>--}}
{{--                                @endforeach--}}

{{--                            </x-admin::form.control-group.control>--}}

{{--                            <x-c-error name="status"/>--}}

                        </x-admin::form.control-group>



                        {{--        start_date            --}}
                        <x-admin::form.control-group class="!mb-0">
                            <x-admin::form.control-group.label class="required">
                                @lang('campaign::app.campaign.create.start_date')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="date"
                                name="start_date"
                                id="start_date"
                                rules="required"
                                :label="trans('campaign::app.campaign.create.start_date')"
                                :placeholder="trans('campaign::app.campaign.create.start_date_description')"
                                value="{{$campaign->start_date}}"
                            > </x-admin::form.control-group.control>

                            <x-c-error name="start_date"/>

                        </x-admin::form.control-group>

                        {{--        end_date            --}}
                        <x-admin::form.control-group class="!mb-0">
                            <x-admin::form.control-group.label class="required">
                                @lang('campaign::app.campaign.create.end_date')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="date"
                                name="end_date"
                                id="end_date"
                                rules="required"
                                :label="trans('campaign::app.campaign.create.end_date')"
                                :placeholder="trans('campaign::app.campaign.create.end_date_description')"
                                value="{{$campaign->end_date}}"
                            > </x-admin::form.control-group.control>

                            <x-c-error name="end_date"/>
                        </x-admin::form.control-group>

                        <input type="hidden" name="package_id" value="1">

                        {{--        budget            --}}
                        <x-admin::form.control-group class="!mb-0">
                            <x-admin::form.control-group.label class="required">
                                @lang('campaign::app.campaign.create.budget')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="number"
                                name="budget"
                                rules="required"
                                :label="trans('campaign::app.campaign.create.budget')"
                                value="{{$campaign->budget}}"
                            />
                            <x-c-error name="name"/>
                        </x-admin::form.control-group>

                </div>
            </div>
        </form>

</x-admin::layouts>
