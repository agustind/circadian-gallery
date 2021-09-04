require('./bootstrap');
require('alpinejs');
window.$ = $ = require('jquery');
require('./wallet');
require('./countdown');


const Uppy = require('@uppy/core')
const XHRUpload = require('@uppy/xhr-upload')
const DragDrop = require('@uppy/drag-drop')
const ProgressBar = require('@uppy/progress-bar')
const Tus = require('@uppy/tus')

window.addEventListener('scroll', () => {
    document.body.style.setProperty('--scroll',window.pageYOffset / (document.body.offsetHeight - window.innerHeight));
}, false);

$(function() {

    
    $('.intro-signup-send').on('click', function(e){
        e.preventDefault();

        $('.intro-signup-form input').removeClass('error');
        
        if($('.signup-name').val() == ''){
            $('.signup-name').addClass('error');
            return;
        }
        if($('.signup-email').val() == ''){
            $('.signup-email').addClass('error');
            return;
        }

        $.ajax({
            type: 'POST',
            url: '/signup',
            data: {
                _token: document.querySelector('meta[name="csrf-token"]').content,
                name: $('.signup-name').val(),
                email: $('.signup-email').val(),
                social: $('.signup-social').val(),
                work: $('.signup-work').val(),
            },
            success: function(data) {
                data = $.parseJSON(data);
            }
        });

        $('.intro-signup-form').fadeOut('slow', function(){
            $('.thankyou').fadeIn('slow');
        })
    });
    
    if($('.uploader').length > 0){
     
        const uppyOne = new Uppy({
            id: 'the_file',
            debug: true,
            autoProceed: true,
            allowedFileTypes: ['.jpg', '.jpeg', '.png', '.gif', '.mp4'],
            allowMultipleUploads: false,
        })

        uppyOne.use(DragDrop, { target: '.uploader .drop' })
        .use(ProgressBar, { target: '.uploader .progress', hideAfterFinish: false })
        .use(XHRUpload, {
            limit: 10,
            endpoint: '/upload-files',
            formData: true,
            fieldName: 'file',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // from <meta name="csrf-token" content="{{ csrf_token() }}">
            },

        })
        .on('complete', (event) => {
            if(event.successful[0] !== undefined) {
                
                body = event.successful[0].response.body;
                
                console.log(body);
                $("input[name='submission_id']").val(body.submission_id);
                setTimeout(function(){
                    $('.btn-submit').fadeIn();
                }, 1000);
                
            }
        });



    }

});

