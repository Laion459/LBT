import axios from 'axios';

$(document).ready(function() {
    // Helper function to get the CSRF token
    function getCsrfToken() {
        return $('meta[name="csrf-token"]').attr('content');
    }

    // Helper function to show a message
    function showMessage(message, type = 'success') {
        const messageContainer = $(`#${type}-message`);
        const messageText = $(`#${type}-message-text`);

        messageText.text(message);
        messageContainer.fadeIn();

        setTimeout(() => {
            messageContainer.fadeOut();
        }, 6000);
    }

    // Generic function to handle AJAX errors
    function handleAjaxError(error) {
        console.error('AJAX Error:', error);
        showMessage(error.response?.data?.message || error.message || 'An error occurred', 'error');
    }

    // Generic function to update data
    function updateData(url, data) {
        return axios.put(url, data, {
            headers: {
                'Content-Type': 'application/json',  // Make sure Content-Type is set
                'X-CSRF-TOKEN': getCsrfToken()
            }
        });
    }

    // Generic function to create data
    function createData(url, data) {
        return axios.post(url, data, {
            headers: {
                'Content-Type': 'application/json',  // Make sure Content-Type is set
                'X-CSRF-TOKEN': getCsrfToken()
            }
        });
    }

    // Generic function to delete data
    function deleteData(url) {
        return axios.delete(url, {
            headers: {
                'Content-Type': 'application/json',  // Make sure Content-Type is set
                'X-CSRF-TOKEN': getCsrfToken()
            }
        });
    }

    // Function to handle updating an item
    function setupUpdateListeners(tableSelector, url, dataFields) {
        $(document).on('click', `${tableSelector} .update-button`, async function() {
            const row = $(this).closest('tr');
            const id = $(this).data('id');
            const data = {};

            dataFields.forEach(field => {
                data[field] = row.find(`.${field}`).val();  // Fixed: Use just the field name
            });

            try {
                await updateData(`${url}/${id}`, data);
                showMessage('Item updated successfully.');
            } catch (error) {
                handleAjaxError(error);
            }
        });
    }

    // Function to handle deleting an item
    function setupDeleteListeners(tableSelector, url) {
        $(document).on('click', `${tableSelector} .delete-button`, async function() {
            const row = $(this).closest('tr');
            const id = $(this).data('id');

            try {
                await deleteData(`${url}/${id}`);
                row.remove();
                showMessage('Item deleted successfully.');
            } catch (error) {
                handleAjaxError(error);
            }
        });
    }

    // Function to handle creating an item
    function setupCreateListeners(tableSelector, url, dataFields, createButtonSelector, prefix) {
        $(createButtonSelector).on('click', async function() {
            const data = {};

            dataFields.forEach(field => {
                data[field] = $(`#new_${prefix}_${field}`).val();
            });

            try {
                const response = await createData(url, data);
                const newItem = response.data;

                // Generate new row HTML (using backticks for multiline string)
                let newRowHtml = `<tr id="${prefix}-row-${newItem.id}" class="hover:bg-gray-800">`;
                dataFields.forEach(field => {
                    newRowHtml += `<td class="px-6 py-4 whitespace-nowrap"><input type="text" class="form-input text-gray-200 bg-gray-700 rounded-md shadow-sm mt-1 block w-full ${field}" value="${newItem[field]}"></td>`; // Fixed: Use just the field name
                });
                newRowHtml += `
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex space-x-2">
                            <button type="button" class="update-button inline-flex items-center justify-center p-2 rounded-full bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-100" data-id="${newItem.id}" title="Update Item">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg>
                            </button>
                            <button type="button" class="delete-button inline-flex items-center justify-center p-2 rounded-full bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 text-gray-100" data-id="${newItem.id}" title="Delete Item">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                            </button>
                        </div>
                    </td>
                </tr>`;

                // Append the new row to the table body
                $(`${tableSelector} tbody`).append(newRowHtml);

                // Clear the input fields
                dataFields.forEach(field => {
                    $(`#new_${prefix}_${field}`).val('');
                });

                showMessage('Item created successfully.');

            } catch (error) {
                handleAjaxError(error);
            }
        });
    }

    // Setup Revenues
    setupUpdateListeners('.revenue', '/revenues', ['description', 'value']);
    setupDeleteListeners('.revenue', '/revenues');
    setupCreateListeners('.revenue', '/revenues', ['description', 'value'], 'button[onclick="createRevenue()"]', 'revenue');

    // Setup Expenses
    setupUpdateListeners('.expense', '/expenses', ['description', 'value']);
    setupDeleteListeners('.expense', '/expenses');
    setupCreateListeners('.expense', '/expenses', ['description', 'value'], 'button[onclick="createExpense()"]', 'expense');

    // Setup Assets
    setupUpdateListeners('.asset', '/assets', ['actions', 'fixed_income']);
    setupDeleteListeners('.asset', '/assets');
    setupCreateListeners('.asset', '/assets', ['actions', 'fixed_income'], 'button[onclick="createAsset()"]', 'asset');

    // Setup Debts
    setupUpdateListeners('.debt', '/debts', ['item', 'installments', 'value']);
    setupDeleteListeners('.debt', '/debts');
    setupCreateListeners('.debt', '/debts', ['item', 'installments', 'value'], 'button[onclick="createDebt()"]', 'debt');

    // Setup Credit Cards
    setupUpdateListeners('.credit-card', '/credit_cards', ['card', 'description', 'installments', 'value']);
    setupDeleteListeners('.credit-card', '/credit_cards');
    setupCreateListeners('.credit-card', '/credit_cards', ['card', 'description', 'installments', 'value'], 'button[onclick="createCreditCard()"]', 'credit_card');

    // Setup Financings
    setupUpdateListeners('.financing', '/financings', ['bank', 'description', 'interest_rate', 'installments', 'monthly_payment', 'down_payment', 'paid', 'owed', 'total']);
    setupDeleteListeners('.financing', '/financings');
    setupCreateListeners('.financing', '/financings', ['bank', 'description', 'interest_rate', 'installments', 'monthly_payment', 'down_payment', 'paid', 'owed', 'total'], 'button[onclick="createFinancing()"]', 'financing');

    // Setup Results
    setupUpdateListeners('.result', '/results', ['payment', 'balance', 'passive_income']);
    setupDeleteListeners('.result', '/results');
    setupCreateListeners('.result', '/results', ['payment', 'balance', 'passive_income'], 'button[onclick="createResult()"]', 'result');
});
