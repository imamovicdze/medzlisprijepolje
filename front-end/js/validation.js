$(document).ready(function () {
 //validate admindashboard for creating news
    $("#news-form").validate({
        rules: {
            title: {
                required: true
            },
            content: {
                required: true
            }
        }
        });
//validate admindashboard for creating category
    $("#category-form").validate({
        rules: {
            category_name: {
                required: true
            }
        }
    });
//validate contact.twig for sending mail
    $("#contact-form").validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            title: {
                required: true
            },
            textArea: {
                required: true
            }
        }
    });
});