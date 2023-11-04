

    function filterProducts() {
        var selectedCategory = $('#categoryFilter').val();

        $('tbody tr').each(function() {
            var category = $(this).find('td:nth-child(9)').text(); // Get the category value from the table

            if (selectedCategory === '' || category === selectedCategory) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });

        var prevPageUrl = $('a:contains("Previous")').attr('href');
        var nextPageUrl = $('a:contains("Next")').attr('href');

        // Remove the existing category parameter if it doesn't have a value and add the new one
        if (prevPageUrl.includes('category')) {
            if (prevPageUrl.split('=')[1] === '') {
                prevPageUrl = prevPageUrl.replace(/&?category=[^&]*/, '');
            } else {
                prevPageUrl = prevPageUrl.replace(/category=[^&]*/, 'category=' + selectedCategory);
            }
        } else {
            prevPageUrl += '&category=' + selectedCategory;
        }
        if (nextPageUrl.includes('category')) {
            if (nextPageUrl.split('=')[1] === '') {
                nextPageUrl = nextPageUrl.replace(/&?category=[^&]*/, '');
            } else {
                nextPageUrl = nextPageUrl.replace(/category=[^&]*/, 'category=' + selectedCategory);
            }
        } else {
            nextPageUrl += '&category=' + selectedCategory;
        }

        $('a:contains("Previous")').attr('href', prevPageUrl);
        $('a:contains("Next")').attr('href', nextPageUrl);
    }

    $(document).ready(function() {
        filterProducts();
    });
