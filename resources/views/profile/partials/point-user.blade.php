<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Point Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("You can buy something with your point in store") }}
        </p>
    </header>

    <div class="mt-4 font-medium text-gray-900">
        <p class="text-lg">Current Point: {{$user->point}} Points</p>
        <p class="my-2">Recycle Rank</p>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                           Rank
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Point
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userPoint as $key => $data)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $key+1 }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data->name }}
                        </td>
                        <td class="px-6 py-4">
                           {{ $data->historyPoint }} points
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</section>
