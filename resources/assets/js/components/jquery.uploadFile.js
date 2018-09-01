function Upload(urlUpload, urlRemove) {
    this.urlUpload = urlUpload;
    this.urlRemove = urlRemove;
}
Upload.prototype = {
    init: function () {
        var _self = this;
        _self.upload();
    },
    upload: function () {
        var _self = this;
        $('#post_file_topic').fileuploader({
            extensions: ['jpg', 'jpeg', 'png', 'gif', 'ppm', 'pgm'],
            changeInput: 'false',
            theme: 'thumbnails',
            enableApi: true,
            fileMaxSize : 5,
            addMore: true,
            thumbnails: {
                box:   `<div class="fileuploader-items">
                        <ul class="fileuploader-items-list">
                        <li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner">+</div></li>
                        </ul>
                        </div>`,
                item:  '<li class="fileuploader-item">\
                        <div class="fileuploader-item-inner">\
                        <div class="thumbnail-holder" >${image}</div>\
                        <div class="actions-holder" title="${name}">\
                        <a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="remove"></i></a>\
                        </div>\
                        <div class="progress-holder">${progressBar}</div>\
                        </div>\
                        </li>',
                item2: '<li class="fileuploader-item">\
                        <div class="fileuploader-item-inner">\
                        <div class="thumbnail-holder">${image}</div>\
                        <div class="actions-holder" title="${name}">\
                        <a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="remove"></i></a>\
                        </div>\
                        </div>\
                        </li>',
                startImageRenderer: false,
                canvasImage: false,
                _selectors: {
                    list: '.fileuploader-items-list',
                    item: '.fileuploader-item',
                    start: '.fileuploader-action-start',
                    retry: '.fileuploader-action-retry',
                    remove: '.fileuploader-action-remove'
                },
                onItemShow: function(item, listEl) {
                    var plusInput = listEl.find('.fileuploader-thumbnails-input');
                    plusInput.insertAfter(item.html);
                    if(item.format == 'image') {
                        item.html.find('.fileuploader-item-icon').hide();
                    }
                }
            },
            afterRender: function(listEl, parentEl, newInputEl, inputEl) {
                var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                    api = $.fileuploader.getInstance(inputEl.get(0));
                plusInput.on('click', function() {
                    api.open();
                });
            },
            upload: {
                url: _self.urlUpload,
                data: null,
                type: 'POST',
                enctype: 'multipart/form-data',
                start: true,
                synchron: true,
                beforeSend: null,
                onSuccess: function(data, item) {
                    setTimeout(function() {
                        item.html.find('.progress-holder').hide();
                        item.renderImage();
                    }, 400);
                },
                onError: function(item) {
                    item.html.find('.progress-holder').hide();
                    item.html.find('.fileuploader-item-icon i').text('Failed!');
                },
                onProgress: function(data, item) {
                    var progressBar = item.html.find('.progress-holder');
                    if (progressBar.length > 0) {
                        progressBar.show();
                        progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
                    }
                }
            },
            dragDrop: {
                container: '.fileuploader-thumbnails-input'
            },
            onRemove: function(item) {
                $.post(_self.urlRemove, {
                    image: item.name,
                    post_id: '',
                });
            },
            captions: {
                close: 'close',
                download: 'download',
                remove: 'remove',
                errors: {
                    filesLimit:  'File nang',
                    filesType: 'kieu',
                    fileSize:'size',
                    filesSizeAll: 'max size',
                    fileName:'name file',
                    folderUpload: 'upload',
                }
            }
        });
    },
    editFileUploader:function() {
        var urlUpload = this.urlUpload;
        var urlRemove = this.urlRemove;
        $('#edit_images').fileuploader({
            extensions: ['jpg', 'jpeg', 'png', 'gif', 'ppm', 'pgm'],
            changeInput: ' ',
            theme: 'thumbnails',
            enableApi: true,
            addMore: true,
            fileMaxSize : 5,
            thumbnails: {
                box:    '<div class="fileuploader-items">\
                        <ul class="fileuploader-items-list">\
                        <li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner">+</div></li>\
                        </ul>\
                        </div>',
                item:   '<li class="fileuploader-item">\
                        <div class="fileuploader-item-inner">\
                        <div class="thumbnail-holder" >${image}</div>\
                        <div class="actions-holder" title="${name}">\
                        <a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="remove"></i></a>\
                        </div>\
                        <div class="progress-holder">${progressBar}</div>\
                        </div>\
                        </li>',
                item2:  '<li class="fileuploader-item">\
                        <div class="fileuploader-item-inner">\
                        <div class="thumbnail-holder">${image}</div>\
                        <div class="actions-holder" title="${name}">\
                        <a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="remove"></i></a>\
                        </div>\
                        </div>\
                        </li>',
                startImageRenderer: false,
                canvasImage: false,
                _selectors: {
                    list: '.fileuploader-items-list',
                    item: '.fileuploader-item',
                    start: '.fileuploader-action-start',
                    retry: '.fileuploader-action-retry',
                    remove: '.fileuploader-action-remove'
                },
                onItemShow: function(item, listEl) {
                    var plusInput = listEl.find('.fileuploader-thumbnails-input');

                    plusInput.insertAfter(item.html);

                    if(item.format == 'image') {
                        item.html.find('.fileuploader-item-icon').hide();
                    }
                }
            },
            afterRender: function(listEl, parentEl, newInputEl, inputEl) {
                var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                    api = $.fileuploader.getInstance(inputEl.get(0));

                plusInput.on('click', function() {
                    api.open();
                });
            },
            upload: {
                url: urlUpload,
                data: null,
                type: 'POST',
                enctype: 'multipart/form-data',
                start: true,
                synchron: true,
                beforeSend: null,
                onSuccess: function(data, item) {
                    setTimeout(function() {
                        item.html.find('.progress-holder').hide();
                        item.renderImage();
                    }, 400);
                },
                onError: function(item) {
                    item.html.find('.progress-holder').hide();
                    item.html.find('.fileuploader-item-icon i').text('Failed!');
                },
                onProgress: function(data, item) {
                    var progressBar = item.html.find('.progress-holder');

                    if (progressBar.length > 0) {
                        progressBar.show();
                        progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
                    }
                }
            },
            dragDrop: {
                container: '.fileuploader-thumbnails-input'
            },
            onRemove: function(item, listEl, parentEl, newInputEl, inputEl) {
                var id = $('.property-media').data('id');
                $.post(urlRemove, {
                    image: item.name,
                    post_id: id,
                });
            },
            captions: {
                close: 'close',
                download: 'download',
                remove: 'remove',
                errors: {
                    filesLimit:  'File nang',
                    filesType: 'kieu',
                    fileSize:'size',
                    filesSizeAll: 'max size',
                    fileName:'name file',
                    folderUpload: 'upload',
                }
            }
        });
    },
}
