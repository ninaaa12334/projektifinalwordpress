jQuery(document).ready(function($) {
    // Dropdown menu hover effect
    $('.navbar-nav .dropdown').hover(
        function() {
            $(this).find('.dropdown-menu').stop().slideDown(200);
        },
        function() {
            $(this).find('.dropdown-menu').stop().slideUp(200);
        }
    );

    // Job submission form validation
    $('#job-submission-form').on('submit', function(e) {
        let title = $('#job-title').val();
        if (!title) {
            e.preventDefault();
            alert('Please enter a job title.');
        }
    });
});