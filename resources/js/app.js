import $ from 'jquery';
window.$ = window.jQuery = $;

import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import '@popperjs/core'
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
