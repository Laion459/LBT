$(document).ready(function() {

    // Function to show success message
    function showSuccessMessage(message) {
        $('#success-message-text').text(message);
        $('#success-message').fadeIn();

        setTimeout(function() {
            $('#success-message').fadeOut();
        }, 6000); // 6 seconds
    }

    // Function to show error message
    function showErrorMessage(message) {
        $('#error-message-text').text(message);
        $('#error-message').fadeIn();

        setTimeout(function() {
            $('#error-message').fadeOut();
        }, 6000); // 6 seconds
    }

    // Function to handle AJAX errors
    function handleAjaxError(xhr, status, error) {
        console.error('AJAX Error:', error);
        showErrorMessage('An error occurred: ' + error); // Use the error message function
    }

    // Generic function to update data
    function updateData(url, data, element) {
        $.ajax({
            url: url,
            type: 'PUT',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                showSuccessMessage(response.message);
            },
            error: function(xhr, status, error) {
                handleAjaxError(xhr, status, error);
            }
        });
    }

    // Generic function to create data
    function createData(url, data, table) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                showSuccessMessage(response.message);
                // Assuming the server returns the new item data in the response
                var newItem = response.data;

                // Create the new row HTML
                var newRow = '<tr id="' + table + '-row-' + newItem.id + '">' +
                    '<td><input type="text" class="form-control ' + table + '-description" value="' + newItem.description + '"></td>' +
                    '<td><input type="number" class="form-control ' + table + '-value" value="' + newItem.value + '"></td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-sm btn-primary update-' + table + '" data-id="' + newItem.id + '">Update</button>' +
                    '<button type="button" class="btn btn-sm btn-danger delete-' + table + '" data-id="' + newItem.id + '">Delete</button>' +
                    '</td>' +
                    '</tr>';

                // Append the new row to the table body
                $('.' + table + ' tbody').append(newRow);

                // Reattach event listeners to the new buttons
                reattachEventListeners();
            },
            error: function(xhr, status, error) {
                handleAjaxError(xhr, status, error);
            }
        });
    }

    // Generic function to delete data
    function deleteData(url, rowId) {
        $.ajax({
            url: url,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                showSuccessMessage(response.message);
                // Remove the row from the table
                $('#' + rowId).remove();
            },
            error: function(xhr, status, error) {
                handleAjaxError(xhr, status, error);
            }
        });
    }

    function reattachEventListeners() {
        // Revenues
        $('.update-revenue').off('click').on('click', function() {
            var id = $(this).data('id');
            var description = $(this).closest('tr').find('.revenue-description').val();
            var value = $(this).closest('tr').find('.revenue-value').val();

            updateData('/revenues/' + id, {
                description: description,
                value: value,
                _token: '{{ csrf_token() }}'
            }, $(this));
        });

        $('.delete-revenue').off('click').on('click', function() {
            var id = $(this).data('id');
            deleteData('/revenues/' + id, 'revenue-row-' + id);
        });

        // Expenses
        $('.update-expense').off('click').on('click', function() {
            var id = $(this).data('id');
            var description = $(this).closest('tr').find('.expense-description').val();
            var value = $(this).closest('tr').find('.expense-value').val();

            updateData('/expenses/' + id, {
                description: description,
                value: value,
                _token: '{{ csrf_token() }}'
            }, $(this));
        });

        $('.delete-expense').off('click').on('click', function() {
            var id = $(this).data('id');
            deleteData('/expenses/' + id, 'expense-row-' + id);
        });

        // Assets
        $('.update-asset').off('click').on('click', function() {
            var id = $(this).data('id');
            var actions = $(this).closest('tr').find('.asset-actions').val();
            var fixed_income = $(this).closest('tr').find('.asset-fixed-income').val();

            updateData('/assets/' + id, {
                actions: actions,
                fixed_income: fixed_income,
                _token: '{{ csrf_token() }}'
            }, $(this));
        });

        $('.delete-asset').off('click').on('click', function() {
            var id = $(this).data('id');
            deleteData('/assets/' + id, 'asset-row-' + id);
        });

        // Debts
        $('.update-debt').off('click').on('click', function() {
            var id = $(this).data('id');
            var item = $(this).closest('tr').find('.debt-item').val();
            var installments = $(this).closest('tr').find('.debt-installments').val();
            var value = $(this).closest('tr').find('.debt-value').val();

            updateData('/debts/' + id, {
                item: item,
                installments: installments,
                value: value,
                _token: '{{ csrf_token() }}'
            }, $(this));
        });

        $('.delete-debt').off('click').on('click', function() {
            var id = $(this).data('id');
            deleteData('/debts/' + id, 'debt-row-' + id);
        });

        // Credit Cards
        $('.update-credit-card').off('click').on('click', function() {
            var id = $(this).data('id');
            var card = $(this).closest('tr').find('.credit-card-card').val();
            var description = $(this).closest('tr').find('.credit-card-description').val();
            var installments = $(this).closest('tr').find('.credit-card-installments').val();
            var value = $(this).closest('tr').find('.credit-card-value').val();

            updateData('/credit_cards/' + id, {
                card: card,
                description: description,
                installments: installments,
                value: value,
                _token: '{{ csrf_token() }}'
            }, $(this));
        });

        $('.delete-credit-card').off('click').on('click', function() {
            var id = $(this).data('id');
            deleteData('/credit_cards/' + id, 'credit-card-row-' + id);
        });

        // Financings
        $('.update-financing').off('click').on('click', function() {
            var id = $(this).data('id');
            var bank = $(this).closest('tr').find('.financing-bank').val();
            var description = $(this).closest('tr').find('.financing-description').val();
            var interest_rate = $(this).closest('tr').find('.financing-interest-rate').val();
            var installments = $(this).closest('tr').find('.financing-installments').val();
            var monthly_payment = $(this).closest('tr').find('.financing-monthly-payment').val();
            var down_payment = $(this).closest('tr').find('.financing-down-payment').val();
            var paid = $(this).closest('tr').find('.financing-paid').val();
            var owed = $(this).closest('tr').find('.financing-owed').val();
            var total = $(this).closest('tr').find('.financing-total').val();

            updateData('/financings/' + id, {
                bank: bank,
                description: description,
                interest_rate: interest_rate,
                installments: installments,
                monthly_payment: monthly_payment,
                down_payment: down_payment,
                paid: paid,
                owed: owed,
                total: total,
                _token: '{{ csrf_token() }}'
            }, $(this));
        });

        $('.delete-financing').off('click').on('click', function() {
            var id = $(this).data('id');
            deleteData('/financings/' + id, 'financing-row-' + id);
        });

        // Results
        $('.update-result').off('click').on('click', function() {
            var id = $(this).data('id');
            var payment = $(this).closest('tr').find('.result-payment').val();
            var balance = $(this).closest('tr').find('.result-balance').val();
            var passive_income = $(this).closest('tr').find('.result-passive-income').val();

            updateData('/results/' + id, {
                payment: payment,
                balance: balance,
                passive_income: passive_income,
                _token: '{{ csrf_token() }}'
            }, $(this));
        });

        $('.delete-result').off('click').on('click', function() {
            var id = $(this).data('id');
            deleteData('/results/' + id, 'result-row-' + id);
        });
    }

    // Revenues
    $(document).on('click', '.update-revenue', function() {
        var id = $(this).data('id');
        var description = $(this).closest('tr').find('.revenue-description').val();
        var value = $(this).closest('tr').find('.revenue-value').val();

        updateData('/revenues/' + id, {
            description: description,
            value: value,
            _token: '{{ csrf_token() }}'
        }, $(this));
    });

    $(document).on('click', '.delete-revenue', function() {
        var id = $(this).data('id');
        deleteData('/revenues/' + id, 'revenue-row-' + id);
    });

    window.createRevenue = function() {
        var description = $('#new_revenue_description').val();
        var value = $('#new_revenue_value').val();

        createData('/revenues', {
            description: description,
            value: value,
            _token: '{{ csrf_token() }}'
        }, 'revenue');
    };

    // Expenses
    $(document).on('click', '.update-expense', function() {
        var id = $(this).data('id');
        var description = $(this).closest('tr').find('.expense-description').val();
        var value = $(this).closest('tr').find('.expense-value').val();

        updateData('/expenses/' + id, {
            description: description,
            value: value,
            _token: '{{ csrf_token() }}'
        }, $(this));
    });

    $(document).on('click', '.delete-expense', function() {
        var id = $(this).data('id');
        deleteData('/expenses/' + id, 'expense-row-' + id);
    });

    window.createExpense = function() {
        var description = $('#new_expense_description').val();
        var value = $('#new_expense_value').val();

        createData('/expenses', {
            description: description,
            value: value,
            _token: '{{ csrf_token() }}'
        }, 'expense');
    };

    // Assets
    $(document).on('click', '.update-asset', function() {
        var id = $(this).data('id');
        var actions = $(this).closest('tr').find('.asset-actions').val();
        var fixed_income = $(this).closest('tr').find('.asset-fixed-income').val();

        updateData('/assets/' + id, {
            actions: actions,
            fixed_income: fixed_income,
            _token: '{{ csrf_token() }}'
        }, $(this));
    });

    $(document).on('click', '.delete-asset', function() {
        var id = $(this).data('id');
        deleteData('/assets/' + id, 'asset-row-' + id);
    });

    window.createAsset = function() {
        var actions = $('#new_asset_actions').val();
        var fixed_income = $('#new_asset_fixed_income').val();

        createData('/assets', {
            actions: actions,
            fixed_income: fixed_income,
            _token: '{{ csrf_token() }}'
        }, 'asset');
    };

    // Debts
    $(document).on('click', '.update-debt', function() {
        var id = $(this).data('id');
        var item = $(this).closest('tr').find('.debt-item').val();
        var installments = $(this).closest('tr').find('.debt-installments').val();
        var value = $(this).closest('tr').find('.debt-value').val();

        updateData('/debts/' + id, {
            item: item,
            installments: installments,
            value: value,
            _token: '{{ csrf_token() }}'
        }, $(this));
    });

    $(document).on('click', '.delete-debt', function() {
        var id = $(this).data('id');
        deleteData('/debts/' + id, 'debt-row-' + id);
    });

    window.createDebt = function() {
        var item = $('#new_debt_item').val();
        var installments = $('#new_debt_installments').val();
        var value = $('#new_debt_value').val();

        createData('/debts', {
            item: item,
            installments: installments,
            value: value,
            _token: '{{ csrf_token() }}'
        }, 'debt');
    };

    // Credit Cards
    $(document).on('click', '.update-credit-card', function() {
        var id = $(this).data('id');
        var card = $(this).closest('tr').find('.credit-card-card').val();
        var description = $(this).closest('tr').find('.credit-card-description').val();
        var installments = $(this).closest('tr').find('.credit-card-installments').val();
        var value = $(this).closest('tr').find('.credit-card-value').val();

        updateData('/credit_cards/' + id, {
            card: card,
            description: description,
            installments: installments,
            value: value,
            _token: '{{ csrf_token() }}'
        }, $(this));
    });

    $(document).on('click', '.delete-credit-card', function() {
        var id = $(this).data('id');
        deleteData('/credit_cards/' + id, 'credit-card-row-' + id);
    });

    window.createCreditCard = function() {
        var card = $('#new_credit_card_card').val();
        var description = $('#new_credit_card_description').val();
        var installments = $('#new_credit_card_installments').val();
        var value = $('#new_credit_card_value').val();

        createData('/credit_cards', {
            card: card,
            description: description,
            installments: installments,
            value: value,
            _token: '{{ csrf_token() }}'
        }, 'credit-card');
    };

    // Financings
    $(document).on('click', '.update-financing', function() {
        var id = $(this).data('id');
        var bank = $(this).closest('tr').find('.financing-bank').val();
        var description = $(this).closest('tr').find('.financing-description').val();
        var interest_rate = $(this).closest('tr').find('.financing-interest-rate').val();
        var installments = $(this).closest('tr').find('.financing-installments').val();
        var monthly_payment = $(this).closest('tr').find('.financing-monthly-payment').val();
        var down_payment = $(this).closest('tr').find('.financing-down-payment').val();
        var paid = $(this).closest('tr').find('.financing-paid').val();
        var owed = $(this).closest('tr').find('.financing-owed').val();
        var total = $(this).closest('tr').find('.financing-total').val();

        updateData('/financings/' + id, {
            bank: bank,
            description: description,
            interest_rate: interest_rate,
            installments: installments,
            monthly_payment: monthly_payment,
            down_payment: down_payment,
            paid: paid,
            owed: owed,
            total: total,
            _token: '{{ csrf_token() }}'
        }, $(this));
    });

    $(document).on('click', '.delete-financing', function() {
        var id = $(this).data('id');
        deleteData('/financings/' + id, 'financing-row-' + id);
    });

    window.createFinancing = function() {
        var bank = $('#new_financing_bank').val();
        var description = $('#new_financing_description').val();
        var interest_rate = $('#new_financing_interest_rate').val();
        var installments = $('#new_financing_installments').val();
        var monthly_payment = $('#new_financing_monthly_payment').val();
        var down_payment = $('#new_financing_down_payment').val();
        var paid = $('#new_financing_paid').val();
        var owed = $('#new_financing_owed').val();
        var total = $('#new_financing_total').val();

        createData('/financings', {
            bank: bank,
            description: description,
            interest_rate: interest_rate,
            installments: installments,
            monthly_payment: monthly_payment,
            down_payment: down_payment,
            paid: paid,
            owed: owed,
            total: total,
            _token: '{{ csrf_token() }}'
        }, 'financing');
    };

    // Results
    $(document).on('click', '.update-result', function() {
        var id = $(this).data('id');
        var payment = $(this).closest('tr').find('.result-payment').val();
        var balance = $(this).closest('tr').find('.result-balance').val();
        var passive_income = $(this).closest('tr').find('.result-passive-income').val();

        updateData('/results/' + id, {
            payment: payment,
            balance: balance,
            passive_income: passive_income,
            _token: '{{ csrf_token() }}'
        }, $(this));
    });

    $(document).on('click', '.delete-result', function() {
        var id = $(this).data('id');
        deleteData('/results/' + id, 'result-row-' + id);
    });

    window.createResult = function() {
        var payment = $('#new_result_payment').val();
        var balance = $('#new_result_balance').val();
        var passive_income = $('#new_result_passive_income').val();

        createData('/results', {
            payment: payment,
            balance: balance,
            passive_income: passive_income,
            _token: '{{ csrf_token() }}'
        }, 'result');
    };

    // Use event delegation for dynamically added elements
    $(document).on('click', '.update-revenue, .delete-revenue, .update-expense, .delete-expense, .update-asset, .delete-asset, .update-debt, .delete-debt, .update-credit-card, .delete-credit-card, .update-financing, .delete-financing, .update-result, .delete-result', function() {
        reattachEventListeners();
    });

    reattachEventListeners();
});
