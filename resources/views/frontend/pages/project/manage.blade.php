@extends('backend.layout.template')
@section('body_content')
<div id="kt_app_content" class="app-content flex-column-fluid">
   <!--begin::Content container-->
   <div id="kt_app_content_container" class="app-container container-xxl">
      <!--begin::Row-->
      <div class="row g-5 g-xl-10">
         <!--begin::Col-->
         <div class="col-xl-12 mb-5 mb-xl-10">
            <!--begin::Table widget 6-->
            <div class="card card-flush">
               <!--begin::Card body-->
               <div class="card-body">
                  <!--begin::Table-->
                  @php 
                  $x = 1;
                  @endphp
                  <table id="datatable" class="table table-hover table-striped table-bordered" width="100%">
                     <thead>
                        <tr>
                           <th>#Id</th>
                           <th>Website Login url </th>
                           <th>Username</th>
                           <th>Password</th>
                           <th>Reference Website</th>
                           <th>Requirements</th>
                           <th>Start Date</th>
                           <th>Delivery_Date</th>
                           <th>Complete_Date</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($projects as $project)
                        @if(Auth::user()->id == $project->assign_to)
                        <tr>
                           <td><span class="fw-bold">{{$x++}}</span></td>
                           <td><a href="{{$project->website_login_url}}">{{$project->website_login_url}}</a></td>
                           <td>{{$project->user_name}}</td>
                           <td>{{$project->password}}</td>
                           <td><a href="{{$project->reference_website}}">{{$project->reference_website}}</a></td>
                           <td><a href="{{$project->requirements}}">{{$project->requirements}}</a></td>
                           <td>{{Carbon\Carbon::parse($project->start_date)->format('d,M,Y')}}</td>
                           <td>{{Carbon\Carbon::parse($project->delivery_date)->format('d,M,Y')}}</td>
                           <td>{{Carbon\Carbon::parse($project->complete_date)->format('d,M,Y')}}</td>
                           <td>
                              @if($project->status == 1)
                              <div class="alert alert-primary">Panding</div>
                              @elseif($project->status == 2)
                              <div class="alert alert-warning">Revision</div>
                              @elseif($project->status == 3)
                              <div class="alert alert-danger">Cancelled</div>
                              @elseif($project->status == 4)
                              <div class="alert alert-success">Completed</div>
                              @endif
                           </td>
                        </tr>
                        @endif
                        @endforeach
                     </tbody>
                  </table>
               </div>
               <!--end::Card body-->
            </div>
            <!--end::Content-->
            <!--end::Table widget 6-->
         </div>
         <!--end::Col-->
      </div>
      <!--end::Row-->
   </div>
   <!--end::Content container-->
</div>
@endsection