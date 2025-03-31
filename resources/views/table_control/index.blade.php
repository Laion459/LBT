@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Financial Overview</h1>

        <form action="{{ route('table_control.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <h2>Revenues</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Value</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="revenue_description" class="form-control"></td>
                                <td><input type="number" name="revenue_value" class="form-control"></td>
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">Add</button>
                                </td>
                            </tr>
                            @if(count($tableControls) > 0)
                                @foreach($tableControls as $control)
                                    <tr>
                                        <td>{{ $control->revenue_description }}</td>
                                        <td>{{ $control->revenue_value }}</td>
                                        <td>
                                            <a href="{{ route('table_control.edit', $control->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <button type="button" class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="col-md-6">
                    <h2>Expenses</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Value</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="expense_description" class="form-control"></td>
                                <td><input type="number" name="expense_value" class="form-control"></td>
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">Add</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h2>Assets</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Fixed Income</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="number" name="actions" class="form-control"></td>
                                <td><input type="number" name="fixed_income" class="form-control"></td>
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">Add</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-6">
                    <h2>Debts</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Installments</th>
                                <th>Value</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="debt_item" class="form-control"></td>
                                <td><input type="text" name="debt_installments" class="form-control"></td>
                                <td><input type="number" name="debt_value" class="form-control"></td>
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">Add</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Repeat for Credit Cards, Financings, and Results -->

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
