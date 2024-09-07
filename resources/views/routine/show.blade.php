@extends('layouts.adminapp', ['title' => 'Admin | Routine Show'])

@section('content')
    <div>
        <h1>Routine Show</h1>
    </div>
    <div class="d-flex justify-content-between">
        <a href="{{ route('routines.index') }}" class="btn btn-primary">Back
            <i class="fa fa-backward"></i></a>
        <button class="btn btn-warning" id="print-btn"><i class="fas fa-print"></i> Print</button>
    </div>
    <div class="p-3 printable">
        <div>

        </div>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <div class="rounded border border-3 p-2">
                        <div class="row">
                            <div class="col-8">
                                <h3> School Management System</h3>
                            </div>
                            <div class="col-4">
                                <p class="text-muted m-0 fw-bold">Class Name : {{ Str::title($routine->standard->name) }}
                                </p>
                                <p class="text-muted m-0 fw-bold">Shift: {{ Str::title($routine->standard->shift->name) }}
                                </p>
                                <p class="text-muted m-0 fw-bold">Section:
                                    {{ Str::title($routine->standard->section->name) }}</p>
                                <p class="text-muted m-0 fw-bold">Session: {{ Str::title($routine->standard->session) }}</p>
                            </div>
                        </div>

                    </div>
                </tr>
                <tr>
                    <th>Time Slot</th>
                    @foreach ($decodedRoutine as $day => $slots)
                        <th>{{ ucfirst($day) }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach (array_keys($decodedRoutine['saturday']) as $timeSlot)
                    <tr>
                        <th>{{ $timeSlot }}</th>
                        @foreach ($decodedRoutine as $day => $slots)
                            <td>
                                @isset($slots[$timeSlot])
                                    <strong>{{ $slots[$timeSlot]['subjects'] }}</strong><br>
                                    {{ $slots[$timeSlot]['teachers'] }}
                                @else
                                    No class
                                @endisset
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <caption>
                Date: {{ $routine->created_at->format('d-M-Y H:i A') }}
            </caption>
        </table>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#print-btn').on('click', function() {
                var printableContent = $('.printable').html();
                var printWindow = window.open('', 'Print',
                    'menubar=yes,toolbar=yes,resizable=yes,scrollbars=yes,height=600,width=800');

                if (printWindow) {
                    var head = $('head').clone().children().filter('style').add('link').clone().get().map(
                        function(el) {
                            return el.outerHTML;
                        }).join('');

                    printWindow.document.open();
                    printWindow.document.write(`
                    <html>
                        <head>${head}</head>
                        <body>
                            <div class="p-2">${printableContent}</div>
                        </body>
                    </html>
                `);
                    printWindow.document.close();
                    printWindow.focus();
                    printWindow.print();
                } else {
                    alert('Unable to open print window. Please check your popup blocker settings.');
                }
            });
        });
    </script>
@endSection
