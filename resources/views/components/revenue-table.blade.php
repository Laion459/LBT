@props(['revenues'])

<div class="w-full md:w-1/2 p-4">
    <h2 class="text-2xl font-semibold text-gray-200 mb-4">Receitas</h2>
    <div class="shadow overflow-hidden rounded-lg">
        <table class="min-w-full divide-y divide-gray-700 revenue">
            <thead class="bg-gray-800">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                        Descrição
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                        Valor
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody class="bg-gray-900 divide-y divide-gray-700">
                @foreach($revenues as $revenue)
                    <tr id="revenue-row-{{ $revenue->id }}" class="hover:bg-gray-800">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="text" class="form-input text-gray-200 bg-gray-700 rounded-md shadow-sm mt-1 block w-full revenue-description focus:ring-indigo-500 focus:border-indigo-500" value="{{ $revenue->description }}">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="number" class="form-input text-gray-200 bg-gray-700 rounded-md shadow-sm mt-1 block w-full revenue-value focus:ring-indigo-500 focus:border-indigo-500" value="{{ $revenue->value }}">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <button type="button" class="update-revenue" data-id="{{ $revenue->id }}" title="Update Revenue">
                                    <div class="inline-flex items-center justify-center p-2 rounded-full bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                    </div>
                                </button>
                                <button type="button" class="delete-revenue" data-id="{{ $revenue->id }}" title="Delete Revenue">
                                    <div class="inline-flex items-center justify-center p-2 rounded-full bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 text-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                    </div>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                <tr class="bg-gray-800">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <input type="text" id="new_revenue_description" class="form-input text-gray-200 bg-gray-700 rounded-md shadow-sm mt-1 block w-full focus:ring-indigo-500 focus:border-indigo-500">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <input type="number" id="new_revenue_value" class="form-input text-gray-200 bg-gray-700 rounded-md shadow-sm mt-1 block w-full focus:ring-indigo-500 focus:border-indigo-500">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button type="button" onclick="createRevenue()" class="inline-flex items-center justify-center p-2 rounded-full bg-green-500 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 text-gray-100" title="Add Revenue">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
