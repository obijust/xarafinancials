<?php

function asMoney($value) {
  return number_format($value, 2);
}

?>

@extends('layouts.payroll')
@section('content')

<div class="row">
  <div class="col-lg-12">
  <h3>Employee Deductions</h3>

<hr>
</div>  
</div>


<div class="row">
  <div class="col-lg-12">

     @if (Session::has('flash_message'))

      <div class="alert alert-success">
      {{ Session::get('flash_message') }}
     </div>
    @endif

     @if (Session::has('delete_message'))

      <div class="alert alert-danger">
      {{ Session::get('delete_message') }}
     </div>
    @endif

    <div class="panel panel-default">
      <div class="panel-heading">
          <a class="btn btn-info btn-sm" href="{{ URL::to('employee_deductions/create')}}">new employee deduction</a>
        </div>
        <div class="panel-body">


    <table id="users" class="table table-condensed table-bordered table-responsive table-hover">


      <thead>

        <th>#</th>
        <th>Employee</th>
        <th>Deduction Type</th>
        <th>Amount</th>
        <th>Action</th>

      </thead>

      <tfoot>

        <th>#</th>
        <th>Employee</th>
        <th>Deduction Type</th>
        <th>Amount</th>

      </tfoot>

      <tbody>

        <?php $i = 1; ?>
        @foreach($deds as $ded)

        <tr>

          <td> {{ $i }}</td>
          @if($ded->middle_name == null || $ded->middle_name == '')
          <td>{{ $ded->first_name.' '.$ded->last_name }}</td>
          @else
          <td>{{ $ded->first_name.' '.$ded->middle_name.' '.$ded->last_name }}</td>
          @endif
          <td>{{ $ded->deduction_name }}</td>
          <td align="right">{{ asMoney((double)$ded->deduction_amount) }}</td>
          <td>

                  <div class="btn-group">
                  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
          
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{URL::to('employee_deductions/view/'.$ded->id)}}">View</a></li>

                    <li><a href="{{URL::to('employee_deductions/edit/'.$ded->id)}}">Update</a></li>
                   
                    <li><a href="{{URL::to('employee_deductions/delete/'.$ded->id)}}" onclick="return (confirm('Are you sure you want to delete this employee`s deduction?'))">Delete</a></li>
                    
                  </ul>
              </div>

                    </td>



        </tr>

        <?php $i++; ?>
        @endforeach


      </tbody>


    </table>
  </div>


  </div>

</div>

@stop