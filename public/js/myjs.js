$(document).ready(function() {

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')	},
        cache: false
    });

    // Commonly user variables
    var winHeight = window.innerHeight;
    var winWidth = window.innerWidth;
    var screenHeight = screen.availHeight;
    var screenWidth = screen.availWidth;

    // // SideNav Button Initialization
    // $(".button-collapse").sideNav();
    // // SideNav Scrollbar Initialization
    // var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    // var ps = new PerfectScrollbar(sideNavScrollbar);

    // Make the page header half the screen size
    $('.page_header > div').css({'min-height':(winHeight/2) + 'px'});

    // Since fixed height for nav, add nav height to container
    $('#content_container').css({'margin-top':$('nav').height() + 'px'});

    // Since fixed height for nav, add nav height to container
    $('#enter_btn').css({'left':((screenWidth/2) - $('#enter_btn').outerWidth()/2) + 'px'});

    // Animations initialization
    new WOW().init();

    // Initialize MDB select
    $('.mdb-select').materialSelect();

    // Work around for select search not working
    $(".mdb-select").find(".search").on("click", function (e) {
        e.preventDefault();
        $(this).focus();
    });

    //Toggle read more option on members
    $("body").on("click", ".readMoreLess", function(e) {
        var shortBio = $(this).parent().prev().prev();
        var fullBio  = $(this).parent().prev();

        if($(fullBio).hasClass('d-none')) {
            $(fullBio).removeClass('d-none');
            $(shortBio).addClass('d-none');
            $(this).text('Read Less').removeClass('btn-mdb-color').addClass('btn-outline-mdb-color');
        } else {
            $(shortBio).removeClass('d-none');
            $(fullBio).addClass('d-none');
            $(this).text('Read More').removeClass('btn-outline-mdb-color').addClass('btn-mdb-color');
        }
    });

    // Initialize the datetimepicker
    $('.datepicker').datepicker({
        // Escape any “rule” characters with an exclamation mark (!).
        format: 'mm/dd/yyyy',
        formatSubmit: 'yyyy/mm/dd',
    });

    // Dropdown Init
    $('.dropdown-toggle').dropdown();

    // Remove flash message if there is one after 8 seconds
    if($('.flashMessage').length == 1) {
        $('.flashMessage').animate({top:'+=' + ($('nav').height() + 150) + 'px'});
        setTimeout(function(){
            $('.flashMessage').animate({top:'-150px'}, function(){
                // $('.flashMessage').remove();
            });
        }, 8000);
    }

    // Disable submit button once selected
    $('body').on('click', '.add_contact_form input[type="submit"], #contact_add  input[type="submit"]',  function(e) {
        // e.preventDefault();

        $(this).attr('disbaled', true);
    });

    // Remove disabled from the document title input
    // when a document is added
    $('[name="document[]"]').on('change', function() {
        $('[name="document_title"]').removeAttr('disabled').focus();
    });

    // Add progress spinner when submitting form
    $("#client_update_form").submit(function(e) {
        var backdrop = '<div class="modal-backdrop show fade"></div>';
        $(backdrop).appendTo('body');
        $('.loadingSpinner')
            .css({'display' : 'block'})
            .addClass('show')
            .removeClass('hide')
            .find('p')
            .text('Updating the Client Information');
        $('body')
            .addClass('modal-open');
    });

    // Add/Remove mask on media items when checkbox is selected/deselected
    $('body').on('change', ':checkbox', function() {
        var counter=0;

        $('.mediaBlock :checkbox').each(function() {
            if($(this).prop('checked')) {
                $(this).parent().next().find('.mask').removeClass('invisible');
                counter++;
            } else {
                $(this).parent().next().find('.mask').addClass('invisible');
            }
        });

        if(counter > 0) {
            $('button.removeMediaBtn').fadeIn();
        } else {
            $('button.removeMediaBtn').slideUp();
        }
    });

    // Add the selected media item to the modal for delete verification
    $('body').on('click', '.removeMediaBtn', function() {
        if($('.mediaBlock input:checked').length > 0) {
            $('.mediaBlock input:checked').each(function() {
                var mediaObject = $(this).parent().next().clone();

                $(this).appendTo($(mediaObject));
                $(mediaObject).find('.mask').hide();
                $(mediaObject).prependTo($('#property_media form .row'));
            });
        }
    });

    // Bring up save input button if any of the information is changed on the
    // showing card
    $('body').on('change', '.showingCard input, .showingCard textarea', function() {
        $(this).parent().parent().find('input[name="update_showing"]').slideDown();
    });

    // Bring up delete modal for deletions
    $('body').on('click', '.deleteBtn, .removeImage, .removeWelcomeMedia', function(e) {
        e.preventDefault();

        // If removing carousel Image
        // Add Image to input value
        var image = e.target;
        if($(image).hasClass('removeImage')) {
            var removeImage = $(image).prev().attr('src');
            var appendImage = $(image).prev().clone();
            $('.carouselImageD').val(removeImage);

            $(appendImage).addClass('mb-2');
            $('#delete_modal .modal-body > div:first-of-type').append($(appendImage));
        } else if($(image).hasClass('removeWelcomeMedia')) {
            var appendWelcomeMedia = $(image).prev().clone();
            $('.carouselImageD').val('welcomeMedia');

            $(appendWelcomeMedia).addClass('mb-2');
            $('#delete_modal .modal-body > div:first-of-type').append($(appendWelcomeMedia));
        }

        $('#delete_modal').addClass('d-block');
        setTimeout(function() {
            $('#delete_modal').addClass('show');
            $('body').addClass('modal-open').append("<div class='modal-backdrop fade show'></div>");
        }, 500);
    });

    //Search option box
    // $(".valueSearch ").keyup(function(e){
    // startSearch($(".valueSearch ").val());
    // });

    // Remove Modal
    $('body').on('click', '.close, .cancelBtn', function(e) {
        e.preventDefault();
        $('.modal').removeClass('show');

        // If this modal is the remove media objects modal
        if($(this).hasClass('dismissProperyMedia')) {
            // Remove all media objects from the modal
            $(this).parent().next().find('form .row').empty();
        }

        setTimeout(function() {
            $('.modal').removeClass('d-block');
            $('body').removeClass('modal-open');
            $(".modal-backdrop.fade.show").remove();
        }, 500);
    });

    // Button toggle switch
    $('body').on("click", "button", function(e) {
        if(!$(this).hasClass('btn-primary') || !$(this).hasClass('btn-danger')) {
            if($(this).children().val() == "Y") {
                $(this).addClass('active btn-success').removeClass('btn-blue-grey').children().attr("checked", true);
                $(this).siblings().addClass('btn-blue-grey').removeClass('active btn-danger').children().removeAttr("checked");

                // If this is the contacts page, toggle the addresses select div visibility
                if($('.tenantProp').length > 0) {
                    $('.tenantProp').slideDown();
                }
            } else if($(this).children().val() == 'N') {
                $(this).addClass('active btn-danger').removeClass('btn-blue-grey').children().attr("checked", true);
                $(this).siblings().addClass('btn-blue-grey').removeClass('active btn-success').children().removeAttr("checked");

                // If this is the contacts page, toggle the addresses select div visibility
                if($('.tenantProp').length > 0) {
                    $('.tenantProp').slideUp();
                }
            }
        }
    });

    // House type toggle switch
    $('body').on("click", ".aptBtn, .houseBtn", function(e) {
        e.preventDefault();
        if(!$('.aptBtn').hasClass('active btn-success')) {
            $('.aptBtn').addClass('active btn-success').removeClass('btn-blue-grey').children().attr("checked", true);
            $('.houseBtn').addClass('btn-blue-grey').removeClass('active btn-success').children().removeAttr("checked");
        } else if(!$('.houseBtn').hasClass('active btn-success')) {
            $('.houseBtn').addClass('active btn-success').removeClass('btn-blue-grey').children().attr("checked", true);
            $('.aptBtn').addClass('btn-blue-grey').removeClass('active btn-success').children().removeAttr("checked");
        } else {
            console.log('Here');
        }
    });

    // Under Construction / Active Toggle Switch
    $('body').on("click", ".showClient, .underConstr", function(e) {
        e.preventDefault();
        if($(this).hasClass('showClient')) {
            if($(this).hasClass('activeYes')) {
                $(this).addClass('active btn-success').removeClass('btn-blue-grey').children().attr("checked", true);
                $('.activeNo').removeClass('active btn-danger').addClass('btn-blue-grey').children().removeAttr("checked");
                $('.noUnderConstr').addClass('btn-danger active').removeClass('btn-blue-grey').children().attr("checked", true);
                $('.activeUnderConstr').addClass('btn-blue-grey').removeClass('active btn-success').children().removeAttr("checked");
            } else if($(this).hasClass('activeNo')) {
                $('.activeYes').addClass('btn-blue-grey').removeClass('active btn-success').children().removeAttr("checked");
                $('.activeNo').removeClass('btn-blue-grey').addClass('active btn-danger').children().attr("checked", true);
            } else {
                console.log('Here');
            }
        } else if($(this).hasClass('underConstr')) {
            if($(this).hasClass('activeUnderConstr')) {
                $(this).addClass('active btn-success').removeClass('btn-blue-grey').children().attr("checked", true);
                $('.noUnderConstr').removeClass('active btn-danger').addClass('btn-blue-grey').children().removeAttr("checked");
                $('.activeNo').addClass('btn-danger active').removeClass('btn-blue-grey').children().attr("checked", true);
                $('.activeYes').addClass('btn-blue-grey').removeClass('active btn-success').children().removeAttr("checked");
            } else if($(this).hasClass('noUnderConstr')) {
                $('.activeUnderConstr').addClass('btn-blue-grey').removeClass('active btn-success').children().removeAttr("checked");
                $('.noUnderConstr').removeClass('btn-blue-grey').addClass('active btn-danger').children().attr("checked", true);
            } else {
                console.log('Here');
            }
        }
    });

    // Scroll through calendars
    $('body').on('click', '.calendarMonth li.prev, .calendarMonth li.next', function() {
        var showingCalendarMonth = $(this).parent().parent().parent();

        if($(this).hasClass('next')) {
            if($(showingCalendarMonth).next().hasClass('calendarMonth')) {
                // Hide current calendar month
                $(showingCalendarMonth).hide();
                $(showingCalendarMonth).next().show();
            } else {
                toastr.error("No calendar months listed for next year", "Uh Ohh!!!", {showMethod: 'slideDown'});
            }
        } else {
            if($(showingCalendarMonth).prev().hasClass('calendarMonth')) {
                // Hide current calendar month
                $(showingCalendarMonth).hide();
                $(showingCalendarMonth).prev().show();
            } else {
                toastr.error("No calendar months listed for previous year", "Uh Ohh!!!", {showMethod: 'slideDown'});
            }
        }
    });

    // Change the default property image
    $('body').on('click', '.makeDefault', function() {
        var image = $(this).prev().prev().find('input');

        defaultPropImage(image);
    });

    // Click on input button when user goes to change
    // contact picture
    $('body').on('click', '.memberImg button', function(e) {
        e.preventDefault();
        $('.memberImg input').click();
    });

    // Call function for file preview when uploading
    // new contact image
    $('.memberImg input').change(function () {
        memberImgPreview(this);
        fileLoaded(this);
    });

    // Call function for file preview when uploading
    // new images to properties page
    $("#upload_photo_input").change(function () {
        filePreview(this);
        fileLoaded(this);
    });

    // Change the background color of submit button when sending
    // contact an email
    $("body").on('change', '.contactEmail #email_body textarea, .contactEmail #email_subject input', function () {
        var subject = $('.contactEmail #email_body textarea');
        var body = $('.contactEmail #email_subject input');
        if($(subject).val() != '' && $(body).val() != '') {
            $('[name="send_email"]').removeClass('lighten-5').addClass('dakren-3 active');
        };
    });

    // Get all property showings for selected date
    $("body").on('click', '.propShowings', function(e) {
        getShowings($(this).children().attr('id'));
    });

    // Upload new image for the current reunion
    $('body').on('click', 'button.resetCounterBtn', function() {
        event.preventDefault();

        $.ajax({
            url: "/reset_count",
            method: "POST",
            contentType: false,
            processData: false,
            cache: false,

            success: function(data) {
                var d = new Date();
                // Display a success toast
                toastr.success(data);
                $('.settingsCounter').text('0');
                $('.settingsCounterDate').text(d.toDateString());
            },
        });

        return false;
    });
});

