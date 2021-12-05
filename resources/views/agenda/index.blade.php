@extends('layout.app')

@section('main')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <livewire:agenda.index />
                </div>
                <!-- /.col -->


            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection

@push('styles')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('plugins/dropzone/min/dropzone.min.css') }}">
    {{-- modal --}}
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">

    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- fullCalendar 2.2.5 -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/fullcalendar/main.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                editable: true,
                dayHeaders: true,
                selectable: true,
                events:[
                    {
                        id:'1',
                        title:'Exmple',
                        start:'2021-12-04',
                        end:'2021-12-04'
                    },
                    {
                        id:'2',
                        title:'Mariage de Monsieur Digbeu',
                        start:'2021-12-01',
                        end:'2021-12-02'
                    }

                ],
                initialView: 'dayGridMonth' //dayGridMonth, dayGrid, dayGridDay, dayGridWeek
            });

            calendar.on('dateClick', function(info) {
              console.log(info);
              console.log(calendar.view.type);

              console.log(calendar.view.type);
            });
            calendar.setOption('locale', 'fr');
            calendar.render();
        });



    </script>
    <livewire:styles />
@endpush


@push('scripts')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
    <!-- BS-Stepper -->
    <script src="{{ asset('plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
    <!-- dropzonejs -->
    <script src="{{ asset('plugins/dropzone/min/dropzone.min.js') }}"></script>

    <!-- SweetAlert2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            //Date and time picker
            moment.locale('fr_fr')
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock',
                    format: 'DD/MM/YYYY HH:mm:ss',
                    format: 'LT'
                }
            });


            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)
        }
    </script>

    <!-- Page specific script -->
    <script>
        $(function() {

            //   /* initialize the external events
            //    -----------------------------------------------------------------*/
            //   function ini_events(ele) {
            //     ele.each(function () {

            //       // create an Event Object (https://fullcalendar.io/docs/event-object)
            //       // it doesn't need to have a start or end
            //       var eventObject = {
            //         title: $.trim($(this).text()) // use the element's text as the event title
            //       }

            //       // store the Event Object in the DOM element so we can get to it later
            //       $(this).data('eventObject', eventObject)

            //       // make the event draggable using jQuery UI
            //       $(this).draggable({
            //         zIndex        : 1070,
            //         revert        : true, // will cause the event to go back to its
            //         revertDuration: 0  //  original position after the drag
            //       })

            //     })
            //   }

            //   ini_events($('#external-events div.external-event'))

            //   /* initialize the calendar
            //    -----------------------------------------------------------------*/
            //   //Date for the calendar events (dummy data)
            //   var date = new Date()
            //   var d    = date.getDate(),
            //       m    = date.getMonth(),
            //       y    = date.getFullYear()

            //   var Calendar = FullCalendar.Calendar;
            //   var Draggable = FullCalendar.Draggable;

            //   var containerEl = document.getElementById('external-events');
            //   var checkbox = document.getElementById('drop-remove');
            //   var calendarEl = document.getElementById('calendar');

            //   // initialize the external events
            //   // -----------------------------------------------------------------

            //   new Draggable(containerEl, {
            //     itemSelector: '.external-event',
            //     eventData: function(eventEl) {
            //       return {
            //         title: eventEl.innerText,
            //         backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
            //         borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
            //         textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
            //       };
            //     }
            //   });

            //   var calendar = new Calendar(calendarEl, {
            //     headerToolbar: {
            //       left  : 'prev,next today',
            //       center: 'title',
            //       right : 'dayGridMonth,timeGridWeek,timeGridDay'
            //     },
            //     themeSystem: 'bootstrap',
            //     //Random default events
            //     events: [
            //       {
            //         title          : 'All Day Event',
            //         start          : new Date(y, m, 1),
            //         backgroundColor: '#f56954', //red
            //         borderColor    : '#f56954', //red
            //         allDay         : true
            //       },
            //       {
            //         title          : 'Long Event',
            //         start          : new Date(y, m, d - 5),
            //         end            : new Date(y, m, d - 2),
            //         backgroundColor: '#f39c12', //yellow
            //         borderColor    : '#f39c12' //yellow
            //       },
            //       {
            //         title          : 'Meeting',
            //         start          : new Date(y, m, d, 10, 30),
            //         allDay         : false,
            //         backgroundColor: '#0073b7', //Blue
            //         borderColor    : '#0073b7' //Blue
            //       },
            //       {
            //         title          : 'Lunch',
            //         start          : new Date(y, m, d, 12, 0),
            //         end            : new Date(y, m, d, 14, 0),
            //         allDay         : false,
            //         backgroundColor: '#00c0ef', //Info (aqua)
            //         borderColor    : '#00c0ef' //Info (aqua)
            //       },
            //       {
            //         title          : 'Birthday Party',
            //         start          : new Date(y, m, d + 1, 19, 0),
            //         end            : new Date(y, m, d + 1, 22, 30),
            //         allDay         : false,
            //         backgroundColor: '#00a65a', //Success (green)
            //         borderColor    : '#00a65a' //Success (green)
            //       },
            //       {
            //         title          : 'Click for Google',
            //         start          : new Date(y, m, 28),
            //         end            : new Date(y, m, 29),
            //         url            : 'https://www.google.com/',
            //         backgroundColor: '#3c8dbc', //Primary (light-blue)
            //         borderColor    : '#3c8dbc' //Primary (light-blue)
            //       }
            //     ],
            //     editable  : true,
            //     droppable : true, // this allows things to be dropped onto the calendar !!!
            //     drop      : function(info) {
            //       // is the "remove after drop" checkbox checked?
            //       if (checkbox.checked) {
            //         // if so, remove the element from the "Draggable Events" list
            //         info.draggedEl.parentNode.removeChild(info.draggedEl);
            //       }
            //     }
            //   });

            //   calendar.render();
            //   // $('#calendar').fullCalendar()

            //   /* ADDING EVENTS */
            //   var currColor = '#3c8dbc' //Red by default
            //   // Color chooser button
            //   $('#color-chooser > li > a').click(function (e) {
            //     e.preventDefault()
            //     // Save color
            //     currColor = $(this).css('color')
            //     // Add color effect to button
            //     $('#add-new-event').css({
            //       'background-color': currColor,
            //       'border-color'    : currColor
            //     })
            //   })
            //   $('#add-new-event').click(function (e) {
            //     e.preventDefault()
            //     // Get value and make sure it is not null
            //     var val = $('#new-event').val()
            //     if (val.length == 0) {
            //       return
            //     }

            //     // Create events
            //     var event = $('<div />')
            //     event.css({
            //       'background-color': currColor,
            //       'border-color'    : currColor,
            //       'color'           : '#fff'
            //     }).addClass('external-event')
            //     event.text(val)
            //     $('#external-events').prepend(event)

            //     // Add draggable funtionality
            //     ini_events(event)

            //     // Remove event from text input
            //     $('#new-event').val('')
            //   })
        })
    </script>
    <livewire:scripts />
@endpush
