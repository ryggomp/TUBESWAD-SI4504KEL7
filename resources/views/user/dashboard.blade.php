<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <div class="py-12 px-6">


        <div class="w-full bg-white rounded-lg shadow p-4 md:p-6">
            <div class="flex justify-between">
                <div>
                    <h5 class="leading-none text-3xl font-bold text-gray-900 pb-2">Recycle Impact</h5>
                    <p class="text-base font-normal text-gray-500">{{ auth()->user()->name }} recycle impact</p>
                </div>
                <div
                    class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 text-center">
                    12%
                    <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13V1m0 0L1 5m4-4 4 4" />
                    </svg>
                </div>
            </div>
            <div id="area-chart"></div>
        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Vendor
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis Recycle
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis Sampah
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Berat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($data) > 0)
                    <!-- row 1 -->
                    @foreach($data as $key => $value)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $key+1 }}</th>
                        <td class="px-6 py-4">{{ $value->nama }}</td>
                        <td class="px-6 py-4">{{ $value->users->name }}</td>
                        <td class="px-6 py-4">{{ $value->jenisRecycle }}</td>
                        <td class="px-6 py-4">{{ $value->jenisSampah }}</td>
                        <td class="px-6 py-4">{{ $value->berat }} Kg</td>
                        <td class="
                            {{  $value->status == "Processing"? "px-6 py-4 text-orange-500" : "px-6 py-4 text-green-500" }}">
                            {{ $value->status }}
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <th class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap" colspan="7"
                            rowspan="2">
                            You've never used recycle from home.
                        </th>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <script>
        // ApexCharts options and config
        window.addEventListener("load", function () {
            let options = {
                chart: {
                    height: "100%",
                    maxWidth: "100%",
                    type: "area",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                        enabled: false,
                    },
                    toolbar: {
                        show: false,
                    },
                },
                tooltip: {
                    enabled: true,
                    x: {
                        show: false,
                    },
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        opacityFrom: 0.55,
                        opacityTo: 0,
                        shade: "#1C64F2",
                        gradientToColors: ["#1C64F2"],
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: 6,
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: 0
                    },
                },
                series: [{
                    name: "New users",
                    data: [6500, 6418, 6456, 6526, 6356, 6456],
                    color: "#1A56DB",
                }, ],
                xaxis: {
                    categories: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday',
                        'Friday', 'Saturday'
                    ],
                    labels: {
                        show: true,
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: false,
                },
            }

            if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("area-chart"), options);
                chart.render();
            }
        });

    </script>
</x-app-layout>