//Check to see if the file has been loaded
//If so then remove modal
function fileLoaded(input) {
    var imagePreview = setInterval(function() {
        if($('.imgPreview').length == input.files.length) {
            $('.loadingSpinner, .modal-backdrop')
                .css({'display' : 'none'})
                .removeClass('show')
                .addClass('hide');
            $('body')
                .removeClass('modal-open');

            clearInterval(imagePreview);
        }
    }, 1000);
    var avatarPreview = setInterval(function() {
        if($('.avatarPreview').length == input.files.length) {
            $('.loadingSpinner, .modal-backdrop')
                .css({'display' : 'none'})
                .removeClass('show')
                .addClass('hide');
            $('body')
                .removeClass('modal-open');

            clearInterval(avatarPreview);
        }
    }, 1000);
}

// Preview images before being uploaded on images page and new location page
function filePreview(input) {
    $('.loadingSpinner').find('p').text('Adding Image/Video').ready(function() {
        $('.loadingSpinner').modal('show');
    });

    if(input.files && input.files[0]) {
        if(input.files.length > 1) {
            var imgCount = input.files.length;
            $('.imgPreview').parent().remove();

            for(x=0; x < imgCount; x++) {
                if($('.uploadsView').length < 1) {
                    if(input.files[x].type.indexOf('video') != -1) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('<div class="d-block mx-auto mb-2 d-sm-inline-block" style="height:250px; width:250px; position:relative"><video controls class="imgPreview" style="max-height:250px;"><source src="' + e.target.result + '" /></video></div>').appendTo($('.currentCarImageDiv').find('.row'));
                        }
                        reader.readAsDataURL(input.files[x]);
                    } else {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('<div class="col-4 my-1"><img class="imgPreview img-thumbnail h-100 w-100" src="' + e.target.result + '"/></div>').appendTo($('.currentCarImageDiv').find('.row'));
                        }
                        reader.readAsDataURL(input.files[x]);
                    }
                } else {
                    if(input.files[x].type.indexOf('video') != -1) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('<div class="col-6 my-1"><video controls class="imgPreview" style="max-height:250px;"><source src="' + e.target.result + '" /></video></div>').appendTo('.uploadsView');
                        }
                        reader.readAsDataURL(input.files[x]);
                    } else {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('<div class="col-4 my-1"><img class="imgPreview img-thumbnail" src="' + e.target.result + '" width="450" height="300"/></div>').appendTo($('.uploadsView').find('.row'));
                        }
                        reader.readAsDataURL(input.files[x]);
                    }
                }
            }
        } else {
            var reader = new FileReader();
            $('.imgPreview').parent().remove();

            if($('.uploadsView').length < 1) {
                if(input.files[0].type.indexOf('video') != -1) {
                    reader.onload = function (e) {
                        $('<div class="d-block mx-auto mb-2 d-sm-inline-block" style="height:250px; width:250px; position:relative"><video controls class="imgPreview" style="max-height:250px;"><source src="' + e.target.result + '" /></video></div>').insertAfter('.currentCarImageDiv:last-of-type');
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    reader.onload = function (e) {
                        $('<div class="col-4 my-1"><img class="imgPreview img-thumbnail h-100 w-100" src="' + e.target.result + '"/></div>').appendTo($('.currentCarImageDiv').find('.row'));
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            } else {
                if(input.files[0].type.indexOf('video') != -1) {
                    reader.onload = function (e) {
                        $('<div class="col-6 my-1"><video controls class="imgPreview" style="max-height:250px;"><source src="' + e.target.result + '" /></video></div>').appendTo('.uploadsView');
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    reader.onload = function (e) {
                        $('<div class="col-4 my-1"><img class="imgPreview img-thumbnail" src="' + e.target.result + '" width="450" height="300"/></div>').appendTo($('.uploadsView').find('.row'));
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        }
    }
}

// Preview contact image before uploading
function memberImgPreview(input) {
    var backdrop = '<div class="modal-backdrop show fade"></div>';
    $(backdrop).appendTo('body');
    $('.loadingSpinner')
        .css({'display' : 'block'})
        .addClass('show')
        .removeClass('hide')
        .find('p')
        .text('Adding Image/Video');
    $('body')
        .addClass('modal-open');

    var reader = new FileReader();

    reader.onload = function (e) {
        $('.memberImg img').attr('src', e.target.result).addClass('avatarPreview');
    }
    reader.readAsDataURL(input.files[0]);
}

// Remove individual image via ajax request
function defaultPropImage(img) {
    event.preventDefault();

    $.ajax({
        method: "POST",
        url: "/default_image",
        data: {PropertyImages:$(img).val()}
    })

        .fail(function() {
            alert("Fail");
        })

        .done(function(data) {
            var image = data;
            var allImages = $('.deletePropImages');

            $(allImages).each(function() {
                inputVal = $(this).find('input');
                button = $(this).find('button');

                if($(inputVal).val() == $(image)[0].id) {
                    $(button).text('Default').addClass('btn-success').removeClass('btn-primary');
                } else {
                    $(button).text('Make Default').addClass('btn-primary').removeClass('btn-success');
                }
            });
        });
}

// Initialize tooltip
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

// MDB Lightbox Init
$(function () {
    $("#mdb-lightbox-ui").load("/addons/mdb-lightbox-ui.html");
});

/* init Jarallax */
jarallax(document.querySelectorAll('.jarallax'));

jarallax(document.querySelectorAll('.jarallax-keep-img'), {
    keepImg: true,
});