 {{-- Scripts --}}
 <script type="text/javascript" src="{{ asset('assets/mdb/js/jquery.min.js') }}"></script>
 <script type="text/javascript" src="{{ asset('assets/mdb/js/popper.min.js') }}"></script>
 <script type="text/javascript" src="{{ asset('assets/mdb/js/bootstrap.min.js') }}"></script>
 <script type="text/javascript" src="{{ asset('assets/mdb/js/mdb.min.js') }}"></script>
 <script type="text/javascript" src="{{ asset('assets/adminlte/js/adminlte.min.js') }}"></script>
 {{-- Summernote --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/dropzone/dist/dropzone.js') }}"></script>

 <!-- AdminLTE for demo purposes -->
 {{-- <script src="{{ asset('assets/adminlte/dist/js/demo.js') }}"></script> --}}
 @livewireScripts
 @stack('scripts')
