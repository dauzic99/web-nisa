<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('admin/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('admin/assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->

<script src="{{ asset('admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->


<script src="{{ asset('admin/assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('admin/assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('admin/assets/js/custom/modals/create-app.js') }}"></script>
<script src="{{ asset('admin/assets/js/custom/modals/upgrade-plan.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('admin/assets/js/script.js') }}"></script>

@stack('js')
<!--end::Page Custom Javascript-->
