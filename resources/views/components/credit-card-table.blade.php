@props(['creditCards'])

<div class="w-full p-4">
    <h2 class="text-2xl font-semibold text-gray-200 mb-4">Cartões de Crédito</h2>
    <div class="shadow overflow-hidden rounded-lg">
        <table class="min-w-full divide-y divide-gray-700 credit-card">
            <thead class="bg-gray-800">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                        Cartão
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                        Descrição
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                        Parcelas
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
                @foreach($creditCards as $creditCard)
                    <tr id="credit-card-row-{{ $creditCard->id }}" class="hover:bg-gray-800">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="text" class="form-input text-gray-200 bg-gray-700 rounded-md shadow-sm mt-1 block w-full credit-card-card focus:ring-indigo-500 focus:border-indigo-500" value="{{ $creditCard->card }}">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="text" class="form-input text-gray-200 bg-gray-700 rounded-md shadow-sm mt-1 block w-full credit-card-description focus:ring-indigo-500 focus:border-indigo-500" value="{{ $creditCard->description }}">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="text" class="form-input text-gray-200 bg-gray-700 rounded-md shadow-sm mt-1 block w-full credit-card-installments focus:ring-indigo-500 focus:border-indigo-500" value="{{ $creditCard->installments }}">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="number" class="form-input text-gray-200 bg-gray-700 rounded-md shadow-sm mt-1 block w-full credit-card-value focus:ring-indigo-500 focus:border-indigo-500" value="{{ $creditCard->value }}">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <button type="button" class="update-credit-card" data-id="{{ $creditCard->id }}" title="Update Credit Card">
                                    <div class="inline-flex items-center justify-center p-2 rounded-full bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </div>
                                </button>
                                <button type="button" class="delete-credit-card" data-id="{{ $creditCard->id }}" title="Delete Credit Card">
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
                        <input type="text" id="new_credit_card_card" class="form-input text-gray-200 bg-gray-700 rounded-md shadow-sm mt-1 block w-full focus:ring-indigo-500 focus:border-indigo-500">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <input type="text" id="new_credit_card_description" class="form-input text-gray-200 bg-gray-700 rounded-md shadow-sm mt-1 block w-full focus:ring-indigo-500 focus:border-indigo-500">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <input type="text" id="new_credit_card_installments" class="form-input text-gray-200 bg-gray-700 rounded-md shadow-sm mt-1 block w-full focus:ring-indigo-500 focus:border-indigo-500">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <input type="number" id="new_credit_card_value" class="form-input text-gray-200 bg-gray-700 rounded-md shadow-sm mt-1 block w-full focus:ring-indigo-500 focus:border-indigo-500">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button type="button" onclick="createCreditCard()" class="inline-flex items-center justify-center p-2 rounded-full bg-green-500 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 text-gray-100" title="Add Credit Card">
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
