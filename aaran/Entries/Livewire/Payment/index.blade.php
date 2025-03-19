<div>
    <x-slot name="header">{{$mode_name}}</x-slot>

    <x-aaran-ui::forms.m-panel>
        <x-aaran-ui::alerts.notification />

        <!-- Top Controls  -------------------------------------------------------------------------------------------->

        <x-aaran-ui::forms.top-controls :show-filters="$showFilters"/>

        <div class="flex w-full">
            <x-aaran-ui::table.caption :caption="$mode_name">
                {{$list->count()}}
            </x-aaran-ui::table.caption>
            <div class="flex justify-end w-full">
                <x-aaran-ui::button.print-x href="{{ route('transactions.print',[$mode_id == 111 ? 1 : 2 ]) }}"/>
            </div>
        </div>

        <x-aaran-ui::table.form>

            <!-- Table Header  ---------------------------------------------------------------------------------------->

            <x-slot:table_header name="table_header" class="bg-green-100">

                <x-aaran-ui::table.header-serial></x-aaran-ui::table.header-serial>

{{--                <x-table.header-text wire:click.prevent="sortBy ('contact_id')" sort-icon="{{$getListForm->sortAsc}}">--}}
{{--                    VCH NO--}}
{{--                </x-table.header-text>--}}

                <x-aaran-ui::table.header-text wire:click.prevent="sortBy ('contact_id')" sort-icon="{{$getListForm->sortAsc}}">
                    Contact
                </x-aaran-ui::table.header-text>

{{--                <x-table.header-text wire:click.prevent="sortBy('contact_id')"--}}
{{--                                     sort-icon="none">Type--}}
{{--                </x-table.header-text>--}}

                {{--                <x-table.header-text sort-icon="none">Mode of Payments</x-table.header-text>--}}

                {{--                <x-table.header-text sort-icon="none">A/c Name</x-table.header-text>--}}

                {{--                <x-table.header-text sort-icon="none">Trans Type</x-table.header-text>--}}

                <x-aaran-ui::table.header-text sort-icon="none">Opening Bal</x-aaran-ui::table.header-text>

                <x-aaran-ui::table.header-text sort-icon="none">Amount</x-aaran-ui::table.header-text>

                <x-aaran-ui::table.header-action/>

            </x-slot:table_header>

            <!-- Table Body  ------------------------------------------------------------------------------------------>

            <x-slot:table_body name="table_body">

                @foreach($list as $index=>$row)

                    <x-aaran-ui::table.row>

                        <x-aaran-ui::table.cell-text>{{$index+1}}</x-aaran-ui::table.cell-text>

{{--                        <x-table.cell-text>{{$row->vch_no+0}}</x-table.cell-text>--}}

                        <x-aaran-ui::table.cell-text left>{{$row->contact->vname . ' - ' . $row->receiptType->vname}}</x-aaran-ui::table.cell-text>

{{--                        <x-table.cell-text>{{\Aaran\Transaction\Models\Transaction::common($row->receipttype_id)}}</x-table.cell-text>--}}

                        {{--                        <x-table.cell-text>{{Aaran\Common\Models\Common::find($row->trans_type_id)->vname}}</x-table.cell-text>--}}

                        {{--                        <x-table.cell-text left>{{$row->accountBook->vname}}</x-table.cell-text>--}}

                        {{--                        <x-table.cell-text left>{{$row->transType->vname}}</x-table.cell-text>--}}

{{--                        <x-table.cell-text >{{$row->transType->vname . ' ' . $row->opening_bal  }} </x-table.cell-text>--}}

                        <x-aaran-ui::table.cell-text >{{$row->opening_bal}} </x-aaran-ui::table.cell-text>

                        <x-aaran-ui::table.cell-text right>{{$row->vname+0}}</x-aaran-ui::table.cell-text>

                        <x-aaran-ui::table.cell-action id="{{$row->id}}"/>

                    </x-aaran-ui::table.row>
                @endforeach

            </x-slot:table_body>

        </x-aaran-ui::table.form>

        <x-aaran-ui::modal.delete/>

        <!-- Create  -------------------------------------------------------------------------------------------------->

        <x-aaran-ui::forms.create :id="$common->vid" :max-width="'6xl'" wire:click="contactUpdate">

            <!-- Receipt & Payment  ----------------------------------------------------------------------------------->

            <div class="flex gap-x-5 gap-y-3">

                <!-- Left Area  --------------------------------------------------------------------------------------->

                <div class="w-1/2 space-y-3">

                    <!-- Party Name ----------------------------------------------------------------------------------->

