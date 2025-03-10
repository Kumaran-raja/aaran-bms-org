<div>
    <x-slot name="header">Dashboard</x-slot>

    <div class="flex flex-col gap-10 p-2 tracking-wider">

        <!-- row 1 ---------------------------------------------------------------------------------------------------->
        <div class=" bg-[#F8F8FF] gap-10 flex sm:flex-row flex-col tracking-wider rounded-lg">

            <x-aaran-ui::web.dashboard.greetings/>

{{--            @if (\Aaran\Assets\Features\Customise::hasExportSales())--}}
{{--                <div--}}
{{--                    class="sm:w-4/12 w-auto h-auto bg-white p-5 rounded-lg border-t-2 border-[#23B7E5] hover:shadow-md">--}}

{{--                    <div class="flex justify-between">--}}
{{--                        <div class="space-y-2">--}}
{{--                            <div class="flex-col gap-1 font-semibold">--}}
{{--                                <div class="text-md ">Sales</div>--}}
{{--                                <div class="text-2xl text-[#23B7E5]">--}}
{{--                                    {{ $transactions['total_sales'] }}--}}
{{--                                    234--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="flex flex-col gap-1 font-semibold">--}}
{{--                                <span class="text-xs text-gray-500 ">this month</span>--}}
{{--                                <span class="text-[#23B7E5] text-sm ">--}}
{{--                                    {{ $transactions['month_sales'] }}--}}
{{--                                    345--}}
{{--                                </span>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="w-16 h-16 mt-1 mr-5">--}}
{{--                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"--}}
{{--                                 xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"--}}
{{--                                 class="">--}}
{{--                                <circle style="fill:#23B7E5;" cx="256" cy="256" r="256"/>--}}
{{--                                <path style="fill:#1EA8A4;"--}}
{{--                                      d="M258.008,511.974c125.381-0.965,229.297-92.051,250.165-211.687l-184.52-184.518l-12.812-0.228--}}
{{--                                l-48.042,2.234l24.35,24.35L198.42,202.44l-63.371,49.138l108.785,108.785l-102.472,34.964L258.008,511.974z"/>--}}
{{--                                <polygon style="fill:#FFC61B;"--}}
{{--                                         points="289.618,197.653 289.618,247.072 215.49,247.072 215.49,296.489 141.362,296.489--}}
{{--                                141.362,395.328 215.49,395.328 289.618,395.328 363.746,395.328 363.746,197.653 "/>--}}
{{--                                <rect x="141.36" y="296.495" style="fill:#F9B54C;" width="74.128" height="98.832"/>--}}
{{--                                <rect x="178.717" y="296.495" style="fill:#F4A200;" width="36.776" height="98.832"/>--}}
{{--                                <rect x="215.488" y="247.07" style="fill:#DD9007;" width="74.128" height="148.256"/>--}}
{{--                                <rect x="253.707" y="247.07" style="fill:#D18600;" width="35.914" height="148.256"/>--}}
{{--                                <rect x="289.616" y="197.646" style="fill:#F9B54C;" width="74.128" height="197.68"/>--}}
{{--                                <rect x="327.404" y="197.646" style="fill:#F4A200;" width="36.34" height="197.68"/>--}}
{{--                                <path style="fill:#324A5E;" d="M319.104,113.295l-48.809-7.73c-4.222-0.681-8.206,2.215-8.875,6.447--}}
{{--                                c-0.669,4.232,2.217,8.206,6.447,8.875l30.127,4.772l-161.14,115.098c-3.486,2.491-4.294,7.335-1.805,10.821--}}
{{--                                c1.515,2.12,3.899,3.25,6.32,3.25c1.56,0,3.136-0.469,4.501-1.445l161.458-115.326l-4.83,30.494--}}
{{--                                c-0.671,4.232,2.217,8.206,6.447,8.875c0.41,0.066,0.821,0.098,1.224,0.098c3.75,0,7.047-2.725,7.651-6.546l7.73-48.809--}}
{{--                                C326.222,117.938,323.334,113.964,319.104,113.295z"/>--}}
{{--                                <path style="fill:#2B3B4E;" d="M134.835,251.208c0.078,0.122,0.128,0.253,0.212,0.371c1.515,2.12,3.899,3.25,6.32,3.25--}}
{{--                                c1.56,0,3.136-0.469,4.501-1.445l161.458-115.326l-4.83,30.494c-0.671,4.232,2.217,8.206,6.447,8.875--}}
{{--                                c0.41,0.066,0.821,0.098,1.224,0.098c3.75,0,7.047-2.725,7.651-6.546l7.73-48.809c0.334-2.108-0.217-4.151-1.374-5.754--}}
{{--                                L134.835,251.208z"/>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @if(session()->get('company_id') !== null)--}}
{{--                        <livewire:web.dashboard.sales-chart/>--}}
{{--                    @endif--}}
{{--                    --}}{{--                    <div class="pt-5">--}}
{{--                    --}}{{--                        <div>--}}
{{--                    --}}{{--                            @if ($monthlyTotals->isEmpty())--}}
{{--                    --}}{{--                                <p>No sales data available for this company.</p>--}}
{{--                    --}}{{--                            @else--}}
{{--                    --}}{{--                                <canvas id="myChart" style="width:100%; max-width:600px;"></canvas>--}}
{{--                    --}}{{--                                <script>--}}
{{--                    --}}{{--                                    document.addEventListener('DOMContentLoaded', function () {--}}
{{--                    --}}{{--                                        // Get month and total values--}}
{{--                    --}}{{--                                        var xValues = @json($monthlyTotals->pluck('month')); // Month numbers--}}
{{--                    --}}{{--                                        var yValues = @json($monthlyTotals->pluck('total')); // Corresponding sales totals--}}

{{--                    --}}{{--                                        // Reorder months to start from April and end in March--}}
{{--                    --}}{{--                                        const reorderedMonths = [];--}}
{{--                    --}}{{--                                        const reorderedValues = [];--}}

{{--                    --}}{{--                                        // Create an array to map month numbers to their corresponding index--}}
{{--                    --}}{{--                                        const monthMap = {--}}
{{--                    --}}{{--                                            1: 9, // January -> 10--}}
{{--                    --}}{{--                                            2: 10, // February -> 11--}}
{{--                    --}}{{--                                            3: 11, // March -> 12--}}
{{--                    --}}{{--                                            4: 0,  // April -> 0--}}
{{--                    --}}{{--                                            5: 1,  // May -> 1--}}
{{--                    --}}{{--                                            6: 2,  // June -> 2--}}
{{--                    --}}{{--                                            7: 3,  // July -> 3--}}
{{--                    --}}{{--                                            8: 4,  // August -> 4--}}
{{--                    --}}{{--                                            9: 5,  // September -> 5--}}
{{--                    --}}{{--                                            10: 6, // October -> 6--}}
{{--                    --}}{{--                                            11: 7, // November -> 7--}}
{{--                    --}}{{--                                            12: 8, // December -> 8--}}
{{--                    --}}{{--                                        };--}}

{{--                    --}}{{--                                        for (let i = 1; i <= 12; i++) {--}}
{{--                    --}}{{--                                            const monthIndex = monthMap[i];--}}
{{--                    --}}{{--                                            if (xValues.includes(i)) {--}}
{{--                    --}}{{--                                                reorderedMonths[monthIndex] = monthNames[i - 1]; // Set month name at correct index--}}
{{--                    --}}{{--                                                reorderedValues[monthIndex] = yValues[xValues.indexOf(i)]; // Set total at correct index--}}
{{--                    --}}{{--                                            } else {--}}
{{--                    --}}{{--                                                reorderedMonths[monthIndex] = monthNames[i - 1]; // Fill with month names even if no data exists--}}
{{--                    --}}{{--                                                reorderedValues[monthIndex] = null; // No data for this month--}}
{{--                    --}}{{--                                            }--}}
{{--                    --}}{{--                                        }--}}

{{--                    --}}{{--                                        var barColors = Array(reorderedMonths.length).fill("#23B7E5"); // Set color for each bar--}}

{{--                    --}}{{--                                        new Chart("myChart", {--}}
{{--                    --}}{{--                                            type: "bar",--}}
{{--                    --}}{{--                                            data: {--}}
{{--                    --}}{{--                                                labels: reorderedMonths,--}}
{{--                    --}}{{--                                                datasets: [{--}}
{{--                    --}}{{--                                                    data: reorderedValues,--}}
{{--                    --}}{{--                                                    backgroundColor: barColors,--}}
{{--                    --}}{{--                                                }]--}}
{{--                    --}}{{--                                            },--}}
{{--                    --}}{{--                                            options: {--}}
{{--                    --}}{{--                                                legend: {--}}
{{--                    --}}{{--                                                    display: false--}}
{{--                    --}}{{--                                                },--}}
{{--                    --}}{{--                                                scales: {--}}
{{--                    --}}{{--                                                    yAxes: [{--}}
{{--                    --}}{{--                                                        ticks: {--}}
{{--                    --}}{{--                                                            beginAtZero: true--}}
{{--                    --}}{{--                                                        }--}}
{{--                    --}}{{--                                                    }]--}}
{{--                    --}}{{--                                                }--}}
{{--                    --}}{{--                                            }--}}
{{--                    --}}{{--                                        });--}}
{{--                    --}}{{--                                    });--}}

{{--                    --}}{{--                                    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];--}}
{{--                    --}}{{--                                </script>--}}

{{--                    --}}{{--                                <script>--}}
{{--                    --}}{{--                                    document.addEventListener('DOMContentLoaded', function () {--}}
{{--                    --}}{{--                                        var xValues = @json($monthlyTotals->pluck('month')); // Corrected--}}
{{--                    --}}{{--                                        var yValues = @json($monthlyTotals->pluck('total')); // Corrected--}}

{{--                    --}}{{--                                        var barColors = Array(xValues.length).fill("#23B7E5"); // Set color for each bar--}}
{{--                    --}}{{--                                        new Chart("myChart", {--}}
{{--                    --}}{{--                                            type: "bar",--}}
{{--                    --}}{{--                                            data: {--}}
{{--                    --}}{{--                                                labels: xValues.map(month => monthNames[month - 1]), // Convert month numbers to names--}}
{{--                    --}}{{--                                                datasets: [{--}}
{{--                    --}}{{--                                                    data: yValues,--}}
{{--                    --}}{{--                                                    backgroundColor: barColors,--}}
{{--                    --}}{{--                                                }]--}}
{{--                    --}}{{--                                            },--}}
{{--                    --}}{{--                                            options: {--}}
{{--                    --}}{{--                                                legend: {--}}
{{--                    --}}{{--                                                    display: false--}}
{{--                    --}}{{--                                                },--}}
{{--                    --}}{{--                                                scales: {--}}
{{--                    --}}{{--                                                    yAxes: [{--}}
{{--                    --}}{{--                                                        ticks: {--}}
{{--                    --}}{{--                                                            beginAtZero: true--}}
{{--                    --}}{{--                                                        }--}}
{{--                    --}}{{--                                                    }]--}}
{{--                    --}}{{--                                                }--}}
{{--                    --}}{{--                                            }--}}
{{--                    --}}{{--                                        });--}}
{{--                    --}}{{--                                    });--}}

{{--                    --}}{{--                                    // Month names for better readability--}}
{{--                    --}}{{--                                    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];--}}
{{--                    --}}{{--                                </script>--}}
{{--                    --}}{{--                            @endif--}}
{{--                    --}}{{--                        </div>--}}


{{--                    --}}{{--                    </div>--}}
{{--                </div>--}}

{{--                <x-aaran-ui::web.dashboard.cards :transactions="$transactions"/>--}}
{{--            @endif--}}

        </div>

        <!-- row 2 ---------------------------------------------------------------------------------------------------->
        <div class=" bg-[#F8F8FF] gap-10 flex sm:flex-row flex-col tracking-wider rounded-lg ">

{{--            <x-aaran-ui::web.dashboard.customer :contacts="$contacts"/>--}}

{{--            <x-aaran-ui::web.dashboard.entries :entries="$entries"/>--}}

            <div class="sm:w-5/12 w-auto bg-white  rounded-lg flex-col flex h-[28rem] gap-y-5 hover:shadow-md gap-y">

                <div
                    class="w-full h-[4rem] py-3 border-b border-gray-200 inline-flex items-center justify-between px-8">
                    <span class="inline-flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="size-4 text-cyan-600">
                            <path fill-rule="evenodd"
                                  d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                  clip-rule="evenodd"/>
                        </svg>

                        <span class="text-lg font-semibold font-lex">Recent Articles</span>
                    </span>
                </div>

                <div class="flex-col flex px-5 h-[24] overflow-y-auto gap-y-5 font-lex" wire:poll.300s>
                    @if(isset($blogs))
                        @forelse($blogs as $index=>$row)

                            <a
{{--                                href="{{ route('showArticles', [$index]) }}"--}}
                               class="flex w-full h-auto rounded-md gap-x-2 bg-gray-50 hover:bg-slate-100 animate__animated wow animate__backInRight"
                               data-wow-duration="3s">
                                <div class="w-32 h-24 overflow-hidden">
                                    <img src="{{ $row['image'] }}"
                                         class="object-cover w-full h-full transition duration-300 ease-in-out hover:scale-105 rounded-l-md "
                                         alt="">
                                </div>
                                <div class="flex flex-col w-4/6 px-4 py-1 space-y-1">
                                    <div class="inline-flex items-center h-1/4 gap-x-2">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             class="size-3">
                                            <path fill-rule="evenodd"
                                                  d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </span>
                                        <span class="text-xs font-semibold text-gray-600">By <span
                                                class="text-cyan-600">{{ $row['user_name'] }}</span></span>

                                    </div>
                                    <div class="flex flex-col items-start justify-center ">
                                        <div class="font-semibold text-md">
                                            {{ \Illuminate\Support\Str::words($row['vname'], 5) }}</div>
                                        <div class="text-xs">{{ \Illuminate\Support\Str::words($row['body'], 9) }}</div>
                                    </div>
                                </div>
                            </a>
                        @empty

                            @for ($i = 0; $i <= 8; $i++)
                                <div
                                    class="flex w-full h-auto gap-x-2 bg-gray-50 hover:bg-slate-100 animate__animated wow animate__backInRight"
                                    data-wow-duration="3s">
                                    <div class="w-32 h-24 rounded-md">
                                        <img src="../../../../images/home/bg_1.webp" class="w-full h-full rounded-md"
                                             alt="">
                                    </div>
                                    <div class="flex flex-col w-4/6 py-1 ">
                                        <div class="inline-flex items-center h-1/4 gap-x-2">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                 fill="currentColor" class="size-3">
                                                <path fill-rule="evenodd"
                                                      d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </span>
                                            <span class="text-xs text-gray-600">By {{ Auth::user()->name }}</span>
                                        </div>
                                        <div class="flex flex-col items-start justify-start 3/4 ">
                                            <div class="font-semibold text-md">Lorem ipsum dolor sit amet, consectetur.
                                            </div>
                                            <div class="text-xs"> Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit.
                                                Ratione, voluptas!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                        @endforelse
                    @endif
                </div>
            </div>
        </div>
    </div>


</div>
