@extends('layouts.dashboard')
@section('title-ar' , 'السيرة الذاتيةلـ عبدالله')
@section('title-en' , 'Abdallah CV')

@section('content')
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center my-3">
                <div class="col">
                  <h2 class="page-title">Calendar</h2>
                </div>
                <div class="col-auto">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventModal"><span class="fe fe-plus fe-16 mr-3"></span>New Event</button>
                </div>
              </div>
              <div id="calendar"></div>
              <!-- new event modal -->
              <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="varyModalLabel">New Event</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body p-4">
                    <form action="/storevents" method="post" id="form"  >
                    @csrf
                        <div class="form-group">
                          <label for="eventTitle" class="col-form-label">Title <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i></label>
                          <input type="text" class="form-control" id="eventTitle" name="eventTitle" placeholder="Add event title" required>
                        </div>
                        <div class="form-group">
                          <label for="eventNote" class="col-form-label">Note </label>
                          <textarea class="form-control" id="eventNote" name="eventNote" placeholder="Add some note for your event"></textarea>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="date-input1">Choose the color of event <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i></label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                              <div class="input-group-text"><span class="fa-solid fa-eye-dropper"></span></div>
                              </div>
                              <input type="color" class="form-control form-control-color " id="eventColor" name="eventColor" value="#CCCCCC" title="Choose a color" required>
                            </div>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="date-input1">Start Date <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i></label>
                            <div class="input-group">
                              <input type="datetime-local" class="form-control drgpicker" id="drgpickerstart" name="drgpickerstart" required>
                            </div>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="date-input1">End Date <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i></label>
                            <div class="input-group">
                              <input type="datetime-local" class="form-control drgpicker" id="drgpickerend" name="drgpickerend" required>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="RepeatSwitch" checked>
                        <label class="custom-control-label" for="RepeatSwitch">All day</label>
                      </div>
                      <button type="submit" class="btn mb-2 btn-primary">Save Event</button>
                    </div>
                    </form>

                  </div>
                </div>
              </div> <!-- new event modal -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->

       
@endsection  


@section('script')
<script>
   $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
      /** full calendar */
      var calendarEl = document.getElementById('calendar');
      if (calendarEl)
      {
        document.addEventListener('DOMContentLoaded', function()
        {
          var calendar = new FullCalendar.Calendar(calendarEl,
          {
            plugins: ['dayGrid', 'timeGrid', 'list', 'bootstrap'],
            timeZone: 'UTC',
            themeSystem: 'bootstrap',
            header:
            {
              left: 'today, prev, next',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            buttonIcons:
            {
              prev: 'fe-arrow-left',
              next: 'fe-arrow-right',
              prevYear: 'left-double-arrow',
              nextYear: 'right-double-arrow'
            },
            weekNumbers: true,
            eventLimit: true, // allow "more" link when too many events
            // ===========================================================================================
            eventClick: function(info) {
              var eventObj = info.event;  
                Swal.fire({
                  title: 'Event: '+eventObj.title,
                  text: eventObj.extendedProps.description,
                  showDenyButton: true,
                  confirmButtonText: 'Cool',
                  denyButtonText: `DELETE`
                }).then((result) => {
                  if (result.isConfirmed) {
                    // Swal.fire("Saved!", "", "success");
                  } else if (result.isDenied) {
                    const swalWithBootstrapButtons = Swal.mixin({
                      customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                      },
                      buttonsStyling: false
                    });
                    swalWithBootstrapButtons.fire({
                      title: "Are you sure?",
                      text: "You won't be able to revert this!",
                      icon: "warning",
                      showCancelButton: true,
                      confirmButtonText: "Yes, delete it!",
                      cancelButtonText: "No, cancel!",
                      reverseButtons: true
                    }).then((result) => {
                      if (result.isConfirmed) {
                        $.ajax({
                            url: "{{route('remove_event','')}}"+'/'+eventObj.id,
                            type: "get",
                            success: function (res) {
                              location.reload();
                              Swal.fire("Deleted!", "Your Event has been deleted.", "success");
                            }
                        });
 
                      } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                      ) {
                        swalWithBootstrapButtons.fire({
                          title: "Cancelled",
                          text: "Your imaginary Event is safe :)",
                          icon: "error"
                        });
                      }
                    });
                  }
                })
              
            },
            events:  <?= $events ?> ,
          });
          calendar.render();
        });
      }
    </script>
 
@endsection  
