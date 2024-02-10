$(document).ready(function() {
    // Function to generate slug from title
    function generateSlug(title) {
        return title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
    }

    // Event listener for the title input field
    $('#articleTitle').on('input', function() {
        // Get the entered title
        var title = $(this).val();

        // Generate the slug
        var slug = generateSlug(title);

        // Set the generated slug to the slug input field
        $('#articleSlug').val(slug);
    });
});
