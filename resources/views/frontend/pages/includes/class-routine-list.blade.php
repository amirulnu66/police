<div class="panel panel-info routine-panel">
   <div class="panel-heading student-pane2">
       <h3 class="class-routine-title"> ক্লাস রুটিন
           
           </h3>
   </div>
   <div class="table-overflow">
       @if(!empty($dayList) AND count($dayList)>0 AND !empty($periodList) AND count($periodList)>0)
           <table class="table table-bordered table-hover">
               <thead>
               <tr>
                   <th class="text-center" width="12%">#</th>
                   {{--period looping--}}
                   @foreach($periodList as $periodId=>$periodName)
                       <th class="text-center">{{$periodName}}</th>
                   @endforeach
               </tr>
               </thead>
               <tbody>
               {{--day looping--}}
               @foreach($dayList as $dayId=>$dayName)
                   <tr>
                       <td>{{$dayName}}</td>
                       {{--day timetable list--}}
                       @php $dayTimeTableList = $timeTableList->$dayId; @endphp
                       {{--day timetable array list--}}
                       @php $dayTimeTableArrayList = []; @endphp
                       {{--checking day timetable--}}
                       @if(!empty($dayTimeTableList) AND count($dayTimeTableList)>0)
                           {{--day timetable looping--}}
                           @foreach($dayTimeTableList as $periodId=>$timetableDetails)
                               {{--day timetable array list making--}}
                               @php $dayTimeTableArrayList[$periodId] = $timetableDetails; @endphp
                           @endforeach
                       @endif

                       {{--period looping--}}
                       @foreach($periodList as $periodId=>$periodName)
                           {{--checking day timetable--}}
                           @if(array_key_exists($periodId, $dayTimeTableArrayList)==true)
                               {{--period time table detiail--}}
                               @php $periodTimeTable = $dayTimeTableList->$periodId; @endphp
                               {{--timetable info--}}
                               @if(count($periodTimeTable)>0)
                                   <td>
                                       {{$periodTimeTable->subject_code}}<br/>
                                       ({{$periodTimeTable->teacher_alias}})
                                   </td>
                               @else
                                   <td> - </td>
                               @endif
                           @else
                               <td> - </td>
                           @endif
                       @endforeach
                   </tr>
               @endforeach
               </tbody>
           </table>
       @else
           <br/>
           <div id="w0-success-0" class="alert-warning alert-auto-hide alert fade in text-center" style="opacity: 423.642; margin: 10px;">
               <h4><i class="fa fa-warning"></i> No result found. </h4>
           </div>
       @endif
   </div>
</div>