{{--                                        <x-aaran-ui::input.model-select wire:model.live="trans_type_id">--}}
{{--                                            <option value="Select" selected>Choose</option>--}}
{{--                                            <option value="108">Cash Type</option>--}}
{{--                                            <option value="109">Bank Type</option>--}}
{{--                                            <option value="136">UPI</option>--}}
{{--                                        </x-aaran-ui::input.model-select>--}}


{{--                                        <x-aaran-ui::input.model-select wire:model.live="account_book_id">--}}
{{--                                            <option value="" selected>Choose</option>--}}
{{--                                            @foreach($account_books as $account_book)--}}
{{--                                                <option value="{{ $account_book->id }}">--}}
{{--                                                    {{ $account_book->vname. ' (ACC-No: - '.$account_book->account_no . ')'}}--}}
{{--                                                </option>--}}
{{--                                            @endforeach--}}
{{--                                        </x-aaran-ui::input.model-select>--}}

                    <x-aaran-ui::input.model-select wire:model.live="account_book_id">
                        <option value="" selected>Choose</option>
                        @foreach($account_books as $account_book)
                            <option value="{{ $account_book->id }}">
                                {{ $account_book->vname . ' (ACC-No: ' . $account_book->account_no . ')' }}
                            </option>
                        @endforeach
                    </x-aaran-ui::input.model-select>

                    @if($opening_bal)
                        <div>
                            <strong>Opening Balance:</strong> {{ $opening_bal}}
                        </div>
                    @endif

                    @if($trans_type_id)
                        <div>
                            <strong>Transaction Type ID:</strong> {{ $trans_type_id }}
                        </div>
                    @endif

                    <x-aaran-ui::dropdown.wrapper label="Contact Name" type="contactTyped">
                        <div class="relative ">

                            <x-aaran-ui::dropdown.input label="Contact Name*" id="contact_name"
                                              wire:model.live="contact_name"
                                              wire:keydown.arrow-up="decrementContact"
                                              wire:keydown.arrow-down="incrementContact"
                                              wire:keydown.enter="enterContact"/>
                            @error('contact_id')
                            <span class="text-red-500">{{'The Party Name is Required.'}}</span>
                            @enderror
                            <x-aaran-ui::dropdown.select>

                                @if($contactCollection)
                                    @forelse ($contactCollection as $i => $contact)
                                        <x-aaran-ui::dropdown.option highlight="{{ $highlightContact === $i }}"
                                                           wire:click.prevent="setContact('{{$contact->vname}}','{{$contact->id}}')">
                                            {{ $contact->vname }}
                                        </x-aaran-ui::dropdown.option>
                                    @empty
                                        <x-aaran-ui::dropdown.new href="{{route('contacts.upsert',['0'])}}" label="Contact"/>
                                    @endforelse
                                @endif
                            </x-aaran-ui::dropdown.select>

                        </div>
                    </x-aaran-ui::dropdown.wrapper>

                    <x-aaran-ui::input.floating wire:model="common.vname" :label="'Amount*'"/>

                    <x-aaran-ui::input.model-date wire:model="vdate" :label="'Date'"/>

                </div>

                <!-- Right Area  -------------------------------------------------------------------------------------->

                <div class="w-1/2 space-y-3">

                    <x-aaran-ui::tabs.tab-panel>

                        <x-slot name="tabs">
                            <x-aaran-ui::tabs.tab>Instrument</x-aaran-ui::tabs.tab>
                            <x-aaran-ui::tabs.tab>Against</x-aaran-ui::tabs.tab>
                            <x-aaran-ui::tabs.tab>Purpose</x-aaran-ui::tabs.tab>
                            <x-aaran-ui::tabs.tab>Admin</x-aaran-ui::tabs.tab>
                        </x-slot>

                        <x-slot name="content">

                            <!-- Tab 1  ------------------------------------------------------------------------------->

                            <x-aaran-ui::tabs.content>

                                <div class="flex flex-col gap-3">

                                    <!-- receipt type ----------------------------------------------------------------->

                                    @if($trans_type_id == 109)

                                        <x-aaran-ui::dropdown.wrapper label="Type" type="receipt_typeTyped">

                                            <div class="relative ">

                                                <x-aaran-ui::dropdown.input label="Type" id="receipt_type_name"
                                                                  wire:model.live="receipt_type_name"
                                                                  wire:keydown.arrow-up="decrementReceiptType"
                                                                  wire:keydown.arrow-down="incrementReceiptType"
                                                                  wire:keydown.enter="enterReceiptType"/>

                                                <x-aaran-ui::dropdown.select>
                                                    @if($receipt_typeCollection)
                                                        @forelse ($receipt_typeCollection as $i => $receipt_type)
                                                            <x-aaran-ui::dropdown.option
                                                                highlight="{{$highlightReceiptType === $i  }}"
                                                                wire:click.prevent="setReceiptType('{{$receipt_type->vname}}','{{$receipt_type->id}}')">
                                                                {{ $receipt_type->vname }}
                                                            </x-aaran-ui::dropdown.option>
                                                        @empty
                                                            <x-aaran-ui::dropdown.new
                                                                wire:click.prevent="receiptTypeSave('{{$receipt_type_name}}')"
                                                                label="Receipt"/>
                                                        @endforelse
                                                    @endif
                                                </x-aaran-ui::dropdown.select>

                                            </div>

                                        </x-aaran-ui::dropdown.wrapper>
                                    @endif

                                    <!-- bank ------------------------------------------------------------------------->

                                    @if($trans_type_id == 109)

                                        <x-aaran-ui::dropdown.wrapper label="Instrument Bank" type="instrumentBankTyped">
                                            <div class="relative">
                                                <x-aaran-ui::dropdown.input
                                                    label="Instrument Bank"
                                                    id="instrument_bank_name"
                                                    wire:model.live="instrument_bank_name"
                                                    wire:keydown.arrow-up="decrementInstrumentBank"
                                                    wire:keydown.arrow-down="incrementInstrumentBank"
                                                    wire:keydown.enter="enterInstrumentBank"
                                                />

                                                <x-aaran-ui::dropdown.select>
                                                    @if($instrumentBankCollection)
                                                        @forelse ($instrumentBankCollection as $i => $instrumentBank)
                                                            <x-aaran-ui::dropdown.option
                                                                highlight="{{ $highlightInstrumentBank === $i }}"
                                                                wire:click.prevent="setInstrumentBank('{{ $instrumentBank->vname }}', '{{ $instrumentBank->id }}')">
                                                                {{ $instrumentBank->vname }}
                                                            </x-aaran-ui::dropdown.option>
                                                        @empty
                                                            <x-aaran-ui::dropdown.new
                                                                wire:click.prevent="instrumentBankSave('{{ $instrument_bank_name }}')"
                                                                label="Instrument Bank Details"/>
                                                        @endforelse
                                                    @endif
                                                </x-aaran-ui::dropdown.select>
                                            </div>
                                        </x-aaran-ui::dropdown.wrapper>

                                        <x-aaran-ui::input.model-date :label="'Chq.Date'"/>
                                        <x-aaran-ui::input.floating wire:model="chq_no" :label="'Chq_no'"/>
                                        <x-aaran-ui::input.model-date wire:model="deposit_on" :label="'Deposit On'"/>
                                        <x-aaran-ui::input.model-date wire:model="realised_on" :label="'Realised On'"/>
                                    @endif

                                    <x-aaran-ui::input.floating wire:model="remarks" :label="'Remarks'"/>

                                </div>

                            </x-aaran-ui::tabs.content>

                            <!-- Tab 2  ------------------------------------------------------------------------------->

                            <x-aaran-ui::tabs.content>

                                <div class="flex flex-col gap-3">

                                    <!-- Order No --------------------------------------------------------------------->

                                    <x-aaran-ui::dropdown.wrapper label="Order NO" type="orderTyped">

                                        <div class="relative">
                                            <x-aaran-ui::dropdown.input label="Order NO" id="order_name"
                                                                        wire:model.live="order_name"
                                                                        wire:keydown.arrow-up="decrementOrder"
                                                                        wire:keydown.arrow-down="incrementOrder"
                                                                        wire:keydown.enter="enterOrder"/>

                                            @error('order_id')
                                            <span class="text-red-500">{{'The Order is Required.'}}</span>
                                            @enderror
                                            <x-aaran-ui::dropdown.select>
                                                @if($orderCollection)

                                                    @forelse ($orderCollection as $i => $order)

                                                        <x-aaran-ui::dropdown.option highlight="{{$highlightOrder === $i  }}"
                                                                           wire:click.prevent="setOrder('{{$order->vname}}','{{$order->id}}')">
                                                            {{ $order->vname }}
                                                        </x-aaran-ui::dropdown.option>
                                                    @empty
                                                        @livewire('aaran.master.order.lookup.order-model',[$order_name])
                                                    @endforelse
                                                @endif
                                            </x-aaran-ui::dropdown.select>
                                        </div>

                                    </x-aaran-ui::dropdown.wrapper>

                                    <x-aaran-ui::input.floating wire:model="ref_no" :label="'Against'"/>

                                    <x-aaran-ui::input.floating wire:model="ref_amount" :label="'Ref Amount'"/>

                                </div>

                            </x-aaran-ui::tabs.content>

                            <!-- Tab 3  ------------------------------------------------------------------------------->

                            <x-aaran-ui::tabs.content>

                                <div class="flex flex-col gap-3">

                                    <x-aaran-ui::input.floating wire:model="paid_to" :label="'Paid To'"/>

                                    <x-aaran-ui::input.floating wire:model="purpose" :label="'Purpose'"/>

                                </div>

                            </x-aaran-ui::tabs.content>

                            <!-- Tab 4  ------------------------------------------------------------------------------->

                            <x-aaran-ui::tabs.content>
                                <div class="flex flex-col gap-3">
                                    <x-aaran-ui::input.floating wire:model="verified_by" :label="'Verified_by'"/>
                                    <x-aaran-ui::input.model-date wire:model="verified_on" :label="'Verified_On'"/>
                                </div>
                            </x-aaran-ui::tabs.content>

                        </x-slot>
                    </x-aaran-ui::tabs.tab-panel>

                </div>
            </div>
        </x-aaran-ui::forms.create>
    </x-aaran-ui::forms.m-panel>

    <!-- Actions ------------------------------------------------------------------------------------------->
{{--    <div class="max-w-xl mx-auto  py-16 space-y-4">--}}
{{--        @if(!$log->isEmpty())--}}
{{--            <div class="text-xs text-orange-600 px-7 font-merri underline underline-offset-4">Activity</div>--}}
{{--        @endif--}}
{{--        @foreach($log as $row)--}}
{{--            <div class="relative ">--}}
{{--                <div class=" border-l-[3px] border-dotted px-8 text-[10px]  tracking-wider py-3">--}}
{{--                    <div class="flex gap-x-5 ">--}}
{{--                        <div class="inline-flex text-gray-500 items-center font-sans font-semibold">--}}
{{--                            <span>Vehicle No:</span> <span>{{$row->vname}}</span></div>--}}
{{--                        <div class="inline-flex  items-center space-x-1 font-merri"><span--}}
{{--                                class="text-blue-600">@</span><span class="text-gray-500">{{$row->user->name}}</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div--}}
{{--                        class="text-gray-400 text-[8px] font-semibold">{{date('M d, Y', strtotime($row->created_at))}}</div>--}}
{{--                    <div class="pb-2 font-lex leading-5 py-2 text-justify">{!! $row->description !!}</div>--}}
{{--                </div>--}}
{{--                <div class="absolute top-0 -left-1 h-2.5 w-2.5  rounded-full bg-teal-600 "></div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
</div>
