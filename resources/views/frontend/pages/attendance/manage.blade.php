@extends('backend.layout.template')
@section('body_content')
<div id="kt_app_content" class="app-content flex-column-fluid">
   <!--begin::Content container-->
   <div id="kt_app_content_container" class="app-container container-xxl">
      <div class="row g-10">
            <div class="card card-flush">
            <div class="card-body">
               <table id="datatable" class="table table-hover table-striped table-bordered" style="width:100%">
                  <thead>
                     <tr>
                        <th>#Id</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>IP Address</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($attendances as $attendance)
                     @if(Auth::user()->id == $attendance->user_id)
                     <tr>
                        <td>
                           <span class="fw-bold">{{$attendance->id}}</span>
                        </td>
                        <td>
                           <span class="fw-bold ms-3">
                           {{Auth::user()->name}}
                           </span>
                        </td>
                        <td>
                           {{$attendance->created_at->format('d-F-Y')}}
                        </td>
                        <td>
                           {{$attendance->created_at->format('h:i:s A')}}
                        </td>
                        <td>
                           <!-- office_in_time time -->
                           @php
                           $office_in_time = "11:00:00";
                           // diffrent time               
                           $in_count       = new DateTime($office_in_time); 
                           $count_diff     = $in_count->diff(new DateTime($attendance->created_at->format('h:i:s'))); 
                           @endphp
                           @if($attendance->status == 1)
                           @if($attendance->created_at->format('h:i:s') <= $office_in_time AND $attendance->created_at->format('a') == 'am')
                           <div class="text-success">
                              <strong class="badge badge-success"> In - on time</strong>
                           </div>
                           @else
                           <div class="text-danger">
                              <strong class="badge badge-danger"> In - Late </strong>
                              <span class="badge badge-light-danger">
                              @php
                              echo $count_diff->h.'h-'; 
                              echo $count_diff->i.'m-'; 
                              echo $count_diff->s.'s';
                              @endphp
                              </span>
                           </div>
                           @endif
                           @endif
                           <!-- office out time-->
                           @php
                           $office_out_time = "07:00:00";
                           // diffrent time 
                           $out_count = new DateTime($office_out_time); 
                           $out_diff  = $out_count->diff(new DateTime($attendance->created_at->format('h:i:s'))); 
                           @endphp
                           @if($attendance->status == 2)
                           @if($attendance->created_at->format('h:i:s') >= $office_out_time)
                           <div class="text-success">
                              <strong class="badge badge-success"> Leave - on time  </strong>
                           </div>
                           @else
                           <div class="text-danger">
                              <strong class="badge badge-danger"> Early Leave </strong>
                              <span class="badge badge-light-danger">
                              @php
                              echo $out_diff->h.'h-'; 
                              echo $out_diff->i.'m-'; 
                              echo $out_diff->s.'s';
                              @endphp
                              </span>
                           </div>
                           @endif
                           @endif
                        </td>
                        <td>
                           <div class="badge badge-light-primary">{{$attendance->ip_address}}</div>
                        </td>
                     </tr>
                     @else
                     @endif
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      </div>
   </div>
@endsection