@extends('backend.layout.template')
@section('body_content')
<div id="kt_app_content" class="app-content flex-column-fluid">
   <!--begin::Content container-->
   <div id="kt_app_content_container" class="app-container container-xxl">
      <div class="row gy-5 g-xl-10">
         <!--begin::Col-->
         <div class="col-xl-4 mb-xl-10">
            <!--begin::Engage widget 1-->
            <div class="card h-md-100" dir="ltr">
               <!--begin::Body-->
               <div class="card-body d-flex flex-column flex-center">
                  <!--begin::Heading-->
                  <div class="mb-2">
                     <!--begin::Title-->
                     <h1 class="fw-semibold text-gray-800 text-center lh-lg">Dashboard
                        <br>
                        <span class="fw-bolder">
                        @php
                        $time = date("H");
                        $timezone = date("e");
                        @endphp
                        @if ($time < "12")
                        Good morning 
                        <span class="text-danger"><?php echo ucwords(Auth::user()->name);?></span>
                        @elseif ($time >= "12" && $time < "17")
                        Good afternoon
                        <span class="text-danger"><?php echo ucwords(Auth::user()->name);?></span>
                        @elseif ($time >= "17" && $time < "19")
                        Good evening
                        <span class="text-danger"><?php echo ucwords(Auth::user()->name);?></span>
                        @elseif ($time >= "19")
                        Good night, 
                        <span class="text-danger"><?php echo ucwords(Auth::user()->name);?> <i class="ki-outline ki-verify fs-1 text-primary"></i></span>
                        @endif
                        </span>
                     </h1>
                     <!--end::Title-->
                     <!--begin::Illustration-->
                     <div class="py-10 text-center">
                        <img src="{{asset('backend/assets/media/settings/dashboard.svg')}}" class="theme-light-show w-300px" alt="">
                        <img src="assets/media/svg/illustrations/easy/3-dark.svg" class="theme-dark-show w-200px" alt="">
                     </div>
                     <!--end::Illustration-->
                  </div>
                  <!--end::Heading-->
                  <!--begin::Links-->
                  <div class="text-center mb-1">
                     <!--begin::Link-->
                     <a href="{{route('admin.project.manage')}}" class="btn btn-sm btn-primary me-2">View Project</a>
                     <!--end::Link-->
                     <!--begin::Link-->
                     <a class="btn btn-sm btn-light" href="{{route('admin.attendance.manage')}}">View Attendance</a>
                     <!--end::Link-->
                  </div>
                  <!--end::Links-->
               </div>
               <!--end::Body-->
            </div>
            <!--end::Engage widget 1-->
         </div>
         <!--end::Col-->
         <!--begin::Col-->
         <div class="col-xl-8">
            <!--begin::Row-->
            <div class="row g-5 g-xl-10 mb-xl-10">
               <!--begin::Col-->
               <div class="col-lg-6 col-xl-6 col-xxl-6 mb-5 mb-xl-0">
                  <!--begin::Card widget 4-->
                  <div class="card overflow-hidden h-100 mb-5 mb-xl-10">
                     <!--begin::Card body-->
                     <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                        <!--begin::Statistics-->
                        <div class="mb-4 px-9">
                           <!--begin::Info-->
                           <div class="d-flex align-items-center mb-2">
                              <!--begin::Value-->
                              <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">
                                 @if(!empty($users))
                                 {{count($users)}}
                                 @else
                                 0
                                 @endif
                                 
                              </span>
                              <!--end::Value-->
                              <!--begin::Label-->
                              <span class="d-flex align-items-end text-gray-400 fs-6 fw-semibold">People</span>
                              <!--end::Label-->
                           </div>
                           <!--end::Info-->
                           <!--begin::Description-->
                           <span class="fs-6 fw-semibold text-gray-400">All Employee</span>
                           <!--end::Description-->
                        </div>
                        <!--end::Statistics-->
                        <!--begin::Chart-->
                        <div id="kt_card_widget_12_chart" class="min-h-auto" style="height: 125px; min-height: 140px;">
                           <div id="apexchartslf5ulojp" class="apexcharts-canvas apexchartslf5ulojp apexcharts-theme-light" style="width: 392px; height: 125px;">
                              <svg id="SvgjsSvg1221" width="392" height="125" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable hovering-zoom" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                 <g id="SvgjsG1223" class="apexcharts-inner apexcharts-graphical" transform="translate(-10, 30)">
                                    <defs id="SvgjsDefs1222">
                                       <clipPath id="gridRectMasklf5ulojp">
                                          <rect id="SvgjsRect1226" width="427" height="102" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                       </clipPath>
                                       <clipPath id="forecastMasklf5ulojp"></clipPath>
                                       <clipPath id="nonForecastMasklf5ulojp"></clipPath>
                                       <clipPath id="gridRectMarkerMasklf5ulojp">
                                          <rect id="SvgjsRect1227" width="425" height="104" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                       </clipPath>
                                    </defs>
                                    <g id="SvgjsG1234" class="apexcharts-xaxis" transform="translate(0, 0)">
                                       <g id="SvgjsG1235" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g>
                                    </g>
                                    <g id="SvgjsG1251" class="apexcharts-grid">
                                       <g id="SvgjsG1252" class="apexcharts-gridlines-horizontal">
                                          <line id="SvgjsLine1254" x1="0" y1="0" x2="421" y2="0" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                          <line id="SvgjsLine1255" x1="0" y1="25" x2="421" y2="25" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                          <line id="SvgjsLine1256" x1="0" y1="50" x2="421" y2="50" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                          <line id="SvgjsLine1257" x1="0" y1="75" x2="421" y2="75" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                          <line id="SvgjsLine1258" x1="0" y1="100" x2="421" y2="100" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                       </g>
                                       <g id="SvgjsG1253" class="apexcharts-gridlines-vertical"></g>
                                       <line id="SvgjsLine1260" x1="0" y1="100" x2="421" y2="100" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                       <line id="SvgjsLine1259" x1="0" y1="1" x2="0" y2="100" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG1228" class="apexcharts-area-series apexcharts-plot-series">
                                       <g id="SvgjsG1229" class="apexcharts-series" seriesName="Sales" data:longestSeries="true" rel="1" data:realIndex="0">
                                          <path id="SvgjsPath1232" d="M0 100L0 62.5C12.279166666666665 62.5 22.804166666666664 7.5 35.08333333333333 7.5C47.3625 7.5 57.88749999999999 80 70.16666666666666 80C82.44583333333333 80 92.97083333333333 2.5 105.25 2.5C117.52916666666665 2.5 128.05416666666665 45 140.33333333333331 45C152.61249999999998 45 163.1375 10 175.41666666666666 10C187.69583333333333 10 198.22083333333333 42.5 210.5 42.5C222.77916666666667 42.5 233.30416666666665 37.5 245.58333333333331 37.5C257.86249999999995 37.5 268.3875 2.5 280.66666666666663 2.5C292.9458333333333 2.5 303.4708333333333 37.5 315.75 37.5C328.02916666666664 37.5 338.5541666666667 7.5 350.8333333333333 7.5C363.11249999999995 7.5 373.6375 30 385.91666666666663 30C398.1958333333333 30 408.7208333333333 7.5 421 7.5C421 7.5 421 7.5 421 100M421 7.5C421 7.5 421 7.5 421 7.5 " fill="rgba(117,204,104,0)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasklf5ulojp)" pathTo="M 0 100L 0 62.5C 12.279166666666665 62.5 22.804166666666664 7.5 35.08333333333333 7.5C 47.3625 7.5 57.88749999999999 80 70.16666666666666 80C 82.44583333333333 80 92.97083333333333 2.5 105.25 2.5C 117.52916666666665 2.5 128.05416666666665 45 140.33333333333331 45C 152.61249999999998 45 163.1375 10 175.41666666666666 10C 187.69583333333333 10 198.22083333333333 42.5 210.5 42.5C 222.77916666666667 42.5 233.30416666666665 37.5 245.58333333333331 37.5C 257.86249999999995 37.5 268.3875 2.5 280.66666666666663 2.5C 292.9458333333333 2.5 303.4708333333333 37.5 315.75 37.5C 328.02916666666664 37.5 338.5541666666667 7.5 350.8333333333333 7.5C 363.11249999999995 7.5 373.6375 30 385.91666666666663 30C 398.1958333333333 30 408.7208333333333 7.5 421 7.5C 421 7.5 421 7.5 421 100M 421 7.5z" pathFrom="M -1 150L -1 150L 35.08333333333333 150L 70.16666666666666 150L 105.25 150L 140.33333333333331 150L 175.41666666666666 150L 210.5 150L 245.58333333333331 150L 280.66666666666663 150L 315.75 150L 350.8333333333333 150L 385.91666666666663 150L 421 150"></path>
                                          <path id="SvgjsPath1233" d="M0 62.5C12.279166666666665 62.5 22.804166666666664 7.5 35.08333333333333 7.5C47.3625 7.5 57.88749999999999 80 70.16666666666666 80C82.44583333333333 80 92.97083333333333 2.5 105.25 2.5C117.52916666666665 2.5 128.05416666666665 45 140.33333333333331 45C152.61249999999998 45 163.1375 10 175.41666666666666 10C187.69583333333333 10 198.22083333333333 42.5 210.5 42.5C222.77916666666667 42.5 233.30416666666665 37.5 245.58333333333331 37.5C257.86249999999995 37.5 268.3875 2.5 280.66666666666663 2.5C292.9458333333333 2.5 303.4708333333333 37.5 315.75 37.5C328.02916666666664 37.5 338.5541666666667 7.5 350.8333333333333 7.5C363.11249999999995 7.5 373.6375 30 385.91666666666663 30C398.1958333333333 30 408.7208333333333 7.5 421 7.5C421 7.5 421 7.5 421 7.5 " fill="none" fill-opacity="1" stroke="#3f4254" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasklf5ulojp)" pathTo="M 0 62.5C 12.279166666666665 62.5 22.804166666666664 7.5 35.08333333333333 7.5C 47.3625 7.5 57.88749999999999 80 70.16666666666666 80C 82.44583333333333 80 92.97083333333333 2.5 105.25 2.5C 117.52916666666665 2.5 128.05416666666665 45 140.33333333333331 45C 152.61249999999998 45 163.1375 10 175.41666666666666 10C 187.69583333333333 10 198.22083333333333 42.5 210.5 42.5C 222.77916666666667 42.5 233.30416666666665 37.5 245.58333333333331 37.5C 257.86249999999995 37.5 268.3875 2.5 280.66666666666663 2.5C 292.9458333333333 2.5 303.4708333333333 37.5 315.75 37.5C 328.02916666666664 37.5 338.5541666666667 7.5 350.8333333333333 7.5C 363.11249999999995 7.5 373.6375 30 385.91666666666663 30C 398.1958333333333 30 408.7208333333333 7.5 421 7.5" pathFrom="M -1 150L -1 150L 35.08333333333333 150L 70.16666666666666 150L 105.25 150L 140.33333333333331 150L 175.41666666666666 150L 210.5 150L 245.58333333333331 150L 280.66666666666663 150L 315.75 150L 350.8333333333333 150L 385.91666666666663 150L 421 150" fill-rule="evenodd"></path>
                                          <g id="SvgjsG1230" class="apexcharts-series-markers-wrap" data:realIndex="0">
                                             <g class="apexcharts-series-markers">
                                                <circle id="SvgjsCircle1268" r="0" cx="280.66666666666663" cy="2.5" class="apexcharts-marker w49ci6sq4 no-pointer-events" stroke="#3f4254" fill="#75cc68" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle>
                                             </g>
                                          </g>
                                       </g>
                                       <g id="SvgjsG1231" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine1262" x1="280.16666666666663" y1="0" x2="280.16666666666663" y2="100" stroke="#3f4254" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="280.16666666666663" y="0" width="1" height="100" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line>
                                    <line id="SvgjsLine1263" x1="0" y1="0" x2="421" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1264" x1="0" y1="0" x2="421" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1265" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG1266" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG1267" class="apexcharts-point-annotations"></g>
                                    <rect id="SvgjsRect1269" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect>
                                    <rect id="SvgjsRect1270" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect>
                                 </g>
                                 <g id="SvgjsG1249" class="apexcharts-yaxis" rel="0" transform="translate(-8, 0)">
                                    <g id="SvgjsG1250" class="apexcharts-yaxis-texts-g"></g>
                                 </g>
                                 <rect id="SvgjsRect1261" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                                 <g id="SvgjsG1224" class="apexcharts-annotations"></g>
                              </svg>
                              <div class="apexcharts-legend" style="max-height: 62.5px;"></div>
                              <div class="apexcharts-tooltip apexcharts-theme-light" style="left: 157.948px; top: 5.5px;">
                                 <div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;">Feb 9</div>
                                 <div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex;">
                                    <span class="apexcharts-tooltip-marker" style="background-color: rgb(117, 204, 104);"></span>
                                    <div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;">
                                       <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Sales: </span><span class="apexcharts-tooltip-text-y-value">59K</span></div>
                                       <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                       <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light" style="left: 244.237px; top: 132px;">
                                 <div class="apexcharts-xaxistooltip-text" style="font-family: inherit; font-size: 12px; min-width: 29.3438px;">Feb 9</div>
                              </div>
                              <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                 <div class="apexcharts-yaxistooltip-text"></div>
                              </div>
                           </div>
                        </div>
                        <!--end::Chart-->
                     </div>
                     <!--end::Card body-->
                  </div>
                  <!--end::Card widget 4-->
               </div>
               <!--end::Col-->
               <!--begin::Col-->
               <div class="col-lg-6 col-xl-6 col-xxl-6 mb-5 mb-xl-0">
                  <!--begin::Card widget 6-->
                  <div class="card overflow-hidden h-100 mb-5 mb-xl-10">
                     <!--begin::Card body-->
                     <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                        <!--begin::Statistics-->
                        <div class="mb-4 px-9">
                           <!--begin::Info-->
                           <div class="d-flex align-items-center mb-2">
                              <!--begin::Value-->
                              <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">
                                 @if(!empty($project))
                                 {{count($project)}}
                                 @else
                                 0
                                 @endif
                              </span>
                              <!--end::Value-->
                              <!--begin::Label-->
                              <span class="d-flex align-items-end text-gray-400 fs-6 fw-semibold">Orders in Queue</span>
                              <!--end::Label-->
                           </div>
                           <!--end::Info-->
                           <!--begin::Description-->
                           <span class="fs-6 fw-semibold text-gray-400">Running Project</span>
                           <!--end::Description-->
                        </div>
                        <!--end::Statistics-->
                        <!--begin::Chart-->
                        <div id="kt_card_widget_12_chart" class="min-h-auto" style="height: 125px; min-height: 140px;">
                           <div id="apexchartslf5ulojp" class="apexcharts-canvas apexchartslf5ulojp apexcharts-theme-light" style="width: 392px; height: 125px;">
                              <svg id="SvgjsSvg1221" width="392" height="125" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable hovering-zoom" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                 <g id="SvgjsG1223" class="apexcharts-inner apexcharts-graphical" transform="translate(-10, 30)">
                                    <defs id="SvgjsDefs1222">
                                       <clipPath id="gridRectMasklf5ulojp">
                                          <rect id="SvgjsRect1226" width="427" height="102" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                       </clipPath>
                                       <clipPath id="forecastMasklf5ulojp"></clipPath>
                                       <clipPath id="nonForecastMasklf5ulojp"></clipPath>
                                       <clipPath id="gridRectMarkerMasklf5ulojp">
                                          <rect id="SvgjsRect1227" width="425" height="104" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                       </clipPath>
                                    </defs>
                                    <g id="SvgjsG1234" class="apexcharts-xaxis" transform="translate(0, 0)">
                                       <g id="SvgjsG1235" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g>
                                    </g>
                                    <g id="SvgjsG1251" class="apexcharts-grid">
                                       <g id="SvgjsG1252" class="apexcharts-gridlines-horizontal">
                                          <line id="SvgjsLine1254" x1="0" y1="0" x2="421" y2="0" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                          <line id="SvgjsLine1255" x1="0" y1="25" x2="421" y2="25" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                          <line id="SvgjsLine1256" x1="0" y1="50" x2="421" y2="50" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                          <line id="SvgjsLine1257" x1="0" y1="75" x2="421" y2="75" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                          <line id="SvgjsLine1258" x1="0" y1="100" x2="421" y2="100" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                       </g>
                                       <g id="SvgjsG1253" class="apexcharts-gridlines-vertical"></g>
                                       <line id="SvgjsLine1260" x1="0" y1="100" x2="421" y2="100" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                       <line id="SvgjsLine1259" x1="0" y1="1" x2="0" y2="100" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG1228" class="apexcharts-area-series apexcharts-plot-series">
                                       <g id="SvgjsG1229" class="apexcharts-series" seriesName="Sales" data:longestSeries="true" rel="1" data:realIndex="0">
                                          <path id="SvgjsPath1232" d="M0 100L0 62.5C12.279166666666665 62.5 22.804166666666664 7.5 35.08333333333333 7.5C47.3625 7.5 57.88749999999999 80 70.16666666666666 80C82.44583333333333 80 92.97083333333333 2.5 105.25 2.5C117.52916666666665 2.5 128.05416666666665 45 140.33333333333331 45C152.61249999999998 45 163.1375 10 175.41666666666666 10C187.69583333333333 10 198.22083333333333 42.5 210.5 42.5C222.77916666666667 42.5 233.30416666666665 37.5 245.58333333333331 37.5C257.86249999999995 37.5 268.3875 2.5 280.66666666666663 2.5C292.9458333333333 2.5 303.4708333333333 37.5 315.75 37.5C328.02916666666664 37.5 338.5541666666667 7.5 350.8333333333333 7.5C363.11249999999995 7.5 373.6375 30 385.91666666666663 30C398.1958333333333 30 408.7208333333333 7.5 421 7.5C421 7.5 421 7.5 421 100M421 7.5C421 7.5 421 7.5 421 7.5 " fill="rgba(117,204,104,0)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasklf5ulojp)" pathTo="M 0 100L 0 62.5C 12.279166666666665 62.5 22.804166666666664 7.5 35.08333333333333 7.5C 47.3625 7.5 57.88749999999999 80 70.16666666666666 80C 82.44583333333333 80 92.97083333333333 2.5 105.25 2.5C 117.52916666666665 2.5 128.05416666666665 45 140.33333333333331 45C 152.61249999999998 45 163.1375 10 175.41666666666666 10C 187.69583333333333 10 198.22083333333333 42.5 210.5 42.5C 222.77916666666667 42.5 233.30416666666665 37.5 245.58333333333331 37.5C 257.86249999999995 37.5 268.3875 2.5 280.66666666666663 2.5C 292.9458333333333 2.5 303.4708333333333 37.5 315.75 37.5C 328.02916666666664 37.5 338.5541666666667 7.5 350.8333333333333 7.5C 363.11249999999995 7.5 373.6375 30 385.91666666666663 30C 398.1958333333333 30 408.7208333333333 7.5 421 7.5C 421 7.5 421 7.5 421 100M 421 7.5z" pathFrom="M -1 150L -1 150L 35.08333333333333 150L 70.16666666666666 150L 105.25 150L 140.33333333333331 150L 175.41666666666666 150L 210.5 150L 245.58333333333331 150L 280.66666666666663 150L 315.75 150L 350.8333333333333 150L 385.91666666666663 150L 421 150"></path>
                                          <path id="SvgjsPath1233" d="M0 62.5C12.279166666666665 62.5 22.804166666666664 7.5 35.08333333333333 7.5C47.3625 7.5 57.88749999999999 80 70.16666666666666 80C82.44583333333333 80 92.97083333333333 2.5 105.25 2.5C117.52916666666665 2.5 128.05416666666665 45 140.33333333333331 45C152.61249999999998 45 163.1375 10 175.41666666666666 10C187.69583333333333 10 198.22083333333333 42.5 210.5 42.5C222.77916666666667 42.5 233.30416666666665 37.5 245.58333333333331 37.5C257.86249999999995 37.5 268.3875 2.5 280.66666666666663 2.5C292.9458333333333 2.5 303.4708333333333 37.5 315.75 37.5C328.02916666666664 37.5 338.5541666666667 7.5 350.8333333333333 7.5C363.11249999999995 7.5 373.6375 30 385.91666666666663 30C398.1958333333333 30 408.7208333333333 7.5 421 7.5C421 7.5 421 7.5 421 7.5 " fill="none" fill-opacity="1" stroke="#3f4254" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasklf5ulojp)" pathTo="M 0 62.5C 12.279166666666665 62.5 22.804166666666664 7.5 35.08333333333333 7.5C 47.3625 7.5 57.88749999999999 80 70.16666666666666 80C 82.44583333333333 80 92.97083333333333 2.5 105.25 2.5C 117.52916666666665 2.5 128.05416666666665 45 140.33333333333331 45C 152.61249999999998 45 163.1375 10 175.41666666666666 10C 187.69583333333333 10 198.22083333333333 42.5 210.5 42.5C 222.77916666666667 42.5 233.30416666666665 37.5 245.58333333333331 37.5C 257.86249999999995 37.5 268.3875 2.5 280.66666666666663 2.5C 292.9458333333333 2.5 303.4708333333333 37.5 315.75 37.5C 328.02916666666664 37.5 338.5541666666667 7.5 350.8333333333333 7.5C 363.11249999999995 7.5 373.6375 30 385.91666666666663 30C 398.1958333333333 30 408.7208333333333 7.5 421 7.5" pathFrom="M -1 150L -1 150L 35.08333333333333 150L 70.16666666666666 150L 105.25 150L 140.33333333333331 150L 175.41666666666666 150L 210.5 150L 245.58333333333331 150L 280.66666666666663 150L 315.75 150L 350.8333333333333 150L 385.91666666666663 150L 421 150" fill-rule="evenodd"></path>
                                          <g id="SvgjsG1230" class="apexcharts-series-markers-wrap" data:realIndex="0">
                                             <g class="apexcharts-series-markers">
                                                <circle id="SvgjsCircle1268" r="0" cx="280.66666666666663" cy="2.5" class="apexcharts-marker w49ci6sq4 no-pointer-events" stroke="#3f4254" fill="#75cc68" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle>
                                             </g>
                                          </g>
                                       </g>
                                       <g id="SvgjsG1231" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine1262" x1="280.16666666666663" y1="0" x2="280.16666666666663" y2="100" stroke="#3f4254" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="280.16666666666663" y="0" width="1" height="100" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line>
                                    <line id="SvgjsLine1263" x1="0" y1="0" x2="421" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1264" x1="0" y1="0" x2="421" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1265" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG1266" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG1267" class="apexcharts-point-annotations"></g>
                                    <rect id="SvgjsRect1269" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect>
                                    <rect id="SvgjsRect1270" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect>
                                 </g>
                                 <g id="SvgjsG1249" class="apexcharts-yaxis" rel="0" transform="translate(-8, 0)">
                                    <g id="SvgjsG1250" class="apexcharts-yaxis-texts-g"></g>
                                 </g>
                                 <rect id="SvgjsRect1261" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                                 <g id="SvgjsG1224" class="apexcharts-annotations"></g>
                              </svg>
                              <div class="apexcharts-legend" style="max-height: 62.5px;"></div>
                              <div class="apexcharts-tooltip apexcharts-theme-light" style="left: 157.948px; top: 5.5px;">
                                 <div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;">Feb 9</div>
                                 <div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex;">
                                    <span class="apexcharts-tooltip-marker" style="background-color: rgb(117, 204, 104);"></span>
                                    <div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;">
                                       <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Sales: </span><span class="apexcharts-tooltip-text-y-value">59K</span></div>
                                       <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                       <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light" style="left: 244.237px; top: 132px;">
                                 <div class="apexcharts-xaxistooltip-text" style="font-family: inherit; font-size: 12px; min-width: 29.3438px;">Feb 9</div>
                              </div>
                              <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                 <div class="apexcharts-yaxistooltip-text"></div>
                              </div>
                           </div>
                        </div>
                        <!--end::Chart-->
                     </div>
                     <!--end::Card body-->
                  </div>
                  <!--end::Card widget 6-->
               </div>
               <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row g-5 g-xl-10 mb-xl-10">
               <!--begin::Col-->
               <div class="col-lg-6 col-xl-6 col-xxl-6 mb-5 mb-xl-0">
                  <!--begin::Card widget 4-->
                  <div class="card overflow-hidden h-100  h mb-5 mb-xl-10">
                     <!--begin::Header-->
                     <div class="card-header pt-5 mb-10">
                        <!--begin::Title-->
                        <div class="card-title d-flex flex-column">
                           <!--begin::Info-->
                           <div class="d-flex align-items-center">
                              <!--begin::Currency-->
                              <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span>
                              <!--end::Currency-->
                              <!--begin::Amount-->
                              <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">
                              @php
                              $active_project = 0;
                              @endphp
                              @foreach($sales_last_month as $the_month_active)
                              @if($the_month_active->status == 1 OR $the_month_active->status == 2)
                              @php
                              $active_project = $active_project + $the_month_active->project_price;
                              @endphp
                              @endif
                              @endforeach
                              {{number_format($active_project, 2)}}
                              </span>
                              <!--end::Badge-->
                           </div>
                           <!--end::Info-->
                           <!--begin::Subtitle-->
                           <span class="text-gray-400 pt-1 fw-semibold fs-6">Active Project</span>
                           <!--end::Subtitle-->
                        </div>
                        <!--end::Title-->
                     </div>
                     <!--end::Header-->
                     <!--begin::Card body-->
                     <div class="card-body pt-2 mb-3 pb-4 d-flex align-items-center">
                        <!--begin::Chart-->
                        <div class="d-flex flex-center me-5 pt-2">
                           <div id="kt_card_widget_4_chart" style="min-width: 70px; min-height: 70px" data-kt-size="70" data-kt-line="11">
                              <span></span>
                              <canvas class="ch" height="70" width="70"></canvas>
                           </div>
                        </div>
                        <!--end::Chart-->
                        <!--begin::Labels-->
                        <div class="d-flex flex-column content-justify-center w-100">
                           <!--begin::Label-->
                           <div class="d-flex fs-6 fw-semibold align-items-center">
                              <!--begin::Bullet-->
                              <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                              <!--end::Bullet-->
                              <!--begin::Label-->
                              <div class="text-gray-500 flex-grow-1 me-4">New</div>
                              <!--end::Label-->
                              <!--begin::Stats-->
                              <div class="fw-bolder text-gray-700 text-xxl-end">
                                 @php
                                 $new_project = 0;
                                 @endphp
                                 @foreach($sales_last_month as $the_month_new_project)
                                 @if($the_month_new_project->status == 1)
                                 @php
                                 $new_project = $new_project + $the_month_new_project->project_price;
                                 @endphp
                                 @endif
                                 @endforeach
                                 <span class="fw-semibold text-gray-400">$</span> {{number_format($new_project, 2)}}
                              </div>
                              <!--end::Stats-->
                           </div>
                           <!--end::Label-->
                           <!--begin::Label-->
                           <div class="d-flex fs-6 fw-semibold align-items-center my-3">
                              <!--begin::Bullet-->
                              <div class="bullet w-8px h-6px rounded-2 bg-warning me-3"></div>
                              <!--end::Bullet-->
                              <!--begin::Label-->
                              <div class="text-gray-500 flex-grow-1 me-4">Revision</div>
                              <!--end::Label-->
                              <!--begin::Stats-->
                              <div class="fw-bolder text-gray-700 text-xxl-end">
                                 @php
                                 $revision_project = 0;
                                 @endphp
                                 @foreach($sales_last_month as $the_month_revision_project)
                                 @if($the_month_revision_project->status == 2)
                                 @php
                                 $revision_project = $revision_project + $the_month_revision_project->project_price;
                                 @endphp
                                 @endif
                                 @endforeach
                                <span class="fw-semibold text-gray-400">$</span> {{number_format($revision_project, 2)}}
                              </div>
                              <!--end::Stats-->
                           </div>
                           <!--end::Label-->
                        </div>
                        <!--end::Labels-->
                     </div>
                     <!--end::Card body-->
                  </div>
                  <!--end::Card widget 4-->
               </div>
               <!--end::Col-->
               <!--begin::Col-->
               <div class="col-lg-6 col-xl-6 col-xxl-6 mb-5 mb-xl-0">
                  <!--begin::Card widget 6-->
                  <div class="card card-flush  h-md-100 mb-5 mb-xl-10">
                     <!--begin::Header-->
                     <div class="card-header mb-10 pt-5">
                        <!--begin::Title-->
                        <div class="card-title d-flex flex-column">
                           <!--begin::Info-->
                           <div class="d-flex align-items-center">
                              <!--begin::Currency-->
                              <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span>
                              <!--end::Currency-->
                              <!--begin::Amount-->
                              <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">
                              @php
                              $cancel_project = 0;
                              @endphp
                              @foreach($sales_last_month as $the_month_cancel_project)
                              @if($the_month_cancel_project->status == 3)
                              @php
                              $cancel_project = $cancel_project + $the_month_cancel_project->project_price;
                              @endphp
                              @endif
                              @endforeach
                              {{number_format($cancel_project, 2)}}
                              </span>
                              <!--end::Amount-->
                           </div>
                           <!--end::Info-->
                           <!--begin::Subtitle-->
                           <span class="text-gray-400 pt-1 fw-semibold fs-6">Current Month Cancel Project</span>
                           <!--end::Subtitle-->
                        </div>
                        <!--end::Title-->
                     </div>
                     <!--end::Header-->
                     <!--begin::Card body-->
                     <div class="card-body mb-3 d-flex align-items-end px-0 pb-0">
                        <!--begin::Chart-->
                        <div id="kt_card_widget_6_chart" class="w-100" style="height: 80px; min-height: 80px;">
                        </div>
                        <!--end::Chart-->
                     </div>
                     <!--end::Card body-->
                  </div>
                  <!--end::Card widget 6-->
               </div>
               <!--end::Col-->
            </div>
            <!--end::Row-->
         </div>
         <!--end::Col-->
      </div>

      <!--begin::Row-->
      <div class="row gy-5 g-xl-10">
         <!--begin::Col-->
         <div class="col-xl-4 mb-5 custom-overflow mb-xl-10">
            <!--begin::Chart widget 29-->
            <div class="card card-flush h-xl-100">
               <!--begin::Header-->
               <div class="card-header py-7">
                  <!--begin::Statistics-->
                  <div class="m-0">
                     <!--begin::Heading-->
                     <div class="d-flex align-items-center mb-2">
                        <!--begin::Title-->
                        <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">
                           @php
                           $total_loan = $loans->sum('money');
                           @endphp
                            {{number_format($total_loan, 2)}} 
                        </span>
                        <!--end::Title-->
                        <span class="d-flex align-items-end text-gray-400 fs-6 fw-semibold">TK</span>
                     </div>
                     <!--end::Heading-->
                     <!--begin::Description-->
                     <span class="fs-6 fw-semibold text-gray-400">Employee Loan</span>
                     <!--end::Description-->
                  </div>
                  <!--end::Statistics-->
                  <!--begin::Toolbar-->
                  <div class="card-toolbar">
                     <!--begin::Menu-->
                     <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                     <i class="ki-outline ki-dots-square fs-1 text-gray-300 me-n1"></i>
                     </button>
                     <!--begin::Menu 2-->
                     <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                           <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">
                              <a href="{{route('admin.loan.manage')}}">View Loan</a>
                           </div>
                        </div>
                        <!--end::Menu item-->
                     </div>
                     <!--end::Menu 2-->
                     <!--end::Menu-->
                  </div>
                  <!--end::Toolbar-->
               </div>
               <!--end::Header-->
               <!--begin::Body-->
               <div class="card-body d-flex align-items-end p-0">
                  <!--begin::Chart-->
                  <div id="kt_charts_widget_29" class="h-300px w-100 min-h-auto ps-7 pe-0 mb-5" style="min-height: 315px;">
                     <div id="apexchartstr2nnxtp" class="apexcharts-canvas apexchartstr2nnxtp apexcharts-theme-light" style="width: 369.25px; height: 300px;">
                        <svg id="SvgjsSvg1024" width="369.25" height="300" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable hovering-zoom" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                           <g id="SvgjsG1026" class="apexcharts-inner apexcharts-graphical" transform="translate(40.5738525390625, 30)">
                              <defs id="SvgjsDefs1025">
                                 <clipPath id="gridRectMasktr2nnxtp">
                                    <rect id="SvgjsRect1030" width="305.5057067871094" height="233.73000000000002" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                 </clipPath>
                                 <clipPath id="forecastMasktr2nnxtp"></clipPath>
                                 <clipPath id="nonForecastMasktr2nnxtp"></clipPath>
                                 <clipPath id="gridRectMarkerMasktr2nnxtp">
                                    <rect id="SvgjsRect1031" width="302.5057067871094" height="234.73000000000002" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                 </clipPath>
                                 <linearGradient id="SvgjsLinearGradient1036" x1="0" y1="0" x2="0" y2="1">
                                    <stop id="SvgjsStop1037" stop-opacity="0.4" stop-color="rgba(231,139,47,0.4)" offset="0"></stop>
                                    <stop id="SvgjsStop1038" stop-opacity="0" stop-color="rgba(255,255,255,0)" offset="0.8"></stop>
                                    <stop id="SvgjsStop1039" stop-opacity="0" stop-color="rgba(255,255,255,0)" offset="1"></stop>
                                 </linearGradient>
                              </defs>
                              <g id="SvgjsG1042" class="apexcharts-xaxis" transform="translate(20, 0)">
                                 <g id="SvgjsG1043" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)">
                                    <text id="SvgjsText1045" font-family="inherit" x="0" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;">
                                       <tspan id="SvgjsTspan1046">Apr 02</tspan>
                                       <title>Apr 02</title>
                                    </text>
                                    <text id="SvgjsText1048" font-family="inherit" x="21.321836199079236" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;">
                                       <tspan id="SvgjsTspan1049"></tspan>
                                       <title></title>
                                    </text>
                                    <text id="SvgjsText1051" font-family="inherit" x="42.64367239815848" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;">
                                       <tspan id="SvgjsTspan1052"></tspan>
                                       <title></title>
                                    </text>
                                    <text id="SvgjsText1054" font-family="inherit" x="63.96550859723772" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;">
                                       <tspan id="SvgjsTspan1055">Apr 05</tspan>
                                       <title>Apr 05</title>
                                    </text>
                                    <text id="SvgjsText1057" font-family="inherit" x="85.28734479631697" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;">
                                       <tspan id="SvgjsTspan1058"></tspan>
                                       <title></title>
                                    </text>
                                    <text id="SvgjsText1060" font-family="inherit" x="106.60918099539622" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;">
                                       <tspan id="SvgjsTspan1061"></tspan>
                                       <title></title>
                                    </text>
                                    <text id="SvgjsText1063" font-family="inherit" x="127.93101719447544" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;">
                                       <tspan id="SvgjsTspan1064">Apr 10</tspan>
                                       <title>Apr 10</title>
                                    </text>
                                    <text id="SvgjsText1066" font-family="inherit" x="149.25285339355466" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;">
                                       <tspan id="SvgjsTspan1067"></tspan>
                                       <title></title>
                                    </text>
                                    <text id="SvgjsText1069" font-family="inherit" x="170.5746895926339" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;">
                                       <tspan id="SvgjsTspan1070"></tspan>
                                       <title></title>
                                    </text>
                                    <text id="SvgjsText1072" font-family="inherit" x="191.89652579171312" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;">
                                       <tspan id="SvgjsTspan1073">Apr 17</tspan>
                                       <title>Apr 17</title>
                                    </text>
                                    <text id="SvgjsText1075" font-family="inherit" x="213.21836199079235" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;">
                                       <tspan id="SvgjsTspan1076"></tspan>
                                       <title></title>
                                    </text>
                                    <text id="SvgjsText1078" font-family="inherit" x="234.54019818987157" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;">
                                       <tspan id="SvgjsTspan1079"></tspan>
                                       <title></title>
                                    </text>
                                    <text id="SvgjsText1081" font-family="inherit" x="255.8620343889508" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;">
                                       <tspan id="SvgjsTspan1082">Apr 20</tspan>
                                       <title>Apr 20</title>
                                    </text>
                                    <text id="SvgjsText1084" font-family="inherit" x="277.18387058803006" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;">
                                       <tspan id="SvgjsTspan1085"></tspan>
                                       <title></title>
                                    </text>
                                    <text id="SvgjsText1087" font-family="inherit" x="298.5057067871093" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;">
                                       <tspan id="SvgjsTspan1088"></tspan>
                                       <title></title>
                                    </text>
                                 </g>
                              </g>
                              <g id="SvgjsG1106" class="apexcharts-grid">
                                 <g id="SvgjsG1107" class="apexcharts-gridlines-horizontal">
                                    <line id="SvgjsLine1109" x1="0" y1="0" x2="298.5057067871094" y2="0" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1110" x1="0" y1="57.682500000000005" x2="298.5057067871094" y2="57.682500000000005" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1111" x1="0" y1="115.36500000000001" x2="298.5057067871094" y2="115.36500000000001" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1112" x1="0" y1="173.0475" x2="298.5057067871094" y2="173.0475" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1113" x1="0" y1="230.73000000000002" x2="298.5057067871094" y2="230.73000000000002" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                 </g>
                                 <g id="SvgjsG1108" class="apexcharts-gridlines-vertical"></g>
                                 <line id="SvgjsLine1115" x1="0" y1="230.73000000000002" x2="298.5057067871094" y2="230.73000000000002" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                 <line id="SvgjsLine1114" x1="0" y1="1" x2="0" y2="230.73000000000002" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                              </g>
                              <g id="SvgjsG1032" class="apexcharts-area-series apexcharts-plot-series">
                                 <g id="SvgjsG1033" class="apexcharts-series" seriesName="Position" data:longestSeries="true" rel="1" data:realIndex="0">
                                    <path id="SvgjsPath1040" d="M0 230.73000000000002L0 153.82C7.462642669677734 153.82 13.859193529401509 64.09166666666664 21.321836199079243 64.09166666666664C28.784478868756977 64.09166666666664 35.18102972848075 64.09166666666664 42.643672398158486 64.09166666666664C50.10631506783622 64.09166666666664 56.502865927559995 102.54666666666665 63.96550859723773 102.54666666666665C71.42815126691546 102.54666666666665 77.82470212663924 102.54666666666665 85.28734479631697 102.54666666666665C92.7499874659947 102.54666666666665 99.14653832571848 153.82 106.60918099539622 153.82C114.07182366507395 153.82 120.46837452479772 153.82 127.93101719447546 153.82C135.3936598641532 153.82 141.79021072387695 102.54666666666665 149.2528533935547 102.54666666666665C156.71549606323242 102.54666666666665 163.1120469229562 102.54666666666665 170.57468959263394 102.54666666666665C178.03733226231168 102.54666666666665 184.43388312203544 51.27333333333331 191.89652579171317 51.27333333333331C199.3591684613909 51.27333333333331 205.7557193211147 51.27333333333331 213.21836199079243 51.27333333333331C220.68100466047017 51.27333333333331 227.07755552019393 102.54666666666665 234.54019818987166 102.54666666666665C242.0028408595494 102.54666666666665 248.39939171927318 102.54666666666665 255.86203438895092 102.54666666666665C263.32467705862865 102.54666666666665 269.72122791835244 76.91 277.1838705880302 76.91C284.6465132577079 76.91 291.04306411743164 76.91 298.5057067871094 76.91C298.5057067871094 76.91 298.5057067871094 76.91 298.5057067871094 230.73000000000002M298.5057067871094 76.91C298.5057067871094 76.91 298.5057067871094 76.91 298.5057067871094 76.91 " fill="url(#SvgjsLinearGradient1036)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasktr2nnxtp)" pathTo="M 0 230.73000000000002L 0 153.82C 7.462642669677734 153.82 13.859193529401509 64.09166666666664 21.321836199079243 64.09166666666664C 28.784478868756977 64.09166666666664 35.18102972848075 64.09166666666664 42.643672398158486 64.09166666666664C 50.10631506783622 64.09166666666664 56.502865927559995 102.54666666666665 63.96550859723773 102.54666666666665C 71.42815126691546 102.54666666666665 77.82470212663924 102.54666666666665 85.28734479631697 102.54666666666665C 92.7499874659947 102.54666666666665 99.14653832571848 153.82 106.60918099539622 153.82C 114.07182366507395 153.82 120.46837452479772 153.82 127.93101719447546 153.82C 135.3936598641532 153.82 141.79021072387695 102.54666666666665 149.2528533935547 102.54666666666665C 156.71549606323242 102.54666666666665 163.1120469229562 102.54666666666665 170.57468959263394 102.54666666666665C 178.03733226231168 102.54666666666665 184.43388312203544 51.27333333333331 191.89652579171317 51.27333333333331C 199.3591684613909 51.27333333333331 205.7557193211147 51.27333333333331 213.21836199079243 51.27333333333331C 220.68100466047017 51.27333333333331 227.07755552019393 102.54666666666665 234.54019818987166 102.54666666666665C 242.0028408595494 102.54666666666665 248.39939171927318 102.54666666666665 255.86203438895092 102.54666666666665C 263.32467705862865 102.54666666666665 269.72122791835244 76.91 277.1838705880302 76.91C 284.6465132577079 76.91 291.04306411743164 76.91 298.5057067871094 76.91C 298.5057067871094 76.91 298.5057067871094 76.91 298.5057067871094 230.73000000000002M 298.5057067871094 76.91z" pathFrom="M -1 256.3666666666667L -1 256.3666666666667L 21.321836199079243 256.3666666666667L 42.643672398158486 256.3666666666667L 63.96550859723773 256.3666666666667L 85.28734479631697 256.3666666666667L 106.60918099539622 256.3666666666667L 127.93101719447546 256.3666666666667L 149.2528533935547 256.3666666666667L 170.57468959263394 256.3666666666667L 191.89652579171317 256.3666666666667L 213.21836199079243 256.3666666666667L 234.54019818987166 256.3666666666667L 255.86203438895092 256.3666666666667L 277.1838705880302 256.3666666666667L 298.5057067871094 256.3666666666667"></path>
                                    <path id="SvgjsPath1041" d="M0 153.82C7.462642669677734 153.82 13.859193529401509 64.09166666666664 21.321836199079243 64.09166666666664C28.784478868756977 64.09166666666664 35.18102972848075 64.09166666666664 42.643672398158486 64.09166666666664C50.10631506783622 64.09166666666664 56.502865927559995 102.54666666666665 63.96550859723773 102.54666666666665C71.42815126691546 102.54666666666665 77.82470212663924 102.54666666666665 85.28734479631697 102.54666666666665C92.7499874659947 102.54666666666665 99.14653832571848 153.82 106.60918099539622 153.82C114.07182366507395 153.82 120.46837452479772 153.82 127.93101719447546 153.82C135.3936598641532 153.82 141.79021072387695 102.54666666666665 149.2528533935547 102.54666666666665C156.71549606323242 102.54666666666665 163.1120469229562 102.54666666666665 170.57468959263394 102.54666666666665C178.03733226231168 102.54666666666665 184.43388312203544 51.27333333333331 191.89652579171317 51.27333333333331C199.3591684613909 51.27333333333331 205.7557193211147 51.27333333333331 213.21836199079243 51.27333333333331C220.68100466047017 51.27333333333331 227.07755552019393 102.54666666666665 234.54019818987166 102.54666666666665C242.0028408595494 102.54666666666665 248.39939171927318 102.54666666666665 255.86203438895092 102.54666666666665C263.32467705862865 102.54666666666665 269.72122791835244 76.91 277.1838705880302 76.91C284.6465132577079 76.91 291.04306411743164 76.91 298.5057067871094 76.91C298.5057067871094 76.91 298.5057067871094 76.91 298.5057067871094 76.91 " fill="none" fill-opacity="1" stroke="#e78b2f" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasktr2nnxtp)" pathTo="M 0 153.82C 7.462642669677734 153.82 13.859193529401509 64.09166666666664 21.321836199079243 64.09166666666664C 28.784478868756977 64.09166666666664 35.18102972848075 64.09166666666664 42.643672398158486 64.09166666666664C 50.10631506783622 64.09166666666664 56.502865927559995 102.54666666666665 63.96550859723773 102.54666666666665C 71.42815126691546 102.54666666666665 77.82470212663924 102.54666666666665 85.28734479631697 102.54666666666665C 92.7499874659947 102.54666666666665 99.14653832571848 153.82 106.60918099539622 153.82C 114.07182366507395 153.82 120.46837452479772 153.82 127.93101719447546 153.82C 135.3936598641532 153.82 141.79021072387695 102.54666666666665 149.2528533935547 102.54666666666665C 156.71549606323242 102.54666666666665 163.1120469229562 102.54666666666665 170.57468959263394 102.54666666666665C 178.03733226231168 102.54666666666665 184.43388312203544 51.27333333333331 191.89652579171317 51.27333333333331C 199.3591684613909 51.27333333333331 205.7557193211147 51.27333333333331 213.21836199079243 51.27333333333331C 220.68100466047017 51.27333333333331 227.07755552019393 102.54666666666665 234.54019818987166 102.54666666666665C 242.0028408595494 102.54666666666665 248.39939171927318 102.54666666666665 255.86203438895092 102.54666666666665C 263.32467705862865 102.54666666666665 269.72122791835244 76.91 277.1838705880302 76.91C 284.6465132577079 76.91 291.04306411743164 76.91 298.5057067871094 76.91" pathFrom="M -1 256.3666666666667L -1 256.3666666666667L 21.321836199079243 256.3666666666667L 42.643672398158486 256.3666666666667L 63.96550859723773 256.3666666666667L 85.28734479631697 256.3666666666667L 106.60918099539622 256.3666666666667L 127.93101719447546 256.3666666666667L 149.2528533935547 256.3666666666667L 170.57468959263394 256.3666666666667L 191.89652579171317 256.3666666666667L 213.21836199079243 256.3666666666667L 234.54019818987166 256.3666666666667L 255.86203438895092 256.3666666666667L 277.1838705880302 256.3666666666667L 298.5057067871094 256.3666666666667" fill-rule="evenodd"></path>
                                    <g id="SvgjsG1034" class="apexcharts-series-markers-wrap" data:realIndex="0">
                                       <g class="apexcharts-series-markers">
                                          <circle id="SvgjsCircle1123" r="0" cx="191.89652579171317" cy="51.27333333333331" class="apexcharts-marker we5dn0mse no-pointer-events" stroke="#e78b2f" fill="#e78b2f" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle>
                                       </g>
                                    </g>
                                 </g>
                                 <g id="SvgjsG1035" class="apexcharts-datalabels" data:realIndex="0"></g>
                              </g>
                              <line id="SvgjsLine1117" x1="191.39652579171317" y1="0" x2="191.39652579171317" y2="230.73000000000002" stroke="#e78b2f" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="191.39652579171317" y="0" width="1" height="230.73000000000002" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line>
                              <line id="SvgjsLine1118" x1="0" y1="0" x2="298.5057067871094" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                              <line id="SvgjsLine1119" x1="0" y1="0" x2="298.5057067871094" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                              <g id="SvgjsG1120" class="apexcharts-yaxis-annotations"></g>
                              <g id="SvgjsG1121" class="apexcharts-xaxis-annotations"></g>
                              <g id="SvgjsG1122" class="apexcharts-point-annotations"></g>
                              <rect id="SvgjsRect1124" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect>
                              <rect id="SvgjsRect1125" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect>
                           </g>
                           <g id="SvgjsG1089" class="apexcharts-yaxis" rel="0" transform="translate(10.5738525390625, 0)">
                              <g id="SvgjsG1090" class="apexcharts-yaxis-texts-g">
                                 <text id="SvgjsText1092" font-family="inherit" x="20" y="31.4" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;">
                                    <tspan id="SvgjsTspan1093">10</tspan>
                                    <title>10</title>
                                 </text>
                                 <text id="SvgjsText1095" font-family="inherit" x="20" y="89.08250000000001" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;">
                                    <tspan id="SvgjsTspan1096">7.75</tspan>
                                    <title>7.75</title>
                                 </text>
                                 <text id="SvgjsText1098" font-family="inherit" x="20" y="146.76500000000001" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;">
                                    <tspan id="SvgjsTspan1099">5.5</tspan>
                                    <title>5.5</title>
                                 </text>
                                 <text id="SvgjsText1101" font-family="inherit" x="20" y="204.44750000000002" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;">
                                    <tspan id="SvgjsTspan1102">3.25</tspan>
                                    <title>3.25</title>
                                 </text>
                                 <text id="SvgjsText1104" font-family="inherit" x="20" y="262.13" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;">
                                    <tspan id="SvgjsTspan1105">1</tspan>
                                    <title>1</title>
                                 </text>
                              </g>
                           </g>
                           <rect id="SvgjsRect1116" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                           <g id="SvgjsG1027" class="apexcharts-annotations"></g>
                        </svg>
                        <div class="apexcharts-legend" style="max-height: 150px;"></div>
                        <div class="apexcharts-tooltip apexcharts-theme-light" style="left: 120.799px; top: 54.2733px;">
                           <div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;">Apr 17</div>
                           <div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex;">
                              <span class="apexcharts-tooltip-marker" style="background-color: rgb(231, 139, 47);"></span>
                              <div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;">
                                 <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Position: </span><span class="apexcharts-tooltip-text-y-value">8</span></div>
                                 <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                 <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                              </div>
                           </div>
                        </div>
                        <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light" style="left: 204.119px; top: 262.73px;">
                           <div class="apexcharts-xaxistooltip-text" style="font-family: inherit; font-size: 12px; min-width: 32.7188px;">Apr 17</div>
                        </div>
                        <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                           <div class="apexcharts-yaxistooltip-text"></div>
                        </div>
                     </div>
                  </div>
                  <!--end::Chart-->
               </div>
               <!--end::Body-->
            </div>
            <!--end::Chart widget 29-->
         </div>
         <!--end::Col-->
         <!--begin::Col-->
         <div class="col-xl-8 custom-overflow mb-5 mb-xl-10">
            <!--begin::Chart widget 11-->
            <div class="card card-flush h-xl-100">
               <!--begin::Header-->
               <div class="card-header pt-5">
                  <!--begin::Title-->
                  <h3 class="card-title align-items-start flex-column">
                     <span class="card-label fw-bold text-dark">Project Overview</span>
                     <span class="text-gray-400 mt-1 fw-semibold fs-6">Completed Project</span>
                  </h3>
                  <!--end::Title-->
                  <!--begin::Toolbar-->
                  <div class="card-toolbar">
                     <ul class="nav" id="kt_chart_widget_11_tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                           <a href="{{route('admin.project.manage')}}" class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1 active">
                              View Project
                           </a>
                        </li>
                     </ul>
                  </div>
                  <!--end::Toolbar-->
               </div>
               <!--end::Header-->
               <!--begin::Body-->
               <div class="card-body pb-0 pt-4">
                  <!--begin::Tab content-->
                  <div class="tab-content">
                     <!--begin::Tab pane-->
                     <div class="tab-pane fade active show" id="kt_chart_widget_11_tab_content_3" role="tabpanel" aria-labelledby="#kt_charts_widget_11_tab_3">
                        <!--begin::Statistics-->
                        <div class="mb-2">
                           <!--begin::Statistics-->
                           <span class="fs-2hx fw-bold d-block text-gray-800 me-2 mb-2 lh-1 ls-n2">
                           @php
                           $total = 0;
                           @endphp
                           @foreach($sales_last_month as $the_month)
                           @if($the_month->status == 4)
                           @php
                           $total = $total + $the_month->project_price;
                           @endphp
                           @endif
                           @endforeach
                           $ {{number_format($total, 2)}}
                           </span>
                           <!--end::Statistics-->
                           <!--begin::Description-->
                           <span class="fs-6 fw-semibold text-gray-400">Completed in Current Month</span>
                           <!--end::Description-->
                        </div>
                        <!--end::Statistics-->
                        <!--begin::Chart-->
                        <div id="kt_charts_widget_11_chart_3" class="ms-n5 me-n3 min-h-auto" style="height: 300px; min-height: 315px;">
                           <div id="apexcharts42xq14n3" class="apexcharts-canvas apexcharts42xq14n3 apexcharts-theme-light" style="width: 783px; height: 300px;">
                              <svg id="SvgjsSvg1006" width="783" height="300" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                 <g id="SvgjsG1008" class="apexcharts-inner apexcharts-graphical" transform="translate(43.015625, 30)">
                                    <defs id="SvgjsDefs1007">
                                       <clipPath id="gridRectMask42xq14n3">
                                          <rect id="SvgjsRect1013" width="736.984375" height="223.74133333333333" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                       </clipPath>
                                       <clipPath id="forecastMask42xq14n3"></clipPath>
                                       <clipPath id="nonForecastMask42xq14n3"></clipPath>
                                       <clipPath id="gridRectMarkerMask42xq14n3">
                                          <rect id="SvgjsRect1014" width="733.984375" height="224.74133333333333" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                       </clipPath>
                                       <linearGradient id="SvgjsLinearGradient1019" x1="0" y1="0" x2="0" y2="1">
                                          <stop id="SvgjsStop1020" stop-opacity="0.4" stop-color="rgba(117,204,104,0.4)" offset="0"></stop>
                                          <stop id="SvgjsStop1021" stop-opacity="0" stop-color="rgba(255,255,255,0)" offset="0.8"></stop>
                                          <stop id="SvgjsStop1022" stop-opacity="0" stop-color="rgba(255,255,255,0)" offset="1"></stop>
                                       </linearGradient>
                                    </defs>
                                    <g id="SvgjsG1025" class="apexcharts-xaxis" transform="translate(0, 0)">
                                       <g id="SvgjsG1026" class="apexcharts-xaxis-texts-g" transform="translate(0, -10)">
                                          <text id="SvgjsText1028" font-family="inherit" x="0" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1029"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1031" font-family="inherit" x="25.171875" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1032"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1034" font-family="inherit" x="50.34375" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1035"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1037" font-family="inherit" x="75.515625" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1038"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1040" font-family="inherit" x="100.6875" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1041"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1043" font-family="inherit" x="125.859375" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 126.859375 237.7413330078125)">
                                             <tspan id="SvgjsTspan1044">Apr 06</tspan>
                                             <title>Apr 06</title>
                                          </text>
                                          <text id="SvgjsText1046" font-family="inherit" x="151.03125" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1047"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1049" font-family="inherit" x="176.203125" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1050"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1052" font-family="inherit" x="201.375" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1053"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1055" font-family="inherit" x="226.546875" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1056"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1058" font-family="inherit" x="251.71875" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 252.71875 237.7413330078125)">
                                             <tspan id="SvgjsTspan1059">Apr 10</tspan>
                                             <title>Apr 10</title>
                                          </text>
                                          <text id="SvgjsText1061" font-family="inherit" x="276.890625" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1062"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1064" font-family="inherit" x="302.0625" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1065"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1067" font-family="inherit" x="327.234375" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1068"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1070" font-family="inherit" x="352.40625" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1071"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1073" font-family="inherit" x="377.578125" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 378.578125 237.7413330078125)">
                                             <tspan id="SvgjsTspan1074">Apr 14</tspan>
                                             <title>Apr 14</title>
                                          </text>
                                          <text id="SvgjsText1076" font-family="inherit" x="402.75" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1077"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1079" font-family="inherit" x="427.921875" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1080"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1082" font-family="inherit" x="453.09375" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1083"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1085" font-family="inherit" x="478.265625" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1086"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1088" font-family="inherit" x="503.4375" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 504.4375 237.7413330078125)">
                                             <tspan id="SvgjsTspan1089">Apr 18</tspan>
                                             <title>Apr 18</title>
                                          </text>
                                          <text id="SvgjsText1091" font-family="inherit" x="528.609375" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1092"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1094" font-family="inherit" x="553.78125" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1095"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1097" font-family="inherit" x="578.953125" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1098"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1100" font-family="inherit" x="604.125" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1101"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1103" font-family="inherit" x="629.296875" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 630.3565063476562 237.7413330078125)">
                                             <tspan id="SvgjsTspan1104">Apr 22</tspan>
                                             <title>Apr 22</title>
                                          </text>
                                          <text id="SvgjsText1106" font-family="inherit" x="654.46875" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1107"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1109" font-family="inherit" x="679.640625" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1110"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1112" font-family="inherit" x="704.8125" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1113"></tspan>
                                             <title></title>
                                          </text>
                                          <text id="SvgjsText1115" font-family="inherit" x="729.984375" y="243.74133333333333" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)">
                                             <tspan id="SvgjsTspan1116"></tspan>
                                             <title></title>
                                          </text>
                                       </g>
                                    </g>
                                    <g id="SvgjsG1134" class="apexcharts-grid">
                                       <g id="SvgjsG1135" class="apexcharts-gridlines-horizontal">
                                          <line id="SvgjsLine1137" x1="0" y1="0" x2="729.984375" y2="0" stroke="#e1e3ea" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                          <line id="SvgjsLine1138" x1="0" y1="55.18533333333333" x2="729.984375" y2="55.18533333333333" stroke="#e1e3ea" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                          <line id="SvgjsLine1139" x1="0" y1="110.37066666666666" x2="729.984375" y2="110.37066666666666" stroke="#e1e3ea" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                          <line id="SvgjsLine1140" x1="0" y1="165.55599999999998" x2="729.984375" y2="165.55599999999998" stroke="#e1e3ea" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                          <line id="SvgjsLine1141" x1="0" y1="220.74133333333333" x2="729.984375" y2="220.74133333333333" stroke="#e1e3ea" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                       </g>
                                       <g id="SvgjsG1136" class="apexcharts-gridlines-vertical"></g>
                                       <line id="SvgjsLine1143" x1="0" y1="220.74133333333333" x2="729.984375" y2="220.74133333333333" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                       <line id="SvgjsLine1142" x1="0" y1="1" x2="0" y2="220.74133333333333" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG1015" class="apexcharts-area-series apexcharts-plot-series">
                                       <g id="SvgjsG1016" class="apexcharts-series" seriesName="Deliveries" data:longestSeries="true" rel="1" data:realIndex="0">
                                          <path id="SvgjsPath1023" d="M0 220.74133333333333L0 110.37066666666664C8.810156249999999 110.37066666666664 16.36171875 63.06895238095234 25.171875 63.06895238095234C33.98203125 63.06895238095234 41.53359375 63.06895238095234 50.34375 63.06895238095234C59.15390625 63.06895238095234 66.70546875 78.83619047619044 75.515625 78.83619047619044C84.32578125 78.83619047619044 91.87734375 78.83619047619044 100.6875 78.83619047619044C109.49765625 78.83619047619044 117.04921875 110.37066666666664 125.859375 110.37066666666664C134.66953125 110.37066666666664 142.22109375 110.37066666666664 151.03125 110.37066666666664C159.84140625 110.37066666666664 167.39296875 78.83619047619044 176.203125 78.83619047619044C185.01328125 78.83619047619044 192.56484375 78.83619047619044 201.375 78.83619047619044C210.18515625 78.83619047619044 217.73671875 47.30171428571424 226.546875 47.30171428571424C235.35703125 47.30171428571424 242.90859375 47.30171428571424 251.71875 47.30171428571424C260.52890625 47.30171428571424 268.08046875 78.83619047619044 276.890625 78.83619047619044C285.70078125 78.83619047619044 293.25234375 78.83619047619044 302.0625 78.83619047619044C310.87265625 78.83619047619044 318.42421875 47.30171428571424 327.234375 47.30171428571424C336.04453125 47.30171428571424 343.59609375 47.30171428571424 352.40625 47.30171428571424C361.21640625 47.30171428571424 368.76796875 94.60342857142854 377.578125 94.60342857142854C386.38828125 94.60342857142854 393.93984375 94.60342857142854 402.75 94.60342857142854C411.56015625 94.60342857142854 419.11171875 126.13790476190474 427.921875 126.13790476190474C436.73203125 126.13790476190474 444.28359375 110.37066666666664 453.09375 110.37066666666664C461.90390625 110.37066666666664 469.45546875 110.37066666666664 478.265625 110.37066666666664C487.07578125 110.37066666666664 494.62734375 78.83619047619044 503.4375 78.83619047619044C512.24765625 78.83619047619044 519.79921875 78.83619047619044 528.609375 78.83619047619044C537.41953125 78.83619047619044 544.97109375 47.30171428571424 553.78125 47.30171428571424C562.59140625 47.30171428571424 570.14296875 47.30171428571424 578.953125 47.30171428571424C587.76328125 47.30171428571424 595.31484375 78.83619047619044 604.125 78.83619047619044C612.93515625 78.83619047619044 620.48671875 78.83619047619044 629.296875 78.83619047619044C638.10703125 78.83619047619044 645.65859375 110.37066666666664 654.46875 110.37066666666664C663.27890625 110.37066666666664 670.83046875 110.37066666666664 679.640625 110.37066666666664C688.45078125 110.37066666666664 696.00234375 94.60342857142854 704.8125 94.60342857142854C713.62265625 94.60342857142854 721.17421875 94.60342857142854 729.984375 94.60342857142854C729.984375 94.60342857142854 729.984375 94.60342857142854 729.984375 220.74133333333333M729.984375 94.60342857142854C729.984375 94.60342857142854 729.984375 94.60342857142854 729.984375 94.60342857142854 " fill="url(#SvgjsLinearGradient1019)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask42xq14n3)" pathTo="M 0 220.74133333333333L 0 110.37066666666664C 8.810156249999999 110.37066666666664 16.36171875 63.06895238095234 25.171875 63.06895238095234C 33.98203125 63.06895238095234 41.53359375 63.06895238095234 50.34375 63.06895238095234C 59.15390625 63.06895238095234 66.70546875 78.83619047619044 75.515625 78.83619047619044C 84.32578125 78.83619047619044 91.87734375 78.83619047619044 100.6875 78.83619047619044C 109.49765625 78.83619047619044 117.04921875 110.37066666666664 125.859375 110.37066666666664C 134.66953125 110.37066666666664 142.22109375 110.37066666666664 151.03125 110.37066666666664C 159.84140625 110.37066666666664 167.39296875 78.83619047619044 176.203125 78.83619047619044C 185.01328125 78.83619047619044 192.56484375 78.83619047619044 201.375 78.83619047619044C 210.18515625 78.83619047619044 217.73671875 47.30171428571424 226.546875 47.30171428571424C 235.35703125 47.30171428571424 242.90859375 47.30171428571424 251.71875 47.30171428571424C 260.52890625 47.30171428571424 268.08046875 78.83619047619044 276.890625 78.83619047619044C 285.70078125 78.83619047619044 293.25234375 78.83619047619044 302.0625 78.83619047619044C 310.87265625 78.83619047619044 318.42421875 47.30171428571424 327.234375 47.30171428571424C 336.04453125 47.30171428571424 343.59609375 47.30171428571424 352.40625 47.30171428571424C 361.21640625 47.30171428571424 368.76796875 94.60342857142854 377.578125 94.60342857142854C 386.38828125 94.60342857142854 393.93984375 94.60342857142854 402.75 94.60342857142854C 411.56015625 94.60342857142854 419.11171875 126.13790476190474 427.921875 126.13790476190474C 436.73203125 126.13790476190474 444.28359375 110.37066666666664 453.09375 110.37066666666664C 461.90390625 110.37066666666664 469.45546875 110.37066666666664 478.265625 110.37066666666664C 487.07578125 110.37066666666664 494.62734375 78.83619047619044 503.4375 78.83619047619044C 512.24765625 78.83619047619044 519.79921875 78.83619047619044 528.609375 78.83619047619044C 537.41953125 78.83619047619044 544.97109375 47.30171428571424 553.78125 47.30171428571424C 562.59140625 47.30171428571424 570.14296875 47.30171428571424 578.953125 47.30171428571424C 587.76328125 47.30171428571424 595.31484375 78.83619047619044 604.125 78.83619047619044C 612.93515625 78.83619047619044 620.48671875 78.83619047619044 629.296875 78.83619047619044C 638.10703125 78.83619047619044 645.65859375 110.37066666666664 654.46875 110.37066666666664C 663.27890625 110.37066666666664 670.83046875 110.37066666666664 679.640625 110.37066666666664C 688.45078125 110.37066666666664 696.00234375 94.60342857142854 704.8125 94.60342857142854C 713.62265625 94.60342857142854 721.17421875 94.60342857142854 729.984375 94.60342857142854C 729.984375 94.60342857142854 729.984375 94.60342857142854 729.984375 220.74133333333333M 729.984375 94.60342857142854z" pathFrom="M -1 378.41371428571426L -1 378.41371428571426L 25.171875 378.41371428571426L 50.34375 378.41371428571426L 75.515625 378.41371428571426L 100.6875 378.41371428571426L 125.859375 378.41371428571426L 151.03125 378.41371428571426L 176.203125 378.41371428571426L 201.375 378.41371428571426L 226.546875 378.41371428571426L 251.71875 378.41371428571426L 276.890625 378.41371428571426L 302.0625 378.41371428571426L 327.234375 378.41371428571426L 352.40625 378.41371428571426L 377.578125 378.41371428571426L 402.75 378.41371428571426L 427.921875 378.41371428571426L 453.09375 378.41371428571426L 478.265625 378.41371428571426L 503.4375 378.41371428571426L 528.609375 378.41371428571426L 553.78125 378.41371428571426L 578.953125 378.41371428571426L 604.125 378.41371428571426L 629.296875 378.41371428571426L 654.46875 378.41371428571426L 679.640625 378.41371428571426L 704.8125 378.41371428571426L 729.984375 378.41371428571426"></path>
                                          <path id="SvgjsPath1024" d="M0 110.37066666666664C8.810156249999999 110.37066666666664 16.36171875 63.06895238095234 25.171875 63.06895238095234C33.98203125 63.06895238095234 41.53359375 63.06895238095234 50.34375 63.06895238095234C59.15390625 63.06895238095234 66.70546875 78.83619047619044 75.515625 78.83619047619044C84.32578125 78.83619047619044 91.87734375 78.83619047619044 100.6875 78.83619047619044C109.49765625 78.83619047619044 117.04921875 110.37066666666664 125.859375 110.37066666666664C134.66953125 110.37066666666664 142.22109375 110.37066666666664 151.03125 110.37066666666664C159.84140625 110.37066666666664 167.39296875 78.83619047619044 176.203125 78.83619047619044C185.01328125 78.83619047619044 192.56484375 78.83619047619044 201.375 78.83619047619044C210.18515625 78.83619047619044 217.73671875 47.30171428571424 226.546875 47.30171428571424C235.35703125 47.30171428571424 242.90859375 47.30171428571424 251.71875 47.30171428571424C260.52890625 47.30171428571424 268.08046875 78.83619047619044 276.890625 78.83619047619044C285.70078125 78.83619047619044 293.25234375 78.83619047619044 302.0625 78.83619047619044C310.87265625 78.83619047619044 318.42421875 47.30171428571424 327.234375 47.30171428571424C336.04453125 47.30171428571424 343.59609375 47.30171428571424 352.40625 47.30171428571424C361.21640625 47.30171428571424 368.76796875 94.60342857142854 377.578125 94.60342857142854C386.38828125 94.60342857142854 393.93984375 94.60342857142854 402.75 94.60342857142854C411.56015625 94.60342857142854 419.11171875 126.13790476190474 427.921875 126.13790476190474C436.73203125 126.13790476190474 444.28359375 110.37066666666664 453.09375 110.37066666666664C461.90390625 110.37066666666664 469.45546875 110.37066666666664 478.265625 110.37066666666664C487.07578125 110.37066666666664 494.62734375 78.83619047619044 503.4375 78.83619047619044C512.24765625 78.83619047619044 519.79921875 78.83619047619044 528.609375 78.83619047619044C537.41953125 78.83619047619044 544.97109375 47.30171428571424 553.78125 47.30171428571424C562.59140625 47.30171428571424 570.14296875 47.30171428571424 578.953125 47.30171428571424C587.76328125 47.30171428571424 595.31484375 78.83619047619044 604.125 78.83619047619044C612.93515625 78.83619047619044 620.48671875 78.83619047619044 629.296875 78.83619047619044C638.10703125 78.83619047619044 645.65859375 110.37066666666664 654.46875 110.37066666666664C663.27890625 110.37066666666664 670.83046875 110.37066666666664 679.640625 110.37066666666664C688.45078125 110.37066666666664 696.00234375 94.60342857142854 704.8125 94.60342857142854C713.62265625 94.60342857142854 721.17421875 94.60342857142854 729.984375 94.60342857142854C729.984375 94.60342857142854 729.984375 94.60342857142854 729.984375 94.60342857142854 " fill="none" fill-opacity="1" stroke="#75cc68" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask42xq14n3)" pathTo="M 0 110.37066666666664C 8.810156249999999 110.37066666666664 16.36171875 63.06895238095234 25.171875 63.06895238095234C 33.98203125 63.06895238095234 41.53359375 63.06895238095234 50.34375 63.06895238095234C 59.15390625 63.06895238095234 66.70546875 78.83619047619044 75.515625 78.83619047619044C 84.32578125 78.83619047619044 91.87734375 78.83619047619044 100.6875 78.83619047619044C 109.49765625 78.83619047619044 117.04921875 110.37066666666664 125.859375 110.37066666666664C 134.66953125 110.37066666666664 142.22109375 110.37066666666664 151.03125 110.37066666666664C 159.84140625 110.37066666666664 167.39296875 78.83619047619044 176.203125 78.83619047619044C 185.01328125 78.83619047619044 192.56484375 78.83619047619044 201.375 78.83619047619044C 210.18515625 78.83619047619044 217.73671875 47.30171428571424 226.546875 47.30171428571424C 235.35703125 47.30171428571424 242.90859375 47.30171428571424 251.71875 47.30171428571424C 260.52890625 47.30171428571424 268.08046875 78.83619047619044 276.890625 78.83619047619044C 285.70078125 78.83619047619044 293.25234375 78.83619047619044 302.0625 78.83619047619044C 310.87265625 78.83619047619044 318.42421875 47.30171428571424 327.234375 47.30171428571424C 336.04453125 47.30171428571424 343.59609375 47.30171428571424 352.40625 47.30171428571424C 361.21640625 47.30171428571424 368.76796875 94.60342857142854 377.578125 94.60342857142854C 386.38828125 94.60342857142854 393.93984375 94.60342857142854 402.75 94.60342857142854C 411.56015625 94.60342857142854 419.11171875 126.13790476190474 427.921875 126.13790476190474C 436.73203125 126.13790476190474 444.28359375 110.37066666666664 453.09375 110.37066666666664C 461.90390625 110.37066666666664 469.45546875 110.37066666666664 478.265625 110.37066666666664C 487.07578125 110.37066666666664 494.62734375 78.83619047619044 503.4375 78.83619047619044C 512.24765625 78.83619047619044 519.79921875 78.83619047619044 528.609375 78.83619047619044C 537.41953125 78.83619047619044 544.97109375 47.30171428571424 553.78125 47.30171428571424C 562.59140625 47.30171428571424 570.14296875 47.30171428571424 578.953125 47.30171428571424C 587.76328125 47.30171428571424 595.31484375 78.83619047619044 604.125 78.83619047619044C 612.93515625 78.83619047619044 620.48671875 78.83619047619044 629.296875 78.83619047619044C 638.10703125 78.83619047619044 645.65859375 110.37066666666664 654.46875 110.37066666666664C 663.27890625 110.37066666666664 670.83046875 110.37066666666664 679.640625 110.37066666666664C 688.45078125 110.37066666666664 696.00234375 94.60342857142854 704.8125 94.60342857142854C 713.62265625 94.60342857142854 721.17421875 94.60342857142854 729.984375 94.60342857142854" pathFrom="M -1 378.41371428571426L -1 378.41371428571426L 25.171875 378.41371428571426L 50.34375 378.41371428571426L 75.515625 378.41371428571426L 100.6875 378.41371428571426L 125.859375 378.41371428571426L 151.03125 378.41371428571426L 176.203125 378.41371428571426L 201.375 378.41371428571426L 226.546875 378.41371428571426L 251.71875 378.41371428571426L 276.890625 378.41371428571426L 302.0625 378.41371428571426L 327.234375 378.41371428571426L 352.40625 378.41371428571426L 377.578125 378.41371428571426L 402.75 378.41371428571426L 427.921875 378.41371428571426L 453.09375 378.41371428571426L 478.265625 378.41371428571426L 503.4375 378.41371428571426L 528.609375 378.41371428571426L 553.78125 378.41371428571426L 578.953125 378.41371428571426L 604.125 378.41371428571426L 629.296875 378.41371428571426L 654.46875 378.41371428571426L 679.640625 378.41371428571426L 704.8125 378.41371428571426L 729.984375 378.41371428571426" fill-rule="evenodd"></path>
                                          <g id="SvgjsG1017" class="apexcharts-series-markers-wrap" data:realIndex="0">
                                             <g class="apexcharts-series-markers">
                                                <circle id="SvgjsCircle1151" r="0" cx="25.171875" cy="63.06895238095234" class="apexcharts-marker w37ty99au no-pointer-events" stroke="#75cc68" fill="#75cc68" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle>
                                             </g>
                                          </g>
                                       </g>
                                       <g id="SvgjsG1018" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine1145" x1="24.671875" y1="0" x2="24.671875" y2="220.74133333333333" stroke="#75cc68" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="24.671875" y="0" width="1" height="220.74133333333333" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line>
                                    <line id="SvgjsLine1146" x1="0" y1="0" x2="729.984375" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1147" x1="0" y1="0" x2="729.984375" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1148" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG1149" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG1150" class="apexcharts-point-annotations"></g>
                                    <rect id="SvgjsRect1152" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect>
                                    <rect id="SvgjsRect1153" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect>
                                 </g>
                                 <g id="SvgjsG1117" class="apexcharts-yaxis" rel="0" transform="translate(13.015625, 0)">
                                    <g id="SvgjsG1118" class="apexcharts-yaxis-texts-g">
                                       <text id="SvgjsText1120" font-family="inherit" x="20" y="31.4" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;">
                                          <tspan id="SvgjsTspan1121">24</tspan>
                                          <title>24</title>
                                       </text>
                                       <text id="SvgjsText1123" font-family="inherit" x="20" y="86.58533333333334" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;">
                                          <tspan id="SvgjsTspan1124">21</tspan>
                                          <title>21</title>
                                       </text>
                                       <text id="SvgjsText1126" font-family="inherit" x="20" y="141.77066666666667" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;">
                                          <tspan id="SvgjsTspan1127">17</tspan>
                                          <title>17</title>
                                       </text>
                                       <text id="SvgjsText1129" font-family="inherit" x="20" y="196.956" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;">
                                          <tspan id="SvgjsTspan1130">14</tspan>
                                          <title>14</title>
                                       </text>
                                       <text id="SvgjsText1132" font-family="inherit" x="20" y="252.14133333333334" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;">
                                          <tspan id="SvgjsTspan1133">10</tspan>
                                          <title>10</title>
                                       </text>
                                    </g>
                                 </g>
                                 <rect id="SvgjsRect1144" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                                 <g id="SvgjsG1009" class="apexcharts-annotations"></g>
                              </svg>
                              <div class="apexcharts-legend" style="max-height: 150px;"></div>
                              <div class="apexcharts-tooltip apexcharts-theme-light" style="left: 79.1875px; top: 66.069px;">
                                 <div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;">Apr 02</div>
                                 <div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex;">
                                    <span class="apexcharts-tooltip-marker" style="background-color: rgb(117, 204, 104);"></span>
                                    <div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;">
                                       <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Deliveries: </span><span class="apexcharts-tooltip-text-y-value">20</span></div>
                                       <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                       <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light" style="left: 37.0859px; top: 252.741px;">
                                 <div class="apexcharts-xaxistooltip-text" style="font-family: inherit; font-size: 13px; min-width: 35.2031px;">Apr 02</div>
                              </div>
                              <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                 <div class="apexcharts-yaxistooltip-text"></div>
                              </div>
                           </div>
                        </div>
                        <!--end::Chart-->
                     </div>
                     <!--end::Tab pane-->
                  </div>
                  <!--end::Tab content-->
               </div>
               <!--end::Body-->
            </div>
            <!--end::Chart widget 11-->
         </div>
         <!--end::Col-->
      </div>
   </div>
   <!--end::Content container-->
</div>
@endsection